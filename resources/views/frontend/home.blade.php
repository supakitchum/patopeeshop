@extends('frontend.layouts.main')
@section('title','หน้าแรก')
@section('content')
    <div class="col-full">
        <div class="row">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="homev6-slider-with-banners row">
                        <div class="slider-block column-1">
                            <div class="home-v6-slider home-slider">
                                <div class="slider-1">
                                    <img src="assets/images/slider/home-v6-img-1.png" alt="">
                                    <div class="caption">
                                        <div class="pre-title">12 Days of Deals </div>
                                        <div class="title">Brilliant features, brilliant price. Efficient in every way.</div>
                                        <div class="offer-price">$339.99</div>
                                        <div class="sale-price">$689</div>
                                        <div class="button">Browse now
                                            <i class="tm tm-long-arrow-right"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="slider-1">
                                    <img src="assets/images/slider/home-v6-img-1.png" alt="">
                                    <div class="caption">
                                        <div class="pre-title">12 Days of Deals </div>
                                        <div class="title">Brilliant features, brilliant price. Efficient in every way.</div>
                                        <div class="offer-price">$339.99</div>
                                        <div class="sale-price">$689</div>
                                        <div class="button">Browse now
                                            <i class="tm tm-long-arrow-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="banners-block column-2">
                            <div class="banner text-in-left">
                                <a href="shop.html">
                                    <div style="background-size: cover; background-position: center center; background-image: url( assets/images/banner/ban-1.jpg ); height: 204px;" class="banner-bg">
                                        <div class="caption">
                                            <div class="banner-info">
                                                <h3 class="title">New Arrivals
                                                    <br> in
                                                    <strong>Accessories</strong>
                                                    <br> at Best Prices</h3>
                                            </div>
                                            <!-- .banner-info -->
                                            <span class="price">
                                                            <span class="start_price">from</span>$13.79</span>
                                        </div>
                                        <!-- .caption -->
                                    </div>
                                    <!-- .banner-bg -->
                                </a>
                            </div>
                            <!-- .banner -->
                            <div class="banner text-in-left">
                                <a href="shop.html">
                                    <div style="background-size: cover; background-position: center center; background-image: url( assets/images/banner/ban-2.jpg ); height: 204px;" class="banner-bg">
                                        <div class="caption">
                                            <div class="banner-info">
                                                <h4 class="pretitle">Feat Category</h4>
                                                <h3 class="title">catch Best
                                                    <br>
                                                    <strong>Deals</strong>on the
                                                    <br> Curved TVs
                                                    <br>Entertainment</h3>
                                            </div>
                                            <!-- .banner-info -->
                                        </div>
                                        <!-- .caption -->
                                    </div>
                                    <!-- .banner-bg -->
                                </a>
                            </div>
                            <!-- .banner -->
                            <div class="banner text-in-left">
                                <a href="shop.html">
                                    <div style="background-size: cover; background-position: center center; background-image: url( assets/images/banner/ban-3.jpg ); height: 204px;" class="banner-bg">
                                        <div class="caption">
                                            <div class="banner-info">
                                                <h3 class="title">
                                                    <strong>20% Off Tech</strong>
                                                    <br> at Ultrabooks,
                                                    <br> Laptops, Tablets
                                                    <br>Notebooks &amp;
                                                    <br>More</h3>
                                            </div>
                                            <!-- .banner-info -->
                                        </div>
                                        <!-- .caption -->
                                    </div>
                                    <!-- .banner-bg -->
                                </a>
                            </div>
                            <!-- .banner -->
                            <div class="banner text-in-left">
                                <a href="shop.html">
                                    <div style="background-size: cover; background-position: center center; background-image: url( assets/images/banner/ban-4.jpg ); height: 204px;" class="banner-bg">
                                        <div class="caption">
                                            <div class="banner-info">
                                                <h4 class="pretitle">Best Gift Idea</h4>
                                                <h3 class="title">Mini Two Wheel
                                                    <br>
                                                    <strong>Self Balancing</strong>
                                                    <br> Scooter</h3>
                                            </div>
                                            <!-- .banner-info -->
                                            <span class="price">
                                                            <ins>
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span class="woocommerce-Price-currencySymbol">£</span>339.99</span>
                                                            </ins>
                                                            <del>
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span class="woocommerce-Price-currencySymbol">£</span>689</span>
                                                            </del>
                                                        </span>
                                        </div>
                                        <!-- .caption -->
                                    </div>
                                    <!-- .banner-bg -->
                                </a>
                            </div>
                            <!-- .banner -->
                        </div>
                        <!-- .banners-block -->
                    </div>
                    <section class="section-top-categories section-categories-carousel" id="categories-carousel-3">
                        <header class="section-header">
                            <h2 class="section-title">Top
                                <br>categories
                                <br>this week</h2>
                            <nav class="custom-slick-nav"></nav>
                            <!-- .custom-slick-nav -->
                        </header>
                        <!-- .section-header -->
                        <div class="product-categories product-categories-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:6,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#categories-carousel-3 .custom-slick-nav&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:750,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}}]}">
                            <div class="woocommerce columns-6">
                                <div class="products">
                                    <div class="product-category product">
                                        <a href="product-category.html">
                                            <img width="224" height="197" alt="Fashion" src="assets/images/category/sm-1.png">
                                            <h2 class="woocommerce-loop-category__title"> All in One PC </h2>
                                        </a>
                                    </div>
                                    <div class="product-category product">
                                        <a href="product-category.html">
                                            <img width="224" height="197" alt="Footwear" src="assets/images/category/sm-2.png">
                                            <h2 class="woocommerce-loop-category__title"> Audio & Music </h2>
                                        </a>
                                    </div>
                                    <div class="product-category product">
                                        <a href="product-category.html">
                                            <img width="224" height="197" alt="Furnitures" src="assets/images/category/sm-3.png">
                                            <h2 class="woocommerce-loop-category__title"> Cells & Tablets </h2>
                                        </a>
                                    </div>
                                    <div class="product-category product">
                                        <a href="product-category.html">
                                            <img width="224" height="197" alt="Perfumes" src="assets/images/category/sm-4.png">
                                            <h2 class="woocommerce-loop-category__title"> Computers & Laptops </h2>
                                        </a>
                                    </div>
                                    <div class="product-category product">
                                        <a href="product-category.html">
                                            <img width="224" height="197" alt="Power Tools" src="assets/images/category/sm-5.png">
                                            <h2 class="woocommerce-loop-category__title"> Desktop PCs </h2>
                                        </a>
                                    </div>
                                    <div class="product-category product">
                                        <a href="product-category.html">
                                            <img width="224" height="197" alt="Smart Appliances" src="assets/images/category/sm-6.png">
                                            <h2 class="woocommerce-loop-category__title"> Digital Cameras </h2>
                                        </a>
                                    </div>
                                    <div class="product-category product">
                                        <a href="product-category.html">
                                            <img width="224" height="197" alt="Perfumes" src="assets/images/category/sm-4.png">
                                            <h2 class="woocommerce-loop-category__title"> Computers & Laptops </h2>
                                        </a>
                                    </div>
                                </div>
                                <!-- .products-->
                            </div>
                            <!-- .woocommerce-->
                        </div>
                        <!-- .product-categories -->
                    </section>
                    <!-- .section-top-categories -->
                    <section class="section-single-carousel-with-tab-product type-2">
                        <div class="row">
                            <section class="column-1 section-double-carousel" id="section-double-carousel">
                                <header class="section-header">
                                    <h2 class="section-title">Trending Now</h2>
                                    <nav class="custom-slick-nav"></nav>
                                    <!-- .custom-slick-nav -->
                                </header>
                                <!-- .section-header -->
                                <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#section-double-carousel .custom-slick-nav&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:750,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1}}]}">
                                    <div class="container-fluid">
                                        <div class="woocommerce columns-1">
                                            <div class="products">
                                                <div class="product">
                                                    <div class="yith-wcwl-add-to-wishlist">
                                                        <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                    </div>
                                                    <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <span class="onsale">
                                                                        <span class="woocommerce-Price-amount amount">
                                                                            <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                    </span>
                                                        <img src="assets/images/products/2.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                        <span class="price">
                                                                        <ins>
                                                                            <span class="amount"> 309.95</span>
                                                                        </ins>
                                                                        <del>
                                                                            <span class="amount">459.00</span>
                                                                        </del>
                                                                        <span class="amount"> </span>
                                                                    </span>
                                                        <!-- /.price -->
                                                        <h2 class="woocommerce-loop-product__title">ZenBook 3 Ultrabook 8GB 512SSD W10</h2>
                                                    </a>
                                                    <div class="hover-area">
                                                        <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                        <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                    </div>
                                                </div>
                                                <!-- /.product-outer -->
                                                <div class="product">
                                                    <div class="yith-wcwl-add-to-wishlist">
                                                        <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                    </div>
                                                    <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <span class="onsale">
                                                                        <span class="woocommerce-Price-amount amount">
                                                                            <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                    </span>
                                                        <img src="assets/images/products/7.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                        <span class="price">
                                                                        <ins>
                                                                            <span class="amount"> 789.95</span>
                                                                        </ins>
                                                                        <del>
                                                                            <span class="amount">999.00</span>
                                                                        </del>
                                                                        <span class="amount"> </span>
                                                                    </span>
                                                        <!-- /.price -->
                                                        <h2 class="woocommerce-loop-product__title">Bluetooth on-ear PureBass Headphones</h2>
                                                    </a>
                                                    <div class="hover-area">
                                                        <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                        <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                    </div>
                                                </div>
                                                <!-- /.product-outer -->
                                                <div class="product">
                                                    <div class="yith-wcwl-add-to-wishlist">
                                                        <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                    </div>
                                                    <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                        <img src="assets/images/products/12.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                        <span class="price">
                                                                        <ins>
                                                                            <span class="amount"> </span>
                                                                        </ins>
                                                                        <span class="amount"> 456.00</span>
                                                                    </span>
                                                        <!-- /.price -->
                                                        <h2 class="woocommerce-loop-product__title">Bbd 23-Inch Screen LED-Lit Monitorss Buds</h2>
                                                    </a>
                                                    <div class="hover-area">
                                                        <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                        <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                    </div>
                                                </div>
                                                <!-- /.product-outer -->
                                                <div class="product">
                                                    <div class="yith-wcwl-add-to-wishlist">
                                                        <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                    </div>
                                                    <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                        <img src="assets/images/products/15.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                        <span class="price">
                                                                        <ins>
                                                                            <span class="amount"> </span>
                                                                        </ins>
                                                                        <span class="amount"> 399.00</span>
                                                                    </span>
                                                        <!-- /.price -->
                                                        <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                    </a>
                                                    <div class="hover-area">
                                                        <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                        <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                    </div>
                                                </div>
                                                <!-- /.product-outer -->
                                                <div class="product">
                                                    <div class="yith-wcwl-add-to-wishlist">
                                                        <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                    </div>
                                                    <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                        <img src="assets/images/products/9.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                        <span class="price">
                                                                        <ins>
                                                                            <span class="amount"> </span>
                                                                        </ins>
                                                                        <span class="amount"> 456.00</span>
                                                                    </span>
                                                        <!-- /.price -->
                                                        <h2 class="woocommerce-loop-product__title">Watch Stainless with Grey Suture Leather Strap</h2>
                                                    </a>
                                                    <div class="hover-area">
                                                        <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                        <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                    </div>
                                                </div>
                                                <!-- /.product-outer -->
                                                <div class="product">
                                                    <div class="yith-wcwl-add-to-wishlist">
                                                        <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                    </div>
                                                    <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                        <img src="assets/images/products/11.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                        <span class="price">
                                                                        <ins>
                                                                            <span class="amount"> </span>
                                                                        </ins>
                                                                        <span class="amount"> 456.00</span>
                                                                    </span>
                                                        <!-- /.price -->
                                                        <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                    </a>
                                                    <div class="hover-area">
                                                        <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                        <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                    </div>
                                                </div>
                                                <!-- /.product-outer -->
                                                <div class="product">
                                                    <div class="yith-wcwl-add-to-wishlist">
                                                        <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                    </div>
                                                    <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                        <img src="assets/images/products/13.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                        <span class="price">
                                                                        <ins>
                                                                            <span class="amount"> </span>
                                                                        </ins>
                                                                        <span class="amount"> 456.00</span>
                                                                    </span>
                                                        <!-- /.price -->
                                                        <h2 class="woocommerce-loop-product__title">Drone WIFI FPV With 4K</h2>
                                                    </a>
                                                    <div class="hover-area">
                                                        <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                        <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                    </div>
                                                </div>
                                                <!-- /.product-outer -->
                                                <div class="product">
                                                    <div class="yith-wcwl-add-to-wishlist">
                                                        <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                    </div>
                                                    <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                        <img src="assets/images/products/16.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                        <span class="price">
                                                                        <ins>
                                                                            <span class="amount"> </span>
                                                                        </ins>
                                                                        <span class="amount"> 262.81</span>
                                                                    </span>
                                                        <!-- /.price -->
                                                        <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                    </a>
                                                    <div class="hover-area">
                                                        <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                        <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                    </div>
                                                </div>
                                                <!-- /.product-outer -->
                                                <div class="product">
                                                    <div class="yith-wcwl-add-to-wishlist">
                                                        <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                    </div>
                                                    <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                        <img src="assets/images/products/5.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                        <span class="price">
                                                                        <ins>
                                                                            <span class="amount"> </span>
                                                                        </ins>
                                                                        <span class="amount"> 456.00</span>
                                                                    </span>
                                                        <!-- /.price -->
                                                        <h2 class="woocommerce-loop-product__title">XONE Wireless Controller</h2>
                                                    </a>
                                                    <div class="hover-area">
                                                        <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                        <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                    </div>
                                                </div>
                                                <!-- /.product-outer -->
                                                <div class="product">
                                                    <div class="yith-wcwl-add-to-wishlist">
                                                        <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                    </div>
                                                    <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                        <img src="assets/images/products/1.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                        <span class="price">
                                                                        <ins>
                                                                            <span class="amount"> </span>
                                                                        </ins>
                                                                        <span class="amount"> 456.00</span>
                                                                    </span>
                                                        <!-- /.price -->
                                                        <h2 class="woocommerce-loop-product__title">Smart Watches 3 SWR50</h2>
                                                    </a>
                                                    <div class="hover-area">
                                                        <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                        <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                    </div>
                                                </div>
                                                <!-- /.product-outer -->
                                                <div class="product">
                                                    <div class="yith-wcwl-add-to-wishlist">
                                                        <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                    </div>
                                                    <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                        <img src="assets/images/products/4.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                        <span class="price">
                                                                        <ins>
                                                                            <span class="amount"> </span>
                                                                        </ins>
                                                                        <span class="amount"> 456.00</span>
                                                                    </span>
                                                        <!-- /.price -->
                                                        <h2 class="woocommerce-loop-product__title">4K Action Cam with Wi-Fi & GPS</h2>
                                                    </a>
                                                    <div class="hover-area">
                                                        <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                        <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                    </div>
                                                </div>
                                                <!-- /.product-outer -->
                                                <div class="product">
                                                    <div class="yith-wcwl-add-to-wishlist">
                                                        <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                    </div>
                                                    <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                        <img src="assets/images/products/10.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                        <span class="price">
                                                                        <ins>
                                                                            <span class="amount"> </span>
                                                                        </ins>
                                                                        <span class="amount"> 456.00</span>
                                                                    </span>
                                                        <!-- /.price -->
                                                        <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                    </a>
                                                    <div class="hover-area">
                                                        <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                        <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                    </div>
                                                </div>
                                                <!-- /.product-outer -->
                                                <div class="product">
                                                    <div class="yith-wcwl-add-to-wishlist">
                                                        <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                    </div>
                                                    <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                        <img src="assets/images/products/8.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                        <span class="price">
                                                                        <ins>
                                                                            <span class="amount"> </span>
                                                                        </ins>
                                                                        <span class="amount"> 456.00</span>
                                                                    </span>
                                                        <!-- /.price -->
                                                        <h2 class="woocommerce-loop-product__title">Video & Air Quality Monitor</h2>
                                                    </a>
                                                    <div class="hover-area">
                                                        <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                        <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                    </div>
                                                </div>
                                                <!-- /.product-outer -->
                                                <div class="product">
                                                    <div class="yith-wcwl-add-to-wishlist">
                                                        <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                    </div>
                                                    <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                        <img src="assets/images/products/3.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                        <span class="price">
                                                                        <ins>
                                                                            <span class="amount"> </span>
                                                                        </ins>
                                                                        <span class="amount"> 456.00</span>
                                                                    </span>
                                                        <!-- /.price -->
                                                        <h2 class="woocommerce-loop-product__title">On-ear Wireless NXTG</h2>
                                                    </a>
                                                    <div class="hover-area">
                                                        <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                        <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                    </div>
                                                </div>
                                                <!-- /.product-outer -->
                                                <div class="product">
                                                    <div class="yith-wcwl-add-to-wishlist">
                                                        <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                    </div>
                                                    <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                        <img src="assets/images/products/6.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                        <span class="price">
                                                                        <ins>
                                                                            <span class="amount"> </span>
                                                                        </ins>
                                                                        <span class="amount"> 456.00</span>
                                                                    </span>
                                                        <!-- /.price -->
                                                        <h2 class="woocommerce-loop-product__title">Gear Virtual Reality 3D with Bluetooth Glasses</h2>
                                                    </a>
                                                    <div class="hover-area">
                                                        <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                        <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                    </div>
                                                </div>
                                                <!-- /.product-outer -->
                                                <div class="product">
                                                    <div class="yith-wcwl-add-to-wishlist">
                                                        <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                    </div>
                                                    <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <span class="onsale">
                                                                        <span class="woocommerce-Price-amount amount">
                                                                            <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                    </span>
                                                        <img src="assets/images/products/14.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                        <span class="price">
                                                                        <ins>
                                                                            <span class="amount"> 262.81</span>
                                                                        </ins>
                                                                        <del>
                                                                            <span class="amount">399.00</span>
                                                                        </del>
                                                                        <span class="amount"> </span>
                                                                    </span>
                                                        <!-- /.price -->
                                                        <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                    </a>
                                                    <div class="hover-area">
                                                        <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                        <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                    </div>
                                                </div>
                                                <!-- /.product-outer -->
                                            </div>
                                        </div>
                                        <!-- .woocommerce-->
                                    </div>
                                    <!-- .container-fluid -->
                                </div>
                                <!-- .products-carousel -->
                            </section>
                            <section class="column-2 section-products-carousel-tabs">
                                <div class="section-products-carousel-tabs-wrap">
                                    <header class="section-header">
                                        <ul role="tablist" class="nav justify-content-end">
                                            <li class="nav-item"><a class="nav-link active" href="#tab-59f89f09686170" data-toggle="tab">New Arrivals</a></li>
                                            <li class="nav-item"><a class="nav-link " href="#tab-59f89f09686171" data-toggle="tab">On Sale</a></li>
                                            <li class="nav-item"><a class="nav-link " href="#tab-59f89f09686172" data-toggle="tab">Best Rated</a></li>
                                        </ul>
                                    </header>
                                    <div class="tab-content">
                                        <div id="tab-59f89f09686170" class="tab-pane active" role="tabpanel">
                                            <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4,&quot;dots&quot;:false,&quot;arrows&quot;:false,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:800,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}}]}">
                                                <div class="container-fluid">
                                                    <div class="woocommerce columns-4">
                                                        <div class="products">
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                                <span class="onsale">
                                                                                    <span class="woocommerce-Price-amount amount">
                                                                                        <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                                </span>
                                                                    <img src="assets/images/products/14.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> 262.81</span>
                                                                                    </ins>
                                                                                    <del>
                                                                                        <span class="amount">399.00</span>
                                                                                    </del>
                                                                                    <span class="amount"> </span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <img src="assets/images/products/5.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> 456.00</span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">XONE Wireless Controller</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <img src="assets/images/products/3.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> 456.00</span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">On-ear Wireless NXTG</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <img src="assets/images/products/9.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> 456.00</span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">Watch Stainless with Grey Suture Leather Strap</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <img src="assets/images/products/10.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> 456.00</span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <img src="assets/images/products/16.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> 262.81</span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <img src="assets/images/products/11.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> 456.00</span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <img src="assets/images/products/13.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> 456.00</span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">Drone WIFI FPV With 4K</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <img src="assets/images/products/6.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> 456.00</span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">Gear Virtual Reality 3D with Bluetooth Glasses</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <img src="assets/images/products/15.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> 399.00</span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <img src="assets/images/products/12.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> 456.00</span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">Bbd 23-Inch Screen LED-Lit Monitorss Buds</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <img src="assets/images/products/1.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> 456.00</span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">Smart Watches 3 SWR50</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <img src="assets/images/products/4.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> 456.00</span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">4K Action Cam with Wi-Fi & GPS</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                                <span class="onsale">
                                                                                    <span class="woocommerce-Price-amount amount">
                                                                                        <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                                </span>
                                                                    <img src="assets/images/products/2.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> 309.95</span>
                                                                                    </ins>
                                                                                    <del>
                                                                                        <span class="amount">459.00</span>
                                                                                    </del>
                                                                                    <span class="amount"> </span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">ZenBook 3 Ultrabook 8GB 512SSD W10</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <img src="assets/images/products/8.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> 456.00</span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">Video & Air Quality Monitor</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                                <span class="onsale">
                                                                                    <span class="woocommerce-Price-amount amount">
                                                                                        <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                                </span>
                                                                    <img src="assets/images/products/7.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> 789.95</span>
                                                                                    </ins>
                                                                                    <del>
                                                                                        <span class="amount">999.00</span>
                                                                                    </del>
                                                                                    <span class="amount"> </span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">Bluetooth on-ear PureBass Headphones</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                        </div>
                                                    </div>
                                                    <!-- .woocommerce -->
                                                </div>
                                                <!-- .container-fluid -->
                                            </div>
                                            <!-- .products-carousel -->
                                        </div>
                                        <!-- .tab-pane -->
                                        <div id="tab-59f89f09686171" class="tab-pane " role="tabpanel">
                                            <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4,&quot;dots&quot;:false,&quot;arrows&quot;:false,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:800,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}}]}">
                                                <div class="container-fluid">
                                                    <div class="woocommerce columns-4">
                                                        <div class="products">
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <img src="assets/images/products/1.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> 456.00</span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">Smart Watches 3 SWR50</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <img src="assets/images/products/9.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> 456.00</span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">Watch Stainless with Grey Suture Leather Strap</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <img src="assets/images/products/6.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> 456.00</span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">Gear Virtual Reality 3D with Bluetooth Glasses</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <img src="assets/images/products/8.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> 456.00</span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">Video & Air Quality Monitor</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <img src="assets/images/products/15.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> 399.00</span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                                <span class="onsale">
                                                                                    <span class="woocommerce-Price-amount amount">
                                                                                        <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                                </span>
                                                                    <img src="assets/images/products/7.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> 789.95</span>
                                                                                    </ins>
                                                                                    <del>
                                                                                        <span class="amount">999.00</span>
                                                                                    </del>
                                                                                    <span class="amount"> </span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">Bluetooth on-ear PureBass Headphones</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <img src="assets/images/products/4.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> 456.00</span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">4K Action Cam with Wi-Fi & GPS</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                                <span class="onsale">
                                                                                    <span class="woocommerce-Price-amount amount">
                                                                                        <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                                </span>
                                                                    <img src="assets/images/products/14.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> 262.81</span>
                                                                                    </ins>
                                                                                    <del>
                                                                                        <span class="amount">399.00</span>
                                                                                    </del>
                                                                                    <span class="amount"> </span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <img src="assets/images/products/12.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> 456.00</span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">Bbd 23-Inch Screen LED-Lit Monitorss Buds</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <img src="assets/images/products/13.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> 456.00</span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">Drone WIFI FPV With 4K</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                                <span class="onsale">
                                                                                    <span class="woocommerce-Price-amount amount">
                                                                                        <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                                </span>
                                                                    <img src="assets/images/products/2.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> 309.95</span>
                                                                                    </ins>
                                                                                    <del>
                                                                                        <span class="amount">459.00</span>
                                                                                    </del>
                                                                                    <span class="amount"> </span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">ZenBook 3 Ultrabook 8GB 512SSD W10</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <img src="assets/images/products/3.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> 456.00</span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">On-ear Wireless NXTG</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <img src="assets/images/products/16.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> 262.81</span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <img src="assets/images/products/5.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> 456.00</span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">XONE Wireless Controller</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <img src="assets/images/products/10.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> 456.00</span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <img src="assets/images/products/11.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> 456.00</span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                        </div>
                                                    </div>
                                                    <!-- .woocommerce -->
                                                </div>
                                                <!-- .container-fluid -->
                                            </div>
                                            <!-- .products-carousel -->
                                        </div>
                                        <!-- .tab-pane -->
                                        <div id="tab-59f89f09686172" class="tab-pane " role="tabpanel">
                                            <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4,&quot;dots&quot;:false,&quot;arrows&quot;:false,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:800,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}}]}">
                                                <div class="container-fluid">
                                                    <div class="woocommerce columns-4">
                                                        <div class="products">
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                                <span class="onsale">
                                                                                    <span class="woocommerce-Price-amount amount">
                                                                                        <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                                </span>
                                                                    <img src="assets/images/products/2.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> 309.95</span>
                                                                                    </ins>
                                                                                    <del>
                                                                                        <span class="amount">459.00</span>
                                                                                    </del>
                                                                                    <span class="amount"> </span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">ZenBook 3 Ultrabook 8GB 512SSD W10</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <img src="assets/images/products/16.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> 262.81</span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <img src="assets/images/products/5.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> 456.00</span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">XONE Wireless Controller</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <img src="assets/images/products/12.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> 456.00</span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">Bbd 23-Inch Screen LED-Lit Monitorss Buds</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <img src="assets/images/products/4.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> 456.00</span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">4K Action Cam with Wi-Fi & GPS</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <img src="assets/images/products/13.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> 456.00</span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">Drone WIFI FPV With 4K</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <img src="assets/images/products/11.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> 456.00</span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <img src="assets/images/products/10.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> 456.00</span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <img src="assets/images/products/9.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> 456.00</span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">Watch Stainless with Grey Suture Leather Strap</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <img src="assets/images/products/6.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> 456.00</span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">Gear Virtual Reality 3D with Bluetooth Glasses</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                                <span class="onsale">
                                                                                    <span class="woocommerce-Price-amount amount">
                                                                                        <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                                </span>
                                                                    <img src="assets/images/products/14.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> 262.81</span>
                                                                                    </ins>
                                                                                    <del>
                                                                                        <span class="amount">399.00</span>
                                                                                    </del>
                                                                                    <span class="amount"> </span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <img src="assets/images/products/3.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> 456.00</span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">On-ear Wireless NXTG</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <img src="assets/images/products/8.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> 456.00</span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">Video & Air Quality Monitor</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <img src="assets/images/products/1.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> 456.00</span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">Smart Watches 3 SWR50</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <img src="assets/images/products/15.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> 399.00</span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                            <div class="product">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                </div>
                                                                <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                                <span class="onsale">
                                                                                    <span class="woocommerce-Price-amount amount">
                                                                                        <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                                </span>
                                                                    <img src="assets/images/products/7.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                    <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> 789.95</span>
                                                                                    </ins>
                                                                                    <del>
                                                                                        <span class="amount">999.00</span>
                                                                                    </del>
                                                                                    <span class="amount"> </span>
                                                                                </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">Bluetooth on-ear PureBass Headphones</h2>
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                    <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-outer -->
                                                        </div>
                                                    </div>
                                                    <!-- .woocommerce -->
                                                </div>
                                                <!-- .container-fluid -->
                                            </div>
                                            <!-- .products-carousel -->
                                        </div>
                                        <!-- .tab-pane -->
                                    </div>
                                    <!-- .tab-content -->
                                </div>
                                <!-- .section-products-carousel-tabs-wrap -->
                            </section>
                            <!-- .section-products-carousel-tabs -->
                        </div>
                    </section>
                    <!-- .section-single-carousel-with-tab-product -->
                    <section class="section-products-carousel-with-bg 6-column-carousel-bg">
                        <div class="col-full">
                            <div class="row">
                                <header class="section-header">
                                    <h2 class="section-title">Today Deals
                                        <br>
                                        <span>hurry up!</span>
                                    </h2>
                                    <div class="deal-countdown-timer">
                                        <span class="deal-time-diff" style="display:none;">28800</span>
                                        <div class="deal-countdown countdown"></div>
                                    </div>
                                    <!-- .deal-countdown-timer-->
                                    <img alt="" src="assets/images/products/bg-1.png">
                                </header>
                                <div class="products-carousel-with-bg">
                                    <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:6,&quot;slidesToScroll&quot;:6,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:800,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1700,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}}]}">
                                        <div class="container-fluid">
                                            <div class="woocommerce columns-6">
                                                <div class="products">
                                                    <div class="product">
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/xs-8.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Video & Air Quality Monitor</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/xs-2.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/xs-3.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 399.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/xs-4.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">4K Action Cam with Wi-Fi & GPS</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/xs-7.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Bluetooth on-ear PureBass Headphones</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/xs-6.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Drone WIFI FPV With 4K</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/xs-9.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Watch Stainless with Grey Suture Leather Strap</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/xs-5.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">XONE Wireless Controller</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/xs-7.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 262.81</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/xs-2.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">ZenBook 3 Ultrabook 8GB 512SSD W10</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/xs-3.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">On-ear Wireless NXTG</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/xs-6.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> 789.95</span>
                                                                            </ins>
                                                                            <del>
                                                                                <span class="amount">999.00</span>
                                                                            </del>
                                                                            <span class="amount"> </span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Gear Virtual Reality 3D with Bluetooth Glasses</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/xs-8.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> 262.81</span>
                                                                            </ins>
                                                                            <del>
                                                                                <span class="amount">399.00</span>
                                                                            </del>
                                                                            <span class="amount"> </span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/xs-1.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> 309.95</span>
                                                                            </ins>
                                                                            <del>
                                                                                <span class="amount">459.00</span>
                                                                            </del>
                                                                            <span class="amount"> </span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Smart Watches 3 SWR50</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/xs-4.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/xs-1.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Bbd 23-Inch Screen LED-Lit Monitorss Buds</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                </div>
                                            </div>
                                            <!-- .woocommerce-->
                                        </div>
                                        <!-- .container-fluid -->
                                    </div>
                                    <!-- .products-carousel -->
                                </div>
                                <!-- .products-carousel-with-bg -->
                            </div>
                            <!-- .row -->
                        </div>
                        <!-- .col-full -->
                    </section>
                    <!-- .section-products-carousel-with-bg -->
                    <section id="section-products-carousel-6" class="section-landscape-products-carousel section-landscape-products-carousel-with-thumbnails">
                        <header class="section-header">
                            <h2 class="section-title">4K Ultra HD Televisions</h2>
                            <nav class="custom-slick-nav"></nav>
                            <!-- .custom-slick-nav -->
                        </header>
                        <!-- .section-header -->
                        <div class="products-carousel landscape-featured-product" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2,&quot;dots&quot;:true,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#section-products-carousel-6 .custom-slick-nav&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1590,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1}}]}">
                            <div class="container-fluid">
                                <div class="woocommerce columns-2">
                                    <div class="products">
                                        <div class="landscape-product-card-featured product" style="width: 733px;">
                                            <div class="media">
                                                <div id="techmarket-product-gallery-59f89f096bfe51" class="techmarket-product-gallery techmarket-product-gallery--with-images techmarket-product-gallery--columns-4 images" data-columns="4">
                                                    <figure class="techmarket-wc-product-gallery__wrapper" data-ride="tm-slick-carousel" data-wrap=".techmarket-wc-product-gallery__wrapper" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:false,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;asNavFor&quot;:&quot;#techmarket-product-gallery-59f89f096bfe51 .techmarket-wc-product-gallery-thumbnails__wrapper&quot;}">
                                                        <figure class="techmarket-wc-product-gallery__image">
                                                            <img width="600" height="600" src="assets/images/products/deals-1.jpg" alt="gallery-image">
                                                        </figure>
                                                        <figure class="techmarket-wc-product-gallery__image">
                                                            <img width="600" height="600" title="" alt="" class="attachment-shop_single size-shop_single" src="assets/images/products/deals-2.jpg">
                                                        </figure>
                                                        <figure class="techmarket-wc-product-gallery__image">
                                                            <img width="600" height="600" title="" alt="" class="attachment-shop_single size-shop_single" src="assets/images/products/deals-3.jpg">
                                                        </figure>
                                                        <figure class="techmarket-wc-product-gallery__image">
                                                            <img width="600" height="600" title="" alt="" class="attachment-shop_single size-shop_single" src="assets/images/products/deals-2.jpg">
                                                        </figure>
                                                    </figure>
                                                    <!-- /.techmarket-wc-product-gallery__wrapper -->
                                                    <figure class="techmarket-wc-product-gallery-thumbnails__wrapper" data-ride="tm-slick-carousel" data-wrap=".techmarket-wc-product-gallery-thumbnails__wrapper" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;vertical&quot;:true,&quot;verticalSwiping&quot;:true,&quot;focusOnSelect&quot;:true,&quot;touchMove&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-up\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-down\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:767,&quot;settings&quot;:{&quot;vertical&quot;:false,&quot;verticalSwiping&quot;:false,&quot;slidesToShow&quot;:1}}],&quot;asNavFor&quot;:&quot;#techmarket-product-gallery-59f89f096bfe51 .techmarket-wc-product-gallery__wrapper&quot;}">
                                                        <figure class="techmarket-wc-product-gallery__image">
                                                            <img width="180" height="180" title="" alt="" class="wp-post-image" src="assets/images/products/deals-sm-1.jpg">
                                                        </figure>
                                                        <figure class="techmarket-wc-product-gallery__image">
                                                            <img width="180" height="180" title="" alt="" class="attachment-shop_thumbnail size-shop_thumbnail" src="assets/images/products/deals-sm-2.jpg">
                                                        </figure>
                                                        <figure class="techmarket-wc-product-gallery__image">
                                                            <img width="180" height="180" title="" alt="" class="attachment-shop_thumbnail size-shop_thumbnail" src="assets/images/products/deals-sm-3.jpg">
                                                        </figure>
                                                        <figure class="techmarket-wc-product-gallery__image">
                                                            <img width="180" height="180" title="" alt="" class="attachment-shop_thumbnail size-shop_thumbnail" src="assets/images/products/deals-sm-2.jpg">
                                                        </figure>
                                                    </figure>
                                                    <!-- /.techmarket-wc-product-gallery-thumbnails__wrapper -->
                                                </div>
                                                <!-- /.techmarket-product-gallery -->
                                                <div class="media-body">
                                                    <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <span class="price">
                                                                        <ins>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>3,499.99</span>
                                                                        </ins>
                                                                        <del>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>4,129.99</span>
                                                                        </del>
                                                                    </span>
                                                        <h2 class="woocommerce-loop-product__title">X930E Series 65” 4K Ultra Slim HD High Dynamic Range 3D</h2>
                                                        <div class="ribbon green-label">
                                                            <span>A+</span>
                                                        </div>
                                                        <div class="techmarket-product-rating">
                                                            <div class="star-rating" title="Rated 0 out of 5">
                                                                            <span style="width:0%">
                                                                                <strong class="rating">0</strong> out of 5</span>
                                                            </div>
                                                            <span class="review-count">(0)</span>
                                                        </div>
                                                    </a>
                                                    <a rel="nofollow" href="cart.html" class="button product_type_simple">Add to cart</a>
                                                    <a href="compare.html" class="add-to-compare-link">Add to compare</a>
                                                </div>
                                                <!-- /.media-body -->
                                            </div>
                                            <!-- /.media -->
                                        </div>
                                        <!-- /.landscape-product-card-featured -->
                                        <div class="landscape-product-card-featured product" style="width: 733px;">
                                            <div class="media">
                                                <div id="techmarket-product-gallery-59f89f096bfe52" class="techmarket-product-gallery techmarket-product-gallery--with-images techmarket-product-gallery--columns-4 images" data-columns="4">
                                                    <figure class="techmarket-wc-product-gallery__wrapper" data-ride="tm-slick-carousel" data-wrap=".techmarket-wc-product-gallery__wrapper" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:false,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;asNavFor&quot;:&quot;#techmarket-product-gallery-59f89f096bfe52 .techmarket-wc-product-gallery-thumbnails__wrapper&quot;}">
                                                        <figure class="techmarket-wc-product-gallery__image">
                                                            <img width="600" height="600" src="assets/images/products/deals-1.jpg" alt="gallery-image">
                                                        </figure>
                                                        <figure class="techmarket-wc-product-gallery__image">
                                                            <img width="600" height="600" title="" alt="" class="attachment-shop_single size-shop_single" src="assets/images/products/deals-2.jpg">
                                                        </figure>
                                                        <figure class="techmarket-wc-product-gallery__image">
                                                            <img width="600" height="600" title="" alt="" class="attachment-shop_single size-shop_single" src="assets/images/products/deals-3.jpg">
                                                        </figure>
                                                        <figure class="techmarket-wc-product-gallery__image">
                                                            <img width="600" height="600" title="" alt="" class="attachment-shop_single size-shop_single" src="assets/images/products/deals-2.jpg">
                                                        </figure>
                                                    </figure>
                                                    <!-- /.techmarket-wc-product-gallery__wrapper -->
                                                    <figure class="techmarket-wc-product-gallery-thumbnails__wrapper" data-ride="tm-slick-carousel" data-wrap=".techmarket-wc-product-gallery-thumbnails__wrapper" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;vertical&quot;:true,&quot;verticalSwiping&quot;:true,&quot;focusOnSelect&quot;:true,&quot;touchMove&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-up\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-down\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:767,&quot;settings&quot;:{&quot;vertical&quot;:false,&quot;verticalSwiping&quot;:false,&quot;slidesToShow&quot;:1}}],&quot;asNavFor&quot;:&quot;#techmarket-product-gallery-59f89f096bfe52 .techmarket-wc-product-gallery__wrapper&quot;}">
                                                        <figure class="techmarket-wc-product-gallery__image">
                                                            <img width="180" height="180" title="" alt="" class="wp-post-image" src="assets/images/products/deals-sm-1.jpg">
                                                        </figure>
                                                        <figure class="techmarket-wc-product-gallery__image">
                                                            <img width="180" height="180" title="" alt="" class="attachment-shop_thumbnail size-shop_thumbnail" src="assets/images/products/deals-sm-2.jpg">
                                                        </figure>
                                                        <figure class="techmarket-wc-product-gallery__image">
                                                            <img width="180" height="180" title="" alt="" class="attachment-shop_thumbnail size-shop_thumbnail" src="assets/images/products/deals-sm-3.jpg">
                                                        </figure>
                                                        <figure class="techmarket-wc-product-gallery__image">
                                                            <img width="180" height="180" title="" alt="" class="attachment-shop_thumbnail size-shop_thumbnail" src="assets/images/products/deals-sm-2.jpg">
                                                        </figure>
                                                    </figure>
                                                    <!-- /.techmarket-wc-product-gallery-thumbnails__wrapper -->
                                                </div>
                                                <!-- /.techmarket-product-gallery -->
                                                <div class="media-body">
                                                    <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <span class="price">
                                                                        <ins>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>3,499.99</span>
                                                                        </ins>
                                                                        <del>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>4,129.99</span>
                                                                        </del>
                                                                    </span>
                                                        <h2 class="woocommerce-loop-product__title">X930E Series 65” 4K Ultra Slim HD High Dynamic Range 3D</h2>
                                                        <div class="ribbon green-label">
                                                            <span>A+</span>
                                                        </div>
                                                        <div class="techmarket-product-rating">
                                                            <div class="star-rating" title="Rated 0 out of 5">
                                                                            <span style="width:0%">
                                                                                <strong class="rating">0</strong> out of 5</span>
                                                            </div>
                                                            <span class="review-count">(0)</span>
                                                        </div>
                                                    </a>
                                                    <a rel="nofollow" href="cart.html" class="button product_type_simple">Add to cart</a>
                                                    <a href="compare.html" class="add-to-compare-link">Add to compare</a>
                                                </div>
                                                <!-- /.media-body -->
                                            </div>
                                            <!-- /.media -->
                                        </div>
                                        <!-- /.landscape-product-card-featured -->
                                        <div class="landscape-product-card-featured product" style="width: 733px;">
                                            <div class="media">
                                                <div id="techmarket-product-gallery-59f89f096bfe53" class="techmarket-product-gallery techmarket-product-gallery--with-images techmarket-product-gallery--columns-4 images" data-columns="4">
                                                    <figure class="techmarket-wc-product-gallery__wrapper" data-ride="tm-slick-carousel" data-wrap=".techmarket-wc-product-gallery__wrapper" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:false,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;asNavFor&quot;:&quot;#techmarket-product-gallery-59f89f096bfe53 .techmarket-wc-product-gallery-thumbnails__wrapper&quot;}">
                                                        <figure class="techmarket-wc-product-gallery__image">
                                                            <img width="600" height="600" src="assets/images/products/deals-1.jpg" alt="gallery-image">
                                                        </figure>
                                                        <figure class="techmarket-wc-product-gallery__image">
                                                            <img width="600" height="600" title="" alt="" class="attachment-shop_single size-shop_single" src="assets/images/products/deals-2.jpg">
                                                        </figure>
                                                        <figure class="techmarket-wc-product-gallery__image">
                                                            <img width="600" height="600" title="" alt="" class="attachment-shop_single size-shop_single" src="assets/images/products/deals-3.jpg">
                                                        </figure>
                                                        <figure class="techmarket-wc-product-gallery__image">
                                                            <img width="600" height="600" title="" alt="" class="attachment-shop_single size-shop_single" src="assets/images/products/deals-2.jpg">
                                                        </figure>
                                                    </figure>
                                                    <!-- /.techmarket-wc-product-gallery__wrapper -->
                                                    <figure class="techmarket-wc-product-gallery-thumbnails__wrapper" data-ride="tm-slick-carousel" data-wrap=".techmarket-wc-product-gallery-thumbnails__wrapper" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;vertical&quot;:true,&quot;verticalSwiping&quot;:true,&quot;focusOnSelect&quot;:true,&quot;touchMove&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-up\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-down\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:767,&quot;settings&quot;:{&quot;vertical&quot;:false,&quot;verticalSwiping&quot;:false,&quot;slidesToShow&quot;:1}}],&quot;asNavFor&quot;:&quot;#techmarket-product-gallery-59f89f096bfe53 .techmarket-wc-product-gallery__wrapper&quot;}">
                                                        <figure class="techmarket-wc-product-gallery__image">
                                                            <img width="180" height="180" title="" alt="" class="wp-post-image" src="assets/images/products/deals-sm-1.jpg">
                                                        </figure>
                                                        <figure class="techmarket-wc-product-gallery__image">
                                                            <img width="180" height="180" title="" alt="" class="attachment-shop_thumbnail size-shop_thumbnail" src="assets/images/products/deals-sm-2.jpg">
                                                        </figure>
                                                        <figure class="techmarket-wc-product-gallery__image">
                                                            <img width="180" height="180" title="" alt="" class="attachment-shop_thumbnail size-shop_thumbnail" src="assets/images/products/deals-sm-3.jpg">
                                                        </figure>
                                                        <figure class="techmarket-wc-product-gallery__image">
                                                            <img width="180" height="180" title="" alt="" class="attachment-shop_thumbnail size-shop_thumbnail" src="assets/images/products/deals-sm-2.jpg">
                                                        </figure>
                                                    </figure>
                                                    <!-- /.techmarket-wc-product-gallery-thumbnails__wrapper -->
                                                </div>
                                                <!-- /.techmarket-product-gallery -->
                                                <div class="media-body">
                                                    <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <span class="price">
                                                                        <ins>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>3,499.99</span>
                                                                        </ins>
                                                                        <del>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>4,129.99</span>
                                                                        </del>
                                                                    </span>
                                                        <h2 class="woocommerce-loop-product__title">X930E Series 65” 4K Ultra Slim HD High Dynamic Range 3D</h2>
                                                        <div class="ribbon green-label">
                                                            <span>A+</span>
                                                        </div>
                                                        <div class="techmarket-product-rating">
                                                            <div class="star-rating" title="Rated 0 out of 5">
                                                                            <span style="width:0%">
                                                                                <strong class="rating">0</strong> out of 5</span>
                                                            </div>
                                                            <span class="review-count">(0)</span>
                                                        </div>
                                                    </a>
                                                    <a rel="nofollow" href="cart.html" class="button product_type_simple">Add to cart</a>
                                                    <a href="compare.html" class="add-to-compare-link">Add to compare</a>
                                                </div>
                                                <!-- /.media-body -->
                                            </div>
                                            <!-- /.media -->
                                        </div>
                                        <!-- /.landscape-product-card-featured -->
                                        <div class="landscape-product-card-featured product" style="width: 733px;">
                                            <div class="media">
                                                <div id="techmarket-product-gallery-59f89f096bfe54" class="techmarket-product-gallery techmarket-product-gallery--with-images techmarket-product-gallery--columns-4 images" data-columns="4">
                                                    <figure class="techmarket-wc-product-gallery__wrapper" data-ride="tm-slick-carousel" data-wrap=".techmarket-wc-product-gallery__wrapper" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:false,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;asNavFor&quot;:&quot;#techmarket-product-gallery-59f89f096bfe54 .techmarket-wc-product-gallery-thumbnails__wrapper&quot;}">
                                                        <figure class="techmarket-wc-product-gallery__image">
                                                            <img width="600" height="600" src="assets/images/products/deals-1.jpg" alt="gallery-image">
                                                        </figure>
                                                        <figure class="techmarket-wc-product-gallery__image">
                                                            <img width="600" height="600" title="" alt="" class="attachment-shop_single size-shop_single" src="assets/images/products/deals-2.jpg">
                                                        </figure>
                                                        <figure class="techmarket-wc-product-gallery__image">
                                                            <img width="600" height="600" title="" alt="" class="attachment-shop_single size-shop_single" src="assets/images/products/deals-3.jpg">
                                                        </figure>
                                                        <figure class="techmarket-wc-product-gallery__image">
                                                            <img width="600" height="600" title="" alt="" class="attachment-shop_single size-shop_single" src="assets/images/products/deals-2.jpg">
                                                        </figure>
                                                    </figure>
                                                    <!-- /.techmarket-wc-product-gallery__wrapper -->
                                                    <figure class="techmarket-wc-product-gallery-thumbnails__wrapper" data-ride="tm-slick-carousel" data-wrap=".techmarket-wc-product-gallery-thumbnails__wrapper" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;vertical&quot;:true,&quot;verticalSwiping&quot;:true,&quot;focusOnSelect&quot;:true,&quot;touchMove&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-up\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-down\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:767,&quot;settings&quot;:{&quot;vertical&quot;:false,&quot;verticalSwiping&quot;:false,&quot;slidesToShow&quot;:1}}],&quot;asNavFor&quot;:&quot;#techmarket-product-gallery-59f89f096bfe54 .techmarket-wc-product-gallery__wrapper&quot;}">
                                                        <figure class="techmarket-wc-product-gallery__image">
                                                            <img width="180" height="180" title="" alt="" class="wp-post-image" src="assets/images/products/deals-sm-1.jpg">
                                                        </figure>
                                                        <figure class="techmarket-wc-product-gallery__image">
                                                            <img width="180" height="180" title="" alt="" class="attachment-shop_thumbnail size-shop_thumbnail" src="assets/images/products/deals-sm-2.jpg">
                                                        </figure>
                                                        <figure class="techmarket-wc-product-gallery__image">
                                                            <img width="180" height="180" title="" alt="" class="attachment-shop_thumbnail size-shop_thumbnail" src="assets/images/products/deals-sm-3.jpg">
                                                        </figure>
                                                        <figure class="techmarket-wc-product-gallery__image">
                                                            <img width="180" height="180" title="" alt="" class="attachment-shop_thumbnail size-shop_thumbnail" src="assets/images/products/deals-sm-2.jpg">
                                                        </figure>
                                                    </figure>
                                                    <!-- /.techmarket-wc-product-gallery-thumbnails__wrapper -->
                                                </div>
                                                <!-- /.techmarket-product-gallery -->
                                                <div class="media-body">
                                                    <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <span class="price">
                                                                        <ins>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>3,499.99</span>
                                                                        </ins>
                                                                        <del>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>4,129.99</span>
                                                                        </del>
                                                                    </span>
                                                        <h2 class="woocommerce-loop-product__title">X930E Series 65” 4K Ultra Slim HD High Dynamic Range 3D</h2>
                                                        <div class="ribbon green-label">
                                                            <span>A+</span>
                                                        </div>
                                                        <div class="techmarket-product-rating">
                                                            <div class="star-rating" title="Rated 0 out of 5">
                                                                            <span style="width:0%">
                                                                                <strong class="rating">0</strong> out of 5</span>
                                                            </div>
                                                            <span class="review-count">(0)</span>
                                                        </div>
                                                    </a>
                                                    <a rel="nofollow" href="cart.html" class="button product_type_simple">Add to cart</a>
                                                    <a href="compare.html" class="add-to-compare-link">Add to compare</a>
                                                </div>
                                                <!-- /.media-body -->
                                            </div>
                                            <!-- /.media -->
                                        </div>
                                        <!-- /.landscape-product-card-featured -->
                                        <div class="landscape-product-card-featured product" style="width: 733px;">
                                            <div class="media">
                                                <div id="techmarket-product-gallery-59f89f096bfe55" class="techmarket-product-gallery techmarket-product-gallery--with-images techmarket-product-gallery--columns-4 images" data-columns="4">
                                                    <figure class="techmarket-wc-product-gallery__wrapper" data-ride="tm-slick-carousel" data-wrap=".techmarket-wc-product-gallery__wrapper" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:false,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;asNavFor&quot;:&quot;#techmarket-product-gallery-59f89f096bfe55 .techmarket-wc-product-gallery-thumbnails__wrapper&quot;}">
                                                        <figure class="techmarket-wc-product-gallery__image">
                                                            <img width="600" height="600" src="assets/images/products/deals-1.jpg" alt="gallery-image">
                                                        </figure>
                                                        <figure class="techmarket-wc-product-gallery__image">
                                                            <img width="600" height="600" title="" alt="" class="attachment-shop_single size-shop_single" src="assets/images/products/deals-2.jpg">
                                                        </figure>
                                                        <figure class="techmarket-wc-product-gallery__image">
                                                            <img width="600" height="600" title="" alt="" class="attachment-shop_single size-shop_single" src="assets/images/products/deals-3.jpg">
                                                        </figure>
                                                        <figure class="techmarket-wc-product-gallery__image">
                                                            <img width="600" height="600" title="" alt="" class="attachment-shop_single size-shop_single" src="assets/images/products/deals-2.jpg">
                                                        </figure>
                                                    </figure>
                                                    <!-- /.techmarket-wc-product-gallery__wrapper -->
                                                    <figure class="techmarket-wc-product-gallery-thumbnails__wrapper" data-ride="tm-slick-carousel" data-wrap=".techmarket-wc-product-gallery-thumbnails__wrapper" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;vertical&quot;:true,&quot;verticalSwiping&quot;:true,&quot;focusOnSelect&quot;:true,&quot;touchMove&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-up\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-down\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:767,&quot;settings&quot;:{&quot;vertical&quot;:false,&quot;verticalSwiping&quot;:false,&quot;slidesToShow&quot;:1}}],&quot;asNavFor&quot;:&quot;#techmarket-product-gallery-59f89f096bfe55 .techmarket-wc-product-gallery__wrapper&quot;}">
                                                        <figure class="techmarket-wc-product-gallery__image">
                                                            <img width="180" height="180" title="" alt="" class="wp-post-image" src="assets/images/products/deals-sm-1.jpg">
                                                        </figure>
                                                        <figure class="techmarket-wc-product-gallery__image">
                                                            <img width="180" height="180" title="" alt="" class="attachment-shop_thumbnail size-shop_thumbnail" src="assets/images/products/deals-sm-2.jpg">
                                                        </figure>
                                                        <figure class="techmarket-wc-product-gallery__image">
                                                            <img width="180" height="180" title="" alt="" class="attachment-shop_thumbnail size-shop_thumbnail" src="assets/images/products/deals-sm-3.jpg">
                                                        </figure>
                                                        <figure class="techmarket-wc-product-gallery__image">
                                                            <img width="180" height="180" title="" alt="" class="attachment-shop_thumbnail size-shop_thumbnail" src="assets/images/products/deals-sm-2.jpg">
                                                        </figure>
                                                    </figure>
                                                    <!-- /.techmarket-wc-product-gallery-thumbnails__wrapper -->
                                                </div>
                                                <!-- /.techmarket-product-gallery -->
                                                <div class="media-body">
                                                    <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <span class="price">
                                                                        <ins>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>3,499.99</span>
                                                                        </ins>
                                                                        <del>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>4,129.99</span>
                                                                        </del>
                                                                    </span>
                                                        <h2 class="woocommerce-loop-product__title">X930E Series 65” 4K Ultra Slim HD High Dynamic Range 3D</h2>
                                                        <div class="ribbon green-label">
                                                            <span>A+</span>
                                                        </div>
                                                        <div class="techmarket-product-rating">
                                                            <div class="star-rating" title="Rated 0 out of 5">
                                                                            <span style="width:0%">
                                                                                <strong class="rating">0</strong> out of 5</span>
                                                            </div>
                                                            <span class="review-count">(0)</span>
                                                        </div>
                                                    </a>
                                                    <a rel="nofollow" href="cart.html" class="button product_type_simple">Add to cart</a>
                                                    <a href="compare.html" class="add-to-compare-link">Add to compare</a>
                                                </div>
                                                <!-- /.media-body -->
                                            </div>
                                            <!-- /.media -->
                                        </div>
                                        <!-- /.landscape-product-card-featured -->
                                    </div>
                                    <!-- .products -->
                                </div>
                                <!-- .woocommerce -->
                            </div>
                            <!-- .container-fluid -->
                        </div>
                        <!-- .products-carousel -->
                    </section>
                    <!-- .section-landscape-products-carousel -->
                    <section class="section-products-carousel" id="homev6-carousel-3">
                        <header class="section-header">
                            <h2 class="section-title">Cell Phones & Tablets</h2>
                            <nav class="custom-slick-nav"></nav>
                            <!-- .custom-slick-nav -->
                        </header>
                        <!-- .section-header -->
                        <div class="products-carousel 6-column-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:6,&quot;slidesToScroll&quot;:6,&quot;dots&quot;:true,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#homev6-carousel-3 .custom-slick-nav&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:750,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}},{&quot;breakpoint&quot;:1700,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:5}}]}">
                            <div class="container-fluid">
                                <div class="woocommerce columns-6">
                                    <div class="products">
                                        <div class="product">
                                            <div class="yith-wcwl-add-to-wishlist">
                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                            </div>
                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                <img src="assets/images/products/12.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                <!-- /.price -->
                                                <h2 class="woocommerce-loop-product__title">Bbd 23-Inch Screen LED-Lit Monitorss Buds</h2>
                                            </a>
                                            <div class="hover-area">
                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                            </div>
                                        </div>
                                        <!-- /.product-outer -->
                                        <div class="product">
                                            <div class="yith-wcwl-add-to-wishlist">
                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                            </div>
                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                <img src="assets/images/products/15.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 399.00</span>
                                                            </span>
                                                <!-- /.price -->
                                                <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                            </a>
                                            <div class="hover-area">
                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                            </div>
                                        </div>
                                        <!-- /.product-outer -->
                                        <div class="product">
                                            <div class="yith-wcwl-add-to-wishlist">
                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                            </div>
                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <span class="onsale">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                            </span>
                                                <img src="assets/images/products/2.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                <span class="price">
                                                                <ins>
                                                                    <span class="amount"> 309.95</span>
                                                                </ins>
                                                                <del>
                                                                    <span class="amount">459.00</span>
                                                                </del>
                                                                <span class="amount"> </span>
                                                            </span>
                                                <!-- /.price -->
                                                <h2 class="woocommerce-loop-product__title">ZenBook 3 Ultrabook 8GB 512SSD W10</h2>
                                            </a>
                                            <div class="hover-area">
                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                            </div>
                                        </div>
                                        <!-- /.product-outer -->
                                        <div class="product">
                                            <div class="yith-wcwl-add-to-wishlist">
                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                            </div>
                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                <img src="assets/images/products/1.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                <!-- /.price -->
                                                <h2 class="woocommerce-loop-product__title">Smart Watches 3 SWR50</h2>
                                            </a>
                                            <div class="hover-area">
                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                            </div>
                                        </div>
                                        <!-- /.product-outer -->
                                        <div class="product">
                                            <div class="yith-wcwl-add-to-wishlist">
                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                            </div>
                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                <img src="assets/images/products/4.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                <!-- /.price -->
                                                <h2 class="woocommerce-loop-product__title">4K Action Cam with Wi-Fi & GPS</h2>
                                            </a>
                                            <div class="hover-area">
                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                            </div>
                                        </div>
                                        <!-- /.product-outer -->
                                        <div class="product">
                                            <div class="yith-wcwl-add-to-wishlist">
                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                            </div>
                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                <img src="assets/images/products/6.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                <!-- /.price -->
                                                <h2 class="woocommerce-loop-product__title">Gear Virtual Reality 3D with Bluetooth Glasses</h2>
                                            </a>
                                            <div class="hover-area">
                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                            </div>
                                        </div>
                                        <!-- /.product-outer -->
                                        <div class="product">
                                            <div class="yith-wcwl-add-to-wishlist">
                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                            </div>
                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                <img src="assets/images/products/3.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                <!-- /.price -->
                                                <h2 class="woocommerce-loop-product__title">On-ear Wireless NXTG</h2>
                                            </a>
                                            <div class="hover-area">
                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                            </div>
                                        </div>
                                        <!-- /.product-outer -->
                                        <div class="product">
                                            <div class="yith-wcwl-add-to-wishlist">
                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                            </div>
                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                <img src="assets/images/products/11.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                <!-- /.price -->
                                                <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                            </a>
                                            <div class="hover-area">
                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                            </div>
                                        </div>
                                        <!-- /.product-outer -->
                                        <div class="product">
                                            <div class="yith-wcwl-add-to-wishlist">
                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                            </div>
                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                <img src="assets/images/products/16.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 262.81</span>
                                                            </span>
                                                <!-- /.price -->
                                                <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                            </a>
                                            <div class="hover-area">
                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                            </div>
                                        </div>
                                        <!-- /.product-outer -->
                                        <div class="product">
                                            <div class="yith-wcwl-add-to-wishlist">
                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                            </div>
                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <span class="onsale">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                            </span>
                                                <img src="assets/images/products/7.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                <span class="price">
                                                                <ins>
                                                                    <span class="amount"> 789.95</span>
                                                                </ins>
                                                                <del>
                                                                    <span class="amount">999.00</span>
                                                                </del>
                                                                <span class="amount"> </span>
                                                            </span>
                                                <!-- /.price -->
                                                <h2 class="woocommerce-loop-product__title">Bluetooth on-ear PureBass Headphones</h2>
                                            </a>
                                            <div class="hover-area">
                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                            </div>
                                        </div>
                                        <!-- /.product-outer -->
                                        <div class="product">
                                            <div class="yith-wcwl-add-to-wishlist">
                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                            </div>
                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <span class="onsale">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                            </span>
                                                <img src="assets/images/products/14.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                <span class="price">
                                                                <ins>
                                                                    <span class="amount"> 262.81</span>
                                                                </ins>
                                                                <del>
                                                                    <span class="amount">399.00</span>
                                                                </del>
                                                                <span class="amount"> </span>
                                                            </span>
                                                <!-- /.price -->
                                                <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                            </a>
                                            <div class="hover-area">
                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                            </div>
                                        </div>
                                        <!-- /.product-outer -->
                                        <div class="product">
                                            <div class="yith-wcwl-add-to-wishlist">
                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                            </div>
                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                <img src="assets/images/products/5.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                <!-- /.price -->
                                                <h2 class="woocommerce-loop-product__title">XONE Wireless Controller</h2>
                                            </a>
                                            <div class="hover-area">
                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                            </div>
                                        </div>
                                        <!-- /.product-outer -->
                                        <div class="product">
                                            <div class="yith-wcwl-add-to-wishlist">
                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                            </div>
                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                <img src="assets/images/products/8.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                <!-- /.price -->
                                                <h2 class="woocommerce-loop-product__title">Video & Air Quality Monitor</h2>
                                            </a>
                                            <div class="hover-area">
                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                            </div>
                                        </div>
                                        <!-- /.product-outer -->
                                        <div class="product">
                                            <div class="yith-wcwl-add-to-wishlist">
                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                            </div>
                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                <img src="assets/images/products/10.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                <!-- /.price -->
                                                <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                            </a>
                                            <div class="hover-area">
                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                            </div>
                                        </div>
                                        <!-- /.product-outer -->
                                        <div class="product">
                                            <div class="yith-wcwl-add-to-wishlist">
                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                            </div>
                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                <img src="assets/images/products/13.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                <!-- /.price -->
                                                <h2 class="woocommerce-loop-product__title">Drone WIFI FPV With 4K</h2>
                                            </a>
                                            <div class="hover-area">
                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                            </div>
                                        </div>
                                        <!-- /.product-outer -->
                                        <div class="product">
                                            <div class="yith-wcwl-add-to-wishlist">
                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                            </div>
                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                <img src="assets/images/products/9.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                <!-- /.price -->
                                                <h2 class="woocommerce-loop-product__title">Watch Stainless with Grey Suture Leather Strap</h2>
                                            </a>
                                            <div class="hover-area">
                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                            </div>
                                        </div>
                                        <!-- /.product-outer -->
                                    </div>
                                </div>
                                <!-- .woocommerce-->
                            </div>
                            <!-- .container-fluid -->
                        </div>
                        <!-- .products-carousel -->
                    </section>
                    <!-- .section-products-carousel -->
                    <div class="banner full-width-banner">
                        <a href="shop.html">
                            <div style="background-size: cover; background-position: center center; background-image: url( assets/images/banner/full-width.png ); height: 236px;" class="banner-bg">
                                <div class="caption">
                                    <div class="banner-info">
                                        <h3 class="title">
                                            <strong>Extremely Portable</strong>, learn
                                            <br> to ride in just 3 minutes</h3>
                                        <h4 class="subtitle">Travel up to 22km in a single charge</h4>
                                    </div>
                                    <span class="banner-action button">Browse now
                                                    <i class="feature-icon d-flex ml-4 tm tm-long-arrow-right"></i>
                                                </span>
                                </div>
                                <!-- /.caption -->
                            </div>
                            <!-- /.banner-b -->
                        </a>
                        <!-- /.section-header -->
                    </div>
                    <!-- /.banner -->
                    <section class="section-products-carousel-tabs techmarket-tabs">
                        <div class="section-products-carousel-tabs-wrap">
                            <header class="section-header">
                                <h2 class="section-title">Wearable Gadgets 2017</h2>
                                <ul role="tablist" class="nav justify-content-end">
                                    <li class="nav-item"><a class="nav-link active" href="#tab-59f89f096c1eb0" data-toggle="tab">Top 20</a></li>
                                    <li class="nav-item"><a class="nav-link " href="#tab-59f89f096c1eb1" data-toggle="tab">Audio &amp; Video</a></li>
                                    <li class="nav-item"><a class="nav-link " href="#tab-59f89f096c1eb2" data-toggle="tab">Laptops &amp; Computers</a></li>
                                    <li class="nav-item"><a class="nav-link " href="#tab-59f89f096c1eb3" data-toggle="tab">Video Cameras</a></li>
                                </ul>
                            </header>
                            <!-- .section-header -->
                            <div class="tab-content">
                                <div id="tab-59f89f096c1eb0" class="tab-pane active" role="tabpanel">
                                    <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:7,&quot;slidesToScroll&quot;:7,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:700,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:780,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:5}}]}">
                                        <div class="container-fluid">
                                            <div class="woocommerce">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/1.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Smart Watches 3 SWR50</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/11.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                        <span class="onsale">
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                        </span>
                                                            <img src="assets/images/products/2.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> 309.95</span>
                                                                            </ins>
                                                                            <del>
                                                                                <span class="amount">459.00</span>
                                                                            </del>
                                                                            <span class="amount"> </span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">ZenBook 3 Ultrabook 8GB 512SSD W10</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/5.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">XONE Wireless Controller</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/9.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Watch Stainless with Grey Suture Leather Strap</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/13.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Drone WIFI FPV With 4K</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/3.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">On-ear Wireless NXTG</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/4.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">4K Action Cam with Wi-Fi & GPS</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/12.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Bbd 23-Inch Screen LED-Lit Monitorss Buds</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/16.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 262.81</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/10.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                        <span class="onsale">
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                        </span>
                                                            <img src="assets/images/products/14.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> 262.81</span>
                                                                            </ins>
                                                                            <del>
                                                                                <span class="amount">399.00</span>
                                                                            </del>
                                                                            <span class="amount"> </span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                        <span class="onsale">
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                        </span>
                                                            <img src="assets/images/products/7.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> 789.95</span>
                                                                            </ins>
                                                                            <del>
                                                                                <span class="amount">999.00</span>
                                                                            </del>
                                                                            <span class="amount"> </span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Bluetooth on-ear PureBass Headphones</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/15.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 399.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/6.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Gear Virtual Reality 3D with Bluetooth Glasses</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/8.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Video & Air Quality Monitor</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                </div>
                                            </div>
                                            <!-- .woocommerce -->
                                        </div>
                                        <!-- .container-fluid -->
                                    </div>
                                    <!-- .products-carousel -->
                                </div>
                                <!-- .tab-pane -->
                                <div id="tab-59f89f096c1eb1" class="tab-pane " role="tabpanel">
                                    <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:7,&quot;slidesToScroll&quot;:7,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:700,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:780,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:5}}]}">
                                        <div class="container-fluid">
                                            <div class="woocommerce">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/13.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Drone WIFI FPV With 4K</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/6.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Gear Virtual Reality 3D with Bluetooth Glasses</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/16.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 262.81</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/9.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Watch Stainless with Grey Suture Leather Strap</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/10.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/3.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">On-ear Wireless NXTG</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/5.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">XONE Wireless Controller</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/1.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Smart Watches 3 SWR50</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/11.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/8.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Video & Air Quality Monitor</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                        <span class="onsale">
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                        </span>
                                                            <img src="assets/images/products/2.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> 309.95</span>
                                                                            </ins>
                                                                            <del>
                                                                                <span class="amount">459.00</span>
                                                                            </del>
                                                                            <span class="amount"> </span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">ZenBook 3 Ultrabook 8GB 512SSD W10</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                        <span class="onsale">
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                        </span>
                                                            <img src="assets/images/products/7.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> 789.95</span>
                                                                            </ins>
                                                                            <del>
                                                                                <span class="amount">999.00</span>
                                                                            </del>
                                                                            <span class="amount"> </span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Bluetooth on-ear PureBass Headphones</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/15.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 399.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/12.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Bbd 23-Inch Screen LED-Lit Monitorss Buds</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                        <span class="onsale">
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                        </span>
                                                            <img src="assets/images/products/14.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> 262.81</span>
                                                                            </ins>
                                                                            <del>
                                                                                <span class="amount">399.00</span>
                                                                            </del>
                                                                            <span class="amount"> </span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/4.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">4K Action Cam with Wi-Fi & GPS</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                </div>
                                            </div>
                                            <!-- .woocommerce -->
                                        </div>
                                        <!-- .container-fluid -->
                                    </div>
                                    <!-- .products-carousel -->
                                </div>
                                <!-- .tab-pane -->
                                <div id="tab-59f89f096c1eb2" class="tab-pane " role="tabpanel">
                                    <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:7,&quot;slidesToScroll&quot;:7,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:700,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:780,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:5}}]}">
                                        <div class="container-fluid">
                                            <div class="woocommerce">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/5.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">XONE Wireless Controller</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                        <span class="onsale">
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                        </span>
                                                            <img src="assets/images/products/7.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> 789.95</span>
                                                                            </ins>
                                                                            <del>
                                                                                <span class="amount">999.00</span>
                                                                            </del>
                                                                            <span class="amount"> </span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Bluetooth on-ear PureBass Headphones</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/16.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 262.81</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/8.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Video & Air Quality Monitor</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/9.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Watch Stainless with Grey Suture Leather Strap</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/4.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">4K Action Cam with Wi-Fi & GPS</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/11.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                        <span class="onsale">
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                        </span>
                                                            <img src="assets/images/products/14.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> 262.81</span>
                                                                            </ins>
                                                                            <del>
                                                                                <span class="amount">399.00</span>
                                                                            </del>
                                                                            <span class="amount"> </span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/10.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/3.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">On-ear Wireless NXTG</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/12.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Bbd 23-Inch Screen LED-Lit Monitorss Buds</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/13.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Drone WIFI FPV With 4K</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/6.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Gear Virtual Reality 3D with Bluetooth Glasses</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                        <span class="onsale">
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                        </span>
                                                            <img src="assets/images/products/2.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> 309.95</span>
                                                                            </ins>
                                                                            <del>
                                                                                <span class="amount">459.00</span>
                                                                            </del>
                                                                            <span class="amount"> </span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">ZenBook 3 Ultrabook 8GB 512SSD W10</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/15.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 399.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/1.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Smart Watches 3 SWR50</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                </div>
                                            </div>
                                            <!-- .woocommerce -->
                                        </div>
                                        <!-- .container-fluid -->
                                    </div>
                                    <!-- .products-carousel -->
                                </div>
                                <!-- .tab-pane -->
                                <div id="tab-59f89f096c1eb3" class="tab-pane " role="tabpanel">
                                    <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:7,&quot;slidesToScroll&quot;:7,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:700,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:780,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:5}}]}">
                                        <div class="container-fluid">
                                            <div class="woocommerce">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/15.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 399.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/8.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Video & Air Quality Monitor</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                        <span class="onsale">
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                        </span>
                                                            <img src="assets/images/products/7.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> 789.95</span>
                                                                            </ins>
                                                                            <del>
                                                                                <span class="amount">999.00</span>
                                                                            </del>
                                                                            <span class="amount"> </span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Bluetooth on-ear PureBass Headphones</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                        <span class="onsale">
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                        </span>
                                                            <img src="assets/images/products/14.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> 262.81</span>
                                                                            </ins>
                                                                            <del>
                                                                                <span class="amount">399.00</span>
                                                                            </del>
                                                                            <span class="amount"> </span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/9.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Watch Stainless with Grey Suture Leather Strap</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/12.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Bbd 23-Inch Screen LED-Lit Monitorss Buds</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/10.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/11.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/1.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Smart Watches 3 SWR50</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/3.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">On-ear Wireless NXTG</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/16.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 262.81</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/4.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">4K Action Cam with Wi-Fi & GPS</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                        <span class="onsale">
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                        </span>
                                                            <img src="assets/images/products/2.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> 309.95</span>
                                                                            </ins>
                                                                            <del>
                                                                                <span class="amount">459.00</span>
                                                                            </del>
                                                                            <span class="amount"> </span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">ZenBook 3 Ultrabook 8GB 512SSD W10</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/13.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Drone WIFI FPV With 4K</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/6.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Gear Virtual Reality 3D with Bluetooth Glasses</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/5.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">XONE Wireless Controller</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                </div>
                                            </div>
                                            <!-- .woocommerce -->
                                        </div>
                                        <!-- .container-fluid -->
                                    </div>
                                    <!-- .products-carousel -->
                                </div>
                                <!-- .tab-pane -->
                            </div>
                            <!-- .tab-content -->
                        </div>
                        <!-- .section-products-carousel-tabs-wrap -->
                    </section>
                    <!-- .section-products-carousel-tabs -->
                    <div class="fullwidth-notice stretch-full-width">
                        <div class="col-full">
                            <p class="message">Download our new app today! Dont miss our mobile-only offers and shop with Android Play.</p>
                        </div>
                        <!-- .col-full -->
                    </div>
                    <!-- .fullwidth-notice -->
                    <section class="type-2 section-products-carousel-tabs section-product-carousel-with-featured-product carousel-with-featured-3">
                        <header class="section-header">
                            <h2 class="section-title">Cameras &amp; Camcoders</h2>
                            <ul role="tablist" class="nav justify-content-center">
                                <li class="nav-item"><a class="nav-link active" href="#top-20-1" data-toggle="tab">Top 20</a></li>
                                <li class="nav-item"><a class="nav-link" href="#digital-cameras" data-toggle="tab">Digital Cameras</a></li>
                                <li class="nav-item"><a class="nav-link" href="#action-cameras" data-toggle="tab">Action Cameras</a></li>
                                <li class="nav-item"><a class="nav-link" href="#compacts" data-toggle="tab">Compacts</a></li>
                            </ul>
                        </header>
                        <div class="tab-content">
                            <div role="tabpanel" id="top-20-1" class="tab-pane active">
                                <div class="tab-product-carousel-with-featured-product">
                                    <div class="tab-carousel-products">
                                        <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;rows&quot;:2,&quot;slidesPerRow&quot;:5,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesPerRow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesPerRow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1700,&quot;settings&quot;:{&quot;slidesPerRow&quot;:4,&quot;slidesToScroll&quot;:4}}]}">
                                            <div class="container-fluid">
                                                <div class="woocommerce columns-5">
                                                    <div class="products">
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/15.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 399.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/5.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">XONE Wireless Controller</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/12.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Bbd 23-Inch Screen LED-Lit Monitorss Buds</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/11.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/13.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Drone WIFI FPV With 4K</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/16.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 262.81</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/9.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Watch Stainless with Grey Suture Leather Strap</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                            <span class="onsale">
                                                                                <span class="woocommerce-Price-amount amount">
                                                                                    <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                            </span>
                                                                <img src="assets/images/products/2.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> 309.95</span>
                                                                                </ins>
                                                                                <del>
                                                                                    <span class="amount">459.00</span>
                                                                                </del>
                                                                                <span class="amount"> </span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">ZenBook 3 Ultrabook 8GB 512SSD W10</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                            <span class="onsale">
                                                                                <span class="woocommerce-Price-amount amount">
                                                                                    <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                            </span>
                                                                <img src="assets/images/products/7.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> 789.95</span>
                                                                                </ins>
                                                                                <del>
                                                                                    <span class="amount">999.00</span>
                                                                                </del>
                                                                                <span class="amount"> </span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Bluetooth on-ear PureBass Headphones</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/8.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Video & Air Quality Monitor</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/10.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                            <span class="onsale">
                                                                                <span class="woocommerce-Price-amount amount">
                                                                                    <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                            </span>
                                                                <img src="assets/images/products/14.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> 262.81</span>
                                                                                </ins>
                                                                                <del>
                                                                                    <span class="amount">399.00</span>
                                                                                </del>
                                                                                <span class="amount"> </span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/4.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">4K Action Cam with Wi-Fi & GPS</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/6.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Gear Virtual Reality 3D with Bluetooth Glasses</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/1.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Smart Watches 3 SWR50</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/3.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">On-ear Wireless NXTG</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                    </div>
                                                </div>
                                                <!-- .woocommerce-->
                                            </div>
                                            <!-- .container-fluid -->
                                        </div>
                                        <!-- .products-carousel -->
                                    </div>
                                    <!-- .tab-carousel-products -->
                                    <div class="tab-featured-product">
                                        <div class="woocommerce columns-1">
                                            <div class="products">
                                                <div class="tab-product-featured product">
                                                    <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                        <img width="600" height="600" alt="" class="attachment-shop_single size-shop_single wp-post-image" src="assets/images/products/featured.jpg">
                                                        <span class="price">
                                                                        <ins>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>179.99</span>
                                                                        </ins>
                                                                        <del>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>239.99</span>
                                                                        </del>
                                                                    </span>
                                                        <h2 class="woocommerce-loop-product__title">Snap White Instant Digital Camera in White</h2>
                                                    </a>
                                                    <div class="techmarket-product-rating">
                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                        <span style="width:0%">
                                                                            <strong class="rating">0</strong> out of 5</span>
                                                        </div>
                                                        <span class="review-count">(0)</span>
                                                    </div>
                                                    <a class="button add_to_cart_button" href="cart.html">Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- .tab-featured-product -->
                                </div>
                                <!-- .tab-product-carousel-with-featured-product -->
                            </div>
                            <!-- .tab-pane -->
                            <div role="tabpanel" id="digital-cameras" class="tab-pane">
                                <div class="tab-product-carousel-with-featured-product">
                                    <div class="tab-carousel-products">
                                        <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;rows&quot;:2,&quot;slidesPerRow&quot;:5,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesPerRow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesPerRow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1700,&quot;settings&quot;:{&quot;slidesPerRow&quot;:4,&quot;slidesToScroll&quot;:4}}]}">
                                            <div class="container-fluid">
                                                <div class="woocommerce columns-5">
                                                    <div class="products">
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/10.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/3.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">On-ear Wireless NXTG</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/8.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Video & Air Quality Monitor</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/16.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 262.81</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/15.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 399.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/11.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/12.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Bbd 23-Inch Screen LED-Lit Monitorss Buds</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/9.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Watch Stainless with Grey Suture Leather Strap</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/13.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Drone WIFI FPV With 4K</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                            <span class="onsale">
                                                                                <span class="woocommerce-Price-amount amount">
                                                                                    <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                            </span>
                                                                <img src="assets/images/products/7.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> 789.95</span>
                                                                                </ins>
                                                                                <del>
                                                                                    <span class="amount">999.00</span>
                                                                                </del>
                                                                                <span class="amount"> </span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Bluetooth on-ear PureBass Headphones</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/5.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">XONE Wireless Controller</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                            <span class="onsale">
                                                                                <span class="woocommerce-Price-amount amount">
                                                                                    <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                            </span>
                                                                <img src="assets/images/products/14.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> 262.81</span>
                                                                                </ins>
                                                                                <del>
                                                                                    <span class="amount">399.00</span>
                                                                                </del>
                                                                                <span class="amount"> </span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/4.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">4K Action Cam with Wi-Fi & GPS</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                            <span class="onsale">
                                                                                <span class="woocommerce-Price-amount amount">
                                                                                    <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                            </span>
                                                                <img src="assets/images/products/2.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> 309.95</span>
                                                                                </ins>
                                                                                <del>
                                                                                    <span class="amount">459.00</span>
                                                                                </del>
                                                                                <span class="amount"> </span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">ZenBook 3 Ultrabook 8GB 512SSD W10</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/1.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Smart Watches 3 SWR50</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/6.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Gear Virtual Reality 3D with Bluetooth Glasses</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                    </div>
                                                </div>
                                                <!-- .woocommerce-->
                                            </div>
                                            <!-- .container-fluid -->
                                        </div>
                                        <!-- .products-carousel -->
                                    </div>
                                    <!-- .tab-carousel-products -->
                                    <div class="tab-featured-product">
                                        <div class="woocommerce columns-1">
                                            <div class="products">
                                                <div class="tab-product-featured product">
                                                    <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                        <img width="600" height="600" alt="" class="attachment-shop_single size-shop_single wp-post-image" src="assets/images/products/featured-1.jpg">
                                                        <span class="price">
                                                                        <ins>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>179.99</span>
                                                                        </ins>
                                                                        <del>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>239.99</span>
                                                                        </del>
                                                                    </span>
                                                        <h2 class="woocommerce-loop-product__title">Snap White Instant Digital Camera in White</h2>
                                                    </a>
                                                    <div class="techmarket-product-rating">
                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                        <span style="width:0%">
                                                                            <strong class="rating">0</strong> out of 5</span>
                                                        </div>
                                                        <span class="review-count">(0)</span>
                                                    </div>
                                                    <a class="button add_to_cart_button" href="cart.html">Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- .tab-featured-product -->
                                </div>
                                <!-- .tab-product-carousel-with-featured-product -->
                            </div>
                            <!-- .tab-pane -->
                            <div role="tabpanel" id="action-cameras" class="tab-pane">
                                <div class="tab-product-carousel-with-featured-product">
                                    <div class="tab-carousel-products">
                                        <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;rows&quot;:2,&quot;slidesPerRow&quot;:5,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesPerRow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesPerRow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1700,&quot;settings&quot;:{&quot;slidesPerRow&quot;:4,&quot;slidesToScroll&quot;:4}}]}">
                                            <div class="container-fluid">
                                                <div class="woocommerce columns-5">
                                                    <div class="products">
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/9.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Watch Stainless with Grey Suture Leather Strap</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/12.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Bbd 23-Inch Screen LED-Lit Monitorss Buds</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/16.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 262.81</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/15.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 399.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/4.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">4K Action Cam with Wi-Fi & GPS</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/8.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Video & Air Quality Monitor</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/13.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Drone WIFI FPV With 4K</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                            <span class="onsale">
                                                                                <span class="woocommerce-Price-amount amount">
                                                                                    <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                            </span>
                                                                <img src="assets/images/products/2.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> 309.95</span>
                                                                                </ins>
                                                                                <del>
                                                                                    <span class="amount">459.00</span>
                                                                                </del>
                                                                                <span class="amount"> </span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">ZenBook 3 Ultrabook 8GB 512SSD W10</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/3.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">On-ear Wireless NXTG</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/10.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/6.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Gear Virtual Reality 3D with Bluetooth Glasses</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                            <span class="onsale">
                                                                                <span class="woocommerce-Price-amount amount">
                                                                                    <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                            </span>
                                                                <img src="assets/images/products/7.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> 789.95</span>
                                                                                </ins>
                                                                                <del>
                                                                                    <span class="amount">999.00</span>
                                                                                </del>
                                                                                <span class="amount"> </span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Bluetooth on-ear PureBass Headphones</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                            <span class="onsale">
                                                                                <span class="woocommerce-Price-amount amount">
                                                                                    <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                            </span>
                                                                <img src="assets/images/products/14.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> 262.81</span>
                                                                                </ins>
                                                                                <del>
                                                                                    <span class="amount">399.00</span>
                                                                                </del>
                                                                                <span class="amount"> </span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/1.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Smart Watches 3 SWR50</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/5.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">XONE Wireless Controller</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/11.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                    </div>
                                                </div>
                                                <!-- .woocommerce-->
                                            </div>
                                            <!-- .container-fluid -->
                                        </div>
                                        <!-- .products-carousel -->
                                    </div>
                                    <!-- .tab-carousel-products -->
                                    <div class="tab-featured-product">
                                        <div class="woocommerce columns-1">
                                            <div class="products">
                                                <div class="tab-product-featured product">
                                                    <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                        <img width="600" height="600" alt="" class="attachment-shop_single size-shop_single wp-post-image" src="assets/images/products/featured.jpg">
                                                        <span class="price">
                                                                        <ins>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>179.99</span>
                                                                        </ins>
                                                                        <del>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>239.99</span>
                                                                        </del>
                                                                    </span>
                                                        <h2 class="woocommerce-loop-product__title">Snap White Instant Digital Camera in White</h2>
                                                    </a>
                                                    <div class="techmarket-product-rating">
                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                        <span style="width:0%">
                                                                            <strong class="rating">0</strong> out of 5</span>
                                                        </div>
                                                        <span class="review-count">(0)</span>
                                                    </div>
                                                    <a class="button add_to_cart_button" href="cart.html">Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- .tab-featured-product -->
                                </div>
                                <!-- .tab-product-carousel-with-featured-product -->
                            </div>
                            <!-- .tab-pane -->
                            <div role="tabpanel" id="compacts" class="tab-pane">
                                <div class="tab-product-carousel-with-featured-product">
                                    <div class="tab-carousel-products">
                                        <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;rows&quot;:2,&quot;slidesPerRow&quot;:5,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesPerRow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesPerRow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1700,&quot;settings&quot;:{&quot;slidesPerRow&quot;:4,&quot;slidesToScroll&quot;:4}}]}">
                                            <div class="container-fluid">
                                                <div class="woocommerce columns-5">
                                                    <div class="products">
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/13.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Drone WIFI FPV With 4K</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                            <span class="onsale">
                                                                                <span class="woocommerce-Price-amount amount">
                                                                                    <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                            </span>
                                                                <img src="assets/images/products/2.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> 309.95</span>
                                                                                </ins>
                                                                                <del>
                                                                                    <span class="amount">459.00</span>
                                                                                </del>
                                                                                <span class="amount"> </span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">ZenBook 3 Ultrabook 8GB 512SSD W10</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/11.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/5.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">XONE Wireless Controller</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/12.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Bbd 23-Inch Screen LED-Lit Monitorss Buds</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/10.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/4.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">4K Action Cam with Wi-Fi & GPS</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                            <span class="onsale">
                                                                                <span class="woocommerce-Price-amount amount">
                                                                                    <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                            </span>
                                                                <img src="assets/images/products/7.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> 789.95</span>
                                                                                </ins>
                                                                                <del>
                                                                                    <span class="amount">999.00</span>
                                                                                </del>
                                                                                <span class="amount"> </span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Bluetooth on-ear PureBass Headphones</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/8.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Video & Air Quality Monitor</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/1.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Smart Watches 3 SWR50</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                            <span class="onsale">
                                                                                <span class="woocommerce-Price-amount amount">
                                                                                    <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                            </span>
                                                                <img src="assets/images/products/14.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> 262.81</span>
                                                                                </ins>
                                                                                <del>
                                                                                    <span class="amount">399.00</span>
                                                                                </del>
                                                                                <span class="amount"> </span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/3.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">On-ear Wireless NXTG</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/16.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 262.81</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/6.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Gear Virtual Reality 3D with Bluetooth Glasses</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/15.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 399.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/9.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 456.00</span>
                                                                            </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Watch Stainless with Grey Suture Leather Strap</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                    </div>
                                                </div>
                                                <!-- .woocommerce-->
                                            </div>
                                            <!-- .container-fluid -->
                                        </div>
                                        <!-- .products-carousel -->
                                    </div>
                                    <!-- .tab-carousel-products -->
                                    <div class="tab-featured-product">
                                        <div class="woocommerce columns-1">
                                            <div class="products">
                                                <div class="tab-product-featured product">
                                                    <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                        <img width="600" height="600" alt="" class="attachment-shop_single size-shop_single wp-post-image" src="assets/images/products/featured-1.jpg">
                                                        <span class="price">
                                                                        <ins>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>179.99</span>
                                                                        </ins>
                                                                        <del>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>239.99</span>
                                                                        </del>
                                                                    </span>
                                                        <h2 class="woocommerce-loop-product__title">Snap White Instant Digital Camera in White</h2>
                                                    </a>
                                                    <div class="techmarket-product-rating">
                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                        <span style="width:0%">
                                                                            <strong class="rating">0</strong> out of 5</span>
                                                        </div>
                                                        <span class="review-count">(0)</span>
                                                    </div>
                                                    <a class="button add_to_cart_button" href="cart.html">Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- .tab-featured-product -->
                                </div>
                                <!-- .tab-product-carousel-with-featured-product -->
                            </div>
                            <!-- .tab-pane -->
                        </div>
                        <!-- .tab-content -->
                    </section>
                    <!-- .section-products-carousel-tabs-->
                    <section class="section-landscape-products-carousel-tab section-products-carousel-tabs best-rated-2">
                        <div class="section-products-carousel-tabs-wrap">
                            <header class="section-header">
                                <h2 class="section-title">Best Rated Sellers</h2>
                                <ul role="tablist" class="nav justify-content-end">
                                    <li class="nav-item"><a class="nav-link active" href="#tab-59f89f096ef360" data-toggle="tab">Top 20</a></li>
                                    <li class="nav-item"><a class="nav-link " href="#tab-59f89f096ef361" data-toggle="tab">Audio &amp; Video</a></li>
                                    <li class="nav-item"><a class="nav-link " href="#tab-59f89f096ef362" data-toggle="tab">Laptops &amp; Computers</a></li>
                                    <li class="nav-item"><a class="nav-link " href="#tab-59f89f096ef363" data-toggle="tab">Video Cameras</a></li>
                                </ul>
                            </header>
                            <!-- .section-header-->
                            <div class="tab-content">
                                <div id="tab-59f89f096ef360" class="tab-pane active" role="tabpanel">
                                    <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:900,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1700,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}}]}">
                                        <div class="container-fluid">
                                            <div class="woocommerce">
                                                <div class="products">
                                                    <div class="landscape-product product">
                                                        <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                            <div class="media">
                                                                <img class="wp-post-image" src="assets/images/products/card-3.jpg" alt="">
                                                                <div class="media-body">
                                                                                <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> $3,788.00</span>
                                                                                    </ins>
                                                                                    <del>
                                                                                        <span class="amount">$4,780.00</span>
                                                                                    </del>
                                                                                    <span class="amount"> </span>
                                                                                </span>
                                                                    <!-- .price -->
                                                                    <h2 class="woocommerce-loop-product__title">PowerBank 4400</h2>
                                                                    <div class="techmarket-product-rating">
                                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                                        <span style="width:0%">
                                                                                            <strong class="rating">0</strong> out of 5</span>
                                                                        </div>
                                                                        <span class="review-count">(0)</span>
                                                                    </div>
                                                                    <!-- .techmarket-product-rating -->
                                                                </div>
                                                                <!-- .media-body -->
                                                            </div>
                                                            <!-- .media -->
                                                        </a>
                                                        <!-- .woocommerce-LoopProduct-link -->
                                                    </div>
                                                    <!-- .landscape-product -->
                                                    <div class="landscape-product product">
                                                        <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                            <div class="media">
                                                                <img class="wp-post-image" src="assets/images/products/card-3.jpg" alt="">
                                                                <div class="media-body">
                                                                                <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> $3,788.00</span>
                                                                                    </ins>
                                                                                    <del>
                                                                                        <span class="amount">$4,780.00</span>
                                                                                    </del>
                                                                                    <span class="amount"> </span>
                                                                                </span>
                                                                    <!-- .price -->
                                                                    <h2 class="woocommerce-loop-product__title">PowerBank 4400</h2>
                                                                    <div class="techmarket-product-rating">
                                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                                        <span style="width:0%">
                                                                                            <strong class="rating">0</strong> out of 5</span>
                                                                        </div>
                                                                        <span class="review-count">(0)</span>
                                                                    </div>
                                                                    <!-- .techmarket-product-rating -->
                                                                </div>
                                                                <!-- .media-body -->
                                                            </div>
                                                            <!-- .media -->
                                                        </a>
                                                        <!-- .woocommerce-LoopProduct-link -->
                                                    </div>
                                                    <!-- .landscape-product -->
                                                    <div class="landscape-product product">
                                                        <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                            <div class="media">
                                                                <img class="wp-post-image" src="assets/images/products/card-2.jpg" alt="">
                                                                <div class="media-body">
                                                                                <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> $500</span>
                                                                                </span>
                                                                    <!-- .price -->
                                                                    <h2 class="woocommerce-loop-product__title">Headset 3D Glasses VR for Android</h2>
                                                                    <div class="techmarket-product-rating">
                                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                                        <span style="width:0%">
                                                                                            <strong class="rating">0</strong> out of 5</span>
                                                                        </div>
                                                                        <span class="review-count">(0)</span>
                                                                    </div>
                                                                    <!-- .techmarket-product-rating -->
                                                                </div>
                                                                <!-- .media-body -->
                                                            </div>
                                                            <!-- .media -->
                                                        </a>
                                                        <!-- .woocommerce-LoopProduct-link -->
                                                    </div>
                                                    <!-- .landscape-product -->
                                                    <div class="landscape-product product">
                                                        <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                            <div class="media">
                                                                <img class="wp-post-image" src="assets/images/products/card-5.jpg" alt="">
                                                                <div class="media-body">
                                                                                <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> $3,788.00</span>
                                                                                    </ins>
                                                                                    <del>
                                                                                        <span class="amount">$4,780.00</span>
                                                                                    </del>
                                                                                    <span class="amount"> </span>
                                                                                </span>
                                                                    <!-- .price -->
                                                                    <h2 class="woocommerce-loop-product__title">Smart Watches 3 SWR50</h2>
                                                                    <div class="techmarket-product-rating">
                                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                                        <span style="width:0%">
                                                                                            <strong class="rating">0</strong> out of 5</span>
                                                                        </div>
                                                                        <span class="review-count">(0)</span>
                                                                    </div>
                                                                    <!-- .techmarket-product-rating -->
                                                                </div>
                                                                <!-- .media-body -->
                                                            </div>
                                                            <!-- .media -->
                                                        </a>
                                                        <!-- .woocommerce-LoopProduct-link -->
                                                    </div>
                                                    <!-- .landscape-product -->
                                                    <div class="landscape-product product">
                                                        <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                            <div class="media">
                                                                <img class="wp-post-image" src="assets/images/products/card-4.jpg" alt="">
                                                                <div class="media-body">
                                                                                <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> $800</span>
                                                                                </span>
                                                                    <!-- .price -->
                                                                    <h2 class="woocommerce-loop-product__title">Snap White Instant Digital Camera in White</h2>
                                                                    <div class="techmarket-product-rating">
                                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                                        <span style="width:0%">
                                                                                            <strong class="rating">0</strong> out of 5</span>
                                                                        </div>
                                                                        <span class="review-count">(0)</span>
                                                                    </div>
                                                                    <!-- .techmarket-product-rating -->
                                                                </div>
                                                                <!-- .media-body -->
                                                            </div>
                                                            <!-- .media -->
                                                        </a>
                                                        <!-- .woocommerce-LoopProduct-link -->
                                                    </div>
                                                    <!-- .landscape-product -->
                                                    <div class="landscape-product product">
                                                        <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                            <div class="media">
                                                                <img class="wp-post-image" src="assets/images/products/card-1.jpg" alt="">
                                                                <div class="media-body">
                                                                                <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> $3,788.00</span>
                                                                                    </ins>
                                                                                    <del>
                                                                                        <span class="amount">$4,780.00</span>
                                                                                    </del>
                                                                                    <span class="amount"> </span>
                                                                                </span>
                                                                    <!-- .price -->
                                                                    <h2 class="woocommerce-loop-product__title">Unlocked Android 6″ Inch 4.4.2 Dual Core</h2>
                                                                    <div class="techmarket-product-rating">
                                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                                        <span style="width:0%">
                                                                                            <strong class="rating">0</strong> out of 5</span>
                                                                        </div>
                                                                        <span class="review-count">(0)</span>
                                                                    </div>
                                                                    <!-- .techmarket-product-rating -->
                                                                </div>
                                                                <!-- .media-body -->
                                                            </div>
                                                            <!-- .media -->
                                                        </a>
                                                        <!-- .woocommerce-LoopProduct-link -->
                                                    </div>
                                                    <!-- .landscape-product -->
                                                    <div class="landscape-product product">
                                                        <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                            <div class="media">
                                                                <img class="wp-post-image" src="assets/images/products/card-4.jpg" alt="">
                                                                <div class="media-body">
                                                                                <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> $800</span>
                                                                                </span>
                                                                    <!-- .price -->
                                                                    <h2 class="woocommerce-loop-product__title">Snap White Instant Digital Camera in White</h2>
                                                                    <div class="techmarket-product-rating">
                                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                                        <span style="width:0%">
                                                                                            <strong class="rating">0</strong> out of 5</span>
                                                                        </div>
                                                                        <span class="review-count">(0)</span>
                                                                    </div>
                                                                    <!-- .techmarket-product-rating -->
                                                                </div>
                                                                <!-- .media-body -->
                                                            </div>
                                                            <!-- .media -->
                                                        </a>
                                                        <!-- .woocommerce-LoopProduct-link -->
                                                    </div>
                                                    <!-- .landscape-product -->
                                                    <div class="landscape-product product">
                                                        <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                            <div class="media">
                                                                <img class="wp-post-image" src="assets/images/products/card-6.jpg" alt="">
                                                                <div class="media-body">
                                                                                <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> $600</span>
                                                                                </span>
                                                                    <!-- .price -->
                                                                    <h2 class="woocommerce-loop-product__title">ZenBook 3 Ultrabook 8GB 512SSD W10</h2>
                                                                    <div class="techmarket-product-rating">
                                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                                        <span style="width:0%">
                                                                                            <strong class="rating">0</strong> out of 5</span>
                                                                        </div>
                                                                        <span class="review-count">(0)</span>
                                                                    </div>
                                                                    <!-- .techmarket-product-rating -->
                                                                </div>
                                                                <!-- .media-body -->
                                                            </div>
                                                            <!-- .media -->
                                                        </a>
                                                        <!-- .woocommerce-LoopProduct-link -->
                                                    </div>
                                                    <!-- .landscape-product -->
                                                </div>
                                            </div>
                                            <!-- .woocommerce -->
                                        </div>
                                        <!-- .container-fluid -->
                                    </div>
                                    <!-- .products-carousel -->
                                </div>
                                <!-- .tab-pane -->
                                <div id="tab-59f89f096ef361" class="tab-pane " role="tabpanel">
                                    <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:900,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1700,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}}]}">
                                        <div class="container-fluid">
                                            <div class="woocommerce">
                                                <div class="products">
                                                    <div class="landscape-product product">
                                                        <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                            <div class="media">
                                                                <img class="wp-post-image" src="assets/images/products/card-4.jpg" alt="">
                                                                <div class="media-body">
                                                                                <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> $800</span>
                                                                                </span>
                                                                    <!-- .price -->
                                                                    <h2 class="woocommerce-loop-product__title">Snap White Instant Digital Camera in White</h2>
                                                                    <div class="techmarket-product-rating">
                                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                                        <span style="width:0%">
                                                                                            <strong class="rating">0</strong> out of 5</span>
                                                                        </div>
                                                                        <span class="review-count">(0)</span>
                                                                    </div>
                                                                    <!-- .techmarket-product-rating -->
                                                                </div>
                                                                <!-- .media-body -->
                                                            </div>
                                                            <!-- .media -->
                                                        </a>
                                                        <!-- .woocommerce-LoopProduct-link -->
                                                    </div>
                                                    <!-- .landscape-product -->
                                                    <div class="landscape-product product">
                                                        <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                            <div class="media">
                                                                <img class="wp-post-image" src="assets/images/products/card-6.jpg" alt="">
                                                                <div class="media-body">
                                                                                <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> $600</span>
                                                                                </span>
                                                                    <!-- .price -->
                                                                    <h2 class="woocommerce-loop-product__title">ZenBook 3 Ultrabook 8GB 512SSD W10</h2>
                                                                    <div class="techmarket-product-rating">
                                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                                        <span style="width:0%">
                                                                                            <strong class="rating">0</strong> out of 5</span>
                                                                        </div>
                                                                        <span class="review-count">(0)</span>
                                                                    </div>
                                                                    <!-- .techmarket-product-rating -->
                                                                </div>
                                                                <!-- .media-body -->
                                                            </div>
                                                            <!-- .media -->
                                                        </a>
                                                        <!-- .woocommerce-LoopProduct-link -->
                                                    </div>
                                                    <!-- .landscape-product -->
                                                    <div class="landscape-product product">
                                                        <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                            <div class="media">
                                                                <img class="wp-post-image" src="assets/images/products/card-3.jpg" alt="">
                                                                <div class="media-body">
                                                                                <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> $3,788.00</span>
                                                                                    </ins>
                                                                                    <del>
                                                                                        <span class="amount">$4,780.00</span>
                                                                                    </del>
                                                                                    <span class="amount"> </span>
                                                                                </span>
                                                                    <!-- .price -->
                                                                    <h2 class="woocommerce-loop-product__title">PowerBank 4400</h2>
                                                                    <div class="techmarket-product-rating">
                                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                                        <span style="width:0%">
                                                                                            <strong class="rating">0</strong> out of 5</span>
                                                                        </div>
                                                                        <span class="review-count">(0)</span>
                                                                    </div>
                                                                    <!-- .techmarket-product-rating -->
                                                                </div>
                                                                <!-- .media-body -->
                                                            </div>
                                                            <!-- .media -->
                                                        </a>
                                                        <!-- .woocommerce-LoopProduct-link -->
                                                    </div>
                                                    <!-- .landscape-product -->
                                                    <div class="landscape-product product">
                                                        <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                            <div class="media">
                                                                <img class="wp-post-image" src="assets/images/products/card-1.jpg" alt="">
                                                                <div class="media-body">
                                                                                <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> $3,788.00</span>
                                                                                    </ins>
                                                                                    <del>
                                                                                        <span class="amount">$4,780.00</span>
                                                                                    </del>
                                                                                    <span class="amount"> </span>
                                                                                </span>
                                                                    <!-- .price -->
                                                                    <h2 class="woocommerce-loop-product__title">Unlocked Android 6″ Inch 4.4.2 Dual Core</h2>
                                                                    <div class="techmarket-product-rating">
                                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                                        <span style="width:0%">
                                                                                            <strong class="rating">0</strong> out of 5</span>
                                                                        </div>
                                                                        <span class="review-count">(0)</span>
                                                                    </div>
                                                                    <!-- .techmarket-product-rating -->
                                                                </div>
                                                                <!-- .media-body -->
                                                            </div>
                                                            <!-- .media -->
                                                        </a>
                                                        <!-- .woocommerce-LoopProduct-link -->
                                                    </div>
                                                    <!-- .landscape-product -->
                                                    <div class="landscape-product product">
                                                        <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                            <div class="media">
                                                                <img class="wp-post-image" src="assets/images/products/card-5.jpg" alt="">
                                                                <div class="media-body">
                                                                                <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> $3,788.00</span>
                                                                                    </ins>
                                                                                    <del>
                                                                                        <span class="amount">$4,780.00</span>
                                                                                    </del>
                                                                                    <span class="amount"> </span>
                                                                                </span>
                                                                    <!-- .price -->
                                                                    <h2 class="woocommerce-loop-product__title">Smart Watches 3 SWR50</h2>
                                                                    <div class="techmarket-product-rating">
                                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                                        <span style="width:0%">
                                                                                            <strong class="rating">0</strong> out of 5</span>
                                                                        </div>
                                                                        <span class="review-count">(0)</span>
                                                                    </div>
                                                                    <!-- .techmarket-product-rating -->
                                                                </div>
                                                                <!-- .media-body -->
                                                            </div>
                                                            <!-- .media -->
                                                        </a>
                                                        <!-- .woocommerce-LoopProduct-link -->
                                                    </div>
                                                    <!-- .landscape-product -->
                                                    <div class="landscape-product product">
                                                        <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                            <div class="media">
                                                                <img class="wp-post-image" src="assets/images/products/card-2.jpg" alt="">
                                                                <div class="media-body">
                                                                                <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> $500</span>
                                                                                </span>
                                                                    <!-- .price -->
                                                                    <h2 class="woocommerce-loop-product__title">Headset 3D Glasses VR for Android</h2>
                                                                    <div class="techmarket-product-rating">
                                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                                        <span style="width:0%">
                                                                                            <strong class="rating">0</strong> out of 5</span>
                                                                        </div>
                                                                        <span class="review-count">(0)</span>
                                                                    </div>
                                                                    <!-- .techmarket-product-rating -->
                                                                </div>
                                                                <!-- .media-body -->
                                                            </div>
                                                            <!-- .media -->
                                                        </a>
                                                        <!-- .woocommerce-LoopProduct-link -->
                                                    </div>
                                                    <!-- .landscape-product -->
                                                    <div class="landscape-product product">
                                                        <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                            <div class="media">
                                                                <img class="wp-post-image" src="assets/images/products/card-4.jpg" alt="">
                                                                <div class="media-body">
                                                                                <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> $800</span>
                                                                                </span>
                                                                    <!-- .price -->
                                                                    <h2 class="woocommerce-loop-product__title">Snap White Instant Digital Camera in White</h2>
                                                                    <div class="techmarket-product-rating">
                                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                                        <span style="width:0%">
                                                                                            <strong class="rating">0</strong> out of 5</span>
                                                                        </div>
                                                                        <span class="review-count">(0)</span>
                                                                    </div>
                                                                    <!-- .techmarket-product-rating -->
                                                                </div>
                                                                <!-- .media-body -->
                                                            </div>
                                                            <!-- .media -->
                                                        </a>
                                                        <!-- .woocommerce-LoopProduct-link -->
                                                    </div>
                                                    <!-- .landscape-product -->
                                                    <div class="landscape-product product">
                                                        <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                            <div class="media">
                                                                <img class="wp-post-image" src="assets/images/products/card-3.jpg" alt="">
                                                                <div class="media-body">
                                                                                <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> $3,788.00</span>
                                                                                    </ins>
                                                                                    <del>
                                                                                        <span class="amount">$4,780.00</span>
                                                                                    </del>
                                                                                    <span class="amount"> </span>
                                                                                </span>
                                                                    <!-- .price -->
                                                                    <h2 class="woocommerce-loop-product__title">PowerBank 4400</h2>
                                                                    <div class="techmarket-product-rating">
                                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                                        <span style="width:0%">
                                                                                            <strong class="rating">0</strong> out of 5</span>
                                                                        </div>
                                                                        <span class="review-count">(0)</span>
                                                                    </div>
                                                                    <!-- .techmarket-product-rating -->
                                                                </div>
                                                                <!-- .media-body -->
                                                            </div>
                                                            <!-- .media -->
                                                        </a>
                                                        <!-- .woocommerce-LoopProduct-link -->
                                                    </div>
                                                    <!-- .landscape-product -->
                                                </div>
                                            </div>
                                            <!-- .woocommerce -->
                                        </div>
                                        <!-- .container-fluid -->
                                    </div>
                                    <!-- .products-carousel -->
                                </div>
                                <!-- .tab-pane -->
                                <div id="tab-59f89f096ef362" class="tab-pane " role="tabpanel">
                                    <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:900,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1700,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}}]}">
                                        <div class="container-fluid">
                                            <div class="woocommerce">
                                                <div class="products">
                                                    <div class="landscape-product product">
                                                        <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                            <div class="media">
                                                                <img class="wp-post-image" src="assets/images/products/card-1.jpg" alt="">
                                                                <div class="media-body">
                                                                                <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> $3,788.00</span>
                                                                                    </ins>
                                                                                    <del>
                                                                                        <span class="amount">$4,780.00</span>
                                                                                    </del>
                                                                                    <span class="amount"> </span>
                                                                                </span>
                                                                    <!-- .price -->
                                                                    <h2 class="woocommerce-loop-product__title">Unlocked Android 6″ Inch 4.4.2 Dual Core</h2>
                                                                    <div class="techmarket-product-rating">
                                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                                        <span style="width:0%">
                                                                                            <strong class="rating">0</strong> out of 5</span>
                                                                        </div>
                                                                        <span class="review-count">(0)</span>
                                                                    </div>
                                                                    <!-- .techmarket-product-rating -->
                                                                </div>
                                                                <!-- .media-body -->
                                                            </div>
                                                            <!-- .media -->
                                                        </a>
                                                        <!-- .woocommerce-LoopProduct-link -->
                                                    </div>
                                                    <!-- .landscape-product -->
                                                    <div class="landscape-product product">
                                                        <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                            <div class="media">
                                                                <img class="wp-post-image" src="assets/images/products/card-4.jpg" alt="">
                                                                <div class="media-body">
                                                                                <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> $800</span>
                                                                                </span>
                                                                    <!-- .price -->
                                                                    <h2 class="woocommerce-loop-product__title">Snap White Instant Digital Camera in White</h2>
                                                                    <div class="techmarket-product-rating">
                                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                                        <span style="width:0%">
                                                                                            <strong class="rating">0</strong> out of 5</span>
                                                                        </div>
                                                                        <span class="review-count">(0)</span>
                                                                    </div>
                                                                    <!-- .techmarket-product-rating -->
                                                                </div>
                                                                <!-- .media-body -->
                                                            </div>
                                                            <!-- .media -->
                                                        </a>
                                                        <!-- .woocommerce-LoopProduct-link -->
                                                    </div>
                                                    <!-- .landscape-product -->
                                                    <div class="landscape-product product">
                                                        <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                            <div class="media">
                                                                <img class="wp-post-image" src="assets/images/products/card-5.jpg" alt="">
                                                                <div class="media-body">
                                                                                <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> $3,788.00</span>
                                                                                    </ins>
                                                                                    <del>
                                                                                        <span class="amount">$4,780.00</span>
                                                                                    </del>
                                                                                    <span class="amount"> </span>
                                                                                </span>
                                                                    <!-- .price -->
                                                                    <h2 class="woocommerce-loop-product__title">Smart Watches 3 SWR50</h2>
                                                                    <div class="techmarket-product-rating">
                                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                                        <span style="width:0%">
                                                                                            <strong class="rating">0</strong> out of 5</span>
                                                                        </div>
                                                                        <span class="review-count">(0)</span>
                                                                    </div>
                                                                    <!-- .techmarket-product-rating -->
                                                                </div>
                                                                <!-- .media-body -->
                                                            </div>
                                                            <!-- .media -->
                                                        </a>
                                                        <!-- .woocommerce-LoopProduct-link -->
                                                    </div>
                                                    <!-- .landscape-product -->
                                                    <div class="landscape-product product">
                                                        <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                            <div class="media">
                                                                <img class="wp-post-image" src="assets/images/products/card-3.jpg" alt="">
                                                                <div class="media-body">
                                                                                <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> $3,788.00</span>
                                                                                    </ins>
                                                                                    <del>
                                                                                        <span class="amount">$4,780.00</span>
                                                                                    </del>
                                                                                    <span class="amount"> </span>
                                                                                </span>
                                                                    <!-- .price -->
                                                                    <h2 class="woocommerce-loop-product__title">PowerBank 4400</h2>
                                                                    <div class="techmarket-product-rating">
                                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                                        <span style="width:0%">
                                                                                            <strong class="rating">0</strong> out of 5</span>
                                                                        </div>
                                                                        <span class="review-count">(0)</span>
                                                                    </div>
                                                                    <!-- .techmarket-product-rating -->
                                                                </div>
                                                                <!-- .media-body -->
                                                            </div>
                                                            <!-- .media -->
                                                        </a>
                                                        <!-- .woocommerce-LoopProduct-link -->
                                                    </div>
                                                    <!-- .landscape-product -->
                                                    <div class="landscape-product product">
                                                        <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                            <div class="media">
                                                                <img class="wp-post-image" src="assets/images/products/card-4.jpg" alt="">
                                                                <div class="media-body">
                                                                                <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> $800</span>
                                                                                </span>
                                                                    <!-- .price -->
                                                                    <h2 class="woocommerce-loop-product__title">Snap White Instant Digital Camera in White</h2>
                                                                    <div class="techmarket-product-rating">
                                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                                        <span style="width:0%">
                                                                                            <strong class="rating">0</strong> out of 5</span>
                                                                        </div>
                                                                        <span class="review-count">(0)</span>
                                                                    </div>
                                                                    <!-- .techmarket-product-rating -->
                                                                </div>
                                                                <!-- .media-body -->
                                                            </div>
                                                            <!-- .media -->
                                                        </a>
                                                        <!-- .woocommerce-LoopProduct-link -->
                                                    </div>
                                                    <!-- .landscape-product -->
                                                    <div class="landscape-product product">
                                                        <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                            <div class="media">
                                                                <img class="wp-post-image" src="assets/images/products/card-3.jpg" alt="">
                                                                <div class="media-body">
                                                                                <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> $3,788.00</span>
                                                                                    </ins>
                                                                                    <del>
                                                                                        <span class="amount">$4,780.00</span>
                                                                                    </del>
                                                                                    <span class="amount"> </span>
                                                                                </span>
                                                                    <!-- .price -->
                                                                    <h2 class="woocommerce-loop-product__title">PowerBank 4400</h2>
                                                                    <div class="techmarket-product-rating">
                                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                                        <span style="width:0%">
                                                                                            <strong class="rating">0</strong> out of 5</span>
                                                                        </div>
                                                                        <span class="review-count">(0)</span>
                                                                    </div>
                                                                    <!-- .techmarket-product-rating -->
                                                                </div>
                                                                <!-- .media-body -->
                                                            </div>
                                                            <!-- .media -->
                                                        </a>
                                                        <!-- .woocommerce-LoopProduct-link -->
                                                    </div>
                                                    <!-- .landscape-product -->
                                                    <div class="landscape-product product">
                                                        <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                            <div class="media">
                                                                <img class="wp-post-image" src="assets/images/products/card-2.jpg" alt="">
                                                                <div class="media-body">
                                                                                <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> $500</span>
                                                                                </span>
                                                                    <!-- .price -->
                                                                    <h2 class="woocommerce-loop-product__title">Headset 3D Glasses VR for Android</h2>
                                                                    <div class="techmarket-product-rating">
                                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                                        <span style="width:0%">
                                                                                            <strong class="rating">0</strong> out of 5</span>
                                                                        </div>
                                                                        <span class="review-count">(0)</span>
                                                                    </div>
                                                                    <!-- .techmarket-product-rating -->
                                                                </div>
                                                                <!-- .media-body -->
                                                            </div>
                                                            <!-- .media -->
                                                        </a>
                                                        <!-- .woocommerce-LoopProduct-link -->
                                                    </div>
                                                    <!-- .landscape-product -->
                                                    <div class="landscape-product product">
                                                        <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                            <div class="media">
                                                                <img class="wp-post-image" src="assets/images/products/card-6.jpg" alt="">
                                                                <div class="media-body">
                                                                                <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> $600</span>
                                                                                </span>
                                                                    <!-- .price -->
                                                                    <h2 class="woocommerce-loop-product__title">ZenBook 3 Ultrabook 8GB 512SSD W10</h2>
                                                                    <div class="techmarket-product-rating">
                                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                                        <span style="width:0%">
                                                                                            <strong class="rating">0</strong> out of 5</span>
                                                                        </div>
                                                                        <span class="review-count">(0)</span>
                                                                    </div>
                                                                    <!-- .techmarket-product-rating -->
                                                                </div>
                                                                <!-- .media-body -->
                                                            </div>
                                                            <!-- .media -->
                                                        </a>
                                                        <!-- .woocommerce-LoopProduct-link -->
                                                    </div>
                                                    <!-- .landscape-product -->
                                                </div>
                                            </div>
                                            <!-- .woocommerce -->
                                        </div>
                                        <!-- .container-fluid -->
                                    </div>
                                    <!-- .products-carousel -->
                                </div>
                                <!-- .tab-pane -->
                                <div id="tab-59f89f096ef363" class="tab-pane " role="tabpanel">
                                    <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:900,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1700,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}}]}">
                                        <div class="container-fluid">
                                            <div class="woocommerce">
                                                <div class="products">
                                                    <div class="landscape-product product">
                                                        <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                            <div class="media">
                                                                <img class="wp-post-image" src="assets/images/products/card-1.jpg" alt="">
                                                                <div class="media-body">
                                                                                <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> $3,788.00</span>
                                                                                    </ins>
                                                                                    <del>
                                                                                        <span class="amount">$4,780.00</span>
                                                                                    </del>
                                                                                    <span class="amount"> </span>
                                                                                </span>
                                                                    <!-- .price -->
                                                                    <h2 class="woocommerce-loop-product__title">Unlocked Android 6″ Inch 4.4.2 Dual Core</h2>
                                                                    <div class="techmarket-product-rating">
                                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                                        <span style="width:0%">
                                                                                            <strong class="rating">0</strong> out of 5</span>
                                                                        </div>
                                                                        <span class="review-count">(0)</span>
                                                                    </div>
                                                                    <!-- .techmarket-product-rating -->
                                                                </div>
                                                                <!-- .media-body -->
                                                            </div>
                                                            <!-- .media -->
                                                        </a>
                                                        <!-- .woocommerce-LoopProduct-link -->
                                                    </div>
                                                    <!-- .landscape-product -->
                                                    <div class="landscape-product product">
                                                        <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                            <div class="media">
                                                                <img class="wp-post-image" src="assets/images/products/card-4.jpg" alt="">
                                                                <div class="media-body">
                                                                                <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> $800</span>
                                                                                </span>
                                                                    <!-- .price -->
                                                                    <h2 class="woocommerce-loop-product__title">Snap White Instant Digital Camera in White</h2>
                                                                    <div class="techmarket-product-rating">
                                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                                        <span style="width:0%">
                                                                                            <strong class="rating">0</strong> out of 5</span>
                                                                        </div>
                                                                        <span class="review-count">(0)</span>
                                                                    </div>
                                                                    <!-- .techmarket-product-rating -->
                                                                </div>
                                                                <!-- .media-body -->
                                                            </div>
                                                            <!-- .media -->
                                                        </a>
                                                        <!-- .woocommerce-LoopProduct-link -->
                                                    </div>
                                                    <!-- .landscape-product -->
                                                    <div class="landscape-product product">
                                                        <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                            <div class="media">
                                                                <img class="wp-post-image" src="assets/images/products/card-3.jpg" alt="">
                                                                <div class="media-body">
                                                                                <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> $3,788.00</span>
                                                                                    </ins>
                                                                                    <del>
                                                                                        <span class="amount">$4,780.00</span>
                                                                                    </del>
                                                                                    <span class="amount"> </span>
                                                                                </span>
                                                                    <!-- .price -->
                                                                    <h2 class="woocommerce-loop-product__title">PowerBank 4400</h2>
                                                                    <div class="techmarket-product-rating">
                                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                                        <span style="width:0%">
                                                                                            <strong class="rating">0</strong> out of 5</span>
                                                                        </div>
                                                                        <span class="review-count">(0)</span>
                                                                    </div>
                                                                    <!-- .techmarket-product-rating -->
                                                                </div>
                                                                <!-- .media-body -->
                                                            </div>
                                                            <!-- .media -->
                                                        </a>
                                                        <!-- .woocommerce-LoopProduct-link -->
                                                    </div>
                                                    <!-- .landscape-product -->
                                                    <div class="landscape-product product">
                                                        <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                            <div class="media">
                                                                <img class="wp-post-image" src="assets/images/products/card-4.jpg" alt="">
                                                                <div class="media-body">
                                                                                <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> $800</span>
                                                                                </span>
                                                                    <!-- .price -->
                                                                    <h2 class="woocommerce-loop-product__title">Snap White Instant Digital Camera in White</h2>
                                                                    <div class="techmarket-product-rating">
                                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                                        <span style="width:0%">
                                                                                            <strong class="rating">0</strong> out of 5</span>
                                                                        </div>
                                                                        <span class="review-count">(0)</span>
                                                                    </div>
                                                                    <!-- .techmarket-product-rating -->
                                                                </div>
                                                                <!-- .media-body -->
                                                            </div>
                                                            <!-- .media -->
                                                        </a>
                                                        <!-- .woocommerce-LoopProduct-link -->
                                                    </div>
                                                    <!-- .landscape-product -->
                                                    <div class="landscape-product product">
                                                        <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                            <div class="media">
                                                                <img class="wp-post-image" src="assets/images/products/card-6.jpg" alt="">
                                                                <div class="media-body">
                                                                                <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> $600</span>
                                                                                </span>
                                                                    <!-- .price -->
                                                                    <h2 class="woocommerce-loop-product__title">ZenBook 3 Ultrabook 8GB 512SSD W10</h2>
                                                                    <div class="techmarket-product-rating">
                                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                                        <span style="width:0%">
                                                                                            <strong class="rating">0</strong> out of 5</span>
                                                                        </div>
                                                                        <span class="review-count">(0)</span>
                                                                    </div>
                                                                    <!-- .techmarket-product-rating -->
                                                                </div>
                                                                <!-- .media-body -->
                                                            </div>
                                                            <!-- .media -->
                                                        </a>
                                                        <!-- .woocommerce-LoopProduct-link -->
                                                    </div>
                                                    <!-- .landscape-product -->
                                                    <div class="landscape-product product">
                                                        <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                            <div class="media">
                                                                <img class="wp-post-image" src="assets/images/products/card-5.jpg" alt="">
                                                                <div class="media-body">
                                                                                <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> $3,788.00</span>
                                                                                    </ins>
                                                                                    <del>
                                                                                        <span class="amount">$4,780.00</span>
                                                                                    </del>
                                                                                    <span class="amount"> </span>
                                                                                </span>
                                                                    <!-- .price -->
                                                                    <h2 class="woocommerce-loop-product__title">Smart Watches 3 SWR50</h2>
                                                                    <div class="techmarket-product-rating">
                                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                                        <span style="width:0%">
                                                                                            <strong class="rating">0</strong> out of 5</span>
                                                                        </div>
                                                                        <span class="review-count">(0)</span>
                                                                    </div>
                                                                    <!-- .techmarket-product-rating -->
                                                                </div>
                                                                <!-- .media-body -->
                                                            </div>
                                                            <!-- .media -->
                                                        </a>
                                                        <!-- .woocommerce-LoopProduct-link -->
                                                    </div>
                                                    <!-- .landscape-product -->
                                                    <div class="landscape-product product">
                                                        <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                            <div class="media">
                                                                <img class="wp-post-image" src="assets/images/products/card-3.jpg" alt="">
                                                                <div class="media-body">
                                                                                <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> $3,788.00</span>
                                                                                    </ins>
                                                                                    <del>
                                                                                        <span class="amount">$4,780.00</span>
                                                                                    </del>
                                                                                    <span class="amount"> </span>
                                                                                </span>
                                                                    <!-- .price -->
                                                                    <h2 class="woocommerce-loop-product__title">PowerBank 4400</h2>
                                                                    <div class="techmarket-product-rating">
                                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                                        <span style="width:0%">
                                                                                            <strong class="rating">0</strong> out of 5</span>
                                                                        </div>
                                                                        <span class="review-count">(0)</span>
                                                                    </div>
                                                                    <!-- .techmarket-product-rating -->
                                                                </div>
                                                                <!-- .media-body -->
                                                            </div>
                                                            <!-- .media -->
                                                        </a>
                                                        <!-- .woocommerce-LoopProduct-link -->
                                                    </div>
                                                    <!-- .landscape-product -->
                                                    <div class="landscape-product product">
                                                        <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                            <div class="media">
                                                                <img class="wp-post-image" src="assets/images/products/card-2.jpg" alt="">
                                                                <div class="media-body">
                                                                                <span class="price">
                                                                                    <ins>
                                                                                        <span class="amount"> </span>
                                                                                    </ins>
                                                                                    <span class="amount"> $500</span>
                                                                                </span>
                                                                    <!-- .price -->
                                                                    <h2 class="woocommerce-loop-product__title">Headset 3D Glasses VR for Android</h2>
                                                                    <div class="techmarket-product-rating">
                                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                                        <span style="width:0%">
                                                                                            <strong class="rating">0</strong> out of 5</span>
                                                                        </div>
                                                                        <span class="review-count">(0)</span>
                                                                    </div>
                                                                    <!-- .techmarket-product-rating -->
                                                                </div>
                                                                <!-- .media-body -->
                                                            </div>
                                                            <!-- .media -->
                                                        </a>
                                                        <!-- .woocommerce-LoopProduct-link -->
                                                    </div>
                                                    <!-- .landscape-product -->
                                                </div>
                                            </div>
                                            <!-- .woocommerce -->
                                        </div>
                                        <!-- .container-fluid -->
                                    </div>
                                    <!-- .products-carousel -->
                                </div>
                                <!-- .tab-pane -->
                            </div>
                            <!-- .tab-content -->
                        </div>
                        <!-- .section-products-carousel-tabs-wrap -->
                    </section>
                    <!-- .section-landscape-products-carousel-tab -->
                </main>
                <!-- #main -->
            </div>
            <!-- #primary -->
            <div id="secondary" class="widget-area" role="complementary">
                <div class="widget widget_techmarket_banner_widget">
                    <div class="banner">
                        <a href="shop.html">
                            <div style="background-size: cover; background-position: center center; background-image: url( assets/images/banner/side-1.png ); height: 207px;" class="banner-bg">
                                <div class="caption">
                                    <div class="banner-info">
                                        <h3 class="title">
                                            <strong>1000 mAh</strong>
                                            <br>
                                            <span>Power Bank Pro</span>
                                        </h3>
                                    </div>
                                    <!-- .banner-info -->
                                    <span class="price">$ 34.99</span>
                                    <span class="banner-action button">Buy Now</span>
                                </div>
                                <!-- .caption -->
                            </div>
                            <!-- .banner-bg -->
                        </a>
                    </div>
                    <!-- .banner -->
                </div>
                <!-- .widget_techmarket_banner_widget -->
                <div class="widget widget_techmarket_banner_widget">
                    <div class="banner">
                        <a href="shop.html">
                            <div style="background-size: cover; background-position: center center; background-image: url( assets/images/banner/side-2.png ); height: 207px;" class="banner-bg">
                                <div class="caption">
                                    <div class="banner-info">
                                        <h3 class="title">New Arrivals
                                            <br> in
                                            <strong> Accesories</strong>
                                            <br> at Best prices</h3>
                                    </div>
                                    <!-- .banner-info -->
                                    <span class="banner-action button">View all</span>
                                </div>
                                <!-- .caption -->
                            </div>
                            <!-- .banner-bg -->
                        </a>
                    </div>
                    <!-- .banner -->
                </div>
                <!-- .widget_techmarket_banner_widget -->
                <div class="widget widget_techmarket_banner_widget">
                    <div class="banner">
                        <a href="shop.html">
                            <div style="background-size: cover; background-position: center center; background-image: url( assets/images/banner/side-3.png ); height: 207px;" class="banner-bg">
                                <div class="caption">
                                    <div class="banner-info">
                                        <h3 class="title">Catch Best
                                            <br>
                                            <strong>Deals</strong> on
                                            <br>the Curved
                                            <br>Soundbars</h3>
                                    </div>
                                    <!-- .banner-info -->
                                    <span class="banner-action button">Browse</span>
                                </div>
                                <!-- .caption -->
                            </div>
                            <!-- .banner-bg -->
                        </a>
                    </div>
                    <!-- .banner -->
                </div>
                <!-- .widget_techmarket_banner_widget -->
                <div class="widget widget_techmarket_features_widget">
                    <div class="features-list">
                        <div class="features">
                            <div class="feature">
                                <div class="media">
                                    <i class="feature-icon d-flex mr-3 tm tm-free-delivery"></i>
                                    <div class="media-body feature-text">
                                        <strong>Free Delivery</strong>from $50</div>
                                </div>
                                <!-- .media -->
                            </div>
                            <!-- .feature -->
                            <div class="feature">
                                <div class="media">
                                    <i class="feature-icon d-flex mr-3 tm tm-feedback"></i>
                                    <div class="media-body feature-text">
                                        <strong>99 % Customer</strong>Feedbacks</div>
                                </div>
                                <!-- .media -->
                            </div>
                            <!-- .feature -->
                            <div class="feature">
                                <div class="media">
                                    <i class="feature-icon d-flex mr-3 tm tm-free-return"></i>
                                    <div class="media-body feature-text">
                                        <strong>365 Days </strong>for free return</div>
                                </div>
                                <!-- .media -->
                            </div>
                            <!-- .feature -->
                            <div class="feature">
                                <div class="media">
                                    <i class="feature-icon d-flex mr-3 tm tm-safe-payments"></i>
                                    <div class="media-body feature-text">
                                        <strong>Payment</strong>Secure System</div>
                                </div>
                                <!-- .media -->
                            </div>
                            <!-- .feature -->
                            <div class="feature">
                                <div class="media">
                                    <i class="feature-icon d-flex mr-3 tm tm-best-brands"></i>
                                    <div class="media-body feature-text">
                                        <strong>Only Best</strong>Brands</div>
                                </div>
                                <!-- .media -->
                            </div>
                            <!-- .feature -->
                        </div>
                        <!-- .features -->
                    </div>
                    <!-- .features-list -->
                </div>
                <!-- .widget_techmarket_features_widget -->
                <div class="widget techmarket_posts_carousel_widget">
                    <section class="section-posts-carousel" id="sidebar-posts-carousel">
                        <header class="section-header">
                            <h2 class="section-title">Recent Posts</h2>
                            <div class="custom-slick-nav"></div>
                            <!-- .custom-slick-nav -->
                        </header>
                        <!-- .post-items -->
                        <div class="post-item-carousel" data-ride="tm-slick-carousel" data-wrap=".posts" data-slick="{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#sidebar-posts-carousel .custom-slick-nav&quot;}">
                            <div class="posts">
                                <div class="post-item">
                                    <a href="blog-single.html" class="post-thumbnail">
                                        <div class="post-thumbnail">
                                            <img width="270" height="270" alt="" class="attachment-techmarket-blog-carousel wp-post-image" src="assets/images/blog/sm-4.jpg">
                                        </div>
                                    </a>
                                    <!-- .post-thumbnail -->
                                    <div class="post-content">
                                        <a href="blog-single.html" class="post-name" tabindex="-1">Why you should choose dedicated Desktop PC Computer</a>
                                        <span class="comments-link">
                                                        <a href="blog-single.html">Leave a comment</a>
                                                    </span>
                                    </div>
                                    <!-- .post-content -->
                                </div>
                                <!-- .post-items -->
                                <div class="post-item">
                                    <a href="blog-single.html" class="post-thumbnail">
                                        <div class="post-thumbnail">
                                            <img width="270" height="270" alt="" class="attachment-techmarket-blog-carousel wp-post-image" src="assets/images/blog/sm-1.jpg">
                                        </div>
                                    </a>
                                    <!-- .post-thumbnail -->
                                    <div class="post-content">
                                        <a href="blog-single.html" class="post-name" tabindex="-1">Tech Terms you should know before your adventure</a>
                                        <span class="comments-link">
                                                        <a href="blog-single.html">Leave a comment</a>
                                                    </span>
                                    </div>
                                    <!-- .post-content -->
                                </div>
                                <!-- .post-items -->
                                <div class="post-item">
                                    <a href="blog-single.html" class="post-thumbnail">
                                        <div class="post-thumbnail">
                                            <img width="270" height="270" alt="" class="attachment-techmarket-blog-carousel wp-post-image" src="assets/images/blog/sm-2.jpg">
                                        </div>
                                    </a>
                                    <!-- .post-thumbnail -->
                                    <div class="post-content">
                                        <a href="blog-single.html" class="post-name" tabindex="-1">How to build your first 4k ready Desktop PC</a>
                                        <span class="comments-link">
                                                        <a href="blog-single.html">Leave a comment</a>
                                                    </span>
                                    </div>
                                    <!-- .post-content -->
                                </div>
                                <!-- .post-items -->
                                <div class="post-item">
                                    <a href="blog-single.html" class="post-thumbnail">
                                        <div class="post-thumbnail">
                                            <img width="270" height="270" alt="" class="attachment-techmarket-blog-carousel wp-post-image" src="assets/images/blog/sm-3.jpg">
                                        </div>
                                    </a>
                                    <!-- .post-thumbnail -->
                                    <div class="post-content">
                                        <a href="blog-single.html" class="post-name" tabindex="-1">Top 10 Best Graphical Games for testing your Hardware</a>
                                        <span class="comments-link">
                                                        <a href="blog-single.html">Leave a comment</a>
                                                    </span>
                                    </div>
                                    <!-- .post-content -->
                                </div>
                                <!-- .post-items -->
                            </div>
                            <!-- .posts-->
                        </div>
                        <!-- .post-item-carousel -->
                    </section>
                    <!-- .section-posts-carousel -->
                </div>
                <!-- .techmarket_posts_carousel_widget -->
                <div class="widget widget_techmarket_products_carousel_widget">
                    <section id="sidebar-products-carousel" class="sidebar-carousel">
                        <header class="section-header">
                            <h2 class="section-title">Latest Products</h2>
                            <div class="custom-slick-nav"></div>
                            <!-- .custom-slick-nav -->
                        </header>
                        <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#sidebar-products-carousel .custom-slick-nav&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:750,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}}]}">
                            <div class="container-fluid">
                                <div class="woocommerce columns-1">
                                    <div class="products">
                                        <div class="product">
                                            <div class="yith-wcwl-add-to-wishlist">
                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                            </div>
                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                <img src="assets/images/products/11.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                <!-- /.price -->
                                                <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                            </a>
                                            <div class="hover-area">
                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                            </div>
                                        </div>
                                        <!-- /.product-outer -->
                                        <div class="product">
                                            <div class="yith-wcwl-add-to-wishlist">
                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                            </div>
                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <span class="onsale">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                            </span>
                                                <img src="assets/images/products/14.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                <span class="price">
                                                                <ins>
                                                                    <span class="amount"> 262.81</span>
                                                                </ins>
                                                                <del>
                                                                    <span class="amount">399.00</span>
                                                                </del>
                                                                <span class="amount"> </span>
                                                            </span>
                                                <!-- /.price -->
                                                <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                            </a>
                                            <div class="hover-area">
                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                            </div>
                                        </div>
                                        <!-- /.product-outer -->
                                        <div class="product">
                                            <div class="yith-wcwl-add-to-wishlist">
                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                            </div>
                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                <img src="assets/images/products/4.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                <!-- /.price -->
                                                <h2 class="woocommerce-loop-product__title">4K Action Cam with Wi-Fi & GPS</h2>
                                            </a>
                                            <div class="hover-area">
                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                            </div>
                                        </div>
                                        <!-- /.product-outer -->
                                        <div class="product">
                                            <div class="yith-wcwl-add-to-wishlist">
                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                            </div>
                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                <img src="assets/images/products/5.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                <!-- /.price -->
                                                <h2 class="woocommerce-loop-product__title">XONE Wireless Controller</h2>
                                            </a>
                                            <div class="hover-area">
                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                            </div>
                                        </div>
                                        <!-- /.product-outer -->
                                        <div class="product">
                                            <div class="yith-wcwl-add-to-wishlist">
                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                            </div>
                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                <img src="assets/images/products/3.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                <!-- /.price -->
                                                <h2 class="woocommerce-loop-product__title">On-ear Wireless NXTG</h2>
                                            </a>
                                            <div class="hover-area">
                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                            </div>
                                        </div>
                                        <!-- /.product-outer -->
                                        <div class="product">
                                            <div class="yith-wcwl-add-to-wishlist">
                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                            </div>
                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                <img src="assets/images/products/16.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 262.81</span>
                                                            </span>
                                                <!-- /.price -->
                                                <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                            </a>
                                            <div class="hover-area">
                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                            </div>
                                        </div>
                                        <!-- /.product-outer -->
                                        <div class="product">
                                            <div class="yith-wcwl-add-to-wishlist">
                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                            </div>
                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                <img src="assets/images/products/12.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                <!-- /.price -->
                                                <h2 class="woocommerce-loop-product__title">Bbd 23-Inch Screen LED-Lit Monitorss Buds</h2>
                                            </a>
                                            <div class="hover-area">
                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                            </div>
                                        </div>
                                        <!-- /.product-outer -->
                                        <div class="product">
                                            <div class="yith-wcwl-add-to-wishlist">
                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                            </div>
                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                <img src="assets/images/products/8.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                <!-- /.price -->
                                                <h2 class="woocommerce-loop-product__title">Video & Air Quality Monitor</h2>
                                            </a>
                                            <div class="hover-area">
                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                            </div>
                                        </div>
                                        <!-- /.product-outer -->
                                        <div class="product">
                                            <div class="yith-wcwl-add-to-wishlist">
                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                            </div>
                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                <img src="assets/images/products/13.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                <!-- /.price -->
                                                <h2 class="woocommerce-loop-product__title">Drone WIFI FPV With 4K</h2>
                                            </a>
                                            <div class="hover-area">
                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                            </div>
                                        </div>
                                        <!-- /.product-outer -->
                                        <div class="product">
                                            <div class="yith-wcwl-add-to-wishlist">
                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                            </div>
                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                <img src="assets/images/products/10.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                <!-- /.price -->
                                                <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                            </a>
                                            <div class="hover-area">
                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                            </div>
                                        </div>
                                        <!-- /.product-outer -->
                                        <div class="product">
                                            <div class="yith-wcwl-add-to-wishlist">
                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                            </div>
                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                <img src="assets/images/products/15.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 399.00</span>
                                                            </span>
                                                <!-- /.price -->
                                                <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                            </a>
                                            <div class="hover-area">
                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                            </div>
                                        </div>
                                        <!-- /.product-outer -->
                                        <div class="product">
                                            <div class="yith-wcwl-add-to-wishlist">
                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                            </div>
                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <span class="onsale">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                            </span>
                                                <img src="assets/images/products/7.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                <span class="price">
                                                                <ins>
                                                                    <span class="amount"> 789.95</span>
                                                                </ins>
                                                                <del>
                                                                    <span class="amount">999.00</span>
                                                                </del>
                                                                <span class="amount"> </span>
                                                            </span>
                                                <!-- /.price -->
                                                <h2 class="woocommerce-loop-product__title">Bluetooth on-ear PureBass Headphones</h2>
                                            </a>
                                            <div class="hover-area">
                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                            </div>
                                        </div>
                                        <!-- /.product-outer -->
                                        <div class="product">
                                            <div class="yith-wcwl-add-to-wishlist">
                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                            </div>
                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <span class="onsale">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                            </span>
                                                <img src="assets/images/products/2.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                <span class="price">
                                                                <ins>
                                                                    <span class="amount"> 309.95</span>
                                                                </ins>
                                                                <del>
                                                                    <span class="amount">459.00</span>
                                                                </del>
                                                                <span class="amount"> </span>
                                                            </span>
                                                <!-- /.price -->
                                                <h2 class="woocommerce-loop-product__title">ZenBook 3 Ultrabook 8GB 512SSD W10</h2>
                                            </a>
                                            <div class="hover-area">
                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                            </div>
                                        </div>
                                        <!-- /.product-outer -->
                                        <div class="product">
                                            <div class="yith-wcwl-add-to-wishlist">
                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                            </div>
                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                <img src="assets/images/products/9.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                <!-- /.price -->
                                                <h2 class="woocommerce-loop-product__title">Watch Stainless with Grey Suture Leather Strap</h2>
                                            </a>
                                            <div class="hover-area">
                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                            </div>
                                        </div>
                                        <!-- /.product-outer -->
                                        <div class="product">
                                            <div class="yith-wcwl-add-to-wishlist">
                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                            </div>
                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                <img src="assets/images/products/6.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                <!-- /.price -->
                                                <h2 class="woocommerce-loop-product__title">Gear Virtual Reality 3D with Bluetooth Glasses</h2>
                                            </a>
                                            <div class="hover-area">
                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                            </div>
                                        </div>
                                        <!-- /.product-outer -->
                                        <div class="product">
                                            <div class="yith-wcwl-add-to-wishlist">
                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                            </div>
                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                <img src="assets/images/products/1.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                <!-- /.price -->
                                                <h2 class="woocommerce-loop-product__title">Smart Watches 3 SWR50</h2>
                                            </a>
                                            <div class="hover-area">
                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                            </div>
                                        </div>
                                        <!-- /.product-outer -->
                                    </div>
                                </div>
                                <!-- .woocommerce -->
                            </div>
                            <!-- .container-fluid -->
                        </div>
                        <!-- .slick-dots -->
                    </section>
                </div>
                <div class="widget widget_techmarket_poster_widget" id="techmarket_poster_widget-2">
                    <div class="poster">
                        <a href="shop.html">
                            <div style="background-size: cover; background-position: center center; background-image: url( assets/images/banner/poster.jpg ); height: 703px;" class="poster-bg">
                                <div class="caption">
                                    <div class="poster-info">
                                        <h3 class="title">
                                            <strong>Listen in</strong> Brilliant
                                            <br> Color via</h3>
                                        <span class="price">
                                                        <span>starting at</span>
                                                        <br>$ 34.99</span>
                                    </div>
                                    <!-- .poster-info -->
                                    <div class="poster-caption">
                                        <span class="poster-action button">Start Buying</span>
                                        <span class="condition">*limited time
                                                        <br>offer</span>
                                    </div>
                                    <!-- .poster-caption -->
                                </div>
                                <!-- .caption -->
                            </div>
                            <!-- .banner-bg -->
                        </a>
                    </div>
                    <!-- .poster -->
                </div>
                <!-- .widget_techmarket_poster_widget -->
                <div class="widget widget_techmarket_products_carousel_widget">
                    <section id="single-sidebar-carousel" class="section-products-carousel">
                        <header class="section-header">
                            <h2 class="section-title">Latest Products</h2>
                            <nav class="custom-slick-nav"></nav>
                        </header>
                        <!-- .section-header -->
                        <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;rows&quot;:4,&quot;slidesPerRow&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:false,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#single-sidebar-carousel .custom-slick-nav&quot;}">
                            <div class="container-fluid">
                                <div class="woocommerce columns-1">
                                    <div class="products">
                                        <div class="landscape-product-widget product">
                                            <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                <div class="media">
                                                    <img class="wp-post-image" src="assets/images/products/sm-1.jpg" alt="">
                                                    <div class="media-body">
                                                                    <span class="price">
                                                                        <ins>
                                                                            <span class="amount"> 50.99</span>
                                                                        </ins>
                                                                        <del>
                                                                            <span class="amount">26.99</span>
                                                                        </del>
                                                                    </span>
                                                        <!-- .price -->
                                                        <h2 class="woocommerce-loop-product__title">S100 Wireless Bluetooth Speaker – Neon Green</h2>
                                                        <div class="techmarket-product-rating">
                                                            <div title="Rated 0 out of 5" class="star-rating">
                                                                            <span style="width:0%">
                                                                                <strong class="rating">0</strong> out of 5</span>
                                                            </div>
                                                            <span class="review-count">(0)</span>
                                                        </div>
                                                        <!-- .techmarket-product-rating -->
                                                    </div>
                                                    <!-- .media-body -->
                                                </div>
                                                <!-- .media -->
                                            </a>
                                            <!-- .woocommerce-LoopProduct-link -->
                                        </div>
                                        <div class="landscape-product-widget product">
                                            <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                <div class="media">
                                                    <img class="wp-post-image" src="assets/images/products/sm-2.jpg" alt="">
                                                    <div class="media-body">
                                                                    <span class="price">
                                                                        <ins>
                                                                            <span class="amount"> 50.99</span>
                                                                        </ins>
                                                                        <del>
                                                                            <span class="amount">26.99</span>
                                                                        </del>
                                                                    </span>
                                                        <!-- .price -->
                                                        <h2 class="woocommerce-loop-product__title">S100 Wireless Bluetooth Speaker – Neon Green</h2>
                                                        <div class="techmarket-product-rating">
                                                            <div title="Rated 0 out of 5" class="star-rating">
                                                                            <span style="width:0%">
                                                                                <strong class="rating">0</strong> out of 5</span>
                                                            </div>
                                                            <span class="review-count">(0)</span>
                                                        </div>
                                                        <!-- .techmarket-product-rating -->
                                                    </div>
                                                    <!-- .media-body -->
                                                </div>
                                                <!-- .media -->
                                            </a>
                                            <!-- .woocommerce-LoopProduct-link -->
                                        </div>
                                        <div class="landscape-product-widget product">
                                            <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                <div class="media">
                                                    <img class="wp-post-image" src="assets/images/products/sm-3.jpg" alt="">
                                                    <div class="media-body">
                                                                    <span class="price">
                                                                        <ins>
                                                                            <span class="amount"> 50.99</span>
                                                                        </ins>
                                                                        <del>
                                                                            <span class="amount">26.99</span>
                                                                        </del>
                                                                    </span>
                                                        <!-- .price -->
                                                        <h2 class="woocommerce-loop-product__title">S100 Wireless Bluetooth Speaker – Neon Green</h2>
                                                        <div class="techmarket-product-rating">
                                                            <div title="Rated 0 out of 5" class="star-rating">
                                                                            <span style="width:0%">
                                                                                <strong class="rating">0</strong> out of 5</span>
                                                            </div>
                                                            <span class="review-count">(0)</span>
                                                        </div>
                                                        <!-- .techmarket-product-rating -->
                                                    </div>
                                                    <!-- .media-body -->
                                                </div>
                                                <!-- .media -->
                                            </a>
                                            <!-- .woocommerce-LoopProduct-link -->
                                        </div>
                                        <div class="landscape-product-widget product">
                                            <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                <div class="media">
                                                    <img class="wp-post-image" src="assets/images/products/sm-4.jpg" alt="">
                                                    <div class="media-body">
                                                                    <span class="price">
                                                                        <ins>
                                                                            <span class="amount"> 50.99</span>
                                                                        </ins>
                                                                        <del>
                                                                            <span class="amount">26.99</span>
                                                                        </del>
                                                                    </span>
                                                        <!-- .price -->
                                                        <h2 class="woocommerce-loop-product__title">S100 Wireless Bluetooth Speaker – Neon Green</h2>
                                                        <div class="techmarket-product-rating">
                                                            <div title="Rated 0 out of 5" class="star-rating">
                                                                            <span style="width:0%">
                                                                                <strong class="rating">0</strong> out of 5</span>
                                                            </div>
                                                            <span class="review-count">(0)</span>
                                                        </div>
                                                        <!-- .techmarket-product-rating -->
                                                    </div>
                                                    <!-- .media-body -->
                                                </div>
                                                <!-- .media -->
                                            </a>
                                            <!-- .woocommerce-LoopProduct-link -->
                                        </div>
                                    </div>
                                    <!-- .products -->
                                </div>
                                <!-- .woocommerce -->
                            </div>
                            <!-- .container-fluid -->
                        </div>
                        <!-- .products-carousel -->
                    </section>
                    <!-- .section-products-carousel -->
                </div>
                <!-- .widget_techmarket_products_carousel_widget -->
            </div>
            <!-- #secondary -->
            <section class="brands-carousel">
                <h2 class="sr-only">Brands Carousel</h2>
                <div class="col-full" data-ride="tm-slick-carousel" data-wrap=".brands" data-slick="{&quot;slidesToShow&quot;:6,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;responsive&quot;:[{&quot;breakpoint&quot;:400,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1}},{&quot;breakpoint&quot;:800,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:992,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:5}}]}">
                    <div class="brands">
                        <div class="item">
                            <a href="shop.html">
                                <figure>
                                    <figcaption class="text-overlay">
                                        <div class="info">
                                            <h4>apple</h4>
                                        </div>
                                        <!-- /.info -->
                                    </figcaption>
                                    <img width="145" height="50" class="img-responsive desaturate" alt="apple" src="assets/images/brands/1.png">
                                </figure>
                            </a>
                        </div>
                        <!-- .item -->
                        <div class="item">
                            <a href="shop.html">
                                <figure>
                                    <figcaption class="text-overlay">
                                        <div class="info">
                                            <h4>bosch</h4>
                                        </div>
                                        <!-- /.info -->
                                    </figcaption>
                                    <img width="145" height="50" class="img-responsive desaturate" alt="bosch" src="assets/images/brands/2.png">
                                </figure>
                            </a>
                        </div>
                        <!-- .item -->
                        <div class="item">
                            <a href="shop.html">
                                <figure>
                                    <figcaption class="text-overlay">
                                        <div class="info">
                                            <h4>cannon</h4>
                                        </div>
                                        <!-- /.info -->
                                    </figcaption>
                                    <img width="145" height="50" class="img-responsive desaturate" alt="cannon" src="assets/images/brands/3.png">
                                </figure>
                            </a>
                        </div>
                        <!-- .item -->
                        <div class="item">
                            <a href="shop.html">
                                <figure>
                                    <figcaption class="text-overlay">
                                        <div class="info">
                                            <h4>connect</h4>
                                        </div>
                                        <!-- /.info -->
                                    </figcaption>
                                    <img width="145" height="50" class="img-responsive desaturate" alt="connect" src="assets/images/brands/4.png">
                                </figure>
                            </a>
                        </div>
                        <!-- .item -->
                        <div class="item">
                            <a href="shop.html">
                                <figure>
                                    <figcaption class="text-overlay">
                                        <div class="info">
                                            <h4>galaxy</h4>
                                        </div>
                                        <!-- /.info -->
                                    </figcaption>
                                    <img width="145" height="50" class="img-responsive desaturate" alt="galaxy" src="assets/images/brands/5.png">
                                </figure>
                            </a>
                        </div>
                        <!-- .item -->
                        <div class="item">
                            <a href="shop.html">
                                <figure>
                                    <figcaption class="text-overlay">
                                        <div class="info">
                                            <h4>gopro</h4>
                                        </div>
                                        <!-- /.info -->
                                    </figcaption>
                                    <img width="145" height="50" class="img-responsive desaturate" alt="gopro" src="assets/images/brands/6.png">
                                </figure>
                            </a>
                        </div>
                        <!-- .item -->
                        <div class="item">
                            <a href="shop.html">
                                <figure>
                                    <figcaption class="text-overlay">
                                        <div class="info">
                                            <h4>handspot</h4>
                                        </div>
                                        <!-- /.info -->
                                    </figcaption>
                                    <img width="145" height="50" class="img-responsive desaturate" alt="handspot" src="assets/images/brands/7.png">
                                </figure>
                            </a>
                        </div>
                        <!-- .item -->
                        <div class="item">
                            <a href="shop.html">
                                <figure>
                                    <figcaption class="text-overlay">
                                        <div class="info">
                                            <h4>kinova</h4>
                                        </div>
                                        <!-- /.info -->
                                    </figcaption>
                                    <img width="145" height="50" class="img-responsive desaturate" alt="kinova" src="assets/images/brands/8.png">
                                </figure>
                            </a>
                        </div>
                        <!-- .item -->
                        <div class="item">
                            <a href="shop.html">
                                <figure>
                                    <figcaption class="text-overlay">
                                        <div class="info">
                                            <h4>nespresso</h4>
                                        </div>
                                        <!-- /.info -->
                                    </figcaption>
                                    <img width="145" height="50" class="img-responsive desaturate" alt="nespresso" src="assets/images/brands/9.png">
                                </figure>
                            </a>
                        </div>
                        <!-- .item -->
                        <div class="item">
                            <a href="shop.html">
                                <figure>
                                    <figcaption class="text-overlay">
                                        <div class="info">
                                            <h4>samsung</h4>
                                        </div>
                                        <!-- /.info -->
                                    </figcaption>
                                    <img width="145" height="50" class="img-responsive desaturate" alt="samsung" src="assets/images/brands/10.png">
                                </figure>
                            </a>
                        </div>
                        <!-- .item -->
                        <div class="item">
                            <a href="shop.html">
                                <figure>
                                    <figcaption class="text-overlay">
                                        <div class="info">
                                            <h4>speedway</h4>
                                        </div>
                                        <!-- /.info -->
                                    </figcaption>
                                    <img width="145" height="50" class="img-responsive desaturate" alt="speedway" src="assets/images/brands/11.png">
                                </figure>
                            </a>
                        </div>
                        <!-- .item -->
                        <div class="item">
                            <a href="shop.html">
                                <figure>
                                    <figcaption class="text-overlay">
                                        <div class="info">
                                            <h4>yoko</h4>
                                        </div>
                                        <!-- /.info -->
                                    </figcaption>
                                    <img width="145" height="50" class="img-responsive desaturate" alt="yoko" src="assets/images/brands/12.png">
                                </figure>
                            </a>
                        </div>
                        <!-- .item -->
                    </div>
                </div>
                <!-- .col-full -->
            </section>
            <!-- .brands-carousel -->
        </div>
        <!-- .row -->
    </div>
    <!-- .col-full -->
@endsection
