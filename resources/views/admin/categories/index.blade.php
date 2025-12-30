@extends('admin.layouts.app')

@section('title', 'الفئات')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>الفئات</h2>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> فئة جديدة
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
                        <th>اسم الفئة</th>
                        <th>القسم</th>
                        <th>عدد الشكاوى</th>
                        <th>التاريخ</th>
                        <th>الإجراء</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                    <tr>
                        <td>#{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->department?->name ?? '-' }}</td>
                        <td>{{ $category->complaints()->count() }}</td>
                        <td>{{ $category->created_at?->format('d/m/Y') }}</td>
                        <td class="d-flex gap-1">
                            <a href="{{ route('categories.show', $category) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i>
                            </a>

                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                  onsubmit="return confirm('هل أنت متأكد من حذف الفئة؟');">
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
                        <td colspan="6" class="text-center text-muted">لا توجد فئات بعد</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
