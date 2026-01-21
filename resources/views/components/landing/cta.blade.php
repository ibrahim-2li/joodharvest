@props(['locale' => session('locale', 'en')])

<!-- CTA Section -->
<section class="py-10 md:py-20 bg-white overflow-hidden">
    <div class="max-w-6xl mx-auto px-4 md:px-8">
        <div class="bg-[#a1bd68] rounded-2xl md:rounded-3xl relative p-4 sm:p-6 md:p-12 " data-aos="fade-up">
            <div class="grid md:grid-cols-2 gap-4 md:gap-0 items-center">

                <!-- Content Side -->
                <div
                    class="order-1 p-2 sm:p-4 md:p-12 {{ $locale === 'ar' ? 'md:order-1 text-right' : 'md:order-1 text-left' }}">
                    <h2 class="text-lg sm:text-xl md:text-2xl font-bold text-jood-green-dark leading-tight mb-3 md:mb-4">
                        {{ $locale === 'ar' ? 'جودة تُحفظ بعناية ، طعم طبيعي يدوم وثقة تبدأ من أول تجربة' : 'Quality preserved with care, natural taste that lasts, and trust starting from the first experience' }}
                    </h2>
                    <p class="text-white text-sm sm:text-base md:text-lg mb-4 md:mb-6">
                        {{ $locale === 'ar' ? 'عناية دقيقة في كل خطوة، وجودة تُلاحظ من أول تجربة.' : 'Meticulous care at every step, and quality you notice from the first experience.' }}
                    </p>
                    <a href="#contact"
                        class="inline-block w-full sm:w-auto bg-jood-green text-center text-white px-6 sm:px-8 py-2.5 sm:py-3 rounded-xl font-bold text-base sm:text-lg hover:bg-jood-green-dark transition shadow-lg">
                        {{ $locale === 'ar' ? 'تواصل معنا' : 'Contact Us' }}
                    </a>
                </div>

                <!-- Truck Image Side -->
                <div
                    class="order-2 relative {{ $locale === 'ar' ? 'md:order-2' : 'md:order-2' }} md:p-0 flex justify-center">
                    <img src="{{ asset('images/cta-truck.png') }}" alt="Jood Harvest Truck"
                        class="w-full max-w-[200px] md:max-w-none md:absolute md:top-1/2 md:-translate-y-1/2 {{ $locale === 'ar' ? 'md:left-0 md:-translate-x-1/4 lg:-translate-x-1/3' : 'md:right-0 md:translate-x-1/4 lg:translate-x-1/3' }} object-contain"
                        style="max-height: 280px;">
                </div>

            </div>
        </div>
    </div>
</section>
