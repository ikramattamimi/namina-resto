<div {{ $attributes->merge(['class' => 'col-12']) }}>
    <div class="row mb-3 align-items-center">
        <div class="col-lg-3 col-md-4">
            <label>{{ $label }}
                @if ($isRequired == 'required')
                    <span class="text-danger">*</span>
                @endif

            </label>
        </div>
        <div class="col-lg-9 col-md-8">
            <select class="form-control" id="" name="{{ $name }}" {{ $isRequired }}>
                {{ $slot }}
            </select>
        </div>
    </div>
</div>
