<div class="top-bar top-bar-v4">
    <div class="col-full">
        <!-- .nav -->
        <ul id="menu-top-bar-right" class="nav menu-top-bar-right">
            <li class="hidden-sm-down menu-item animate-dropdown">
                <a title="Track Your Order" href="/payment">
                    <i class="tm tm-dollar"></i>แจ้งชำระเงิน</a>
            </li>
            <li class="hidden-sm-down menu-item animate-dropdown">
                <a title="Track Your Order" href="/history">
                    <i class="tm tm-order-tracking"></i>ติดตามคำสั่งซื้อ</a>
            </li>
            <li class="hidden-sm-down menu-item animate-dropdown">
                <a title="Track Your Order" href="/report">
                    <i class="fa fa-warning"></i>แจ้งปัญหา</a>
            </li>
            @if(auth()->check())
                <li class="menu-item">
                    <a title="My Account" href="{{ route('profile.index') }}">
                        <i class="tm tm-login-register"></i>{{ auth()->user()->email }}</a>
                </li>
                <li class="hidden-sm-down menu-item animate-dropdown">
                    <a href="/logout">
                        <i class="fa fa-sign-out"></i>ออกจากระบบ</a>
                </li>
            @else
                <li class="menu-item">
                    <a title="My Account" href="{{ route('login') }}">
                        <i class="tm tm-login-register"></i>สมัครสมาชิก หรือ เข้าสู่ระบบ</a>
                </li>
            @endif
        </ul>
        <!-- .nav -->
    </div>
    <!-- .col-full -->
