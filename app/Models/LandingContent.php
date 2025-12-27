<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingContent extends Model
{
    protected $fillable = [
        'section',
        'key',
        'value_en',
        'value_ar',
        'type',
    ];

    /**
     * Get the value for the current locale
     */
    public function getValueAttribute()
    {
        $locale = session('locale', 'en');
        return $locale === 'ar' ? $this->value_ar : $this->value_en;
    }
    
    /**
     * Get content by section
     */
    public static function getSection($section)
    {
        return self::where('section', $section)->get()->keyBy('key');
    }
    
    /**
     * Get a specific content value
     */
    public static function getValue($section, $key, $default = '')
    {
        $content = self::where('section', $section)->where('key', $key)->first();
        return $content ? $content->value : $default;
    }
}
