<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name','UCMS') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- لو عندك bootstrap مبني داخل public/css/app.css -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>



    <!-- Vite (Tailwind + App JS) -->
   @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-50 text-gray-900">
    <div class="min-h-screen">

        {{-- Navigation --}}
        @include('layouts.navigation')

        <div class="container mx-auto px-4 py-6">

            {{-- Page Heading (Optional) --}}
            @isset($header)
                <header class="mb-6">
                    {{ $header }}
                </header>
            @endisset

            {{-- Page Content --}}
            <main>
                {{ $slot }}
            </main>

        </div>

        <footer class="py-6 text-center text-sm text-gray-500">
            © {{ date('Y') }} جامعة الشهباء — نظام الشكاوى
        </footer>
    </div>
</body>
</html>
