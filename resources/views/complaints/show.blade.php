@extends('admin.layouts.app')

@section('title', 'شكوى #' . $complaint->id)

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h3>شكوى #{{ $complaint->id }} - {{ $complaint->title }}</h3>
        <div>
            @if(Auth::user()->hasRole('admin') || Auth::id() == $complaint->assigned_to)
            <form action="{{ route('complaints.status', $complaint) }}" method="POST" class="d-inline">
                @csrf
                <select name="status" onchange="this.form.submit()" class="form-select form-select-sm">
                    <option value="pending" {{ $complaint->status == 'pending' ? 'selected' : '' }}>قيد الانتظار</option>
                    <option value="in_review" {{ $complaint->status == 'in_review' ? 'selected' : '' }}>قيد المراجعة</option>
                    <option value="resolved" {{ $complaint->status == 'resolved' ? 'selected' : '' }}>تم الحل</option>
                    <option value="closed" {{ $complaint->status == 'closed' ? 'selected' : '' }}>مغلقة</option>
                </select>
            </form>
            @endif
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('complaints.edit', $complaint) }}" class="btn btn-warning btn-sm">
                <i class="fas fa-edit"></i> تعديل
            </a>

            <form action="{{ route('complaints.destroy', $complaint) }}" method="POST"
                onsubmit="return confirm('هل أنت متأكد من حذف الشكوى؟');">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">
                    <i class="fas fa-trash"></i> حذف
                </button>
            </form>
        </div>




    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <p><strong>الوصف:</strong></p>
                <p>{{ $complaint->description }}</p>

                @if(!empty($complaint->attachment) && is_array($complaint->attachment))
                    <p><strong>المرفقات:</strong></p>
                    <div class="row">
                        @foreach($complaint->attachment as $file)
                            <div class="col-md-3 mb-2">
                                <a href="{{ Storage::url($file) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-paperclip"></i> ملف
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="col-md-4">
                <ul class="list-group">
                    <li class="list-group-item"><strong>القسم:</strong> {{ $complaint->department->name }}</li>
                    <li class="list-group-item"><strong>الحالة:</strong> <span class="badge bg-info">{{ __($complaint->status) }}</span></li>
                    <li class="list-group-item"><strong>الأولوية:</strong> <span class="badge bg-danger">{{ __($complaint->priority) }}</span></li>
                    <li class="list-group-item"><strong>مقدم الشكوى:</strong> {{ $complaint->user->name }}</li>
                    <li class="list-group-item"><strong>المسؤول:</strong> {{ $complaint->assignedUser?->name ?? 'غير محدد' }}</li>
                </ul>

                @if(Auth::user()->hasRole('admin') && !$complaint->assigned_to)
                <form action="{{ route('complaints.assign', $complaint) }}" method="POST" class="mt-3">
                    @csrf
                    <select name="assigned_to" class="form-select mb-2" required>
                        <option value="">اختر المسؤول</option>
                        @foreach(\App\Models\User::whereHas('roles', fn($q) => $q->whereIn('name', ['admin', 'employee']))->get() as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-warning btn-sm">تعيين</button>
                </form>
                @endif
            </div>
        </div>

        <hr>

        <h5>التعليقات</h5>
        <div id="comments">
            @foreach($complaint->comments as $comment)
            <div class="border-start border-3 border-primary ps-3 mb-3">
                <small class="text-muted">{{ $comment->user->name }} - {{ $comment->created_at->diffForHumans() }}</small>
                <p class="mb-1">{{ $comment->message }}</p>
            </div>
            @endforeach
        </div>

        <form action="{{ route('complaints.comment', $complaint) }}" method="POST">
            @csrf
            <textarea name="message" class="form-control mb-2" rows="3" placeholder="أضف تعليق..." required></textarea>
            <button type="submit" class="btn btn-primary">إرسال</button>
        </form>
    </div>
</div>
@endsection