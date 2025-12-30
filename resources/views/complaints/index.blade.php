@extends('admin.layouts.app')

@section('title', 'الشكاوى')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>الشكاوى</h2>
    <a href="{{ route('complaints.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> شكوى جديدة
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>رقم الشكوى</th>
                        <th>العنوان</th>
                        <th>القسم</th>
                        <th>الحالة</th>
                        <th>الأولوية</th>
                        <th>التاريخ</th>
                        <th>الإجراء</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($complaints as $complaint)
                    <tr>
                        <td>#{{ $complaint->id }}</td>
                        <td>
                            <a href="{{ route('complaints.show', $complaint) }}">
                                {{ Str::limit($complaint->title, 40) }}
                            </a>
                        </td>
                        <td>{{ $complaint->department->name }}</td>
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
                        <td>{{ $complaint->created_at->format('d/m/Y') }}</td>

                        
                        <td class="d-flex gap-1">
                            <a href="{{ route('complaints.show', $complaint) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i>
                            </a>

                            <a href="{{ route('complaints.edit', $complaint) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('complaints.destroy', $complaint) }}" method="POST"
                                onsubmit="return confirm('هل أنت متأكد من حذف هذه الشكوى؟');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $complaints->links() }}
    </div>
</div>
@endsection