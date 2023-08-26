<div>
    <div class="container-fluied bg-bg">
        <div class="content-wrapper">
            <div class=" grid-margin stretch-card customiz-form1 mt-4">
                <button type="button" class="btn_c" data-toggle="modal" data-target="#myModal">
                    Product Price List
                </button>
            </div>
            <div>
                <div class="col-lg-6 col-md-3 p-5 m-auto grid-margin stretch-card customiz-form">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">create your stickers</h4>

                        </div>
                        <div class="card-body">
                            <p>

                                You can upload your favorite design, either to generate profit from this particular
                                design or to
                                place an order for a custom design tailored to your device.
                            </p>


                            <form class="forms-sample">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" wire:model="product.id">
                                </div>


                                <div class="form-group">
                                    <label for="size">Size</label>
                                    <select wire:model="size" id="size" class="form-control">
                                        <option value="small">Small</option>
                                        <option value="medium">Medium</option>
                                        <option value="large">Large</option>
                                    </select>
                                    @error('size')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Quantity Input -->
                                <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" class="form-control" wire:model="quantity" id="quantity"
                                        placeholder="quantity" />
                                    <small class="text-muted">Valid quantity values: 50, 100, 150, 200, 250</small>

                                    @error('quantity')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Image Input -->
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" wire:model="image" name="image" class="form-control" />

                                </div>
                                <p>Total Price: {{ $totalPrice }} JD</p>
                                <button class="btn_d" wire:click="calculatePrice" type="button">Calculate
                                    Price</button>
                                <button class="btn_d" wire:click="saveSticker" type="button">Save Sticker</button>

                            </form>
                        </div>
                    </div>

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
                <h5 class="modal-title"> Product Price List
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Quantity</th>
                                <th>Small</th>
                                <th>Medium</th>
                                <th>Large</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>50</td>
                                <td> jd 10</td>
                                <td> jd 12</td>
                                <td> jd 15</td>
                            </tr>
                            <tr>
                                <td>100</td>
                                <td> jd 15</td>
                                <td> jd 17</td>
                                <td> jd 20</td>
                            </tr>
                            <tr>
                                <td>150</td>
                                <td> jd 17</td>
                                <td> jd 20</td>
                                <td> jd 25</td>
                            </tr>
                            <tr>
                                <td>200</td>
                                <td> jd 23</td>
                                <td> jd 25</td>
                                <td> jd 30</td>
                            </tr>
                            <tr>
                                <td>250</td>
                                <td> jd 25</td>
                                <td> jd 30</td>
                                <td> jd 35</td>
                            </tr>
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>

</div>
</div>
</div>
</div>

</div>
