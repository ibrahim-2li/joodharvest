@props(['content' => [], 'locale' => session('locale', 'en')])

<!-- Hero Section -->
<section id="home" class="min-h-screen relative overflow-hidden ">
    <!-- Background with gradient overlay -->
    <div class="absolute inset-0 "></div>

    <!-- Abstract decorative elements -->
    <div class="absolute inset-0 abstract-dots opacity-30"></div>

    <!-- Mobile-only Floating Decorative Orbs -->
    <div class="mobile-hero-orb md:hidden" style="top: 10%; right: -50px;"></div>
    <div class="mobile-hero-orb md:hidden"
        style="bottom: 20%; left: -80px; animation-delay: -3s; width: 150px; height: 150px;"></div>

    <!-- Abstract Side Shape -->
    <svg class="side-abstract {{ $locale === 'ar' ? 'side-abstract-left' : 'side-abstract-right' }}" viewBox="0 0 320 800"
        preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
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
                <div class="order-1 lg:order-1 {{ $locale === 'ar' ? 'text-right' : 'text-left' }} px-2 sm:px-4 lg:px-8"
                    data-aos="fade-up" data-aos-delay="200">
                    <h1
                        class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-jood-green leading-tight mb-4 lg:mb-6">
                        @if ($locale === 'ar')
                            {{ $content['hero']->firstWhere('key', 'title')->value_ar ?? 'منتجات غذائية مبردة ومجمدة بجودة تثق بها' }}
                        @else
                            {{ $content['hero']->firstWhere('key', 'title')->value_en ?? 'Refrigerated and frozen food products with quality you trust' }}
                        @endif
                    </h1>
                    <p
                        class="text-base sm:text-lg md:text-xl text-gray-700 leading-relaxed mb-4 lg:mb-8 max-w-lg {{ $locale === 'ar' ? 'mr-0 ml-auto' : '' }}">
                        @if ($locale === 'ar')
                            {{ $content['hero']->firstWhere('key', 'description')->value_ar ?? 'نختص في استيراد وتخزين وتوزيع المنتجات الغذائية المبردة والمجمدة بجودة عالية والتزام تام بالمعايير العالمية.' }}
                        @else
                            {{ $content['hero']->firstWhere('key', 'description')->value_en ?? 'We specialize in importing, storing, and distributing chilled and frozen food products with high quality and full compliance to international standards.' }}
                        @endif
                    </p>
                    <a href="#contact"
                        class="inline-flex items-center gap-2 px-6 sm:px-8 py-2.5 sm:py-3 border-2 border-jood-green text-jood-green rounded-full font-bold text-base sm:text-lg hover:bg-jood-green hover:text-white transition">
                        {{ $locale === 'ar' ? 'اطلب عرض سعر' : 'Request a Quote' }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
