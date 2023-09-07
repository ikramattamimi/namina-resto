<form action="{{ $action }}" method="POST">
    @method($method)
    @if ($action != '')
        @csrf
    @endif

    {{ $slot }}

    <div class="row mb-0">
        <div class="col-md-6 offset-md-4">
            <button class="btn btn-primary" type="submit">
                {{ $buttonText }}
            </button>
        </div>
    </div>
</form>
