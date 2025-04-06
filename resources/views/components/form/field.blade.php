<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" class="form-control" value="{{ old($name, $value) }}">
    @error($name) <small class="text-danger">{{ $message }}</small> @enderror
</div>
