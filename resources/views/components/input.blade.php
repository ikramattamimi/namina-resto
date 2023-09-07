<div class="row mb-3">
    <label class="col-md-4 col-form-label text-md-end" for="{{ $name }}">{{ $label }}</label>

    <div class="col-md-6">
        <input class="form-control @error($name) is-invalid @enderror" id="{{ $name }}" name="{{ $name }}"
            type="{{ $type }}" {{ $isRequired }} {{ $isDisabled }}
            {{ $attributes->class([])->merge(['value' => old($name)]) }} autocomplete="{{ $name }}" autofocus>

        @error($name)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
