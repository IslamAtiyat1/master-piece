<div class="py-3 py-md-5 bg-light">
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
        <div class="row">
            <div class="col-md-5 mt-3">
                <div class="bg-white border">
                    @if ($product->productImages)
                        <!-- Product Main Image -->
                        <div class="product-mockup-frame ">
                            <img src="{{ asset('images/a1.png') }}" class="w-100" alt="Mockup Background">
                            <!-- Product Sticker Placement -->
                            <img src="{{ asset($product->productImages[0]->image) }}" class="product-sticker"
                                alt="Sticker">
                        </div>
                        <div class="product-images-grid mt-2">
                            <!-- Mockup Background 1 -->
                            <div class="product-mockup-frame">
                                <img src="{{ asset('images/mockup2.jpg') }}" class="w-100" alt="Mockup Background">
                                <!-- Product Sticker Placement -->
                                <img src="{{ asset($product->productImages[0]->image) }}" class="product-sticker2"
                                    alt="Sticker">
                            </div>
                            <!-- Mockup Background 2 -->
                            <div class="product-mockup-frame">
                                <img src="{{ asset('images/mockup1.png') }}" class="w-100" alt="Mockup Background">
                                <!-- Product Sticker Placement -->
                                <img src="{{ asset($product->productImages[0]->image) }}" class="product-sticker1"
                                    alt="Sticker">
                            </div>

                        </div>
                    @else
                        no image found
                    @endif
                </div>
            </div>


            <div class="col-md-7 mt-3">
                <div class="product-view">
                    <h4 class="product-name">
                        {{ $product->name }}
                    </h4>
                    <hr>
                    <p class="product-path">
                        Home / {{ $product->category->name }} / {{ $product->name }}
                    </p>
                    <div>
                        <span class="selling-price">{{ $product->selling_price }} JD</span>
                        {{-- <span class="original-price">{{ $product->orginal_price }}</span> --}}
                    </div>
                    <div>
                        @if ($product->productColors->count() > 0)
                            @if ($product->productColors)
                                @foreach ($product->productColors as $colorItem)
                                    {{-- <input type="radio" name="colorSelection" value="{{ $colorItem->id }}" />
                                {{ $colorItem->color->name }} --}}
                                    <label class="colorSelectionLabel"
                                        style="background-color:{{ $colorItem->color->code }};color:white"
                                        wire:click="colorSelected({{ $colorItem->id }})">
                                        {{ $colorItem->color->name }}
                                    </label>
                                @endforeach
                            @endif
                            <div>
                                @if ($this->prodColorSelectedQuantity == 'outOfStock')
                                    <label class="btn-sm py-1 mt-2 text-white bg-danger">Out of Stock</label>
                                @elseif($this->prodColorSelectedQuantity > 0)
                                    <label class="btn-sm py-1 mt-2 text-white bg-success">In Stock</label>
                                @endif
                            </div>
                        @else
                            @if ($product->quantity)
                                <label class="btn-sm py-1 text-white bg-success">In Stock</label>
                            @else
                                <label class="btn-sm py-1 text-white bg-success">Out of Stock</label>
                            @endif
                        @endif
                    </div>


                    <div class="mt-2">
                        <div class="input-group">
                            <div class="Quantity" id="product_span" wire:click="decrementQuantity"> - </div>
                            <input type="text" id="product_input" wire:model="quantityCount" readonly
                                value="{{ $this->quantityCount }}" class="input-quantity" />
                            <div class="Quantity" id="product_span" wire:click="incrementQuantity"> + </div>
                        </div>
                    </div>
                    <div>

                    </div>
                    <div class="mt-2">

                        <button type="button " wire:click="addToCart({{ $product->id }})" id="prouduct_btn"
                            class="">
                            <i class="fa fa-shopping-cart"></i> Add To Cart
                        </button>

                        <button type="button" wire:click="addToWishList({{ $product->id }})" id="prouduct_btn"
                            href="">

                            <i class="fa fa-heart"></i> Add To Wishlist


                        </button>
                    </div>
                    <div class="mt-3">
                        <h5 class="mb-0">Small Description</h5>
                        <p>{{ $product->small_description }} </p>

                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex pt-3">
            <div class="col-md-6 mt-3">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4>Comment</h4>
                    </div>
                    <div class="card-body">
                        <livewire:comments :productId="$product->id" />
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-3">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4>Description</h4>
                    </div>
                    <div class="card-body">
                        <p>
                        <ol>
                            <li>
                                {{ $product->description }}
                            </li>
                        </ol>
                        </p>
                    </div>
                </div>
            </div>

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
