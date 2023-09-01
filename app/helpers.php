<?php

use App\Models\GeneralSetting;

if (!function_exists('get_settings')) {
    /**
     * Get the application settings.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function get_settings($key = null, $default = null)
    {
        $settings = GeneralSetting::first();

        if ($key === null) {
            return $settings;
        }

        return data_get($settings, $key, $default);
    }
}
