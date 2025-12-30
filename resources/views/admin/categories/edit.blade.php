@extends('admin.layouts.app')

@section('title', 'تعديل فئة')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>تعديل الفئة: {{ $category->name }}</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')

            @include('admin.categories._form', compact('category'))

            <div class="mt-3">
                <button type="submit" class="btn btn-success">تحديث</button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">رجوع</a>
            </div>
        </form>
    </div>
</div>
@endsection
