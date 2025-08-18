<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="" class="logo">
                <img src="{{ asset('assets/img/kaiadmin/ims.png') }}" alt="navbar brand" class="navbar-brand"
                    height="50" style="width: 150px;" />
            </a>

            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.index') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>


                <li class="nav-item {{ request()->routeIs('users.index') ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}">
                        <i class="fas fa-users"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('roles.index') ? 'active' : '' }}">
                    <a href="{{ route('roles.index') }}">
                        <i class="fas fa-user-shield"></i>
                        <p>Role</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('categories.index') ? 'active' : '' }}">
                    <a href="{{ route('categories.index') }}">
                        <i class="fas fa-th-large"></i>
                        <p>Categories</p>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('products.index') ? 'active' : '' }}">
                    <a href="{{ route('products.index') }}">
                        <i class="fas fa-box-open"></i>
                        <p>Products</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('orders.index') ? 'active' : '' }}">
                    <a href="{{ route('orders.index') }}">
                        <i class="fas fa-shopping-cart"></i>
                        <p>Orders</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('units.index') ? 'active' : '' }}">
                    <a href="{{ route('units.index') }}">
                        <i class="fa-drafting-compass"></i>
                        <p>Units</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('brands.index') ? 'active' : '' }}">
                    <a href="{{ route('brands.index') }}">
                        <i class="fas fa-tags"></i>
                        <p>Brands</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('suppliers.index') ? 'active' : '' }}">
                    <a href="{{ route('suppliers.index') }}">
                        <i class="fas fa-truck"></i>
                        <p>Suppliers</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('customers.index') ? 'active' : '' }}">
                    <a href="{{ route('customers.index') }}">
                        <i class="fas fa-users"></i>
                        <p>Customers</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('items.index') ? 'active' : '' }}">
                    <a href="{{ route('items.index') }}">
                        <i class="fas fa-boxes"></i>
                        <p>Items</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('chats.index') ? 'active' : '' }}">
                    <a href="{{ route('chats.index') }}">
                        <i class="fas fa-comments"></i>
                        <p>Chats</p>
                    </a>
                </li>
                {{-- <li class="nav-item {{ request()->routeIs('ajaxpractice.index') ? 'active' : '' }}">
                    <a href="{{ route('ajaxpractice.index') }}">
                        <i class="fas fa-code"></i>
                        <p>AJAX Practice</p>
                    </a>
                </li> --}}

        </div>
        </li>
        </ul>
    </div>
</div>
