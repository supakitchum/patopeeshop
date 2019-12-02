<template>
    <div class="page">
        <div class="wrap-action-product-d">
            <div class="row">
                <div class="col-15">
                    <div class="content-icon">
                        <a href="#"><i class="ti-heart"></i></a>
                    </div>
                </div>
                <div class="col-15">
                    <div class="content-icon">
                        <a href="#" @click="showToastBottom" class="total-count" data-target="#cart"><i class="ti-shopping-cart"></i></a>
                    </div>
                </div>
                <div class="col-70">
                    <div class="content-button">
                        <button class="button">ซื้อเลยตอนนี้</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-content">
            <!-- link back -->
            <a href="" class="link back nav-back">
                <i class="ti-arrow-left"></i>
            </a>
            <!-- end link back -->

            <!-- product details -->
            <div class="product-details">
                <div class="header">
                    <div data-pagination='{"el": ".swiper-pagination"}' data-space-between="0"
                         class="swiper-container swiper-init swiper-container-horizontal">
                        <div class="swiper-pagination"></div>
                        <div class="swiper-wrapper">
                            @foreach($productImages as $image)
                                <div class="swiper-slide">
                                    <div class="content">
                                        <div class="mask"></div>
                                        <img src="{{ asset($image->path) }}" style="height: 500px !important;" alt="">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="wrap-content">
                    <h4>{{ $product->name }}</h4>
                    <span class="price">{{ number_format($productDetails->price,2) }} บาท</span>

                    <!-- small divider -->
                    <div class="small-divider"></div>
                    <!-- end  small divider -->

                    <div class="description-product-wrapper section-wrapper">
                        <div class="wrap-title">
                            <h3>รายละเอียด</h3>
                        </div>
                        <p>{!! $product->detail !!}</p>
                    </div>
                    <div class="information-product-wrapper section-wrapper">
                        <input type="hidden" name="aid" value="" id="aid">
                        <div class="wrap-title">
                            <h3>ข้อมูลสินค้า</h3>
                        </div>
                        <ul>
                            <li>สี
                                <span>
                                    @foreach($colors as $color)
                                        {{ $color->name.' ' }}
                                    @endforeach
                                </span>
                            </li>
                            <li>ขนาด
                                <span>
                                     @foreach($sizes as $size)
                                        {{ $size->name.' ' }}
                                    @endforeach
                                </span>
                            </li>
                            <li>มีในคลัง <span>{{ $total }} ชิ้น</span></li>
                        </ul>
                    </div>
                    <!-- small divider -->
                    <div class="small-divider"></div>
                    <!-- end  small divider -->
                    <div class="information-product-wrapper section-wrapper">
                        <div class="wrap-title">
                            <h3>คำสั่งซื้อ</h3>
                        </div>
                        <ul>
                            <li>ขนาด
                                <span>
                                    <div class="input input-dropdown" style="width: 70px;">
                                        <select name="size" id="size">
                                        </select>
                                    </div>
                                </span>
                            </li>
                            <li>สี
                                <span>
                                    <div class="input input-dropdown" style="width: 70px;">
                                        <select name="color" id="color">
                                        </select>
                                    </div>
                                </span>
                            </li>
                            <li>จำนวน
                                <span class="list">
                                    <div class="item-input-wrap" style="width: 70px;">
                                        <input type="number" min="1" value="0">
                                    </div>
                                </span>
                            </li>
                        </ul>
                    </div>
                    <!-- small divider -->
                    <div class="small-divider"></div>
                    <!-- end  small divider -->
                    <div class="share-product-wrapper">
                        <ul>
                            <li>แบ่งปัน</li>
                            <li><a href="#"><i class="ti-facebook"></i></a></li>
                            <li><a href="#"><i class="ti-twitter"></i></a></li>
                            <li><a href="#"><i class="ti-google"></i></a></li>
                        </ul>
                    </div>
                    <!-- small divider -->
                    <div class="small-divider"></div>
                    <!-- end  small divider -->
                </div>

                <div class="related-product" style="height:200px;margin-top: 10px;">
                    <div class="wrap-title">
                        <h3>สินค้าแนะนำ</h3>
                    </div>
                    <div data-space-between="10" data-slides-per-view="auto"
                         class="swiper-container swiper-init demo-swiper-auto">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="content">
                                    <img src="images/product9.jpg" alt="">
                                    <div class="text">
                                        <a href="#"><p>Casual Dress Shirt Men short Sleeves</p></a>
                                        <span class="price">$27.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="content">
                                    <img src="images/product1.jpg" alt="">
                                    <div class="text">
                                        <a href="#"><p>Original Sweater With 100% Wool Fabric</p></a>
                                        <span class="price">$30.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="content">
                                    <img src="images/product11.jpg" alt="">
                                    <div class="text">
                                        <a href="#"><p>New Style Plain Casual t-shirt</p></a>
                                        <span class="price">$21.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end product details -->
        </div>
    </div>
</template>
<script>
    return {
        methods: {
            showToastBottom: function () {
                var items = sessionStorage.getItem('shoppingCart') ? JSON.parse(sessionStorage.getItem('shoppingCart')): [];
                var message = "";
                if (!items.includes({{ $product->id }})){
                    items.push({{ $product->id }});
                    sessionStorage.setItem('shoppingCart',JSON.stringify(items));
                    message = "เพิ่มสินค้าแล้ว";
                }else{
                    message = "มีสินค้าในรถเข็นแล้ว"
                }
                var self = this;
                // Create toast
                if (!self.toastBottom) {
                    self.toastBottom = self.$app.toast.create({
                        text: message,
                        closeTimeout: 1500,
                    });
                }
                // Open it
                self.toastBottom.open();
            },
        },
        on: {
            pageBeforeOut: function () {
                var self = this;
                self.$app.toast.close();
            },
            pageBeforeRemove: function () {
                var self = this;
                // Destroy toasts when page removed
                if (self.toastBottom) self.toastBottom.destroy();
            },
        },
        mounted(){
            let details = [];
            var size = $('#size');
            var color = $('#color');
            axios.get("/api/product/{{ $product->id }}")
                .then(function (response) {
                    // handle success
                    details = response.data;
                })
            axios.get("/api/product/{{ $product->id }}/true")
                .then(function (response) {
                    let sizes = response.data
                    size.html('');
                    size.append($("<option>").attr('value',0).text('โปรดเลือกขนาด'));
                    sizes.forEach(data => {
                        size.append($("<option>").attr('value',data.size_id).text(data.size_name));
                    })
                })
            size.on('change',function () {
                var id = $('#size').val()
                detail = details.filter(function(obj) {
                    return obj.size_id == id;
                });
                color.html('');
                color.append($("<option>").attr('value',0).text('โปรดเลือกสี'));
                detail.forEach(data => {
                    color.append($("<option>").attr('value',data.color_id).text(data.color_name));
                });
            })
        }
    }
</script>
