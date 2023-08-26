@extends('layouts.admin')


@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="me-md-3 me-x1-5">

        <p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                @foreach ($breadcrumbs as $breadcrumb)
                    @if ($loop->last)
                        {{ $breadcrumb['name'] }}
                    @else
                        <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a> &raquo;
                    @endif
                @endforeach

            </ol>
        </nav>
        </p>
        <p class="mb-md-0">Your analytics dashboard template.</p>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-3">

            <div class="card card-body bg-primary text-white mb-3">
                <label class="text-white">Total Orders</label>
                <h1 class="text-white">{{ $totalOrder }}</h1>
                <a href="{{ url('admin/orders') }}" class="text-white">view</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-body bg-dark text-white mb-3">
                <label class="text-white">Total User</label>
                <h1 class="text-white">{{ $totalUser }} </h1>
                <a href="{{ url('admin/orders') }}" class="text-white">view</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-body bg-primary text-white mb-3">
                <label class="text-white">Total Categories</label>
                <h1 class="text-white">{{ $totalCategories }}</h1>
                <a href="{{ url('admin/orders') }}" class="text-white">view</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-body bg-dark text-white mb-3">
                <label class="text-white">Total Year Orders</label>
                <h1 class="text-white">{{ $thisYearOrder }}</h1>
                <a href="{{ url('admin/orders') }}" class="text-white">view</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">

            <div class="card card-body bg-primary text-white mb-3">
                <label class="text-white">Total products</label>
                <h1 class="text-white">{{ $totalProducts }}</h1>
                <a href="{{ url('admin/orders') }}" class="text-white">view</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-body bg-dark text-white mb-3">
                <label class="text-white">Total Month Orders</label>
                <h1 class="text-white">{{ $thisMonthOrder }} </h1>
                <a href="{{ url('admin/orders') }}" class="text-white">view</a>
            </div>
        </div>

        <div class="col-md-3">

            <div class="card z-index-2">
                <div class="card-header pb-0">
                    <h6>date of day</h6>
                    <p class="text-sm">
                        {{ $todayDate }}
                    </p>
                </div>
                <div class="card-body">

                </div>

            </div>
        </div>
        <div class="col-md-3">

            <div class="card z-index-2">
                <div class="card-header pb-0">
                    <h6>Sales overview</h6>
                    <p class="text-sm">
                        <i class="fa fa-arrow-up text-success"></i>
                        <span class="font-weight-bold">4% more</span> in 2023
                    </p>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        {{-- <div class="col-md-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Sales Overview
                    </div>
                    <div class="card-body">
                        <canvas id="salesChart"></canvas>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="col-md-6">
            <div class="card text-white bg-primary ">
                <div class="card-header bg-primary ">
                    Latest Orders
                </div>
                <div class="card card-body bg-gray text-dark mx-4 mb-3">
                    <ul class="list-group ">
                        @foreach ($latestOrders as $order)
                            <li class="list-group-item my-2">

                                Order ID: <a href="{{ url('admin/orders/' . $order->id) }}">{{ $order->id }}</a><br>
                                Customer: {{ $order->fullname }}<br>
                                Total Amount: {{ $order->status_message }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>











    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('salesChart').getContext('2d');
        var salesChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($salesDataLabels) !!},
                datasets: [{
                    label: 'Sales',
                    data: {!! json_encode($salesData) !!},
                    borderColor: 'blue',
                    fill: false
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Date'
                        }
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Sales'
                        }
                    }
                }
            }
        });
    </script>
@endpush
