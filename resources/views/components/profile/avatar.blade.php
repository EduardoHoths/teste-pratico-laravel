<div>
    <input type="file" id="avatar-input" name="avatar" class="d-none" accept="image/*">

    <label for="avatar-input" class="position-relative d-inline-block" style="cursor: pointer;">
        <img id="avatar-preview" src="{{ $src }}" class="rounded-circle border"
            style="width: {{ $size }}px; height: {{ $size }}px; object-fit: cover;">

        <span class="position-absolute bottom-0 -mt-10 end-0 bg-primary text-white rounded-circle p-1"
            style="transform: translate(-25%, -25%);">
            ✏️
        </span>
    </label>

    @error('avatar')
        <small class="text-danger d-block mt-2">{{ $message }}</small>
    @enderror
</div>
