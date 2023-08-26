@extends('layouts.admin')
@section('title', 'My Orders')
@section('content')
    <div class="row">
        <div class="col-md-12">

            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif


        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> My orders
                        <a href="{{ url('admin/orders') }}" class="btn btn-primary btn-sm float-end">Back</a>

                    </h4>
                </div>

                <div class="card m-3">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <h5>Order Details</h5>
                                <hr>


                                <h6>Order Id: {{ $order->id }} </h6>
                                <h6>Tracking Id/No.:{{ $order->tracking_no }} </h6>
                                <h6>Order Created Date:{{ $order->created_at->format('d-m-Y h:i A') }} </h6>
                                <h6>Payment Mode: {{ $order->payment_mode }}</h6>
                                <h6 class="border p-2 text-success">
                                    Order Status Message: <span class="text-uppercase">{{ $order->status_message }}</span>
                                </h6>
                            </div>

                            <div class="col-md-6">
                                <h5>User Details</h5>
                                <hr>
                                <h6>Full Name: {{ $order->fullname }}</h6>
                                <h6>Email Id: {{ $order->email }}</h6>
                                <h6>Phone: {{ $order->phone }}</h6>
                                <h6>Address: {{ $order->address }}</h6>
                                <h6>Pin code: {{ $order->pincode }}</h6>
                            </div>
                        </div>
                        <br />
                        <h5>order items</h5>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Item ID</th>
                                        <th>Image</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->orderItems as $orderItem)
                                        <tr>
                                            <td width="10%">{{ $orderItem->id }}</td>
                                            <td width="10%">
                                                @if ($orderItem->product->productImages)
                                                    <img src="{{ asset($orderItem->product->productImages[0]->image) }}"
                                                        style="width: 50px; height: 50px" alt="">
                                                @else
                                                    <img src="" style="width: 50px; height: 50px" alt="">
                                                @endif
                                            </td>
                                            <td>
                                                {{ $orderItem->product->name }}
                                                @if ($orderItem->productColor)
                                                    @if ($orderItem->productColor->color)
                                                        <span>- Color:
                                                            {{ $orderItem->productColor->color->name }}</span>
                                                    @endif
                                                @endif
                                            </td>
                                            <td width="10%">{{ $orderItem->price }}</td>
                                            <td width="10%">{{ $orderItem->quantity }}</td>
                                            <td width="10%">{{ $orderItem->quantity * $orderItem->price }}</td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div>
                            </div>
                        </div>
                    </div>
                    <div class="card m-3">
                        <div class="card">
                            <div class="card-body">
                                <h5>Order Process (Order Status Updates)</h5>
                                <hr>
                                <div class="col-md-5">
                                    <form action="{{ url('admin/orders/' . $order->id) }}" method="POST">
                                        <div class="row">
                                            @csrf
                                            @method('PUT')
                                            <label>Update Your Order Status</label>

                                            <div class="input-group">
                                                <select name="order_status" class="form-select">
                                                    <option value="">Select order Status</option>
                                                    <option value="in progress"
                                                        {{ Request::get('status') == 'in progress' ? 'selected' : '' }}>In
                                                        Progress</option>
                                                    <option value="completed"
                                                        {{ Request::get('status') == 'completed' ? 'selected' : '' }}>
                                                        Completed</option>
                                                    <option value="pending"
                                                        {{ Request::get('status') == 'pending' ? 'selected' : '' }}>Pending
                                                    </option>
                                                    <option value="cancelled"
                                                        {{ Request::get('status') == 'cancelled' ? 'selected' : '' }}>
                                                        Cancelled</option>
                                                    <option
                                                        value="out-for-delivery"{{ Request::get('status') == 'out-for-delivery' ? 'selected' : '' }}>
                                                        Out for delivery</option>
                                                </select>
                                                <button type="submit" class="btn btn-primary text-white">Update</button>
                                            </div>
                                    </form>
                                </div>
                                <div class="col-md-7">
                                    <br />
                                    <h6 class="mt-3 "> Current Order Status <span
                                            class="text-uppercase">{{ $order->status_message }}</span></h6>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
