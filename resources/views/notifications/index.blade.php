@extends('admin.layouts.app')

@section('title','الإشعارات')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h4 class="mb-0">الإشعارات</h4>
        <div class="text-muted">غير المقروء: <b>{{ $unreadCount }}</b></div>
    </div>

    <form action="{{ route('notifications.readAll') }}" method="POST">
        @csrf
        <button class="btn btn-success">
            <i class="fas fa-check-double me-1"></i> تمييز الكل كمقروء
        </button>
    </form>
</div>

<div class="card">
    <div class="card-body p-0">
        @if($notifications->count())
        <div class="list-group list-group-flush">
            @foreach($notifications as $n)
            <div class="list-group-item d-flex justify-content-between align-items-start">
                <div>
                    <div class="{{ $n->read_at ? 'text-muted' : 'fw-bold' }}">{{ $n->message }}</div>
                    <small class="text-muted">{{ $n->created_at->diffForHumans() }}</small>
                </div>

                <div class="d-flex gap-2">
                    @if($n->complaint_id)
                        <a class="btn btn-sm btn-outline-primary" href="{{ route('complaints.show', $n->complaint_id) }}">فتح الشكوى</a>
                    @endif

                    @if(is_null($n->read_at))
                    <form action="{{ route('notifications.read', $n) }}" method="POST">
                        @csrf
                        <button class="btn btn-sm btn-outline-success" type="submit">مقروء</button>
                    </form>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        <div class="p-3">
            {{ $notifications->links() }}
        </div>
        @else
            <div class="p-3">
                <div class="alert alert-light mb-0">لا توجد إشعارات.</div>
            </div>
        @endif
    </div>
</div>
@endsection
