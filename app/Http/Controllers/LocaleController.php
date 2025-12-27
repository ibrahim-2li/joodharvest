<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    /**
     * Change the application locale
     *
     * @param string $locale
     * @return \Illuminate\Http\RedirectResponse
     */
    public function change($locale)
    {
        // List of supported locales
        $supportedLocales = ['en', 'ar'];
        
        // Check if the locale is supported
        if (!in_array($locale, $supportedLocales)) {
            abort(404);
        }
        
        // Store the locale in the session
        Session::put('locale', $locale);
        
        // Set the application locale
        app()->setLocale($locale);
        
        // Redirect back
        return redirect()->back();
    }
}
