@extends('admin.layouts.app')

@section('title', 'إضافة قسم جديد')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>إضافة قسم جديد</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('departments.store') }}" method="POST">
            @csrf

            @include('admin.departments._form', ['department' => null])

            <div class="mt-3">
                <button type="submit" class="btn btn-success">حفظ</button>
                <a href="{{ route('departments.index') }}" class="btn btn-secondary">إلغاء</a>
            </div>
        </form>
    </div>
</div>
@endsection
