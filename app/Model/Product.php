<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'recommend','detail'];


    public function hasCatalog($pid)
    {
        $catalogs = ProductCatalog::join('catalogs', 'product_catalogs.cid', '=', 'catalogs.id')->where('pid', $pid)->get();
        return $catalogs;
    }

    public function details($pid)
    {
        $results = ProductDetail::leftjoin('products', 'product_details.pid', '=', 'products.id')
            ->leftjoin('colors', 'product_details.color', '=', 'colors.id')
            ->leftjoin('sizes', 'product_details.size', '=', 'sizes.id')
            ->select('products.*', 'colors.id as color','colors.name as color_name', 'sizes.id as size','sizes.name as size_name','product_details.id as detail_id', 'product_details.quality', 'product_details.price', 'products.recommend')
            ->where('pid', $pid)
            ->orderBy('product_details.created_at')
            ->get();
        return $results;
    }

    public function images($pid)
    {
        $results = ProductImage::where('pid',$pid)->get();
        return $results;
    }

    function colors()
    {
        return $this->hasMany(Color::class, 'id', 'color');
    }

    function sizes()
    {
        return $this->hasMany(Size::class, 'id', 'size');
    }

    function order()
    {
        return $this->belongsToMany(Order::class, 'pid', 'id');
    }
}
