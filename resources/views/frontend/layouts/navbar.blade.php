<div id="box-mobile-menu" class="box-mobile-menu full-height full-width">
    <div class="box-inner">
        <span class="close-menu"><span class="icon pe-7s-close"></span></span>
    </div>
</div>
<div id="header-ontop" class="is-sticky"></div>
<header id="header" class="header style3">
    <div class="container">
        <div class="topbar">
            <ul class="boutique-nav topbar-menu left">
                <li><a href="#"><i class="fa fa-phone"></i>Call Us: +98 765 432</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i>info@demo.com</a></li>
            </ul>
            <ul class="boutique-nav topbar-menu right">
                @isset(auth()->user()->id)
                    <li class="menu-item-has-children">
                        <a href="#"><i class="fa fa-user"></i> {{ auth()->user()->email }}</a>
                        <ul class="sub-menu">
                            <li><a href="#"><i class="fa fa-heart"></i><span>รายการที่ชื่นชอบ</span></a></li>
                            <li><a href="{{ route('profile.index') }}"><i class="fa fa-user" aria-hidden="true"></i><span> บัญชีของฉัน</span></a></li>
                            <li><a href="#"><i class="fa fa-money"></i><span>แจ้งชำระเงิน</span></a></li>
                            <li><a href="#"><i class="fa fa-list"></i><span>ประวัติการสั่งซื้อ</span></a></li>
                            <li><a href="/logout"><i class="fa fa-sign-out"></i><span>ออกจากระบบ</span></a></li>
                        </ul>
                    </li>
                @else
                    <li class="menu-item">
                        <a href="#" data-toggle="modal"  data-target="#loginModal">เข้าสู่ระบบ | สมัครสมาชิก</a>
                    </li>
                @endisset
            </ul>
        </div>
        <div class="main-menu-wapper">
            <div class="row">
                <div class="col-sm-12 col-md-3 logo-wapper">
                    <div class="logo">
                        <a href="#"><img src="images/logos/1.png" alt=""></a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9 menu-wapper">
                    <div class="top-header">
                        <span class="mobile-navigation"><i class="fa fa-bars"></i></span>
                        <div class="slogan">"Boutique is a reflection of you!"</div>
                        <div class="box-control">
                            <form class="box-search">
                                <div class="inner">
                                    <input type="text" class="search" placeholder="Search here...">
                                    <button class="button-search"><span class="pe-7s-search"></span></button>
                                </div>
                            </form>
                            <div class="mini-cart">
                                <a class="cart-link" href="#"><span class="icon pe-7s-cart"></span> <span class="count total-count"></span>
                                    <span class="total-cart"></span> บาท</a>
                                <div class="show-shopping-cart">
                                    <h3 class="title">คุณมีสินค้า (<span class="total-count"></span> ชิ้น) ในรถเข็น
                                    </h3>
                                    <ul class="list-product show-cart">
                                    </ul>
                                    <div class="sub-total">
                                        ราคารวม : <span class="total-cart"></span> บาท
                                    </div>
                                    <div class="group-button">
                                        <a href="#" class="button">ตะกร้าสินค้า</a>
                                        <a href="/checkout" class="check-out button">ชำระเงิน</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="boutique-nav main-menu clone-main-menu">
                        <li class="active menu-item-has-children item-megamenu">
                            <a href="/">หน้าแรก</a>
{{--                            <div style="width:500px;" class="sub-menu megamenu">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-sm-4">--}}
{{--                                        <div class="mega-custom-menu">--}}
{{--                                            <ul>--}}
{{--                                                <li><a href="index.html">Home Version 01</a></li>--}}
{{--                                                <li><a href="index2.html">Home Version 02</a></li>--}}
{{--                                                <li><a href="index3.html">Home Version 03</a></li>--}}
{{--                                                <li><a href="index4.html">Home Version 04</a></li>--}}
{{--                                                <li><a href="index5.html">Home Version 05</a></li>--}}
{{--                                                <li><a href="index6.html">Home Version 06</a></li>--}}
{{--                                                <li><a href="index7.html">Home Version 07</a></li>--}}

{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-sm-4">--}}
{{--                                        <div class="mega-custom-menu">--}}
{{--                                            <ul>--}}
{{--                                                <li><a href="index8.html">Home Version 08</a></li>--}}
{{--                                                <li><a href="index9.html">Home Version 09</a></li>--}}
{{--                                                <li><a href="index10.html">Home Version 10</a></li>--}}
{{--                                                <li><a href="index11.html">Home Version 11</a></li>--}}
{{--                                                <li><a href="index12.html">Home Version 12</a></li>--}}
{{--                                                <li><a href="index13.html">Home Version 13</a></li>--}}
{{--                                                <li><a href="index14.html">Home Version 14</a></li>--}}

{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-sm-4">--}}
{{--                                        <div class="mega-custom-menu">--}}
{{--                                            <ul>--}}
{{--                                                <li><a href="index15.html">Home Version 15</a></li>--}}
{{--                                                <li><a href="index16.html">Home Version 16</a></li>--}}
{{--                                                <li><a href="index17.html">Home Version 17</a></li>--}}
{{--                                                <li><a href="index18.html">Home Version 18</a></li>--}}
{{--                                                <li><a href="index19.html">Home Version 19</a></li>--}}
{{--                                                <li><a href="index20.html">Home Version 20</a></li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </li>
{{--                        <li class="menu-item-has-children">--}}
{{--                            <a href="#">Pages</a>--}}
{{--                            <span class="arow"></span>--}}
{{--                            <ul class="sub-menu">--}}
{{--                                <li><a href="about.html">About Us</a></li>--}}
{{--                                <li><a href="contact.html">Contact Us</a></li>--}}
{{--                                <li><a href="cart.html">Cart</a></li>--}}
{{--                                <li><a href="checkout.html">Checkout</a></li>--}}
{{--                                <li><a href="wishlist.html">wishlist</a></li>--}}
{{--                                <li><a href="lookbook.html">Lookbook</a></li>--}}
{{--                                <li><a href="404.html">404 page</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
                        <li class="menu-item-has-children item-megamenu">
                            <a href="#">สินค้า</a>
                            <div style="width:820px; background-image:url('images/bg-megamenu.png'); "
                                 class="sub-menu megamenu megamenu-bg">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="mega-custom-menu">
                                            <h2 class="title">หมวดหมู่</h2>
                                            <ul>
                                                @foreach($catalogs as $catalog)
                                                    <li><a href="#">{{ $catalog->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="mega-custom-menu">
                                            <h2 class="title">PRODUCT</h2>
                                            <ul>
                                                <li><a href="product-1.html">Product Simple</a></li>
                                                <li><a href="product-2.html">Out of Stock</a></li>
                                                <li><a href="product-3.html">Product Fullwidth</a></li>
                                                <li><a href="product-4.html">Product Left Sidebar</a></li>
                                                <li><a href="product-5.html">External/Affiliate product</a></li>
                                                <li><a href="product-6.html">Grouped product</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="menu-item-has-children item-megamenu">
                            <a href="#">เกี่ยวกับเรา</a>
                            <div style="width:1500px;" class="sub-menu megamenu">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="element-icon">
                                            <div class="icon"><img src="images/icons/icon-custom.png" alt=""></div>
                                            <div class="content">
                                                <h4 class="title">EASY CUSTOMIZE</h4>
                                                <div class="text"><p>Maecenas sit amet lectus vulputate, tristique mi a,
                                                        lobortis erat. Nunc quis malesuada urna. Ut in blandit diam. Sed
                                                        diam sem, imperdiet id enim blandit, vehicula blandit
                                                        libero.</p></div>
                                            </div>
                                        </div>
                                        <div class="element-icon">
                                            <div class="icon"><img src="images/icons/icon-color.png" alt=""></div>
                                            <div class="content">
                                                <h4 class="title">UNLIMITED COLOR</h4>
                                                <div class="text"><p>Maecenas sit amet lectus vulputate, tristique mi a,
                                                        lobortis erat. Nunc quis malesuada urna. Ut in blandit diam. Sed
                                                        diam sem, imperdiet id enim blandit, vehicula blandit
                                                        libero.</p></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="element-icon">
                                            <div class="icon"><img src="images/icons/icon-responsive.png" alt=""></div>
                                            <div class="content">
                                                <h4 class="title">RESPONSIVE DESIGN</h4>
                                                <div class="text"><p>Maecenas sit amet lectus vulputate, tristique mi a,
                                                        lobortis erat. Nunc quis malesuada urna. Ut in blandit diam. Sed
                                                        diam sem, imperdiet id enim blandit, vehicula blandit
                                                        libero.</p></div>
                                            </div>
                                        </div>
                                        <div class="element-icon">
                                            <div class="icon"><img src="images/icons/icon-document.png" alt=""></div>
                                            <div class="content">
                                                <h4 class="title">EASY DOCUMENT</h4>
                                                <div class="text"><p>Maecenas sit amet lectus vulputate, tristique mi a,
                                                        lobortis erat. Nunc quis malesuada urna. Ut in blandit diam. Sed
                                                        diam sem, imperdiet id enim blandit, vehicula blandit
                                                        libero.</p></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="blogs.html">แจ้งปัญหา</a>
{{--                            <ul class="sub-menu">--}}
{{--                                <li><a href="blogs.html">Blog List</a></li>--}}
{{--                                <li><a href="blogpost.html">Blog Single</a></li>--}}
{{--                            </ul>--}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

