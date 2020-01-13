@extends('frontend.layouts.main')
@section('title',$results[0]->name)
@section('content')
    <div class="col-full mt-5">
        <div class="row">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="product product-type-simple">
                        <div class="single-product-wrapper">
                            <div class="product-images-wrapper thumb-count-4">
                                <!-- .onsale -->
                                <div id="techmarket-single-product-gallery" class="techmarket-single-product-gallery techmarket-single-product-gallery--with-images techmarket-single-product-gallery--columns-4 images" data-columns="4">
                                    <div class="techmarket-single-product-gallery-images" data-ride="tm-slick-carousel" data-wrap=".woocommerce-product-gallery__wrapper" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:false,&quot;asNavFor&quot;:&quot;#techmarket-single-product-gallery .techmarket-single-product-gallery-thumbnails__wrapper&quot;}">
                                        <div class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images" data-columns="4">
                                            <a href="#" class="woocommerce-product-gallery__trigger">🔍</a>
                                            <figure class="woocommerce-product-gallery__wrapper ">
                                                @foreach($images as $image)
                                                    <div data-thumb="{{ asset($image->path) }}" class="woocommerce-product-gallery__image">
                                                        <a href="{{ asset($image->path) }}" tabindex="0">
                                                            <img width="600" height="600" src="{{ asset($image->path) }}" class="attachment-shop_single size-shop_single wp-post-image" alt="">
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </figure>
                                        </div>
                                        <!-- .woocommerce-product-gallery -->
                                    </div>
                                    <!-- .techmarket-single-product-gallery-images -->
                                    <div class="techmarket-single-product-gallery-thumbnails" data-ride="tm-slick-carousel" data-wrap=".techmarket-single-product-gallery-thumbnails__wrapper" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;vertical&quot;:true,&quot;verticalSwiping&quot;:true,&quot;focusOnSelect&quot;:true,&quot;touchMove&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-up\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-down\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;asNavFor&quot;:&quot;#techmarket-single-product-gallery .woocommerce-product-gallery__wrapper&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:765,&quot;settings&quot;:{&quot;vertical&quot;:false,&quot;horizontal&quot;:true,&quot;verticalSwiping&quot;:false,&quot;slidesToShow&quot;:4}}]}">
                                        <figure class="techmarket-single-product-gallery-thumbnails__wrapper">
                                            @foreach($images as $image)
                                                <figure data-thumb="{{ asset($image->path) }}" class="techmarket-wc-product-gallery__image">
                                                    <img width="180" height="180" src="{{ asset($image->path) }}" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="">
                                                </figure>
                                            @endforeach
                                        </figure>
                                        <!-- .techmarket-single-product-gallery-thumbnails__wrapper -->
                                    </div>
                                    <!-- .techmarket-single-product-gallery-thumbnails -->
                                </div>
                                <!-- .techmarket-single-product-gallery -->
                            </div>
                            <!-- .product-images-wrapper -->
                            <div class="summary entry-summary">
                                <div class="single-product-header">
                                    <h1 class="product_title entry-title">{{ $results[0]->name }}</h1>
                                </div>
                                <!-- .single-product-header -->
                                <div class="woocommerce-product-details__short-description">
                                    {!! $results[0]->detail !!}
                                </div>
                                <!-- .woocommerce-product-details__short-description -->
                                <div class="product-actions-wrapper">
                                    <div class="product-actions">
                                        <p class="price">
                                            <ins>
                                                            <span class="woocommerce-Price-amount amount">{{ number_format($results[0]->price) }} บาท</span>
                                            </ins>
                                        </p>
                                        <!-- .single-product-header -->
                                        <form class="cart-form" enctype="multipart/form-data" method="post">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div style="width: 100%">
                                                        <div class="form-group">
                                                            <label for="size">ขนาด</label>
                                                            <select id="size" name="size">
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div style="width: 100%">
                                                        <div class="form-group">
                                                            <label>กำลังไฟ</label>
                                                            <select disabled id="color" name="color">
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="quantity">
                                                        <label for="quantity-input">จำนวน</label>
                                                        <input type="number" size="4" class="input-text qty text w-100" title="Qty" value="1" name="quantity" id="quantity-input">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <button onclick="add_item()" class="single_add_to_cart_button button alt w-100 mt-3" style="margin-left: 0px;margin-right: 0px;" name="add-to-cart" type="button">เพิ่มลงตะกร้า</button>
                                                </div>
                                            </div>
                                            <input type="hidden" name="aid" value="" id="aid">
                                            <!-- .quantity -->
                                        </form>
                                        <!-- .cart -->
                                    </div>
                                    <!-- .product-actions -->
                                </div>
                                <!-- .product-actions-wrapper -->
                            </div>
                            <!-- .entry-summary -->
                        </div>
                        <!-- .single-product-wrapper -->
                        <div class="woocommerce-tabs wc-tabs-wrapper">
                            <ul role="tablist" class="nav tabs wc-tabs">
                                <li class="nav-item description_tab">
                                    <a class="nav-link active" data-toggle="tab" role="tab" aria-controls="tab-description" href="#tab-description">ข้อมูลสินค้า</a>
                                </li>
                                <li class="nav-item specification_tab">
                                    <a class="nav-link" data-toggle="tab" role="tab" aria-controls="tab-specification" href="#tab-specification">คลังสินค้า</a>
                                </li>
                            </ul>
                            <!-- /.ec-tabs -->
                            <div class="tab-content">
                                <div class="tab-pane panel wc-tab active" id="tab-description" role="tabpanel">
                                    <h2>รายละเอียด</h2>
                                    <h1 style="text-align: center;">{{ $results[0]->name }}</h1>
                                    <p style="text-align: center;max-width: 1160px;margin: auto auto 60px;">{!! $results[0]->name !!}</p>
                                    <hr>
                                </div>
                                <div class="tab-pane" id="tab-specification" role="tabpanel">
                                    <table class="table-bordered">
                                        <thead>
                                        <tr>
                                            <th>ขนาด</th>
                                            <th>กำลังไฟ</th>
                                            <th>คงเหลือ</th>
                                            <th>ราคา</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($results as $result)
                                            <tr>
                                                <td>{{ $result->size_name }}</td>
                                                <td>{{ $result->color_name }}</td>
                                                <td>{{ $result->quality }}</td>
                                                <td>{{ $result->price }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <!-- /.tm-shop-attributes-detail -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .product -->
                </main>
                <!-- #main -->
            </div>
            <!-- #primary -->
            <div id="secondary" class="widget-area shop-sidebar" role="complementary">
                <div id="techmarket_product_categories_widget-2" class="widget woocommerce widget_product_categories techmarket_widget_product_categories">
                    <ul class="product-categories category-single">
                        <li class="product_cat">
                            <ul class="show-all-cat">
                                <li class="product_cat">
                                    <span class="show-all-cat-dropdown">แสดงหมวดหมู่ทั้งหมด</span>
                                    <ul>
                                        @foreach($catalogs as $catalog)
                                            <li class="cat-item"><a href="{{ route('product.index',['catalog' => $catalog->id]) }}">{{ $catalog->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                            <ul>
                                <li class="cat-item current-cat"><a href="{{ route('product.index',['catalog' => $catalog_now->cid]) }}">{{ $catalog_now->name }}</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- .product-categories -->
                </div>
                <!-- .techmarket_widget_product_categories -->
                <div class="widget widget_techmarket_products_carousel_widget">
                    <section id="single-sidebar-carousel" class="section-products-carousel">
                        <header class="section-header">
                            <h2 class="section-title">สินค้าแนะนำ</h2>
                            <nav class="custom-slick-nav"></nav>
                        </header>
                        <!-- .section-header -->
                        <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;rows&quot;:2,&quot;slidesPerRow&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#single-sidebar-carousel .custom-slick-nav&quot;}">
                            <div class="container-fluid">
                                <div class="woocommerce columns-1">
                                    <div class="products">
                                        @foreach($recommend_products as $product)
                                            <div class="landscape-product-widget product">
                                                <a class="woocommerce-LoopProduct-link" href="{{ route('product.show',['id' => $product->id]) }}">
                                                    <div class="media">
                                                        <img class="wp-post-image" src="{{ asset($product->path) }}" alt="">
                                                        <div class="media-body">
                                                                    <span class="price">
                                                                        <ins>
                                                                            <span class="amount">{{ number_format($product->price,2) }}</span>
                                                                        </ins>
                                                                    </span>
                                                            <!-- .price -->
                                                            <h2 class="woocommerce-loop-product__title">{{ $product->name }}</h2>
                                                            <!-- .techmarket-product-rating -->
                                                        </div>
                                                        <!-- .media-body -->
                                                    </div>
                                                    <!-- .media -->
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                            </div>
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
                    <!-- .section-products-carousel -->
                </div>
                <!-- .widget_techmarket_products_carousel_widget -->
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function getAll() {
            color.attr('disabled', true);
            color.html('')
            color.trigger("chosen:updated");
            // $("#amount").attr('disabled',true);
            price.val(0)
            $.get("/api/product/{{ $results[0]->id }}", function (data) {
                details = data;
            });
            $.get("/api/product/{{ $results[0]->id }}/true", function (sizes) {
                size.html('');
                size.append($("<option>").attr('value', 0).text('โปรดเลือกขนาด'));
                $(sizes).each(function () {
                    size.append($("<option>").attr('value', this.size_id).text(this.size_name));
                });
                size.trigger("chosen:updated");
            })
        }

        $(document).ready(function () {
            getAll();
            size.on('change', function () {
                var id = $('#size option:selected').val()
                detail = details.filter(function (obj) {
                    return obj.size_id == id;
                });
                color.html('');
                amount.attr('disabled', true);
                amount.val();
                $('#total').html('0')
                price.val(0)
                color.append($("<option>").attr('value', 0).text('โปรดเลือกกำลังไฟ'));
                $(detail).each(function () {
                    color.attr('disabled', false);
                    color.append($("<option>").attr('value', this.color_id).text(this.color_name));
                });
                color.trigger("chosen:updated")
            })
            color.on('change', function () {
                var id = $('#color option:selected').val()
                detail = details.filter(function (obj) {
                    return obj.color_id == id;
                });
                amount.attr('disabled', false);
                amount.val(1);
                $('#aid').val(detail[0].id)
                $('#total').html(detail[0].price)
                price.val(detail[0].price)
                $('#price').html(detail[0].price)
                $('#quality').html(detail[0].quality)
            })
        });
    </script>
@endsection
