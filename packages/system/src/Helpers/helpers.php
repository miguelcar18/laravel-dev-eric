<?php

if (!function_exists('uuidv4')) {
    function uuidv4()
    {
        return Uuid::generate(4)->string;
    }
}

if (!function_exists('systemsetting')) {
    function systemsetting($setting = null, $default_value = null)
    {
        if (empty($setting)) {
            return \Packages\System\Models\SystemSetting::pluck('value', 'slug')->toArray();
        }
        if (is_array($setting)) {
            foreach ($setting as $slug => $value) {
                \Packages\System\Models\SystemSetting::updateOrCreate(compact('slug'), compact('value'));
            }
            return true;
        }
        return \Packages\System\Models\SystemSetting::where('slug', $setting)->first()->value ?? $default_value;
    }
}
