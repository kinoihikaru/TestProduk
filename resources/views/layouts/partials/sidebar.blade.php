<div class="span3">
    <div class="sidebar">
        <ul class="widget widget-menu unstyled">
            <li class="active"><a href="{{ route('home') }}"><i class="menu-icon icon-dashboard"></i>Dashboard
            </a></li>
        </ul>
        <!--/.widget-nav-->
        <ul class="widget widget-menu unstyled">
            <li><a href="{{ route('user.index') }}"><i class="menu-icon icon-user"></i> User </a></li>
            <li><a href="{{ route('produk.index') }}"><i class="menu-icon icon-inbox"></i> Produk </a></li>
            <li><a href="{{ route('translate-api.index') }}"><i class="menu-icon icon-bold"></i> API Google Translate </a></li>
        </ul>
        <!--/.widget-nav-->
        <ul class="widget widget-menu unstyled">
            <li><a href="{{ route('logout') }}"><i class="menu-icon icon-signout"></i>Logout </a></li>
        </ul>
    </div>
    <!--/.sidebar-->
</div>
<!--/.span3-->
