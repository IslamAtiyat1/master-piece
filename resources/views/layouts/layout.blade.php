<!doctype html>
<html lang="en">

<head>
    <link rel="" type="image/png" sizes="76x76" href="{{ asset('images/c.png') }}">

    <title> @yield('title')</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    {{-- <link rel="icon" type="image/png" href="{{ asset('images/logo3.png') }}"> --}}
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    {{-- Exzoom Prod Image --}}
    <link href="{{ asset('assets/exzoom/jquery.exzoom.css') }}" rel="stylesheet">

    <!-- Include SweetAlert2 CSS and JS -->
    @livewireStyles

</head>

<body>
    @include('layouts.inc.frontend.navbar')

    @yield('content')


    @include('layouts.footer')

    @stack('js')

    <div>
        <!-- Your HTML code for the view page -->

        @push('scripts')
            <script>
                // Listen for the 'message' event
                window.addEventListener('message', function(event) {
                    var data = event.detail;
                    // Update the view based on the received data
                    if (data.type === 'warning') {
                        // Display the warning message
                        alert(data.text);
                    }
                });
            </script>
        @endpush
    </div>
    @livewireScripts
</body>
