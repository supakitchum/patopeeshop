@extends('frontend.layouts.main')
@section('title','หน้าแรก')
@section('content')
    <div class="owl-carousel nav-style4 nav-center-center " data-nav="true" data-dots="false" data-loop="true"
         data-autoplay="false" data-margin="0" data-responsive='{"0":{"items":1},"600":{"items":2},"1000":{"items":4}}'>
        <div class="banner-text style4">
            <div class="image">
                <a href="#"><img src="images/slides/11-1.png" alt=""></a>
            </div>
            <div class="content-text">
                <h4 class="subtitle">Trending</h4>
                <h3 class="title">Men fashion</h3>
                <a class="shop-now" href="#">shop now!</a>
            </div>
        </div>
        <div class="banner-text style4">
            <div class="image">
                <a href="#"><img src="http://kute-themes.com/html/boutique/html/images/slides/11-1.png" alt=""> </a>
            </div>
            <div class="content-text">
                <h4 class="subtitle">Trending</h4>
                <h3 class="title">autumn fashion</h3>
                <a class="shop-now" href="#">shop now!</a>
            </div>
        </div>
        <div class="banner-text style4">
            <div class="image">
                <a href="#"><img src="images/slides/11-3.png" alt=""></a>
            </div>
            <div class="content-text">
                <h4 class="subtitle">Trending</h4>
                <h3 class="title">autumn fashion</h3>
                <a class="shop-now" href="#">shop now!</a>
            </div>
        </div>
        <div class="banner-text style4">
            <div class="image">
                <a href="#"><img src="images/slides/11-4.png" alt=""></a>
            </div>
            <div class="content-text">
                <h4 class="subtitle">Trending</h4>
                <h3 class="title">Shoe fashion</h3>
                <a class="shop-now" href="#">shop now!</a>
            </div>
        </div>
    </div>
    <div class="margin-top-50">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="element-icon style2">
                        <div class="icon"><i class="flaticon flaticon-origami28"></i></div>
                        <div class="content">
                            <h4 class="title">FREE SHIPPING WORLD WIDE</h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="element-icon style2">
                        <div class="icon"><i class="flaticon flaticon-curvearrows9"></i></div>
                        <div class="content">
                            <h4 class="title">MONEY BACK GUARANTEE</h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="element-icon style2">
                        <div class="icon"><i class="flaticon flaticon-headphones54"></i></div>
                        <div class="content">
                            <h4 class="title">ONLINE SUPPORT 24/7</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <span class="line margin-top-30"></span>
    </div>
    <div class="margin-top-55">
        <div class="container">
            <div class="tab-product tab-product-fade-effect">
                <ul class="box-tabs nav-tab">
                    <li class="active"><a data-animated="" data-toggle="tab" href="#tab-1">สินค้าแนะนำ</a></li>
                    <li><a data-animated="fadeInLeft" data-toggle="tab" href="#tab-2">สินค้าใหม่</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-container">
                        <div id="tab-1" class="tab-panel active">
                            <ul class="product-list-grid2 tab-list owl-carousel-mobile" data-nav="false" data-dots="false"
                                data-margin="0" data-loop="true" data-items="1">
                                <li class="product-item style3 mobile-slide-item col-sm-4 col-md-3">
                                    <div class="product-inner">
                                        <div class="product-thumb has-back-image">
                                            <a href="#"><img src="images/products/11-1.png" alt=""></a>
                                            <a class="back-image" href="#"><img src="images/products/11-2.png" alt=""></a>
                                            <div class="gorup-button">
                                                <a href="#" class="wishlist"><i class="fa fa-heart"></i></a>
                                                <a href="#" class="compare"><i class="fa fa-exchange"></i></a>
                                                <a href="#" class="quick-view"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h3 class="product-name"><a href="#">London Star Sweatshirt</a></h3>
                                            <span class="price">
											<ins>£85.00</ins>
										</span>
                                            <a href="#" class="button add_to_cart_button">ADD TO CART</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="product-item style3 mobile-slide-item col-sm-4 col-md-3">
                                    <div class="product-inner">
                                        <div class="product-thumb has-back-image">
                                            <a href="#"><img src="images/products/11-1.png" alt=""></a>
                                            <a class="back-image" href="#"><img src="images/products/11-2.png" alt=""></a>
                                            <div class="gorup-button">
                                                <a href="#" class="wishlist"><i class="fa fa-heart"></i></a>
                                                <a href="#" class="compare"><i class="fa fa-exchange"></i></a>
                                                <a href="#" class="quick-view"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h3 class="product-name"><a href="#">London Star Sweatshirt</a></h3>
                                            <span class="price">
											<ins>£85.00</ins>
										</span>
                                            <a href="#" class="button add_to_cart_button">ADD TO CART</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="product-item style3 mobile-slide-item col-sm-4 col-md-3">
                                    <div class="product-inner">
                                        <div class="product-thumb has-back-image">
                                            <a href="#"><img src="images/products/11-2.png" alt=""></a>
                                            <a class="back-image" href="#"><img src="images/products/11-2.png" alt=""></a>
                                            <div class="gorup-button">
                                                <a href="#" class="wishlist"><i class="fa fa-heart"></i></a>
                                                <a href="#" class="compare"><i class="fa fa-exchange"></i></a>
                                                <a href="#" class="quick-view"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h3 class="product-name"><a href="#">London Star Sweatshirt</a></h3>
                                            <span class="price">
											<ins>£85.00</ins>
										</span>
                                            <a href="#" class="button add_to_cart_button">ADD TO CART</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="product-item style3 mobile-slide-item col-sm-4 col-md-3">
                                    <div class="product-inner">
                                        <div class="product-thumb has-back-image">
                                            <a href="#"><img src="images/products/11-3.png" alt=""></a>
                                            <a class="back-image" href="#"><img src="images/products/11-2.png" alt=""></a>
                                            <div class="gorup-button">
                                                <a href="#" class="wishlist"><i class="fa fa-heart"></i></a>
                                                <a href="#" class="compare"><i class="fa fa-exchange"></i></a>
                                                <a href="#" class="quick-view"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h3 class="product-name"><a href="#">London Star Sweatshirt</a></h3>
                                            <span class="price">
											<ins>£85.00</ins>
										</span>
                                            <a href="#" class="button add_to_cart_button">ADD TO CART</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="product-item style3 mobile-slide-item col-sm-4 col-md-3">
                                    <div class="product-inner">
                                        <div class="product-thumb has-back-image">
                                            <a href="#"><img src="images/products/11-4.png" alt=""></a>
                                            <a class="back-image" href="#"><img src="images/products/11-2.png" alt=""></a>
                                            <div class="gorup-button">
                                                <a href="#" class="wishlist"><i class="fa fa-heart"></i></a>
                                                <a href="#" class="compare"><i class="fa fa-exchange"></i></a>
                                                <a href="#" class="quick-view"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h3 class="product-name"><a href="#">London Star Sweatshirt</a></h3>
                                            <span class="price">
											<ins>£85.00</ins>
										</span>
                                            <a href="#" class="button add_to_cart_button">ADD TO CART</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="product-item style3 mobile-slide-item col-sm-4 col-md-3">
                                    <div class="product-inner">
                                        <div class="product-thumb has-back-image">
                                            <a href="#"><img src="images/products/11-5.png" alt=""></a>
                                            <a class="back-image" href="#"><img src="images/products/11-2.png" alt=""></a>
                                            <div class="gorup-button">
                                                <a href="#" class="wishlist"><i class="fa fa-heart"></i></a>
                                                <a href="#" class="compare"><i class="fa fa-exchange"></i></a>
                                                <a href="#" class="quick-view"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h3 class="product-name"><a href="#">London Star Sweatshirt</a></h3>
                                            <span class="price">
											<ins>£85.00</ins>
										</span>
                                            <a href="#" class="button add_to_cart_button">ADD TO CART</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="product-item style3 mobile-slide-item col-sm-4 col-md-3">
                                    <div class="product-inner">
                                        <div class="product-thumb has-back-image">
                                            <a href="#"><img src="images/products/11-6.png" alt=""></a>
                                            <a class="back-image" href="#"><img src="images/products/11-2.png" alt=""></a>
                                            <div class="gorup-button">
                                                <a href="#" class="wishlist"><i class="fa fa-heart"></i></a>
                                                <a href="#" class="compare"><i class="fa fa-exchange"></i></a>
                                                <a href="#" class="quick-view"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h3 class="product-name"><a href="#">London Star Sweatshirt</a></h3>
                                            <span class="price">
											<ins>£85.00</ins>
										</span>
                                            <a href="#" class="button add_to_cart_button">ADD TO CART</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="product-item style3 mobile-slide-item col-sm-4 col-md-3">
                                    <div class="product-inner">
                                        <div class="product-thumb has-back-image">
                                            <a href="#"><img src="images/products/11-7.png" alt=""></a>
                                            <a class="back-image" href="#"><img src="images/products/11-2.png" alt=""></a>
                                            <div class="gorup-button">
                                                <a href="#" class="wishlist"><i class="fa fa-heart"></i></a>
                                                <a href="#" class="compare"><i class="fa fa-exchange"></i></a>
                                                <a href="#" class="quick-view"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h3 class="product-name"><a href="#">London Star Sweatshirt</a></h3>
                                            <span class="price">
											<ins>£85.00</ins>
										</span>
                                            <a href="#" class="button add_to_cart_button">ADD TO CART</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <a class="button-loadmore" href="#">load more!</a>
                        </div>
                        <div id="tab-2" class="tab-panel">
                            <ul class="product-list-grid2 tab-list owl-carousel-mobile" data-nav="false" data-dots="false"
                                data-margin="0" data-loop="true" data-items="1">
                                @foreach($products as $product)
                                    <li class="product-item style3 mobile-slide-item col-sm-4 col-md-3">
                                        <div class="product-inner">
                                            <div class="product-thumb has-back-image">
                                                <a href="#"><img src="{{ asset($product->path) }}" alt=""></a>
                                                <a class="back-image" href="#"><img src="{{ asset($product->path) }}" alt=""></a>
                                                <div class="gorup-button">
                                                    <a href="#" class="wishlist"><i class="fa fa-heart"></i></a>
                                                    <a href="#" class="compare"><i class="fa fa-exchange"></i></a>
                                                    <a href="#" class="quick-view"><i class="fa fa-search"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h3 class="product-name"><a href="#">{{ $product->name }}</a></h3>
                                                <span class="price">
											<ins>{{ number_format($product->price) }} บาท</ins>
										</span>
                                                <a href="#" class="button add_to_cart_button">เพิ่มลงรถเข็น</a>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <a class="button-loadmore" href="#">load more!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section-brand-slide margin-bottom-70">
        <div class="container">
            <div class="brands-slide owl-carousel nav-center-center nav-style7" data-nav="true" data-dots="false"
                 data-loop="true" data-margin="60" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":5}}'>
                <a href="#"><img src="images/brands/brand1.png" alt=""></a>
                <a href="#"><img src="images/brands/brand2.png" alt=""></a>
                <a href="#"><img src="images/brands/brand3.png" alt=""></a>
                <a href="#"><img src="images/brands/brand4.png" alt=""></a>
                <a href="#"><img src="images/brands/brand5.png" alt=""></a>
            </div>
        </div>
    </div>
    <div class="container">
        <span class="line margin-top-60"></span>
    </div>
    <div class="margin-top-60 section-lasttest-blog no-border">
        <div class="container">
            <div class="section-title text-center"><h3>Our BLog</h3></div>
            <div class="lastest-blog owl-carousel nav-center-center nav-style7" data-nav="true" data-dots="false"
                 data-loop="true" data-margin="30" data-responsive='{"0":{"items":1},"600":{"items":1},"1000":{"items":2}}'>
                <div class="item-blog">
                    <div class="left">
                        <div class="blog-date">
                            <span class="day">7</span>
                            <span class="month">/SEP</span><br>
                            <span class="year">2015</span>
                        </div>
                        <h3 class="blog-title"><a href="#">We're the best Designers from UK</a></h3>
                        <div class="meta">
                            <span class="author">John Doe</span>
                            <span class="comment"><i class="fa fa-comment"></i> 36 comments</span>
                        </div>
                    </div>
                    <div class="right">
                        <a class="banner-border" href="#"><img src="images/blogs/1.jpg" alt=""></a>
                    </div>
                </div>
                <div class="item-blog">
                    <div class="left">
                        <div class="blog-date">
                            <span class="day">7</span>
                            <span class="month">/SEP</span><br>
                            <span class="year">2015</span>
                        </div>
                        <h3 class="blog-title"><a href="#">We're the best Designers from UK</a></h3>
                        <div class="meta">
                            <span class="author">John Doe</span>
                            <span class="comment"><i class="fa fa-comment"></i> 36 comments</span>
                        </div>
                    </div>
                    <div class="right">
                        <a class="banner-border" href="#"><img src="images/blogs/2.jpg" alt=""></a>
                    </div>
                </div>
                <div class="item-blog">
                    <div class="left">
                        <div class="blog-date">
                            <span class="day">7</span>
                            <span class="month">/SEP</span><br>
                            <span class="year">2015</span>
                        </div>
                        <h3 class="blog-title"><a href="#">We're the best Designers from UK</a></h3>
                        <div class="meta">
                            <span class="author">John Doe</span>
                            <span class="comment"><i class="fa fa-comment"></i> 36 comments</span>
                        </div>
                    </div>
                    <div class="right">
                        <a class="banner-border" href="#"><img src="images/blogs/1.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="text-border margin-bottom-60">
            <p>FREE UK DELIVERY + RETURN OVER £85.00 (EXCLUDING HOMEWARE)| FREE UK COLLECT FROM STORE</p>
        </div>
    </div>
{{--    <div id="tab-1" class="tab tab-active">--}}
{{--        <!-- home -->--}}
{{--    @include('frontend.layouts.navbar')--}}