</div>
<!-- .top-bar-v2 -->
<header id="masthead" class="site-header header-v4" style="background-image: none; ">
    <div class="col-full desktop-only">
        <div class="techmarket-sticky-wrap">
            <div class="row">
                <div class="site-branding">
                    <a href="/" class="custom-logo-link" rel="home">
                        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 176 28">
                            <defs>
                                <style>
                                    .cls-1,
                                    .cls-2 {
                                        fill: #333e48;
                                    }

                                    .cls-1 {
                                        fill-rule: evenodd;
                                    }

                                    .cls-3 {
                                        fill: #3265b0;
                                    }
                                </style>
                            </defs>
                            <polygon class="cls-1" points="171.63 0.91 171.63 11 170.63 11 170.63 0.91 170.63 0.84 170.63 0.06 176 0.06 176 0.91 171.63 0.91" />
                            <rect class="cls-2" x="166.19" y="0.06" width="3.47" height="0.84" />
                            <rect class="cls-2" x="159.65" y="4.81" width="3.51" height="0.84" />
                            <polygon class="cls-1" points="158.29 11 157.4 11 157.4 0.06 158.26 0.06 158.36 0.06 164.89 0.06 164.89 0.87 158.36 0.87 158.36 10.19 164.99 10.19 164.99 11 158.36 11 158.29 11" />
                            <polygon class="cls-1" points="149.54 6.61 150.25 5.95 155.72 10.98 154.34 10.98 149.54 6.61" />
                            <polygon class="cls-1" points="147.62 10.98 146.65 10.98 146.65 0.05 147.62 0.05 147.62 5.77 153.6 0.33 154.91 0.33 147.62 7.05 147.62 10.98" />
                            <path class="cls-1" d="M156.39,24h-1.25s-0.49-.39-0.71-0.59l-1.35-1.25c-0.25-.23-0.68-0.66-0.68-0.66s0-.46,0-0.72a3.56,3.56,0,0,0,3.54-2.87,3.36,3.36,0,0,0-3.22-4H148.8V24h-1V13.06h5c2.34,0.28,4,1.72,4.12,4a4.26,4.26,0,0,1-3.38,4.34C154.48,22.24,156.39,24,156.39,24Z" transform="translate(-12 -13)" />
                            <polygon class="cls-1" points="132.04 2.09 127.09 7.88 130.78 7.88 130.78 8.69 126.4 8.69 124.42 11 123.29 11 132.65 0 133.04 0 133.04 11 132.04 11 132.04 2.09" />
                            <polygon class="cls-1" points="120.97 2.04 116.98 6.15 116.98 6.19 116.97 6.17 116.95 6.19 116.95 6.15 112.97 2.04 112.97 11 112 11 112 0 112.32 0 116.97 4.8 121.62 0 121.94 0 121.94 11 120.97 11 120.97 2.04" />
                            <ellipse class="cls-3" cx="116.3" cy="22.81" rx="5.15" ry="5.18" />
                            <rect class="cls-2" x="99.13" y="0.44" width="5.87" height="27.12" />
                            <polygon class="cls-1" points="85.94 27.56 79.92 27.56 79.92 0.44 85.94 0.44 85.94 16.86 96.35 16.86 96.35 21.84 85.94 21.84 85.94 27.56" />
                            <path class="cls-1" d="M77.74,36.07a9,9,0,0,0,6.41-2.68L88,37c-2.6,2.74-6.71,4-10.89,4A13.94,13.94,0,0,1,62.89,27.15,14.19,14.19,0,0,1,77.11,13c4.38,0,8.28,1.17,10.89,4,0,0-3.89,3.82-3.91,3.8A9,9,0,1,0,77.74,36.07Z" transform="translate(-12 -13)" />
                            <rect class="cls-2" x="37.4" y="11.14" width="7.63" height="4.98" />
                            <polygon class="cls-1" points="32.85 27.56 28.6 27.56 28.6 5.42 28.6 3.96 28.6 0.44 47.95 0.44 47.95 5.42 34.46 5.42 34.46 22.72 48.25 22.72 48.25 27.56 34.46 27.56 32.85 27.56" />
                            <polygon class="cls-1" points="15.4 27.56 9.53 27.56 9.53 5.57 9.53 0.59 9.53 0.44 24.93 0.44 24.93 5.57 15.4 5.57 15.4 27.56" />
                            <rect class="cls-2" y="0.44" width="7.19" height="5.13" />
                        </svg>
                    </a>
                    <!-- /.custom-logo-link -->
                </div>
                <!-- /.site-branding -->
                <!-- ============================================================= End Header Logo ============================================================= -->
                <div id="departments-menu" class="dropdown departments-menu">
                    <button class="btn dropdown-toggle btn-block" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="tm tm-departments-thin"></i>
                        <span>All Departments</span>
                    </button>
                    <ul id="menu-departments-menu" class="dropdown-menu yamm departments-menu-dropdown">
{{--                        <li class="highlight menu-item animate-dropdown">--}}
{{--                            <a title="สินค้ายอดนิยม" href="shop.html">สินค้ายอดนิยม</a>--}}
{{--                        </li>--}}
{{--                        <li class="highlight menu-item animate-dropdown">--}}
{{--                            <a title="สินค้ามาใหม่" href="shop.html">สินค้ามาใหม่</a>--}}
{{--                        </li>--}}
{{--                        <li class="highlight menu-item animate-dropdown">--}}
{{--                            <a title="สินค้าแนะนำ" href="shop.html">สินค้าแนะนำ</a>--}}
{{--                        </li>--}}
                        @foreach($catalogs as $catalog)
                            <li class="menu-item animate-dropdown">
                                <a title="{{ $catalog->name }}" href="{{ route('product.index',['catalog' => $catalog->id]) }}">{{ $catalog->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- .departments-menu -->
                <form class="navbar-search" method="get" action="{{ route('product.index') }}">
                    <label class="sr-only screen-reader-text" for="search">ค้นหาสินค้า</label>
                    <div class="input-group">
                        <input type="text" id="search" class="form-control search-field product-search-field" dir="ltr" value="" name="keyword" placeholder="ค้นหาสินค้า" />
                        <div class="input-group-addon search-categories popover-header">
                            <select name="catalog" id='product_cat' class='postform resizeselect'>
                                <option value='' selected='selected'>หมวดหมู่ทั้งหมด</option>
                                @foreach($catalogs as $catalog)
                                    <option class="level-0" value="{{ $catalog->id }}">{{ $catalog->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- .input-group-addon -->
                        <div class="input-group-btn input-group-append">
                            <input type="hidden" id="search-param" name="post_type" value="product" />
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-search"></i>
                                <span class="search-btn">Search</span>
                            </button>
                        </div>
                        <!-- .input-group-btn -->
                    </div>
                    <!-- .input-group -->
                </form>
                <!-- .navbar-search -->
                <ul id="site-header-cart" class="site-header-cart menu">
                    <li class="animate-dropdown dropdown ">
                        <a class="cart-contents" href="#" data-toggle="dropdown" title="View your shopping cart">
                            <i class="tm tm-shopping-bag"></i>
                            <span class="count total-count"></span>
                            <span class="amount">
                                            <span class="price-label">ตะกร้าสินค้า</span><span class="total-cart"></span> บาท</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-mini-cart">
                            <li>
                                <div class="widget woocommerce widget_shopping_cart">
                                    <div class="widget_shopping_cart_content">
                                        <ul class="woocommerce-mini-cart cart_list product_list_widget show-cart">
                                            <li class="woocommerce-mini-cart-item mini_cart_item">
                                                <a href="#" class="remove" aria-label="Remove this item" data-product_id="65" data-product_sku="">×</a>
                                                <a href="single-product-sidebar.html">
                                                    <img src="assets/images/products/mini-cart1.jpg" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="">XONE Wireless Controller&nbsp;
                                                </a>
                                                <span class="quantity">1 ×
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span class="woocommerce-Price-currencySymbol">$</span>64.99</span>
                                                            </span>
                                            </li>
                                        </ul>
                                        <!-- .cart_list -->
                                        <p class="woocommerce-mini-cart__total total">
                                            <strong>ราคารวม :</strong>
                                            <span class="woocommerce-Price-amount amount">
                                                            <span class="total-cart"></span> บาท</span>
                                        </p>
                                        <p class="woocommerce-mini-cart__buttons buttons">
                                            <a href="/checkout" class="button checkout wc-forward">ชำระเงิน</a>
                                        </p>
                                    </div>
                                    <!-- .widget_shopping_cart_content -->
                                </div>
                                <!-- .widget_shopping_cart -->
                            </li>
                        </ul>
                        <!-- .dropdown-menu-mini-cart -->
                    </li>
                </ul>
                <!-- .site-header-cart -->
            </div>
            <!-- /.row -->
        </div>
        <!-- .techmarket-sticky-wrap -->
    </div>
    <!-- .col-full -->
    <div class="col-full handheld-only">
        <div class="handheld-header">
            <div class="row">
                <div class="site-branding">
                    <a href="/" class="custom-logo-link" rel="home">
                        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 176 28">
                            <defs>
                                <style>
                                    .cls-1,
                                    .cls-2 {
                                        fill: #333e48;
                                    }

                                    .cls-1 {
                                        fill-rule: evenodd;
                                    }

                                    .cls-3 {
                                        fill: #3265b0;
                                    }
                                </style>
                            </defs>
                            <polygon class="cls-1" points="171.63 0.91 171.63 11 170.63 11 170.63 0.91 170.63 0.84 170.63 0.06 176 0.06 176 0.91 171.63 0.91" />
                            <rect class="cls-2" x="166.19" y="0.06" width="3.47" height="0.84" />
                            <rect class="cls-2" x="159.65" y="4.81" width="3.51" height="0.84" />
                            <polygon class="cls-1" points="158.29 11 157.4 11 157.4 0.06 158.26 0.06 158.36 0.06 164.89 0.06 164.89 0.87 158.36 0.87 158.36 10.19 164.99 10.19 164.99 11 158.36 11 158.29 11" />
                            <polygon class="cls-1" points="149.54 6.61 150.25 5.95 155.72 10.98 154.34 10.98 149.54 6.61" />
                            <polygon class="cls-1" points="147.62 10.98 146.65 10.98 146.65 0.05 147.62 0.05 147.62 5.77 153.6 0.33 154.91 0.33 147.62 7.05 147.62 10.98" />
                            <path class="cls-1" d="M156.39,24h-1.25s-0.49-.39-0.71-0.59l-1.35-1.25c-0.25-.23-0.68-0.66-0.68-0.66s0-.46,0-0.72a3.56,3.56,0,0,0,3.54-2.87,3.36,3.36,0,0,0-3.22-4H148.8V24h-1V13.06h5c2.34,0.28,4,1.72,4.12,4a4.26,4.26,0,0,1-3.38,4.34C154.48,22.24,156.39,24,156.39,24Z" transform="translate(-12 -13)" />
                            <polygon class="cls-1" points="132.04 2.09 127.09 7.88 130.78 7.88 130.78 8.69 126.4 8.69 124.42 11 123.29 11 132.65 0 133.04 0 133.04 11 132.04 11 132.04 2.09" />
                            <polygon class="cls-1" points="120.97 2.04 116.98 6.15 116.98 6.19 116.97 6.17 116.95 6.19 116.95 6.15 112.97 2.04 112.97 11 112 11 112 0 112.32 0 116.97 4.8 121.62 0 121.94 0 121.94 11 120.97 11 120.97 2.04" />
                            <ellipse class="cls-3" cx="116.3" cy="22.81" rx="5.15" ry="5.18" />
                            <rect class="cls-2" x="99.13" y="0.44" width="5.87" height="27.12" />
                            <polygon class="cls-1" points="85.94 27.56 79.92 27.56 79.92 0.44 85.94 0.44 85.94 16.86 96.35 16.86 96.35 21.84 85.94 21.84 85.94 27.56" />
                            <path class="cls-1" d="M77.74,36.07a9,9,0,0,0,6.41-2.68L88,37c-2.6,2.74-6.71,4-10.89,4A13.94,13.94,0,0,1,62.89,27.15,14.19,14.19,0,0,1,77.11,13c4.38,0,8.28,1.17,10.89,4,0,0-3.89,3.82-3.91,3.8A9,9,0,1,0,77.74,36.07Z" transform="translate(-12 -13)" />
                            <rect class="cls-2" x="37.4" y="11.14" width="7.63" height="4.98" />
                            <polygon class="cls-1" points="32.85 27.56 28.6 27.56 28.6 5.42 28.6 3.96 28.6 0.44 47.95 0.44 47.95 5.42 34.46 5.42 34.46 22.72 48.25 22.72 48.25 27.56 34.46 27.56 32.85 27.56" />
                            <polygon class="cls-1" points="15.4 27.56 9.53 27.56 9.53 5.57 9.53 0.59 9.53 0.44 24.93 0.44 24.93 5.57 15.4 5.57 15.4 27.56" />
                            <rect class="cls-2" y="0.44" width="7.19" height="5.13" />
                        </svg>
                    </a>
                    <!-- /.custom-logo-link -->
                </div>
                <!-- /.site-branding -->
                <!-- ============================================================= End Header Logo ============================================================= -->
                <div class="handheld-header-links">
                    <ul class="columns-3">
                        <li class="my-account">
                            @if(auth()->check())
                                <a href="{{ route('profile.index') }}" class="has-icon">
                                    <i class="tm tm-login-register"></i>
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="has-icon">
                                    <i class="tm tm-login-register"></i>
                                </a>
                            @endif
                        </li>
                        <li>
                            <a href="{{ route('payment') }}" class="has-icon">
                                <i class="tm tm-dollar"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('history') }}" class="has-icon">
                                <i class="tm tm-order-tracking"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- .columns-3 -->
                </div>
                <!-- .handheld-header-links -->
            </div>
            <!-- /.row -->
            <div class="techmarket-sticky-wrap">
                <div class="row">
                    <nav id="handheld-navigation" class="handheld-navigation" aria-label="Handheld Navigation">
                        <button class="btn navbar-toggler" type="button">
                            <i class="tm tm-departments-thin"></i>
                            <span>Menu</span>
                        </button>
                        <div class="handheld-navigation-menu">
                            <span class="tmhm-close"></span>
                            <ul id="menu-departments-menu-1" class="nav">
                                <li class="highlight menu-item animate-dropdown">
                                    <a title="สินค้ายอดนิยม" href="shop.html">สินค้ายอดนิยม</a>
                                </li>
                                <li class="highlight menu-item animate-dropdown">
                                    <a title="สินค้ามาใหม่" href="shop.html">สินค้ามาใหม่</a>
                                </li>
                                <li class="highlight menu-item animate-dropdown">
                                    <a title="สินค้าแนะนำ" href="shop.html">สินค้าแนะนำ</a>
                                </li>
                                @foreach($catalogs as $catalog)
                                    <li class="menu-item animate-dropdown">
                                        <a title="{{ $catalog->name }}" href="{{ route('product.index',['catalog' => $catalog->id]) }}">{{ $catalog->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- .handheld-navigation-menu -->
                    </nav>
                    <!-- .handheld-navigation -->
                    <div class="site-search">
                        <div class="widget woocommerce widget_product_search">
                            <form role="search" method="get" class="woocommerce-product-search" action="{{ route('product.index') }}">
                                <label class="screen-reader-text" for="woocommerce-product-search-field-0">Search for:</label>
                                <input type="search" id="woocommerce-product-search-field-0" class="search-field" placeholder="ค้นหาสินค้า" value="" name="keyword" />
                                <input type="submit" value="Search" />
                                <input type="hidden" name="post_type" value="product" />
                            </form>
                        </div>
                        <!-- .widget -->
                    </div>
                    <!-- .site-search -->
                    <a class="handheld-header-cart-link has-icon" href="#" data-toggle="dropdown" title="View your shopping cart">
                        <i class="tm tm-shopping-bag"></i>
                        <span class="count total-count"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-mini-cart transform-0" style="width: 100vw;">
                        <li>
                            <div class="widget woocommerce widget_shopping_cart">
                                <div class="widget_shopping_cart_content">
                                    <ul class="woocommerce-mini-cart cart_list product_list_widget show-cart">
                                    </ul>
                                    <!-- .cart_list -->
                                    <p class="woocommerce-mini-cart__total total">
                                        <strong>ราคารวม :</strong>
                                        <span class="woocommerce-Price-amount amount">
                                                            <span class="total-cart"></span> บาท</span>
                                    </p>
                                    <p class="woocommerce-mini-cart__buttons buttons">
                                        <a href="/checkout" class="button checkout wc-forward">ชำระเงิน</a>
                                    </p>
                                </div>
                                <!-- .widget_shopping_cart_content -->
                            </div>
                            <!-- .widget_shopping_cart -->
                        </li>
                    </ul>
                    <!-- .dropdown-menu-mini-cart -->
                </div>
                <!-- /.row -->
            </div>
            <!-- .techmarket-sticky-wrap -->
        </div>
        <!-- .handheld-header -->
    </div>
    <!-- .handheld-only -->
</header>
<!-- .header-v4 -->
