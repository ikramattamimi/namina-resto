<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @method($method)
    @if ($action != '')
        @csrf
    @endif

    {{ $slot }}

    <div class="col-md-12 d-flex justify-content-end">
        <button class="btn btn-primary" type="submit">
            {{ $buttonText }}
        </button>
    </div>

</form>
