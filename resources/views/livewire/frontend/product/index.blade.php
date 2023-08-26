<div>
    <div class="container">

        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        @if (session()->has('alert'))
            <div class="alert alert-danger">
                {{ session('alert') }}
            </div>
        @endif
        <div class="row ">
            <div class="col-md-3 ">
                <div class="card mb-3">
                    <div class="card-header bg-primary">
                        <h5>Price</h5>
                    </div>
                    <div class="card-body">
                        <label class="d-block">
                            <input type="radio" name="priceSort" wire:model="priceInput" value="high-to-low" /> High to
                            Low
                        </label>
                        <label class="d-block">
                            <input type="radio" name="priceSort" wire:model="priceInput" value="low-to-high" /> Low to
                            High
                        </label>
                    </div>
                </div>
                <div class="card mb-3 ">
                    <div class="card-header bg-primary">
                        <h5>Color</h5>
                    </div>
                    <div class="card-body">
                        <div class="color-filter-container">
                            @foreach ($colors as $color)
                                <label class="color-filter @if (in_array($color->id, $colorFilters)) selected @endif"
                                    style="background-color: {{ $color->code }}">
                                    <input type="checkbox" name="colorFilter[]" value="{{ $color->id }}"
                                        wire:model="colorFilters" />
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>




            </div>

            <div class="col-md-9">


                <div class="row">

                    @forelse ($products as $productItem)
                        <div class="col-md-3">
                            <div class="product-card">
                                <div class="product-card-img">
                                    @if ($productItem->quantity > 0)
                                        <label class="stock bg-success">In Stock</label>
                                    @else
                                        <label class="stock bg-danger">out of Stock</label>
                                    @endif

                                    @if ($productItem->ProductImages->count() > 0)
                                        <a
                                            href="{{ url('/collections/' . $productItem->category->name . '/' . $productItem->slug) }}">

                                            <div class="product-mockup-frame">
                                                <img src="{{ asset('images/a1.png') }}" class="w-100"
                                                    alt="Mockup Background">
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
                                            href="{{ url('/collections/' . $productItem->category->name . '/' . $productItem->name) }}">
                                            {{ $productItem->name }}
                                        </a>
                                    </h5>
                                    <div>
                                        <span class="selling-price"> {{ $productItem->selling_price }} JD</span>
                                        {{-- <span class="original-price"> {{ $productItem->orginal_price }}</span> --}}
                                    </div>
                                    <div class="mt-2">

                                        <button type="button" id="prouduct_btn"
                                            wire:click="addToWishList({{ $productItem->id }})" class="">
                                            <span wire:loading.remove>
                                                <i class="fa fa-heart"></i> Add To Wishlist
                                            </span>
                                            <span wire:loading wire:target="addToWishList">
                                                Adding...
                                            </span>
                                        </button>
                                    </div>
                                    <div class="mt-2 px-5">
                                        <a href="{{ url('/collections/' . $productItem->category->name . '/' . $productItem->name) }}"
                                            id="prouduct_btn" class="">
                                            View </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty

                        <div class="col-md-12">
                            <div class="p-2">
                                <h5> No products Available! for {{ $category->name }} </h5>
                            </div>
                        </div>
                    @endforelse




                </div>
            </div>

        </div>
    </div>

</div>


<script>
    window.addEventListener('name-message', event => {
        alert('Name updated to: ' + event.detail.message);
    })
</script>
