<x-guest-layout>
    <!-- Title -->
    <div class="text-center mb-8">
        <h2 class="text-3xl font-black text-gray-900 mb-2">
            {{ session('locale', 'en') === 'ar' ? 'مرحباً بعودتك' : 'Welcome Back' }}
        </h2>
        <p class="text-gray-600">
            {{ session('locale', 'en') === 'ar' ? 'قم بتسجيل الدخول إلى حسابك' : 'Sign in to your account' }}
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-bold text-gray-700 mb-2">
                {{ session('locale', 'en') === 'ar' ? 'البريد الإلكتروني' : 'Email Address' }}
            </label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                autocomplete="username"
                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-green-600 focus:border-green-600 transition duration-200 text-gray-900 placeholder-gray-400"
                placeholder="{{ session('locale', 'en') === 'ar' ? 'أدخل بريدك الإلكتروني' : 'Enter your email' }}">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-bold text-gray-700 mb-2">
                {{ session('locale', 'en') === 'ar' ? 'كلمة المرور' : 'Password' }}
            </label>
            <input id="password" type="password" name="password" required autocomplete="current-password"
                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-green-600 focus:border-green-600 transition duration-200 text-gray-900 placeholder-gray-400"
                placeholder="{{ session('locale', 'en') === 'ar' ? 'أدخل كلمة المرور' : 'Enter your password' }}">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox" name="remember"
                    class="rounded border-gray-300 text-green-700 shadow-sm focus:ring-green-600 focus:border-green-600 cursor-pointer">
                <span class="ms-2 text-sm font-medium text-gray-700">
                    {{ session('locale', 'en') === 'ar' ? 'تذكرني' : 'Remember me' }}
                </span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm font-semibold text-green-700 hover:text-green-800 transition"
                    href="{{ route('password.request') }}">
                    {{ session('locale', 'en') === 'ar' ? 'نسيت كلمة المرور؟' : 'Forgot password?' }}
                </a>
            @endif
        </div>

        <!-- Submit Button -->
        <div class="pt-2">
            <button type="submit"
                class="w-full bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-bold py-3.5 px-6 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition duration-200 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2">
                {{ session('locale', 'en') === 'ar' ? 'تسجيل الدخول' : 'Sign In' }}
            </button>
        </div>
    </form>
</x-guest-layout>
