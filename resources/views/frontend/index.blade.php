<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home Page</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <style>
        /* Lazy Load Styles */
        .card-image {
            display: block;
            min-height: 20rem;
            /* layout hack */
            background: #fff center center no-repeat;
            background-size: cover;
            /* filter: blur(1px); */
            /* blur the lowres image */
        }

        .card-image>img {
            display: block;
            width: 70%;
            opacity: 0;
            padding: 30px;
            border: 2px solid #fff;
            /* visually hide the img element */
        }

        .card-image.is-loaded {
            filter: none;
            /* remove the blur on fullres image */
            transition: filter 1s;
        }


        /* Layout Styles */


        .card-list {
            display: flex;
            flex-direction: row;
            /* margin: auto; */
            margin-top: 20px;
            margin-bottom: 80px;
            font-size: 0;
            text-align: center;
            list-style: none;
            background-color: #fff
        }

        ul {
            background-color: #fff
        }

        .card {
            display: inline-block;
            width: 100%;
            max-width: 15rem;
            margin: auto;
            font-size: 1rem;
            text-decoration: none;
            overflow: hidden;
            box-shadow: 0 0 3rem -1rem rgba(255, 145, 145, 0.89);
            transition: transform 0.1s ease-in-out, box-shadow 0.1s;
        }

        .card:hover {
            transform: translateY(-0.5rem) scale(1.0125);
            box-shadow: 0 0.5em 3rem -1rem rgba(247, 155, 155, 0.986);
        }

        .card-description {
            display: block;
            padding: 1em 0.5em;
            color: #515151;
            text-decoration: none;
        }

        .card-description>h2 {
            margin: 0 0 0.5em;
        }

        .card-description>p {
            margin: 0;
        }
    </style>

    <!-- Styles -->

</head>
@extends('layouts.layout')
@section('title', 'drip4stickers')
@section('content')
    <!-- hero area -->

    <div class="col-md-12">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>

    <div class="hero-area hero-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 offset-lg-2 text-center">
                    <div class="hero-text">
                        <div class="hero-text-tablecell">
                            <p class="subtitle">Designs that Speak You</p>
                            <h1>drip4stickers</h1>
                            <div class="hero-btns">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end hero area -->

    <!-- features list section -->
    <div class="list-section">

        <div class="container">
            <h2 class="section-title text-center ">Our Services</h2>

            <div class="row mt-3">
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="list-box d-flex align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-Shipping"></i>
                        </div>
                        <div class="content">
                            <h3>Complimentary Shipping</h3>
                            <p>Enjoy free shipping on orders over 25 Jd </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="list-box d-flex align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-phone-volume"></i>
                        </div>
                        <div class="content">
                            <h3>24/7 Assistance</h3>
                            <p>Round-the-clock support available</p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="list-box d-flex justify-content-start align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-sync"></i>
                        </div>
                        <div class="content">
                            <h3>Revenue Generation</h3>
                            <p>Earn income from your designs</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- end features list section -->

    <!-- product section -->
    <div class="product-area my-2">
        <h2 class="section-title text-center ">Our Products</h2>

        <ul class="card-list">

            <li class="card">
                <a class="card-image" target="_blank" style="background-image: url(images/par2.jpg);"
                    data-image-full="https://s3-us-west-2.amazonaws.com/s.cdpn.io/310408/psychopomp-500.jpg">
                    <img src="images/par2.jpg" alt="Psychopomp" />
                </a>

            </li>

            <li class="card">
                <a class="card-image" target="_blank" style="background-image: url(images/par1.jpg);"
                    data-image-full="https://s3-us-west-2.amazonaws.com/s.cdpn.io/310408/lets-go-500.jpg">
                    <img src="images/par2.jpg" alt="let's go" />
                </a>

            </li>

            <li class="card">
                <a class="card-image" target="_blank" style="background-image: url(images/par3.jpg);"
                    data-image-full="https://s3-us-west-2.amazonaws.com/s.cdpn.io/310408/beautiful-game-500.jpg">
                    <img src="images/par2.jpg" alt="The Beautiful Game" />
                </a>

            </li>

            <li class="card">
                <a class="card-image" target="_blank" style="background-image: url(images/par4.jpg);"
                    data-image-full="https://s3-us-west-2.amazonaws.com/s.cdpn.io/310408/jane-doe-500.jpg">
                    <img src="images/par2.jpg" alt="Jane Doe" />
                </a>

            </li>

        </ul>
    </div>
    <!-- End Product Area -->



@endsection

@push('js')
@endpush

</html>
