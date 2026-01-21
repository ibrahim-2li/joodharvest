<!DOCTYPE html>
<html lang="{{ session('locale', 'en') }}" dir="{{ session('locale', 'en') === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ session('locale', 'en') === 'ar' ? 'جود هارفيست - لوحة التحكم' : 'Jood Harvest - Admin Dashboard' }}
    </title>

    {{-- Tailwind CSS --}}
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    {{-- Alpine.js --}}
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    {{-- Fonts --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;900&family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    {{-- Admin CSS --}}
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <style>
        * {
            font-family: {!! session('locale', 'en') === 'ar' ? "'Cairo', sans-serif" : "'Inter', sans-serif" !!};
        }
    </style>

    @stack('styles')
</head>

<body class="bg-gray-50" x-data="{
    activeSection: '{{ session('active_section', 'hero') }}',
    mobileSidebarOpen: false,
    sidebarCollapsed: false
}">
    <div class="flex h-screen overflow-hidden">
        @yield('content')
    </div>

    @stack('scripts')
</body>

</html>
