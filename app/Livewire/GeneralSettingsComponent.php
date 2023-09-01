<?php

namespace App\Livewire;

use App\Models\CookieAlertSettings;
use App\Models\GeneralSetting;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class GeneralSettingsComponent extends Component
{
    use WithFileUploads, LivewireAlert;
    public $prev_logo;
    public $prev_favicon;
    public $iteration;
    public $cookie = [
        'status' => null,
        'text' => null,
    ];
    public $settings = [
        'site_logo' => null,
        'favicon' => null,
        'site_title' => null,
        'site_motto' => null,
        'meta_title' => null,
        'meta_description' => null,
    ];
    function mount()
    {
        $onMount = GeneralSetting::first();
        $this->settings = [
            'site_logo' => $onMount->logo,
            'favicon' => $onMount->favicon,
            'site_title' => $onMount->site_title,
            'site_motto' => $onMount->site_motto,
            'meta_title' => $onMount->meta_title,
            'meta_description' => $onMount->meta_description,
        ];
        $cSt = CookieAlertSettings::first();
        $this->cookie = [
            'status' => $cSt->status,
            'text' => $cSt->alert_text
        ];
    }
    function SaveCookieSettings()
    {
        // dd($this->cookie);
        $if_present = CookieAlertSettings::first();
        if ($if_present) {
            $if_present->update([
                'status' => $this->cookie['status'],
                'alert_text' => $this->cookie['text']
            ]);
        } else {
            $rt = CookieAlertSettings::create([
                'status' => $this->cookie['status'],
                'alert_text' => $this->cookie['text']
            ]);
        }
        $this->cookie = [
            'status' => null,
            'text' => null,
        ];
        $this->alert('success', 'Settings Saved Successfully!');
    }
    function SaveGeneralSettings()
    {
        if ($this->settings['site_logo'] != null) {
            $imag = $this->settings['site_logo'];
            $newImageName = time() . '_' . $imag->getClientOriginalName();

            $this->prev_logo = $imag->storeAs('frontend/images/settings', $newImageName, 'public');
        }
        if ($this->settings['favicon'] != null) {
            $fav = $this->settings['favicon'];
            $ifav = time() . '_' . $fav->getClientOriginalName();
            // dd($ifav);
            $this->prev_favicon = $fav->storeAs('frontend/images/settings', $ifav, 'public');
        }

        $if_present = GeneralSetting::first();
        if ($if_present) {
            $if_present->update([
                'logo' => $this->prev_logo,
                'favicon' => $this->prev_favicon,
                'site_title' => $this->settings['site_title'],
                'site_motto' => $this->settings['site_motto'],
                'meta_title' => $this->settings['meta_title'],
                'meta_description' => $this->settings['meta_description'],
            ]);
        } else {
            $rt = GeneralSetting::create([
                'logo' => $this->settings['prev_logo'],
                'favicon' => $this->settings['prev_favicon'],
                'site_title' => $this->settings['site_title'],
                'site_motto' => $this->settings['site_motto'],
                'meta_title' => $this->settings['meta_title'],
                'meta_description' => $this->settings['meta_description'],
            ]);
        }

        $this->resetAll();
        $this->iteration++;
        $this->alert('success', 'Settings Saved Successfully!');
    }
    function resetAll()
    {
        $this->settings = [
            'site_logo' => null,
            'prev_logo' => null,
            'prev_favicon' => null,
            'favicon' => null,
            'site_title' => null,
            'site_motto' => null,
            'meta_title' => null,
            'meta_description' => null,
        ];
    }
    public function render()
    {
        return view('livewire.general-settings-component');
    }
}
