
@extends('layouts.app')

@section('title', 'Katalog | ' . config('jst.brand.name'))
@section('meta_description', 'Jelajahi katalog peralatan survei untuk disewa maupun dibeli.')

@section('content')

<main class="catalog-page">

    <div class="container">

        {{-- Catalog Header --}}
        <header class="catalog-header">

            <h1>Katalog</h1>

            <form
                action="{{ route('store.index') }}"
                method="GET"
                class="catalog-search-form"
            >

                <input
                    type="search"
                    name="q"
                    value="{{ request('q') }}"
                    placeholder="Search"
                    aria-label="Cari produk"
                >

                <select name="category" aria-label="Filter kategori">

                    <option value="">Semua Kategori</option>

                    @foreach($categories as $category)
                        <option
                            value="{{ $category }}"
                            @selected(request('category') === $category)
                        >
                            {{ $category }}
                        </option>
                    @endforeach

                </select>

                <button type="submit" aria-label="Cari">
                    <span aria-hidden="true">⌕</span>
                </button>

            </form>

        </header>


        {{-- RENT PRODUCTS --}}
        <section class="catalog-group">

            <div class="catalog-group-heading">
                <h2>Alat untuk Disewa</h2>
                <p>Peralatan survei yang tersedia untuk kebutuhan proyek Anda.</p>
            </div>

            <div class="product-grid">

                @forelse($rentProducts as $product)
                    <x-product-card :product="$product" />
                @empty
                    <p class="catalog-empty">
                        Tidak ada produk sewa yang ditemukan.
                    </p>
                @endforelse

            </div>

            @if($rentProducts->hasPages())
                <div class="catalog-pagination">
                    {{ $rentProducts->links() }}
                </div>
            @endif

        </section>


        {{-- SALE PRODUCTS --}}
        <section class="catalog-group">

            <div class="catalog-group-heading">
                <h2>Alat untuk Dijual</h2>
                <p>Peralatan survei dan pemetaan yang tersedia untuk pembelian.</p>
            </div>

            <div class="product-grid">

                @forelse($saleProducts as $product)
                    <x-product-card :product="$product" />
                @empty
                    <p class="catalog-empty">
                        Tidak ada produk jual yang ditemukan.
                    </p>
                @endforelse

            </div>

            @if($saleProducts->hasPages())
                <div class="catalog-pagination">
                    {{ $saleProducts->links() }}
                </div>
            @endif

        </section>

    </div>

</main>

@endsection
