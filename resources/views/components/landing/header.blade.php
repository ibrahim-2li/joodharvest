@props(['locale' => session('locale', 'en')])

<!-- Header/Navbar - Floating Pill Style -->
<header class="fixed top-6 left-1/2 -translate-x-1/2 z-50 w-[95%] max-w-6xl">
    <nav dir="ltr"
        class="bg-jood-light rounded-full shadow-lg px-4 md:px-8 py-3 flex items-center justify-between flex-row-reverse">
        <!-- Logo -->
        <a href="#" class="flex-shrink-0">
            <img src="{{ asset('images/logo.png') }}" class="h-12 md:h-16 w-auto" alt="Jood Harvest">
        </a>

        <!-- Desktop Navigation -->
        <div class="hidden md:flex items-center gap-4 {{ $locale === 'ar' ? 'flex-row-reverse' : '' }}">
            <a href="#home"
                class="px-3 py-2 text-black hover:text-jood-green font-bold text-lg transition flex flex-col items-center group">
                <span>{{ $locale === 'ar' ? 'الرئيسية' : 'Home' }}</span>
                <span class="w-0 group-hover:w-full h-0.5 bg-jood-green transition-all"></span>
            </a>
            <a href="#why-us" class="px-3 py-2 text-black hover:text-jood-green text-lg transition">
                {{ $locale === 'ar' ? 'لماذا نحن' : 'Why Us' }}
            </a>
            <a href="#services" class="px-3 py-2 text-black hover:text-jood-green text-lg transition">
                {{ $locale === 'ar' ? 'خدماتنا' : 'Services' }}
            </a>
            <a href="#clients" class="px-3 py-2 text-black hover:text-jood-green text-lg transition">
                {{ $locale === 'ar' ? 'عملاؤنا' : 'Clients' }}
            </a>
        </div>

        <!-- Right Side - Language + CTA -->
        <div class="hidden md:flex items-center gap-3 flex-row-reverse">
            <!-- Language Switcher -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open"
                    class="flex items-center gap-1 px-4 py-2 border border-gray-300 rounded-full text-jood-green-dark font-medium hover:bg-gray-50 transition">
                    <span>{{ $locale === 'ar' ? 'AR' : 'EN' }}</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" @click.away="open = false" x-cloak
                    class="absolute top-full mt-2 bg-white border rounded-xl shadow-lg overflow-hidden {{ $locale === 'ar' ? 'left-0' : 'right-0' }}">
                    <a href="{{ route('locale.change', 'en') }}" class="block px-4 py-2 hover:bg-gray-100">English</a>
                    <a href="{{ route('locale.change', 'ar') }}" class="block px-4 py-2 hover:bg-gray-100">العربية</a>
                </div>
            </div>
            <!-- CTA Button -->
            <a href="#contact"
                class="bg-jood-green text-white px-6 py-2.5 rounded-full font-bold hover:bg-jood-green-dark transition">
                {{ $locale === 'ar' ? 'تواصل معنا' : 'Contact Us' }}
            </a>
        </div>

        <!-- Mobile Menu Toggle -->
        <button @click="mobileMenu = !mobileMenu" class="md:hidden p-2 rounded-lg hover:bg-white/50 transition">
            <svg class="w-6 h-6 text-jood-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </nav>
</header>
