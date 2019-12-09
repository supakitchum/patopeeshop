<?php

namespace App\Http\Controllers;

use App\Model\Catalog;
use App\Model\Product;
use App\Model\ProductDetail;
use App\Model\ProductImage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $catalog,$product,$productDetail,$productImage;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        Catalog $catalog,
        Product $product,
        ProductImage $productImage,
        ProductDetail $productDetail
    )
    {
        $this->catalog = $catalog;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->productDetail = $productDetail;

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = $this->product
            ->leftjoin('product_images','products.id','=','product_images.pid')
            ->leftjoin('product_details','products.id','=','product_details.pid')
            ->groupBy('products.id')
            ->orderBy('products.created_at','desc')
            ->select('products.*','product_images.path','product_details.price')
            ->limit(12)
            ->get();
        return view('frontend.home')->with([
            'catalogs' => $this->catalog->get(),
            'products' => $products
        ]);
    }

    public function product_details($pid){
        $productsImages = $this->productImage->where('pid',$pid)->get();
        $product = $this->product->find($pid);
        $productDetails = $this->productDetail->where('pid',$pid)->first();
        $colors = $this->productDetail->where('pid',$pid)->join('colors','product_details.color','=','colors.id')->select('colors.name')->groupBy('color')->get();
        $sizes = $this->productDetail->where('pid',$pid)->join('sizes','product_details.size','=','sizes.id')->select('sizes.name')->groupBy('size')->get();
        $total = $this->productDetail->where('pid',$pid)->sum('quality');
        return view('frontend.product-detail')->with(
            [
                'productImages' => $productsImages,
                'product' => $product,
                'productDetails' => $productDetails,
                'colors' => $colors,
                'sizes' => $sizes,
                'total' => $total
            ]
        );
    }
}
