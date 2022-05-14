<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>

<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" src="{{ asset('uploads\images\users\\' . auth()->user()->image) }}" alt="User Image">
        <div>
            <p class="app-sidebar__user-name">{{ auth()->user()->name }}</p>
            <p class="app-sidebar__user-designation">{{ auth()->user()->roles->first()->name ?? '' }}</p>
        </div>
    </div>

    <ul class="app-menu">

        <li>
            <a class="app-menu__item {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <i class="app-menu__icon fa fa-home"></i> <span class="app-menu__label">@lang('site.home')</span>
            </a>
        </li>
        
        <li>
            <a class="app-menu__item {{ request()->is('users*') ? 'active' : '' }}" href="{{ route('users.index') }}">
                <i class="app-menu__icon fa fa-users"></i> <span class="app-menu__label">@lang('site.users')</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ request()->is('drivers*') ? 'active' : '' }}" href="{{ route('drivers.index') }}">
                <i class="app-menu__icon fa fa-id-card-o"></i> <span class="app-menu__label">@lang('site.drivers')</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ request()->is('customers*') ? 'active' : '' }}" href="{{ route('customers.index') }}">
                <i class="app-menu__icon fa fa-user"></i> <span class="app-menu__label">@lang('site.customers')</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ request()->is('trips*') ? 'active' : '' }}" href="{{ route('trips.index') }}">
                <i class="app-menu__icon fa fa-road"></i> <span class="app-menu__label">@lang('site.trips')</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ request()->is('daily-trips*') ? 'active' : '' }}" href="{{ route('daily-trips.index') }}">
                <i class="app-menu__icon fa fa-calendar"></i> <span class="app-menu__label">@lang('site.daily-trips')</span>
            </a>
        </li>
        
        <li>
            <a class="app-menu__item {{ request()->is('services*') ? 'active' : '' }}" href="{{ route('services.index') }}">
                <i class="app-menu__icon fa fa-bus"></i> <span class="app-menu__label">@lang('site.services')</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ request()->is('reviews*') ? 'active' : '' }}" href="{{ route('reviews.index') }}">
                <i class="app-menu__icon fa fa-star"></i> <span class="app-menu__label">@lang('site.reviews')</span>
            </a>
        </li>

        <li class="treeview {{ request()->is('*accounting*') ? 'is-expanded' : '' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-money"></i><span class="app-menu__label">@lang('site.accounting')</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{ route('balances.index') }}"><i class="icon fa fa-circle-o"></i>@lang('site.balance-list')</a></li>
            </ul>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{ route('tax.index') }}"><i class="icon fa fa-circle-o"></i>@lang('site.tax-determination')</a></li>
            </ul>
        </li>
        
        <li class="treeview {{ request()->is('*settings*') ? 'is-expanded' : '' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-cogs"></i><span class="app-menu__label">@lang('site.setting')</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{ route('roles.index') }}"><i class="icon fa fa-circle-o"></i>@lang('site.roles')</a></li>
            </ul>
        </li>

        
        <li class="treeview {{ request()->is('*profile*') || request()->is('*password*')  ? 'is-expanded' : '' }}">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-user-circle"></i><span class="app-menu__label">@lang('site.profile') </span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{ route('user.profile') }}"><i class="icon fa fa-circle-o"></i>@lang('site.edit-profile')</a></li>
                <li><a class="treeview-item" href=""><i class="icon fa fa-circle-o"></i>@lang('site.edit-password')</a></li>
            </ul>
        </li>

        
        <li>
            <a class="app-menu__item {{ request()->is('roles*') ? 'active' : '' }}" href="{{ route('roles.index') }}">
                <i class="app-menu__icon fa fa-lock"></i> <span class="app-menu__label">@lang('site.roles')</span>
            </a>
        </li>

    </ul>
</aside>
