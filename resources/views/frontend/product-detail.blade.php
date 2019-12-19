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
                                 data-loop="true" data-items="{{ sizeof($images) }}" data-dots="false" data-nav="true">
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
                                คงเหลือ : <span id="quality"> {{ $results[0]->quality }}</span>
                                <span>สถานะ : <span id="status"
                                        class="{{ $results[0]->quality > 0 ? 'text-success':'text-danger' }}">{{ $results[0]->quality > 0 ? 'มีสินค้าในคลัง':'สินค้าหมดชั่วคราว' }}</span></span>
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
                                <a class="button button-add-cart" onclick="add_item()" style="margin-left: 10px;" data-quantity="1">เพิ่มลงรถเข็นของฉัน</a>
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
                $('#price').html(detail[0].price)
                $('#quality').html(detail[0].quality)
            })
        });
    </script>
@endsection
