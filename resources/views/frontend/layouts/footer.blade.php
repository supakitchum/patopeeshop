<footer class="site-footer footer-v1">
    <div class="col-full">
        <div class="before-footer-wrap">
            <div class="col-full">
                <div class="footer-social-icons">
                    <ul class="social-icons nav">
                        <li class="nav-item">
                            <a class="sm-icon-label-link nav-link" href="https://www.facebook.com/Solardoi/">
                                <i class="fa fa-facebook"></i> Solar nature tech</a>
                        </li>
                        <li class="nav-item">
                            <a class="sm-icon-label-link nav-link" href="#">
                                Line : @SOLARDOI</a>
                        </li>
                    </ul>
                </div>
                <!-- .footer-social-icons -->
            </div>
            <!-- .col-full -->
        </div>
        <!-- .before-footer-wrap -->
        <div class="footer-widgets-block">
            <div class="row">
                <div class="col-sm-12 col-md-4 text-center mb-3">
                    <div class="widget clearfix">
                        <div class="body">
                            <h2 class="widget-title"><b>หมวดหมู่</b></h2>
                            <div class="menu-footer-menu-3-container">
                                <ul id="menu-footer-menu-3" class="menu">
                                    @foreach($catalogs as $index=>$catalog)
                                        <li class="menu-item">
                                            <a href="{{ route('product.index',['catalog' => $catalog->id]) }}">{{ $catalog->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- .media-body -->
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 text-center">
                    <div class="text-center">
                        <div class="footer-contact-info">
                            <div class="media">
                                <div class="media-body text-center">
                                    <h2 class="call-us-title">ติดต่อเรา</h2><br>
                                    <div class="fb-page" data-href="https://www.facebook.com/Solardoi/" data-tabs="" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Solardoi/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Solardoi/">Solar nature tech</a></blockquote></div><br>
                                    <span class="call-us-text"><i class="fa fa-phone-square"></i> 090-980-3053 , 052-010-379</span>
                                    <address class="footer-contact-address">28/12 ต.ต้นเปา อ.สันกำแพง จ.เชียงใหม่ 50130
                                        เยื้องตลาดเจริญ เจริญ
                                    </address>
                                </div>
                                <!-- .media-body -->
                            </div>
                            <!-- .media -->
                        </div>
                        <!-- .footer-contact-info -->
                    </div>
                    <!-- .contact-payment-wrap -->
                </div>
                <div class="col-sm-12 col-md-4 text-center">
                    <aside class="widget clearfix">
                        <div class="body">
                            <h2 class="widget-title"><b>ส่วนดูแลลูกค้า</b></h2>
                            <div class="menu-footer-menu-3-container">
                                <ul id="menu-footer-menu-3" class="menu">
                                    <li class="menu-item">
                                        <a href="{{ route('profile.index') }}">บัญชีของฉัน</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{ route('history') }}">ติดตามคำสั่งซื้อ</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{ route('product.index') }}">ดูสินค้า</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{ route('payment') }}">แจ้งชำระเงิน</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{ route('report.index') }}">แจ้งปัญหา</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- .menu-footer-menu-3-container -->
                        </div>
                        <!-- .body -->
                    </aside>
                    <!-- .widget -->
                </div>
            </div>
            <!-- .row -->
        </div>
        <!-- .footer-widgets-block -->
        <div class="site-info">
            <div class="col-full">
                <div class="copyright">Copyright &copy; 2020 <a
                        href="https://www.solarnature.co.th">Solarnature.co.th</a></div>
                <!-- .copyright -->
            </div>
            <!-- .col-full -->
        </div>
        <!-- .site-info -->
    </div>
    <!-- .col-full -->
</footer>
<!-- .site-footer -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v5.0&appId=260246377791645&autoLogAppEvents=1"></script>
