@extends('frontend.layouts.main')
@section('title','หน้าแรก')
@section('content')
    <div class="col-full">
        <div class="row">
            <!-- .woocommerce-breadcrumb -->
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    @isset(request()->catalog)
                        @php($catalog_now = \App\Model\Catalog::find(request()->catalog))
                        <div class="shop-archive-header">
                            <div class="jumbotron">
                                <div class="jumbotron-img">
                                    <img width="416" height="283" alt=""
                                         src="{{ isset($catalog_now->photo) ? $catalog_now->photo: 'assets/images/products/jumbo.jpg'}}"
                                         class="jumbo-image alignright">
                                </div>
                                <div class="jumbotron-caption" style="height: 270px;">
                                    <h3 class="jumbo-title">{{ $catalog_now->name }}</h3>
                                </div>
                                <!-- .jumbotron-caption -->
                            </div>
                            <!-- .jumbotron -->
                        </div>
                        <!-- .shop-archive-header -->
                    @endif
                    <div class="shop-control-bar">
                        <div class="handheld-sidebar-toggle">
                            <button type="button" class="btn sidebar-toggler">
                                <i class="fa fa-sliders"></i>
                                <span>ตัวกรองสินค้า</span>
                            </button>
                        </div>
                        <!-- .handheld-sidebar-toggle -->
                        <h1 class="woocommerce-products-header__title page-title">สินค้า</h1>
                        <!-- .shop-view-switcher -->
                        <!-- .woocommerce-ordering -->
                        <nav class="techmarket-advanced-pagination">
                            <form class="form-adv-pagination" method="post">
                                <input type="number" value="1" class="form-control" step="1" max="5" min="1" size="2"
                                       id="goto-page">
                            </form>
                            of 5<a href="#" class="next page-numbers">→</a>
                        </nav>
                        <!-- .techmarket-advanced-pagination -->
                    </div>
                    <!-- .shop-control-bar -->
                    <div class="tab-content">
                        <div id="list-view" class="tab-pane active" role="tabpanel">
                            <div class="woocommerce columns-1">
                                <div class="products">
                                    @foreach($results as $result)
                                        <div class="product list-view ">
                                            <div class="media">
                                                <img width="224" height="197" alt=""
                                                     class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                     src="{{ asset($result->path) }}">
                                                <div class="media-body">
                                                    <div class="product-info text-center-sm">
                                                        <!-- .yith-wcwl-add-to-wishlist -->
                                                        <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                           href="{{ route('product.show',['id' => $result->id]) }}">
                                                            <h2 class="woocommerce-loop-product__title m-0-sm">{{ $result->name }}</h2>
                                                        </a>
                                                        <!-- .woocommerce-LoopProduct-link -->
                                                        <div class="woocommerce-product-details__short-description">
                                                            {!! $result->detail !!}
                                                        </div>
                                                        <!-- .woocommerce-product-details__short-description -->
                                                    </div>
                                                    <!-- .product-info -->
                                                    <div class="product-actions text-center-sm p-0-sm">
                                                        <div class="availability text-center-sm w-100-sm">
                                                            คงเหลือ:
                                                            <span class="stock in-stock text-success">{{ $result->quality }}
                                                                ในคลังสินค้า</span>
                                                        </div>
                                                        <div class="text-center-sm w-100-sm">
                                                            <div class="price w-100 text-center-sm">
                                                                    <span class="woocommerce-Price-amount amount w-100">
                                                                        {{ number_format($result->price) }} บาท</span>
                                                            </div>
                                                            <!-- .price -->
                                                            <a href="#" data-toggle="modal"
                                                               data-title="{{ $result->name }}"
                                                               data-product-id="{{ $result->id }}"
                                                               data-photo="{{ asset($result->path) }}"
                                                               data-target="#addOrderModal"
                                                               class="button add_to_cart_button">เพิ่มลงตะกร้า</a>
                                                        </div>
                                                    </div>
                                                    <!-- .product-actions -->
                                                </div>
                                                <!-- .media-body -->
                                            </div>
                                            <!-- .media -->
                                        </div>
                                        <!-- .product -->
                                    @endforeach
                                </div>
                                <!-- .products -->
                            </div>
                            <!-- .woocommerce -->
                        </div>
                        <!-- .tab-pane -->
                    </div>
                    <!-- .tab-content -->
                    <div class="shop-control-bar-bottom mb-5">
                        <p class="woocommerce-result-count">
                            แสดงสินค้าจำนวนชิ้นที่ {{ $results->firstItem() == $results->lastItem() ? $results->lastItem() : $results->firstItem().'-'.$results->lastItem() }}
                            จากทั้งหมด {{ $results->total() }} ชิ้น
                        </p>
                        <!-- .woocommerce-result-count -->
                    {{ $results->appends(request()->all())->links() }}
                    {{--                    <nav class="woocommerce-pagination">--}}
                    {{--                        <ul class="page-numbers">--}}
                    {{--                            <li>--}}
                    {{--                                <span class="page-numbers current">1</span>--}}
                    {{--                            </li>--}}
                    {{--                            <li><a href="#" class="page-numbers">2</a></li>--}}
                    {{--                            <li><a href="#" class="page-numbers">3</a></li>--}}
                    {{--                            <li><a href="#" class="page-numbers">4</a></li>--}}
                    {{--                            <li><a href="#" class="page-numbers">5</a></li>--}}
                    {{--                            <li><a href="#" class="next page-numbers">→</a></li>--}}
                    {{--                        </ul>--}}
                    {{--                        <!-- .page-numbers -->--}}
                    {{--                    </nav>--}}
                    <!-- .woocommerce-pagination -->
                    </div>
                    <!-- .shop-control-bar-bottom -->
                </main>
                <!-- #main -->
            </div>
            <!-- #primary -->
            <div id="secondary" class="widget-area shop-sidebar" role="complementary">
                <div class="widget woocommerce widget_product_categories techmarket_widget_product_categories"
                     id="techmarket_product_categories_widget-2">
                    <ul class="product-categories ">
                        <li class="product_cat">
                            <span>หมวดหมู่</span>
                            <ul>
                                @foreach($catalogs as $index=>$catalog)
                                    <li class="cat-item">
                                        <a href="{{ route('product.index',['catalog' => $catalog->id]) }}">
                                            <span class="no-child"></span>{{ $catalog->name }} ({{ $catalog->total }}
                                            )</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
                <div id="techmarket_products_filter-3" class="widget widget_techmarket_products_filter">
                    <span class="gamma widget-title">ตัวเลือกสินค้า</span>
                    <!-- .woocommerce widget_layered_nav -->
                    <div class="widget woocommerce widget_layered_nav maxlist-more" id="woocommerce_layered_nav-3">
                        <span class="gamma widget-title">กำลังไฟ</span>
                        <ul>
                            @foreach($colors as $color)
                                <li class="wc-layered-nav-term "><a class="active"
                                                                    href="/product?catalog={{ request()->catalog ? request()->catalog:1 }}&size={{ request()->size ? request()->size:'' }}{{ '&color='.$color->id }}">{{ $color->name }}</a>
                                    <span class="count">(4)</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- .woocommerce widget_layered_nav -->
                </div>
                <div class="widget widget_techmarket_products_carousel_widget">
                    <section id="single-sidebar-carousel" class="section-products-carousel">
                        <header class="section-header">
                            <h2 class="section-title">Latest Products</h2>
                            <nav class="custom-slick-nav"></nav>
                        </header>
                        <!-- .section-header -->
                        <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products"
                             data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;rows&quot;:2,&quot;slidesPerRow&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#single-sidebar-carousel .custom-slick-nav&quot;}">
                            <div class="container-fluid">
                                <div class="woocommerce columns-1">
                                    <div class="products">
                                        <div class="landscape-product-widget product">
                                            <a class="woocommerce-LoopProduct-link"
                                               href="single-product-fullwidth.html">
                                                <div class="media">
                                                    <img class="wp-post-image" src="assets/images/products/sm-1.jpg"
                                                         alt="">
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
                                                        <h2 class="woocommerce-loop-product__title">S100 Wireless
                                                            Bluetooth Speaker – Neon Green</h2>
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
                                            <a class="woocommerce-LoopProduct-link"
                                               href="single-product-fullwidth.html">
                                                <div class="media">
                                                    <img class="wp-post-image" src="assets/images/products/sm-2.jpg"
                                                         alt="">
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
                                                        <h2 class="woocommerce-loop-product__title">S100 Wireless
                                                            Bluetooth Speaker – Neon Green</h2>
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
                                            <a class="woocommerce-LoopProduct-link"
                                               href="single-product-fullwidth.html">
                                                <div class="media">
                                                    <img class="wp-post-image" src="assets/images/products/sm-3.jpg"
                                                         alt="">
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
                                                        <h2 class="woocommerce-loop-product__title">S100 Wireless
                                                            Bluetooth Speaker – Neon Green</h2>
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
                                            <a class="woocommerce-LoopProduct-link"
                                               href="single-product-fullwidth.html">
                                                <div class="media">
                                                    <img class="wp-post-image" src="assets/images/products/sm-4.jpg"
                                                         alt="">
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
                                                        <h2 class="woocommerce-loop-product__title">S100 Wireless
                                                            Bluetooth Speaker – Neon Green</h2>
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
        </div>
        <!-- .row -->
    </div>
    <!-- .col-full -->
@endsection
