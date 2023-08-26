<div style="height:1000px">

    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">

                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Products</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Price</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Quantity</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Total</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Remove</h4>
                                </div>
                            </div>
                        </div>
                        @forelse ($cart as $cartItem)
                            <div wire:key="cart-item-{{ $cartItem->id }}">

                                @if ($cartItem->product)
                                    <div class="cart-item">
                                        <div class="row">
                                            <div class="col-md-6 my-auto">
                                                <a
                                                    href="{{ url('collections/' . $cartItem->product->category->slug . '/' . $cartItem->product->slug) }}">
                                                    <label class="product-name">
                                                        <div class="image-container">
                                                            <img src="{{ $cartItem->product->productImages[0]->image }}"
                                                                alt="">

                                                        </div>
                                                        {{ $cartItem->product->name }}
                                                        @if ($cartItem->productColor)
                                                            <br />
                                                            @if ($cartItem->productColor->color)
                                                                <span>with color
                                                                    {{ $cartItem->productColor->color->name }}</span>
                                                            @endif
                                                        @endif
                                                    </label>
                                                </a>
                                            </div>

                                            <div class="col-md-1 my-auto">

                                                <label class="price"> {{ $cartItem->product->selling_price }}
                                                    jd</label>

                                            </div>
                                            <div class="col-md-2 col-7 my-auto">
                                                <div class="quantity">
                                                    <div class="input-group">
                                                        <button type="button" wire:loading.attr="disable"
                                                            wire:click="decrementQuantity({{ $cartItem->id }})"
                                                            class="bg-primary "><i class="fa fa-minus"></i></button>
                                                        <input type="text" value="{{ $cartItem->quantity }}"
                                                            class="input-quantity mx-1" />
                                                        <button type="button" wire:loading.attr="disable"
                                                            wire:click="incrementQuantity({{ $cartItem->id }})"
                                                            class="bg-primary"><i class="fa fa-plus"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 my-auto">
                                                <label class="price">
                                                    {{ $cartItem->product->selling_price * $cartItem->quantity }}
                                                    jd</label>

                                                @php
                                                    $totalPrice += $cartItem->product->selling_price * $cartItem->quantity;
                                                @endphp
                                            </div>
                                            <div class="col-md-2 col-5 my-auto">
                                                <div class="remove">
                                                    <button type="button" class="text-dark"
                                                        wire:click="removecartItem({{ $cartItem->id }})">
                                                        <span wire:loading.remove
                                                            wire:target="removecartItem({{ $cartItem->id }})">
                                                            <i class="fa fa-trash"></i> Remove
                                                        </span>
                                                        <span wire:loading
                                                            wire:target="removecartItem({{ $cartItem->id }})">
                                                            <i class="fa fa-trash"></i> Removeing...
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @empty
                            <div> No cart item</div>
                        @endforelse

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 my-md-auto mt-3">
                    <h5>
                        Get The best deals $ offers
                        <a href="{{ url('/collections') }}">shop now</a>
                    </h5>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="shadow-sm bg-white p-3">
                        <h4>Total :
                            <span class="float-end">
                                {{ $totalPrice }} jd
                            </span>
                        </h4>
                        <hr>
                        <a href="{{ url('/checkout') }}" class="bg-dark btn-lg">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        window.addEventListener('message', event);
    </script>
@endpush
