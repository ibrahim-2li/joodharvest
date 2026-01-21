@props(['user' => auth()->user()])

{{-- Account Settings Section --}}
<div x-show="activeSection === 'account'" class="max-w-4xl">
    <form method="POST" action="{{ route('admin.account.update') }}" class="space-y-6">
        @csrf

        <div class="bg-white rounded-xl shadow-sm p-8">
            {{-- Section Header --}}
            <div class="flex items-center space-x-3 mb-8">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-gray-800">
                        {{ session('locale', 'en') === 'ar' ? 'إعدادات الحساب' : 'Account Settings' }}
                    </h2>
                    <p class="text-sm text-gray-500">
                        {{ session('locale', 'en') === 'ar' ? 'تحديث البريد الإلكتروني وكلمة المرور' : 'Update your email and password' }}
                    </p>
                </div>
            </div>

            <div class="space-y-6">
                {{-- Email Address --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        {{ session('locale', 'en') === 'ar' ? 'البريد الإلكتروني' : 'Email Address' }}
                    </label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        dir="ltr">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="border-t border-gray-100 my-6 pt-6">
                    <h3 class="text-lg font-medium text-gray-800 mb-4">
                        {{ session('locale', 'en') === 'ar' ? 'تغيير كلمة المرور' : 'Change Password' }}
                    </h3>
                    <p class="text-sm text-gray-500 mb-6">
                        {{ session('locale', 'en') === 'ar'
                            ? 'اتركه فارغاً إذا كنت لا تريد تغيير كلمة المرور'
                            : 'Leave blank if you don\'t want to change the password' }}
                    </p>

                    <div class="space-y-4">
                        {{-- Current Password --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                {{ session('locale', 'en') === 'ar' ? 'كلمة المرور الحالية' : 'Current Password' }}
                            </label>
                            <input type="password" name="current_password"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('current_password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- New Password --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                {{ session('locale', 'en') === 'ar' ? 'كلمة المرور الجديدة' : 'New Password' }}
                            </label>
                            <input type="password" name="password"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Confirm Password --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                {{ session('locale', 'en') === 'ar' ? 'تأكيد كلمة المرور الجديدة' : 'Confirm New Password' }}
                            </label>
                            <input type="password" name="password_confirmation"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Submit Button --}}
            <div class="flex items-center justify-end pt-6 border-t border-gray-200 mt-8">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-bold shadow-lg flex items-center space-x-2 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>{{ session('locale', 'en') === 'ar' ? 'حفظ التغييرات' : 'Save Changes' }}</span>
                </button>
            </div>
        </div>
    </form>
</div>
