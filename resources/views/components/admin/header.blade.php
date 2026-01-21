{{-- Top Header Bar --}}
<header class="bg-white shadow-sm z-10">
    <div class="flex items-center justify-between px-6 py-4">
        <div class="flex items-center space-x-4">
            {{-- Sidebar Toggle Button --}}
            <button @click="sidebarCollapsed = !sidebarCollapsed"
                class="text-gray-600 hover:text-gray-800 focus:outline-none"
                :title="sidebarCollapsed ?
                    '{{ session('locale', 'en') === 'ar' ? 'إظهار القائمة الجانبية' : 'Show Sidebar' }}' :
                    '{{ session('locale', 'en') === 'ar' ? 'إخفاء القائمة الجانبية' : 'Hide Sidebar' }}'">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path x-show="!sidebarCollapsed" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 19l-7-7 7-7m8 14l-7-7 7-7"></path>
                    <path x-show="sidebarCollapsed" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
                </svg>
            </button>

            <div>
                <h1 class="text-2xl font-bold text-gray-800">
                    <span x-show="activeSection === 'hero'">
                        {{ session('locale', 'en') === 'ar' ? 'قسم الHero ' : 'Hero Section' }}
                    </span>
                    <span x-show="activeSection === 'about'">
                        {{ session('locale', 'en') === 'ar' ? 'قسم من نحن' : 'About Section' }}
                    </span>
                    <span x-show="activeSection === 'services'">
                        {{ session('locale', 'en') === 'ar' ? 'قسم الخدمات' : 'Services Section' }}
                    </span>
                    <span x-show="activeSection === 'contact'">
                        {{ session('locale', 'en') === 'ar' ? 'معلومات التواصل' : 'Contact Information' }}
                    </span>
                    <span x-show="activeSection === 'messages'">
                        {{ session('locale', 'en') === 'ar' ? 'رسائل التواصل' : 'Contact Messages' }}
                    </span>
                </h1>
                <p class="text-sm text-gray-500">
                    <span x-show="activeSection !== 'messages'">
                        {{ session('locale', 'en') === 'ar' ? 'إدارة محتوى الصفحة الرئيسية' : 'Manage landing page content' }}
                    </span>
                    <span x-show="activeSection === 'messages'">
                        {{ session('locale', 'en') === 'ar' ? 'عرض وإدارة رسائل نموذج الاتصال' : 'View and manage contact form submissions' }}
                    </span>
                </p>
            </div>
        </div>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded-lg text-sm">
                {{ session('success') }}
            </div>
        @endif
    </div>
</header>
