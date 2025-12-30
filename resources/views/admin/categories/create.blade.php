@extends('admin.layouts.app')

@section('title', 'إضافة فئة جديدة')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>إضافة فئة جديدة</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            @include('admin.categories._form', ['category' => null])

            <div class="mt-3">
                <button type="submit" class="btn btn-success">حفظ</button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">إلغاء</a>
            </div>
        </form>
    </div>
</div>
@endsection
