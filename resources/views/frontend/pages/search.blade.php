@extends('layouts.layout')
@section('title', 'search')
@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>search Results</h4>
                    <div class="underline mb-4"></div>
                </div>
                @forelse ($searchProducts as $productItem)
                    <div class="col-md-3">
                        <div class="product-card">
                            <div class="product-card-img">

                                @if ($productItem->ProductImages->count() > 0)
                                    <a
                                        href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                        <div class="product-mockup-frame ">
                                            <img src="{{ asset('images/a1.png') }}" class="w-100" alt="Mockup Background">
                                            <!-- Product Sticker Placement -->
                                            <img src="{{ asset($productItem->productImages[0]->image) }}"
                                                class="product-sticker" alt="Sticker">
                                        </div>
                                    </a>
                                @endif
                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">sticker</p>
                                <h5 class="product-name">
                                    <a
                                        href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                        {{ $productItem->name }}
                                    </a>
                                </h5>

                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12 p-2">
                        <h4>No Products Available</h4>
                    </div>
                @endforelse

            </div>
        </div>
        {{-- <div>
            {{ $searchProducts->links() }}
        </div> --}}
    </div>

@endsection
