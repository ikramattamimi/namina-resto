<div class="input-group">
    <span class="input-group-prepend">
        <button class="btn btn-outline-secondary btn-number" data-type="minus" data-field="quantity" type="button"
            disabled="disabled">
            <span class="fa fa-minus"></span>
        </button>
    </span>
    <input class="form-control input-number" name="quantity" type="text" value="{{ isset($quantity) ? $quantity : 0 }}"
        min="1">
    <span class="input-group-append">
        <button class="btn btn-outline-secondary btn-number" data-type="plus" data-field="quantity" type="button">
            <span class="fa fa-plus"></span>
        </button>
    </span>
</div>
