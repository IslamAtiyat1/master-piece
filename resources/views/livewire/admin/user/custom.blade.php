<div class="py-3 py-md-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Product Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Username</th>
                                        <th>User Email</th>
                                        <th>size</th>
                                        <th>Quantity</th>
                                        <th>Total</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($customizations as $customization)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('storage/' . $customization->image_url) }}"
                                                    alt="Profile Image" width="80%" height="50%">
                                            </td>
                                            <td class="text-dark">{{ $customization->user->name }}</td>
                                            <td class="text-dark">{{ $customization->user->email }}</td>
                                            <td class="text-dark">{{ $customization->size }}</td>
                                            <td class="text-dark">{{ $customization->quantity }}</td>
                                            <td class="text-dark">{{ $customization->total_price }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">No products available</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
