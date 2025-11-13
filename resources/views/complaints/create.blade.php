@extends('layouts.app')

@section('title', 'إنشاء شكوى جديدة')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>إنشاء شكوى جديدة</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('complaints.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('complaints._form')
            <div class="mt-3">
                <button type="submit" class="btn btn-success">إرسال الشكوى</button>
                <a href="{{ route('complaints.index') }}" class="btn btn-secondary">إلغاء</a>
            </div>
        </form>
    </div>
</div>
@endsection