{{--    <!-- sidebar -->--}}
{{--    @include('frontend.layouts.sidebar')--}}
{{--    <!-- end sidebar -->--}}

{{--        <!-- slider -->--}}
{{--        <div class="slider">--}}
{{--            <div class="container">--}}
{{--                <div data-pagination='{"el": ".swiper-pagination"}' data-space-between="10"--}}
{{--                     class="swiper-container swiper-init swiper-container-horizontal">--}}
{{--                    <div class="swiper-pagination"></div>--}}
{{--                    <div class="swiper-wrapper">--}}
{{--                        <div class="swiper-slide">--}}
{{--                            <div class="content">--}}
{{--                                <img--}}
{{--                                    src="https://laz-img-cdn.alicdn.com/images/ims-web/TB10PfEnFT7gK0jSZFpXXaTkpXa.jpg_2200x2200Q100.jpg_.webp"--}}
{{--                                    alt="">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="swiper-slide">--}}
{{--                            <div class="content">--}}
{{--                                <img--}}
{{--                                    src="https://laz-img-cdn.alicdn.com/images/ims-web/TB1d0zKnHj1gK0jSZFuXXcrHpXa.jpg_1200x1200.jpg"--}}
{{--                                    alt="">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- end slider -->--}}

{{--        <!-- categories home -->--}}
{{--        <div class="categories-home segments">--}}
{{--            <div class="container">--}}
{{--                <div class="section-title">--}}
{{--                    <h3>หมวดหมู่--}}
{{--                        <a href="/categories/" class="view-all-link">ดูทั้งหมด</a>--}}
{{--                    </h3>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    @foreach($catalogs as $catalog)--}}
{{--                        <div class="col-25" style="margin-top: 5%;">--}}
{{--                            <div class="content">--}}
{{--                                <a href="/categories-details/">--}}
{{--                                    <i class="ti-slice"></i>--}}
{{--                                    <span>{{ $catalog->name }}</span>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- end categories home -->--}}

