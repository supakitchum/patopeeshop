<div id="box-mobile-menu" class="box-mobile-menu full-height full-width">
    <div class="box-inner">
        <span class="close-menu"><span class="icon pe-7s-close"></span></span>
    </div>
</div>
<div id="header-ontop" class="is-sticky"></div>
<header id="header" class="header style3">
    <div class="container">
        <div class="d-none d-lg-table topbar">
            <ul class="boutique-nav topbar-menu left">
                <li><a href="#"><i class="fa fa-phone"></i>เบอร์โทร. : 081-169-0901</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i>info@demo.com</a></li>
            </ul>
            <ul class="boutique-nav topbar-menu right">
                @isset(auth()->user()->id)
                    <li class="menu-item-has-children">
                        <a href="#"><i class="fa fa-user"></i> {{ auth()->user()->email }}</a>
                        <ul class="sub-menu">
                            <li><a href="/history"><i class="fa fa-list"></i><span>ประวัติการสั่งซื้อ</span></a></li>
                            <li><a href="{{ route('profile.index') }}"><i class="fa fa-user"
                                                                          aria-hidden="true"></i><span> บัญชีของฉัน</span></a>
                            </li>
                            <li><a href="/payment"><i class="fa fa-money"></i><span>แจ้งชำระเงิน</span></a></li>
                            <li><a href="/logout"><i class="fa fa-sign-out"></i><span>ออกจากระบบ</span></a></li>
                        </ul>
                    </li>
                @else
                    <li class="menu-item">
                        <a href="#" data-toggle="modal" data-target="#loginModal">เข้าสู่ระบบ | สมัครสมาชิก</a>
                    </li>
                @endisset
            </ul>
        </div>
        <div class="main-menu-wapper">
            <div class="row">
                <div class="col-sm-12 col-md-3 logo-wapper">
                </div>
                <div class="col-sm-12 col-md-9 menu-wapper">
                    <div class="top-header">
                        <span class="mobile-navigation"><i class="fa fa-bars"></i></span>

{{--                        <div class="slogan">"ประตูผี"</div>--}}
                        <div class="box-control">
                            <form class="box-search" method="get" action="/product">
                                <div class="inner">
                                    <input type="text" class="search" name="keyword" value="{{ isset(request()->keyword) ? request()->keyword:'' }}" placeholder="ค้นหาสินค้า">
                                    <button class="button-search"><span class="pe-7s-search"></span></button>
                                </div>
                            </form>
                            <div class="mini-cart d-md-block d-lg-none text-center">
                                <ul class="boutique-nav topbar-menu right">
                                    @isset(auth()->user()->id)
                                        <li class="menu-item-has-children">
                                            <a href="#"><i class="fa fa-fw fa-user fa-2x" style="margin-right: -10px;margin-bottom: -15px;"></i></a>
                                            <ul class="sub-menu">
                                                <li><a href="/history"><i class="fa fa-list"></i><span>ประวัติการสั่งซื้อ</span></a></li>
                                                <li><a href="{{ route('profile.index') }}"><i class="fa fa-user"
                                                                                              aria-hidden="true"></i><span> บัญชีของฉัน</span></a>
                                                </li>
                                                <li><a href="/payment"><i class="fa fa-money"></i><span>แจ้งชำระเงิน</span></a></li>
                                                <li><a href="/logout"><i class="fa fa-sign-out"></i><span>ออกจากระบบ</span></a></li>
                                            </ul>
                                        </li>
                                    @else
                                        <li class="menu-item">
                                            <a class="cart-link" data-toggle="modal" data-target="#loginModal">
                                                <span class="icon pe-7s-user"></span>
                                            </a>
                                        </li>
                                    @endisset
                                </ul>
                            </div>
                            <div class="mini-cart">
                                <a class="cart-link" href="#"><span class="icon pe-7s-cart"></span> <span
                                        class="count total-count"></span>
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
{{--                                        <a href="#" class="button">ตะกร้าสินค้า</a>--}}
                                        <a href="/checkout" class="check-out button">ชำระเงิน</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="boutique-nav main-menu clone-main-menu">
                        <li class="{{ Request::is('/') ? 'active':'' }} menu-item-has-children item-megamenu">
                            <a href="/">หน้าแรก</a>
                        </li>
                        <li class="{{ Request::is('*product*') ? 'active':'' }} menu-item-has-children item-megamenu">
                            <a href="{{ route('product.index') }}">สินค้า</a>
                            <div style="width:820px; background-image:url('images/bg-megamenu.png'); "
                                 class="sub-menu megamenu megamenu-bg">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="mega-custom-menu">
                                            <h2 class="title">หมวดหมู่</h2>
                                            <ul>
                                                @foreach($catalogs as $catalog)
                                                    <li><a href="{{ route('product.index',['catalog' => $catalog->id]) }}">{{ $catalog->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="mega-custom-menu">
                                            <h2 class="title">สินค้าที่มี</h2>
                                            <ul>
                                                @foreach($products_nav as $product)
                                                    <li><a href="{{ route('product.show',['id' => $product->id]) }}">{{ $product->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="menu-item-has-children item-megamenu">
                            <a href="#">เกี่ยวกับเรา</a>
                        </li>
                        <li class="{{ Request::is('*report*') ? 'active':'' }} menu-item-has-children">
                            <a href="{{ route('report.index') }}">แจ้งปัญหา</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

