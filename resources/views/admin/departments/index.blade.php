@extends('admin.layouts.app')

@section('title', 'الأقسام')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>الأقسام</h2>
    <a href="{{ route('departments.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> قسم جديد
    </a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم القسم</th>
                        <th>المدير المسؤول</th>
                        <th>عدد الشكاوى</th>
                        <th>التاريخ</th>
                        <th>الإجراء</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($departments as $department)
                    <tr>
                        <td>#{{ $department->id }}</td>
                        <td>{{ $department->name }}</td>
                        <td>{{ $department->manager?->name ?? 'غير محدد' }}</td>
                        <td>{{ $department->complaints()->count() }}</td>
                        <td>{{ $department->created_at?->format('d/m/Y') }}</td>
                        <td class="d-flex gap-1">
                            <a href="{{ route('departments.edit', $department) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('departments.show', $department) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i>
                            </a>

                            <form action="{{ route('departments.destroy', $department) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف القسم؟');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">لا يوجد أقسام بعد</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
