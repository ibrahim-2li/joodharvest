<?php

namespace App\Http\Controllers;

use App\Models\LandingContent;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Display the landing page.
     */
    public function index()
    {
        $content = LandingContent::all()->groupBy('section');
        
        return view('welcome', compact('content'));
    }
}