{{--        <!-- divider -->--}}
{{--        <div class="divider"></div>--}}
{{--        <!-- end divider -->--}}

{{--        <!-- divider -->--}}
{{--        <div class="divider"></div>--}}
{{--        <!-- end divider -->--}}

{{--        <!-- product -->--}}
{{--        <div class="product-home segments">--}}
{{--            <div class="container">--}}
{{--                <div class="section-title">--}}
{{--                    <h3>สินค้า--}}
{{--                        <a href="/product/" class="view-all-link">View All</a>--}}
{{--                    </h3>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    @foreach($products as $product)--}}
{{--                        <div class="col-50" style="margin-top: 5%;">--}}
{{--                            <a href="/product-details/{{$product->id }}">--}}
{{--                                <div class="content">--}}
{{--                                    <a href="/product-details/{{$product->id }}">--}}
{{--                                        <img src="{{ asset($product->path) }}" style="height: 20vh;" alt="">--}}
{{--                                    </a>--}}
{{--                                    <div class="text">--}}
{{--                                        <a href="/product-details/{{$product->id }}"><p>{{ $product->name }}</p></a>--}}
{{--                                        <span class="price">{{ number_format($product->price,2) }} บาท</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- end product -->--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div id="tab-2" class="tab">--}}

{{--        <!-- navbar page -->--}}
{{--        <div class="navbar navbar-page">--}}
{{--            <div class="navbar-inner sliding">--}}
{{--                <div class="title">--}}
{{--                    Wishlist--}}
{{--                </div>--}}
{{--                <div class="right">--}}
{{--                    <a href="/search/"><i class="ti-search"></i></a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- end navbar page -->--}}

