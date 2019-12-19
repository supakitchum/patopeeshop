@extends('frontend.layouts.main')
@section('title','หน้าแรก')
@section('content')
    <div class="main-container shop-with-banner left-slidebar">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-3 sidebar">
                    <!-- Product category -->
                    <div class="widget widget_product_categories">
                        <h2 class="widget-title">หมวดหมู่</h2>
                        <ul class="product-categories">
                            @foreach($catalogs as $index=>$catalog)
                                <li class="{{ $catalog->id == request()->catalog ? 'current-cat':'' }}"><a
                                        href="product?catalog={{ $catalog->id }}">{{ $catalog->name }}</a><span
                                        class="count-item">({{ $catalog->total }})</span></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- ./Product category -->
                    <!-- By color -->
                    <div class="widget widget_fillter_color">
                        <h2 class="widget-title">สี</h2>
                        <div class="inner">
                            @foreach($colors as $color)
                                <a class="{{ request()->color == $color->id ? 'active': '' }}"
                                   href="/product?catalog={{ request()->catalog ? request()->catalog:1 }}&size={{ request()->size ? request()->size:'' }}{{ '&color='.$color->id }}"><span
                                        style="background-color:{{ $color->code }};border: 1px solid black;"></span></a>
                            @endforeach
                        </div>
                    </div>
                    <!-- ./By color -->
                    <!-- By color -->
                    <div class="widget widget_fillter_size">
                        <h2 class="widget-title">SIZE Option</h2>
                        <div class="inner">
                            @foreach($sizes as $size)
                                <a class="{{ request()->size == $size->id ? 'active': '' }} margin-bottom-20"
                                   href="/product?catalog={{ request()->catalog ? request()->catalog:1 }}&color={{ request()->color ? request()->color:'' }}{{ '&size='.$size->id }}"><span>{{ $size->name }}</span></a>
                            @endforeach
                        </div>
                    </div>
                    <!-- ./By color -->
                </div>
                <div class="main-content col-sm-8 col-md-9">
                    <div class="shop-top">
                        <div class="shop-top-left">
                            <span class="woocommerce-result-count">แสดงสินค้าจำนวนชิ้นที่ {{ $results->firstItem() == $results->lastItem() ? $results->lastItem() : $results->firstItem().'-'.$results->lastItem() }} จาก {{ $results->total() }} ชิ้น</span>
                        </div>
                    </div>
                    <ul class="product-list-grid desktop-columns-3 tablet-columns-2 mobile-columns-1 row flex-flow">
                        @if(sizeof($results) > 0)
                            @foreach($results as $result)
                                <li class="product-item style3 col-sm-6 col-md-4">
                                    <div class="product-inner">
                                        <div class="product-thumb has-back-image" style="max-height: 390px;overflow-y: hidden">
                                            <a><img src="{{ asset($result->path) }}" alt=""></a>
                                            <a class="back-image"><img src="{{ asset($result->path) }}" alt=""></a>
                                            <div class="gorup-button">
                                                <a href="/product/{{ $result->id }}" class="quick-view"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h3 class="product-name"><a
                                                    href="/product/{{ $result->id }}">{{ $result->name }}</a></h3>
                                            <span class="price">
									<ins>{{ $result->price }}</ins>
								</span>
                                            <a href="/product/{{ $result->id }}" class="button add_to_cart_button">ดูรายละเอียด</a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <li class="col-sm-12 text-center product-item style3 text-border">
                                ไม่พบสินค้า
                            </li>
                        @endif
                    </ul>
                    <div align="center">
                        {{ $results->appends(request()->all())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function () {
            function getData() {
                $('#row').html('');
                $.ajax({
                    url: "/api/filter/frontend/product",
                    type: "POST",
                    data: $('#form-filter').serializeArray(),
                    success: function (json) {
                        for (var i = 0, ien = json.length; i < ien; i++) {
                            $('#row').append(
                                '<li class="product-item style3 col-sm-6 col-md-4 text-center">' +
                                '<div class="product-inner">' +
                                '   <div class="product-thumb has-back-image">' +
                                '       <a href="/product/' + json[i]['pid'] + '"><img src="/' + json[i]['path'] +
                                '" alt="" style="height: 200px;" ></a>' +
                                '       <a class="back-image" href="/product/' + json[i]['pid'] + '"><img src="images/products/left2.png" alt="" style="height: 200px;"></a>' +
                                ' <div class="gorup-button">' +
                                '<a href="/product/' + json[i]['pid'] + '" class="quick-view"><i class="fa fa-search"></i></a>' +
                                '  </div>' +
                                '   </div>' +
                                '<div class="product-info">' +
                                '<h3 class="product-name"><a href="/product/' + json[i]['pid'] + '">' + json[i]['name'] +
                                '</a></h3>' +
                                '   <span class="price">' +
                                '<ins>' + json[i]['price'] + ' บาท</ins>' +
                                ' </span>' +
                                '  <a href="/product/"' + json[i]['pid'] + ' class="button add_to_cart_button"><i class="fa fa-shopping-cart"></i> เพิ่มลงรถเข็น</a>' +
                                '</div>' +
                                '     </div>' +
                                '</li>'
                            );
                        }

                    }
                })
            }

            $('input[type=checkbox]').change(function () {
                getData()
            });
        }); // End of use strict
    </script>
@stop
