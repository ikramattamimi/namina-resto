<x-customer-layout>

    @push('stylesheet')
        <link href="{{ asset('css/customer/carousel-kategori.css') }}" rel="stylesheet">
    @endpush
    <!-- kategori section -->
    @include('customer.kategori')
    <!-- end kategori section -->

    <!-- kategori section -->
    @include('customer.produk')
    <!-- end kategori section -->

    @push('scripts')
        <script src="{{ asset('js/customer/carousel-kategori.js') }}"></script>
    @endpush
</x-customer-layout>
