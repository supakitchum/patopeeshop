<div class="page">
    <div class="navbar navbar-page">
        <div class="navbar-inner sliding">
            <div class="left">
                <a href="#" class="link back">
                    <i class="ti-arrow-left"></i>
                </a>
            </div>
            <div class="title">
                ชำระเงิน
            </div>
        </div>
    </div>

    <div class="wrap-action-checkout">
        <div class="row">
            <div class="col-60">
                <div class="content-button">
                    <a href="/checkout/" class="button">ชำระเงิน</a>
                </div>
            </div>
            <div class="col-40">
                <div class="content-total">
                    <h6>ราคารวม : <span>194.00 บาท</span></h6>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <!-- checkout -->
        <div class="checkout segments-page">
            <div class="container">
                <form class="list">
                    <div class="item-input-wrap">
                        <input type="text" placeholder="ชื่อ*" required>
                    </div>
                    <div class="item-input-wrap">
                        <input type="text" placeholder="นามสกุล*" required>
                    </div>
                    <div class="item-input-wrap">
                        <input type="email" placeholder="อีเมล*" required>
                    </div>
                    <div class="item-input-wrap">
                        <input type="text" placeholder="เบอร์โทรศัพท์*" required>
                    </div>
                    <div class="item-input-wrap">
                        <input type="text" placeholder="ที่อยู่*" required>
                    </div>
                    <div class="item-input-wrap input-dropdown-wrap">
                        <select id="input_province" onchange="showAmphoes()">
                            <option value="" disabled selected>จังหวัด</option>
                        </select>
                    </div>
                    <div class="item-input-wrap input-dropdown-wrap">
                        <select id="input_amphoe" onchange="showDistricts()">
                            <option value="">กรุณาเลือกอำเภอ</option>
                        </select>
                    </div>
                    <div class="item-input-wrap input-dropdown-wrap">
                        <select id="input_district" onchange="showZipcode()">
                            <option value="">กรุณาเลือกตำบล</option>
                        </select>
                    </div>
                    <div class="item-input-wrap">
                        <input type="number" id="input_zipcode" placeholder="รหัสไปรษณีย์" required>
                    </div>
                </form>

                <!-- small divider -->
                <div class="small-divider"></div>
                <!-- end  small divider -->

                <div class="wrap-content">
                    <div class="list">
                        <ul>
                            <li class="swipeout">
                                <div class="item-content swipeout-content">
                                    <div class="row">
                                        <div class="col-30">
                                            <img src="images/product1.jpg" alt="">
                                        </div>
                                        <div class="col-50">
                                            <a href="/product-details/"><p>Original Sweater With 100% Wool Fabric</p></a>
                                        </div>
                                        <div class="col-20">
                                            <span class="price">$30.00</span>
                                            <form class="list">
                                                <div class="item-input-wrap">
                                                    <input type="number" value="1">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="swipeout-actions-right">
                                    <a href="#" class="swipeout-delete"><i class="ti-trash"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- small divider -->
                <div class="small-divider"></div>
                <!-- end  small divider -->

                <div class="wrap-content">
                    <div class="list">
                        <ul>
                            <li class="swipeout">
                                <div class="item-content swipeout-content">
                                    <div class="row">
                                        <div class="col-30">
                                            <img src="images/product12.jpg" alt="">
                                        </div>
                                        <div class="col-50">
                                            <a href="/product-details/"><p>Running Watches for Men in a Modern Style</p></a>
                                        </div>
                                        <div class="col-20">
                                            <span class="price">$60.00</span>
                                            <form class="list">
                                                <div class="item-input-wrap">
                                                    <input type="number" value="1">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="swipeout-actions-right">
                                    <a href="#" class="swipeout-delete"><i class="ti-trash"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- small divider -->
                <div class="small-divider"></div>
                <!-- end  small divider -->

                <!-- payment method wrapper -->
                <div class="payment-method-wrapper">
                    <div class="wrap-title">
                        <h3>วิธีชำระเงิน</h3>
                    </div>
                    <div class="list">
                        <ul>
                            <li>
                                <label class="inpout-radio item-content">
                                    <input type="radio" name="my-radio" value="radio-1">
                                    <div class="item-inner">
                                        <div class="item-title">โอนผ่านธนาคาร</div>
                                    </div>
                                </label>
                            </li>
                            <li>
                                <label class="inpout-radio item-content">
                                    <input type="radio" name="my-radio" value="radio-1">
                                    <div class="item-inner">
                                        <div class="item-title">Internet Banking</div>
                                    </div>
                                </label>
                            </li>
                            <li>
                                <label class="inpout-radio item-content">
                                    <input type="radio" name="my-radio" value="radio-1">
                                    <div class="item-inner">
                                        <div class="item-title">เก็บเงินปลายทาง</div>
                                    </div>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- end payment method wrapper -->

            </div>
        </div>
        <!-- end checkout -->
    </div>
</div>
