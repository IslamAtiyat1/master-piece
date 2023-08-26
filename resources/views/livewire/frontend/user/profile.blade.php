<div style="height: 1000px">
    <div class="py-3 py-md-5 bg-light">
        <div class="container">

            <div class="row h-70">
                <div class="col-md-12">

                    <div class="row">
                        @forelse ($customizations as $customization)
                            <div class="col-md-3">
                                <div class="product-card">
                                    <div class="product-card-img">
                                        <!-- Assuming you have the $customization instance available in the view -->
                                        <img src="{{ asset('storage/' . $customization->image_url) }}"
                                            alt="Profile Image">
                                    </div>
                                    <div class="product-card-body">

                                        <div>
                                            <span>product number : {{ $customization->id }}</span>
                                        </div>
                                        <div class="mt-2">
                                            <p> Size: {{ $customization->size }}</p>
                                            <p> Quantity: {{ $customization->quantity }}</p>
                                        </div>
                                        <div>
                                            <span> total_price: {{ $customization->total_price }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty

                            <div class="col-md-12">
                                <div class="p-2">
                                    <h5> No products Available! for {{ $customization->id }} </h5>
                                </div>
                            </div>
                        @endforelse




                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>

</div>
