<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <div class="text-center pb-1">
{{--            <img class="mt-5"--}}
{{--                src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Logo_TV_2015.svg/1200px-Logo_TV_2015.svg.png"--}}
{{--                style="height: 5rem;">--}}
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="{{ Request::is('*backend') ? 'active':'' }}">
                <a href="{{ route('backend.dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>หน้าแรก</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
            <li class="treeview {{ Request::is('*products*') ? 'active':'' }}">
                <a href="#">
                    <i class="fa fa-product-hunt"></i>
                    <span>สินค้า</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('backend.products.index') }}"><i class="fa fa-circle-o"></i> จัดการสินค้า</a>
                    </li>
                    <li><a href="{{ route('backend.catalogs.index') }}"><i class="fa fa-circle-o"></i> หมวดหมู่</a></li>
                    <li><a href="{{ route('backend.powers.index') }}"><i class="fa fa-circle-o"></i> กำลังไฟ</a></li>
                    <li><a href="{{ route('backend.sizes.index') }}"><i class="fa fa-circle-o"></i> ขนาด</a></li>
                </ul>
            </li>
            <li class="{{ Request::is('*stocks*') ? 'active':'' }}">
                <a href="{{ route('backend.stocks') }}">
                    <i class="fa fa-dashboard"></i> <span>คลังสินค้า</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
            <li class="treeview {{ Request::is('*orders*') ? 'active':'' }}">
                <a href="#">
                    <i class="fa fa-th"></i>
                    <span>คำสั่งซื้อ</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('backend.orders.index') }}"><i class="fa fa-circle-o"></i> รายการคำสั่งซื้อ</a></li>
                    <li><a href="{{ route('backend.orders.create') }}"><i class="fa fa-circle-o"></i> เพิ่มคำสั่งซื้อ</a></li>
                </ul>
            </li>
            <li class="treeview {{ Request::is('*payments*') ? 'active':'' }}">
                <a href="{{ route('backend.payments.index') }}">
                    <i class="fa fa-th"></i>
                    <span>รายการแจ้งชำระ</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('backend.payments.index') }}"><i class="fa  fa-eye"></i> ดูรายการแจ้งชำระ</a>
                    </li>
                    <li><a href="{{ route('backend.payments.create') }}"><i class="fa fa-plus-circle"></i>
                            เพิ่มรายการแจ้งชำระ</a></li>
                </ul>

            </li>
            <li class="{{ Request::is('*senders') ? 'active':'' }}">
                <a href="{{ route('backend.senders.index') }}">
                    <i class="fa fa-truck"></i> <span>วิธีการจัดส่ง</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
            <li class="{{ Request::is('*customers') ? 'active':'' }}">
                <a href="{{ route('backend.customers.index') }}">
                    <i class="fa fa-user"></i> <span>สมาชิก</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
            <li class="{{ Request::is('*reports') ? 'active':'' }}">
                <a href="{{ route('backend.reports.index') }}">
                    <i class="fa fa-warning"></i> <span>แจ้งปัญหา</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
            {{--<li class="treeview">--}}
            {{--<a href="#">--}}
            {{--<i class="fa fa-pie-chart"></i>--}}
            {{--<span>Charts</span>--}}
            {{--<span class="pull-right-container">--}}
            {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
            {{--</a>--}}
            {{--<ul class="treeview-menu">--}}
            {{--<li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>--}}
            {{--<li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>--}}
            {{--<li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>--}}
            {{--<li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>--}}
            {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="treeview">--}}
            {{--<a href="#">--}}
            {{--<i class="fa fa-laptop"></i>--}}
            {{--<span>UI Elements</span>--}}
            {{--<span class="pull-right-container">--}}
            {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
            {{--</a>--}}
            {{--<ul class="treeview-menu">--}}
            {{--<li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>--}}
            {{--<li><a href="pages/UI/cards.html"><i class="fa fa-circle-o"></i> User Cards</a></li>--}}
            {{--<li><a href="pages/UI/tab.html"><i class="fa fa-circle-o"></i> Tab</a></li>--}}
            {{--<li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>--}}
            {{--<li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>--}}
            {{--<li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>--}}
            {{--<li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>--}}
            {{--<li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>--}}
            {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="treeview">--}}
            {{--<a href="#">--}}
            {{--<i class="fa fa-edit"></i> <span>Forms</span>--}}
            {{--<span class="pull-right-container">--}}
            {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
            {{--</a>--}}
            {{--<ul class="treeview-menu">--}}
            {{--<li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>--}}
            {{--<li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a>--}}
            {{--</li>--}}
            {{--<li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>--}}
            {{--<li><a href="pages/forms/form-validation.html"><i class="fa fa-circle-o"></i> Form--}}
            {{--Validation</a></li>--}}
            {{--<li><a href="pages/forms/form-wizard.html"><i class="fa fa-circle-o"></i> Form Wizard</a></li>--}}
            {{--<li><a href="pages/forms/code-editor.html"><i class="fa fa-circle-o"></i> Code Editor</a></li>--}}
            {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="treeview">--}}
            {{--<a href="#">--}}
            {{--<i class="fa fa-table"></i> <span>Tables</span>--}}
            {{--<span class="pull-right-container">--}}
            {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
            {{--</a>--}}
            {{--<ul class="treeview-menu">--}}
            {{--<li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>--}}
            {{--<li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>--}}
            {{--</ul>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="pages/mailbox/mailbox.html">--}}
            {{--<i class="fa fa-envelope"></i> <span>Mailbox</span>--}}
            {{--<span class="pull-right-container">--}}
            {{--<small class="label pull-right bg-yellow">12</small>--}}
            {{--<small class="label pull-right bg-green">16</small>--}}
            {{--<small class="label pull-right bg-red">5</small>--}}
            {{--</span>--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--<li class="treeview">--}}
            {{--<a href="#">--}}
            {{--<i class="fa fa-map"></i> <span>Map</span>--}}
            {{--<span class="pull-right-container">--}}
            {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
            {{--</a>--}}
            {{--<ul class="treeview-menu">--}}
            {{--<li><a href="pages/map/map-google.html"><i class="fa fa-circle-o"></i> Google Map</a></li>--}}
            {{--<li><a href="pages/map/map-vector.html"><i class="fa fa-circle-o"></i> Vector Map</a></li>--}}
            {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="treeview">--}}
            {{--<a href="#">--}}
            {{--<i class="fa fa-folder"></i> <span>Sample Pages</span>--}}
            {{--<span class="pull-right-container">--}}
            {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
            {{--</a>--}}
            {{--<ul class="treeview-menu">--}}
            {{--<li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>--}}
            {{--<li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>--}}
            {{--<li><a href="pages/examples/gallery.html"><i class="fa fa-circle-o"></i> Gallery</a></li>--}}
            {{--<li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>--}}
            {{--<li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>--}}
            {{--<li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>--}}
            {{--<li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>--}}
            {{--<li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>--}}
            {{--<li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>--}}
            {{--<li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>--}}
            {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="treeview">--}}
            {{--<a href="#">--}}
            {{--<i class="fa fa-share"></i> <span>Multilevel</span>--}}
            {{--<span class="pull-right-container">--}}
            {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
            {{--</a>--}}
            {{--<ul class="treeview-menu">--}}
            {{--<li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>--}}
            {{--<li class="treeview">--}}
            {{--<a href="#"><i class="fa fa-circle-o"></i> Level One--}}
            {{--<span class="pull-right-container">--}}
            {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
            {{--</a>--}}
            {{--<ul class="treeview-menu">--}}
            {{--<li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>--}}
            {{--<li class="treeview">--}}
            {{--<a href="#"><i class="fa fa-circle-o"></i> Level Two--}}
            {{--<span class="pull-right-container">--}}
            {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
            {{--</a>--}}
            {{--<ul class="treeview-menu">--}}
            {{--<li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>--}}
            {{--<li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>--}}
            {{--</ul>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</li>--}}
            {{--<li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>--}}
            {{--</ul>--}}
            {{--</li>--}}

            {{--<li class="header">LABELS</li>--}}
            {{--<li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>--}}
            {{--<li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>--}}
            {{--<li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>--}}
        </ul>
    </section>
{{--    <!-- /.sidebar -->--}}
{{--    <div class="sidebar-footer">--}}
{{--        <!-- item-->--}}
{{--        <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Settings"><i--}}
{{--                class="fa fa-cog fa-spin"></i></a>--}}
{{--        <!-- item-->--}}
{{--        <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i--}}
{{--                class="fa fa-envelope"></i></a>--}}
{{--        <!-- item-->--}}
{{--        <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i--}}
{{--                class="fa fa-power-off"></i></a>--}}
{{--    </div>--}}
</aside>
