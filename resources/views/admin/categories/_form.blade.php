<div class="mb-3">
    <label class="form-label">اسم الفئة <span class="text-danger">*</span></label>
    <input
        type="text"
        name="name"
        class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $category->name ?? '') }}"
        required
    >
    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">القسم <span class="text-danger">*</span></label>
    <select name="department_id" class="form-select @error('department_id') is-invalid @enderror" required>
        <option value="">اختر القسم</option>
        @foreach($departments as $dept)
            <option
                value="{{ $dept->id }}"
                {{ (string)old('department_id', $category->department_id ?? '') === (string)$dept->id ? 'selected' : '' }}
            >
                {{ $dept->name }}
            </option>
        @endforeach
    </select>
    @error('department_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
