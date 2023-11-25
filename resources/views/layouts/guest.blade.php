<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <style>
            :root {
                --white: #fff;
                --google-blue: #4285f4;
                --button-active-blue: #1669F2;
            }
    
            /* Styles for the Google button */
            .google-btn {
                display: inline-block;
                width: 184px;
                height: 42px;
                background-color: var(--google-blue);
                border-radius: 2px;
                box-shadow: 0 3px 4px 0 rgba(0, 0, 0, 0.25);
                position: relative;
                overflow: hidden;
                color: var(--white);
                text-decoration: none;
                font-size: 14px;
                font-family: "Roboto", sans-serif;
                letter-spacing: 0.2px;
                text-align: center;
                line-height: 42px;
                transition: box-shadow 0.3s ease;
            }
    
            .google-btn:hover {
                box-shadow: 0 0 6px var(--google-blue);
            }
    
            .google-icon-wrapper {
                position: absolute;
                top: 1px;
                left: 1px;
                width: 40px;
                height: 40px;
                border-radius: 2px;
                background-color: var(--white);
            }
    
            .google-icon {
                position: absolute;
                top: 11px;
                left: 11px;
                width: 18px;
                height: 18px;
            }
    
            .btn-text {
                margin-left: 45px;
            }
    
            .google-btn:active {
                background: var(--button-active-blue);
            }
        </style>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>
</body>

</html>
