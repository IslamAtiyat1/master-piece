    <div class="py-5">
        <div class="container">
            <div class="row">
                @forelse ($wishlist as $wishlistItem)
                    @if ($wishlistItem->product)
                        <div class="card m-auto col-md-3 py-3">
                            <div class="col-lg-10 ">
                                <div class="col-md-12 m-auto text-center">
                                    <a
                                        href="{{ url('collections/' . $wishlistItem->product->category->slug . '/' . $wishlistItem->product->slug) }}">
                                        <img src="{{ $wishlistItem->product->productImages[0]->image }}"
                                            alt="{{ $wishlistItem->product->name }}" class="img-fluid rounded-start">
                                    </a>
                                </div>
                                <div class="col-md-12 m-auto text-center">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $wishlistItem->product->name }}</h5>
                                        <p class="card-text">
                                            {{-- Add any product details here --}}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-12 m-auto  text-center">
                                    <div class="remove">
                                        <button type="button" class="text-dark"
                                            wire:click="removeWishlistItem({{ $wishlistItem->id }})">
                                            <span wire:loading.remove
                                                wire:target="removeWishlistItem({{ $wishlistItem->id }})">
                                                <i class="fa fa-trash"></i> Remove
                                            </span>
                                            <span wire:loading
                                                wire:target="removeWishlistItem({{ $wishlistItem->id }})">
                                                <i class="fa fa-trash"></i> Removing...
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @empty
            </div>
            <div class="col-md-12">
                <h4>No products in wishlist.</h4>
            </div>
            @endforelse

        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
