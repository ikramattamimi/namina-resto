<!-- kategori section -->
<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col">
                <h3>Kategori</h3>
            </div>
            <div class="col">
                <div class="d-flex justify-content-end">
                    <a class="btn btn-light" id="" name="" href="#" role="button">Lihat Semua <i
                            class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>

        <div class="row mx-auto my-auto">
            <div class="carousel slide w-100" id="recipeCarousel" data-ride="carousel">
                <div class="carousel-inner w-100" role="listbox">

                    @foreach ($kategoris as $kategori)
                        <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}">
                            <div class="col-md-3">
                                <div class="single-product-item">
                                    <div class="product-image">
                                        <a href="single-product.html"><img
                                                src="{{ asset('template-customer/assets/img/products/product-img-1.jpg') }}"
                                                alt=""></a>
                                    </div>
                                    <h5 class="text-truncate">{{ $kategori->nama }}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev w-auto" data-slide="prev" href="#recipeCarousel" role="button">
                    <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle"
                        aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next w-auto" data-slide="next" href="#recipeCarousel" role="button">
                    <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle"
                        aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- end kategori section -->
