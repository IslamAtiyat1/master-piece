@extends('layouts.layout')
@section('title', ' thank you for shopping')
@section('content')

    <div class="py-3 pyt-md-4">
        <div class="container">
            <div class="row" style="height: 500px">
                <div class="col-md-4 bg-bg1">

                </div>
                <div class="col-md-4 m-auto text-center" style="padding: 10px">
                    <div class="p-4 shadow bg-white">
                        <h2>drip4stickers</h2>
                        <h5>Thank You for Shopping </h5>
                        {{-- <h4>check out your phone the order wii </h4> --}}
                        <a href="{{ url('collections') }}" id="prouduct_btn" class="btn">Shop now</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
