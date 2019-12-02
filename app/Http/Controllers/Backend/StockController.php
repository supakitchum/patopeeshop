<?php

namespace App\Http\Controllers\Backend;

use App\Model\Catalog;
use App\Model\Color;
use App\Model\Product;
use App\Model\Size;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StockController extends Controller
{
    public function index(){
        $stocks = Product::leftjoin('product_details','products.id','=','product_details.pid')
            ->leftjoin('colors','product_details.color','=','colors.id')
            ->leftjoin('sizes','product_details.size','=','sizes.id')
            ->leftjoin('product_catalogs','products.id','=','product_catalogs.pid')
            ->leftjoin('catalogs','product_catalogs.cid','=','catalogs.id')
            ->select('products.*','colors.name as color','sizes.name as size','catalogs.name as catalog','product_details.quality','product_details.price')
            ->get();
        $catalogs = Catalog::all();
        $colors = Color::all();
        $sizes = Size::all();
        return view('backend.stock.index')->with(
            [
                'stocks' => $stocks,
                'catalogs' => $catalogs,
                'colors' => $colors,
                'sizes' => $sizes
            ]
        );
    }
}
