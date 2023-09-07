@php
    $classes = "btn btn-primary btn-icon-split";
@endphp

<a {{ $attributes->class([$classes]) }}>
    <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
    </span>
    <span class="text">Tambah {{ $label }}</span>
</a>
