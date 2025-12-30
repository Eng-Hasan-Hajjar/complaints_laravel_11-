<section class="content ">

        <div class="container-fluid">

    <!-- صف الإحصائيات الرئيسية -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalComplaints }}</h3>
                    <p>إجمالي الشكاوى</p>
                </div>
                <div class="icon"><i class="fas fa-file-alt"></i></div>
                <a href="{{ route('complaints.index') }}" class="small-box-footer">عرض الكل <i class="fas fa-arrow-circle-left"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $pendingComplaints }}</h3>
                    <p>قيد الانتظار</p>
                </div>
                <div class="icon"><i class="fas fa-clock"></i></div>
                <a href="{{ route('complaints.index') }}?status=pending" class="small-box-footer">عرض <i class="fas fa-arrow-circle-left"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $urgentComplaints }}</h3>
                    <p>طارئة / عالية الأولوية</p>
                </div>
                <div class="icon"><i class="fas fa-exclamation-triangle"></i></div>
                <a href="{{ route('complaints.index') }}?priority=urgent" class="small-box-footer">عاجلة <i class="fas fa-arrow-circle-left"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $resolvedComplaints }}</h3>
                    <p>تم حلها</p>
                </div>
                <div class="icon"><i class="fas fa-check-circle"></i></div>
            </div>
        </div>
    </div>

    <!-- صف ثاني: إحصائيات إضافية -->
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="info-box">
                <span class="info-box-icon bg-primary"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">الطلاب المسجلين</span>
                    <span class="info-box-number">{{ $totalStudents }}</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="info-box">
                <span class="info-box-icon bg-teal"><i class="fas fa-building"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">الأقسام الأكاديمية</span>
                    <span class="info-box-number">{{ $totalDepartments }}</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="info-box">
                <span class="info-box-icon bg-purple"><i class="fas fa-tags"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">فئات الشكاوى</span>
                    <span class="info-box-number">{{ $totalCategories }}</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="info-box">
                <span class="info-box-icon bg-olive"><i class="fas fa-hourglass-half"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">متوسط وقت الرد</span>
                    <span class="info-box-number">
                        {{ $avgResponseTime ? round($avgResponseTime) . ' ساعة' : 'لا توجد ردود بعد' }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- الصف الثالث: أحدث الشكاوى + أكثر الأقسام شكاوى -->
    <div class="row">
        <!-- أحدث الشكاوى -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header border-0 bg-gradient-primary">
                    <h3 class="card-title fw-bold text-white">
                        <i class="fas fa-list-ul me-2"></i> أحدث الشكاوى
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('complaints.index') }}" class="btn btn-sm btn-light">
                            عرض الكل
                        </a>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>رقم الشكوى</th>
                                <th>الطالب</th>
                                <th>العنوان</th>
                                <th>القسم</th>
                                <th>الأولوية</th>
                                <th>الحالة</th>
                                <th>التاريخ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($latestComplaints as $complaint)
                                <tr>
                                    <td><a href="{{ route('complaints.show', $complaint) }}">#{{ $complaint->id }}</a></td>
                                    <td>{{ $complaint->user->name }}</td>
                                    <td>{{ Str::limit($complaint->title, 30) }}</td>
                                    <td>{{ $complaint->department->name }}</td>
                                    <td>
                                        <span class="badge bg-{{ $complaint->priority == 'urgent' ? 'danger' : ($complaint->priority == 'high' ? 'warning' : 'info') }}">
                                            {{ trans('priority.' . $complaint->priority)}}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $complaint->status == 'resolved' ? 'success' : ($complaint->status == 'pending' ? 'warning' : 'primary') }}">
                                            {{ trans('status.' . $complaint->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $complaint->created_at->diffForHumans() }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">لا توجد شكاوى بعد</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- أكثر الأقسام شكاوى -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-gradient-warning">
                    <h3 class="card-title fw-bold text-white">
                        <i class="fas fa-chart-bar me-2"></i> الأقسام الأكثر شكاوى
                    </h3>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach($topDepartments as $dept)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ $dept->name }}</strong>
                                </div>
                                <span class="badge bg-warning rounded-pill">{{ $dept->complaints_count }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- إحصائية سريعة -->
            <div class="card bg-gradient-success text-white mt-3">
                <div class="card-body text-center py-4">
                    <h4 class="mb-2">شكاوى اليوم</h4>
                    <h2 class="fw-bold mb-0">{{ $todayComplaints }}</h2>
                    <small>هذا الأسبوع: {{ $weekComplaints }}</small>
                </div>
            </div>
        </div>
    </div>

</div>




<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // يمكنك إضافة رسوم بيانية دائرية أو خطية هنا لاحقًا
</script>


</section>







