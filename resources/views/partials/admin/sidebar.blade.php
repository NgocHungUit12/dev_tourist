<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Quản lý</span></a>
    </li>

    <li class="nav-item ">
        <a class="nav-link" href="{{ route('admin.categories.index') }}">
            <i class="fas fa-list-alt"></i>
            <span>Danh mục loại</span></a>
    </li>

    <li class="nav-item ">
        <a class="nav-link" href="{{ route('admin.region_categories.index') }}">
            <i class="fas fa-list-alt"></i>
            <span>Danh mục vùng</span></a>
    </li>

    <li class="nav-item ">
        <a class="nav-link" href="{{ route('admin.provine_categories.index') }}">
            <i class="fas fa-list-alt"></i>
            <span>Danh mục tỉnh</span></a>
    </li>

    <li class="nav-item ">
        <a class="nav-link" href="{{ route('admin.tours.index') }}">
            <i class="fas fa-fw fa-plane"></i>
            <span>Tour</span></a>
    </li>

    <li class="nav-item ">
        <a class="nav-link" href="{{ route('admin.discounts.index') }}">
            <i class="fa fa-calendar"></i>
            <span>Mã giảm giá</span></a>
    </li>

    {{-- <li class="nav-item ">
        <a class="nav-link" href="{{ route('admin.cars.index') }}">
            <i class="fas fa-fw fa-car"></i>
            <span>Car</span></a>
    </li> --}}

    <li class="nav-item ">
        <a class="nav-link" href="{{ route('admin.posts.index') }}">
            <i class="fas fa-fw fa-pen"></i>
            <span>Bài viết</span></a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="{{ route('admin.users.index') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Người dùng</span></a>
    </li>

    <!-- Divider -->

    <li class="nav-item ">
        <a class="nav-link" href="{{ route('admin.orders.index') }}">
            <i class="fas fa-fw fa-plane"></i>
            <span>Phiếu đặt tour</span></a>
    </li>

    <li class="nav-item ">
        <a class="nav-link" href="{{ route('admin.reviews.index') }}">
            <i class="fas fa-fw fa-pen"></i>
            <span>Đánh giá</span></a>
    </li>

    <li class="nav-item ">
        <a class="nav-link" href="{{ route('revanue.date') }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Thống kê doanh thu</span></a>
    </li>
    
    <hr class="sidebar-divider">


    <li class="nav-item ">
        <a class="nav-link" href="{{ route('admin_order') }}">
            <i class="fas fa-fw fa-pen"></i>
            <span>Tour đã đặt</span></a>
    </li>

    <li class="nav-item ">
        <a class="nav-link" href="{{ route('settings.index') }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Thông tin cá nhân</span></a>
    </li>

</ul>