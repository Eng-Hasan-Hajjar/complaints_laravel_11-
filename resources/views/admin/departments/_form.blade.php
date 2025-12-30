<div class="mb-3">
    <label class="form-label">اسم القسم <span class="text-danger">*</span></label>
    <input
        type="text"
        name="name"
        class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $department->name ?? '') }}"
        required
    >
    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">مدير القسم (اختياري)</label>
    <select name="manager_id" class="form-select @error('manager_id') is-invalid @enderror">
        <option value="">بدون مدير</option>
        @foreach($managers as $manager)
            <option
                value="{{ $manager->id }}"
                {{ (string)old('manager_id', $department->manager_id ?? '') === (string)$manager->id ? 'selected' : '' }}
            >
                {{ $manager->name }}
            </option>
        @endforeach
    </select>
    @error('manager_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
