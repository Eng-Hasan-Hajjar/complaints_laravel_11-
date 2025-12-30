<div class="mb-3">
    <label class="form-label">العنوان <span class="text-danger">*</span></label>
    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">الوصف <span class="text-danger">*</span></label>
    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5" required>{{ old('description') }}</textarea>
    @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">القسم <span class="text-danger">*</span></label>
        <select name="department_id" class="form-select @error('department_id') is-invalid @enderror" required>
            <option value="">اختر القسم</option>
            @foreach($departments as $dept)
        


            <option value="{{ $dept->id }}" {{ old('department_id') == $dept->id ? 'selected' : '' }}>{{ $dept->name }}</option>
            @endforeach
        </select>
        @error('department_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">الفئة</label>
        <select name="category_id" class="form-select">
            <option value="">اختياري</option>
            @foreach($categories as $cat)
            <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="mb-3">
    <label class="form-label">الأولوية <span class="text-danger">*</span></label>
    <select name="priority" class="form-select @error('priority') is-invalid @enderror" required>
        <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>منخفضة</option>
        <option value="medium" {{ old('priority') == 'medium' ? 'selected' : '' }}>متوسطة</option>
        <option value="high" {{ $complaint->priority ?? old('priority') == 'high' ? 'selected' : '' }}>عالية</option>
        <option value="urgent" {{ old('priority') == 'urgent' ? 'selected' : '' }}>طارئة</option>
    </select>
</div>

<div class="mb-3">
    <label class="form-label">مرفقات (حد أقصى 5 ملفات)</label>
    <input type="file" name="attachment[]" class="form-control @error('attachment.*') is-invalid @enderror" multiple accept=".pdf,.jpg,.png,.docx">
    <small class="text-muted">الحد الأقصى لكل ملف: 5 ميجا</small>
    @error('attachment.*') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>