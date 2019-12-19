<footer class="footer style3">
    <div class="footer-top">
        <div class="container">
            <div class="row flex-flow">
                <div class="col-xs-12  col-sm-12 col-md-4 footer-sidebar">
                    <div class="widget our-service">
                        <h3>หมวดหมู่</h3>
                        <div class="content">
                            <ul>
                                @foreach($catalogs as $catalog)
                                    <li><a href="/product?catalog={{ $catalog->id }}">{{ $catalog->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12  col-sm-12 col-md-4 footer-sidebar">
                    <div class="widget our-service">
                        <h3>บริการของเรา</h3>
                        <div class="content">
                            <ul>
                                <li><a href="#">เกี่ยวกับเรา</a></li>
                                <li><a href="/history">ประวัติคำสั่งซื้อ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 footer-sidebar">
                    <div class="widget contact-info">
                        <h3>ช่องทางการติดต่อ</h3>
                        <div class="fb-page"
                             data-href="https://www.facebook.com/pratoopee/"
                             data-width="380"
                             data-hide-cover="false"
                             data-show-facepile="false"></div>
                        <div class="content margin-top-10">
                            <p class="address">2 อาคารศูนย์การค้าเซ็นทรัลแอร์พอร์ต พลาซ่า ชั้น 2 ถนนมหิดล ตำบลหายยา เทศบาลนครเชียงใหม่ 50100</p>
                            <p class="phone"><i class="fa fa-phone"></i> 081-169-0901</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row flex-flow">
                <div class="col-sm-12 text-center">
                    <h5>Copyright © rock.in.th 2019</h5>
                </div>
            </div>
        </div>
    </div>
</footer>
