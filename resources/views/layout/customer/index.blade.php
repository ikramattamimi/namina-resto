<!DOCTYPE html>
<html lang="en">

<head>

    <!-- title -->
    <title>Namina Resto</title>

    @include('layout.customer.head')

    @stack('stylesheet')

    @vite([])

</head>

<body>

    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

    <!-- header -->
    @include('layout.customer.topbar')
    <!-- end header -->

    <!-- search area -->
    <div class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="close-btn"><i class="fas fa-window-close"></i></span>
                    <div class="search-bar">
                        <div class="search-bar-tablecell">
                            <h3>Search For:</h3>
                            <input type="text" placeholder="Keywords">
                            <button type="submit">Search <i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end search area -->

    <!-- hero area -->
    <div class="hero-area hero-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 offset-lg-2 text-center">
                    <div class="hero-text">
                        <div class="hero-text-tablecell">
                            <p class="subtitle">Garut</p>
                            <h1>Namina Resto and Private Resto</h1>
                            <div class="hero-btns">
                                <a class="boxed-btn" href="#">Produk</a>
                                <a class="bordered-btn" href="#">Kontak</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end hero area -->

    {{ $slot }}

    @include('layout.customer.footer')

    @include('layout.customer.script')

    @stack('scripts')

</body>

</html>
