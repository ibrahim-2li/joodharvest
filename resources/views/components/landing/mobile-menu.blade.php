@props(['locale' => session('locale', 'en')])

<!-- Modern Mobile Menu Backdrop -->
<div class="mobile-menu-backdrop md:hidden" :class="{ 'active': mobileMenu }" @click="mobileMenu = false"></div>

<!-- Modern Mobile Menu Drawer -->
<div class="mobile-menu-drawer md:hidden" :class="{ 'active': mobileMenu }">
    <div class="menu-header">
        <img src="{{ asset('images/JOOD.png') }}" class="h-10" alt="Jood Harvest">
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
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
            </span>
            {{ $locale === 'ar' ? 'الرئيسية' : 'Home' }}
        </a>
        <a href="#why-us" @click="mobileMenu = false">
            <span class="nav-icon">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </span>
            {{ $locale === 'ar' ? 'لماذا نحن' : 'Why Us' }}
        </a>
        <a href="#services" @click="mobileMenu = false">
            <span class="nav-icon">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
            </span>
            {{ $locale === 'ar' ? 'خدماتنا' : 'Services' }}
        </a>
        <a href="#clients" @click="mobileMenu = false">
            <span class="nav-icon">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </span>
            {{ $locale === 'ar' ? 'عملاؤنا' : 'Clients' }}
        </a>
        <a href="#contact" @click="mobileMenu = false">
            <span class="nav-icon">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </span>
            {{ $locale === 'ar' ? 'تواصل معنا' : 'Contact Us' }}
        </a>
    </nav>

    <div class="lang-switcher">
        <a href="{{ route('locale.change', 'en') }}" class="lang-btn {{ $locale === 'en' ? 'active' : '' }}">
            English
        </a>
        <a href="{{ route('locale.change', 'ar') }}" class="lang-btn {{ $locale === 'ar' ? 'active' : '' }}">
            العربية
        </a>
    </div>
</div>
