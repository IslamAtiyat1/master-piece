   <div class="row">
       <div class="col-md-12">
           @if (session('message'))
               <div class="alert alert-success">
                   {{ session('message') }}

               </div>
           @endif
       </div>
       <div class="col-md-12">

           <div class="card">


               <div class="card-header">
                   <div class="row align-items-center">
                       <div class="col-md-6 mt-3">
                           <h4>Products</h4>
                       </div>
                       <div class="col-md-6">
                           <form action="{{ url('admin/products') }}" method="GET" role="search">
                               <div class="input-group">
                                   <input type="text" class="form-control" name="search"
                                       placeholder="Search products">
                                   <span class="input-group-append">
                                       <button class="btn btn-primary btn-sm" type="submit">Search</button>
                                   </span>
                               </div>
                           </form>
                       </div>
                       <div class="col-md-12 text-right mt-3">
                           <a href="{{ url('admin/products/create') }}" class="btn btn-primary btn-sm">Add Products</a>
                       </div>
                   </div>
               </div>


               <div class="card-body">
                   <table class="table table-borderred table-striped">
                       <thead>
                           <tr>

                               <th>ID</th>
                               <th>Category</th>
                               <th>Product</th>
                               <th>Price</th>
                               <th>Quantity</th>
                               <th>Status</th>
                               <th>Action</th>
                           </tr>
                       </thead>
                       <tbody>
                           @forelse ($products as $product)
                               <tr>

                                   <td>{{ $product->id }}</td>
                                   <td>
                                       @if ($product->category)
                                           {{ $product->category->name }}
                                       @else
                                           No Category Found
                                       @endif
                                   </td>
                                   <td>{{ $product->name }}</td>
                                   <td>{{ $product->selling_price }}</td>
                                   <td>{{ $product->quantity }}</td>
                                   <td>{{ $product->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                   <td>
                                       <a href="{{ url('admin/products/' . $product->id . '/edit') }}"
                                           class="btn btn-sm btn-primary">Edit</a>

                                       <a href="#" wire:click="deleteProduct({{ $product->id }})"
                                           data-bs-toggle="modal" data-bs-target="#deleteModal"
                                           class="btn btn-sm btn-dark">Delete</a>
                                       <!-- Modal -->
                                       <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1"
                                           aria-labelledby="exampleModalLabel" aria-hidden="true">
                                           <div class="modal-dialog">
                                               <div class="modal-content">
                                                   <div class="modal-header">
                                                       <h1 class="modal-title fs-5" id="exampleModalLabel">Product
                                                           delete</h1>
                                                       <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                           aria-label="Close"></button>
                                                   </div>
                                                   <form wire:submit.prevent="destroyProduct">
                                                       <div class="modal-body">
                                                           <h6>Are you sure you want to delete this data?</h6>
                                                       </div>
                                                       <div class="modal-footer">
                                                           <button type="button" class="btn btn-secondary"
                                                               data-bs-dismiss="modal">Close</button>
                                                           <button type="submit" class="btn btn-primary">Yes Delete
                                                           </button>
                                                       </div>
                                                   </form>


                                               </div>
                                           </div>
                                       </div>
                                   </td>
                               </tr>
                           @empty
                               <tr>
                                   <td colspan="7">No Products Available</td>
                               </tr>
                           @endforelse

                       </tbody>
                   </table>
                   <div>

                       {{ $products->links() }}

                   </div>
               </div>
           </div>
       </div>
   </div>

   </div>
   </div>
