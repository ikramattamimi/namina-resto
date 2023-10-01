<div {{ $attributes->merge(['class' => 'col-12']) }}>
    <div class="row mb-3 align-items-center">
        <label class="col-lg-3 col-md-4 col-form-label text-md-end" for="{{ $name }}">{{ $label }}
            @if ($isRequired == 'required')
                <span class="text-danger">*</span>
            @endif
        </label>

        @if ($type == 'file')
            <label class="custom-file-label" for="{{ $name }}">Pilih File</label>
        @endif

        <div class="col-lg-9 col-md-8">
            <div class="@if ($type == 'file') custom-file @endif">
                <input
                    class="form-control @error($name) is-invalid @enderror @if ($type == 'file') custom-file-input @endif"
                    id="{{ $name }}" name="{{ $name }}" type="{{ $type }}" {{ $isRequired }}
                    {{ $isDisabled }} {{ $attributes->class([])->merge(['value' => old($name)]) }}
                    autocomplete="{{ $name }}" autofocus>

                @error($name)
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
</div>
