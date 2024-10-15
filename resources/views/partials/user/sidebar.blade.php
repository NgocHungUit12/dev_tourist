<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('auth.profile') }}">
        <div class="sidebar-brand-text mx-3">Account Management</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('auth.order') ? ' active-link' : '' }}">
        <a class="nav-link" href="{{ route('auth.order') }}">
            <i class="fas fa-fw fa-pen"></i>
            <span>Order</span></a>
    </li>
    
    <li class="nav-item ">
        <a class="nav-link" href="{{ route('auth.setting') }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Setting</span></a>
    </li>

</ul>