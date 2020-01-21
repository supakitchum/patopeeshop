<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <div class="text-center pb-1">
            <img class="mt-5"
                src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Logo_TV_2015.svg/1200px-Logo_TV_2015.svg.png"
                style="height: 5rem;">
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
            <li class="treeview {{ Request::is('*products*') || Request::is('*catalogs*') || Request::is('*sizes*') || Request::is('*powers*') ? 'active':'' }}">
                <a href="#">
                    <i class="fa fa-product-hunt"></i>
                    <span>สินค้า</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('*products*') ? 'active':''}}"><a href="{{ route('backend.products.index') }}"><i class="fa fa-circle-o"></i> จัดการสินค้า</a>
                    </li>
                    <li class="{{ Request::is('*catalogs*') ? 'active':''}}"><a href="{{ route('backend.catalogs.index') }}"><i class="fa fa-circle-o"></i> หมวดหมู่</a></li>
                    <li class="{{ Request::is('*powers*') ? 'active':''}}"><a href="{{ route('backend.powers.index') }}"><i class="fa fa-circle-o"></i> กำลังไฟ</a></li>
                    <li class="{{ Request::is('*sizes*') ? 'active':''}}"><a href="{{ route('backend.sizes.index') }}"><i class="fa fa-circle-o"></i> ขนาด</a></li>
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
                    <li class="{{ Request::is('*orders') && !Request::is('*orders/create') ? 'active':''}}"><a href="{{ route('backend.orders.index') }}"><i class="fa fa-circle-o"></i> รายการคำสั่งซื้อ</a></li>
                    <li class="{{ Request::is('*orders/create') ? 'active':''}}"><a href="{{ route('backend.orders.create') }}"><i class="fa fa-circle-o"></i> เพิ่มคำสั่งซื้อ</a></li>
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
                    <li class="{{ Request::is('*payments*') && !Request::is('*payments/create') ? 'active':''}}"><a href="{{ route('backend.payments.index') }}"><i class="fa  fa-eye"></i> ดูรายการแจ้งชำระ</a>
                    </li>
                    <li class="{{ Request::is('*payments/create') ? 'active':''}}"><a href="{{ route('backend.payments.create') }}"><i class="fa fa-plus-circle"></i>
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
        </ul>
    </section>
</aside>
