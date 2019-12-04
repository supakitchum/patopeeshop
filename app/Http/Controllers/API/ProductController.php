<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Backend\CatalogController;
use App\Model\Product;
use App\Model\ProductCatalog;
use App\Model\ProductDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function filter(Request $request)
    {
        $form_params = $request->get('form');
        $catalogs = [];
        $colors = [];
        $sizes = [];
        if (isset($form_params)){
            foreach ($form_params as $param){
                if ($param['name'] == "catalogs")
                    $catalogs[] = $param['value'];
                if ($param['name'] == "colors")
                    $colors[] = $param['value'];
                if ($param['name'] == "sizes")
                    $sizes[] = $param['value'];
            }
        }
        if ($catalogs) {
            try{
                $query = "select DISTINCT(pid) from product_catalogs where ";
                foreach ($catalogs as $index => $cid) {
                    if ($index > 0)
                        $query .= "or ";
                    $query .= "cid = " . $cid . " ";
                }
                $products = DB::select($query);
                if ($products){
                    $query = "select DISTINCT(pid),size from product_details where (";
                    foreach ($products as $index => $pid) {
                        if ($index > 0)
                            $query .= "or ";
                        $query .= "pid = " . $pid->pid . " ";
                    }
                    $query .= ') ';
                }
                else{
                    return $products;
                }
            } catch (\Exception $e){
                throw $e;
            }
        }
        if ($colors) {
            if ($catalogs){
                if (sizeof($colors) > 0) {
                    $query .= "and ";
                    foreach ($colors as $index => $color) {
                        if ($index > 0)
                            $query .= "or ";
                        $query .= "color = " . $color . " ";
                    }
                    $query = "select DISTINCT(pid),size from (" . $query . ") as a;";
                } else
                    $query .= ';';
            }else{
                $query = "select DISTINCT(pid),size from product_details where ";
                foreach ($colors as $index => $color) {
                    if ($index > 0)
                        $query .= "or ";
                    $query .= "color = " . $color . " ";
                }
                $query .= ";";
            }
        }
        if (isset($query))
            $products = DB::select($query);
        if ($sizes) {
            if ($catalogs || $colors){
                $products = array_filter($products, function ($product) use ($sizes) {
                    if (in_array($product->size, $sizes))
                        return true;
                    else
                        return false;
                });
            }
            else{
                $query = "select DISTINCT(pid),size from product_details where ";
                foreach ($sizes as $index => $size) {
                    if ($index > 0)
                        $query .= "or ";
                    $query .= "size = " . $size . " ";
                }
                $query .= ";";
                $products = DB::select($query);
            }
        }
        if (isset($products) && sizeof($products) > 0) {
            $query = "select products.*,product_images.path from products left join product_images on products.id = product_images.pid where (";
            foreach ($products as $index => $product) {
                if ($index > 0 && sizeof($products) > 1){
                    $query .= "or ";
                }

                $query .= " products.id = " . $product->pid . " ";
            }
            $query .= ') and products.deleted_at IS NULL group by products.id';
        } elseif ($catalogs || $sizes || $colors){
            return [];
        }
        else {
            $query = "select products.*,product_images.path from products left join product_images on products.id = product_images.pid where products.deleted_at IS NULL group by products.id";
        }
        return response()->json(DB::select($query));
    }

    public function getDetail($pid, $size = false)
    {
        if ($size) {
            return $this->getSize($pid);
        }
        $results = ProductDetail::join('colors', 'product_details.color', '=', 'colors.id')
            ->join('sizes', 'product_details.size', '=', 'sizes.id')
            ->select(
                'colors.name as color_name',
                'colors.id as color_id',
                'sizes.name as size_name',
                'sizes.id as size_id',
                'product_details.quality',
                'product_details.price',
                'product_details.id'
            )
            ->where('pid', $pid)
            ->get();
        return response()->json($results);
    }

    public function getSize($pid)
    {
        $results = ProductDetail::join('sizes', 'product_details.size', '=', 'sizes.id')
            ->select(
                'sizes.name as size_name',
                'sizes.id as size_id'
            )
            ->where('pid', $pid)
            ->groupBy('sizes.id')
            ->get();
        return response()->json($results);
    }

    public function getColor(Request $request){
        $size = $request->size;
        $pid = $request->pid;
        $result = ProductDetail::join('colors', 'product_details.color', '=', 'colors.id')
            ->select(
                'colors.name as color_name',
                'colors.id as color_id',
                'product_details.price',
                'product_details.quality'
            )
            ->where(['pid' => $pid,'size' => $size])
            ->get();

        return response()->json($result);
    }

    public function getProductDetail(Request $request){
        $size = $request->size;
        $pid = $request->pid;
        $color = $request->color;
        $result = ProductDetail::where(['pid' => $pid,'size' => $size,'color' => $color])->first();
        return response()->json($result);
    }

    public function getProducts(Request $request){
        $pids = $request->pids;
        $results = [];
        foreach ($pids as $pid){
            $product = Product::leftjoin('product_images','products.id','=','product_images.pid')->where('products.id',$pid)->first();
            $attribute = ProductDetail::leftjoin('sizes','product_details.size','=','sizes.id')
                ->leftjoin('colors','product_details.color','=','colors.id')
                ->where('pid',$pid)
                ->select('sizes.name as size','sizes.id as size_id','colors.id as color_id','colors.name as color','product_details.id as aid')
                ->groupBy('sizes.id')
                ->get();
            array_push($results,[
                'id' => $pid,
                'name' => $product->name,
                'image' => $product->path,
                'detail' => $product->detail,
                'attribute' => $attribute
            ]);
        }
        return response()->json($results,200);
    }
}
