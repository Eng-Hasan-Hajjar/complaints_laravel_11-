@extends('admin.layouts.app')

@section('title', 'عرض الفئة')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>الفئة: {{ $category->name }}</h2>
    <div class="d-flex gap-2">
        <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">
            <i class="fas fa-edit"></i> تعديل
        </a>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">رجوع</a>
    </div>
</div>

<div class="row">
    <div class="col-lg-4 mb-3">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">معلومات الفئة</h5>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item"><strong>اسم الفئة:</strong> {{ $category->name }}</li>
                    <li class="list-group-item"><strong>القسم:</strong> {{ $category->department?->name ?? '-' }}</li>
                    <li class="list-group-item"><strong>عدد الشكاوى:</strong> {{ $complaints->total() }}</li>
                    <li class="list-group-item"><strong>تاريخ الإنشاء:</strong> {{ $category->created_at?->format('d/m/Y') }}</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-lg-8 mb-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">شكاوى هذه الفئة</h5>
                <a href="{{ route('complaints.create', ['category_id' => $category->id, 'department_id' => $category->department_id]) }}"
                   class="btn btn-sm btn-primary">
                    <i class="fas fa-plus"></i> شكوى جديدة
                </a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>العنوان</th>
                                <th>مقدم الشكوى</th>
                                <th>الحالة</th>
                                <th>الأولوية</th>
                                <th>التاريخ</th>
                                <th>عرض</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($complaints as $complaint)
                            <tr>
                                <td>#{{ $complaint->id }}</td>
                                <td>
                                    <a href="{{ route('complaints.show', $complaint) }}">
                                        {{ \Illuminate\Support\Str::limit($complaint->title, 40) }}
                                    </a>
                                </td>
                                <td>{{ $complaint->user?->name ?? '-' }}</td>
                                <td>
                                    <span class="badge bg-{{ $complaint->status == 'pending' ? 'warning' : ($complaint->status == 'resolved' ? 'success' : 'info') }}">
                                        {{ __($complaint->status) }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $complaint->priority == 'urgent' ? 'danger' : ($complaint->priority == 'high' ? 'warning' : 'secondary') }}">
                                        {{ __($complaint->priority) }}
                                    </span>
                                </td>
                                <td>{{ $complaint->created_at?->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ route('complaints.show', $complaint) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">لا توجد شكاوى ضمن هذه الفئة</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{ $complaints->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
