@extends('layouts.layout')
@section('title', 'order')
@section('content')
    <div class="py-3 pyt-md-4">
        <div class="container-fl">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="shadow bg-white p-3">

                        <h4 class="mb-4">My Orders </h4>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Tracking No</th>
                                        <th>Username</th>
                                        <th>Payment Mode</th>
                                        <th>Ordered Data</th>
                                        <th>Status Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->tracking_no }}</td>
                                            <td>{{ $item->fullname }}</td>
                                            <td>{{ $item->payment_mode }}</td>
                                            <td>{{ $item->created_at->format('d-m-y') }}</td>
                                            <td>{{ $item->status_message }}</td>
                                            <td><a href="{{ url('orders/' . $item->id) }}" class=" btn-dark btn-sm">View</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">No Orders available</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        {{-- {{ $orders->links() }} <!-- Add this line for pagination links --> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
