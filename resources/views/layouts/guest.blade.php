<!DOCTYPE html>
<html lang="{{ session('locale', 'en') }}" dir="{{ session('locale', 'en') === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ session('locale', 'en') === 'ar' ? 'تسجيل الدخول - جود هارفيست' : 'Login - Jood Harvest' }}</title>

    <!-- Tailwind -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;900&family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            font-family: {!! session('locale', 'en') === 'ar' ? "'Cairo', sans-serif" : "'Inter', sans-serif" !!};
        }

        @if (session('locale', 'en') === 'ar')
            h1,
            h2,
            h3,
            h4,
            h5,
            h6 {
                font-family: 'Cairo', sans-serif !important;
            }
        @endif

        :root {
            --primary-green: #2d4526;
            --secondary-green: #8fa863;
            --light-green: #b5c78e;
            --dark-gray: #4A5568;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #2d4526 0%, #8fa863 50%, #4A5568 100%);
        }

        .gradient-text {
            background: linear-gradient(135deg, #2d4526 0%, #8fa863 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%232d4526' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .card-shadow {
            box-shadow: 0 10px 30px rgba(45, 69, 38, 0.1);
        }

        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }
    </style>
</head>

<body class="antialiased">
    <div class="min-h-screen hero-pattern gradient-bg flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="absolute top-0 right-0 w-96 h-96 bg-green-400 rounded-full opacity-20 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-gray-400 rounded-full opacity-20 blur-3xl"></div>

        <div class="max-w-md w-full space-y-8 relative z-10">
            <!-- Logo -->
            <div class="text-center floating">
                <a href="/" class="inline-block">
                    <div class="">
                        <img src="{{ asset('images/logo.png') }}" width="150" height="150"
                            class="text-xs text-gray-600 font-semibold" alt="Jood Harvest">
                    </div>
                </a>
            </div>

            <!-- Card -->
            <div class="bg-white rounded-3xl card-shadow p-8 sm:p-10">
                {{ $slot }}
            </div>

            <!-- Back to Home Link -->
            <div class="text-center">
                <a href="/"
                    class="text-white hover:text-green-200 font-medium transition inline-flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    {{ session('locale', 'en') === 'ar' ? 'العودة للرئيسية' : 'Back to Home' }}
                </a>
            </div>
        </div>
    </div>
</body>

</html>
