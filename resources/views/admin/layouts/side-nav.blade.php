@if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('employee'))
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
@else
    <aside class="main-sidebar sidebar-light-primary elevation-2" style="padding-right: -20px; margin-right:-30px "> 
@endif

<a href="#" class="brand-link text-center">
    <span class="brand-text font-weight-light">نظام الشكاوي</span>
</a>

<br>

<div class="sidebar"  style="padding-right: -30px">
    <div class="user-panel">
        <div class="info">
            <a href="#" class="d-block text-right">{{ auth()->user()->name }} - {{ auth()->user()->roles->pluck('name')->implode(', ') }}</a>
        </div>
    </div>

    <nav class="mt-2" style="padding-right: -20px; margin-right:-30px ">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        لوحة التحكم
                        <i class="left fas fa-angle-left"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>الرئيسية</p>
                        </a>
                    </li>

                    @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('employee'))
                        <li class="nav-item">
                            <a href="{{ route('complaints.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>الشكاوي</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('departments.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-user-friends"></i>
                                <p>الأقسام</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>مهارات</p>
                            </a>
                        </li>
                    @endif

                    @if(auth()->user()->hasRole('admin'))
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-user-shield"></i>
                                <p>المستخدمين</p>
                            </a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <a href="{{ route('main_home') }}" class="nav-link">
                            <i class="nav-icon fas fa-globe"></i>
                            <p>الموقع</p>
                        </a>
                    </li>

                    <li class="nav-item" style="margin-bottom: 10px">
                        <a class="nav-link" style="margin-bottom: 10px" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>{{ __('تسجيل خروج') }}</p>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                    </li>

                    <li class="nav-item" style="margin-bottom: 10px" hidden>
                        <a class="nav-link" style="margin-bottom: 10px" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>{{ __('تسجيل خروج') }}</p>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
</aside>
