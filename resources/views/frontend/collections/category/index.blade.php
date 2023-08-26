@extends('layouts.layout')
@section('title', 'all categories')
@section('content')
    <h1>
        <div class="py-3 py-md-5 bg-light">
            <div class="container">
                <div class="row">

                    @forelse ($categories as $categoryItem)
                        <div class="col-6 col-md-3">
                            <div class="category-card">
                                <a href="{{ url('/collections/' . $categoryItem->slug) }}">
                                    <div class="category-card-img">
                                        <img src="{{ asset("$categoryItem->image") }}" class="w-100" alt="Laptop">
                                        {{-- ../images/category/coffee.jpeg --}}
                                    </div>
                                    <div class="category-card-body">
                                        <h5>{{ $categoryItem->name }}</h5>
                                    </div>
                                </a>
                            </div>
                        </div>

                    @empty
                        <div class="col-md-12">
                            <h5> No category Available! </h5>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </h1>
@endsection
