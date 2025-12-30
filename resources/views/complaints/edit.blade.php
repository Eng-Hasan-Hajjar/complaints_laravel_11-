@extends('admin.layouts.app')

@section('title', 'تعديل الشكوى #' . $complaint->id)

@section('content')
<div class="card">
    <div class="card-header">
        <h3>تعديل الشكوى #{{ $complaint->id }}</h3>
    </div>

    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('complaints.update', $complaint) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @include('complaints._form_edit', compact('complaint', 'categories', 'departments'))

            <div class="mt-3">
                <button type="submit" class="btn btn-success">حفظ التعديل</button>
                <a href="{{ route('complaints.show', $complaint) }}" class="btn btn-secondary">إلغاء</a>
            </div>
        </form>
    </div>
</div>
@endsection
