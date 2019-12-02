<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">MAX</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>mínimo</b>admin</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <p>สวัสดี {{ auth()->user()->fname." ".auth()->user()->lname }}</p>
                    </a>
                    <ul class="dropdown-menu scale-up">
                        <!-- User image -->
                        <li>
                            <p>
                                {{ auth()->user()->fname." ".auth()->user()->lname }}
                                <small class="mb-5">{{ auth()->user()->email }}</small>
                                {{--<a href="#" class="btn btn-danger btn-sm btn-rounded">View Profile</a>--}}
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="row no-gutters">
                                <div class="col-12 text-left">
                                    <a href="{{ route('backend.profile.index') }}"><i class="ion ion-person"></i> บัญชีของฉัน</a>
                                </div>
                                <div role="separator" class="divider col-12"></div>
                                <div class="col-12 text-left">
                                    <a href="{{ route('backend.logout') }}"><i class="fa fa-power-off"></i> ออกจากระบบ</a>
                                </div>
                            </div>
                            <!-- /.row -->
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
