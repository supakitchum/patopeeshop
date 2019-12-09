@extends('frontend.layouts.main')
@section('title',$results[0]->name)
@section('content')
    <div class="container">
        <div class="shop-banner">
            <img src="images/slides/slider-cat2.jpg" alt="">
        </div>
        <div class="row">
            <div class="main-content col-sm-12">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="product-detail-image style2">
                            <div class="main-image-wapper">
                                <img class="main-image" src="{{ asset($images[0]->path) }}" alt="">
                            </div>
                            <div class="thumbnails owl-carousel nav-center-center nav-style3" data-autoplay="true"
                                 data-loop="true" data-items="{{ sizeof($images) }}" data-dots="false" data-nav="true"
                                 data-margin="20">
                                @foreach($images as $image)
                                    <a data-url="{{ asset($image->path) }}" class="active" href="#"><img
                                            src="{{ asset($image->path) }}" alt=""></a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="product-details-right style2">
                            <h3 class="product-name">{{ $results[0]->name }}</h3>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <span class="count-review">( 2 <span>Reviews</span> )</span>
                            </div>
                            <span class="price">
                    <ins><span id="price">{{ number_format($results[0]->price) }}</span> บาท</ins>
                </span>
                            <div class="meta">
                                <span>คงเหลือ: {{ $results[0]->quality }}</span>
                                <span>สถานะ: <span
                                        class="{{ $results[0]->quality > 0 ? 'text-primary':'text-danger' }}">{{ $results[0]->quality > 0 ? 'มีสินค้าในคลัง':'สินค้าหมดชั่วคราว' }}</span></span>
                            </div>
                            <input type="hidden" name="aid" value="" id="aid">
                            <div style="width: 50%">
                                <div class="form-group">
                                    <label for="size">ขนาด</label><br>
                                    <select id="size" name="size">
                                    </select>
                                </div>
                            </div>
                            <div style="width: 50%">
                                <div class="form-group">
                                    <label>สี</label>
                                    <select disabled id="color" name="color">
                                    </select>
                                </div>
                            </div>
                            <form class="cart-form" enctype="multipart/form-data" method="post">
                                <div class="quantity">
                                    <a onclick="$('#amount').val() > 1 ? $('#amount').val($('#amount').val() - 1):''">-</a>
                                    <input type="number" min="1" class="input-text qty text" title="Qty" value="1" id="amount">
                                    <a onclick="$('#amount').val(($('#amount').val() * 1) + 1)">+</a>
                                </div>
                                <a class="button button-add-cart add-to-cart" data-quantity="1" href="#">เพิ่มลงรถเข็นของฉัน</a>
                                <a class="wishlist button" href="#"><i class="fa fa-heart-o"></i></a>
                                <a href="#" class="button compare"><i class="fa fa-exchange"></i></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tab -->
    <div class="container">
        <div class="tab-details-product style2">
            <ul class="box-tabs nav-tab">
                <li class="active"><a data-toggle="tab" href="#tab-1">รายละเอียด</a></li>
                <li><a data-toggle="tab" href="#tab-2">คลังสินค้า</a></li>
            </ul>
            <div class="tab-container">
                <div id="tab-1" class="tab-panel active">
                    {!! $results[0]->detail !!}
                </div>
                <div id="tab-2" class="tab-panel">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ขนาด</th>
                            <th>สี</th>
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
                </div>
            </div>
        </div>
        <div class="product-slide upsell-products">
            <div class="section-title text-center"><h3>UPSELL PRODUCTS</h3></div>
            <ul class="owl-carousel" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'
                data-autoplay="true" data-loop="true" data-items="4" data-dots="false" data-nav="false"
                data-margin="30">
                <li class="product-item">
                    <div class="product-inner">
                        <div class="product-thumb">
                            <a href="#"><img src="images/products/5.jpg" alt=""></a>
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
                            <del>£95.00</del>
                        </span>
                            <a href="#" class="button">ADD TO CART</a>
                        </div>
                    </div>
                </li>
                <li class="product-item">
                    <div class="product-inner">
                        <div class="product-thumb">
                            <a href="#"><img src="images/products/6.jpg" alt=""></a>
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
                            <del>£95.00</del>
                        </span>
                            <a href="#" class="button">ADD TO CART</a>
                        </div>
                    </div>
                </li>
                <li class="product-item">
                    <div class="product-inner">
                        <div class="product-thumb">
                            <a href="#"><img src="images/products/7.jpg" alt=""></a>
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
                            <del>£95.00</del>
                        </span>
                            <a href="#" class="button">ADD TO CART</a>
                        </div>
                    </div>
                </li>
                <li class="product-item">
                    <div class="product-inner">
                        <div class="product-thumb">
                            <a href="#"><img src="images/products/8.jpg" alt=""></a>
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
                            <del>£95.00</del>
                        </span>
                            <a href="#" class="button">ADD TO CART</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div> <!--END CONTAINER-->
@endsection
@section('script')
    <script>
        function getAll(){
            color.attr('disabled',true);
            color.html('')
            color.trigger("chosen:updated");
            // $("#amount").attr('disabled',true);
            price.val(0)
            $.get( "/api/product/{{ $results[0]->id }}", function( data ) {
                details = data;
            });
            $.get("/api/product/{{ $results[0]->id }}/true",function (sizes) {
                size.html('');
                size.append($("<option>").attr('value',0).text('โปรดเลือกขนาด'));
                $(sizes).each(function() {
                    size.append($("<option>").attr('value',this.size_id).text(this.size_name));
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
                color.append($("<option>").attr('value', 0).text('โปรดเลือกสี'));
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
            })
        });
    </script>
@endsection
