<?php

if (!function_exists('uuidv4')) {
    function uuidv4()
    {
        return Uuid::generate(4)->string;
    }
}

if (!function_exists('newssetting')) {
    function newssetting($setting = null, $default_value = null)
    {
        if (empty($setting)) {
            return \Packages\News\Models\NewSetting::pluck('value', 'slug')->toArray();
        }
        if (is_array($setting)) {
            foreach ($setting as $slug => $value) {
                \Packages\News\Models\NewSetting::updateOrCreate(compact('slug'), compact('value'));
            }
            return true;
        }
        return \Packages\News\Models\NewSetting::where('slug', $setting)->first()->value ?? $default_value;
    }
}
