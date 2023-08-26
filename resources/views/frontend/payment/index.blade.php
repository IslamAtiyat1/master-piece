@extends('layouts.layout')
@section('title', 'payment')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Payment</title>
        <style>
            body {
                background-color: #f8f9fa;
            }

            .form__number input,
            .form__expiry input,
            .form__cvv input {
                border: 1px solid #ced4da;
                border-radius: 5px;
                padding: 10px;
                width: 100%;
                font-size: 16px;
                background-color: white;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
                transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            }

            .form__number input:focus,
            .form__expiry input:focus,
            .form__cvv input:focus {
                border-color: #007bff;
                outline: 0;
                box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
            }

            .form__btn {
                background-color: #007bff;
                color: white;
                border: none;
                border-radius: 5px;
                padding: 10px 20px;
                font-size: 18px;
                cursor: pointer;
                transition: background-color 0.2s ease-in-out;
            }

            .form__btn:hover {
                background-color: #0056b3;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="payment row">


            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.10/lottie.min.js"></script>

    </body>

    </html>
@endsection
