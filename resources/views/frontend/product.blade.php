@extends('frontend.layouts.main')
@section('title','หน้าแรก')
@section('content')

<div class="main-container shop-with-banner left-slidebar">
    <div class="container">
        <div class="shop-banner">
            <img src="images/slides/slider-cat2.jpg" alt="">
        </div>
        <div class="breadcrumbs style2">
            <a href="#">Home</a>
            <span>Categories_Leftsidebar</span>
        </div>
        <div class="row">
            <div class="main-content col-sm-8 col-md-9">
                <div class="shop-top">
                    <div class="shop-top-left">
                        <span class="woocommerce-result-count">Showing 1-9 of 2268 results</span>
                    </div>
                    <div class="shop-top-right">
                        <div class="orderby-wapper">
                            <select class="orderby">
                                <option value="">Short by Newness</option>
                                <option value="">Short by price</option>
                            </select>
                        </div>
                        <div class="orderby-wapper display-products">
                            <span class="label-filter">SHOW:</span>
                            <select class="orderby">
                                <option value="">9 products</option>
                                <option value="">12 products</option>
                            </select>
                        </div>

                        <div class="show-grid-list">
                            <span class="label-filter">VIEW:</span>
                            <a class="show-grid active" href="#"><i class="fa fa-th"></i></a>
                            <a class="show-list" href="#"><i class="fa fa-list"></i></a>
                        </div>
                    </div>
                </div>


                <ul class="product-list-grid desktop-columns-3 tablet-columns-2 mobile-columns-1 row flex-flow"
                    id="row">
                </ul>

                <div class="navigation">
                    <ul>
                        <li><a href="#"><i class="fa fa-long-arrow-left"></i></a></li>
                        <li><a href="#">1</a></li>
                        <li class="active"><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#"><i class="fa fa-long-arrow-right"></i></a></li>
                    </ul>
                </div>
            </div>
            <form id="form-filter" method="get">
                <div class="col-sm-4 col-md-3 sidebar">
                    <!-- Product category -->
                    <div class="widget widget_product_categories">
                        <h2 class="widget-title">Categories</h2>
                        <ul class="product-categories">
                            @foreach($catalogs as $index=>$catalog)
                            <li> <input type="checkbox" id="{{ $catalog->name }}" name="catalogs[]"
                                    value="{{ $catalog->id }}" class="filled-in chk-col-blue" />
                                <label for="{{ $catalog->name }}">{{ $catalog->name }}</label></li>
                            @endforeach
                            <!-- <li><a href="#">Sunglasses</a><span class="count-item">(25)</span></li>
                        <li><a href="#">Watches</a><span class="count-item">(23)</span></li>
                        <li class="current-cat"><a href="#">Jewelry</a><span class="count-item">(9)</span></li>
                        <li><a href="#">Hats, Scraves & Gloves</a><span class="count-item">(12)</span></li>
                        <li><a href="#">Underwear & Socks</a><span class="count-item">(48)</span></li>
                        <li><a href="#">Grooming</a><span class="count-item">(6)</span></li>
                        <li><a href="#">Belts</a><span class="count-item">(18)</span></li> -->
                        </ul>
                    </div>
                    <!-- ./Product category -->
                    <!-- Filter price -->
                    <!-- <div class="widget widget_price_filter">
                        <h2 class="widget-title">PRICES</h2>
                        <div class="price_slider_wrapper">
                            <div class="amount-range-price">Price: $85.00 - $125.00</div>
                            <div data-label-reasult="price:" data-min="0" data-max="500" data-unit="$"
                                class="slider-range-price " data-value-min="50" data-value-max="350"></div>
                            <button class="button">Filter NOW</button>
                        </div>
                    </div> -->
                    <!-- ./Filter price -->
                    <!-- By color -->
                    <div class="widget widget_fillter_color">
                        <h2 class="widget-title">COLOUR</h2>
                        <div class="inner">
                            @foreach($colors as $index=>$color)
                            <label class="container1">
                                <input type="checkbox" id="{{ $color->name }}" name="colors[]" value="{{ $color->id }}">
                                <span class="checkmark" style="background-color:{{ $color->code }}"></span>
                            </label>
                            <!-- <input class="color" type="checkbox" style="background-color:{{ $color->code }};width:25px" /> -->
                            @endforeach
                            <!-- <a href=" #"><span style="background-color:#736357;"></span></a>
                        <a class="active" href="#"><span style="background-color:#bdb871;"></span></a>
                        <a href="#"><span style="background-color:#f26522;"></span></a>
                        <a href="#"><span style="background-color:#fff799;"></span></a> -->
                        </div>
                    </div>
                    <!-- ./By color -->
                    <!-- By color -->
                    <div class="widget widget_fillter_size">
                        <h2 class="widget-title">SIZE Option</h2>
                        <div class="inner">
                            @foreach($sizes as $index=>$size)
                            <label class="container1">
                                <input type="checkbox" id="{{ $size->name }}" name="sizes[]" value="{{ $size->id }}">
                                <span class="checkmarksize">{{ $size->name }}</span>
                            </label>
                            @endforeach
                            <!-- <a href="#"><span>S</span></a>
                    	
                    	<a href="#"><span>L</span></a>
                    	<a href="#"><span>XL</span></a>
                    	<a href="#"><span>XXL</span></a> -->
                        </div>
                    </div>
                    <!-- ./By color -->
                </div>
            </form>
        </div>

    </div>
</div>

@endsection
@section('script')

<script>
$(document).ready(function() {
    $('input[type=checkbox]').change(
        function() {
            document.getElementById("row").innerHTML = "";
            $.ajax({
                url: "/api/filter/frontend/product",
                type: "POST",
                data: $('#form-filter').serializeArray(),
                success: function(json) {
                    for (var i = 0, ien = json.length; i < ien; i++) {
                        document.getElementById("row").innerHTML +=
                            '<li class="product-item style3 col-sm-6 col-md-4">' +
                            '<div class="product-inner">' +
                            '   <div class="product-thumb has-back-image">' +
                            '       <a href="#"><img src="/' + json[i]['path'] +
                            '" alt="" width="200px" height="200px" ></a>' +
                            '       <a class="back-image" href="#"><img src="images/products/left2.png" alt=""></a>' +
                            ' <div class="gorup-button">' +
                            ' <a href="#" class="wishlist"><i class="fa fa-heart"></i></a>' +
                            ' <a href="#" class="compare"><i class="fa fa-exchange"></i></a>' +
                            '<a href="#" class="quick-view"><i class="fa fa-search"></i></a>' +
                            '  </div>' +
                            '   </div>' +
                            '<div class="product-info">' +
                            '<h3 class="product-name"><a href="#">' + json[i]['name'] +
                            '</a></h3>' +
                            '   <span class="price">' +
                            '<ins>' + json[i]['price'] + '</ins>' +
                            ' </span>' +
                            '  <a href="#" class="button add_to_cart_button">ADD TO CART</a>' +
                            '</div>' +
                            '     </div>' +
                            '</li>';
                    }

                }
            })
        });
}); // End of use strict
</script>
@stop