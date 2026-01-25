@php
    $user = Auth::user();
    $unread = \App\Models\ComplaintNotification::where('user_id', $user->id)->whereNull('read_at')->count();
@endphp

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('dashboard') }}" class="brand-link text-center">
        <span class="brand-text fw-bold">UCMS</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">

                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>لوحة التحكم</p>
                    </a>
                </li>

                @if($user->hasRole('student'))
                    <li class="nav-item">
                        <a href="{{ route('complaints.create') }}" class="nav-link">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p>إنشاء شكوى</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('notifications.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-bell"></i>
                            <p>
                                الإشعارات
                                @if($unread)
                                    <span class="badge bg-danger float-end">{{ $unread }}</span>
                                @endif
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('complaints.track.form') }}" class="nav-link">
                            <i class="nav-icon fas fa-search"></i>
                            <p>تتبع شكوى (عام)</p>
                        </a>
                    </li>

                @else
                    {{-- Admin/Doctor/Employee menu --}}
                    <li class="nav-item">
                        <a href="{{ route('complaints.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-list"></i>
                            <p>الشكاوى</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('notifications.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-bell"></i>
                            <p>
                                الإشعارات
                                @if($unread)
                                    <span class="badge bg-danger float-end">{{ $unread }}</span>
                                @endif
                            </p>
                        </a>
                    </li>
                @endif

            </ul>
        </nav>
    </div>
</aside>
