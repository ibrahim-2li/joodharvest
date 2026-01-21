@props(['sections'])

{{-- Contact Section Form --}}
<div x-show="activeSection === 'contact'" class="max-w-5xl">
    <form method="POST" action="{{ route('admin.update') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="active_section" value="contact">
        <div class="bg-white rounded-xl shadow-sm p-8">
            {{-- Section Header --}}
            <div class="flex items-center space-x-3 mb-6">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-gray-800">Contact Information</h2>
                    <p class="text-sm text-gray-500">Manage contact details displayed on the website</p>
                </div>
            </div>

            <div class="space-y-6">
                {{-- Phone --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                            </path>
                        </svg>
                        Phone Number
                    </label>
                    <input type="text" name="contents[6][value_en]"
                        value="{{ $sections['contact']['phone']->value_en ?? '' }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent"
                        placeholder="+966 XX XXX XXXX">
                    <input type="hidden" name="contents[6][section]" value="contact">
                    <input type="hidden" name="contents[6][key]" value="phone">
                    <input type="hidden" name="contents[6][type]" value="phone">
                    <input type="hidden" name="contents[6][value_ar]" value="">
                </div>

                {{-- Email --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        Email Address
                    </label>
                    <input type="email" name="contents[7][value_en]"
                        value="{{ $sections['contact']['email']->value_en ?? '' }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent"
                        placeholder="info@joodharvest.com">
                    <input type="hidden" name="contents[7][section]" value="contact">
                    <input type="hidden" name="contents[7][key]" value="email">
                    <input type="hidden" name="contents[7][type]" value="email">
                    <input type="hidden" name="contents[7][value_ar]" value="">
                </div>

                {{-- Location --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Location / Google Maps Embed
                    </label>
                    <textarea name="contents[8][value_en]" rows="3"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent font-mono text-sm"
                        placeholder="Paste Google Maps embed code or enter address">{{ $sections['contact']['location']->value_en ?? '' }}</textarea>
                    <p class="text-xs text-gray-500 mt-1">Enter address or paste Google Maps iframe embed code</p>
                    <input type="hidden" name="contents[8][section]" value="contact">
                    <input type="hidden" name="contents[8][key]" value="location">
                    <input type="hidden" name="contents[8][type]" value="textarea">
                    <input type="hidden" name="contents[8][value_ar]"
                        value="{{ $sections['contact']['location']->value_ar ?? '' }}">
                </div>
            </div>

            {{-- Submit Button --}}
            <div class="flex items-center justify-end pt-6 border-t border-gray-200 mt-8">
                <button type="submit"
                    class="bg-green-700 hover:bg-green-800 text-white px-8 py-3 rounded-lg font-bold shadow-lg flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                        </path>
                    </svg>
                    <span>{{ session('locale', 'en') === 'ar' ? 'حفظ معلومات التواصل' : 'Save Contact Info' }}</span>
                </button>
            </div>
        </div>
    </form>
</div>
