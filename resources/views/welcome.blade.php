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
    <style>
        [x-cloak] {
            display: none !important;
        }

        * {
            font-family: 'Cairo', sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        .hero-gradient {
            background: linear-gradient({{ session('locale', 'en') === 'ar' ? '90deg' : '270deg' }},
                    rgba(58, 82, 42, 0) 0%,
                    rgba(58, 82, 42, 0.1) 30%,
                    rgba(58, 82, 42, 0.8) 70%,
                    rgba(58, 82, 42, 1) 100%);
        }

        .abstract-dots {
            background-image: radial-gradient(rgba(58, 82, 42, 0.1) 2px, transparent 2px);
            background-size: 20px 20px;
        }

        /* CSS Variables */
        :root {
            --color-primary-green: #3A522A;
            --color-primary-green-dark: #29391D;
            --color-beige-light: #E9F4D3;
            --color-accent-lime-light: #D9E4C1;
            --color-text-primary: #3A522A;
            --color-text-secondary: #5a6f4a;
            --color-white: #ffffff;
            --spacing-sm: 0.5rem;
            --spacing-md: 1rem;
            --spacing-lg: 1.5rem;
            --spacing-xl: 2rem;
            --spacing-2xl: 3rem;
            --spacing-3xl: 4rem;
            --radius-md: 0.75rem;
            --radius-lg: 1rem;
            --radius-2xl: 1.5rem;
            --shadow-sm: 0 1px 2px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.1);
            --transition-base: 0.3s ease;
            --transition-slow: 0.5s ease;
            --font-weight-extra-bold: 800;
        }

        /* Why Us Section Styles */
        .why-us-section {
            background-color: var(--color-white);
            padding: 5rem 0;
        }

        .why-us-section .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .section-title {
            text-align: center;
            color: var(--color-text-primary);
            margin-bottom: var(--spacing-xl);
        }

        /* New Layout: Left Cards Grid + Right Title/Image */
        .why-us-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--spacing-3xl);
            align-items: center;
            margin-top: var(--spacing-2xl);
        }

        /* Left Side: 2x2 Grid of Cards - Staggered Layout */
        .why-us-cards-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: var(--spacing-lg);
            padding-top: 50px;
        }

        /* Staggered effect: Right column (odd cards) shifted upward */
        .why-us-cards-grid .why-card:nth-child(odd) {
            transform: translateY(-50px);
        }

        .why-card {
            background-color: var(--color-accent-lime-light);
            padding: var(--spacing-xl);
            border-radius: var(--radius-lg);
            transition: all var(--transition-base);
            box-shadow: var(--shadow-sm);
            text-align: right;
        }

        .why-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }

        .why-icon {
            width: 56px;
            height: 56px;
            background-color: var(--color-primary-green);
            color: var(--color-white);
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: var(--spacing-md);
            margin-right: auto;
        }

        .why-card h3 {
            color: var(--color-text-primary);
            font-size: 1.25rem;
            margin-bottom: var(--spacing-sm);
            font-weight: 700;
        }

        .why-card p {
            color: var(--color-text-secondary);
            line-height: 1.7;
            margin: 0;
            font-size: 0.95rem;
        }

        /* Right Side: Title, Subtitle and Image */
        .why-us-right {
            display: flex;
            flex-direction: column;
            gap: var(--spacing-xl);
        }

        .why-us-header {
            text-align: right;
        }

        .section-title-right {
            color: var(--color-text-primary);
            font-size: clamp(1.75rem, 4vw, 2.25rem);
            font-weight: var(--font-weight-extra-bold);
            margin-bottom: var(--spacing-sm);
            line-height: 1.3;
        }

        .section-subtitle-right {
            color: var(--color-text-secondary);
            font-size: 1.125rem;
            line-height: 1.7;
            margin: 0;
        }

        .why-us-image-wrapper {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .decorative-shape {
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--color-primary-green) 0%, rgba(5, 51, 3, 0.8) 100%);
            border-radius: 50% 30% 50% 30%;
            transform: rotate(-10deg);
            z-index: 0;
            filter: blur(20px);
            opacity: 0.3;
        }

        .food-image {
            position: relative;
            width: 100%;
            max-width: 450px;
            height: auto;
            /* border-radius: var(--radius-2xl); */
            /* box-shadow: var(--shadow-lg); */
            transform: rotate(-3deg);
            transition: transform var(--transition-slow);
            z-index: 1;
        }

        .food-image:hover {
            transform: rotate(0deg) scale(1.05);
        }

        /* Responsive Design for Why Us Section */
        @media (max-width: 1024px) {
            .why-us-layout {
                grid-template-columns: 1fr;
                gap: var(--spacing-2xl);
            }

            .why-us-right {
                order: -1;
            }

            .why-us-header {
                text-align: center;
            }

            .section-title-right,
            .section-subtitle-right {
                text-align: center;
            }
        }

        @media (max-width: 640px) {
            .why-us-cards-grid {
                grid-template-columns: 1fr;
                padding-top: 0;
            }

            /* Reset staggered effect on mobile */
            .why-us-cards-grid .why-card:nth-child(odd) {
                transform: none;
            }

            .why-card {
                text-align: center;
            }

            .why-icon {
                margin: 0 auto var(--spacing-md) auto;
            }
        }

        /* Hero Abstract Shape */
        .side-abstract {
            position: absolute;
            top: 0;
            height: 100%;
            width: auto;
            max-width: 50vw;
            z-index: 0;
            pointer-events: none;
        }

        .side-abstract-right {
            right: 0;
            transform: scaleX(-1);
        }

        .side-abstract-left {
            left: 0;
        }
    </style>
