@props(['locale' => session('locale', 'en'), 'content' => collect()])

@php
    $contactData = $content['contact'] ?? collect();
    $phone = $contactData->firstWhere('key', 'phone')->value_en ?? '+966 XX XXX XXXX';
    $email = $contactData->firstWhere('key', 'email')->value_en ?? 'info@joodharvest.com';
    $locationItem = $contactData->firstWhere('key', 'location');
    $location =
        $locale === 'ar'
            ? $locationItem->value_ar ?? ($locationItem->value_en ?? 'Our Location')
            : $locationItem->value_en ?? 'Our Location';
@endphp


<!-- Contact Section -->
<section id="contact" class="py-10 md:py-20 bg-white" dir="{{ $locale === 'ar' ? 'rtl' : 'ltr' }}">
    <div class="max-w-6xl mx-auto px-4 md:px-8">

        <div class="relative flex flex-col md:block">
            <!-- Form Container -->
            <div class="bg-[#d4e4bc] rounded-3xl p-8 md:py-12 {{ $locale === 'ar' ? 'md:pr-12 md:pl-80 lg:pl-96' : 'md:pl-12 md:pr-80 lg:pr-96' }}"
                data-aos="fade-up">

                @if (session('success'))
                    <div class="bg-green-100 border border-green-600 text-green-800 px-6 py-4 rounded-lg mb-6">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.store') }}">
                    @csrf

                    <div class="grid md:grid-cols-2 gap-4 mb-4">
                        <div class="{{ $locale === 'ar' ? 'md:order-2' : 'md:order-1' }}">
                            <label class="block text-sm font-bold text-jood-green-dark mb-2">
                                {{ $locale === 'ar' ? 'الأسم' : 'Name' }}
                            </label>
                            <input type="text" name="name" required
                                placeholder="{{ $locale === 'ar' ? 'الأسم' : 'Your Name' }}"
                                class="w-full px-4 py-3 bg-white border-none rounded-lg focus:ring-2 focus:ring-jood-green outline-none placeholder-gray-400">
                        </div>

                        <div class="{{ $locale === 'ar' ? 'md:order-1' : 'md:order-2' }}">
                            <label class="block text-sm font-bold text-jood-green-dark mb-2">
                                {{ $locale === 'ar' ? 'البريد الإلكتروني' : 'Email' }}
                            </label>
                            <input type="email" name="email" required
                                placeholder="{{ $locale === 'ar' ? 'البريد الإلكتروني' : 'Your Email' }}"
                                class="w-full px-4 py-3 bg-white border-none rounded-lg focus:ring-2 focus:ring-jood-green outline-none placeholder-gray-400">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-bold text-jood-green-dark mb-2">
                            {{ $locale === 'ar' ? 'رقم الهاتف (اختياري)' : 'Phone (Optional)' }}
                        </label>
                        <input type="tel" name="phone"
                            placeholder="{{ $locale === 'ar' ? 'رقم الهاتف' : 'Your Phone' }}"
                            class="w-full px-4 py-3 bg-white border-none rounded-lg focus:ring-2 focus:ring-jood-green outline-none placeholder-gray-400">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-bold text-jood-green-dark mb-2">
                            {{ $locale === 'ar' ? 'نص الرسالة' : 'Message' }}
                        </label>
                        <textarea name="message" rows="3" required placeholder="{{ $locale === 'ar' ? 'نص الرسالة' : 'Your Message' }}"
                            class="w-full px-4 py-3 bg-white border-none rounded-lg focus:ring-2 focus:ring-jood-green outline-none resize-none placeholder-gray-400"></textarea>
                    </div>

                    <button type="submit"
                        class="w-full bg-jood-green text-white py-3 rounded-lg font-bold text-lg hover:bg-opacity-90 transition shadow-lg">
                        {{ $locale === 'ar' ? 'ارسال' : 'Send' }}
                    </button>
                </form>
            </div>

            <!-- Contact Info Card -->
            <div class="order-first md:order-none mt-0 md:mt-0 md:absolute md:top-1/4 md:-translate-y-1/2 z-10 w-full md:w-72 lg:w-80
                    {{ $locale === 'ar' ? 'md:left-0 lg:left-[-4%]' : 'md:right-4 lg:right-[-10%] md:left-0 lg:left-[74%]' }}"
                data-aos="fade-up" data-aos-delay="100">

                <div class="bg-jood-green text-white rounded-3xl p-8 shadow-2xl">
                    <div class="mb-6 {{ $locale === 'ar' ? 'text-right' : 'text-left' }}">
                        <h4 class="text-xl font-bold mb-2">
                            {{ $locale === 'ar' ? 'معلومات التواصل' : 'Contact Info' }}
                        </h4>
                        <div class="flex gap-1 {{ $locale === 'ar' ? 'justify-start' : 'justify-start' }}">
                            <span class="w-10 h-1 bg-white/50 rounded-full"></span>
                            <span class="w-2 h-1 bg-white/50 rounded-full"></span>
                        </div>
                    </div>

                    <div class="space-y-5">
                        <div class="flex items-center gap-3 {{ $locale === 'ar' ? 'text-right' : 'text-left' }}">
                            <div
                                class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <p class="text-sm text-white/90 {{ $locale === 'ar' ? 'text-right' : 'text-left' }}">
                                {{ $location }}
                            </p>
                        </div>

                        <div class="flex items-center gap-3 {{ $locale === 'ar' ? 'text-right' : 'text-left' }}">
                            <div
                                class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                </svg>
                            </div>
                            <p class="text-sm text-white/90 {{ $locale === 'ar' ? 'text-right' : 'text-left' }}">
                                {{ $email }}</p>
                        </div>

                        <div class="flex items-center gap-3 {{ $locale === 'ar' ? 'text-right' : 'text-left' }}">
                            <div
                                class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                </svg>
                            </div>
                            <p class="text-sm text-white/90" dir="ltr">{{ $phone }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
