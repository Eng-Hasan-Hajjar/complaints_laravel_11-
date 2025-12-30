@extends('admin.layouts.app')

@section('title', 'تعديل قسم')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>تعديل القسم: {{ $department->name }}</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('departments.update', $department) }}" method="POST">
            @csrf
            @method('PUT')

            @include('admin.departments._form', compact('department'))

            <div class="mt-3">
                <button type="submit" class="btn btn-success">تحديث</button>
                <a href="{{ route('departments.index') }}" class="btn btn-secondary">رجوع</a>
            </div>
        </form>
    </div>
</div>
@endsection