</head>

<body class="antialiased bg-white" x-data="{ locale: '{{ session('locale', 'en') }}', mobileMenu: false }">

    <!-- Header/Navbar - Floating Pill Style -->
    <header class="fixed top-6 left-1/2 -translate-x-1/2 z-50 w-[95%] max-w-6xl">
        <nav dir="ltr"
            class="bg-jood-light rounded-full shadow-lg px-4 md:px-8 py-3 flex items-center justify-between flex-row-reverse">
            <!-- Logo -->
            <a href="#" class="flex-shrink-0">
                <img src="{{ asset('images/logo.png') }}" class="h-12 md:h-16 w-auto" alt="Jood Harvest">
            </a>

            <!-- Desktop Navigation -->
            <div
                class="hidden md:flex items-center gap-4 {{ session('locale', 'en') === 'ar' ? 'flex-row-reverse' : '' }}">
                <a href="#home"
                    class="px-3 py-2 text-black hover:text-jood-green font-bold text-lg transition flex flex-col items-center group">
                    <span>{{ session('locale', 'en') === 'ar' ? 'الرئيسية' : 'Home' }}</span>
                    <span class="w-0 group-hover:w-full h-0.5 bg-jood-green transition-all"></span>
                </a>
                <a href="#why-us" class="px-3 py-2 text-black hover:text-jood-green text-lg transition">
                    {{ session('locale', 'en') === 'ar' ? 'لماذا نحن' : 'Why Us' }}
                </a>
                <a href="#services" class="px-3 py-2 text-black hover:text-jood-green text-lg transition">
                    {{ session('locale', 'en') === 'ar' ? 'خدماتنا' : 'Services' }}
                </a>
                <a href="#clients" class="px-3 py-2 text-black hover:text-jood-green text-lg transition">
                    {{ session('locale', 'en') === 'ar' ? 'عملاؤنا' : 'Clients' }}
                </a>
            </div>

            <!-- Right Side - Language + CTA -->
            <div class="hidden md:flex items-center gap-3 flex-row-reverse">
                <!-- Language Switcher -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="flex items-center gap-1 px-4 py-2 border border-gray-300 rounded-full text-jood-green-dark font-medium hover:bg-gray-50 transition">
                        <span>{{ session('locale', 'en') === 'ar' ? 'AR' : 'EN' }}</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" @click.away="open = false" x-cloak
                        class="absolute top-full mt-2 bg-white border rounded-xl shadow-lg overflow-hidden {{ session('locale', 'en') === 'ar' ? 'left-0' : 'right-0' }}">
                        <a href="{{ route('locale.change', 'en') }}"
                            class="block px-4 py-2 hover:bg-gray-100">English</a>
                        <a href="{{ route('locale.change', 'ar') }}"
                            class="block px-4 py-2 hover:bg-gray-100">العربية</a>
                    </div>
                </div>
                <!-- CTA Button -->
                <a href="#contact"
                    class="bg-jood-green text-white px-6 py-2.5 rounded-full font-bold hover:bg-jood-green-dark transition">
                    {{ session('locale', 'en') === 'ar' ? 'تواصل معنا' : 'Contact Us' }}
                </a>
            </div>

            <!-- Mobile Menu Toggle -->
            <button @click="mobileMenu = !mobileMenu" class="md:hidden p-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path x-show="!mobileMenu" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                    <path x-show="mobileMenu" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </nav>

        <!-- Mobile Menu -->
        <div x-show="mobileMenu" x-cloak class="md:hidden mt-2 bg-white rounded-2xl shadow-lg p-4">
            <a href="#home"
                class="block py-3 font-bold">{{ session('locale', 'en') === 'ar' ? 'الرئيسية' : 'Home' }}</a>
            <a href="#why-us" class="block py-3">{{ session('locale', 'en') === 'ar' ? 'لماذا نحن' : 'Why Us' }}</a>
            <a href="#services" class="block py-3">{{ session('locale', 'en') === 'ar' ? 'خدماتنا' : 'Services' }}</a>
            <a href="#clients" class="block py-3">{{ session('locale', 'en') === 'ar' ? 'عملاؤنا' : 'Clients' }}</a>
            <a href="#contact" class="block py-3">{{ session('locale', 'en') === 'ar' ? 'تواصل معنا' : 'Contact' }}</a>
            <div class="flex gap-2 mt-3">
                <a href="{{ route('locale.change', 'en') }}"
                    class="px-4 py-2 rounded-full {{ session('locale', 'en') === 'en' ? 'bg-jood-green text-white' : 'bg-gray-100' }}">EN</a>
                <a href="{{ route('locale.change', 'ar') }}"
                    class="px-4 py-2 rounded-full {{ session('locale', 'en') === 'ar' ? 'bg-jood-green text-white' : 'bg-gray-100' }}">AR</a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="home" class="min-h-screen relative overflow-hidden">
        <!-- Background with gradient overlay -->
        <div class="absolute inset-0 "></div>

        <!-- Abstract decorative elements -->
        <div class="absolute inset-0 abstract-dots opacity-30"></div>

        <!-- Abstract Side Shape -->
        <svg class="side-abstract {{ session('locale', 'en') === 'ar' ? 'side-abstract-left' : 'side-abstract-right' }}"
            viewBox="0 0 320 800" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0,0
                     L180,0
                     C180,0 120,200 120,300
                     C120,450 320,500 320,650
                     C320,750 220,800 180,800
                     L0,800 Z" fill="#e4eed3" />
            <path d="M0,0
                     L140,0
                     C140,0 80,200 80,300
                     C80,450 280,500 280,650
                     C280,750 180,800 140,800
                     L0,800 Z" fill="#b4cc94" />
        </svg>

        <div class="relative z-10 min-h-screen flex items-center">
            <div class="w-full max-w-7xl mx-auto px-4 md:px-8">
                <div class="grid lg:grid-cols-2 gap-8 items-center pt-32 pb-16">

                    <!-- Image Side -->
                    <div class="lg:order-2" data-aos="fade-up">
                        <div class="relative">
                            @if (isset($content['hero']) &&
                                    $content['hero']->firstWhere('key', 'image') &&
                                    $content['hero']->firstWhere('key', 'image')->value_en)
                                <img src="{{ asset($content['hero']->firstWhere('key', 'image')->value_en) }}"
                                    alt="Hero" class="max-w-2xl mx-auto">
                            @else
                                <img src="{{ asset('images/hero-truck.png') }}" alt="Jood Harvest"
                                    class="max-w-2xl mx-auto"
                                    onerror="this.src='https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?w=800'">
                            @endif
                            <!-- Bottom fade -->
                            <div
                                class="absolute bottom-0 left-[-15%] right-[0%] h-32 mx-auto max-w-2xl bg-gradient-to-t from-white to-transparent">
                            </div>
                        </div>
                    </div>

                    <!-- Content Side -->
                    <div class="lg:order-1 {{ session('locale', 'en') === 'ar' ? 'text-right' : 'text-left' }} px-4 lg:px-8"
                        data-aos="fade-up" data-aos-delay="200">
                        <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-jood-green leading-tight mb-6">
                            @if (session('locale', 'en') === 'ar')
                                {{ $content['hero']->firstWhere('key', 'title')->value_ar ?? 'منتجات غذائية مبردة ومجمدة بجودة تثق بها' }}
                            @else
                                {{ $content['hero']->firstWhere('key', 'title')->value_en ?? 'Refrigerated and frozen food products with quality you trust' }}
                            @endif
                        </h1>
                        <p
                            class="text-lg md:text-xl text-gray-700 leading-relaxed mb-8 max-w-lg {{ session('locale', 'en') === 'ar' ? 'mr-0 ml-auto' : '' }}">
                            @if (session('locale', 'en') === 'ar')
                                {{ $content['hero']->firstWhere('key', 'description')->value_ar ?? 'نختص في استيراد وتخزين وتوزيع المنتجات الغذائية المبردة والمجمدة بجودة عالية والتزام تام بالمعايير العالمية.' }}
                            @else
                                {{ $content['hero']->firstWhere('key', 'description')->value_en ?? 'We specialize in importing, storing, and distributing chilled and frozen food products with high quality and full compliance to international standards.' }}
                            @endif
                        </p>
                        <a href="#contact"
                            class="inline-flex items-center gap-2 px-8 py-3 border-2 border-jood-green text-jood-green rounded-full font-bold text-lg hover:bg-jood-green hover:text-white transition">
                            {{ session('locale', 'en') === 'ar' ? 'اطلب عرض سعر' : 'Request a Quote' }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section id="why-us" class="why-us-section">
        <div class="container">
            <div class="why-us-layout">
                <!-- Right Side: Title, Subtitle and Image -->
                <div class="why-us-right">
                    <div class="why-us-header">
                        <h2 class="section-title-right {{ session('locale', 'en') === 'ar' ? 'text-right' : 'text-left' }}">{{ session('locale', 'en') === 'ar' ? 'لماذا تختار جود هارفيست' : 'Why Choose Jood Harvest' }}</h2>
                        <div class="flex gap-1 justify-start">
                            <span class="w-12 h-1 bg-jood-green rounded-full"></span>
                            <span class="w-2 h-1 bg-jood-green rounded-full"></span>
                        </div>
                        <p class="section-subtitle-right {{ session('locale', 'en') === 'ar' ? 'text-right' : 'text-left' }}">{{ session('locale', 'en') === 'ar' ? 'نهتم بكل تفصيلة لنوصّل لك أفضل منتج بأعلى جودة' : 'We care about every detail to deliver the best products with the highest quality' }}</p>
                    </div>
                    <div class="why-us-image-wrapper">
                        {{-- <div class="decorative-shape"></div> --}}
                        <img src="{{ asset('images/why-us-image.png') }}" alt="Fresh Food Products"
                            class="food-image">
                    </div>
                </div>
                <!-- Left Side: Cards Grid -->
                <div class="why-us-cards-grid">
                    <div class="why-card">
                        <div class="why-icon">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"
                                    fill="currentColor" />
                            </svg>
                        </div>
                        <h3 class="{{ session('locale', 'en') === 'ar' ? 'text-right' : 'text-left' }}">{{ session('locale', 'en') === 'ar' ? 'خبرة وتخصص' : 'Expertise & Specialization' }}</h3>
                        <p class="{{ session('locale', 'en') === 'ar' ? 'text-right' : 'text-left' }}">{{ session('locale', 'en') === 'ar' ? 'خبرة في مجال المنتجات الغذائية المبردة والمجمدة، و فهم دقيق لاحتياجات عملائنا' : 'Expertise in chilled and frozen food products, with a deep understanding of our customers\' needs' }}</p>
                    </div>
                    <div class="why-card">
                        <div class="why-icon">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM9 17H7V10H9V17ZM13 17H11V7H13V17ZM17 17H15V13H17V17Z"
                                    fill="currentColor" />
                            </svg>
                        </div>
                        <h3 class="{{ session('locale', 'en') === 'ar' ? 'text-right' : 'text-left' }}">{{ session('locale', 'en') === 'ar' ? 'جودة معتمدة' : 'Certified Quality' }}</h3>
                        <p class="{{ session('locale', 'en') === 'ar' ? 'text-right' : 'text-left' }}">{{ session('locale', 'en') === 'ar' ? 'نلتزم بأعلى معايير الجودة والسلامة الغذائية المعتمدة محليا وعالميا' : 'We adhere to the highest local and international food quality and safety standards' }}</p>
                    </div>
                    <div class="why-card">
                        <div class="why-icon">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM13 17H11V11H13V17ZM13 9H11V7H13V9Z"
                                    fill="currentColor" />
                            </svg>
                        </div>
                        <h3 class="{{ session('locale', 'en') === 'ar' ? 'text-right' : 'text-left' }}">{{ session('locale', 'en') === 'ar' ? 'تخزين ونقل آمن' : 'Safe Storage & Transport' }}</h3>
                        <p class="{{ session('locale', 'en') === 'ar' ? 'text-right' : 'text-left' }}">{{ session('locale', 'en') === 'ar' ? 'أنظمة تبريد وتجميد حديثة تحافظ على الطعم والقيمة الغذائية' : 'Modern cooling and freezing systems that preserve taste and nutritional value' }}</p>
                    </div>
                    <div class="why-card">
                        <div class="why-icon">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M20 6H16V4C16 2.89 15.11 2 14 2H10C8.89 2 8 2.89 8 4V6H4C2.89 6 2.01 6.89 2.01 8L2 19C2 20.11 2.89 21 4 21H20C21.11 21 22 20.11 22 19V8C22 6.89 21.11 6 20 6ZM10 4H14V6H10V4Z"
                                    fill="currentColor" />
                            </svg>
                        </div>
                        <h3 class="{{ session('locale', 'en') === 'ar' ? 'text-right' : 'text-left' }}">{{ session('locale', 'en') === 'ar' ? 'شريك موثوق' : 'Trusted Partner' }}</h3>
                        <p class="{{ session('locale', 'en') === 'ar' ? 'text-right' : 'text-left' }}">{{ session('locale', 'en') === 'ar' ? 'نلتزم ببناء الجودة، نظام التوريد، وبناء شراكات طويلة المدى' : 'We are committed to quality, reliable supply chains, and building long-term partnerships' }}</p>
                    </div>
                </div>


            </div>
        </div>
    </section>


    <!-- Services Section -->
    <section id="services" class="py-20 bg-jood-green relative overflow-hidden">
        <!-- Decorative Corner Elements -->
        <!-- Top Right Corner -->
        <div class="absolute top-8 right-8 hidden md:block">
            <div class="relative">
                <div class="w-16 h-16 border-t-2 border-r-2 border-jood-accent/50"></div>
                <div
                    class="absolute top-0 right-0 w-2 h-2 bg-jood-accent/50 rounded-full -translate-y-1 translate-x-1">
                </div>
            </div>
        </div>
        <!-- Bottom Left Corner -->
        <div class="absolute bottom-8 left-8 hidden md:block">
            <div class="relative">
                <div class="w-16 h-16 border-b-2 border-l-2 border-jood-accent/50"></div>
                <div
                    class="absolute bottom-0 left-0 w-2 h-2 bg-jood-accent/50 rounded-full translate-y-1 -translate-x-1">
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 md:px-8 relative z-10">

            <!-- Top Row: Import - Header - Transport -->
            <div class="grid lg:grid-cols-3 gap-6 items-center mb-6">

                <!-- Card 1: Import (Right in RTL) -->
                <!-- Mobile: Order 2, Desktop: Order 1 (or natural flow) -->
                <div class="bg-jood-light rounded-3xl p-6 order-2 lg:order-none" data-aos="fade-up"
                    data-aos-delay="100">
                    <div
                        class="flex items-start gap-4 {{ session('locale', 'en') === 'ar' ? 'flex-row-reverse' : '' }}">
                        <div class="w-14 h-14 bg-jood-green rounded-xl flex items-center justify-center flex-shrink-0">
                            <!-- Building/Import Icon -->
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <div class="flex-1 {{ session('locale', 'en') === 'ar' ? 'text-right' : 'text-left' }}">
                            <h3 class="text-lg font-bold text-jood-green mb-2">
                                {{ session('locale', 'en') === 'ar' ? 'استيراد الأغذية المبردة والمجمدة' : 'Import of Chilled & Frozen Foods' }}
                            </h3>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                {{ session('locale', 'en') === 'ar' ? 'نستورد الأغذية المبردة والمجمدة بعناية، لنضمن وصولها طازجة، آمنة، وبجودة يمكنك الوثوق بها.' : 'We carefully import chilled and frozen foods to ensure they arrive fresh, safe, and with quality you can trust.' }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Section Header (Center) -->
                <!-- Mobile: Order 1, Desktop: Order 2 (or natural flow) -->
                <div class="text-center order-1 lg:order-none mb-4 lg:mb-0" data-aos="fade-up">
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-2"
                        style="font-family: 'Cairo', sans-serif;">
                        {{ session('locale', 'en') === 'ar' ? 'خدماتنا الأساسية' : 'Our Core Services' }}
                    </h2>
                    <div class="flex gap-1 justify-center">
                        <span class="w-12 h-1 bg-white rounded-full"></span>
                        <span class="w-2 h-1 bg-white rounded-full"></span>
                    </div>
                    <p class="text-jood-accent text-lg">
                        {{ session('locale', 'en') === 'ar' ? 'لأن الجودة تبدأ من الخدمة' : 'Because quality starts with service' }}
                    </p>

                </div>

                <!-- Card 2: Transport (Left in RTL) -->
                <!-- Mobile: Order 3, Desktop: Order 3 (or natural flow) -->
                <div class="bg-jood-light rounded-3xl p-6 order-3 lg:order-none" data-aos="fade-up"
                    data-aos-delay="200">
                    <div
                        class="flex items-start gap-4 {{ session('locale', 'en') === 'ar' ? 'flex-row-reverse' : '' }}">
                        <div class="w-14 h-14 bg-jood-green rounded-xl flex items-center justify-center flex-shrink-0">
                            <!-- Truck Icon -->
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                            </svg>
                        </div>
                        <div class="flex-1 {{ session('locale', 'en') === 'ar' ? 'text-right' : 'text-left' }}">
                            <h3 class="text-lg font-bold text-jood-green mb-2">
                                {{ session('locale', 'en') === 'ar' ? 'النقل المبرد عبر أسطول جود هارفيست' : 'Refrigerated Transport via Jood Harvest Fleet' }}
                            </h3>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                {{ session('locale', 'en') === 'ar' ? 'بأسطول نقل مبرد متطور، تضمن جود هارفيست وصول منتجاتك طازجة وآمنة في كل رحلة.' : 'With our advanced refrigerated fleet, Jood Harvest ensures your products arrive fresh and safe on every journey.' }}
                            </p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Bottom Row - 1 Centered Card -->
            <div class="flex justify-center">
                <div class="bg-jood-light rounded-3xl p-6 max-w-lg w-full" data-aos="fade-up" data-aos-delay="300">
                    <div
                        class="flex items-start gap-4 {{ session('locale', 'en') === 'ar' ? 'flex-row-reverse' : '' }}">
                        <div class="w-14 h-14 bg-jood-green rounded-xl flex items-center justify-center flex-shrink-0">
                            <!-- Warehouse/Storage Icon -->
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                            </svg>
                        </div>
                        <div class="flex-1 {{ session('locale', 'en') === 'ar' ? 'text-right' : 'text-left' }}">
                            <h3 class="text-lg font-bold text-jood-green mb-2">
                                {{ session('locale', 'en') === 'ar' ? 'التخزين المبرد وإدارة المخازن' : 'Cold Storage & Warehouse Management' }}
                            </h3>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                {{ session('locale', 'en') === 'ar' ? 'نوفر حلول تخزين مبردة متطورة مع إدارة مخازن دقيقة تضمن سلامة المنتجات وجودتها في كل مرحلة.' : 'We provide advanced cold storage solutions with precise warehouse management ensuring product safety and quality at every stage.' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Who We Serve Section -->
    <section id="clients" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 md:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl flex justify-start md:text-4xl font-bold text-jood-green mb-4">
                    {{ session('locale', 'en') === 'ar' ? 'لمن نقدم الخدمة' : 'Who We Serve' }}
                </h2>
                <div class="flex gap-1 justify-start">
                    <span class="w-12 h-1 bg-jood-green rounded-full"></span>
                    <span class="w-2 h-1 bg-jood-green rounded-full"></span>
                </div>
                <p class="text-gray-600 text-lg flex justify-start">
                    {{ session('locale', 'en') === 'ar' ? 'نقدم منتجات عالية الجودة لتلبية احتياجات مختلف  القطاعات الغذائية بكفاءة...' : 'We offer high-quality products to efficiently meet the needs of various food sectors...' }}
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                @php
                    $clients = [
                        [
                            'icon' =>
                                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>',
                            'ar' => 'السوبرماركت',
                            'en' => 'Supermarkets',
                        ],
                        [
                            'icon' =>
                                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>',
                            'ar' => 'المطاعم والفنادق',
                            'en' => 'Restaurants & Hotels',
                        ],
                        [
                            'icon' =>
                                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>',
                            'ar' => 'شركات التوريد',
                            'en' => 'Food Suppliers',
                        ],
                        [
                            'icon' =>
                                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>',
                            'ar' => 'معامل تجهيز الأغذية',
                            'en' => 'Food Processing',
                        ],
                        [
                            'icon' =>
                                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>',
                            'ar' => 'شركات البيع بالجملة',
                            'en' => 'Wholesalers',
                        ],
                    ];
                @endphp

                @foreach ($clients as $index => $client)
                    <div class="bg-jood-light rounded-3xl p-4 text-center" data-aos="zoom-in"
                        data-aos-delay="{{ $index * 100 }}">
                        <div
                            class="w-12 h-12 bg-jood-light-75 rounded-lg flex items-center justify-center mx-auto mb-3 shadow-sm">
                            <svg class="w-6 h-6 text-jood-green" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">{!! $client['icon'] !!}</svg>
                        </div>
                        <h3 class="font-bold text-jood-green text-sm">
                            {{ session('locale', 'en') === 'ar' ? $client['ar'] : $client['en'] }}</h3>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-12 md:py-20 bg-white overflow-hidden">
        <div class="max-w-6xl mx-auto px-4 md:px-8">
            <div class="bg-[#a1bd68] rounded-3xl relative p-6 md:p-12 lg:p-12" data-aos="fade-up">
                <div class="grid md:grid-cols-2 gap-0 items-center">


                    <!-- Content Side -->
                    <div
                        class="p-6 md:p-12 lg:p-12 {{ session('locale', 'en') === 'ar' ? 'md:order-2 text-right' : 'md:order-1 text-left' }}">
                        <h2 class="text-xl md:text-2xl lg:text-2xl font-bold text-jood-green-dark leading-tight mb-4">
                            {{ session('locale', 'en') === 'ar' ? 'جودة تُحفظ بعناية ، طعم طبيعي يدوم وثقة تبدأ من أول تجربة' : 'Quality preserved with care, natural taste that lasts, and trust starting from the first experience' }}
                        </h2>
                        <p class="text-white text-base md:text-lg mb-6">
                            {{ session('locale', 'en') === 'ar' ? 'عناية دقيقة في كل خطوة، وجودة تُلاحظ من أول تجربة.' : 'Meticulous care at every step, and quality you notice from the first experience.' }}
                        </p>
                        <a href="#contact"
                            class="inline-block w-full  bg-jood-green text-center text-white px-8 py-3 rounded-xl font-bold text-lg hover:bg-jood-green-dark transition shadow-lg">
                            {{ session('locale', 'en') === 'ar' ? 'تواصل معنا' : 'Contact Us' }}
                        </a>
                    </div>
                    <!-- Truck Image Side - Extends outside the card -->
                    <div
                        class="relative  {{ session('locale', 'en') === 'ar' ? 'md:order-2' : 'md:order-1' }} p-6 md:p-0">
                        <img src="{{ asset('images/cta-truck.png') }}" alt="Jood Harvest Truck"
                            class="w-full max-w-md mx-auto md:max-w-none md:absolute md:top-1/2 md:-translate-y-1/2 {{ session('locale', 'en') === 'ar' ? 'md:left-0 md:-translate-x-1/4 lg:-translate-x-1/3' : 'md:right-0 md:translate-x-1/4 lg:translate-x-1/3' }} md:w-auto md:h-auto object-contain"
                            style="max-height: 280px; min-width: 400px;">
                    </div>

                </div>
            </div>
        </div>
    </section>


    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-white overflow-visible"
        dir="{{ session('locale', 'en') === 'ar' ? 'rtl' : 'ltr' }}">
        <div class="max-w-6xl mx-auto px-4 md:px-8">
            <div class="relative flex flex-col md:block">

                <!-- Contact Info Card - Out of frame -->
                <div class="order-1 md:absolute md:top-[18%] md:-translate-y-1/2 z-20 w-full md:w-80 lg:w-96 md:p-6
                        {{ session('locale', 'en') === 'ar' ? 'md:-left-16 lg:-left-24' : 'md:-right-16 lg:-right-24' }}"
                    data-aos="fade-right">

                    <div
                        class="bg-jood-green text-white rounded-3xl p-8 md:p-10 shadow-2xl flex flex-col justify-start items-center text-center">

                        <div class="mb-8 w-full">
                            <h4 class="text-2xl flex justify-start font-bold mb-2">
                                {{ session('locale', 'en') === 'ar' ? 'معلومات التواصل' : 'Contact Info' }}
                            </h4>
                            <div class="flex gap-1 justify-start">
                                <span class="w-12 h-1 bg-white/50 rounded-full"></span>
                                <span class="w-2 h-1 bg-white/50 rounded-full"></span>
                            </div>
                        </div>

                        <div class="space-y-6 w-full">
                            <div
                                class="flex items-center gap-4 justify-start {{ session('locale', 'en') === 'ar' ? '' : '' }}">
                                <div
                                    class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <p class="text-sm text-white/90">
                                    Hanki 54Świętochłowi5
                                </p>
                            </div>

                            <div
                                class="flex items-center gap-4 justify-start {{ session('locale', 'en') === 'ar' ? '' : '' }}">
                                <div
                                    class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                    </svg>
                                </div>
                                <p class="text-sm text-white/90">nvt.isst.nute@gmail.com</p>
                            </div>

                            <div
                                class="flex items-center gap-4 justify-start {{ session('locale', 'en') === 'ar' ? '' : '' }}">
                                <div
                                    class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                    </svg>
                                </div>
                                <p class="text-sm text-white/90" dir="ltr">+966 XXXX XXX XX</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Container -->
                <div class="order-2 bg-[#d4e4bc] rounded-3xl p-8 md:py-16 md:px-12 mt-6 md:mt-0 min-h-[500px] flex flex-col justify-center
                        {{ session('locale', 'en') === 'ar' ? 'md:pl-80 lg:pl-72 md:pr-12' : 'md:pr-80 lg:pr-72 md:pl-12' }}"
                    data-aos="fade-up">

                    @if (session('success'))
                        <div class="bg-green-100 border border-green-600 text-green-800 px-6 py-4 rounded-lg mb-6">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contact.store') }}">
                        @csrf

                        <div class="grid md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-bold text-jood-green-dark mb-2">
                                    {{ session('locale', 'en') === 'ar' ? 'الأسم' : 'Name' }}
                                </label>
                                <input type="text" name="name" required
                                    placeholder="{{ session('locale', 'en') === 'ar' ? 'الأسم' : 'Your Name' }}"
                                    class="w-full px-4 py-3 bg-white border-none rounded-lg focus:ring-2 focus:ring-jood-green outline-none placeholder-gray-400">
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-jood-green-dark mb-2">
                                    {{ session('locale', 'en') === 'ar' ? 'البريد الإلكتروني' : 'Email' }}
                                </label>
                                <input type="email" name="email" required
                                    placeholder="{{ session('locale', 'en') === 'ar' ? 'البريد الإلكتروني' : 'Your Email' }}"
                                    class="w-full px-4 py-3 bg-white border-none rounded-lg focus:ring-2 focus:ring-jood-green outline-none placeholder-gray-400">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-bold text-jood-green-dark mb-2">
                                {{ session('locale', 'en') === 'ar' ? 'رقم الهاتف (اختياري)' : 'Phone (Optional)' }}
                            </label>
                            <input type="tel" name="phone"
                                placeholder="{{ session('locale', 'en') === 'ar' ? 'رقم الهاتف' : 'Your Phone' }}"
                                class="w-full px-4 py-3 bg-white border-none rounded-lg focus:ring-2 focus:ring-jood-green outline-none placeholder-gray-400">
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-bold text-jood-green-dark mb-2">
                                {{ session('locale', 'en') === 'ar' ? 'نص الرسالة' : 'Message' }}
                            </label>
                            <textarea name="message" rows="4" required
                                placeholder="{{ session('locale', 'en') === 'ar' ? 'نص الرسالة' : 'Your Message' }}"
                                class="w-full px-4 py-3 bg-white border-none rounded-lg focus:ring-2 focus:ring-jood-green outline-none resize-none placeholder-gray-400"></textarea>
                        </div>

                        <button type="submit"
                            class="w-full bg-jood-green text-white py-3 rounded-lg font-bold text-lg hover:bg-opacity-90 transition shadow-lg">
                            {{ session('locale', 'en') === 'ar' ? 'ارسال' : 'Send' }}
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-16" style="background: linear-gradient(to right, #ebede9, #fdfdfd 50%, #ebede9);">
        <div class="max-w-6xl mx-auto px-4 md:px-8">
            <!-- Centered Logo -->
            <div class="text-center mb-8">
                <img src="{{ asset('images/logo.png') }}" class="h-20 md:h-24 mx-auto mb-4" alt="Jood Harvest">
                <p class="text-jood-green-dark text-lg">
                    {{ session('locale', 'en') === 'ar' ? 'نهتم بكل تفصيلة لنوصّل لك أفضل منتج بأعلى جودة' : 'We care about every detail to deliver the best product with the highest quality' }}
                </p>
            </div>

            <!-- Navigation Links -->
            <nav class="mb-8">
                <ul class="flex flex-wrap justify-center items-center gap-4 md:gap-8 text-jood-green-dark font-medium">
                    <li>
                        <a href="#home" class="hover:text-jood-green transition">
                            {{ session('locale', 'en') === 'ar' ? 'الرئيسية' : 'Home' }}
                        </a>
                    </li>
                    <li class="text-jood-accent hidden md:block">|</li>
                    <li>
                        <a href="#about" class="hover:text-jood-green transition">
                            {{ session('locale', 'en') === 'ar' ? 'من نحن' : 'About Us' }}
                        </a>
                    </li>
                    <li class="text-jood-accent hidden md:block">|</li>
                    <li>
                        <a href="#clients" class="hover:text-jood-green transition">
                            {{ session('locale', 'en') === 'ar' ? 'لمن نقدم الخدمة' : 'Who We Serve' }}
                        </a>
                    </li>
                    <li class="text-jood-accent hidden md:block">|</li>
                    <li>
                        <a href="#why-us" class="hover:text-jood-green transition">
                            {{ session('locale', 'en') === 'ar' ? 'لماذا تختار هارفيست' : 'Why Choose Harvest' }}
                        </a>
                    </li>
                    <li class="text-jood-accent hidden md:block">|</li>
                    <li>
                        <a href="#services" class="hover:text-jood-green transition">
                            {{ session('locale', 'en') === 'ar' ? 'خدماتنا' : 'Our Services' }}
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Social Media Icons -->
            <div class="flex justify-center items-center gap-4">
                <a href="#"
                    class="w-10 h-10 bg-gradient-to-br from-pink-500 via-red-500 to-yellow-500 rounded-lg flex items-center justify-center text-white hover:opacity-80 transition">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                    </svg>
                </a>
                <a href="#"
                    class="w-10 h-10 bg-[#0A66C2] rounded-lg flex items-center justify-center text-white hover:opacity-80 transition">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                    </svg>
                </a>
                <a href="#"
                    class="w-10 h-10 bg-[#1877F2] rounded-lg flex items-center justify-center text-white hover:opacity-80 transition">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                    </svg>
                </a>
            </div>

            <!-- Copyright -->
            <div class="mt-8 pt-6 border-t border-jood-accent/30 text-center">
                <p class="text-jood-green-dark/60 text-sm">
                    &copy; {{ date('Y') }}
                    {{ session('locale', 'en') === 'ar' ? 'جود هارفيست. جميع الحقوق محفوظة.' : 'Jood Harvest. All rights reserved.' }}
                </p>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
            offset: 50
        });
    </script>
</body>

</html>
