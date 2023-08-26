<div>

    <div x-data="{ paymentSavedMessage: '' }" x-init="Livewire.on('paymentSaved', message => {
        paymentSavedMessage = message;
    })">

        <div class="py-3 py-md-4 checkout">
            <div class="container">
                <h4>Checkout</h4>
                <hr>
                @if ($this->totalproductAmount != '0')
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="shadow bg-white p-3">
                                <h4>
                                    Item Total Amount :
                                    <span class="float-end">{{ $this->totalproductAmount }} JD</span>
                                </h4>
                                <hr>
                                <small>* Items will be delivered in 3 - 5 days.</small>
                                <br />
                                <small>* Tax and other charges are included ?</small>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="shadow bg-white p-3">
                                <h4 class="">
                                    Basic Information
                                </h4>
                                <hr>

                                <form action="" method="POST">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label>Full Name</label>
                                            <input type="text" wire:model="fullname" class="form-control"
                                                placeholder="Enter Full Name" />
                                            @error('fullname')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror


                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Phone Number</label>
                                            <input type="number" wire:model="phone" class="form-control"
                                                placeholder="Enter Phone Number" />

                                            @error('phone')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Email Address</label>
                                            <input type="email" wire:model="email" class="form-control"
                                                placeholder="Enter Email Address" />
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Pin-code (Zip-code)</label>
                                            <input type="number" wire:model="pincode" class="form-control"
                                                placeholder="Enter Pin-code" />
                                            <small>Zip-code contain from 6 digits</small>
                                            @error('pincode')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label>Full Address</label>
                                            <textarea wire:model="address" class="form-control" rows="2"></textarea>
                                            <small>Please provide complete details for your address. </small>

                                            @error('address')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label>Select Payment Mode: </label>
                                            <div class="d-md-flex align-items-start">
                                                <div class="nav col-md-3 flex-column nav-pills me-3" id="v-pills-tab"
                                                    role="tablist" aria-orientation="vertical">
                                                    <button class="nav-link fw-bold" id="cashOnDeliveryTab-tab"
                                                        data-bs-toggle="pill" data-bs-target="#cashOnDeliveryTab"
                                                        type="button" role="tab" aria-controls="cashOnDeliveryTab"
                                                        aria-selected="true">Cash on Delivery</button>
                                                    <button class="nav-link fw-bold" id="onlinePayment-tab"
                                                        data-bs-toggle="pill" data-bs-target="#onlinePayment"
                                                        type="button" role="tab" aria-controls="onlinePayment"
                                                        aria-selected="false">Online Payment</button>
                                                </div>
                                                <div class="tab-content col-md-9" id="v-pills-tabContent">
                                                    <div class="tab-pane fade" id="cashOnDeliveryTab" role="tabpanel"
                                                        aria-labelledby="cashOnDeliveryTab-tab" tabindex="0">
                                                        <h6>Cash on Delivery Mode</h6>
                                                        <hr />
                                                        <button type="button" wire:click="codOrder"
                                                            class="text-white k bg-primary">Place Order (Cash on
                                                            Delivery)</button>

                                                    </div>
                                                    <div class="tab-pane fade" id="onlinePayment" role="tabpanel"
                                                        aria-labelledby="onlinePayment-tab" tabindex="0">
                                                        <button type="button" class=" text-white  bg-primary "
                                                            data-toggle="modal" data-target="#myModal">
                                                            credit card info.
                                                        </button>
                                                        <hr />
                                                        <button type="button" wire:click="codOrder1"
                                                            class="text-white bg-primary ">
                                                            Pay Now
                                                        </button>
                                                        {{-- href="{{url('payment')}}" --}}
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                @else
                    <div class="card card-body shadow text-center col-lg-6 py-5 m-auto p-md-5">
                        <h6>No items in cart to checkout</h6>
                        <a href="{{ url('collections') }}" class="bg-primary text-dark m-auto col-lg-3">shop now</a>
                    </div>
                @endif
            </div>
        </div>




    </div>



</div>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Credit card Information
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form col-md-6 m-auto" method="POST" wire:submit.prevent="storePayment"
                    action="{{ route('payment.store') }}">
                    @csrf
                    <div class="form__number form__detail form-group">
                        <label for="card_number">Card Number</label>
                        <input wire:model="card_number" type="text" class="form-control"
                            placeholder="0000 0000 0000 0000" id="card_number" name="card_number"
                            onkeypress="return isNumeric(event)">
                        <div class="alert" id="alert-2">
                            @error('card_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form__expiry form__detail form-group">
                        <label for="expire">Exp Date</label>
                        <ion-icon name="calendar-outline"></ion-icon>
                        <input type="date" wire:model="expire" class="form-control" placeholder="MM/YY"
                            id="expire" name="expire" onkeypress="return isNumeric(event)">
                        <div class="alert" id="alert-3">
                            @error('expire')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form__cvv form__detail form-group">
                        <label for="cvv">CVV <ion-icon name="information-circle"
                                class="info"></ion-icon></label>
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" wire:model="cvv" class="form-control" placeholder="0000"
                            id="cvv" name="cvv" maxlength="4" onkeypress="return isNumeric(event)">
                        <div class="alert" id="alert-4">
                            @error('cvv')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" id="payid_btn"class="form__btn  btn-dark"
                        :disabled="$emptyInputs">Confirm</button>
                    <div x-show="paymentSavedMessage" class="mt-2 text-success">
                        <p x-text="paymentSavedMessage"></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<script>
    $(document).ready(function() {
        $('#paymentForm').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    // Display the success message on the checkout page
                    $('.payment-success-message').text(response.message);
                },
                error: function(xhr) {
                    // Handle errors if needed
                }
            });
        });
    });
</script>
<!-- Add this script at the end of your checkout page -->
<script>
    document.addEventListener('livewire:load', function() {
        Livewire.on('paymentSuccess', function() {
            // Close the modal (assuming you have a function to close the modal)
            closeModalFunction(); // Replace with the actual function to close the modal
            // Show the success message on the checkout page
            $('#paymentSuccessMessage').removeClass('hidden');
        });
    });
</script>
