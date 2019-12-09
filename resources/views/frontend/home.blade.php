@extends('frontend.layouts.main')
@section('title','หน้าแรก')
@section('content')
    <div class="owl-carousel nav-style4 nav-center-center " data-nav="true" data-dots="false" data-loop="true"
         data-autoplay="false" data-margin="0" data-responsive='{"0":{"items":1},"600":{"items":2},"1000":{"items":4}}'>
        @foreach($catalogs as $catalog)
            <div class="banner-text style4">
                <div class="image">
                    <a href="#"><img src="http://kute-themes.com/html/boutique/html/images/slides/11-1.png" alt=""> </a>
                </div>
                <div class="content-text">
                    <h4 class="subtitle">Categories</h4>
                    <h3 class="title">{{ $catalog->name }}</h3>
                    <a class="shop-now" href="#">ดูสินค้า</a>
                </div>
            </div>
        @endforeach
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
                                                <a href="/product/{{$product->id}}"><img src="{{ asset($product->path) }}" alt=""></a>
                                                <a class="back-image" href="/product/{{$product->id}}"><img src="{{ asset($product->path) }}" alt=""></a>
                                                <div class="gorup-button">
                                                    <a href="/product/{{$product->id}}" class="wishlist"><i class="fa fa-heart"></i></a>
                                                    <a href="/product/{{$product->id}}" class="quick-view"><i class="fa fa-search"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h3 class="product-name"><a href="#">{{ $product->name }}</a></h3>
                                                <span class="price">
											<ins>{{ number_format($product->price) }} บาท</ins>
										</span>
                                                <a href="#" data-toggle="modal"
                                                   data-title="{{ $product->name }}" data-product-id="{{ $product->id }}" data-target="#addOrderModal" class="button add_to_cart_button">เพิ่มลงรถเข็น</a>
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
@endsection
