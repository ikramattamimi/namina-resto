<x-customer-layout>

    @push('stylesheet')
        <link href="{{ asset('css/customer/carousel-kategori.css') }}" rel="stylesheet">
    @endpush

    <!-- hero area -->
    @include('layout.customer.hero')
    <!-- end hero area -->

    <!-- kategori section -->
    @include('customer.product.kategori')
    <!-- end kategori section -->

    <!-- product section -->
    @include('customer.product.produk')
    <!-- end product section -->

    <!-- cart section -->
    @if (!\Cart::isEmpty())
        @include('customer.cart.floating')
    @endif
    <!-- end cart section -->

    @push('scripts')
        <script src="{{ asset('js/customer/carousel-kategori.js') }}"></script>
        <script src="{{ asset('js/customer/input-number-counter.js') }}"></script>
    @endpush
</x-customer-layout>
