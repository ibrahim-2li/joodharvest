@props(['unreadCount' => 0])

@php
    $isRTL = session('locale', 'en') === 'ar';
@endphp

{{-- Sidebar --}}
<div x-show="!sidebarCollapsed || mobileSidebarOpen" x-bind:class="mobileSidebarOpen ? 'translate-x-0' : ''"
    :class="sidebarCollapsed ? 'md:w-0 md:overflow-hidden' : 'md:w-64'"
    class="fixed md:relative z-30 w-64 bg-white shadow-xl h-full transition-all duration-300 {{ $isRTL ? 'right-0 md:right-auto translate-x-full md:translate-x-0' : 'left-0 md:left-auto -translate-x-full md:translate-x-0' }}"
    x-transition>

    {{-- Logo Section --}}
    <div class="bg-green-700 hover:bg-green-800 text-white px-6 py-6 relative">
        <div class="flex items-center justify-between">
            <div>
                <div class="text-2xl font-black text-white">
                    <span>Jood</span><span class="text-gray-200">Harvest</span>
                </div>
                <p class="text-gray-100 text-sm mt-1">
                    {{ session('locale', 'en') === 'ar' ? 'لوحة التحكم' : 'Admin Dashboard' }}
                </p>
            </div>
            {{-- Close Sidebar Button --}}
            <button @click="sidebarCollapsed = true" class="text-white hover:text-gray-200 focus:outline-none"
                :title="'{{ session('locale', 'en') === 'ar' ? 'إخفاء القائمة الجانبية' : 'Hide Sidebar' }}'">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>
    </div>

    {{-- User Info --}}
    <x-admin.user-info />

    {{-- Navigation --}}
    <nav class="px-4 py-6 space-y-2">
        <x-admin.nav-item section="hero" icon="home">
            {{ session('locale', 'en') === 'ar' ? 'قسم الHero ' : 'Hero Section' }}
        </x-admin.nav-item>

        <x-admin.nav-item section="about" icon="info">
            {{ session('locale', 'en') === 'ar' ? 'قسم من نحن' : 'About Section' }}
        </x-admin.nav-item>

        <x-admin.nav-item section="services" icon="briefcase">
            {{ session('locale', 'en') === 'ar' ? 'قسم الخدمات' : 'Services Section' }}
        </x-admin.nav-item>

        <x-admin.nav-item section="contact" icon="mail">
            {{ session('locale', 'en') === 'ar' ? 'معلومات التواصل' : 'Contact Info' }}
        </x-admin.nav-item>

        <x-admin.nav-item section="messages" icon="chat" :badge="$unreadCount">
            {{ session('locale', 'en') === 'ar' ? 'الرسائل' : 'Messages' }}
        </x-admin.nav-item>

        <x-admin.nav-item section="account" icon="settings">
            {{ session('locale', 'en') === 'ar' ? 'إعدادات الحساب' : 'Account Settings' }}
        </x-admin.nav-item>
    </nav>

    {{-- Language Switcher --}}
    <div class="px-4 py-4 border-t border-gray-200" x-data="{ locale: '{{ session('locale', 'en') }}' }">
        <label class="block text-xs font-semibold text-gray-500 uppercase mb-2">
            {{ session('locale', 'en') === 'ar' ? 'اللغة' : 'Language' }}
        </label>
        <div class="flex items-center space-x-2 bg-gray-100 rounded-full p-1">
            <button @click="window.location.href = '{{ route('locale.change', 'en') }}'"
                :class="locale === 'en' ? 'bg-green-600 text-white' : 'text-gray-600'"
                class="flex-1 px-3 py-2 rounded-full text-sm font-semibold transition">EN</button>
            <button @click="window.location.href = '{{ route('locale.change', 'ar') }}'"
                :class="locale === 'ar' ? 'bg-green-600 text-white' : 'text-gray-600'"
                class="flex-1 px-3 py-2 rounded-full text-sm font-semibold transition">AR</button>
        </div>
    </div>

    {{-- Actions (Preview & Logout) --}}
    <div class="absolute bottom-0 w-64 border-t border-gray-200 bg-white">
        <a href="{{ url('/') }}" target="_blank"
            class="flex items-center space-x-3 px-6 py-4 text-gray-700 hover:bg-gray-50">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
            </svg>
            <span class="text-sm font-medium">
                {{ session('locale', 'en') === 'ar' ? 'معاينة الموقع' : 'Preview Site' }}
            </span>
        </a>
        <form method="POST" action="{{ route('logout') }}" class="border-t border-gray-200">
            @csrf
            <button type="submit"
                class="flex items-center space-x-3 px-6 py-4 text-green-700 hover:bg-green-50 w-full">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                    </path>
                </svg>
                <span class="text-sm font-medium">
                    {{ session('locale', 'en') === 'ar' ? 'تسجيل الخروج' : 'Logout' }}
                </span>
            </button>
        </form>
    </div>
</div>

{{-- Mobile Overlay --}}
<div x-show="mobileSidebarOpen" @click="mobileSidebarOpen = false" class="sidebar-overlay md:hidden" x-cloak></div>
