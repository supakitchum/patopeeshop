<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Catalog;
use App\Model\Color;
use App\Model\ProductCatalog;
use App\Model\ProductDetail;
use App\Model\ProductImage;
use App\Model\Size;
use App\Model\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    private $product, $color, $size, $catalog, $product_detail, $product_catalog,$productImage;

    public function __construct(
        Product $product,
        Size $size,
        Color $color,
        Catalog $catalog,
        ProductDetail $product_detail,
        ProductCatalog $product_catalog,
        ProductImage $productImage
    )
    {
        $this->product = $product;
        $this->size = $size;
        $this->color = $color;
        $this->catalog = $catalog;
        $this->product_catalog = $product_catalog;
        $this->product_detail = $product_detail;
        $this->productImage = $productImage;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = $this->product->all();
        $catalogs = $this->catalog->all();
        $colors = $this->color->all();
        $sizes = $this->size->all();
        // return $catalogs;
        return view(
            'frontend.product',
            [
                'results' => $results,
                'images' => $this->product,
                'catalogs' => $catalogs,
                'colors' => $colors,
                'sizes' => $sizes
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $colors = $this->color->all();
        $sizes = $this->size->all();
        $catalogs = $this->catalog->all();
        $results = $this->product->details($id);
        $images = $this->productImage->where('pid',$id)->get();
        return view('frontend.product-detail')->with(
            [
                'colors' => $colors,
                'sizes' => $sizes,
                'catalogs' => $catalogs,
                'results' => $results,
                'images' => $images
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $colors = $this->color->all();
        $sizes = $this->size->all();
        $catalogs = $this->catalog->all();
        $results = $this->product->details($id);
        $product = $this->product->find($id);
        $catalog_results = [];
        foreach ($this->product_catalog->where('pid', $id)->select('cid')->get() as $catalog) {
            $catalog_results[] = $catalog->cid;
        }

        return view('backend.product.form')->with(
            [
                'id' => $id,
                'colors' => $colors,
                'sizes' => $sizes,
                'catalogs' => $catalogs,
                'results' => $results,
                'product' => $product,
                'catalog_results' => $catalog_results,
                'images' => $this->product->images($id)
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // delete product attribute.
        if ($request->input('remove')) {
            foreach ($request->input('remove') as $remove) {
                $this->product_detail->find($remove)->delete();
            }
        }

        // update product attribute.
        if ($request->input('detail_id')) {
            foreach ($request->input('detail_id') as $index => $pid) {
                $product = $this->product_detail->find($pid);
                $product->price = $request->input('amount')[$index];
                $product->color = $request->input('color')[$index];
                $product->size = $request->input('size')[$index];
                $product->quality = $request->input('quality')[$index];
                $product->save();
            }
        }

        // find count of product attribute.
        $pro_count = $this->product_detail->where('pid', $id)->count();

        if ($pro_count < sizeof($request->input('size'))) {
            // create new product attribute.
            for ($i = $pro_count; $i < sizeof($request->input('size')); $i++) {
                $this->product_detail->create([
                    'pid' => $id,
                    'price' => $request->input('amount')[$i],
                    'color' => $request->input('color')[$i],
                    'size' => $request->input('size')[$i],
                    'quality' => $request->input('quality')[$i]
                ]);
            }
        }

        // clear product catalog.
        $find_catalog = $this->product_catalog->where('pid', $id)->count();
        if ($find_catalog > 0)
            $this->product_catalog->where('pid', $id)->delete();

        // add product catalog.
        if ($request->input('catalogs') && sizeof($request->input('catalogs')) > 0) {
            foreach ($request->input('catalogs') as $catalog) {
                $this->product_catalog->create([
                    'pid' => $id,
                    'cid' => $catalog
                ]);
            }
        }

        // update product details.
        $product = $this->product->find($id);
        $product->name = $request->input('name');
        $product->recommend = $request->input('recommend');
        $product->detail = $request->input('detail');
        $product->save();

        return redirect()->back()->with([
            'status' => [
                'class' => 'success',
                'message' => 'แก้ไขข้อมูลสำเร็จ'
            ]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
