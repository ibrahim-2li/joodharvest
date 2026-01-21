<!DOCTYPE html>
<html lang="{{ session('locale', 'en') }}" dir="{{ session('locale', 'en') === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        {{ session('locale', 'en') === 'ar' ? 'جود هارفيست - الاستيراد والتخزين المبرد' : 'Jood Harvest - Import & Cold Storage' }}
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'jood-green': '#3A522A',
                        'jood-green-dark': '#29391D',
                        'jood-light': '#E9F4D3',
                        'jood-light-75': '#D9E4C1',
                        'jood-accent': '#C9D9A7',
                    }
                }
            }
        }
    </script>
    @stack('styles')
</head>

<body class="antialiased bg-white" x-data="{ locale: '{{ session('locale', 'en') }}', mobileMenu: false }">
    @yield('content')

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
            offset: 50
        });
    </script>
    @stack('scripts')
</body>

</html>
