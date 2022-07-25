<nav id="sidebarMenu" class="sidebar d-md-block bg-primary text-white collapse" data-simplebar>
    <div class="sidebar-inner pt-3">
        <a href="{{ url('/admin/dashboard') }}" class="brand"><img src="{{ asset('img/logo.svg') }}"></a>
        <ul class="nav flex-column">
            <li class="nav-item {{ Request::segment(2) == 'dashboard' ? 'active' : '' }}"><a href="{{ route('admin.dashboard.index') }}" class="nav-link"><span class="sidebar-icon"><span class="fas fa-tv"></span></span> <span>Dashboard</span></a></li>
            <li class="nav-item {{ Request::segment(2) == 'customers' ? 'active' : '' }}"><a href="{{ route('admin.customers.index') }}" class="nav-link"><span class="sidebar-icon"><span class="fas fa-star"></span></span> <span>{{ __('messages.customers') }}</span></a></li>
            <li class="nav-item {{ Request::segment(2) == 'services' ? 'active' : '' }}"><a href="{{ route('admin.services.index') }}" class="nav-link"><span class="sidebar-icon"><span class="fas fa-cog"></span></span> <span>{{ __('messages.services') }}</span></a></li>
            <li class="nav-item {{ Request::segment(2) == 'products' ? 'active' : '' }}"><a href="{{ route('admin.products.index') }}" class="nav-link"><span class="sidebar-icon"><span class="fas fa-box"></span></span> <span>{{ __('messages.products') }}</span></a></li>
            <li class="nav-item {{ Request::segment(2) == 'users' ? 'active' : '' }}"><a href="{{ route('admin.users.index') }}" class="nav-link"><span class="sidebar-icon"><span class="fas fa-users"></span></span> <span>{{ __('messages.users') }}</span></a></li>
        </ul>
    </div>
</nav>
