<!DOCTYPE html>
<html lang="{{ session('locale', 'en') }}" dir="{{ session('locale', 'en') === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        {{ session('locale', 'en') === 'ar' ? 'جود هارفيست - الاستيراد والتخزين المبرد' : 'Jood Harvest - Import & Cold Storage' }}
    </title>
    <!-- Tailwind -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <!-- Alpine -->
    <script type="module" src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;900&family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        * {
            font-family: {!! session('locale', 'en') === 'ar' ? "'Cairo', sans-serif" : "'Inter', sans-serif" !!};
        }

        /* Ensure all headings use the same font in Arabic */
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
            --lighter-gray: #F7FAFC;
        }

        body {
            overflow-x: hidden;
        }

        html {
            overflow-x: hidden;
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

        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        .floating-slow {
            animation: floating 4s ease-in-out infinite;
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

        .hover-scale {
            transition: transform 0.3s ease;
        }

        .hover-scale:hover {
            transform: scale(1.05);
        }

        .card-shadow {
            box-shadow: 0 10px 30px rgba(45, 69, 38, 0.1);
        }

        .hero-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%232d4526' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        @media (max-width: 768px) {
            .language-switcher {
                position: fixed;
                top: 20px;
                {{ session('locale', 'en') === 'ar' ? 'left' : 'right' }}: 20px;
                z-index: 1000;
            }
        }
    </style>
</head>

<body class="antialiased" x-data="{ locale: '{{ session('locale', 'en') }}', open: false }">

    <!-- Navbar -->
    <nav class="w-full bg-white shadow-md fixed top-0 z-50">
        <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 sm:h-20">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <div class="">
                        <img src="{{ asset('images/logo.png') }}" width="100" height="100"
                            class="text-xs text-gray-600 font-semibold" alt="Jood Harvest">
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <div
                    class="hidden md:flex items-center space-x-8":class="locale === 'ar' ? 'space-x-reverse' : ''">
                    <a href="#home" class="text-gray-700 hover:text-green-700 font-medium transition">
                        <span x-show="locale === 'en'">Home</span>
                        <span x-show="locale === 'ar'">الرئيسية</span>
                    </a>
                    <a href="#about" class="text-gray-700 hover:text-green-700 font-medium transition">
                        <span x-show="locale === 'en'">About</span>
                        <span x-show="locale === 'ar'">من نحن </span>
                    </a>
                    <a href="#services" class="text-gray-700 hover:text-green-700 font-medium transition">
                        <span x-show="locale === 'en'">Services</span>
                        <span x-show="locale === 'ar'">خدماتنا</span>
                    </a>
                    <a href="#contact" class="text-gray-700 hover:text-green-700 font-medium transition">
                        <span x-show="locale === 'en'">Contact</span>
                        <span x-show="locale === 'ar'">اتصل بنا</span>
                    </a>

                    <!-- Language Switcher -->
                    <div class="flex items-center bg-gray-100 rounded-full p-1"
                        :class="locale === 'ar' ? 'space-x-reverse space-x-2' : 'space-x-2'">
                        <button @click="window.location.href = '{{ route('locale.change', 'en') }}'"
                            :class="locale === 'en' ? 'bg-green-700 text-white' : 'text-gray-600'"
                            class="px-4 py-2 rounded-full text-sm font-semibold transition">EN</button>
                        <button @click="window.location.href = '{{ route('locale.change', 'ar') }}'"
                            :class="locale === 'ar' ? 'bg-green-700 text-white' : 'text-gray-600'"
                            class="px-4 py-2 rounded-full text-sm font-semibold transition">AR</button>
                    </div>
                </div>

                <!-- Mobile Menu Button -->
                <button @click="open = !open" class="md:hidden text-gray-700 focus:outline-none flex-shrink-0"
                    aria-label="Toggle menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                        <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div x-show="open" class="md:hidden pb-4 space-y-3">
                <a href="#home" class="block text-gray-700 hover:text-red-600 font-medium">
                    <span x-show="locale === 'en'">Dashboard</span>
                    <span x-show="locale === 'ar'">الرئيسية</span>
                </a>
                <a href="#about" class="block text-gray-700 hover:text-green-700 font-medium">
                    <span x-show="locale === 'en'">About</span>
                    <span x-show="locale === 'ar'">من نحن</span>
                </a>
                <a href="#services" class="block text-gray-700 hover:text-green-700 font-medium">
                    <span x-show="locale === 'en'">Services</span>
                    <span x-show="locale === 'ar'">خدماتنا</span>
                </a>
                <a href="#contact" class="block text-gray-700 hover:text-green-700 font-medium">
                    <span x-show="locale === 'en'">Contact</span>
                    <span x-show="locale === 'ar'">اتصل بنا</span>
                </a>
                <div class="flex items-center bg-gray-100 rounded-full p-1 w-max"
                    :class="locale === 'ar' ? 'space-x-reverse space-x-2' : 'space-x-2'">
                    <button @click="window.location.href = '{{ route('locale.change', 'en') }}'"
                        :class="locale === 'en' ? 'bg-green-700 text-white' : 'text-gray-600'"
                        class="px-4 py-2 rounded-full text-sm font-semibold">EN</button>
                    <button @click="window.location.href = '{{ route('locale.change', 'ar') }}'"
                        :class="locale === 'ar' ? 'bg-green-700 text-white' : 'text-gray-600'"
                        class="px-4 py-2 rounded-full text-sm font-semibold">AR</button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-pattern gradient-bg pt-24 sm:pt-32 pb-20 relative overflow-hidden">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <!-- Hero Content -->
                <div data-aos="fade-right" class="text-white">
                    <div x-show="locale === 'en'">
                        <h1 class="text-5xl md:text-6xl font-black text-gray-900 leading-tight mb-6">
                            {{ $content['hero']->firstWhere('key', 'title')->value_en ?? 'Your Trusted Partner in Cold Chain Excellence' }}
                        </h1>
                        <p class="text-xl md:text-2xl mb-8 text-green-500">
                            {{ $content['hero']->firstWhere('key', 'description')->value_en ?? 'Importing, cold storage, and distribution of premium chilled and frozen food products.' }}
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="#contact"
                                class="bg-green-700 hover:bg-green-800 text-white px-8 py-4 rounded-full font-bold text-lg shadow-xl hover-scale inline-block text-center">
                                Request a Quote
                            </a>
                            <a href="#services"
                                class="bg-white text-green-700 hover:bg-gray-100 px-8 py-4 rounded-full font-bold text-lg shadow-xl hover-scale inline-block text-center">
                                Our Services
                            </a>
                        </div>
                    </div>

                    <div x-show="locale === 'ar'">
                        <h1 class="text-5xl md:text-6xl font-black text-gray-900 leading-tight mb-6">
                            {{ $content['hero']->firstWhere('key', 'title')->value_ar ?? 'شريكك الموثوق في التميز بسلسلة التبريد' }}
                        </h1>
                        <p class="text-xl md:text-2xl mb-8 text-green-500">
                            {{ $content['hero']->firstWhere('key', 'description')->value_ar ?? 'استيراد وتخزين وتوزيع منتجات غذائية مبردة ومجمدة عالية الجودة.' }}
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="#contact"
                                class="bg-green-700 hover:bg-green-800 text-white px-8 py-4 rounded-full font-bold text-lg shadow-xl hover-scale inline-block text-center">
                                اطلب عرض سعر
                            </a>
                            <a href="#services"
                                class="bg-white text-green-700 hover:bg-gray-100 px-8 py-4 rounded-full font-bold text-lg shadow-xl hover-scale inline-block text-center">
                                خدماتنا
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Hero Image -->
                <div data-aos="fade-left" class="relative">
                    <div class="relative z-10 floating-slow">
                        @if (isset($content['hero']) &&
                                $content['hero']->firstWhere('key', 'image') &&
                                $content['hero']->firstWhere('key', 'image')->value_en)
                            <img src="{{ asset($content['hero']->firstWhere('key', 'image')->value_en) }}"
                                alt="Hero Image" class="rounded-3xl shadow-2xl">
                        @else
                            <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?w=800"
                                alt="Cold Storage" class="rounded-3xl shadow-2xl">
                        @endif
                    </div>
                    <div class="absolute -top-10 -right-10 w-72 h-72 bg-green-400 rounded-full opacity-20 blur-3xl">
                    </div>
                    <div class="absolute -bottom-10 -left-10 w-96 h-96 bg-gray-400 rounded-full opacity-20 blur-3xl">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-aos="fade-up" class="text-center mb-16">
                <div x-show="locale === 'en'">
                    <h2 class="text-4xl md:text-5xl font-black mb-4">
                        {{ $content['about']->firstWhere('key', 'title')->value_en ?? 'About Jood Harvest' }}
                    </h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        {{ $content['about']->firstWhere('key', 'description')->value_en ?? 'Jood Harvest specializes in importing and distributing high-quality chilled and frozen food products.' }}
                    </p>
                </div>

                <div x-show="locale === 'ar'">
                    <h2 class="text-4xl md:text-5xl font-black mb-4">
                        {{ $content['about']->firstWhere('key', 'title')->value_ar ?? 'عن جود هارفيست' }}
                    </h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        {{ $content['about']->firstWhere('key', 'description')->value_ar ?? 'تعمل جود هارفيست في استيراد وتوزيع الأغذية المبردة والمجمدة عالية الجودة.' }}
                    </p>
                </div>
            </div>

            <!-- Vision & Mission -->
            <div class="grid md:grid-cols-2 gap-8 mb-16">
                <div data-aos="fade-right"
                    class="bg-gradient-to-br from-green-50 to-green-100 p-8 rounded-3xl card-shadow hover-scale">
                    <div class="w-16 h-16 bg-green-700 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                            </path>
                        </svg>
                    </div>
                    <div x-show="locale === 'en'">
                        <h3 class="text-2xl font-bold text-green-900 mb-4">Our Vision</h3>
                        <p class="text-gray-700 text-lg">
                            {{ $content['about']->firstWhere('key', 'vision')->value_en ?? 'To be a leading and trusted destination for chilled and frozen food import and distribution in the region.' }}
                        </p>
                    </div>
                    <div x-show="locale === 'ar'">
                        <h3 class="text-2xl font-bold text-green-900 mb-4">رؤيتنا</h3>
                        <p class="text-gray-700 text-lg">
                            {{ $content['about']->firstWhere('key', 'vision')->value_ar ?? 'أن نكون وجهة رائدة وموثوقة في استيراد وتوزيع الأغذية المبردة والمجمدة في المنطقة.' }}
                        </p>
                    </div>
                </div>

                <div data-aos="fade-left"
                    class="bg-gradient-to-br from-gray-50 to-gray-100 p-8 rounded-3xl card-shadow hover-scale">
                    <div class="w-16 h-16 bg-gray-700 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <div x-show="locale === 'en'">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Our Mission</h3>
                        <p class="text-gray-700 text-lg">
                            {{ $content['about']->firstWhere('key', 'mission')->value_en ?? 'To deliver safe, high-quality food products supported by efficient and reliable logistics services.' }}
                        </p>
                    </div>
                    <div x-show="locale === 'ar'">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">رسالتنا</h3>
                        <p class="text-gray-700 text-lg">
                            {{ $content['about']->firstWhere('key', 'mission')->value_ar ?? 'تقديم منتجات غذائية آمنة وعالية الجودة مع خدمات لوجستية فعّالة وموثوقة.' }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Values -->
            <div data-aos="fade-up">
                <div class="text-center mb-12">
                    <h3 class="text-3xl font-black">
                        <span x-show="locale === 'en'">Our Values</span>
                        <span x-show="locale === 'ar'">قيمنا</span>
                    </h3>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <div class="text-center p-6 bg-white rounded-2xl card-shadow hover-scale">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-green-700" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h4 class="font-bold text-lg">
                            <span x-show="locale === 'en'">Quality</span>
                            <span x-show="locale === 'ar'">الجودة</span>
                        </h4>
                    </div>

                    <div class="text-center p-6 bg-white rounded-2xl card-shadow hover-scale">
                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-gray-700" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                </path>
                            </svg>
                        </div>
                        <h4 class="font-bold text-lg">
                            <span x-show="locale === 'en'">Trust</span>
                            <span x-show="locale === 'ar'">الثقة</span>
                        </h4>
                    </div>

                    <div class="text-center p-6 bg-white rounded-2xl card-shadow hover-scale">
                        <div
                            class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <h4 class="font-bold text-lg">
                            <span x-show="locale === 'en'">Professionalism</span>
                            <span x-show="locale === 'ar'">الاحترافية</span>
                        </h4>
                    </div>

                    <div class="text-center p-6 bg-white rounded-2xl card-shadow hover-scale">
                        <div
                            class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                        </div>
                        <h4 class="font-bold text-lg">
                            <span x-show="locale === 'en'">Transparency</span>
                            <span x-show="locale === 'ar'">الشفافية</span>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-aos="fade-up" class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-black mb-4">
                    <span x-show="locale === 'en'">Our Core <span class="gradient-text">Services</span></span>
                    <span x-show="locale === 'ar'"><span class="gradient-text">خدماتنا</span> الأساسية</span>
                </h2>
                <p class="text-xl text-gray-600">
                    <span x-show="locale === 'en'">Comprehensive cold chain solutions for your business</span>
                    <span x-show="locale === 'ar'">حلول سلسلة التبريد الشاملة لأعمالك</span>
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <div data-aos="fade-up" data-aos-delay="100"
                    class="bg-white p-8 rounded-3xl card-shadow hover-scale">
                    <div
                        class="w-20 h-20 bg-gradient-to-br from-green-600 to-green-800 rounded-2xl flex items-center justify-center mb-6 transform -rotate-6">
                        <svg class="w-10 h-10 text-white transform rotate-6" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </div>
                    <div x-show="locale === 'en'">
                        <h3 class="text-2xl font-bold mb-4 text-gray-900">Import of Chilled & Frozen Foods</h3>
                        <p class="text-gray-600">High-quality imported chilled and frozen food products with full
                            compliance to international standards.</p>
                    </div>
                    <div x-show="locale === 'ar'">
                        <h3 class="text-2xl font-bold mb-4 text-gray-900">استيراد الأغذية المبردة والمجمدة</h3>
                        <p class="text-gray-600">منتجات غذائية مبردة ومجمدة مستوردة عالية الجودة مع الالتزام الكامل
                            بالمعايير العالمية.</p>
                    </div>
                </div>

                <!-- Service 2 -->
                <div data-aos="fade-up" data-aos-delay="200"
                    class="bg-white p-8 rounded-3xl card-shadow hover-scale">
                    <div
                        class="w-20 h-20 bg-gradient-to-br from-gray-500 to-gray-700 rounded-2xl flex items-center justify-center mb-6 transform rotate-6">
                        <svg class="w-10 h-10 text-white transform -rotate-6" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                    </div>
                    <div x-show="locale === 'en'">
                        <h3 class="text-2xl font-bold mb-4 text-gray-900">Cold Storage & Warehouse Management</h3>
                        <p class="text-gray-600">State-of-the-art cold storage facilities with advanced temperature
                            control and monitoring systems.</p>
                    </div>
                    <div x-show="locale === 'ar'">
                        <h3 class="text-2xl font-bold mb-4 text-gray-900">التخزين المبرد وإدارة المخازن</h3>
                        <p class="text-gray-600">مرافق تخزين مبردة حديثة مع أنظمة تحكم ومراقبة درجة حرارة متقدمة.</p>
                    </div>
                </div>

                <!-- Service 3 -->
                <div data-aos="fade-up" data-aos-delay="300"
                    class="bg-white p-8 rounded-3xl card-shadow hover-scale">
                    <div
                        class="w-20 h-20 bg-gradient-to-br from-purple-500 to-purple-700 rounded-2xl flex items-center justify-center mb-6 transform -rotate-6">
                        <svg class="w-10 h-10 text-white transform rotate-6" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0">
                            </path>
                        </svg>
                    </div>
                    <div x-show="locale === 'en'">
                        <h3 class="text-2xl font-bold mb-4 text-gray-900">Refrigerated Transportation</h3>
                        <p class="text-gray-600">Reliable refrigerated transport via our own fleet, ensuring product
                            integrity from warehouse to destination.</p>
                    </div>
                    <div x-show="locale === 'ar'">
                        <h3 class="text-2xl font-bold mb-4 text-gray-900">النقل المبرد عبر أسطول جود هارفيست</h3>
                        <p class="text-gray-600">نقل مبرد موثوق عبر أسطولنا الخاص، مما يضمن سلامة المنتج من المستودع
                            إلى الوجهة.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Clients Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-aos="fade-up" class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-black mb-4">
                    <span x-show="locale === 'en'">Who We <span class="gradient-text">Serve</span></span>
                    <span x-show="locale === 'ar'">من <span class="gradient-text">نخدم</span></span>
                </h2>
                <p class="text-xl text-gray-600">
                    <span x-show="locale === 'en'">Our B2B clients across the food industry</span>
                    <span x-show="locale === 'ar'">عملاؤنا من الشركات عبر صناعة الأغذية</span>
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-5 gap-6">
                <div data-aos="zoom-in" class="text-center p-6">
                    <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-12 h-12 text-green-700" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="font-bold">
                        <span x-show="locale === 'en'">Supermarkets</span>
                        <span x-show="locale === 'ar'">السوبرماركت</span>
                    </h3>
                </div>

                <div data-aos="zoom-in" data-aos-delay="100" class="text-center p-6">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-12 h-12 text-gray-700" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold">
                        <span x-show="locale === 'en'">Wholesalers</span>
                        <span x-show="locale === 'ar'">شركات البيع بالجملة</span>
                    </h3>
                </div>

                <div data-aos="zoom-in" data-aos-delay="200" class="text-center p-6">
                    <div class="w-24 h-24 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-12 h-12 text-purple-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                    </div>
                    <h3 class="font-bold">
                        <span x-show="locale === 'en'">Restaurants & Hotels</span>
                        <span x-show="locale === 'ar'">المطاعم والفنادق</span>
                    </h3>
                </div>

                <div data-aos="zoom-in" data-aos-delay="300" class="text-center p-6">
                    <div class="w-24 h-24 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-12 h-12 text-yellow-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4">
                            </path>
                        </svg>
                    </div>
                    <h3 class="font-bold">
                        <span x-show="locale === 'en'">Food Suppliers</span>
                        <span x-show="locale === 'ar'">شركات التوريد</span>
                    </h3>
                </div>

                <div data-aos="zoom-in" data-aos-delay="400" class="text-center p-6">
                    <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-12 h-12 text-green-700" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="font-bold">
                        <span x-show="locale === 'en'">Food Processing</span>
                        <span x-show="locale === 'ar'">معامل تجهيز الأغذية</span>
                    </h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="py-20 bg-gradient-to-br from-green-700 to-gray-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-aos="fade-up" class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-black mb-4">
                    <span x-show="locale === 'en'">Why Choose <span class="text-gray-300">Jood Harvest?</span></span>
                    <span x-show="locale === 'ar'">لماذا <span class="text-gray-300">جود هارفيست؟</span></span>
                </h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div data-aos="fade-up" class="text-center">
                    <div
                        class="w-20 h-20 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                            </path>
                        </svg>
                    </div>
                    <div x-show="locale === 'en'">
                        <h3 class="text-2xl font-bold mb-4">Full Cold Chain Compliance</h3>
                        <p class="text-green-100">Complete adherence to international cold chain standards ensuring
                            product safety and quality.</p>
                    </div>
                    <div x-show="locale === 'ar'">
                        <h3 class="text-2xl font-bold mb-4">التزام كامل بسلسلة التبريد</h3>
                        <p class="text-green-100">الالتزام الكامل بمعايير سلسلة التبريد العالمية لضمان سلامة المنتج
                            وجودته.</p>
                    </div>
                </div>

                <div data-aos="fade-up" data-aos-delay="100" class="text-center">
                    <div
                        class="w-20 h-20 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <div x-show="locale === 'en'">
                        <h3 class="text-2xl font-bold mb-4">Strong Logistics Partnership</h3>
                        <p class="text-green-100">Logistics partner of MS Logistics, providing comprehensive supply
                            chain solutions.</p>
                    </div>
                    <div x-show="locale === 'ar'">
                        <h3 class="text-2xl font-bold mb-4">شراكة لوجستية قوية</h3>
                        <p class="text-green-100">شريك لوجستي لشركة MS Logistics، نقدم حلول سلسلة توريد شاملة.</p>
                    </div>
                </div>

                <div data-aos="fade-up" data-aos-delay="200" class="text-center">
                    <div
                        class="w-20 h-20 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <div x-show="locale === 'en'">
                        <h3 class="text-2xl font-bold mb-4">High Reliability in Supply</h3>
                        <p class="text-green-100">Consistent, on-time delivery with our own refrigerated fleet and
                            warehouse management.</p>
                    </div>
                    <div x-show="locale === 'ar'">
                        <h3 class="text-2xl font-bold mb-4">موثوقية عالية في التوريد</h3>
                        <p class="text-green-100">تسليم متسق وفي الوقت المحدد مع أسطولنا المبرد وإدارة المستودعات
                            الخاصة
                            بنا.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-aos="fade-up" class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-black mb-4">
                    <span x-show="locale === 'en'">Get in <span class="gradient-text">Touch</span></span>
                    <span x-show="locale === 'ar'">تواصل <span class="gradient-text">معنا</span></span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    <span x-show="locale === 'en'">Have a question or want to work together? Send us a message!</span>
                    <span x-show="locale === 'ar'">لديك سؤال أو ترغب في العمل معنا؟ أرسل لنا رسالة!</span>
                </p>
            </div>

            <div class="grid lg:grid-cols-2 gap-8">
                <!-- Contact Information -->
                <div class="space-y-6" data-aos="fade-right">
                    <!-- Contact Info Card -->
                    <div class="bg-gradient-to-br from-green-700 to-green-800 rounded-2xl p-8 text-white shadow-2xl">
                        <h4 class="text-2xl font-bold mb-6">
                            <span x-show="locale === 'en'">Contact Information</span>
                            <span x-show="locale === 'ar'">معلومات التواصل</span>
                        </h4>
                        <div class="space-y-6">
                            <!-- Location -->
                            @if (isset($content['contact']) &&
                                    $content['contact']->firstWhere('key', 'location') &&
                                    $content['contact']->firstWhere('key', 'location')->value_en)
                                <div class="flex items-start gap-4">
                                    <div
                                        class="flex-shrink-0 w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h5 class="font-bold mb-1">
                                            <span x-show="locale === 'en'">Address</span>
                                            <span x-show="locale === 'ar'">العنوان</span>
                                        </h5>
                                        <p class="text-green-100">
                                            <span
                                                x-show="locale === 'en'">{{ $content['contact']->firstWhere('key', 'location')->value_en }}</span>
                                            <span
                                                x-show="locale === 'ar'">{{ $content['contact']->firstWhere('key', 'location')->value_ar ?: $content['contact']->firstWhere('key', 'location')->value_en }}</span>
                                        </p>
                                    </div>
                                </div>
                            @endif

                            <!-- Email -->
                            <div class="flex items-start gap-4">
                                <div
                                    class="flex-shrink-0 w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                                        </path>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h5 class="font-bold mb-1">
                                        <span x-show="locale === 'en'">Email</span>
                                        <span x-show="locale === 'ar'">البريد الإلكتروني</span>
                                    </h5>
                                    <a href="mailto:{{ $content['contact']->firstWhere('key', 'email')->value_en ?? 'info@joodharvest.com' }}"
                                        class="text-green-100 hover:text-white transition-colors">
                                        {{ $content['contact']->firstWhere('key', 'email')->value_en ?? 'info@joodharvest.com' }}
                                    </a>
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="flex items-start gap-4">
                                <div
                                    class="flex-shrink-0 w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <h5 class="font-bold mb-1">
                                        <span x-show="locale === 'en'">Phone</span>
                                        <span x-show="locale === 'ar'">رقم الهاتف</span>
                                    </h5>
                                    <a href="tel:{{ str_replace(' ', '', $content['contact']->firstWhere('key', 'phone')->value_en ?? '+966XXXXXXXXX') }}"
                                        class="text-green-100 hover:text-white transition-colors">
                                        {{ $content['contact']->firstWhere('key', 'phone')->value_en ?? '+966 XX XXX XXXX' }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Working Hours Card -->
                    <div class="bg-white rounded-2xl shadow-lg p-8 border-l-4 border-green-700">
                        <h4 class="text-xl font-bold text-gray-900 mb-4">
                            <span x-show="locale === 'en'">Working Hours</span>
                            <span x-show="locale === 'ar'">ساعات العمل</span>
                        </h4>
                        <div class="space-y-3 text-gray-600">
                            <div class="flex justify-between items-center pb-3 border-b border-gray-200">
                                <span class="font-medium">
                                    <span x-show="locale === 'en'">Sunday - Thursday</span>
                                    <span x-show="locale === 'ar'">الأحد - الخميس</span>
                                </span>
                                <span class="font-bold text-gray-900">
                                    <span x-show="locale === 'en'">8:30 AM - 4:30 PM</span>
                                    <span x-show="locale === 'ar'">8:30 ص - 4:30 م</span>
                                </span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="font-medium">
                                    <span x-show="locale === 'en'">Friday - Saturday</span>
                                    <span x-show="locale === 'ar'">الجمعة - السبت</span>
                                </span>
                                <span class="font-bold text-green-700">
                                    <span x-show="locale === 'en'">Closed</span>
                                    <span x-show="locale === 'ar'">مغلق</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div data-aos="fade-left">
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-600 text-green-800 px-6 py-4 rounded-lg mb-6">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-600 text-red-800 px-6 py-4 rounded-lg mb-6">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contact.store') }}"
                        class="bg-gray-50 p-8 rounded-3xl shadow-xl">
                        @csrf
                        <div class="grid md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">
                                    <span x-show="locale === 'en'">Your Name</span>
                                    <span x-show="locale === 'ar'">اسمك</span>
                                </label>
                                <input type="text" name="name" value="{{ old('name') }}" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent"
                                    :placeholder="locale === 'en' ? 'John Doe' : 'أحمد محمد'">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">
                                    <span x-show="locale === 'en'">Email Address</span>
                                    <span x-show="locale === 'ar'">البريد الإلكتروني</span>
                                </label>
                                <input type="email" name="email" value="{{ old('email') }}" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent"
                                    placeholder="email@example.com">
                            </div>
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-bold text-gray-700 mb-2">
                                <span x-show="locale === 'en'">Phone Number (Optional)</span>
                                <span x-show="locale === 'ar'">رقم الهاتف (اختياري)</span>
                            </label>
                            <input type="tel" name="phone" value="{{ old('phone') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent"
                                placeholder="+966 XX XXX XXXX">
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-bold text-gray-700 mb-2">
                                <span x-show="locale === 'en'">Message</span>
                                <span x-show="locale === 'ar'">الرسالة</span>
                            </label>
                            <textarea name="message" rows="6" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent"
                                :placeholder="locale === 'en' ? 'Tell us about your project...' : 'أخبرنا عن مشروعك...'">{{ old('message') }}</textarea>
                        </div>

                        <button type="submit"
                            class="w-full bg-green-700 hover:bg-green-800 text-white px-8 py-4 rounded-full font-bold text-lg shadow-xl hover-scale">
                            <span x-show="locale === 'en'">Send Message</span>
                            <span x-show="locale === 'ar'">إرسال الرسالة</span>
                        </button>
                    </form>
                </div>
            </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gradient-to-br from-green-900 to-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-3 gap-8 mb-8">
                <div>
                    <div class="">
                        <img src="{{ asset('images/JOOD.png') }}" width="100" height="100"
                            class="text-xs text-gray-600 font-semibold" alt="Jood Harvest">
                    </div>
                    <p class="text-gray-400">
                        <span x-show="locale === 'en'">Your trusted partner in cold chain excellence</span>
                        <span x-show="locale === 'ar'">شريكك الموثوق في التميز بسلسلة التبريد</span>
                    </p>
                </div>

                <div>
                    <h3 class="font-bold text-lg mb-4">
                        <span x-show="locale === 'en'">Quick Links</span>
                        <span x-show="locale === 'ar'">روابط سريعة</span>
                    </h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#about" class="hover:text-white transition">
                                <span x-show="locale === 'en'">About Us</span>
                                <span x-show="locale === 'ar'">من نحن</span>
                            </a></li>
                        <li><a href="#services" class="hover:text-white transition">
                                <span x-show="locale === 'en'">Services</span>
                                <span x-show="locale === 'ar'">خدماتنا</span>
                            </a></li>
                        <li><a href="#contact" class="hover:text-white transition">
                                <span x-show="locale === 'en'">Contact</span>
                                <span x-show="locale === 'ar'">اتصل بنا</span>
                            </a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="font-bold text-lg mb-4">
                        <span x-show="locale === 'en'">Partnership</span>
                        <span x-show="locale === 'ar'">الشراكة</span>
                    </h3>
                    <p class="text-gray-400">
                        <span x-show="locale === 'en'">Logistics Partner of MS Logistics</span>
                        <span x-show="locale === 'ar'">شريك لوجستي لشركة MS Logistics</span>
                    </p>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} <span x-show="locale === 'en'">Jood Harvest</span><span
                        x-show="locale === 'ar'">جود
                        هارفيست</span>.
                    <span x-show="locale === 'en'">All rights reserved.</span>
                    <span x-show="locale === 'ar'">جميع الحقوق محفوظة.</span>
                </p>
            </div>
        </div>
    </footer>

    <!-- AOS init -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });
    </script>
</body>

</html>
