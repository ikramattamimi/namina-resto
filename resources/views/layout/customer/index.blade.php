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

    {{ $slot }}
    <div class="mb-5 pb-5"></div>

    @include('layout.customer.footer')

    @include('layout.customer.script')

    @stack('scripts')

</body>

</html>
