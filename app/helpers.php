<?php

use App\Models\SiteMenu;
use App\Models\GeneralSetting;
use App\Models\HeaderSetting;
use App\Models\SchoolProfile;

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
        $headerLogo = HeaderSetting::pluck('header_image')->first();
        $settings['header_logo'] = $headerLogo;
        $gs = SchoolProfile::first();
        $school = [
            'school_name' => $gs->school_name,
            'history' => $gs->history,
            'established_at' => $gs->established_at,
            'eiin' => $gs->eiin,
            'domain' => $gs->domain,
            'contact_number' => $gs->contact_number,
            'contact_mail' => $gs->contact_mail,
            'address' => $gs->address,
        ];
        $settings = array_merge($settings->toArray(), $school);

        if ($key === null) {
            return $settings;
        }

        return data_get($settings, $key, $default);
    }
}

if (!function_exists('sitemenu')) {
    /**
     * Get the site menus from the database or retrieve a specific key.
     *
     * @param string|null $key
     * @param mixed $default
     * @return mixed
     */
    function sitemenu($key = null, $default = null)
    {
        $sitemenus = SiteMenu::whereNull('parent_id')->with('submenus')->get();

        if ($key === null) {
            return $sitemenus;
        }

        return data_get($sitemenus, $key, $default);
    }
}
