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
                                @foreach($recommend_products as $product)
                                    <div class="slider-1">
                                        <img src="{{ asset($product->path) }}" alt="">
                                        <div class="caption caption-slide">
                                            <div class="title">{{ $product->name }}</div>
                                            <div class="offer-price">{{ number_format($product->price,2) }}</div>
                                            <div class="button">
                                                <a href="{{ route('product.show',['id' => $product->id]) }}">ดูตอนนี้ <i class="tm tm-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
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
                            <h2 class="section-title">หมวดหมู่</h2>
                            <nav class="custom-slick-nav"></nav>
                            <!-- .custom-slick-nav -->
                        </header>
                        <!-- .section-header -->
                        <div class="product-categories product-categories-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:6,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#categories-carousel-3 .custom-slick-nav&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:750,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}}]}">
                            <div class="woocommerce columns-6">
                                <div class="products">
                                    @foreach($catalogs as $catalog)
                                        <div class="product-category product">
                                            <a href="{{ route('product.index',['catalog' => $catalog->id]) }}">
                                                <img width="224" height="197" alt="Fashion" src="{{ asset($catalog->photo) }}">
                                                <h2 class="woocommerce-loop-category__title">{{ $catalog->name }}</h2>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- .products-->
                            </div>
                            <!-- .woocommerce-->
                        </div>
                        <!-- .product-categories -->
                    </section>
                    <!-- .section-top-categories -->
                    <section id="section-products-carousel-6" class="section-landscape-products-carousel section-landscape-products-carousel-with-thumbnails">
                        <header class="section-header">
                            <h2 class="section-title">สินค้าแนะนำ</h2>
                            <nav class="custom-slick-nav"></nav>
                            <!-- .custom-slick-nav -->
                        </header>
                        <!-- .section-header -->
                        <div class="products-carousel landscape-featured-product" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2,&quot;dots&quot;:true,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#section-products-carousel-6 .custom-slick-nav&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1590,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1}}]}">
                            <div class="container-fluid">
                                <div class="woocommerce columns-2">
                                    <div class="products">
                                        @foreach($recommend_products as $product)
                                            <div class="landscape-product-card-featured product" style="width: 733px;">
                                                <div class="media">
                                                    <div id="techmarket-product-gallery-59f89f096bfe51" class="techmarket-product-gallery techmarket-product-gallery--with-images techmarket-product-gallery--columns-4 images" data-columns="4">
                                                        <figure class="techmarket-wc-product-gallery__wrapper" data-ride="tm-slick-carousel" data-wrap=".techmarket-wc-product-gallery__wrapper" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:false,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;asNavFor&quot;:&quot;#techmarket-product-gallery-59f89f096bfe51 .techmarket-wc-product-gallery-thumbnails__wrapper&quot;}">
                                                            <figure class="techmarket-wc-product-gallery__image">
                                                                <img width="600" height="600" src="{{ asset($product->path) }}" alt="gallery-image">
                                                            </figure>
                                                        </figure>
                                                    </div>
                                                    <!-- /.techmarket-product-gallery -->
                                                    <div class="media-body">
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                    <span class="price">
                                                                        <ins>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                {{ number_format($product->price,2) }} บาท</span>
                                                                        </ins>
                                                                    </span>
                                                            <h2 class="woocommerce-loop-product__title">{{ $product->name }}</h2>
                                                        </a>
                                                        <a rel="nofollow" href="{{ route('product.show',['id' => $product->id]) }}" class="button product_type_simple">ดูสินค้า</a>
                                                    </div>
                                                    <!-- /.media-body -->
                                                </div>
                                                <!-- /.media -->
                                            </div>
                                            <!-- /.landscape-product-card-featured -->
                                        @endforeach
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
                            <h2 class="section-title">{{ $cat_ran->name }}</h2>
                            <nav class="custom-slick-nav"></nav>
                            <!-- .custom-slick-nav -->
                        </header>
                        <!-- .section-header -->
                        <div class="products-carousel 6-column-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:6,&quot;slidesToScroll&quot;:6,&quot;dots&quot;:true,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#homev6-carousel-3 .custom-slick-nav&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:750,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}},{&quot;breakpoint&quot;:1700,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:5}}]}">
                            <div class="container-fluid">
                                <div class="woocommerce columns-6">
                                    <div class="products">
                                        @foreach($product_cat as $cat)
                                            <div class="product">
                                                <a href="{{ route('product.show',['id' => $cat->pid]) }}" class="woocommerce-LoopProduct-link">
                                                    <img src="{{ asset($cat->path) }}" width="224" height="197" class="wp-post-image" alt="">
                                                    <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> {{ number_format($cat->price,2) }}</span>
                                                            </span>
                                                    <!-- /.price -->
                                                    <h2 class="woocommerce-loop-product__title">{{ $cat->name }}</h2>
                                                </a>
                                                <div class="hover-area">
                                                    <a class="button add_to_cart_button" href="{{ route('product.show',['id' => $cat->pid]) }}" rel="nofollow">ดูรายละเอียด</a>
                                                </div>
                                            </div>
                                            <!-- /.product-outer -->
                                        @endforeach
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
                                            <strong>ซื้อสินค้ากับเราวันนี้</strong>ฟรี !!
                                            <br> ประกันแผง 10 ปี</h3>
                                        <h4 class="subtitle">จะรอช้าอยู่ทำไม รีบไปหาสินค้าที่คุณถูกใจสิ</h4>
                                    </div>
                                    <a href="{{ route('product.index') }}">
                                        <span class="banner-action button">ดูสินค้า
                                                    <i class="feature-icon d-flex ml-4 tm tm-long-arrow-right"></i>
                                                </span>
                                    </a>
                                </div>
                                <!-- /.caption -->
                            </div>
                            <!-- /.banner-b -->
                        </a>
                        <!-- /.section-header -->
                    </div>
                    <!-- /.banner -->
                    <section class="type-2 section-products-carousel-tabs section-product-carousel-with-featured-product carousel-with-featured-3">
                        <header class="section-header">
                            <h2 class="section-title">สินค้าแนะนำตามหมวดหมู่</h2>
                            <ul role="tablist" class="nav justify-content-center">
                                @foreach($product_by_cat as $index=>$product)
                                    <li class="nav-item"><a class="nav-link {{ $index == 0 ? 'active':'' }}" href="#{{ $product['catalog'] }}" data-toggle="tab">{{ $product['catalog'] }}</a></li>
                                @endforeach
                            </ul>
                        </header>
                        <div class="tab-content">
                            @foreach($product_by_cat as $index=>$product)
                                <div role="tabpanel" id="{{ $product['catalog'] }}" class="tab-pane {{ $index == 0 ? 'active':'' }}">
                                    <div class="tab-product-carousel-with-featured-product">
                                        <div class="tab-carousel-products">
                                            <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;rows&quot;:2,&quot;slidesPerRow&quot;:5,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesPerRow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesPerRow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1700,&quot;settings&quot;:{&quot;slidesPerRow&quot;:4,&quot;slidesToScroll&quot;:4}}]}">
                                                <div class="container-fluid">
                                                    <div class="woocommerce columns-5">
                                                        <div class="products">
                                                            @foreach($product['products'] as $product2)
                                                                <div class="product">
                                                                    <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                        <img src="{{ asset($product2->path) }}" width="224" height="197" class="wp-post-image" alt="">
                                                                        <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount">{{ number_format($product2->price,2) }}</span>
                                                                            </span>
                                                                        <!-- /.price -->
                                                                        <h2 class="woocommerce-loop-product__title">{{ $product2->name }}</h2>
                                                                    </a>
                                                                    <div class="hover-area">
                                                                        <a class="button add_to_cart_button" href="{{ route('product.show',['id' => $product2->pid]) }}" rel="nofollow">ดูสินค้า</a>
                                                                    </div>
                                                                </div>
                                                                <!-- /.product-outer -->
                                                            @endforeach
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
                                                        <a class="woocommerce-LoopProduct-link" href="{{ route('product.show',['id' => $recommend_products[0]->id]) }}">
                                                            <img width="600" height="600" alt="" class="attachment-shop_single size-shop_single wp-post-image" src="{{ $recommend_products[0]->path }}">
                                                            <span class="price">
                                                                        <ins>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                {{ number_format($recommend_products[0]->price,2) }}</span>
                                                                        </ins>
                                                                    </span>
                                                            <h2 class="woocommerce-loop-product__title">{{ $recommend_products[0]->name }}</h2>
                                                        </a>
                                                        <a class="button add_to_cart_button" href="{{ route('product.show',['id' => $recommend_products[0]->id]) }}">ดูสินค้า</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .tab-featured-product -->
                                    </div>
                                    <!-- .tab-product-carousel-with-featured-product -->
                                </div>
                            @endforeach
                            <!-- .tab-pane -->
                        </div>
                        <!-- .tab-content -->
                    </section>
                    <!-- .section-products-carousel-tabs-->
                </main>
                <!-- #main -->
            </div>
            <!-- #primary -->
            <div id="secondary" class="widget-area" role="complementary">
                @foreach($random_products as $product)
                    <div class="widget widget_techmarket_banner_widget">
                        <div class="banner">
                            <a href="shop.html">
                                <div style="background-size: cover; background-position: center center; background-image: url( {{ asset($product->path) }} ); height: 207px;" class="banner-bg">
                                    <div class="caption">
                                        <div class="banner-info">
                                            <h3 class="title">
                                                <strong>{{ $product->name }}</strong>
                                                <br>
                                            </h3>
                                        </div>
                                        <!-- .banner-info -->
                                        <span class="price">{{ number_format($product->price,2) }}</span>
                                        <span class="banner-action button">ซื้อเลย</span>
                                    </div>
                                    <!-- .caption -->
                                </div>
                                <!-- .banner-bg -->
                            </a>
                        </div>
                        <!-- .banner -->
                    </div>
                @endforeach
            </div>
            <!-- #secondary -->
        </div>
        <!-- .row -->
    </div>
    <!-- .col-full -->
@endsection
