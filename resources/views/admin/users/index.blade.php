@extends('admin.layouts.app')

@section('title', 'المستخدمون')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3" dir="rtl">
    <h2 class="mb-0">المستخدمون</h2>
    <a href="{{ route('users.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> إضافة مستخدم جديد
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" dir="rtl">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert" dir="rtl">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card" dir="rtl">
    <div class="card-header d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-2">
        <h5 class="mb-0">قائمة المستخدمين</h5>

        <form action="{{ route('users.index') }}" method="GET" class="d-flex flex-column flex-md-row gap-2">
            <input type="text"
                   name="search"
                   class="form-control"
                   style="min-width: 260px;"
                   placeholder="بحث بالاسم أو البريد..."
                   value="{{ request('search') }}">

            <select name="role" class="form-select" style="min-width: 180px;">
                <option value="">-- الدور --</option>
                @foreach(\App\Models\Role::all() as $role)
                    <option value="{{ $role->name }}" {{ request('role') == $role->name ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-filter"></i> فلترة
                </button>

                <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-undo"></i> إعادة
                </a>
            </div>
        </form>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width: 25%">الاسم</th>
                        <th style="width: 30%">البريد الإلكتروني</th>
                        <th style="width: 25%">الدور</th>
                        <th style="width: 20%" class="text-center">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td class="fw-semibold">{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @php $roles = $user->roles->pluck('name'); @endphp
                                @if($roles->count())
                                    <span class="badge bg-info text-dark">
                                        {{ $roles->implode('، ') }}
                                    </span>
                                @else
                                    <span class="badge bg-secondary">بدون دور</span>
                                @endif
                            </td>

                            <td class="text-center">
                                <div class="d-inline-flex gap-1">
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                          onsubmit="return confirm('هل أنت متأكد من حذف المستخدم؟');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted p-4">
                                <i class="fas fa-exclamation-triangle fa-2x mb-2"></i><br>
                                لا يوجد مستخدمون حالياً
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-footer d-flex justify-content-between align-items-center">
        <small class="text-muted">آخر تحديث: {{ now()->format('Y-m-d H:i') }}</small>

        {{-- إذا عندك paginate --}}
        @if(method_exists($users, 'links'))
            <div>
                {{ $users->appends(request()->query())->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
