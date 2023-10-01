<x-customer-layout>

    @push('stylesheet')
        <link href="{{ asset('css/customer/carousel-kategori.css') }}" rel="stylesheet">
        <link href="{{ asset('css/customer/scroll-to-top.css') }}" rel="stylesheet">
    @endpush

    <!-- hero area -->
    @include('layout.customer.hero')
    <!-- end hero area -->

    <!-- kategori section -->
    @include('customer.product.kategori')
    <!-- end kategori section -->

    <!-- product section -->
    <div id="product-section"></div>
    @foreach ($kategoris as $kategori)
        @php
            $products = $produks->where('kategori_produk_id', $kategori->id);
            $title = $kategori->nama;
        @endphp
        @if (sizeof($products) != 0)
            <x-product-list :title="$title" :products="$products" />
        @endif
    @endforeach
    <!-- end product section -->

    <!-- cart section -->
    @if (!\Cart::isEmpty())
        @include('customer.cart.floating')
    @endif
    <!-- end cart section -->

    <!-- Scroll to top button -->
    <button class="scroll-to-top-button" id="scroll-to-top-button">
        <i class="fas fa-arrow-up"></i>
    </button>

    @push('scripts')
        <script src="{{ asset('js/customer/carousel-kategori.js') }}"></script>
        <script src="{{ asset('js/customer/input-number-counter.js') }}"></script>
        <script src="{{ asset('js/customer/scroll-to-top.js') }}"></script>
    @endpush
</x-customer-layout>
