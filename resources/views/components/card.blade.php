<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="d-flex align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">
                {{ $title }}
            </h6>
            @if (isset($button))
                <div class="ml-auto">
                    {{ $button }}
                </div>
            @endif
        </div>
    </div>
    <div class="card-body">
        {{ $slot }}
    </div>
</div>
