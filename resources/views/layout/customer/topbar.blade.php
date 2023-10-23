<!-- header -->
<div class="top-header-area rounded-bottom bg-white pt-3 pb-0 position-fixed top-0 shadow">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-5 col-md-3 col-lg-2 text-center">
                <a href="{{ route('customer.index') }}">
                    <img class="img-fluid rounded" src="{{ asset('img/logo-hitam.png') }}"
                        alt="">
                </a>
            </div>
            <div class="col-6 col-md-5">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                    <input class="form-control" id="search-bar" type="text" placeholder="Cari..">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end header -->
