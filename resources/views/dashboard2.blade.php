@extends(Auth::user()->hasRole('admin') ? 'layouts.admin' : 'layouts.app')

@section('title', 'لوحة التحكم')

@section('content')
<div class="row">

    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $stats['total'] }}</h3>
                <p>إجمالي الشكاوى</p>
            </div>
            <div class="icon">
                <i class="fas fa-file-alt"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $stats['pending'] }}</h3>
                <p>قيد الانتظار</p>
            </div>
            <div class="icon">
                <i class="fas fa-clock"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{ $stats['in_review'] }}</h3>
                <p>قيد المراجعة</p>
            </div>
            <div class="icon">
                <i class="fas fa-search"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $stats['resolved'] }}</h3>
                <p>تم الحل</p>
            </div>
            <div class="icon">
                <i class="fas fa-check-circle"></i>
            </div>
        </div>
    </div>

</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">آخر الشكاوى</h3>
    </div>

    <div class="card-body p-0">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>العنوان</th>
                    <th>الحالة</th>
                    <th>الأولوية</th>
                    <th>التاريخ</th>
                </tr>
            </thead>
            <tbody>
                @forelse($myComplaints as $c)
                <tr>
                    <td>
                        <a href="{{ route('complaints.show', $c) }}">
                            {{ Str::limit($c->title, 30) }}
                        </a>
                    </td>
                    <td>
                        <span class="badge bg-{{ $c->status == 'pending' ? 'warning' : ($c->status == 'resolved' ? 'success' : 'info') }}">
                            {{ __($c->status) }}
                        </span>
                    </td>
                    <td>
                        <span class="badge bg-{{ $c->priority == 'urgent' ? 'danger' : ($c->priority == 'high' ? 'warning' : 'secondary') }}">
                            {{ __($c->priority) }}
                        </span>
                    </td>
                    <td>{{ $c->created_at->diffForHumans() }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">لا توجد شكاوى</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
