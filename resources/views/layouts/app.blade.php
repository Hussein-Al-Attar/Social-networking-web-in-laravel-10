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
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- css tags --}}
    <style>
        .tags-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        .tags {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 10px;
        }

        .tag {
            display: flex;
            align-items: center;
            padding: 6px 10px;
            background-color: #f0f0f0;
            border-radius: 4px;
        }

        .tag-label {
            margin-left: 5px;
        }

        .search-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .search-input {
            padding: 6px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .add-button {
            padding: 6px 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .added-tag {
            animation: fadeIn 0.3s ease-in-out;
        }

        .remove-button {
            margin-left: 5px;
            cursor: pointer;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }
    </style>
    {{-- css comments --}}
    <style>
        @import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700);

        body {
            background-color: #D32F2F;
            font-family: 'Calibri', sans-serif !important
        }

        .mt-100 {
            margin-top: 100px
        }

        .mb-100 {
            margin-bottom: 100px
        }

        .card {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0px solid transparent;
            border-radius: 0px
        }

        .card-body {
            -webkit-box-flex: 1;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 1.25rem
        }

        .card .card-title {
            position: relative;
            font-weight: 600;
            margin-bottom: 10px
        }

        .comment-widgets {
            position: relative;
            margin-bottom: 10px
        }

        .comment-widgets .comment-row {
            border-bottom: 1px solid transparent;
            padding: 14px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            margin: 10px 0
        }

        .p-2 {
            padding: 0.5rem !important
        }

        .comment-text {
            padding-left: 15px
        }

        .w-100 {
            width: 100% !important
        }

        .m-b-15 {
            margin-bottom: 15px
        }

        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.76563rem;
            line-height: 1.5;
            border-radius: 1px
        }

        .btn-cyan {
            color: #fff;
            background-color: #27a9e3;
            border-color: #27a9e3
        }

        .btn-cyan:hover {
            color: #fff;
            background-color: #1a93ca;
            border-color: #198bbe
        }

        .comment-widgets .comment-row:hover {
            background: rgba(0, 0, 0, 0.05)
        }
    </style>
    <style>
        body {
            margin-top: 20px;
            background: #eee;
        }

        @media (min-width: 0) {
            .g-mr-15 {
                margin-right: 1.07143rem !important;
            }
        }

        @media (min-width: 0) {
            .g-mt-3 {
                margin-top: 0.21429rem !important;
            }
        }

        .g-height-50 {
            height: 50px;
        }

        .g-width-50 {
            width: 50px !important;
        }

        @media (min-width: 0) {
            .g-pa-30 {
                padding: 2.14286rem !important;
            }
        }

        .g-bg-secondary {
            background-color: #fafafa !important;
        }

        .u-shadow-v18 {
            box-shadow: 0 5px 10px -6px rgba(0, 0, 0, 0.15);
        }

        .g-color-gray-dark-v4 {
            color: #777 !important;
        }

        .g-font-size-12 {
            font-size: 0.85714rem !important;
        }

        .media-comment {
            margin-top: 20px
        }
    </style>
    {{-- post --}}
    <style>
        /* Dropdown Button */
        .dropbtn {
            color: black;
            padding: 16px;
            font-size: 16px;
            border: none;
        }

        /* The container <div> - needed to position the dropdown content */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Dropdown Content (Hidden by Default) */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        /* Links inside the dropdown */
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {
            background-color: #ddd;
        }

        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Change the background color of the dropdown button when the dropdown content is shown */
        .dropdown:hover .dropbtn {
            background-color: #007bff;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(3,
                    1fr);
            /* Adjust the number of columns as needed */
            gap: 10px;
            /* Adjust the gap between grid items */
        }

        .grid-item {
            position: relative;
            overflow: hidden;
        }

        .grid-item img {
            width: 100%;
            height: auto;
        }

        @media (max-width: 768px) {

            /* Adjust the styling for smaller screens or mobile devices */
            .grid-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
    <!-- Styles -->
    @livewireStyles
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