{{--        <!-- wishlist -->--}}
{{--        <div class="wishlist segments">--}}
{{--            <div class="container">--}}
{{--                <div class="wrap-content">--}}
{{--                    <div class="list">--}}
{{--                        <ul>--}}
{{--                            <li class="swipeout">--}}
{{--                                <div class="item-content swipeout-content">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-25">--}}
{{--                                            <div class="content-image">--}}
{{--                                                <img src="images/wishlist1.jpg" alt="">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-50">--}}
{{--                                            <div class="content-text">--}}
{{--                                                <a href="/product-details/"><p>Anti-hot Motorcycle Gloves. Import</p>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-25">--}}
{{--                                            <div class="content-info">--}}
{{--                                                <span class="price">$22.00</span>--}}
{{--                                                <span class="wishlist-status">Avaible</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="swipeout-actions-left">--}}
{{--                                    <a href="#" @click="showToastBottom"><i class="ti-shopping-cart"></i></a>--}}
{{--                                </div>--}}
{{--                                <div class="swipeout-actions-right">--}}
{{--                                    <a href="#" class="swipeout-delete"><i class="ti-trash"></i></a>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="wrap-content">--}}
{{--                    <div class="list">--}}
{{--                        <ul>--}}
{{--                            <li class="swipeout">--}}
{{--                                <div class="item-content swipeout-content">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-25">--}}
{{--                                            <div class="content-image">--}}
{{--                                                <img src="images/wishlist2.jpg" alt="">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-50">--}}
{{--                                            <div class="content-text">--}}
{{--                                                <a href="/product-details/"><p>Mountain Shoes - Middle to Low Hiking</p>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-25">--}}
{{--                                            <div class="content-info">--}}
{{--                                                <span class="price">$44.00</span>--}}
{{--                                                <span class="wishlist-status">Avaible</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="swipeout-actions-left">--}}
{{--                                    <a href="#" @click="showToastBottom"><i class="ti-shopping-cart"></i></a>--}}
{{--                                </div>--}}
{{--                                <div class="swipeout-actions-right">--}}
{{--                                    <a href="#" class="swipeout-delete"><i class="ti-trash"></i></a>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="wrap-content">--}}
{{--                    <div class="list">--}}
{{--                        <ul>--}}
{{--                            <li class="swipeout">--}}
{{--                                <div class="item-content swipeout-content">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-25">--}}
{{--                                            <div class="content-image">--}}
{{--                                                <img src="images/wishlist3.jpg" alt="">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-50">--}}
{{--                                            <div class="content-text">--}}
{{--                                                <a href="/product-details/"><p>Soft Gaming Chair, Strong and Durable</p>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-25">--}}
{{--                                            <div class="content-info">--}}
{{--                                                <span class="price">$66.00</span>--}}
{{--                                                <span class="wishlist-status">Avaible</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="swipeout-actions-left">--}}
{{--                                    <a href="#" @click="showToastBottom"><i class="ti-shopping-cart"></i></a>--}}
{{--                                </div>--}}
{{--                                <div class="swipeout-actions-right">--}}
{{--                                    <a href="#" class="swipeout-delete"><i class="ti-trash"></i></a>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="wrap-content">--}}
{{--                    <div class="list">--}}
{{--                        <ul>--}}
{{--                            <li class="swipeout">--}}
{{--                                <div class="item-content swipeout-content">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-25">--}}
{{--                                            <div class="content-image">--}}
{{--                                                <img src="images/wishlist4.jpg" alt="">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-50">--}}
{{--                                            <div class="content-text">--}}
{{--                                                <a href="/product-details/"><p>Limited Edition Backpacks 1 variant</p>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-25">--}}
{{--                                            <div class="content-info">--}}
{{--                                                <span class="price">$41.00</span>--}}
{{--                                                <span class="wishlist-status">Avaible</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="swipeout-actions-left">--}}
{{--                                    <a href="#" @click="showToastBottom"><i class="ti-shopping-cart"></i></a>--}}
{{--                                </div>--}}
{{--                                <div class="swipeout-actions-right">--}}
{{--                                    <a href="#" class="swipeout-delete"><i class="ti-trash"></i></a>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="wrap-content">--}}
{{--                    <div class="list">--}}
{{--                        <ul>--}}
{{--                            <li class="swipeout no-mb">--}}
{{--                                <div class="item-content swipeout-content">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-25">--}}
{{--                                            <div class="content-image">--}}
{{--                                                <img src="images/wishlist5.jpg" alt="">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-50">--}}
{{--                                            <div class="content-text">--}}
{{--                                                <a href="/product-details/"><p>Jacket Casual For Men or Women</p></a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-25">--}}
{{--                                            <div class="content-info">--}}
{{--                                                <span class="price">$50.00</span>--}}
{{--                                                <span class="wishlist-status status-sold">Sold</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="swipeout-actions-left">--}}
{{--                                    <a href="#" @click="showToastBottom"><i class="ti-shopping-cart"></i></a>--}}
{{--                                </div>--}}
{{--                                <div class="swipeout-actions-right">--}}
{{--                                    <a href="#" class="swipeout-delete"><i class="ti-trash"></i></a>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- end wishlist -->--}}
{{--    </div>--}}
{{--    <div id="tab-4" class="tab">--}}

{{--        <!-- navbar page -->--}}
{{--        <div class="navbar navbar-page">--}}
{{--            <div class="navbar-inner sliding">--}}
{{--                <div class="title">--}}
{{--                    รถเข็นของฉัน--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- end navbar page -->--}}

{{--        <!-- cart -->--}}
{{--        <div class="cart segments">--}}
{{--            <div class="container">--}}
{{--                <div id="order-content">--}}
{{--                </div>--}}
{{--                <div class="wrap-action-cart">--}}
{{--                    <ul>--}}
{{--                        <li class="content-total">--}}
{{--                            <h6>ราคารวม : <span id="total">0 บาท</span></h6>--}}
{{--                        </li>--}}
{{--                        <li class="content-button">--}}
{{--                            --}}{{--                            href="/checkout/"--}}
{{--                            <a onclick="checkout()" class="button">ชำระเงิน</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- end cart -->--}}
{{--    </div>--}}

{{--    <div id="tab-5" class="tab">--}}

{{--        <!-- navbar page -->--}}
{{--        <div class="navbar navbar-page">--}}
{{--            <div class="navbar-inner sliding">--}}
{{--                <div class="title">--}}
{{--                    Transaction--}}
{{--                </div>--}}
{{--                <div class="right">--}}
{{--                    <a href=""><i class="ti-info-alt"></i></a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- end navbar page -->--}}

{{--        <!-- transaction -->--}}
{{--        <div class="transaction segments">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-25">--}}
{{--                        <div class="content-image">--}}
{{--                            <img src="images/product1.jpg" alt="">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-50">--}}
{{--                        <div class="content-text">--}}
{{--                            <a href="/product-details/">--}}
{{--                                <p>Original Sweater With 100% Wool Fabric</p>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-25">--}}
{{--                        <div class="content-info">--}}
{{--											<span class="price">--}}
{{--												$30.00--}}
{{--											</span>--}}
{{--                            <span class="transaction-status">COMPLETED</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-25">--}}
{{--                        <div class="content-image">--}}
{{--                            <img src="images/product2.jpg" alt="">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-50">--}}
{{--                        <div class="content-text">--}}
{{--                            <a href="/product-details/">--}}
{{--                                <p>Running Watches for Men in a Modern Style</p>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-25">--}}
{{--                        <div class="content-info">--}}
{{--											<span class="price">--}}
{{--												$60.00--}}
{{--											</span>--}}
{{--                            <span class="transaction-status">COMPLETED</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-25">--}}
{{--                        <div class="content-image">--}}
{{--                            <img src="images/product3.jpg" alt="">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-50">--}}
{{--                        <div class="content-text">--}}
{{--                            <a href="/product-details/">--}}
{{--                                <p>Gamepad New Design With Modern Style</p>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-25">--}}
{{--                        <div class="content-info">--}}
{{--											<span class="price">--}}
{{--												$33.00--}}
{{--											</span>--}}
{{--                            <span class="transaction-status">COMPLETED</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-25">--}}
{{--                        <div class="content-image">--}}
{{--                            <img src="images/product4.jpg" alt="">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-50">--}}
{{--                        <div class="content-text">--}}
{{--                            <a href="/product-details/">--}}
{{--                                <p>Casual Dress Shirt Men Long Sleeves</p>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-25">--}}
{{--                        <div class="content-info">--}}
{{--											<span class="price">--}}
{{--												$30.00--}}
{{--											</span>--}}
{{--                            <span class="transaction-status">COMPLETED</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-25">--}}
{{--                        <div class="content-image">--}}
{{--                            <img src="images/product5.jpg" alt="">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-50">--}}
{{--                        <div class="content-text">--}}
{{--                            <a href="/product-details/">--}}
{{--                                <p>Limited Edition Backpacks 1 variant</p>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-25">--}}
{{--                        <div class="content-info">--}}
{{--											<span class="price">--}}
{{--												$41.00--}}
{{--											</span>--}}
{{--                            <span class="transaction-status">COMPLETED</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-25">--}}
{{--                        <div class="content-image">--}}
{{--                            <img src="images/product6.jpg" alt="">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-50">--}}
{{--                        <div class="content-text">--}}
{{--                            <a href="/product-details/">--}}
{{--                                <p>Jacket Casual For Men or Women</p>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-25">--}}
{{--                        <div class="content-info">--}}
{{--											<span class="price">--}}
{{--												$50.00--}}
{{--											</span>--}}
{{--                            <span class="transaction-status">COMPLETED</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- end transaction -->--}}
{{--    </div>--}}

{{--    <div id="tab-6" class="tab">--}}

{{--        <!-- navbar page -->--}}
{{--        <div class="navbar navbar-page">--}}
{{--            <div class="navbar-inner sliding">--}}
{{--                <div class="title">--}}
{{--                    My Account--}}
{{--                </div>--}}
{{--                <div class="right">--}}
{{--                    <a href="/settings/"><i class="ti-settings"></i></a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- end navbar page -->--}}

{{--        <!-- account buyer -->--}}
{{--        <div class="account-buyer segments">--}}
{{--            <div class="header">--}}
{{--                <div class="mask"></div>--}}
{{--                <img src="images/banner2.jpg" alt="">--}}
{{--                <div class="user-caption">--}}
{{--                    <img src="images/comment1.png" alt="">--}}
{{--                    <div class="title-name">--}}
{{--                        <h5>Robin Smith</h5>--}}
{{--                        <a href="/edit-profile/">Edit Profile</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="info-balance segments">--}}
{{--                <div class="container">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-50">--}}
{{--                            <div class="content">--}}
{{--                                <span>Your Balance</span>--}}
{{--                                <h5>$120.00</h5>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-50">--}}
{{--                            <div class="content">--}}
{{--                                <button class="button">Top Up</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="account-menu">--}}
{{--                <div class="list links-list">--}}
{{--                    <ul>--}}
{{--                        <li>--}}
{{--                            <a href="/notification/" class="panel-close">--}}
{{--                                <div class="item-media">--}}
{{--                                    <i class="ti-bell"></i>--}}
{{--                                </div>--}}
{{--                                <div class="item-inner">--}}
{{--                                    <div class="item-title">--}}
{{--                                        Notification--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="/cart/" class="panel-close">--}}
{{--                                <div class="item-media">--}}
{{--                                    <i class="ti-shopping-cart"></i>--}}
{{--                                </div>--}}
{{--                                <div class="item-inner">--}}
{{--                                    <div class="item-title">--}}
{{--                                        My Cart--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="/wishlist/" class="panel-close">--}}
{{--                                <div class="item-media">--}}
{{--                                    <i class="ti-heart"></i>--}}
{{--                                </div>--}}
{{--                                <div class="item-inner">--}}
{{--                                    <div class="item-title">--}}
{{--                                        My Wishlist--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="/transaction/" class="panel-close">--}}
{{--                                <div class="item-media">--}}
{{--                                    <i class="ti-control-shuffle"></i>--}}
{{--                                </div>--}}
{{--                                <div class="item-inner">--}}
{{--                                    <div class="item-title">--}}
{{--                                        Transaction--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="/settings/" class="panel-close">--}}
{{--                                <div class="item-media">--}}
{{--                                    <i class="ti-settings"></i>--}}
{{--                                </div>--}}
{{--                                <div class="item-inner">--}}
{{--                                    <div class="item-title">--}}
{{--                                        Settings--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="/about/" class="panel-close">--}}
{{--                                <div class="item-media">--}}
{{--                                    <i class="ti-info-alt"></i>--}}
{{--                                </div>--}}
{{--                                <div class="item-inner">--}}
{{--                                    <div class="item-title">--}}
{{--                                        About--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="/contact/" class="panel-close">--}}
{{--                                <div class="item-media">--}}
{{--                                    <i class="ti-email"></i>--}}
{{--                                </div>--}}
{{--                                <div class="item-inner">--}}
{{--                                    <div class="item-title">--}}
{{--                                        Contact--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="/index/" class="panel-close">--}}
{{--                                <div class="item-media">--}}
{{--                                    <i class="ti-power-off"></i>--}}
{{--                                </div>--}}
{{--                                <div class="item-inner">--}}
{{--                                    <div class="item-title">--}}
{{--                                        Logout--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- end account buyer -->--}}
{{--    </div>--}}
{{--@endsection--}}
{{--@section('script')--}}
{{--    <script type="text/html" id="template">--}}
{{--        <div class="wrap-content" id="order-id-orderId">--}}
{{--            <input type="hidden" name="orders[]" id="orders-id-index" value="">--}}
{{--            <div class="row">--}}
{{--                <div class="col-25">--}}
{{--                    <div class="content-image">--}}
{{--                        <img src="$image" alt="">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-55">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-100">--}}
{{--                            <div class="content-text">--}}
{{--                                <a href="/product-details/$id">$name</a>--}}
{{--                            </div>--}}
{{--                            <br>--}}
{{--                        </div>--}}
{{--                        <div class="col-35">--}}
{{--                            <p style="float: right;">ขนาด :</p>--}}
{{--                        </div>--}}
{{--                        <div class="col-65">--}}
{{--                            <div class="input input-dropdown" style="width: 100%;">--}}
{{--                                <select name="sizes[]" id="size-id-index" onchange="getColor($id,orderId)">--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-35">--}}
{{--                            <p style="float: right;">สี :</p>--}}
{{--                        </div>--}}
{{--                        <div class="col-65">--}}
{{--                            <div class="input input-dropdown" style="width: 100%;">--}}
{{--                                <select name="colors[]" id="color-id-index" onchange="getProductDetail($id,orderId)">--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-35">--}}
{{--                            <p style="float: right;">ในคลัง :</p>--}}
{{--                        </div>--}}
{{--                        <div class="col-65">--}}
{{--                            <p><span id="quality-id-index">0</span> ชิ้น</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-20">--}}
{{--                    <div class="content-info">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-100">--}}
{{--                                <span class="price" id="price-id-index">0</span>--}}
{{--                                <form class="list">--}}
{{--                                    <div class="item-input-wrap">--}}
{{--                                        <input id="amount-id-index" name="amount[]" type="number" value="1">--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                            <div class="col-100">--}}
{{--                                <button onclick="deleteItem(orderId)" class="button" style="background-color: #d52a29;">--}}
{{--                                    <i--}}
{{--                                        class="ti-trash ti"></i></button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <!-- small divider -->--}}
{{--        <div class="small-divider"></div>--}}
{{--        <!-- end  small divider -->--}}
{{--    </script>--}}
{{--    <script>--}}
{{--        function getProductDetail(pid, index) {--}}
{{--            let color = $('#color-id-' + index);--}}
{{--            let size = $('#size-id-' + index);--}}
{{--            axios.post("/api/cart/product/details", {'size': size.val(), 'pid': pid, 'color': color.val()})--}}
{{--                .then(function (response) {--}}
{{--                    let result = response.data;--}}
{{--                    console.log(result.id);--}}
{{--                    $('#quality-id-' + index).html(result.quality);--}}
{{--                    $('#price-id-' + index).html(result.price);--}}
{{--                    $('#amount-id-' + index).val(1);--}}
{{--                    let total = $('#total').html();--}}
{{--                    total = parseInt(total, 10);--}}
{{--                    total += result.price;--}}
{{--                    $('#total').html(total);--}}
{{--                    var aid = sessionStorage.getItem('checkout') ? JSON.parse(sessionStorage.getItem('checkout')) : [];--}}
{{--                    aid.push({index: index, aid: result.id, amount: 1});--}}
{{--                    sessionStorage.setItem('checkout', JSON.stringify(aid));--}}
{{--                    $('#orders-id-' + index).val(result.id)--}}
{{--                })--}}
{{--        }--}}

{{--        function getColor(pid, index) {--}}
{{--            let color = $('#color-id-' + index);--}}
{{--            let size = $('#size-id-' + index);--}}
{{--            color.html('');--}}
{{--            axios.post("/api/cart/colors", {'size': size.val(), 'pid': pid})--}}
{{--                .then(function (response) {--}}
{{--                    response.data.forEach((data) => {--}}
{{--                        color.append($("<option>").attr('value', data.color_id).text(data.color_name));--}}
{{--                    });--}}
{{--                    color.append($("<option>").attr('value', 0).text('โปรดเลือกสี'));--}}
{{--                })--}}
{{--        }--}}

{{--        function deleteItem(id) {--}}
{{--            var items = sessionStorage.getItem('shoppingCart') ? JSON.parse(sessionStorage.getItem('shoppingCart')) : [];--}}
{{--            let total = parseInt($('#total').html(), 10);--}}
{{--            let price = parseInt($('#price-id-' + id).html(), 10);--}}
{{--            total -= price;--}}
{{--            $('#total').html(total);--}}
{{--            items.splice(id, 1);--}}
{{--            sessionStorage.setItem('shoppingCart', JSON.stringify(items));--}}
{{--            cart();--}}
{{--        }--}}

{{--        function cart() {--}}
{{--            $('#order-content').html('');--}}
{{--            var items = sessionStorage.getItem('shoppingCart') ? JSON.parse(sessionStorage.getItem('shoppingCart')) : [];--}}
{{--            // var size = $('#');--}}
{{--            axios.post("/api/cart/products", {'pids': items})--}}
{{--                .then(function (response) {--}}
{{--                    response.data.forEach((result, index) => {--}}
{{--                        let order = $('#template').html().replace(/id-index/g, 'id-' + index).replace(/orderId/g, index).replace('$id', result.id).replace('$id', result.id).replace('$id', result.id).replace('$image', result.image).replace('$name', result.name ? result.name : '-');--}}
{{--                        $('#order-content').append(order);--}}
{{--                        let size = $('#size-id-' + index);--}}
{{--                        result.attribute.forEach((result, index) => {--}}
{{--                            size.append($("<option>").attr('value', result.size_id).text(result.size));--}}
{{--                        });--}}
{{--                        size.append($("<option selected=selected>").attr('value', 0).text('โปรดเลือกขนาด'));--}}
{{--                    });--}}
{{--                    // let sizes = response.data--}}
{{--                    // size.html('');--}}
{{--                    // size.append($("<option>").attr('value',0).text('โปรดเลือกขนาด'));--}}
{{--                    // sizes.forEach(data => {--}}
{{--                    //     size.append($("<option>").attr('value',data.size_id).text(data.size_name));--}}
{{--                    // })--}}
{{--                })--}}
{{--        }--}}
{{--    </script>--}}
{{--    <script>--}}
{{--        async function checkout() {--}}
{{--            let form = sessionStorage.getItem('checkout') ? JSON.parse(sessionStorage.getItem('checkout')) : [];--}}
{{--            await axios.post('/api/checkout',{data:form}).then((res) => {--}}
{{--                console.log(res.data)--}}
{{--            })--}}
{{--            // await showProvinces()--}}
{{--        }--}}

{{--        async function showProvinces() {--}}
{{--            //PARAMETERS--}}
{{--            var url = "/api/province";--}}
{{--            await axios.get(url)--}}
{{--                .then((results) => {--}}
{{--                    let province = $("#input_province");--}}
{{--                    province.empty();--}}
{{--                    results.data.forEach((result, index) => {--}}
{{--                        if (index === results.data.length - 1)--}}
{{--                            province.append($("<option selected>").attr('value', result.province_code).text(result.province));--}}
{{--                        else--}}
{{--                            province.append($("<option>").attr('value', result.province_code).text(result.province));--}}
{{--                    });--}}
{{--                })--}}
{{--            await showAmphoes();--}}
{{--        }--}}

{{--        function showAmphoes() {--}}
{{--            let province = $("#input_province");--}}
{{--            //INPUT--}}
{{--            var province_code = province.val();--}}
{{--            //PARAMETERS--}}
{{--            var url = "/api/province/" + province_code + "/amphoe";--}}
{{--            axios.get(url)--}}
{{--                .then((results) => {--}}
{{--                    let amphoe = $('#input_amphoe');--}}
{{--                    amphoe.empty();--}}
{{--                    results.data.forEach((result, index) => {--}}
{{--                        if (index === results.data.length - 1)--}}
{{--                            amphoe.append($("<option selected>").attr('value', result.amphoe_code).text(result.amphoe));--}}
{{--                        else--}}
{{--                            amphoe.append($("<option>").attr('value', result.amphoe_code).text(result.amphoe));--}}
{{--                    });--}}
{{--                    showDistricts();--}}
{{--                })--}}
{{--        }--}}

{{--        function showDistricts() {--}}
{{--            //INPUT--}}
{{--            var province_code = $("#input_province").val();--}}
{{--            var amphoe_code = $("#input_amphoe").val();--}}
{{--            //PARAMETERS--}}
{{--            var url = "/api/province/" + province_code + "/amphoe/" + amphoe_code + "/district";--}}
{{--            axios.get(url)--}}
{{--                .then((results) => {--}}
{{--                    let result = results.data;--}}
{{--                    $("#input_district").empty();--}}
{{--                    for (var i = 0; i < result.length; i++) {--}}
{{--                        $("#input_district").append(--}}
{{--                            $('<option></option>')--}}
{{--                                .attr("value", "" + result[i].district_code)--}}
{{--                                .html("" + result[i].district)--}}
{{--                        );--}}
{{--                    }--}}
{{--                    showZipcode();--}}
{{--                })--}}
{{--        }--}}

{{--        function showZipcode() {--}}
{{--            //INPUT--}}
{{--            var province_code = $("#input_province").val();--}}
{{--            var amphoe_code = $("#input_amphoe").val();--}}
{{--            var district_code = $("#input_district").val();--}}
{{--            //PARAMETERS--}}
{{--            var url = "/api/province/" + province_code + "/amphoe/" + amphoe_code + "/district/" + district_code;--}}
{{--            axios.get(url)--}}
{{--                .then((results) => {--}}
{{--                    let result = results.data--}}
{{--                    for (var i = 0; i < result.length; i++) {--}}
{{--                        $("#input_zipcode").val(result[i].zipcode);--}}
{{--                    }--}}
{{--                })--}}
{{--        }--}}
{{--    </script>--}}
@endsection
