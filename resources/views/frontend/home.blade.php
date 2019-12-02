@extends('frontend.layouts.main')
@section('title','หน้าแรก')
@section('tab-content')
    <div id="tab-1" class="tab tab-active">
        <!-- home -->
    @include('frontend.layouts.navbar')

    <!-- sidebar -->
    @include('frontend.layouts.sidebar')
    <!-- end sidebar -->

        <!-- slider -->
        <div class="slider">
            <div class="container">
                <div data-pagination='{"el": ".swiper-pagination"}' data-space-between="10"
                     class="swiper-container swiper-init swiper-container-horizontal">
                    <div class="swiper-pagination"></div>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="content">
                                <img
                                    src="https://laz-img-cdn.alicdn.com/images/ims-web/TB10PfEnFT7gK0jSZFpXXaTkpXa.jpg_2200x2200Q100.jpg_.webp"
                                    alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="content">
                                <img
                                    src="https://laz-img-cdn.alicdn.com/images/ims-web/TB1d0zKnHj1gK0jSZFuXXcrHpXa.jpg_1200x1200.jpg"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end slider -->

        <!-- categories home -->
        <div class="categories-home segments">
            <div class="container">
                <div class="section-title">
                    <h3>หมวดหมู่
                        <a href="/categories/" class="view-all-link">ดูทั้งหมด</a>
                    </h3>
                </div>
                <div class="row">
                    @foreach($catalogs as $catalog)
                        <div class="col-25" style="margin-top: 5%;">
                            <div class="content">
                                <a href="/categories-details/">
                                    <i class="ti-slice"></i>
                                    <span>{{ $catalog->name }}</span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- end categories home -->

        <!-- divider -->
        <div class="divider"></div>
        <!-- end divider -->

        <!-- promotion -->
{{--        <div class="promotion segments">--}}
{{--            <div data-space-between="10" data-slides-per-view="auto"--}}
{{--                 class="swiper-container swiper-init demo-swiper-auto">--}}
{{--                <div class="swiper-wrapper">--}}
{{--                    <div class="swiper-slide">--}}
{{--                        <div class="first-content">--}}
{{--                            <h4>Promo</h4>--}}
{{--                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro, voluptates,--}}
{{--                                maxime! Temporibus.</p>--}}
{{--                            <a href="" class="view-all-link">View All <i class="ti-angle-right"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="swiper-slide">--}}
{{--                        <div class="content">--}}
{{--                            <img src="images/product1.jpg" alt="">--}}
{{--                            <div class="text">--}}
{{--                                <a href="/product-details/"><p>Original Sweater With 100% Wool Fabric</p>--}}
{{--                                </a>--}}
{{--                                <span class="price">$10.00</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="swiper-slide">--}}
{{--                        <div class="content">--}}
{{--                            <img src="images/product2.jpg" alt="">--}}
{{--                            <div class="text">--}}
{{--                                <a href="/product-details/"><p>Mountain Shoes - Middle to Low Hiking</p></a>--}}
{{--                                <span class="price">$15.00</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="swiper-slide">--}}
{{--                        <div class="content">--}}
{{--                            <img src="images/product3.jpg" alt="">--}}
{{--                            <div class="text">--}}
{{--                                <a href="/product-details/"><p>Casual Dress Shirt Men Long Sleeves</p></a>--}}
{{--                                <span class="price">$17.00</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <!-- end promotion -->

        <!-- divider -->
        <div class="divider"></div>
        <!-- end divider -->

        <!-- product -->
        <div class="product-home segments">
            <div class="container">
                <div class="section-title">
                    <h3>สินค้า
                        <a href="/product/" class="view-all-link">View All</a>
                    </h3>
                </div>
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-50" style="margin-top: 5%;">
                            <a href="/product-details/{{$product->id }}">
                                <div class="content">
                                    <a href="/product-details/{{$product->id }}">
                                        <img src="{{ asset($product->path) }}" style="height: 20vh;" alt="">
                                    </a>
                                    <div class="text">
                                        <a href="/product-details/{{$product->id }}"><p>{{ $product->name }}</p></a>
                                        <span class="price">{{ number_format($product->price,2) }} บาท</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- end product -->
        </div>
@endsection
