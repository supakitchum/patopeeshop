@extends('frontend.layouts.main')
@section('title','หน้าแรก')
@section('content')
    <!-- Home slide -->
    <div class="home-slide3 owl-carousel nav-style3 nav-center-center" data-animateout="fadeOut" data-animatein="fadeIn" data-items="1" data-nav="true" data-dots="false" data-loop="true" data-autoplay="true">
        <img src="{{ asset('images/header1.png') }}" alt="">
        <img src="{{ asset('images/header2.png') }}" alt="">
    </div>
    <!-- ./Home slide -->
    <div class="container">
        <div class="text-border margin-top-30">
            <p>!! สั่งซื้อตอนนี้ ฟรีค่าจัดส่ง !!</p>
        </div>
        <div class="margin-top-10">
            <div class="row">
                <div class="col-sm-4 margin-top-30">
                    <a class="banner-opacity" href="#"><img src="{{ asset('images/promotion1.png') }}" alt=""></a>
                </div>
                <div class="col-sm-4 margin-top-30">
                    <a class="banner-opacity" href="#"><img src="{{ asset('images/promotion2.png') }}" alt=""></a>
                </div>
                <div class="col-sm-4 margin-top-30">
                    <a class="banner-opacity" href="#"><img src="{{ asset('images/promotion3.png') }}" alt=""></a>
                </div>
            </div>
        </div>
        <div class="margin-top-50">
            <div class="tab-product">
                <ul class="box-tabs nav-tab tab-owl-fade-effect">
                    <li class="active"><a data-animated='fadeInUp' data-toggle="tab" href="#tab-1">สินค้าแนะนำ</a></li>
                    <li><a data-animated='slideInLeft' data-toggle="tab" href="#tab-2">สินค้ามาใหม่</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-container">
                        <div id="tab-1" class="tab-panel active">
                            <ul class="tab-list owl-carousel nav-style7 nav-center-center" data-nav="true" data-autoplay="false" data-dots="false" data-loop="true" data-margin="30" data-responsive='{"0":{"items":1},"600":{"items":2},"1000":{"items":4}}'>
                                @foreach($recommend_products as $product)
                                    <li class="product-item">
                                        <div class="product-inner">
                                            <div class="product-thumb has-back-image" style="max-height: 390px;overflow-y: hidden">
                                                <a href="{{ route('product.show',['id' => $product->id]) }}"><img src="{{ asset($product->path) }}" alt=""></a>
                                                <a class="back-image" href="{{ route('product.show',['id' => $product->id]) }}"><img src="{{ asset($product->path) }}" alt=""></a>
                                                <div class="gorup-button">
                                                    <a href="{{ route('product.show',['id' => $product->id]) }}" class="quick-view"><i class="fa fa-search"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h3 class="product-name"><a href="{{ route('product.show',['id' => $product->id]) }}">{{ $product->name }}</a></h3>
                                                <span class="price">
											<ins>{{ $product->price }} บาท</ins>
										</span>
                                                <a href="#" data-toggle="modal"
                                                   data-title="{{ $product->name }}"
                                                   data-product-id="{{ $product->id }}"
                                                   data-photo="{{ asset($product->path) }}" data-target="#addOrderModal"
                                                   class="button add_to_cart_button">เพิ่มลงรถเข็น</a>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div id="tab-2" class="tab-panel">
                            <ul class="tab-list owl-carousel nav-style7 nav-center-center" data-nav="true" data-autoplay="false" data-dots="false" data-loop="true" data-margin="30" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>
                                @foreach($products as $product)
                                    <li class="product-item">
                                        <div class="product-inner">
                                            <div class="product-thumb has-back-image" style="max-height: 390px;overflow-y: hidden">
                                                <a href="{{ route('product.show',['id' => $product->id]) }}"><img src="{{ asset($product->path) }}" alt=""></a>
                                                <a class="back-image" href="{{ route('product.show',['id' => $product->id]) }}"><img src="{{ asset($product->path) }}" alt=""></a>
                                                <div class="gorup-button">
                                                    <a href="{{ route('product.show',['id' => $product->id]) }}" class="quick-view"><i class="fa fa-search"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h3 class="product-name"><a href="{{ route('product.show',['id' => $product->id]) }}">{{ $product->name }}</a></h3>
                                                <span class="price">
											<ins>{{ $product->price }} บาท</ins>
										</span>
                                                <a href="#" data-toggle="modal"
                                                   data-title="{{ $product->name }}"
                                                   data-product-id="{{ $product->id }}"
                                                   data-photo="{{ asset($product->path) }}" data-target="#addOrderModal"
                                                   class="button add_to_cart_button">เพิ่มลงรถเข็น</a>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="margin-top-60 our-category">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-5">
                    <div class="section-title text-center margin-top-40 margin-bottom-30">
                        <h3>หมวดหมู่สินค้า</h3>
                        <span class="sub-title">ค้นหาสินค้าที่คุณต้องการด้วยระบบหมวดหมู่สินค้า</span>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-7">
                    <ul class="category-menu category-carousel pull-left owl-carousel nav-style7 nav-center-center" data-nav="true" data-autoplay="false" data-dots="false" data-loop="true" data-margin="30" data-responsive='{"0":{"items":1},"600":{"items":4},"1000":{"items":4}}'>
                        @foreach($catalogs as $catalog)
                            <li>
                                <a href="{{ route('product.index',['catalog'=> $catalog->id]) }}">
                                    <img src="{{ asset($catalog->photo) }}" alt="">
                                    {{ $catalog->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="margin-top-60 section-lasttest-blog">
            <div class="section-title text-center"><h3>บทความของเรา</h3></div>
            <div class="lastest-blog owl-carousel nav-center-center nav-style7" data-nav="true" data-dots="false" data-loop="true" data-margin="30" data-responsive='{"0":{"items":1},"600":{"items":1},"1000":{"items":2}}'>
                @for($i=0;$i < 3;$i++)
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
                            <a class="banner-border" href="#"><img src="{{ asset('images/blog'.($i+1).'.png') }}" alt=""></a>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

        <div class="section-brand-slide">
            <div class="brands-slide owl-carousel nav-center-center nav-style7" data-nav="true" data-dots="false" data-loop="true" data-margin="60" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":5}}'>
                <a href="#"><img src="{{ asset('images/free1.png') }}" alt=""></a>
                <a href="#"><img src="{{ asset('images/free2.png') }}" alt=""></a>
                <a href="#"><img src="{{ asset('images/free3.png') }}" alt=""></a>
                <a href="#"><img src="{{ asset('images/free4.png') }}" alt=""></a>
                <a href="#"><img src="{{ asset('images/free5.png') }}" alt=""></a>
                <a href="#"><img src="{{ asset('images/free6.png') }}" alt=""></a>
            </div>
        </div>
        <div class="margin-top-60">
            <div class="row">
                <div class="col-sm-12 col-md-7">
                    <div class="video video-lightbox">
                        <img src="{{ asset('images/vdo.png') }}" alt="">
                        <div class="overlay"></div>
                        <a href="#"  class="link-lightbox button-play" data-videoid="134060140" data-videosite="vimeo"></a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-5">
                    <div class="newsletter">
                        <div class="section-title text-center"><h3>ติดตามข่าวสาร</h3></div>
                        <i class="newsletter-info">สมัครเพื่อรับข้อมูลข่าวสารและโปรโมชัน</i>
                        <form class="form-newsletter">
                            <input type="text" name="newsletter" placeholder="ใส่อีเมลของคุณ" value="">
                            <span><button class="newsletter-submit" type="submit">สมัคร</button></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="margin-top-60 margin-bottom-30">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="element-icon style2">
                        <div class="icon"><i class="flaticon flaticon-origami28"></i></div>
                        <div class="content">
                            <h4 class="title">ฟรีค่าจัดส่ง</h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="element-icon style2">
                        <div class="icon"><i class="flaticon flaticon-curvearrows9"></i></div>
                        <div class="content">
                            <h4 class="title">การันตีการคืนเงิน</h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="element-icon style2">
                        <div class="icon"><i class="flaticon flaticon-headphones54"></i></div>
                        <div class="content">
                            <h4 class="title">มีเจ้าหน้าที่ดูแลตลอด 24 ชั่วโมง</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
