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
            overflow-x: hidden;
        }

        body {
            overflow-x: hidden;
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

        /* Mobile-specific section padding reduction */
        @media (max-width: 768px) {
            .why-us-section {
                padding: 2.5rem 0;
            }
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
                gap: var(--spacing-md);
            }

            /* Reset staggered effect on mobile */
            .why-us-cards-grid .why-card:nth-child(odd) {
                transform: none;
            }

            .why-card {
                text-align: center;
                padding: var(--spacing-lg);
            }

            .why-icon {
                margin: 0 auto var(--spacing-sm) auto;
                width: 48px;
                height: 48px;
            }

            .why-card h3 {
                font-size: 1.1rem;
                margin-bottom: 0.25rem;
            }

            .why-card p {
                font-size: 0.875rem;
                line-height: 1.5;
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

        /* Hide abstract shapes on mobile to prevent overflow */
        @media (max-width: 768px) {
            .side-abstract {
                display: none;
            }
        }

        /* ============================================= */
        /* MODERN MOBILE-ONLY STYLES - Cool & Premium   */
        /* ============================================= */

        /* Mobile Menu Overlay Backdrop */
        @media (max-width: 768px) {
            .mobile-menu-backdrop {
                position: fixed;
                inset: 0;
                background: rgba(0, 0, 0, 0.4);
                backdrop-filter: blur(4px);
                z-index: 55;
                opacity: 0;
                visibility: hidden;
                transition: all 0.3s ease;
            }

            .mobile-menu-backdrop.active {
                opacity: 1;
                visibility: visible;
            }

            /* Modern Slide-in Mobile Menu */
            .mobile-menu-drawer {
                position: fixed;
                top: 0;
                right: 0;
                width: 80%;
                max-width: 320px;
                height: 100vh;
                background: linear-gradient(180deg, #3A522A 0%, #29391D 100%);
                z-index: 60;
                transform: translateX(100%);
                transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
                padding: 2rem 1.5rem;
                overflow-y: auto;
            }

            [dir="rtl"] .mobile-menu-drawer {
                right: auto;
                left: 0;
                transform: translateX(-100%);
            }

            .mobile-menu-drawer.active {
                transform: translateX(0);
            }

            .mobile-menu-drawer .menu-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 2rem;
                padding-bottom: 1rem;
                border-bottom: 1px solid rgba(255, 255, 255, 0.15);
            }

            .mobile-menu-drawer .menu-close {
                width: 40px;
                height: 40px;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.1);
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                transition: all 0.3s ease;
            }

            .mobile-menu-drawer .menu-close:active {
                background: rgba(255, 255, 255, 0.2);
                transform: scale(0.95);
            }

            .mobile-menu-drawer nav a {
                display: flex;
                align-items: center;
                gap: 1rem;
                padding: 1rem;
                color: white;
                font-size: 1.1rem;
                font-weight: 600;
                border-radius: 12px;
                transition: all 0.3s ease;
                margin-bottom: 0.5rem;
            }

            .mobile-menu-drawer nav a:hover,
            .mobile-menu-drawer nav a:active {
                background: rgba(255, 255, 255, 0.1);
            }

            .mobile-menu-drawer nav a .nav-icon {
                width: 40px;
                height: 40px;
                border-radius: 10px;
                background: rgba(255, 255, 255, 0.1);
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .mobile-menu-drawer .lang-switcher {
                display: flex;
                gap: 0.5rem;
                margin-top: 1.5rem;
                padding-top: 1.5rem;
                border-top: 1px solid rgba(255, 255, 255, 0.15);
            }

            .mobile-menu-drawer .lang-btn {
                flex: 1;
                padding: 0.75rem;
                border-radius: 10px;
                text-align: center;
                font-weight: 600;
                transition: all 0.3s ease;
                background: rgba(255, 255, 255, 0.1);
                color: white;
            }

            .mobile-menu-drawer .lang-btn.active {
                background: white;
                color: #3A522A;
            }

            /* Modern Hero Section Mobile */
            #home {
                min-height: auto !important;
                padding-top: 100px;
                padding-bottom: 0;
            }

            /* Remove min-height from inner container */
            #home > div.relative.z-10 {
                min-height: auto !important;
            }

            #home .grid {
                padding-top: 0.5rem !important;
                padding-bottom: 0 !important;
            }

            /* Reduce Image Side top padding */
            #home .order-2 {
                padding-top: 0 !important;
            }

            /* Reduce Hero bottom padding and Why Us top padding */
            .why-us-section {
                padding-top: 0.5rem !important;
                margin-top: 0;
            }

            /* Floating Decorative Orb */
            .mobile-hero-orb {
                position: absolute;
                width: 200px;
                height: 200px;
                border-radius: 50%;
                background: linear-gradient(135deg, rgba(201, 217, 167, 0.4) 0%, rgba(58, 82, 42, 0.2) 100%);
                filter: blur(40px);
                animation: float-orb 6s ease-in-out infinite;
                z-index: 0;
            }

            @keyframes float-orb {
                0%, 100% { transform: translate(0, 0) scale(1); }
                50% { transform: translate(-20px, -30px) scale(1.1); }
            }

            /* Glassmorphism Card Effect */
            .glass-card {
                background: rgba(255, 255, 255, 0.85);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.5);
                box-shadow: 0 8px 32px rgba(58, 82, 42, 0.1);
            }

            /* Mobile Why Us Cards - Horizontal Scroll */
            .why-us-cards-grid {
                display: flex !important;
                overflow-x: auto;
                scroll-snap-type: x mandatory;
                gap: 1rem;
                padding: 0.5rem;
                margin: 0 -1rem;
                padding-left: 1rem;
                padding-right: 1rem;
                scrollbar-width: none;
                -ms-overflow-style: none;
            }

            .why-us-cards-grid::-webkit-scrollbar {
                display: none;
            }

            .why-us-cards-grid .why-card {
                flex: 0 0 280px;
                scroll-snap-align: center;
                transform: none !important;
                background: linear-gradient(145deg, var(--color-accent-lime-light) 0%, rgba(217, 228, 193, 0.8) 100%);
                border: 1px solid rgba(255, 255, 255, 0.5);
                box-shadow: 0 4px 20px rgba(58, 82, 42, 0.08);
            }

            /* Scroll Indicator Dots */
            .scroll-indicator {
                display: flex;
                justify-content: center;
                gap: 8px;
                margin-top: 1rem;
            }

            .scroll-indicator span {
                width: 8px;
                height: 8px;
                border-radius: 50%;
                background: var(--color-accent-lime-light);
                transition: all 0.3s ease;
            }

            .scroll-indicator span.active {
                width: 24px;
                border-radius: 4px;
                background: var(--color-primary-green);
            }

            /* Mobile Section Titles with Animated Underline */
            .section-title-mobile {
                position: relative;
                display: inline-block;
            }

            .section-title-mobile::after {
                content: '';
                position: absolute;
                bottom: -8px;
                left: 50%;
                transform: translateX(-50%);
                width: 60px;
                height: 3px;
                background: linear-gradient(90deg, transparent, var(--color-primary-green), transparent);
                border-radius: 2px;
            }

            /* Mobile Services Cards - Stack with Offset */
            #services .grid {
                gap: 1rem !important;
            }

            #services .bg-jood-light {
                position: relative;
                overflow: hidden;
            }

            #services .bg-jood-light::before {
                content: '';
                position: absolute;
                top: 0;
                right: 0;
                width: 80px;
                height: 80px;
                background: linear-gradient(135deg, rgba(58, 82, 42, 0.05) 0%, transparent 70%);
                border-radius: 0 1.5rem 0 50%;
            }

            /* Mobile Clients Grid - 2x2 with subtle animation */
            #clients .grid {
                gap: 1rem !important;
            }

            #clients .bg-jood-light {
                padding: 1rem !important;
                transition: all 0.3s ease;
            }

            #clients .bg-jood-light:active {
                transform: scale(0.97);
            }

            /* Mobile CTA - Full width beautiful card */
            .bg-\[\#a1bd68\] {
                border-radius: 1.5rem !important;
            }

            /* Mobile Contact Section */
            #contact .bg-\[\\#d4e4bc\] {
                border-radius: 1.5rem !important;
                padding: 1.5rem !important;
            }

            /* Floating Bottom Navigation */
            .mobile-bottom-nav {
                position: fixed;
                bottom: 0;
                left: 0;
                right: 0;
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(10px);
                border-top: 1px solid rgba(58, 82, 42, 0.1);
                padding: 0.5rem 1rem;
                padding-bottom: calc(0.5rem + env(safe-area-inset-bottom, 0));
                z-index: 50;
                display: none;
            }

            .mobile-bottom-nav .nav-items {
                display: flex;
                justify-content: space-around;
                align-items: center;
            }

            .mobile-bottom-nav a {
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 0.25rem;
                padding: 0.5rem;
                color: #666;
                font-size: 0.65rem;
                font-weight: 500;
                transition: all 0.3s ease;
                border-radius: 0.75rem;
            }

            .mobile-bottom-nav a:active {
                background: rgba(58, 82, 42, 0.1);
            }

            .mobile-bottom-nav a.active,
            .mobile-bottom-nav a:hover {
                color: var(--color-primary-green);
            }

            .mobile-bottom-nav a .nav-icon-wrap {
                width: 32px;
                height: 32px;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 8px;
                transition: all 0.3s ease;
            }

            .mobile-bottom-nav a.active .nav-icon-wrap {
                background: linear-gradient(135deg, var(--color-primary-green), var(--color-primary-green-dark));
                color: white;
            }

            /* Add padding to body for bottom nav */
            body {
                padding-bottom: 70px;
            }

            /* Show bottom nav on mobile */
            .mobile-bottom-nav {
                display: block;
            }

            /* Modern Mobile Header */
            header nav {
                padding: 0.75rem 1rem !important;
                background: rgba(233, 244, 211, 0.95) !important;
                backdrop-filter: blur(10px) !important;
            }

            /* Pulse Animation for CTA Button */
            .pulse-btn {
                animation: pulse-glow 2s ease-in-out infinite;
            }

            @keyframes pulse-glow {
                0%, 100% {
                    box-shadow: 0 0 0 0 rgba(58, 82, 42, 0.4);
                }
                50% {
                    box-shadow: 0 0 20px 5px rgba(58, 82, 42, 0.2);
                }
            }

            /* Fade-in Animation for Mobile Elements */
            .mobile-fade-in {
                animation: mobile-fade 0.6s ease forwards;
            }

            @keyframes mobile-fade {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            /* Stagger delay classes */
            .delay-1 { animation-delay: 0.1s; }
            .delay-2 { animation-delay: 0.2s; }
            .delay-3 { animation-delay: 0.3s; }
            .delay-4 { animation-delay: 0.4s; }

            /* Mobile Card Hover State (Touch Feedback) */
            .touch-card {
                transition: transform 0.2s ease, box-shadow 0.2s ease;
            }

            .touch-card:active {
                transform: scale(0.98);
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            }

            /* Gradient Text for Headings */
            .gradient-text {
                background: linear-gradient(135deg, var(--color-primary-green) 0%, var(--color-primary-green-dark) 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }

            /* Footer adjustment for bottom nav */
            footer {
                padding-bottom: 80px !important;
            }
        }

        /* Desktop only - hide mobile elements */
        @media (min-width: 769px) {
            .mobile-only {
                display: none !important;
            }
            .mobile-bottom-nav {
                display: none !important;
            }
            body {
                padding-bottom: 0;
            }
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
            <button @click="mobileMenu = !mobileMenu" class="md:hidden p-2 rounded-lg hover:bg-white/50 transition">
                <svg class="w-6 h-6 text-jood-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </nav>
    </header>

    <!-- Modern Mobile Menu Backdrop -->
    <div class="mobile-menu-backdrop md:hidden" 
         :class="{ 'active': mobileMenu }" 
         @click="mobileMenu = false"></div>

    <!-- Modern Mobile Menu Drawer -->
    <div class="mobile-menu-drawer md:hidden" :class="{ 'active': mobileMenu }">
        <div class="menu-header">
            <img src="{{ asset('images/logo.png') }}" class="h-10" alt="Jood Harvest">
            <button @click="mobileMenu = false" class="menu-close">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        
        <nav>
            <a href="#home" @click="mobileMenu = false">
                <span class="nav-icon">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                </span>
                {{ session('locale', 'en') === 'ar' ? 'الرئيسية' : 'Home' }}
            </a>
            <a href="#why-us" @click="mobileMenu = false">
                <span class="nav-icon">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </span>
                {{ session('locale', 'en') === 'ar' ? 'لماذا نحن' : 'Why Us' }}
            </a>
            <a href="#services" @click="mobileMenu = false">
                <span class="nav-icon">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </span>
                {{ session('locale', 'en') === 'ar' ? 'خدماتنا' : 'Services' }}
            </a>
            <a href="#clients" @click="mobileMenu = false">
                <span class="nav-icon">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </span>
                {{ session('locale', 'en') === 'ar' ? 'عملاؤنا' : 'Clients' }}
            </a>
            <a href="#contact" @click="mobileMenu = false" class="!bg-white/10">
                <span class="nav-icon !bg-white/20">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </span>
                {{ session('locale', 'en') === 'ar' ? 'تواصل معنا' : 'Contact Us' }}
            </a>
        </nav>

        <div class="lang-switcher">
            <a href="{{ route('locale.change', 'en') }}" 
               class="lang-btn {{ session('locale', 'en') === 'en' ? 'active' : '' }}">
                English
            </a>
            <a href="{{ route('locale.change', 'ar') }}" 
               class="lang-btn {{ session('locale', 'en') === 'ar' ? 'active' : '' }}">
                العربية
            </a>
        </div>
    </div>

    <!-- Hero Section -->
    <section id="home" class="min-h-screen relative overflow-hidden ">
        <!-- Background with gradient overlay -->
        <div class="absolute inset-0 "></div>

        <!-- Abstract decorative elements -->
        <div class="absolute inset-0 abstract-dots opacity-30"></div>

        <!-- Mobile-only Floating Decorative Orbs -->
        <div class="mobile-hero-orb md:hidden" style="top: 10%; right: -50px;"></div>
        <div class="mobile-hero-orb md:hidden" style="bottom: 20%; left: -80px; animation-delay: -3s; width: 150px; height: 150px;"></div>

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
                <div class="grid lg:grid-cols-2 gap-6 lg:gap-8 items-center pt-24 lg:pt-32 pb-8 lg:pb-0">

                    <!-- Image Side -->
                    <div class="order-2 lg:order-2 pt-2 lg:pt-64" data-aos="fade-up">
                        <div class="relative">
                            @if (isset($content['hero']) &&
                                    $content['hero']->firstWhere('key', 'image') &&
                                    $content['hero']->firstWhere('key', 'image')->value_en)
                                <img src="{{ asset($content['hero']->firstWhere('key', 'image')->value_en) }}"
                                    alt="Hero" class="w-full max-w-md lg:max-w-2xl mx-auto">
                            @else
                                <img src="{{ asset('images/hero-truck.png') }}" alt="Jood Harvest"
                                    class="w-full max-w-md lg:max-w-2xl mx-auto"
                                    onerror="this.src='https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?w=800'">
                            @endif
                            <!-- Bottom fade -->
                            <div
                                class="absolute bottom-0 left-[-15%] right-[0%] h-32 mx-auto max-w-2xl bg-gradient-to-t from-white to-transparent">
                            </div>
                        </div>
                    </div>

                    <!-- Content Side -->
                    <div class="order-1 lg:order-1 {{ session('locale', 'en') === 'ar' ? 'text-right' : 'text-left' }} px-2 sm:px-4 lg:px-8"
                        data-aos="fade-up" data-aos-delay="200">
                        <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-jood-green leading-tight mb-4 lg:mb-6">
                            @if (session('locale', 'en') === 'ar')
                                {{ $content['hero']->firstWhere('key', 'title')->value_ar ?? 'منتجات غذائية مبردة ومجمدة بجودة تثق بها' }}
                            @else
                                {{ $content['hero']->firstWhere('key', 'title')->value_en ?? 'Refrigerated and frozen food products with quality you trust' }}
                            @endif
                        </h1>
                        <p
                            class="text-base sm:text-lg md:text-xl text-gray-700 leading-relaxed mb-4 lg:mb-8 max-w-lg {{ session('locale', 'en') === 'ar' ? 'mr-0 ml-auto' : '' }}">
                            @if (session('locale', 'en') === 'ar')
                                {{ $content['hero']->firstWhere('key', 'description')->value_ar ?? 'نختص في استيراد وتخزين وتوزيع المنتجات الغذائية المبردة والمجمدة بجودة عالية والتزام تام بالمعايير العالمية.' }}
                            @else
                                {{ $content['hero']->firstWhere('key', 'description')->value_en ?? 'We specialize in importing, storing, and distributing chilled and frozen food products with high quality and full compliance to international standards.' }}
                            @endif
                        </p>
                        <a href="#contact"
                            class="inline-flex items-center gap-2 px-6 sm:px-8 py-2.5 sm:py-3 border-2 border-jood-green text-jood-green rounded-full font-bold text-base sm:text-lg hover:bg-jood-green hover:text-white transition">
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
                            <svg width="42" height="37" viewBox="0 0 32 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.66916 25.15C9.46916 25 9.21916 24.85 9.01916 24.75C9.06916 24.35 9.01916 23.9 8.91916 23.45C8.71916 22.7 8.31916 22 7.76916 21.35C7.26916 21.75 7.01916 22.45 7.11916 23.2C6.76916 22.85 6.41916 22.5 6.11916 22.15C6.31916 21.8 6.41916 21.35 6.41916 20.9C6.46916 20.15 6.31916 19.4 5.96916 18.65C5.31916 18.9 4.91916 19.55 4.81916 20.3C4.56916 19.9 4.36916 19.45 4.16916 19.05C4.46916 18.75 4.71916 18.35 4.86916 17.9C5.11916 17.2 5.16916 16.45 5.01916 15.65C4.31916 15.75 3.71916 16.25 3.41916 17C3.26916 16.5 3.16916 16.05 3.11916 15.55C3.51916 15.35 3.86916 15 4.11916 14.6C4.51916 14 4.81916 13.25 4.86916 12.45C4.11916 12.35 3.36916 12.75 2.91916 13.45C2.91916 12.95 2.96916 12.4 3.01916 11.9C3.46916 11.8 3.91916 11.55 4.31916 11.25C4.86916 10.8 5.31916 10.15 5.61916 9.4C4.91916 9.1 4.06916 9.3 3.41916 9.9C3.56916 9.4 3.71916 8.85 3.91916 8.35C4.41916 8.4 4.91916 8.25 5.36916 8.05C6.01916 7.75 6.61916 7.25 7.11916 6.55C6.51916 6.05 5.61916 6.05 4.81916 6.5C5.11916 6 5.41916 5.55 5.76916 5.1C6.21916 5.3 6.76916 5.3 7.31916 5.2C8.06916 5.05 8.81916 4.75 9.51916 4.2C9.06916 3.55 8.16916 3.3 7.21916 3.55C7.91916 2.9 8.66916 2.3 9.56916 1.8C9.81916 1.65 9.91916 1.35 9.76916 1.1C9.61916 0.85 9.26916 0.75 9.01916 0.9C8.06916 1.45 7.21916 2.1 6.46916 2.8C6.86916 1.8 6.91916 0.9 6.46916 0.2C5.56916 0.8 4.91916 1.8 4.76916 2.65C4.61916 3.3 4.71916 3.85 5.01916 4.3C4.61916 4.8 4.26916 5.35 3.96916 5.85C4.06916 4.8 3.81916 3.9 3.21916 3.4C2.51916 4.35 2.21916 5.45 2.31916 6.3C2.36916 6.95 2.61916 7.45 3.01916 7.8C2.76916 8.4 2.56916 8.95 2.41916 9.55C2.21916 8.55 1.76916 7.75 1.01916 7.4C0.61916 8.5 0.61916 9.6 0.91916 10.4C1.16916 11 1.51916 11.4 2.01916 11.65C1.91916 12.25 1.91916 12.85 1.91916 13.45C1.46916 12.55 0.81916 11.95 0.0191602 11.85C-0.0808398 13 0.21916 14.05 0.71916 14.75C1.06916 15.25 1.56916 15.55 2.06916 15.65C2.11916 16.25 2.26916 16.8 2.36916 17.35C1.71916 16.65 0.96916 16.25 0.16916 16.35C0.36916 17.5 0.91916 18.45 1.61916 18.95C2.06916 19.35 2.61916 19.5 3.06916 19.45C3.26916 19.95 3.51916 20.5 3.76916 20.95C2.91916 20.6 2.11916 20.4 1.41916 20.7C1.91916 21.75 2.71916 22.55 3.51916 22.9C4.06916 23.15 4.56916 23.15 5.01916 23.05C5.36916 23.5 5.71916 23.9 6.11916 24.3C5.26916 24.1 4.51916 24.15 3.96916 24.6C4.76916 25.5 5.81916 26.05 6.71916 26.2C7.26916 26.3 7.76916 26.2 8.16916 26C8.36916 26.15 8.61916 26.3 8.81916 26.45C9.21916 26.7 9.71916 26.55 9.91916 26.15C10.1192 25.8 10.0192 25.35 9.66916 25.15ZM29.5692 17.35C29.7192 16.8 29.8192 16.2 29.8692 15.65C30.3692 15.55 30.8192 15.25 31.2192 14.75C31.7192 14.05 32.0192 13 31.9192 11.85C31.1192 11.95 30.4692 12.6 30.0192 13.45C30.0192 12.85 29.9692 12.25 29.9192 11.65C30.3692 11.45 30.7692 11 31.0192 10.4C31.3192 9.6 31.3692 8.5 30.9192 7.4C30.1692 7.75 29.7192 8.55 29.5192 9.55C29.3692 8.95 29.1692 8.35 28.9192 7.8C29.3192 7.45 29.5692 6.95 29.6192 6.3C29.7192 5.45 29.4192 4.35 28.7192 3.4C28.0692 3.9 27.8692 4.85 27.9692 5.85C27.5692 5.3 27.2192 4.8 26.8192 4.3C27.1192 3.9 27.2192 3.3 27.0692 2.65C26.9192 1.8 26.2692 0.8 25.2692 0C24.8192 0.65 24.8692 1.6 25.2692 2.6C24.5192 1.9 23.6692 1.25 22.7192 0.7C22.4692 0.55 22.1192 0.65 21.9692 0.9C21.8192 1.15 21.9192 1.45 22.1692 1.6C23.0192 2.1 23.8192 2.7 24.5192 3.35C23.5692 3.1 22.6692 3.35 22.2192 4C22.9192 4.55 23.6692 4.85 24.4192 5C24.9692 5.1 25.5192 5.1 25.9692 4.9C26.3192 5.35 26.6692 5.85 26.9192 6.3C26.1192 5.85 25.2192 5.85 24.6192 6.35C25.1192 7 25.7192 7.55 26.3692 7.85C26.8692 8.1 27.3692 8.2 27.8192 8.15C28.0192 8.65 28.1692 9.15 28.3192 9.7C27.6692 9.1 26.8192 8.9 26.1192 9.2C26.4192 9.95 26.8692 10.6 27.4192 11.05C27.8192 11.4 28.2692 11.6 28.7192 11.7C28.7692 12.2 28.8192 12.75 28.8192 13.25C28.3692 12.55 27.6192 12.15 26.8692 12.25C26.9692 13.05 27.2192 13.8 27.6192 14.4C27.8692 14.8 28.2192 15.15 28.6192 15.35C28.5192 15.85 28.4192 16.3 28.3192 16.8C28.0192 16.05 27.4692 15.5 26.7192 15.45C26.5692 16.25 26.6692 17.05 26.8692 17.7C27.0192 18.15 27.2192 18.55 27.5692 18.85C27.3692 19.3 27.1692 19.7 26.9192 20.1C26.8192 19.35 26.4192 18.7 25.7692 18.45C25.4192 19.2 25.2692 19.95 25.3192 20.7C25.3192 21.15 25.4192 21.6 25.6192 21.95C25.3192 22.3 24.9692 22.65 24.6192 23C24.7192 22.25 24.5192 21.55 23.9692 21.15C23.4192 21.8 23.0192 22.5 22.8192 23.25C22.7192 23.7 22.6692 24.15 22.7192 24.55C22.5192 24.7 22.3192 24.85 22.0692 24.95C21.7192 25.15 21.6192 25.6 21.7692 25.95C21.9692 26.35 22.4692 26.5 22.8692 26.25C23.1192 26.1 23.3192 25.95 23.5192 25.8C23.9192 26 24.4192 26.1 24.9692 26C25.8692 25.85 26.9192 25.3 27.7192 24.4C27.1692 23.95 26.4192 23.9 25.5692 24.1C25.9692 23.7 26.3192 23.3 26.6692 22.85C27.1192 22.95 27.6192 22.9 28.1692 22.7C28.9692 22.35 29.7692 21.6 30.2692 20.5C29.5692 20.2 28.7692 20.4 28.0192 20.85C28.2692 20.35 28.5192 19.85 28.7192 19.35C29.2192 19.35 29.7192 19.2 30.1692 18.85C30.8192 18.3 31.4192 17.4 31.6192 16.25C30.9692 16.25 30.2192 16.7 29.5692 17.35Z" fill="white"/>
                            <path d="M22.0691 21.95L21.0191 15.9L25.4191 11.6C25.5691 11.45 25.6191 11.25 25.5691 11.1C25.5191 10.9 25.3691 10.8 25.1691 10.75L19.0691 9.85005L16.3691 4.35005C16.2691 4.20005 16.1191 4.05005 15.9191 4.05005C15.7191 4.05005 15.5691 4.15005 15.4691 4.35005L12.7691 9.85005L6.66915 10.75C6.46915 10.8 6.31915 10.9 6.26915 11.1C6.21915 11.3 6.26915 11.5 6.41915 11.6L10.8191 15.9L9.76915 21.95C9.71915 22.15 9.81915 22.35 9.96915 22.45C10.1191 22.55 10.3191 22.6 10.5191 22.5L15.9191 19.6L21.3691 22.45C21.4191 22.5 21.5191 22.5 21.6191 22.5C21.7191 22.5 21.8191 22.45 21.9191 22.4C22.0191 22.3 22.1191 22.15 22.0691 21.95Z" fill="white"/>
                            </svg>

                        </div>
                        <h3 class="{{ session('locale', 'en') === 'ar' ? 'text-right' : 'text-left' }}">{{ session('locale', 'en') === 'ar' ? 'خبرة وتخصص' : 'Expertise & Specialization' }}</h3>
                        <p class="{{ session('locale', 'en') === 'ar' ? 'text-right' : 'text-left' }}">{{ session('locale', 'en') === 'ar' ? 'خبرة في مجال المنتجات الغذائية المبردة والمجمدة، و فهم دقيق لاحتياجات عملائنا' : 'Expertise in chilled and frozen food products, with a deep understanding of our customers\' needs' }}</p>
                    </div>
                    <div class="why-card">
                        <div class="why-icon">
                            

                        <svg width="42" height="42" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.0437 24.5556L10.7905 31.6394L9.703 27.796L6.51181 28.5322L9.51912 21.9839C9.65337 22.0336 9.79094 22.0737 9.93081 22.1041C9.95766 22.1075 9.98261 22.1197 10.0017 22.1389C10.0209 22.158 10.0331 22.183 10.0364 22.2098C10.1203 22.6024 10.2857 22.973 10.5218 23.2977C10.758 23.6223 11.0596 23.8938 11.4073 24.0945C11.755 24.2951 12.141 24.4206 12.5402 24.4627C12.9395 24.5048 13.3431 24.4626 13.725 24.3388C13.75 24.3287 13.7777 24.3271 13.8037 24.3343C13.8297 24.3416 13.8526 24.3572 13.8687 24.3789C13.9252 24.4396 13.9836 24.4985 14.0437 24.5556ZM21.9799 22.1202C21.9075 22.5229 21.7497 22.9053 21.5171 23.2419C21.2846 23.5785 20.9827 23.8614 20.6317 24.0716C20.2807 24.2817 19.8888 24.4144 19.4823 24.4605C19.0759 24.5066 18.6642 24.4652 18.2751 24.339C18.2497 24.3289 18.2218 24.3274 18.1955 24.3346C18.1692 24.3418 18.1459 24.3574 18.1293 24.3791C18.074 24.4402 18.0163 24.4991 17.9563 24.5557L21.2076 31.6377L22.2969 27.7944L25.4882 28.5319L22.4809 21.98C22.3186 22.0422 22.1509 22.0891 21.9799 22.1202ZM17.4625 23.7741C17.2778 23.9788 17.0522 24.1425 16.8002 24.2545C16.5482 24.3666 16.2756 24.4245 15.9998 24.4245C15.7241 24.4245 15.4514 24.3666 15.1995 24.2545C14.9475 24.1425 14.7219 23.9788 14.5372 23.7741C14.4043 23.6239 14.2301 23.5162 14.0364 23.4643C13.8427 23.4125 13.638 23.4189 13.4479 23.4827C13.1857 23.5679 12.9085 23.5971 12.6343 23.5682C12.36 23.5394 12.095 23.4532 11.8562 23.3153C11.6175 23.1774 11.4104 22.9908 11.2484 22.7677C11.0864 22.5446 10.9732 22.2899 10.916 22.0202C10.8761 21.8237 10.7791 21.6434 10.6372 21.5018C10.4953 21.3602 10.3147 21.2636 10.1182 21.2242C9.84846 21.1667 9.59382 21.0531 9.37076 20.8909C9.14771 20.7288 8.9612 20.5215 8.82333 20.2827C8.68546 20.0438 8.59929 19.7787 8.57041 19.5044C8.54153 19.2301 8.57059 18.9528 8.65569 18.6905C8.7198 18.5004 8.72634 18.2956 8.67449 18.1019C8.62264 17.9081 8.51471 17.7339 8.36425 17.6012C8.15956 17.4167 7.99591 17.1912 7.8839 16.9394C7.77188 16.6876 7.714 16.4151 7.714 16.1395C7.714 15.8639 7.77188 15.5914 7.8839 15.3396C7.99591 15.0878 8.15956 14.8623 8.36425 14.6778C8.51471 14.5451 8.62264 14.3709 8.67449 14.1771C8.72634 13.9834 8.7198 13.7786 8.65569 13.5885C8.57059 13.3262 8.54153 13.0489 8.57041 12.7746C8.59929 12.5003 8.68546 12.2352 8.82333 11.9963C8.9612 11.7575 9.14771 11.5502 9.37076 11.3881C9.59382 11.2259 9.84846 11.1123 10.1182 11.0548C10.3147 11.0153 10.4953 10.9188 10.6372 10.7772C10.7791 10.6356 10.8761 10.4553 10.916 10.2588C10.9732 9.98909 11.0864 9.73441 11.2484 9.51128C11.4104 9.28816 11.6175 9.10159 11.8562 8.96369C12.095 8.82578 12.36 8.73961 12.6343 8.71077C12.9085 8.68194 13.1857 8.71108 13.4479 8.79631C13.638 8.86012 13.8427 8.86651 14.0364 8.81468C14.2302 8.76285 14.4043 8.65509 14.5372 8.50488C14.7219 8.30018 14.9476 8.13653 15.1995 8.02452C15.4515 7.91252 15.7241 7.85464 15.9998 7.85464C16.2756 7.85464 16.5482 7.91252 16.8002 8.02452C17.0521 8.13653 17.2778 8.30018 17.4625 8.50488C17.5953 8.6551 17.7695 8.76285 17.9632 8.81468C18.1569 8.86651 18.3616 8.86012 18.5518 8.79631C18.814 8.71142 19.0911 8.68253 19.3652 8.71151C19.6393 8.7405 19.9042 8.82671 20.1429 8.96457C20.3816 9.10243 20.5886 9.28887 20.7507 9.51181C20.9127 9.73476 21.0262 9.98925 21.0836 10.2588C21.1233 10.4554 21.2201 10.6359 21.3621 10.7775C21.5041 10.9192 21.6848 11.0156 21.8814 11.0548C22.1509 11.1128 22.4053 11.2266 22.628 11.3889C22.8508 11.5512 23.0371 11.7584 23.1749 11.9971C23.3127 12.2358 23.399 12.5008 23.4281 12.7749C23.4572 13.049 23.4285 13.3262 23.3439 13.5885C23.2798 13.7786 23.2733 13.9834 23.3251 14.1771C23.377 14.3709 23.4849 14.5451 23.6354 14.6778C23.8401 14.8623 24.0037 15.0878 24.1158 15.3396C24.2278 15.5914 24.2857 15.8639 24.2857 16.1395C24.2857 16.4151 24.2278 16.6876 24.1158 16.9394C24.0037 17.1912 23.8401 17.4167 23.6354 17.6012C23.4849 17.7339 23.377 17.9081 23.3251 18.1019C23.2733 18.2956 23.2798 18.5004 23.3439 18.6905C23.4492 19.0168 23.4676 19.365 23.3972 19.7006C23.3268 20.0361 23.1701 20.3476 22.9426 20.6041C22.7151 20.8607 22.4247 21.0535 22.0999 21.1635C21.7752 21.2735 21.4273 21.2969 21.0907 21.2314C21.1565 21.5678 21.1333 21.9156 21.0235 22.2402C20.9137 22.5649 20.721 22.8553 20.4646 23.0827C20.2081 23.3101 19.8967 23.4666 19.5612 23.5368C19.2257 23.607 18.8777 23.5884 18.5516 23.4828C18.3615 23.419 18.1569 23.4126 17.9632 23.4645C17.7695 23.5163 17.5954 23.624 17.4625 23.7741ZM21.5335 16.1402C21.5335 15.0458 21.2089 13.9759 20.6009 13.0659C19.9928 12.1559 19.1285 11.4466 18.1174 11.0278C17.1062 10.609 15.9936 10.4994 14.9201 10.713C13.8467 10.9265 12.8607 11.4536 12.0868 12.2275C11.3129 13.0014 10.7859 13.9874 10.5724 15.0609C10.3589 16.1343 10.4685 17.247 10.8874 18.2581C11.3063 19.2692 12.0156 20.1335 12.9256 20.7415C13.8356 21.3495 14.9055 21.674 16 21.674C17.4671 21.6721 18.8735 21.0885 19.9108 20.0511C20.9482 19.0137 21.5318 17.6073 21.5337 16.1402H21.5335ZM20.6335 16.1402C20.6331 17.0567 20.3611 17.9524 19.8516 18.7142C19.3422 19.476 18.6184 20.0697 17.7716 20.4201C16.9248 20.7706 15.9931 20.8621 15.0944 20.683C14.1956 20.504 13.3701 20.0625 12.7222 19.4143C12.0743 18.7661 11.6332 17.9404 11.4546 17.0416C11.276 16.1427 11.3679 15.2111 11.7188 14.3645C12.0696 13.5178 12.6636 12.7943 13.4256 12.2852C14.1877 11.7762 15.0836 11.5045 16 11.5046C17.2289 11.506 18.407 11.9949 19.2757 12.864C20.1445 13.7331 20.633 14.9114 20.6339 16.1402H20.6335ZM18.3639 14.3278C18.3223 14.2858 18.2728 14.2524 18.2183 14.2297C18.1637 14.2069 18.1052 14.1952 18.0461 14.1952C17.987 14.1952 17.9285 14.2069 17.8739 14.2297C17.8194 14.2524 17.7699 14.2858 17.7283 14.3278L15.0579 16.9965L14.2711 16.2096C14.2293 16.1679 14.1798 16.1348 14.1252 16.1122C14.0707 16.0896 14.0122 16.078 13.9532 16.0779C13.8942 16.0779 13.8357 16.0896 13.7812 16.1122C13.7266 16.1347 13.6771 16.1679 13.6353 16.2096C13.5936 16.2513 13.5605 16.3009 13.5379 16.3554C13.5153 16.41 13.5037 16.4684 13.5037 16.5274C13.5037 16.5865 13.5153 16.6449 13.5379 16.6995C13.5605 16.754 13.5936 16.8036 13.6353 16.8453L14.741 17.9509C14.7826 17.9929 14.8321 18.0263 14.8867 18.049C14.9412 18.0717 14.9997 18.0835 15.0588 18.0835C15.1179 18.0835 15.1765 18.0717 15.231 18.049C15.2856 18.0263 15.3351 17.9929 15.3767 17.9509L18.3642 14.9634C18.4062 14.9218 18.4395 14.8724 18.4622 14.8178C18.485 14.7633 18.4967 14.7048 18.4967 14.6457C18.4967 14.5866 18.485 14.5281 18.4623 14.4735C18.4396 14.419 18.4063 14.3695 18.3643 14.3279L18.3639 14.3278ZM7.86519 7.86706L10.2076 7.49913L8.09287 6.42806L8.46787 4.08744L6.796 5.76687L4.68669 4.68675L5.76687 6.796L4.0875 8.46969L6.42631 8.09469L7.49913 10.2076L7.86519 7.86706ZM14.0856 5.89469L16 4.49731L17.9144 5.89469L17.1785 3.64119L19.0984 2.25138L16.7286 2.25688L16 0L15.2714 2.25688L12.9016 2.25138L14.8215 3.64119L14.0856 5.89469ZM3.63937 14.8233L2.25137 12.9016L2.255 15.2733L0 16L2.255 16.7286L2.25137 19.0984L3.63937 17.1785L5.89256 17.916L4.49544 15.9998L5.89256 14.0854L3.63937 14.8233ZM26.2331 6.796L27.3133 4.68675L25.204 5.76687L23.5319 4.08744L23.9069 6.42806L21.7921 7.49913L24.1346 7.86706L24.5007 10.2077L25.5719 8.09469L27.9126 8.46969L26.2331 6.796ZM32 16L29.745 15.2733L29.7486 12.9016L28.3588 14.8233L26.1074 14.0858L27.5046 16.0002L26.1074 17.9164L28.3588 17.1789L29.7486 19.0988L29.745 16.7291L32 16Z" fill="white"/>
                        </svg>


                        </div>
                        <h3 class="{{ session('locale', 'en') === 'ar' ? 'text-right' : 'text-left' }}">{{ session('locale', 'en') === 'ar' ? 'جودة معتمدة' : 'Certified Quality' }}</h3>
                        <p class="{{ session('locale', 'en') === 'ar' ? 'text-right' : 'text-left' }}">{{ session('locale', 'en') === 'ar' ? 'نلتزم بأعلى معايير الجودة والسلامة الغذائية المعتمدة محليا وعالميا' : 'We adhere to the highest local and international food quality and safety standards' }}</p>
                    </div>
                    <div class="why-card">
                        <div class="why-icon">
                            <svg width="41" height="29" viewBox="0 0 31 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.5146 12.3319H30.5V9.35156C30.5 9.19794 30.4731 9.06662 30.4123 8.92337L28.3563 4.0825C28.1588 3.6175 27.693 3.32625 27.1468 3.32625H22.4191V16.1181H22.8865C22.8865 14.4212 24.2626 13.0451 25.9595 13.0451C27.6564 13.0451 29.0325 14.4212 29.0325 16.1181H29.7225C30.1507 16.1181 30.4999 15.7689 30.4999 15.3407V14.2733H29.5146C29.4196 14.2731 29.3285 14.2353 29.2614 14.1681C29.1942 14.101 29.1564 14.0099 29.1562 13.9149V12.6903C29.1564 12.5953 29.1943 12.5042 29.2614 12.4371C29.3286 12.3699 29.4196 12.3321 29.5146 12.3319ZM23.0124 8.9645V4.91956H26.9808L28.6987 8.9645H23.0124ZM20.3826 0H2.81475C2.68214 0 2.55496 0.0526785 2.4612 0.146447C2.36743 0.240215 2.31475 0.367392 2.31475 0.5C2.31475 0.632608 2.36743 0.759785 2.4612 0.853553C2.55496 0.947321 2.68214 1 2.81475 1H5.58575C6.07131 1 6.46856 1.39725 6.46856 1.88281C6.46856 2.36837 6.07131 2.76562 5.58575 2.76562H0.5C0.367392 2.76562 0.240215 2.8183 0.146447 2.91207C0.0526784 3.00584 0 3.13302 0 3.26562C0 3.39823 0.0526784 3.52541 0.146447 3.61918C0.240215 3.71295 0.367392 3.76562 0.5 3.76562H4.79431C5.27987 3.76562 5.67712 4.16287 5.67712 4.64844C5.67712 5.134 5.27987 5.53125 4.79431 5.53125H1.90738C1.77477 5.53125 1.64759 5.58393 1.55382 5.6777C1.46005 5.77146 1.40738 5.89864 1.40738 6.03125C1.40738 6.16386 1.46005 6.29104 1.55382 6.3848C1.64759 6.47857 1.77477 6.53125 1.90738 6.53125H6.05925C6.54481 6.53125 6.94206 6.9285 6.94206 7.41406C6.94206 7.89962 6.54481 8.29688 6.05925 8.29688H0.5C0.367392 8.29688 0.240215 8.34955 0.146447 8.44332C0.0526784 8.53709 0 8.66427 0 8.79688C0 8.92948 0.0526784 9.05666 0.146447 9.15043C0.240215 9.2442 0.367392 9.29688 0.5 9.29688H4.79431V15.0817C4.79431 15.6526 5.25994 16.1182 5.83081 16.1182H7.97531C7.97531 14.4213 9.3515 13.0452 11.0483 13.0452C12.7452 13.0452 14.1214 14.4213 14.1214 16.1182H21.4191V1.0365C21.4191 0.465625 20.9534 0 20.3826 0ZM13.6249 12.1439C11.251 12.1439 9.32656 10.2194 9.32656 7.8455C9.32656 5.47156 11.251 3.54713 13.6249 3.54713C15.9989 3.54713 17.9233 5.47156 17.9233 7.8455C17.9234 10.2194 15.9989 12.1439 13.6249 12.1439ZM13.0604 8.22462L15.1504 6.11369C15.3978 5.86381 15.8015 5.86312 16.0506 6.11087C16.2997 6.35856 16.3005 6.76106 16.0534 7.0105C15.2058 7.86588 14.364 8.72694 13.5126 9.57844C13.2636 9.82738 12.8599 9.82738 12.6109 9.57844L11.1983 8.16581C10.9494 7.91687 10.9494 7.51312 11.1983 7.26419C11.4473 7.01525 11.851 7.01525 12.0999 7.26419L13.0604 8.22462ZM11.0484 14.0451C9.90344 14.0451 8.97538 14.9732 8.97538 16.1181C8.97538 17.2631 9.9035 18.1911 11.0484 18.1911C12.1933 18.1911 13.1214 17.263 13.1214 16.1181C13.1214 14.9732 12.1933 14.0451 11.0484 14.0451ZM11.0484 16.8244C10.658 16.8244 10.3421 16.5084 10.3421 16.1181C10.3421 15.7277 10.658 15.4118 11.0484 15.4118C11.4388 15.4118 11.7547 15.7277 11.7547 16.1181C11.7547 16.5084 11.4388 16.8244 11.0484 16.8244ZM25.9596 14.0451C24.8146 14.0451 23.8865 14.9732 23.8865 16.1181C23.8865 17.2631 24.8146 18.1911 25.9596 18.1911C27.1045 18.1911 28.0326 17.263 28.0326 16.1181C28.0326 14.9732 27.1045 14.0451 25.9596 14.0451ZM25.9596 16.8244C25.5692 16.8244 25.2533 16.5084 25.2533 16.1181C25.2533 15.7277 25.5692 15.4118 25.9596 15.4118C26.3499 15.4118 26.6659 15.7277 26.6659 16.1181C26.6659 16.5084 26.3499 16.8244 25.9596 16.8244Z" fill="white"/>
                            </svg>
                        </div>
                        <h3 class="{{ session('locale', 'en') === 'ar' ? 'text-right' : 'text-left' }}">{{ session('locale', 'en') === 'ar' ? 'تخزين ونقل آمن' : 'Safe Storage & Transport' }}</h3>
                        <p class="{{ session('locale', 'en') === 'ar' ? 'text-right' : 'text-left' }}">{{ session('locale', 'en') === 'ar' ? 'أنظمة تبريد وتجميد حديثة تحافظ على الطعم والقيمة الغذائية' : 'Modern cooling and freezing systems that preserve taste and nutritional value' }}</p>
                    </div>
                    <div class="why-card">
                        <div class="why-icon">
                            <svg width="42" height="42" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.8487 13.2519L17.8596 13.3869H9.88619L9.89706 13.2519C10.0634 11.1858 11.7989 9.58563 13.8729 9.58563C15.947 9.58563 17.6824 11.1856 17.8487 13.2519ZM12.1303 7.98656L12.1362 8.00269C12.3995 8.728 13.1031 9.21081 13.8729 9.21081C14.6439 9.21081 15.3418 8.72525 15.6099 8.00231C15.6861 7.79639 15.7251 7.57852 15.7248 7.35894C15.7248 6.3375 14.8943 5.50706 13.8729 5.50706C12.8516 5.50706 12.021 6.33769 12.021 7.35894C12.021 7.57312 12.0572 7.78519 12.1303 7.98656ZM6.21344 7.35894C6.21344 7.48462 6.20306 7.61025 6.18188 7.73413L6.15694 7.88019H11.7026L11.6778 7.73425C11.6568 7.61025 11.6462 7.48471 11.6462 7.35894C11.6456 6.87046 11.8065 6.39548 12.1039 6.008L12.1582 5.93713L12.1088 5.86275C11.3716 4.75431 10.1171 4.07887 8.78506 4.07887C7.52725 4.07887 6.35238 4.66569 5.59688 5.67075L5.5335 5.755L5.60588 5.83169C5.99649 6.24419 6.21395 6.79084 6.21344 7.35894ZM8.78494 3.70381C9.80613 3.70381 10.6368 2.87319 10.6368 1.85194C10.6368 0.831125 9.80575 0 8.78494 0C7.76394 0 6.93306 0.831 6.93306 1.85194C6.93306 2.87331 7.76356 3.70381 8.78494 3.70381ZM18.7604 3.70381C19.7816 3.70381 20.6122 2.87319 20.6122 1.85194C20.6122 0.831125 19.7812 0 18.7604 0C17.7393 0 16.9085 0.830813 16.9085 1.85194C16.9085 2.87344 17.7388 3.70381 18.7604 3.70381ZM19.7836 13.2519L19.7727 13.3869H27.7458L27.7349 13.2519C27.5692 11.1855 25.8334 9.58563 23.7594 9.58563C21.6854 9.58563 19.9499 11.1858 19.7836 13.2519ZM16.0999 7.35894C16.0999 7.48462 16.0895 7.61025 16.0684 7.73413L16.0434 7.88013H21.5894L21.5643 7.73394C21.543 7.61007 21.5323 7.48462 21.5324 7.35894C21.5324 6.84162 21.7069 6.34862 22.0351 5.94894L22.0949 5.87613L22.0414 5.79862C21.2918 4.71319 20.0798 4.07894 18.7604 4.07894C17.476 4.07894 16.2844 4.68644 15.5311 5.72606L15.4722 5.80731L15.5387 5.88231C15.9009 6.29088 16.0999 6.81275 16.0999 7.35894ZM22.017 7.98713L22.0231 8.00381C22.2894 8.72675 22.9896 9.21081 23.7593 9.21081C24.7803 9.21081 25.6109 8.37981 25.6109 7.35894C25.6109 6.33756 24.7808 5.50706 23.7593 5.50706C23.2745 5.50604 22.8088 5.69628 22.4634 6.0365C22.1056 6.3875 21.9074 6.85763 21.9074 7.35894C21.9075 7.57331 21.9429 7.78581 22.017 7.98713ZM3.98638 9.21081C4.75744 9.21081 5.45525 8.72519 5.72338 8.00231C5.79963 7.79639 5.83856 7.57852 5.83831 7.35894C5.83831 6.3375 5.00781 5.50706 3.98644 5.50706C2.96519 5.50706 2.13481 6.33775 2.13481 7.35894C2.13481 8.37969 2.96556 9.21081 3.98638 9.21081ZM11.976 24.3168L12.142 24.0806C12.354 23.7789 12.2859 23.4327 11.9881 23.2234C11.6904 23.0144 11.3416 23.0674 11.1295 23.3688L10.8119 23.8202C10.8098 23.8231 10.8078 23.826 10.8059 23.8289L10.4476 24.3381L10.0025 24.9714L9.76344 25.3108C9.55094 25.6126 9.61975 25.9584 9.91712 26.168C10.2146 26.3776 10.5633 26.3245 10.7758 26.0235L10.8446 25.9261L11.9757 24.3175L11.976 24.3168ZM7.96219 13.2519C7.79619 11.1856 6.06044 9.58563 3.98638 9.58563C1.91244 9.58563 0.176875 11.1858 0.010875 13.2519L0 13.3869H7.97306L7.96219 13.2519ZM13.9889 25.986C13.6946 25.7796 13.3501 25.8287 13.1375 26.1216L13.1366 26.1225L12.7038 26.7373V26.7397C12.5946 26.9124 12.5644 27.1042 12.6536 27.2963C12.7515 27.5071 12.9762 27.6654 13.2078 27.686C13.4327 27.7059 13.6114 27.5991 13.739 27.4177L14.1431 26.8433C14.3553 26.5416 14.2867 26.1951 13.9889 25.986ZM18.0391 17.6119C16.8463 17.9545 15.6998 17.9218 14.5 17.6574C14.1032 17.57 13.6868 17.5133 13.2894 17.6284C12.9902 17.7151 12.7345 17.8878 12.4961 18.0834C12.1621 18.3574 11.8467 18.6788 11.5389 18.9822C11.3994 19.1197 11.2597 19.257 11.1194 19.3937L11.0842 19.4281L10.9949 21.309C10.9893 21.4279 11.0027 21.5892 11.1136 21.6593C11.1935 21.7099 11.3121 21.7078 11.4021 21.6944C11.5661 21.6702 11.7332 21.5987 11.878 21.5206C12.1851 21.3548 12.4217 20.8156 12.5689 20.5011C12.6327 20.3649 12.6959 20.2277 12.7666 20.095C12.7859 20.0588 12.8166 20.03 12.8539 20.0129C12.9181 19.9833 12.9819 19.9527 13.0458 19.9224C13.6493 19.6359 14.274 19.3501 14.9181 19.7228L19.1694 22.1829L20.4191 21.5446L18.1331 17.585L18.0391 17.6119ZM20.7617 15.7694C20.717 15.692 20.6527 15.6278 20.5752 15.5832C20.4978 15.5386 20.4099 15.5152 20.3205 15.5153C20.2314 15.5153 20.1438 15.5387 20.0666 15.5833L18.515 16.4793C18.4571 16.5127 18.4064 16.5572 18.3658 16.6102C18.3253 16.6633 18.2956 16.7239 18.2786 16.7885C18.2611 16.853 18.2565 16.9202 18.2651 16.9864C18.2737 17.0527 18.2952 17.1165 18.3285 17.1744L21.0516 21.8907C21.1916 22.1333 21.5042 22.217 21.7467 22.0769L23.2987 21.1809C23.5411 21.0409 23.6252 20.7282 23.4852 20.4857L20.7617 15.7694ZM19.0685 22.5588L14.7303 20.0476C14.6287 19.9888 14.5204 19.9487 14.4041 19.9311C14.0085 19.8708 13.5546 20.0958 13.2064 20.2616C13.1732 20.2773 13.14 20.293 13.1069 20.3089L13.0685 20.3274L13.0494 20.3655C13.001 20.4631 12.9538 20.5614 12.9081 20.6603C12.7174 21.0677 12.4646 21.6301 12.0561 21.8509C11.7341 22.025 11.2565 22.1921 10.9141 21.9768C10.6804 21.8299 10.6079 21.5531 10.6203 21.2911L10.7131 19.3362C10.7153 19.2884 10.7356 19.2432 10.77 19.2099C10.9394 19.0459 11.1073 18.8803 11.2755 18.715C11.3598 18.6321 11.4441 18.5492 11.5288 18.4666L11.6722 18.3268L9.61025 17.5898L7.29219 21.6047L8.7015 23.3649L9.18237 22.6816C9.4615 22.2849 9.91238 22.1444 10.3593 22.3327C10.4311 22.3629 10.4994 22.4008 10.5631 22.4456C10.7061 22.546 10.8257 22.6814 10.9039 22.8379L10.9686 22.9672L11.0872 22.8844C11.4292 22.6458 11.8716 22.6828 12.2039 22.9166C12.4753 23.1076 12.6589 23.4256 12.6427 23.7627L12.6365 23.8916L12.7656 23.8937C12.9747 23.8971 13.1812 23.9693 13.3518 24.0892C13.7526 24.3711 13.9145 24.8674 13.6858 25.3199L13.6101 25.4697L13.7754 25.4992C13.9294 25.5267 14.077 25.5898 14.2048 25.6797C14.5804 25.9441 14.7539 26.4061 14.5695 26.8439L14.5269 26.9451L15.5571 27.5456C15.876 27.7314 16.2147 27.6336 16.3979 27.3191C16.581 27.0046 16.4994 26.6619 16.1809 26.4757L16.1517 26.4587H16.151L15.0122 25.7959C14.9692 25.7708 14.9379 25.7297 14.9252 25.6815C14.9125 25.6334 14.9194 25.5822 14.9444 25.5392C14.9964 25.4499 15.1119 25.4201 15.2011 25.472L16.7351 26.3649C17.0542 26.5506 17.3928 26.4534 17.5761 26.1386C17.7594 25.8239 17.6771 25.4809 17.3581 25.2952L15.9261 24.4614C15.8831 24.4364 15.8518 24.3953 15.8391 24.3471C15.8264 24.299 15.8333 24.2478 15.8583 24.2048C15.8835 24.1618 15.9246 24.1306 15.9727 24.118C16.0208 24.1054 16.072 24.1124 16.1149 24.1375L18.0063 25.2387C18.1974 25.35 18.4059 25.3722 18.6013 25.2603C18.8027 25.1449 18.9409 24.9077 18.9419 24.6756C18.9428 24.45 18.8202 24.2806 18.6291 24.1691L18.2731 23.9616L18.2725 23.9609L16.84 23.1269C16.7983 23.1013 16.7683 23.0603 16.7564 23.0129C16.7445 22.9654 16.7516 22.9151 16.7763 22.8728C16.8009 22.8305 16.8412 22.7996 16.8883 22.7865C16.9355 22.7735 16.9859 22.7794 17.0288 22.8031L18.447 23.6286C18.7658 23.8142 19.1045 23.7162 19.2873 23.4016C19.4701 23.0869 19.3883 22.7439 19.0685 22.5588ZM9.46725 16.7885C9.45021 16.7239 9.42054 16.6633 9.37996 16.6103C9.33938 16.5572 9.28869 16.5127 9.23081 16.4793L7.6795 15.5833C7.60229 15.5387 7.51471 15.5153 7.42556 15.5153C7.33611 15.5151 7.2482 15.5385 7.17068 15.5832C7.09316 15.6278 7.02877 15.6921 6.984 15.7695L4.26119 20.4858C4.12113 20.7284 4.20481 21.0409 4.44738 21.1809L5.99869 22.077C6.24138 22.2172 6.55431 22.1336 6.6945 21.8908L9.41731 17.1745C9.45062 17.1166 9.47218 17.0527 9.48075 16.9865C9.48932 16.9202 9.48473 16.853 9.46725 16.7885ZM12.7871 25.9678L13.2898 25.2527C13.5016 24.9513 13.4338 24.6045 13.1362 24.3953C12.8392 24.1866 12.4904 24.239 12.2781 24.5392L12.2721 24.5476L12.2718 24.5484L11.1512 26.1414C10.9389 26.4431 11.0079 26.7891 11.3052 26.9986C11.6027 27.2082 11.9519 27.1547 12.1639 26.8532L12.4197 26.4895L12.7869 25.9678H12.7871ZM9.65869 24.8083L10.5029 23.6077C10.7149 23.3061 10.6444 22.9611 10.3476 22.7523C10.0498 22.543 9.70106 22.5961 9.48894 22.8976L8.68325 24.0431C8.47125 24.3445 8.53963 24.6906 8.83712 24.8997C9.11644 25.0959 9.44044 25.0624 9.65481 24.8082H9.65869V24.8083Z" fill="white"/>
                            </svg>

                        </div>
                        <h3 class="{{ session('locale', 'en') === 'ar' ? 'text-right' : 'text-left' }}">{{ session('locale', 'en') === 'ar' ? 'شريك موثوق' : 'Trusted Partner' }}</h3>
                        <p class="{{ session('locale', 'en') === 'ar' ? 'text-right' : 'text-left' }}">{{ session('locale', 'en') === 'ar' ? 'نلتزم ببناء الجودة، نظام التوريد، وبناء شراكات طويلة المدى' : 'We are committed to quality, reliable supply chains, and building long-term partnerships' }}</p>
                    </div>
                </div>

                <!-- Mobile Scroll Indicator -->
                <div class="scroll-indicator md:hidden">
                    <span class="active"></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>


            </div>
        </div>
    </section>


    <!-- Services Section -->
    <section id="services" class="py-10 md:py-20 bg-jood-green relative overflow-hidden">
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
            <div class="grid lg:grid-cols-3 gap-3 md:gap-6 items-center mb-3 md:mb-6">

                <!-- Card 1: Import (Right in RTL) -->
                <!-- Mobile: Order 2, Desktop: Order 1 (or natural flow) -->
                <div class="bg-jood-light rounded-3xl p-4 order-2 lg:order-none" data-aos="fade-up"
                    data-aos-delay="100">
                    <div
                        class="flex items-start gap-4 {{ session('locale', 'en') === 'ar' ? 'text-right' : 'text-left'}}">
                        <div class="w-14 h-14 bg-jood-green rounded-xl flex items-center justify-center flex-shrink-0">
                            <!-- Building/Import Icon -->
                            <svg width="29" height="28" viewBox="0 0 29 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.1245 25.0535H0V26.0365H28.249V25.0535H26.656H14.1245ZM26.2655 27.0365H27.556V28H26.2655V27.0365ZM19.2205 12.527H21.56V16.019H19.2205V12.527Z" fill="white"/>
                            <path d="M14.6245 24.0535H26.156V12.527H22.56V16.519C22.56 16.6516 22.5073 16.7788 22.4135 16.8725C22.3198 16.9663 22.1926 17.019 22.06 17.019H18.7205C18.5879 17.019 18.4607 16.9663 18.3669 16.8725C18.2731 16.7788 18.2205 16.6516 18.2205 16.519V12.527H14.6245V24.054V24.0535ZM24.713 22.2945C24.713 22.1619 24.7656 22.0347 24.8594 21.9409C24.9532 21.8472 25.0804 21.7945 25.213 21.7945C25.3456 21.7945 25.4728 21.8472 25.5665 21.9409C25.6603 22.0347 25.713 22.1619 25.713 22.2945V23.1185C25.713 23.2511 25.6603 23.3783 25.5665 23.472C25.4728 23.5658 25.3456 23.6185 25.213 23.6185C25.0804 23.6185 24.9532 23.5658 24.8594 23.472C24.7656 23.3783 24.713 23.2511 24.713 23.1185V22.2945ZM23.4935 22.2945C23.4935 22.1619 23.5461 22.0347 23.6399 21.9409C23.7337 21.8472 23.8609 21.7945 23.9935 21.7945C24.1261 21.7945 24.2533 21.8472 24.347 21.9409C24.4408 22.0347 24.4935 22.1619 24.4935 22.2945V23.1185C24.4935 23.2511 24.4408 23.3783 24.347 23.472C24.2533 23.5658 24.1261 23.6185 23.9935 23.6185C23.8609 23.6185 23.7337 23.5658 23.6399 23.472C23.5461 23.3783 23.4935 23.2511 23.4935 23.1185V22.2945ZM22.274 22.2945C22.274 22.1619 22.3266 22.0347 22.4204 21.9409C22.5142 21.8472 22.6414 21.7945 22.774 21.7945C22.9066 21.7945 23.0338 21.8472 23.1275 21.9409C23.2213 22.0347 23.274 22.1619 23.274 22.2945V23.1185C23.274 23.2511 23.2213 23.3783 23.1275 23.472C23.0338 23.5658 22.9066 23.6185 22.774 23.6185C22.6414 23.6185 22.5142 23.5658 22.4204 23.472C22.3266 23.3783 22.274 23.2511 22.274 23.1185V22.2945ZM15.9315 22.5055H18.4035C18.5361 22.5055 18.6633 22.5582 18.757 22.6519C18.8508 22.7457 18.9035 22.8729 18.9035 23.0055C18.9035 23.1381 18.8508 23.2653 18.757 23.359C18.6633 23.4528 18.5361 23.5055 18.4035 23.5055H15.9315C15.7989 23.5055 15.6717 23.4528 15.5779 23.359C15.4841 23.2653 15.4315 23.1381 15.4315 23.0055C15.4315 22.8729 15.4841 22.7457 15.5779 22.6519C15.6717 22.5582 15.7989 22.5055 15.9315 22.5055ZM2.09297 24.0535H13.6245V12.527H10.0285V16.519C10.0285 16.6516 9.97579 16.7788 9.88202 16.8725C9.78825 16.9663 9.66108 17.019 9.52847 17.019H6.18897C6.05636 17.019 5.92918 16.9663 5.83542 16.8725C5.74165 16.7788 5.68897 16.6516 5.68897 16.519V12.527H2.09297V24.054V24.0535ZM12.1815 22.2945C12.1815 22.1619 12.2341 22.0347 12.3279 21.9409C12.4217 21.8472 12.5489 21.7945 12.6815 21.7945C12.8141 21.7945 12.9413 21.8472 13.035 21.9409C13.1288 22.0347 13.1815 22.1619 13.1815 22.2945V23.1185C13.1815 23.2511 13.1288 23.3783 13.035 23.472C12.9413 23.5658 12.8141 23.6185 12.6815 23.6185C12.5489 23.6185 12.4217 23.5658 12.3279 23.472C12.2341 23.3783 12.1815 23.2511 12.1815 23.1185V22.2945ZM10.962 22.2945C10.962 22.1619 11.0146 22.0347 11.1084 21.9409C11.2022 21.8472 11.3294 21.7945 11.462 21.7945C11.5946 21.7945 11.7218 21.8472 11.8155 21.9409C11.9093 22.0347 11.962 22.1619 11.962 22.2945V23.1185C11.962 23.2511 11.9093 23.3783 11.8155 23.472C11.7218 23.5658 11.5946 23.6185 11.462 23.6185C11.3294 23.6185 11.2022 23.5658 11.1084 23.472C11.0146 23.3783 10.962 23.2511 10.962 23.1185V22.2945ZM9.74247 22.2945C9.74247 22.1619 9.79515 22.0347 9.88892 21.9409C9.98268 21.8472 10.1099 21.7945 10.2425 21.7945C10.3751 21.7945 10.5023 21.8472 10.596 21.9409C10.6898 22.0347 10.7425 22.1619 10.7425 22.2945V23.1185C10.7425 23.2511 10.6898 23.3783 10.596 23.472C10.5023 23.5658 10.3751 23.6185 10.2425 23.6185C10.1099 23.6185 9.98268 23.5658 9.88892 23.472C9.79515 23.3783 9.74247 23.2511 9.74247 23.1185V22.2945ZM3.39997 22.5055H5.87197C6.00458 22.5055 6.13175 22.5582 6.22552 22.6519C6.31929 22.7457 6.37197 22.8729 6.37197 23.0055C6.37197 23.1381 6.31929 23.2653 6.22552 23.359C6.13175 23.4528 6.00458 23.5055 5.87197 23.5055H3.39997C3.26736 23.5055 3.14018 23.4528 3.04642 23.359C2.95265 23.2653 2.89997 23.1381 2.89997 23.0055C2.89997 22.8729 2.95265 22.7457 3.04642 22.6519C3.14018 22.5582 3.26736 22.5055 3.39997 22.5055ZM0.69397 27.0365H1.98447V28H0.69397V27.0365Z" fill="white"/>
                            <path d="M6.68903 12.527H9.02852V16.019H6.68903V12.527ZM13.4795 27.0365H14.7705V28H13.4795V27.0365ZM18.523 0V4.9185C18.523 5.05111 18.4703 5.17829 18.3766 5.27205C18.2828 5.36582 18.1556 5.4185 18.023 5.4185H16.8955L20.3875 9.0965L23.8825 5.4185H22.752C22.6194 5.4185 22.4922 5.36582 22.3985 5.27205C22.3047 5.17829 22.252 5.05111 22.252 4.9185V0H18.5225H18.523ZM5.99153 0V4.9185C5.99153 5.05111 5.93885 5.17829 5.84508 5.27205C5.75131 5.36582 5.62413 5.4185 5.49153 5.4185H4.36353L7.85553 9.0965L11.3505 5.4185H10.22C10.0874 5.4185 9.96024 5.36582 9.86647 5.27205C9.7727 5.17829 9.72003 5.05111 9.72003 4.9185V0H5.99153Z" fill="white"/>
                            </svg>
                        </div>
                        <div class="flex-1 {{ session('locale', 'en') === 'ar' ? 'text-right' : 'text-left' }}">
                            <h3 class="text-base font-bold text-jood-green mb-2">
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
                <div class="bg-jood-light rounded-3xl p-4 order-3 lg:order-none" data-aos="fade-up"
                    data-aos-delay="200">
                    <div
                        class="flex items-start gap-4 {{ session('locale', 'en') === 'ar' ? 'text-right' : 'text-left' }}">
                        <div class="w-14 h-14 bg-jood-green rounded-xl flex items-center justify-center flex-shrink-0">
                            <!-- Truck Icon -->
                           <svg width="31" height="27" viewBox="0 0 31 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M29.2071 11.7779V12.8543C29.2071 13.1031 29.41 13.306 29.6588 13.306H30.875V14.1583C30.875 14.7078 30.4268 15.1561 29.8773 15.1561H29.3206C29.3214 14.6198 29.1794 14.093 28.9093 13.6298V12.4497C28.9093 11.8036 28.6833 11.2214 28.2472 10.7445L26.243 8.55231L29.2907 8.55225V7.91038C29.2907 7.80069 29.2652 7.73494 29.1912 7.65406L25.9365 4.09419C25.8542 4.00412 25.7782 3.97069 25.6561 3.97069H23.9151V6.25881C23.5756 6.09144 23.1991 6.00456 22.7999 6.00456H22.511V2.46519H25.7655C26.2099 2.46519 26.5928 2.63375 26.8926 2.96181L30.4748 6.87994C30.7424 7.17263 30.8749 7.51381 30.8749 7.91044V11.3262H29.6586C29.41 11.3261 29.2071 11.5291 29.2071 11.7779ZM0 21.3517V23.2373C0 23.7821 0.442375 24.2283 0.985687 24.2348C0.985687 22.8914 1.85881 21.7517 3.06825 21.3517H0ZM15.5799 10.0765V20.3517H0V10.0765C0 9.52769 0.448875 9.07875 0.997687 9.07875H14.5822C15.131 9.07881 15.5799 9.52787 15.5799 10.0765ZM4.04238 15.2568C4.08879 15.3032 4.1439 15.34 4.20456 15.3651C4.26521 15.3903 4.33022 15.4032 4.39587 15.4032C4.46153 15.4032 4.52654 15.3903 4.58719 15.3651C4.64785 15.34 4.70296 15.3032 4.74937 15.2568L8.33113 11.675C8.37755 11.6286 8.41438 11.5735 8.43951 11.5128C8.46464 11.4522 8.47757 11.3872 8.47757 11.3215C8.47757 11.2558 8.46464 11.1908 8.43951 11.1302C8.41438 11.0695 8.37755 11.0144 8.33113 10.968C8.28471 10.9216 8.2296 10.8847 8.16894 10.8596C8.10829 10.8345 8.04328 10.8216 7.97762 10.8216C7.91197 10.8216 7.84696 10.8345 7.78631 10.8596C7.72565 10.8847 7.67054 10.9216 7.62412 10.968L4.04238 14.5498C3.94864 14.6435 3.89598 14.7707 3.89598 14.9032C3.89598 15.0358 3.94864 15.163 4.04238 15.2568ZM11.5372 14.174C11.4908 14.1276 11.4357 14.0907 11.3751 14.0656C11.3144 14.0405 11.2494 14.0276 11.1838 14.0276C11.1181 14.0276 11.0531 14.0405 10.9924 14.0656C10.9318 14.0907 10.8767 14.1276 10.8302 14.174L7.2485 17.7558C7.20207 17.8022 7.16524 17.8573 7.14012 17.9179C7.11499 17.9786 7.10206 18.0436 7.10206 18.1093C7.10206 18.1749 7.11499 18.2399 7.14012 18.3006C7.16524 18.3612 7.20207 18.4163 7.2485 18.4627C7.29492 18.5092 7.35003 18.546 7.41068 18.5711C7.47134 18.5963 7.53635 18.6092 7.602 18.6092C7.66765 18.6092 7.73266 18.5963 7.79332 18.5711C7.85397 18.546 7.90908 18.5092 7.9555 18.4627L11.5372 14.881C11.5837 14.8346 11.6205 14.7795 11.6456 14.7188C11.6708 14.6582 11.6837 14.5932 11.6837 14.5275C11.6837 14.4618 11.6708 14.3968 11.6456 14.3362C11.6205 14.2755 11.5837 14.2204 11.5372 14.174ZM11.5857 10.9194C11.5393 10.873 11.4842 10.8362 11.4236 10.8111C11.3629 10.7859 11.2979 10.773 11.2323 10.773C11.1666 10.773 11.1016 10.7859 11.0409 10.8111C10.9803 10.8362 10.9252 10.873 10.8787 10.9194L3.99412 17.8041C3.9477 17.8505 3.91087 17.9056 3.88574 17.9662C3.86061 18.0269 3.84768 18.0919 3.84768 18.1576C3.84768 18.2232 3.86061 18.2882 3.88574 18.3489C3.91087 18.4095 3.9477 18.4646 3.99412 18.5111C4.04054 18.5575 4.09565 18.5943 4.15631 18.6194C4.21696 18.6446 4.28197 18.6575 4.34762 18.6575C4.41328 18.6575 4.47829 18.6446 4.53894 18.6194C4.5996 18.5943 4.65471 18.5575 4.70113 18.5111L11.5857 11.6264C11.6322 11.58 11.669 11.5249 11.6941 11.4643C11.7193 11.4036 11.7322 11.3386 11.7322 11.2729C11.7322 11.2073 11.7193 11.1423 11.6941 11.0816C11.669 11.021 11.6322 10.9659 11.5857 10.9194ZM24.5437 15.9587C24.8113 16.2514 24.9438 16.5926 24.9438 16.9892V20.4049H23.7275C23.4787 20.4049 23.2757 20.6079 23.2757 20.8567V21.9332C23.2757 22.182 23.4787 22.3849 23.7275 22.3849H24.9438V23.2372C24.9438 23.7867 24.4955 24.2349 23.946 24.2349H23.3894C23.3894 22.5584 22.0296 21.1987 20.3531 21.1987C18.6766 21.1987 17.3169 22.5584 17.3169 24.2349H16.5798V11.544H19.8343C20.2787 11.544 20.6615 11.7126 20.9614 12.0406L24.5437 15.9587ZM19.1819 19.2021C19.1819 19.0695 19.1292 18.9423 19.0354 18.8485C18.9417 18.7547 18.8145 18.7021 18.6819 18.7021H18.0354C17.9028 18.7021 17.7756 18.7547 17.6818 18.8485C17.5881 18.9423 17.5354 19.0695 17.5354 19.2021C17.5354 19.3347 17.5881 19.4618 17.6818 19.5556C17.7756 19.6494 17.9028 19.7021 18.0354 19.7021H18.6819C18.8145 19.7021 18.9417 19.6494 19.0354 19.5556C19.1292 19.4618 19.1819 19.3347 19.1819 19.2021ZM23.3595 16.9892C23.3595 16.8795 23.334 16.8138 23.26 16.7329L20.0053 13.1729C19.923 13.0829 19.847 13.0494 19.725 13.0494H17.984V17.6311L23.3596 17.6311L23.3595 16.9892ZM12.2962 24.2349H15.5799V21.3517H10.2136C11.4562 21.7626 12.2962 22.9259 12.2962 24.2349ZM4.976 21.3517C5.6805 21.5848 6.27081 22.0689 6.64087 22.6981C7.01094 22.0689 7.60131 21.5848 8.30581 21.3517H4.976ZM19.5455 5.53713V6.00456H21.5111V0.99775C21.5111 0.449125 21.0623 0 20.5134 0H6.92894C6.38013 0 5.93125 0.448937 5.93125 0.99775V3.53944H17.5479C18.6484 3.53944 19.5455 4.43656 19.5455 5.53713ZM6.05813 24.2349C6.05813 25.3594 5.1465 26.2711 4.02187 26.2711C2.89731 26.2711 1.98563 25.3595 1.98563 24.2349C1.98563 23.1103 2.89731 22.1986 4.02187 22.1986C5.1465 22.1986 6.05813 23.1103 6.05813 24.2349ZM4.80819 24.2349C4.80819 23.8002 4.45656 23.4486 4.02194 23.4486C3.58731 23.4486 3.23569 23.8002 3.23569 24.2349C3.23569 24.6695 3.58731 25.0211 4.02194 25.0211C4.45656 25.0211 4.80819 24.6695 4.80819 24.2349ZM11.2962 24.2349C11.2962 25.3594 10.3846 26.2711 9.25994 26.2711C8.13538 26.2711 7.22369 25.3595 7.22369 24.2349C7.22369 23.1103 8.13531 22.1986 9.25994 22.1986C10.3845 22.1986 11.2962 23.1103 11.2962 24.2349ZM10.0462 24.2349C10.0462 23.8002 9.69456 23.4486 9.25994 23.4486C8.82531 23.4486 8.47369 23.8002 8.47369 24.2349C8.47369 24.6695 8.82531 25.0211 9.25994 25.0211C9.69456 25.0211 10.0462 24.6695 10.0462 24.2349ZM23.9271 7.50119C23.6272 7.17313 23.2444 7.00456 22.8 7.00456H19.5455V10.544H19.8344C20.2335 10.544 20.6101 10.6309 20.9496 10.7983V8.51012H22.6906C22.8126 8.51012 22.8886 8.54362 22.9709 8.63363L26.2256 12.1935C26.2996 12.2744 26.3251 12.3402 26.3251 12.4498V13.0917L23.2774 13.0917L25.2816 15.2839C25.7176 15.7609 25.9437 16.343 25.9437 16.9892V18.1692C26.2138 18.6325 26.3558 19.1592 26.355 19.6955H26.9116C27.4611 19.6955 27.9094 19.2472 27.9094 18.6978V17.8454H26.6931C26.4443 17.8454 26.2414 17.6426 26.2414 17.3938V16.3173C26.2414 16.0684 26.4444 15.8655 26.6931 15.8655H27.9094V12.4497C27.9094 12.0531 27.7769 11.7119 27.5093 11.4193L23.9271 7.50119ZM22.3894 24.2349C22.3894 25.3594 21.4778 26.2711 20.3532 26.2711C19.2286 26.2711 18.3169 25.3595 18.3169 24.2349C18.3169 23.1103 19.2286 22.1986 20.3532 22.1986C21.4778 22.1986 22.3894 23.1103 22.3894 24.2349ZM21.1394 24.2349C21.1394 23.8002 20.7878 23.4486 20.3532 23.4486C19.9186 23.4486 19.5669 23.8002 19.5669 24.2349C19.5669 24.6695 19.9186 25.0211 20.3532 25.0211C20.7878 25.0211 21.1394 24.6695 21.1394 24.2349ZM18.5455 10.5439V5.53713C18.5455 4.9885 18.0966 4.53937 17.5478 4.53937H3.96331C3.4145 4.53937 2.96563 4.98831 2.96563 5.53713V8.07881H14.5822C15.6829 8.07881 16.5799 8.97594 16.5799 10.0765V10.5439H18.5455Z" fill="white"/>
                            </svg>
                        </div>
                        <div class="flex-1 {{ session('locale', 'en') === 'ar' ? 'text-right' : 'text-left' }}">
                            <h3 class="text-base font-bold text-jood-green mb-2">
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
                        class="flex items-start gap-4 {{ session('locale', 'en') === 'ar' ? 'text-right' : 'text-left' }}">
                        <div class="w-14 h-14 bg-jood-green rounded-xl flex items-center justify-center flex-shrink-0">
                            <!-- Warehouse/Storage Icon -->
                           <svg width="32" height="29" viewBox="0 0 32 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M24.9412 18.0598C24.9547 17.3199 25.2581 16.6148 25.7861 16.0964C26.3142 15.5779 27.0247 15.2874 27.7647 15.2874C28.5047 15.2874 29.2152 15.5779 29.7433 16.0964C30.2713 16.6148 30.5747 17.3199 30.5882 18.0598V21.4928C31.2276 22.0646 31.6782 22.8171 31.8805 23.6506C32.0828 24.4842 32.0273 25.3595 31.7212 26.1608C31.4151 26.9621 30.873 27.6516 30.1665 28.138C29.46 28.6244 28.6225 28.8848 27.7647 28.8848C26.907 28.8848 26.0694 28.6244 25.3629 28.138C24.6564 27.6516 24.1143 26.9621 23.8082 26.1608C23.5021 25.3595 23.4466 24.4842 23.6489 23.6506C23.8512 22.8171 24.3018 22.0646 24.9412 21.4928V18.0598ZM26.8235 21.9464C26.8235 22.098 26.7868 22.2473 26.7167 22.3817C26.6466 22.516 26.545 22.6315 26.4207 22.7182C26.0095 23.0043 25.7003 23.4143 25.5383 23.8883C25.3762 24.3624 25.3697 24.8758 25.5196 25.3538C25.6696 25.8318 25.9682 26.2495 26.372 26.546C26.7758 26.8425 27.2637 27.0024 27.7647 27.0024C28.2657 27.0024 28.7536 26.8425 29.1574 26.546C29.5612 26.2495 29.8598 25.8318 30.0098 25.3538C30.1597 24.8758 30.1532 24.3624 29.9911 23.8883C29.8291 23.4143 29.5199 23.0043 29.1087 22.7182C28.9844 22.6315 28.8828 22.516 28.8127 22.3817C28.7426 22.2473 28.7059 22.098 28.7059 21.9464V18.0598C28.6982 17.8153 28.5956 17.5835 28.4199 17.4133C28.2443 17.2431 28.0093 17.1479 27.7647 17.1479C27.5201 17.1479 27.2851 17.2431 27.1095 17.4133C26.9338 17.5835 26.8313 17.8153 26.8235 18.0598V21.9464ZM22.1176 22.2946V13.8264C22.1176 13.5768 22.0185 13.3374 21.842 13.1609C21.6655 12.9844 21.4261 12.8852 21.1765 12.8852H5.17647C4.92686 12.8852 4.68746 12.9844 4.51096 13.1609C4.33445 13.3374 4.23529 13.5768 4.23529 13.8264V25.1205H2.82353C2.07468 25.1205 1.35651 24.823 0.826993 24.2935C0.297478 23.764 7.19842e-10 23.0458 7.19842e-10 22.297L7.19842e-10 8.81652C-1.13676e-05 8.31298 0.134632 7.81861 0.389976 7.38462C0.64532 6.95064 1.01208 6.59283 1.45224 6.34828L12.24 0.35534C12.6734 0.114551 13.1626 -0.0078688 13.6583 0.000392038C14.154 0.00865288 14.6389 0.147304 15.064 0.402399L24.9821 6.35346C25.4002 6.60432 25.7462 6.95918 25.9865 7.38348C26.2267 7.80777 26.3529 8.28705 26.3529 8.77463V13.5713C24.4447 14.1713 23.0588 15.9539 23.0588 18.0598V20.7403C22.6693 21.2087 22.3521 21.7323 22.1176 22.2946ZM10.8235 9.12052H15.5294C15.779 9.12052 16.0184 9.02136 16.1949 8.84485C16.3714 8.66835 16.4706 8.42896 16.4706 8.17934C16.4706 7.92972 16.3714 7.69033 16.1949 7.51383C16.0184 7.33732 15.779 7.23816 15.5294 7.23816H10.8235C10.5739 7.23816 10.3345 7.33732 10.158 7.51383C9.98151 7.69033 9.88235 7.92972 9.88235 8.17934C9.88235 8.42896 9.98151 8.66835 10.158 8.84485C10.3345 9.02136 10.5739 9.12052 10.8235 9.12052ZM20.2353 25.1205H6.11765V14.7676H20.2353V25.1205Z" fill="white"/>
                            </svg>
                        </div>
                        <div class="flex-1 {{ session('locale', 'en') === 'ar' ? 'text-right' : 'text-left' }}">
                            <h3 class="text-base font-bold text-jood-green mb-2">
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
    <section id="clients" class="py-10 md:py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 md:px-8">
            <div class="text-center mb-8 md:mb-16" data-aos="fade-up">
                <h2 class="text-2xl md:text-3xl flex justify-start lg:text-4xl font-bold text-jood-green mb-3 md:mb-4">
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

            <div class="grid grid-cols-2 md:grid-cols-5 gap-2 md:gap-4">
                @php
                    $clients = [
                        [
                            'icon' =>
                                '<path fill-rule="evenodd" clip-rule="evenodd" d="M22.8461 3.86494L24.4806 9.216H29.9131L26.6867 3.87719C26.6797 3.86556 26.6398 3.86494 26.6281 3.86494H22.8461ZM11.6201 17.2026L10.7486 21.1001C10.6955 21.3383 10.585 21.5599 10.4266 21.7456C10.4688 21.8423 10.5005 21.9432 10.5214 22.0466C10.7929 22.3827 10.9409 22.8017 10.9408 23.2338C10.9408 23.5555 10.8603 23.8584 10.7184 24.1237H12.0195V17.5398H16.9263V24.1238H17.9263V17.5398H22.8331V24.1238H28.1085V13.0516C27.8924 13.0842 27.6742 13.1005 27.4556 13.1004C26.147 13.1004 24.8329 12.5012 24.1125 11.3868C23.3921 12.5012 22.0779 13.1004 20.7694 13.1004C19.4608 13.1004 18.1466 12.5012 17.4263 11.3868C16.7059 12.5012 15.3917 13.1004 14.0831 13.1004C12.7746 13.1004 11.4603 12.5012 10.7399 11.3868C10.0197 12.5012 8.70531 13.1004 7.39681 13.1004C7.17437 13.1004 6.95625 13.0837 6.74394 13.0516V14.5169H9.46881C10.2732 14.5169 11.061 14.9987 11.4349 15.7097V15.1264H23.4174V16.5398H11.6717C11.6757 16.5939 11.6777 16.6484 11.6777 16.7034C11.6779 16.8714 11.6568 17.0387 11.6201 17.2026ZM8.2245 2.86494H26.6281L26.6446 2.86506V0.874C26.6446 0.393313 26.2513 0 25.7706 0H8.97438C8.49369 0 8.10038 0.393313 8.10038 0.874V2.87175C8.14159 2.86721 8.18303 2.86494 8.2245 2.86494ZM11.5888 1.93581C11.4562 1.93581 11.329 1.88313 11.2353 1.78937C11.1415 1.6956 11.0888 1.56842 11.0888 1.43581C11.0888 1.3032 11.1415 1.17603 11.2353 1.08226C11.329 0.988491 11.4562 0.935812 11.5888 0.935812H15.4045C15.5371 0.935812 15.6643 0.988491 15.7581 1.08226C15.8518 1.17603 15.9045 1.3032 15.9045 1.43581C15.9045 1.56842 15.8518 1.6956 15.7581 1.78937C15.6643 1.88313 15.5371 1.93581 15.4045 1.93581H11.5888ZM19.3404 1.93581C19.2078 1.93581 19.0807 1.88313 18.9869 1.78937C18.8931 1.6956 18.8404 1.56842 18.8404 1.43581C18.8404 1.3032 18.8931 1.17603 18.9869 1.08226C19.0807 0.988491 19.2078 0.935812 19.3404 0.935812H23.1561C23.2887 0.935812 23.4159 0.988491 23.5097 1.08226C23.6034 1.17603 23.6561 1.3032 23.6561 1.43581C23.6561 1.56842 23.6034 1.6956 23.5097 1.78937C23.4159 1.88313 23.2887 1.93581 23.1561 1.93581H19.3404ZM9.05088 21.844C9.12854 21.844 9.20514 21.8621 9.27461 21.8968C9.34407 21.9316 9.40448 21.982 9.45106 22.0442C9.49763 22.1063 9.52909 22.1785 9.54293 22.2549C9.55678 22.3313 9.55263 22.4099 9.53081 22.4844C9.77738 22.6427 9.94069 22.9192 9.94069 23.2339C9.94069 23.7253 9.54231 24.1238 9.05081 24.1238C8.55937 24.1238 8.16094 23.7254 8.16094 23.2339C8.16094 23.0941 8.19325 22.9618 8.25069 22.844H5.23731C5.29656 22.9654 5.32726 23.0988 5.32706 23.2339C5.32706 23.7253 4.92869 24.1238 4.43719 24.1238C3.94569 24.1238 3.54731 23.7254 3.54731 23.2339C3.54731 23.0941 3.57963 22.9618 3.63706 22.844H3.30375C2.59613 22.844 2.019 22.2668 2.019 21.5592C2.019 21.0921 2.27338 20.6644 2.67869 20.4374L1.31694 14.3472H0.5C0.367392 14.3472 0.240215 14.2946 0.146447 14.2008C0.0526785 14.107 0 13.9799 0 13.8472C0 13.7146 0.0526785 13.5875 0.146447 13.4937C0.240215 13.3999 0.367392 13.3472 0.5 13.3472L1.7155 13.3491C1.82892 13.3492 1.93894 13.3879 2.02736 13.4589C2.11579 13.53 2.17733 13.6291 2.20181 13.7398L2.59919 15.5169H9.46894C10.1088 15.5169 10.6779 16.0574 10.6779 16.7034C10.6779 16.7881 10.6672 16.8815 10.6442 16.9843L9.77275 20.8818C9.74826 20.9926 9.68672 21.0916 9.5983 21.1627C9.50988 21.2337 9.39986 21.2725 9.28644 21.2725L3.30381 21.2744C3.14825 21.2744 3.01906 21.4036 3.01906 21.5591C3.01906 21.7147 3.14825 21.8439 3.30381 21.8439H9.05088V21.844ZM19.7322 19.1423C19.799 19.0289 19.908 18.9465 20.0353 18.9131C20.1627 18.8796 20.298 18.8979 20.412 18.9639C20.5259 19.0299 20.6091 19.1382 20.6435 19.2653C20.6778 19.3924 20.6606 19.5279 20.5954 19.6423L19.5134 21.5164C19.4466 21.6298 19.3376 21.7122 19.2103 21.7456C19.083 21.7791 18.9476 21.7608 18.8337 21.6948C18.7197 21.6288 18.6365 21.5205 18.6022 21.3934C18.5678 21.2663 18.5851 21.1308 18.6502 21.0164L19.7322 19.1423ZM20.7459 19.7276C20.8128 19.6142 20.9217 19.5318 21.0491 19.4984C21.1764 19.4649 21.3118 19.4832 21.4257 19.5492C21.5396 19.6152 21.6228 19.7235 21.6572 19.8506C21.6916 19.9777 21.6743 20.1132 21.6092 20.2276L20.5273 22.1016C20.4604 22.2151 20.3515 22.2975 20.2241 22.3309C20.0968 22.3643 19.9614 22.346 19.8475 22.2801C19.7336 22.2141 19.6503 22.1057 19.616 21.9786C19.5816 21.8516 19.5989 21.716 19.664 21.6016L20.7459 19.7276ZM14.3253 19.1423C14.3921 19.0289 14.5011 18.9465 14.6284 18.9131C14.7558 18.8796 14.8912 18.8979 15.0051 18.9639C15.119 19.0299 15.2022 19.1382 15.2366 19.2653C15.271 19.3924 15.2537 19.5279 15.1886 19.6423L14.1066 21.5164C14.0397 21.6298 13.9308 21.7122 13.8034 21.7456C13.6761 21.7791 13.5407 21.7608 13.4268 21.6948C13.3129 21.6288 13.2297 21.5205 13.1953 21.3934C13.1609 21.2663 13.1782 21.1308 13.2433 21.0164L14.3253 19.1423ZM15.3391 19.7276C15.406 19.6142 15.5149 19.5318 15.6423 19.4984C15.7696 19.4649 15.905 19.4832 16.0189 19.5492C16.1328 19.6152 16.216 19.7235 16.2504 19.8506C16.2848 19.9777 16.2675 20.1132 16.2024 20.2276L15.1204 22.1016C15.0536 22.2151 14.9446 22.2975 14.8173 22.3309C14.69 22.3643 14.5546 22.346 14.4407 22.2801C14.3267 22.2141 14.2435 22.1057 14.2092 21.9786C14.1748 21.8516 14.1921 21.716 14.2572 21.6016L15.3391 19.7276ZM4.59706 25.1237H30.2556C30.3255 25.1238 30.3926 25.1517 30.4421 25.2012C30.4915 25.2507 30.5194 25.3177 30.5195 25.3877V26.8236C30.5194 26.8935 30.4915 26.9606 30.442 27.01C30.3926 27.0595 30.3255 27.0874 30.2556 27.0875H4.59706C4.5271 27.0874 4.46003 27.0595 4.41055 27.0101C4.36108 26.9606 4.33321 26.8935 4.33306 26.8236V25.3877C4.33319 25.3177 4.36105 25.2506 4.41053 25.2012C4.46001 25.1517 4.52709 25.1238 4.59706 25.1237ZM23.4391 9.216H17.9263V3.86494H21.8047L23.4391 9.216ZM13.0479 3.86494L11.4134 9.216H16.9263V3.86494H13.0479ZM10.3721 9.216H4.9395L8.16594 3.87719C8.17294 3.86556 8.21281 3.86494 8.2245 3.86494H12.0066L10.3721 9.216ZM30.2358 10.216C29.9254 11.4321 28.6449 12.1005 27.4557 12.1005C26.2666 12.1005 24.9858 11.4321 24.6754 10.216H30.2358ZM23.5496 10.216C23.2393 11.4321 21.9586 12.1005 20.7694 12.1005C19.5802 12.1005 18.2995 11.4321 17.9891 10.216H23.5496ZM16.8634 10.216C16.5531 11.4321 15.2723 12.1005 14.0831 12.1005C12.8939 12.1005 11.6133 11.4321 11.3029 10.216H16.8634ZM10.1771 10.216C9.86675 11.4321 8.58606 12.1005 7.39687 12.1005C6.20769 12.1005 4.92712 11.4321 4.61675 10.216H10.1771Z" fill="#3A522A"/>',
                            'ar' => 'السوبرماركت',
                            'en' => 'Supermarkets',
                        ],
                        [
                            'icon' =>
                                '<path d="M16.9823 3.30291L15.5443 4.70959L15.8843 6.69629C15.9392 7.02029 15.6911 7.31963 15.3583 7.31963C15.1777 7.31963 15.2715 7.3437 13.3336 6.32095L11.5576 7.2583C11.1676 7.46417 10.709 7.13243 10.7829 6.69629L11.1229 4.70959L9.68487 3.30291C9.36834 2.99357 9.54567 2.45716 9.98088 2.39356L11.9662 2.10422L12.8549 0.297529C13.0503 -0.0988764 13.6167 -0.0994764 13.8123 0.297529L14.7009 2.10422L16.6863 2.39356C17.1223 2.45729 17.2982 2.99424 16.9823 3.30291ZM7.76851 6.03235L7.70551 5.66501C7.95212 5.4246 8.22845 5.23087 8.10732 4.85813C7.98625 4.48559 7.64631 4.49072 7.30797 4.44152L7.14304 4.10732C6.94783 3.71171 6.38189 3.71145 6.18649 4.10732L6.02155 4.44152C5.68075 4.49106 5.34328 4.48532 5.22221 4.85813C5.10114 5.23067 5.37921 5.42634 5.62402 5.66501L5.56101 6.03235C5.48648 6.46709 5.94409 6.79996 6.33489 6.59455L6.6647 6.42109C7.00237 6.59869 7.07604 6.65582 7.24264 6.65582C7.57171 6.65582 7.82465 6.35942 7.76851 6.03235ZM3.10178 8.69905L3.03878 8.33171C3.28538 8.09131 3.56172 7.89757 3.44058 7.52484C3.31951 7.1523 2.97958 7.15743 2.64124 7.10823L2.4763 6.77402C2.2811 6.37842 1.71516 6.37815 1.51976 6.77402L1.35482 7.10823C1.01401 7.15776 0.676543 7.15203 0.555475 7.52484C0.434406 7.89737 0.712477 8.09304 0.957281 8.33171L0.89428 8.69905C0.819745 9.13379 1.27735 9.46666 1.66816 9.26126L1.99796 9.08779C2.33563 9.26539 2.4093 9.32253 2.5759 9.32253C2.90498 9.32253 3.15791 9.02612 3.10178 8.69905ZM21.106 6.03235L21.043 5.66501C21.2896 5.4246 21.5659 5.23087 21.4448 4.85813C21.3237 4.48559 20.9838 4.49072 20.6454 4.44152C20.493 4.13252 20.3942 3.81005 20.0023 3.81005C19.6106 3.81005 19.5104 4.13492 19.3591 4.44152L18.9903 4.49512C18.5537 4.55859 18.3786 5.09673 18.6947 5.40487L18.9615 5.66501C18.9033 6.00461 18.7936 6.32362 19.1107 6.55395C19.4276 6.78422 19.6996 6.58022 20.0023 6.42109C20.34 6.59869 20.4136 6.65582 20.5802 6.65582C20.9092 6.65582 21.162 6.35942 21.106 6.03235ZM25.7727 8.69905L25.7097 8.33171C25.9563 8.09131 26.2326 7.89757 26.1115 7.52484C25.9904 7.1523 25.6505 7.15743 25.3122 7.10823C25.1597 6.79922 25.061 6.47675 24.669 6.47675C24.2774 6.47675 24.1772 6.80162 24.0258 7.10823L23.657 7.16183C23.2205 7.2253 23.0453 7.76344 23.3614 8.07158L23.6283 8.33171C23.57 8.67132 23.4603 8.99032 23.7775 9.22066C24.0944 9.45093 24.3664 9.24693 24.669 9.08779C25.0067 9.26539 25.0804 9.32253 25.247 9.32253C25.5759 9.32253 25.8288 9.02612 25.7727 8.69905ZM5.47741 31.4515C5.48655 31.7519 5.24488 32 4.94427 32H2.13336C0.955148 32 0 31.0448 0 29.8666V19.1998C0 18.0216 0.955148 17.0664 2.13336 17.0664H4.93341C5.22794 17.0664 5.46675 17.3058 5.46675 17.6003C5.46615 27.6445 5.44935 30.5312 5.47741 31.4515ZM3.66672 22.3999C3.66672 22.2584 3.61053 22.1227 3.51051 22.0227C3.41049 21.9227 3.27483 21.8665 3.13338 21.8665C2.99193 21.8665 2.85627 21.9227 2.75625 22.0227C2.65623 22.1227 2.60004 22.2584 2.60004 22.3999V24.6666C2.60004 24.808 2.65623 24.9437 2.75625 25.0437C2.85627 25.1437 2.99193 25.1999 3.13338 25.1999C3.27483 25.1999 3.41049 25.1437 3.51051 25.0437C3.61053 24.9437 3.66672 24.808 3.66672 24.6666V22.3999ZM26.6671 19.1998V29.8666C26.6671 31.0448 25.7119 32 24.5337 32H21.7232C21.4227 32 21.1809 31.7518 21.1901 31.4514C21.2183 30.5328 21.2009 27.6503 21.2003 17.6003C21.2003 17.3058 21.4391 17.0664 21.7337 17.0664H24.5337C25.712 17.0664 26.6671 18.0216 26.6671 19.1998ZM24.067 22.3999C24.067 22.2584 24.0108 22.1227 23.9108 22.0227C23.8108 21.9227 23.6751 21.8665 23.5337 21.8665C23.3922 21.8665 23.2566 21.9227 23.1565 22.0227C23.0565 22.1227 23.0003 22.2584 23.0003 22.3999V24.6666C23.0003 24.808 23.0565 24.9437 23.1565 25.0437C23.2566 25.1437 23.3922 25.1999 23.5337 25.1999C23.6751 25.1999 23.8108 25.1437 23.9108 25.0437C24.0108 24.9437 24.067 24.808 24.067 24.6666V22.3999ZM12.0002 32H14.6669C14.8083 32 14.944 31.9438 15.044 31.8438C15.144 31.7438 15.2002 31.6081 15.2002 31.4667V26.4666C15.2002 26.3251 15.144 26.1895 15.044 26.0894C14.944 25.9894 14.8083 25.9332 14.6669 25.9332H12.0002C11.8587 25.9332 11.7231 25.9894 11.623 26.0894C11.523 26.1895 11.4668 26.3251 11.4668 26.4666V31.4667C11.4668 31.6081 11.523 31.7438 11.623 31.8438C11.7231 31.9438 11.8587 32 12.0002 32ZM20.1336 11.5997V31.4667C20.1336 31.6081 20.0774 31.7438 19.9774 31.8438C19.8774 31.9438 19.7417 32 19.6003 32H16.8002C16.6588 32 16.5231 31.9438 16.4231 31.8438C16.3231 31.7438 16.2669 31.6081 16.2669 31.4667V25.3999C16.2669 25.2584 16.2107 25.1228 16.1107 25.0228C16.0107 24.9227 15.875 24.8666 15.7336 24.8666H10.9335C10.792 24.8666 10.6564 24.9227 10.5564 25.0228C10.4563 25.1228 10.4002 25.2584 10.4002 25.3999V31.4667C10.4002 31.6081 10.344 31.7438 10.2439 31.8438C10.1439 31.9438 10.0083 32 9.86681 32H7.06677C6.92532 32 6.78966 31.9438 6.68964 31.8438C6.58962 31.7438 6.53343 31.6081 6.53343 31.4667V11.5997C6.53343 10.4215 7.48858 9.46633 8.66679 9.46633H18.0003C19.1785 9.46633 20.1336 10.4215 20.1336 11.5997ZM16.0002 20.5332C16.0002 20.3917 15.944 20.2561 15.844 20.156C15.744 20.056 15.6083 19.9998 15.4669 19.9998H11.2002C11.0587 19.9998 10.9231 20.056 10.823 20.156C10.723 20.2561 10.6668 20.3917 10.6668 20.5332C10.6668 20.6746 10.723 20.8103 10.823 20.9103C10.9231 21.0103 11.0587 21.0665 11.2002 21.0665H15.4669C15.6083 21.0665 15.744 21.0103 15.844 20.9103C15.944 20.8103 16.0002 20.6746 16.0002 20.5332ZM16.9336 15.3997C16.9336 15.2583 16.8774 15.1226 16.7774 15.0226C16.6773 14.9226 16.5417 14.8664 16.4002 14.8664H10.2668C10.1254 14.8664 9.98971 14.9226 9.88969 15.0226C9.78967 15.1226 9.73348 15.2583 9.73348 15.3997C9.73348 15.5412 9.78967 15.6769 9.88969 15.7769C9.98971 15.8769 10.1254 15.9331 10.2668 15.9331H16.4002C16.5417 15.9331 16.6773 15.8769 16.7774 15.7769C16.8774 15.6769 16.9336 15.5412 16.9336 15.3997Z" fill="#3A522A"/>',
                            'ar' => 'المطاعم والفنادق',
                            'en' => 'Restaurants & Hotels',
                        ],
                        [
                            'icon' =>
                                '<path d="M19 17H22.465C22.6296 17 22.7916 17.0406 22.9368 17.1182C23.0819 17.1958 23.2057 17.3081 23.297 17.445L25 20H19V17Z" fill="#3A522A"/>
                                <path d="M8 28C9.10457 28 10 27.1046 10 26C10 24.8954 9.10457 24 8 24C6.89543 24 6 24.8954 6 26C6 27.1046 6.89543 28 8 28Z" fill="#3A522A"/>
                                <path d="M18 23.78V16C18 15.7348 17.8946 15.4804 17.7071 15.2929C17.5196 15.1054 17.2652 15 17 15H4C3.73478 15 3.48043 15.1054 3.29289 15.2929C3.10536 15.4804 3 15.7348 3 16V25C3 25.2652 3.10536 25.5196 3.29289 25.7071C3.48043 25.8946 3.73478 26 4 26H5C5 24.346 6.346 23 8 23C9.654 23 11 24.346 11 26H17C17 25.117 17.39 24.33 18 23.78ZM19 21V23.184C19.3203 23.0655 19.6586 23.0033 20 23C21.654 23 23 24.346 23 26H24C24.2652 26 24.5196 25.8946 24.7071 25.7071C24.8946 25.5196 25 25.2652 25 25V21H19Z" fill="#3A522A"/>
                                <path d="M20 28C21.1046 28 22 27.1046 22 26C22 24.8954 21.1046 24 20 24C18.8954 24 18 24.8954 18 26C18 27.1046 18.8954 28 20 28Z" fill="#3A522A"/>
                                <path d="M27 4H22C21.7348 4 21.4804 4.10536 21.2929 4.29289C21.1054 4.48043 21 4.73478 21 5V16H22.465C22.7942 16 23.1183 16.0812 23.4086 16.2364C23.6988 16.3917 23.9463 16.6162 24.129 16.89L25.834 19.448C25.9436 19.6123 26.002 19.8055 26.002 20.003L26 25H27C27.2652 25 27.5196 24.8946 27.7071 24.7071C27.8946 24.5196 28 24.2652 28 24V5C28 4.73478 27.8946 4.48043 27.7071 4.29289C27.5196 4.10536 27.2652 4 27 4ZM26 12C26 12.2652 25.8946 12.5196 25.7071 12.7071C25.5196 12.8946 25.2652 13 25 13H24C23.7348 13 23.4804 12.8946 23.2929 12.7071C23.1054 12.5196 23 12.2652 23 12V11C23 10.7348 23.1054 10.4804 23.2929 10.2929C23.4804 10.1054 23.7348 10 24 10H25C25.2652 10 25.5196 10.1054 25.7071 10.2929C25.8946 10.4804 26 10.7348 26 11V12ZM26 8C26 8.26522 25.8946 8.51957 25.7071 8.70711C25.5196 8.89464 25.2652 9 25 9H24C23.7348 9 23.4804 8.89464 23.2929 8.70711C23.1054 8.51957 23 8.26522 23 8V7C23 6.73478 23.1054 6.48043 23.2929 6.29289C23.4804 6.10536 23.7348 6 24 6H25C25.2652 6 25.5196 6.10536 25.7071 6.29289C25.8946 6.48043 26 6.73478 26 7V8ZM6 4H1C0.734784 4 0.48043 4.10536 0.292893 4.29289C0.105357 4.48043 0 4.73478 0 5V24C0 24.2652 0.105357 24.5196 0.292893 24.7071C0.48043 24.8946 0.734784 25 1 25H2V16C2 15.4696 2.21071 14.9609 2.58579 14.5858C2.96086 14.2107 3.46957 14 4 14H7V5C7 4.73478 6.89464 4.48043 6.70711 4.29289C6.51957 4.10536 6.26522 4 6 4ZM5 12C5 12.2652 4.89464 12.5196 4.70711 12.7071C4.51957 12.8946 4.26522 13 4 13H3C2.73478 13 2.48043 12.8946 2.29289 12.7071C2.10536 12.5196 2 12.2652 2 12V11C2 10.7348 2.10536 10.4804 2.29289 10.2929C2.48043 10.1054 2.73478 10 3 10H4C4.26522 10 4.51957 10.1054 4.70711 10.2929C4.89464 10.4804 5 10.7348 5 11V12ZM5 8C5 8.26522 4.89464 8.51957 4.70711 8.70711C4.51957 8.89464 4.26522 9 4 9H3C2.73478 9 2.48043 8.89464 2.29289 8.70711C2.10536 8.51957 2 8.26522 2 8V7C2 6.73478 2.10536 6.48043 2.29289 6.29289C2.48043 6.10536 2.73478 6 3 6H4C4.26522 6 4.51957 6.10536 4.70711 6.29289C4.89464 6.48043 5 6.73478 5 7V8ZM19 0H9C8.73478 0 8.48043 0.105357 8.29289 0.292893C8.10536 0.48043 8 0.734784 8 1V14H17C17.5304 14 18.0391 14.2107 18.4142 14.5858C18.7893 14.9609 19 15.4696 19 16H20V1C20 0.734784 19.8946 0.48043 19.7071 0.292893C19.5196 0.105357 19.2652 0 19 0ZM13 12C13 12.2652 12.8946 12.5196 12.7071 12.7071C12.5196 12.8946 12.2652 13 12 13H11C10.7348 13 10.4804 12.8946 10.2929 12.7071C10.1054 12.5196 10 12.2652 10 12V11C10 10.7348 10.1054 10.4804 10.2929 10.2929C10.4804 10.1054 10.7348 10 11 10H12C12.2652 10 12.5196 10.1054 12.7071 10.2929C12.8946 10.4804 13 10.7348 13 11V12ZM13 8C13 8.26522 12.8946 8.51957 12.7071 8.70711C12.5196 8.89464 12.2652 9 12 9H11C10.7348 9 10.4804 8.89464 10.2929 8.70711C10.1054 8.51957 10 8.26522 10 8V7C10 6.73478 10.1054 6.48043 10.2929 6.29289C10.4804 6.10536 10.7348 6 11 6H12C12.2652 6 12.5196 6.10536 12.7071 6.29289C12.8946 6.48043 13 6.73478 13 7V8ZM13 4C13 4.26522 12.8946 4.51957 12.7071 4.70711C12.5196 4.89464 12.2652 5 12 5H11C10.7348 5 10.4804 4.89464 10.2929 4.70711C10.1054 4.51957 10 4.26522 10 4V3C10 2.73478 10.1054 2.48043 10.2929 2.29289C10.4804 2.10536 10.7348 2 11 2H12C12.2652 2 12.5196 2.10536 12.7071 2.29289C12.8946 2.48043 13 2.73478 13 3V4ZM18 12C18 12.2652 17.8946 12.5196 17.7071 12.7071C17.5196 12.8946 17.2652 13 17 13H16C15.7348 13 15.4804 12.8946 15.2929 12.7071C15.1054 12.5196 15 12.2652 15 12V11C15 10.7348 15.1054 10.4804 15.2929 10.2929C15.4804 10.1054 15.7348 10 16 10H17C17.2652 10 17.5196 10.1054 17.7071 10.2929C17.8946 10.4804 18 10.7348 18 11V12ZM18 8C18 8.26522 17.8946 8.51957 17.7071 8.70711C17.5196 8.89464 17.2652 9 17 9H16C15.7348 9 15.4804 8.89464 15.2929 8.70711C15.1054 8.51957 15 8.26522 15 8V7C15 6.73478 15.1054 6.48043 15.2929 6.29289C15.4804 6.10536 15.7348 6 16 6H17C17.2652 6 17.5196 6.10536 17.7071 6.29289C17.8946 6.48043 18 6.73478 18 7V8ZM18 4C18 4.26522 17.8946 4.51957 17.7071 4.70711C17.5196 4.89464 17.2652 5 17 5H16C15.7348 5 15.4804 4.89464 15.2929 4.70711C15.1054 4.51957 15 4.26522 15 4V3C15 2.73478 15.1054 2.48043 15.2929 2.29289C15.4804 2.10536 15.7348 2 16 2H17C17.2652 2 17.5196 2.10536 17.7071 2.29289C17.8946 2.48043 18 2.73478 18 3V4Z" fill="#3A522A"/>',
                            'ar' => 'شركات التوريد',
                            'en' => 'Food Suppliers',
                        ],
                        [
                            'icon' =>
                                '<path d="M4.81249 21.9375H14.4375V23.0625H4.81249V21.9375ZM5.89156 26.1264C4.99368 26.1264 4.26324 26.8569 4.26324 27.7547C4.26324 28.6526 4.99368 29.3831 5.89156 29.3831C6.78943 29.3831 7.51987 28.6526 7.51987 27.7547C7.51987 26.8569 6.78943 26.1264 5.89156 26.1264ZM18.125 13.4375V20.9375H27.75V13.4375H25.5625V16.0502C25.5625 16.2234 25.464 16.3843 25.3167 16.4754C25.1694 16.5665 24.9776 16.5747 24.8227 16.4972L22.9182 15.545L21.0148 16.4972C20.9464 16.5319 20.8707 16.55 20.794 16.55C20.7026 16.55 20.6179 16.525 20.5376 16.4754C20.3903 16.3843 20.3126 16.2234 20.3126 16.0502V13.4375H18.125ZM4.81249 13.4375V20.9375H14.4375V13.4375H12.25V16.0502C12.25 16.2234 12.1574 16.3843 12.0101 16.4754C11.9299 16.5243 11.8378 16.5501 11.7439 16.5501C11.6666 16.5501 11.5903 16.532 11.5212 16.4973L9.61768 15.5451L7.71512 16.4973C7.63929 16.5354 7.55496 16.5534 7.47018 16.5496C7.3854 16.5458 7.30302 16.5203 7.23093 16.4755C7.08362 16.3844 6.99999 16.2236 6.99999 16.0503V13.4375H4.81249ZM18.125 21.9375H27.75V23.0625H18.125V21.9375Z" fill="#3A522A"/>
                                <path d="M9.84219 14.5393L11.25 15.2416V13.4375H8V15.2416L9.4 14.5393C9.46854 14.5046 9.54428 14.4865 9.62109 14.4865C9.69791 14.4865 9.77365 14.5046 9.84219 14.5393ZM12.8079 26.1264C11.91 26.1264 11.1796 26.8569 11.1796 27.7547C11.1796 28.6526 11.91 29.3831 12.8079 29.3831C13.7057 29.3831 14.4362 28.6526 14.4362 27.7547C14.4362 26.8569 13.7057 26.1264 12.8079 26.1264Z" fill="#3A522A"/>
                                <path d="M28.4945 24.0625H3.5055C1.5765 24.0625 0 25.5677 0 27.4968V28.0127C0 29.9418 1.5765 31.5625 3.5055 31.5625H28.4944C30.4235 31.5625 32 29.9418 32 28.0127V27.4968C32 25.5677 30.4235 24.0625 28.4945 24.0625ZM5.89156 30.3826C4.44256 30.3826 3.26369 29.2037 3.26369 27.7547C3.26369 26.3057 4.44256 25.1269 5.89156 25.1269C7.34062 25.1269 8.51944 26.3057 8.51944 27.7547C8.51944 29.2037 7.34056 30.3826 5.89156 30.3826ZM12.8079 30.3826C11.3589 30.3826 10.18 29.2037 10.18 27.7547C10.18 26.3057 11.3589 25.1269 12.8079 25.1269C14.2569 25.1269 15.4358 26.3057 15.4358 27.7547C15.4358 29.2037 14.2569 30.3826 12.8079 30.3826ZM19.7241 30.3826C18.2751 30.3826 17.0963 29.2037 17.0963 27.7547C17.0963 26.3057 18.2751 25.1269 19.7241 25.1269C21.1731 25.1269 22.352 26.3057 22.352 27.7547C22.352 29.2037 21.1732 30.3826 19.7241 30.3826ZM26.6405 30.3826C25.1915 30.3826 24.0126 29.2037 24.0126 27.7547C24.0126 26.3057 25.1915 25.1269 26.6405 25.1269C28.0895 25.1269 29.2684 26.3057 29.2684 27.7547C29.2683 29.2037 28.0895 30.3826 26.6405 30.3826ZM23.1488 14.5393L24.5625 15.2416V13.4375H21.3125V15.2416L22.7068 14.5393C22.7771 14.5041 22.8448 14.4865 22.9214 14.4865C22.9979 14.4865 23.0784 14.5041 23.1488 14.5393Z" fill="#3A522A"/>
                                <path d="M26.6405 26.1264C25.7426 26.1264 25.0122 26.8569 25.0122 27.7547C25.0122 28.6526 25.7426 29.3831 26.6405 29.3831C27.5384 29.3831 28.2688 28.6526 28.2688 27.7547C28.2687 26.8569 27.5383 26.1264 26.6405 26.1264ZM19.7241 26.1264C18.8263 26.1264 18.0958 26.8569 18.0958 27.7547C18.0958 28.6526 18.8263 29.3831 19.7241 29.3831C20.622 29.3831 21.3524 28.6526 21.3524 27.7547C21.3524 26.8569 20.622 26.1264 19.7241 26.1264ZM31.4931 0H0.506875C0.230812 0 0 0.16825 0 0.44425V2.44338C0 2.71944 0.230812 3 0.506875 3H19V4.94225C19 5.21831 19.2224 5.5 19.4984 5.5H21V5.94181C20.9994 6.27479 21.1102 6.59838 21.3149 6.861L15.8211 8.97381C15.711 9.01613 15.6195 9.09599 15.5626 9.19928C15.5057 9.30258 15.4871 9.42266 15.5102 9.53831L16.0098 12.0372C16.0358 12.1671 16.1124 12.2814 16.2226 12.355C16.3329 12.4285 16.4678 12.4552 16.5978 12.4292C16.6622 12.4164 16.7234 12.391 16.7779 12.3544C16.8324 12.3179 16.8792 12.271 16.9156 12.2164C16.952 12.1618 16.9773 12.1006 16.9901 12.0362C17.0028 11.9718 17.0027 11.9055 16.9899 11.8412L16.5728 9.7555L22.5044 7.47412L28.8887 9.73406L28.0346 11.7437C27.9845 11.8654 27.9844 12.0019 28.0344 12.1236C28.0843 12.2453 28.1802 12.3425 28.3013 12.3939C28.4224 12.4454 28.5589 12.447 28.6812 12.3985C28.8034 12.3499 28.9017 12.2552 28.9545 12.1347L30.0165 9.63581C30.0432 9.57302 30.0567 9.50543 30.0563 9.4372C30.0559 9.36897 30.0415 9.30156 30.014 9.2391C29.9865 9.17665 29.9465 9.12048 29.8965 9.07406C29.8465 9.02764 29.7876 8.99195 29.7232 8.96919L23.7011 6.83681C23.8876 6.58687 23.9999 6.27706 23.9999 5.94187V5.5H25.4958C25.7718 5.5 25.9999 5.21831 25.9999 4.94225V3H31.4931C31.7691 3 31.9999 2.71944 31.9999 2.44338V0.44425C32 0.16825 31.7692 0 31.4931 0ZM23 5.94181C23 6.21737 22.7756 6.44156 22.5 6.44156C22.2244 6.44156 22 6.21737 22 5.94181V5.5H23V5.94181Z" fill="#3A522A"/>',
                            'ar' => 'معامل تجهيز الأغذية',
                            'en' => 'Food Processing',
                        ],
                        [
                            'icon' =>
                                '<path d="M31.0983 13.7144H24.7052L21.8481 16.5715H26.8572C27.1224 16.5732 27.3835 16.6372 27.6195 16.7584L31.0983 13.7144ZM16.5714 26.8572H18.8577V28.0001H16.5714V26.8572ZM28.5714 18.2858V28.8035L31.8286 25.5464C31.8828 25.4941 31.926 25.4314 31.9554 25.3621C31.9849 25.2928 32.0001 25.2182 32 25.1429V14.444L28.4154 17.5806C28.5176 17.8017 28.5708 18.0422 28.5714 18.2858ZM12.9714 30.1224L12.9817 30.1127C13.0853 30.0059 13.1431 29.863 13.1429 29.7144V18.2858C13.1429 18.1342 13.0827 17.9889 12.9755 17.8817C12.8683 17.7746 12.723 17.7144 12.5714 17.7144H0.571437C0.419883 17.7144 0.274535 17.7746 0.16737 17.8817C0.0602048 17.9889 0 18.1342 0 18.2858L0 29.7144C0 29.8659 0.0602048 30.0113 0.16737 30.1184C0.274535 30.2256 0.419883 30.2858 0.571437 30.2858H12.5714C12.7211 30.2862 12.8649 30.2274 12.9714 30.1224ZM5.71431 28C5.71431 28.6312 5.20262 29.1429 4.57144 29.1429H2.28569C1.6545 29.1429 1.14281 28.6312 1.14281 28V26.8572C1.14281 26.226 1.6545 25.7143 2.28569 25.7143H4.57137C5.20256 25.7143 5.71425 26.226 5.71425 26.8572L5.71431 28ZM11.4286 29.1429H9.71425C9.56269 29.1429 9.41735 29.0827 9.31018 28.9755C9.20302 28.8684 9.14281 28.723 9.14281 28.5715C9.14281 28.4199 9.20302 28.2746 9.31018 28.1674C9.41735 28.0602 9.56269 28 9.71425 28H11.4286C11.5801 28 11.7255 28.0602 11.8326 28.1674C11.9398 28.2746 12 28.4199 12 28.5715C12 28.723 11.9398 28.8684 11.8326 28.9755C11.7255 29.0827 11.5801 29.1429 11.4286 29.1429ZM11.4286 26.8572H9.71425C9.56269 26.8572 9.41735 26.797 9.31018 26.6899C9.20302 26.5827 9.14281 26.4373 9.14281 26.2858C9.14281 26.1342 9.20302 25.9889 9.31018 25.8817C9.41735 25.7746 9.56269 25.7144 9.71425 25.7144H11.4286C11.5801 25.7144 11.7255 25.7746 11.8326 25.8817C11.9398 25.9889 12 26.1342 12 26.2858C12 26.4373 11.9398 26.5827 11.8326 26.6899C11.7255 26.797 11.5801 26.8572 11.4286 26.8572Z" fill="#3A522A"/>
                                <path d="M2.2857 26.8572H4.57201V28.0001H2.2857V26.8572ZM27.2509 30.1252L27.2572 30.1143L27.2681 30.104C27.3693 29.9993 27.4267 29.8599 27.4286 29.7143V18.2858C27.4286 18.1342 27.3684 17.9889 27.2613 17.8817C27.1541 17.7745 27.0087 17.7143 26.8572 17.7143H14.8572C14.7056 17.7143 14.5603 17.7745 14.4531 17.8817C14.346 17.9889 14.2858 18.1342 14.2858 18.2858V29.7143C14.2858 29.8659 14.346 30.0112 14.4531 30.1184C14.5603 30.2255 14.7056 30.2858 14.8572 30.2858H26.8572C27.0042 30.2848 27.1452 30.2273 27.2509 30.1252ZM20 28C20 28.6312 19.4883 29.1429 18.8571 29.1429H16.5714C15.9403 29.1429 15.4286 28.6312 15.4286 28V26.8571C15.4286 26.2259 15.9403 25.7143 16.5714 25.7143H18.8571C19.4883 25.7143 20 26.2259 20 26.8571V28ZM25.7143 29.1429H24C23.8485 29.1429 23.7031 29.0827 23.5959 28.9755C23.4888 28.8683 23.4286 28.723 23.4286 28.5714C23.4286 28.4199 23.4888 28.2745 23.5959 28.1674C23.7031 28.0602 23.8485 28 24 28H25.7143C25.8659 28 26.0112 28.0602 26.1184 28.1674C26.2256 28.2745 26.2858 28.4199 26.2858 28.5714C26.2858 28.723 26.2256 28.8683 26.1184 28.9755C26.0112 29.0827 25.8659 29.1429 25.7143 29.1429ZM25.7143 26.8572H24C23.8485 26.8572 23.7031 26.797 23.5959 26.6898C23.4888 26.5827 23.4286 26.4373 23.4286 26.2858C23.4286 26.1342 23.4888 25.9889 23.5959 25.8817C23.7031 25.7745 23.8485 25.7143 24 25.7143H25.7143C25.8659 25.7143 26.0112 25.7745 26.1184 25.8817C26.2256 25.9889 26.2858 26.1342 26.2858 26.2858C26.2858 26.4373 26.2256 26.5827 26.1184 26.6898C26.0112 26.797 25.8659 26.8572 25.7143 26.8572ZM20.7623 3.044L24.2412 3.74736e-06H19.6246L15.9515 2.85713H20C20.2652 2.85891 20.5263 2.92291 20.7623 3.044ZM13.3177 0.164566C13.293 0.18987 13.2661 0.212823 13.2371 0.233129L9.50113 2.85713H14.0897L17.7628 3.74736e-06H13.7143C13.6405 -0.000267084 13.5675 0.0141449 13.4994 0.0423989C13.4313 0.0706528 13.3696 0.112183 13.3177 0.164566ZM24.9714 11.8286C25.0253 11.7767 25.0682 11.7146 25.0977 11.6459C25.1271 11.5772 25.1425 11.5033 25.1429 11.4286V0.729754L21.5583 3.86632C21.6604 4.0874 21.7136 4.32791 21.7143 4.57144V15.0909L24.9714 11.8286ZM5.88913 13.8789C5.86446 13.9042 5.83749 13.9271 5.80857 13.9474L2.07257 16.5714H6.39088C6.3232 16.3884 6.28763 16.1951 6.28576 16V13.7143C6.21203 13.714 6.13899 13.7284 6.07089 13.7567C6.00279 13.7849 5.941 13.8265 5.88913 13.8789ZM9.71432 13.1429H12.0006V14.2858H9.71432V13.1429Z" fill="#3A522A"/>
                                <path d="M8 16.5714H20C20.1496 16.5719 20.2933 16.5134 20.4 16.4086L20.4114 16.3971C20.5145 16.2907 20.572 16.1482 20.5714 16V4.57144C20.5714 4.41988 20.5112 4.27454 20.4041 4.16737C20.2969 4.0602 20.1516 4 20 4H8C7.84844 4 7.70309 4.0602 7.59593 4.16737C7.48876 4.27454 7.42856 4.41988 7.42856 4.57144V16C7.42856 16.1516 7.48876 16.2969 7.59593 16.4041C7.70309 16.5112 7.84844 16.5714 8 16.5714ZM17.1429 12H18.8572C19.0087 12 19.1541 12.0602 19.2613 12.1674C19.3684 12.2745 19.4286 12.4199 19.4286 12.5714C19.4286 12.723 19.3684 12.8683 19.2613 12.9755C19.1541 13.0827 19.0087 13.1429 18.8572 13.1429H17.1429C16.9913 13.1429 16.846 13.0827 16.7388 12.9755C16.6316 12.8683 16.5714 12.723 16.5714 12.5714C16.5714 12.4199 16.6316 12.2745 16.7388 12.1674C16.846 12.0602 16.9913 12 17.1429 12ZM17.1429 14.2857H18.8572C19.0087 14.2857 19.1541 14.346 19.2613 14.4531C19.3684 14.5603 19.4286 14.7056 19.4286 14.8572C19.4286 15.0087 19.3684 15.1541 19.2613 15.2613C19.1541 15.3684 19.0087 15.4286 18.8572 15.4286H17.1429C16.9913 15.4286 16.846 15.3684 16.7388 15.2613C16.6316 15.1541 16.5714 15.0087 16.5714 14.8572C16.5714 14.7056 16.6316 14.5603 16.7388 14.4531C16.846 14.346 16.9913 14.2857 17.1429 14.2857ZM8.57143 13.1429C8.57143 12.5117 9.08312 12 9.71431 12H12C12.6312 12 13.1429 12.5117 13.1429 13.1429V14.2857C13.1429 14.9169 12.6312 15.4286 12 15.4286H9.71431C9.08312 15.4286 8.57143 14.9169 8.57143 14.2857V13.1429Z" fill="#3A522A"/>',
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
                            <svg class="w-7 h-6" fill="none"
                                viewBox="0 0 32 32">{!! $client['icon'] !!}</svg>
                        </div>
                        <h3 class="font-bold text-jood-green text-sm">
                            {{ session('locale', 'en') === 'ar' ? $client['ar'] : $client['en'] }}</h3>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-10 md:py-20 bg-white overflow-hidden">
        <div class="max-w-6xl mx-auto px-4 md:px-8">
            <div class="bg-[#a1bd68] rounded-2xl md:rounded-3xl relative p-4 sm:p-6 md:p-12 " data-aos="fade-up">
                <div class="grid md:grid-cols-2 gap-4 md:gap-0 items-center">

                    <!-- Content Side -->
                    <div
                        class="order-1 p-2 sm:p-4 md:p-12 {{ session('locale', 'en') === 'ar' ? 'md:order-1 text-right' : 'md:order-1 text-left' }}">
                        <h2 class="text-lg sm:text-xl md:text-2xl font-bold text-jood-green-dark leading-tight mb-3 md:mb-4">
                            {{ session('locale', 'en') === 'ar' ? 'جودة تُحفظ بعناية ، طعم طبيعي يدوم وثقة تبدأ من أول تجربة' : 'Quality preserved with care, natural taste that lasts, and trust starting from the first experience' }}
                        </h2>
                        <p class="text-white text-sm sm:text-base md:text-lg mb-4 md:mb-6">
                            {{ session('locale', 'en') === 'ar' ? 'عناية دقيقة في كل خطوة، وجودة تُلاحظ من أول تجربة.' : 'Meticulous care at every step, and quality you notice from the first experience.' }}
                        </p>
                        <a href="#contact"
                            class="inline-block w-full sm:w-auto bg-jood-green text-center text-white px-6 sm:px-8 py-2.5 sm:py-3 rounded-xl font-bold text-base sm:text-lg hover:bg-jood-green-dark transition shadow-lg">
                            {{ session('locale', 'en') === 'ar' ? 'تواصل معنا' : 'Contact Us' }}
                        </a>
                    </div>

                    <!-- Truck Image Side - Now visible on all screens -->
                    <div
                        class="order-2 relative {{ session('locale', 'en') === 'ar' ? 'md:order-2' : 'md:order-2' }} md:p-0 flex justify-center">
                        <img src="{{ asset('images/cta-truck.png') }}" alt="Jood Harvest Truck"
                            class="w-full max-w-[200px] md:max-w-none md:absolute md:top-1/2 md:-translate-y-1/2 {{ session('locale', 'en') === 'ar' ? 'md:left-0 md:-translate-x-1/4 lg:-translate-x-1/3' : 'md:right-0 md:translate-x-1/4 lg:translate-x-1/3' }} object-contain"
                            style="max-height: 280px;">
                    </div>

                </div>
            </div>
        </div>
    </section>


    <!-- Contact Section -->
    <section id="contact" class="py-10 md:py-20 bg-white"
        dir="{{ session('locale', 'en') === 'ar' ? 'rtl' : 'ltr' }}">
        <div class="max-w-6xl mx-auto px-4 md:px-8">
            
            <div class="relative flex flex-col md:block">
                <!-- Form Container (Background) -->
                <div class="bg-[#d4e4bc] rounded-3xl p-8 md:py-12 {{ session('locale', 'en') === 'ar' ? 'md:pr-12 md:pl-80 lg:pl-96' : 'md:pl-12 md:pr-80 lg:pr-96' }}"
                    data-aos="fade-up">

                    @if (session('success'))
                        <div class="bg-green-100 border border-green-600 text-green-800 px-6 py-4 rounded-lg mb-6">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contact.store') }}">
                        @csrf

                        <div class="grid md:grid-cols-2 gap-4 mb-4">
                            <div class="{{ session('locale', 'en') === 'ar' ? 'md:order-2' : 'md:order-1' }}">
                                <label class="block text-sm font-bold text-jood-green-dark mb-2">
                                    {{ session('locale', 'en') === 'ar' ? 'الأسم' : 'Name' }}
                                </label>
                                <input type="text" name="name" required
                                    placeholder="{{ session('locale', 'en') === 'ar' ? 'الأسم' : 'Your Name' }}"
                                    class="w-full px-4 py-3 bg-white border-none rounded-lg focus:ring-2 focus:ring-jood-green outline-none placeholder-gray-400">
                            </div>

                            <div class="{{ session('locale', 'en') === 'ar' ? 'md:order-1' : 'md:order-2' }}">
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
                            <textarea name="message" rows="3" required
                                placeholder="{{ session('locale', 'en') === 'ar' ? 'نص الرسالة' : 'Your Message' }}"
                                class="w-full px-4 py-3 bg-white border-none rounded-lg focus:ring-2 focus:ring-jood-green outline-none resize-none placeholder-gray-400"></textarea>
                        </div>

                        <button type="submit"
                            class="w-full bg-jood-green text-white py-3 rounded-lg font-bold text-lg hover:bg-opacity-90 transition shadow-lg">
                            {{ session('locale', 'en') === 'ar' ? 'ارسال' : 'Send' }}
                        </button>
                    </form>
                </div>

                <!-- Contact Info Card (Overlapping) -->
                <div class="order-first md:order-none mt-0 md:mt-0 md:absolute md:top-1/4 md:-translate-y-1/2 z-10 w-full md:w-72 lg:w-80
                        {{ session('locale', 'en') === 'ar' ? 'md:left-0 lg:left-[-4%]' : 'md:right-4 lg:right-[-10%] md:left-0 lg:left-[74%]' }}"
                    data-aos="fade-up" data-aos-delay="100">

                    <div class="bg-jood-green text-white rounded-3xl p-8 shadow-2xl">

                        <div class="mb-6 {{ session('locale', 'en') === 'ar' ? 'text-right' : 'text-left' }}">
                            <h4 class="text-xl font-bold mb-2">
                                {{ session('locale', 'en') === 'ar' ? 'معلومات التواصل' : 'Contact Info' }}
                            </h4>
                            <div class="flex gap-1 {{ session('locale', 'en') === 'ar' ? 'justify-start' : 'justify-start' }}">
                                <span class="w-10 h-1 bg-white/50 rounded-full"></span>
                                <span class="w-2 h-1 bg-white/50 rounded-full"></span>
                            </div>
                        </div>

                        <div class="space-y-5">
                            <div class="flex items-center gap-3 {{ session('locale', 'en') === 'ar' ? 'text-right' : 'text-left'  }}">
                                <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <p class="text-sm text-white/90 {{ session('locale', 'en') === 'ar' ? 'text-right' : 'text-left' }}">
                                    anki 54Świętochłowi5
                                </p>
                            </div>

                            <div class="flex items-center gap-3 {{ session('locale', 'en') === 'ar' ? 'text-right' : 'text-left'  }}">
                                <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                    </svg>
                                </div>
                                <p class="text-sm text-white/90 {{ session('locale', 'en') === 'ar' ? 'text-right' : 'text-left' }}">nvt.isst.nute@gmail.com</p>
                            </div>

                            <div class="flex items-center gap-3 {{ session('locale', 'en') === 'ar' ? 'text-right' : 'text-left'  }}">
                                <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0">
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
            </div>
        </div>
    </section>



    <!-- Footer -->
    <footer class="py-8 md:py-16" style="background: linear-gradient(to right, #ebede9, #fdfdfd 50%, #ebede9);">
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

        // Mobile Bottom Navigation Active State
        document.addEventListener('DOMContentLoaded', function() {
            const sections = document.querySelectorAll('section[id]');
            const bottomNavLinks = document.querySelectorAll('.mobile-bottom-nav a');
            
            function updateActiveLink() {
                const scrollPos = window.scrollY + 100;
                
                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    const sectionHeight = section.offsetHeight;
                    const sectionId = section.getAttribute('id');
                    
                    if (scrollPos >= sectionTop && scrollPos < sectionTop + sectionHeight) {
                        bottomNavLinks.forEach(link => {
                            link.classList.remove('active');
                            if (link.getAttribute('href') === '#' + sectionId) {
                                link.classList.add('active');
                            }
                        });
                    }
                });
            }
            
            window.addEventListener('scroll', updateActiveLink);
            updateActiveLink();

            // Why Us Cards Scroll Indicator
            const cardsContainer = document.querySelector('.why-us-cards-grid');
            const scrollDots = document.querySelectorAll('.scroll-indicator span');
            
            if (cardsContainer && scrollDots.length > 0) {
                cardsContainer.addEventListener('scroll', function() {
                    const scrollLeft = cardsContainer.scrollLeft;
                    const cardWidth = 280 + 16; // card width + gap
                    const activeIndex = Math.round(scrollLeft / cardWidth);
                    
                    scrollDots.forEach((dot, i) => {
                        dot.classList.toggle('active', i === activeIndex);
                    });
                });
            }
        });
    </script>

    <!-- Mobile Bottom Navigation -->
    <nav class="mobile-bottom-nav md:hidden">
        <div class="nav-items">
            <a href="#home" class="active">
                <span class="nav-icon-wrap">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                </span>
                <span>{{ session('locale', 'en') === 'ar' ? 'الرئيسية' : 'Home' }}</span>
            </a>
            <a href="#why-us">
                <span class="nav-icon-wrap">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </span>
                <span>{{ session('locale', 'en') === 'ar' ? 'لماذا نحن' : 'Why Us' }}</span>
            </a>
            <a href="#services">
                <span class="nav-icon-wrap">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </span>
                <span>{{ session('locale', 'en') === 'ar' ? 'خدماتنا' : 'Services' }}</span>
            </a>
            <a href="#clients">
                <span class="nav-icon-wrap">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </span>
                <span>{{ session('locale', 'en') === 'ar' ? 'العملاء' : 'Clients' }}</span>
            </a>
            <a href="#contact">
                <span class="nav-icon-wrap">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </span>
                <span>{{ session('locale', 'en') === 'ar' ? 'تواصل' : 'Contact' }}</span>
            </a>
        </div>
    </nav>
</body>

</html>
