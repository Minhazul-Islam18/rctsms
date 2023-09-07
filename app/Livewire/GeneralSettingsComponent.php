<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\GeneralSetting;
use App\Models\CookieAlertSettings;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;

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
        'body_background_image' => null,
        'prev_body_background_image' => null,
        'prev_favicon' => null,
        'primary_color' => null,
        'secondary_color' => null,
        'text_color' => null,
        'site_title' => null,
        'site_motto' => null,
        'meta_title' => null,
        'meta_description' => null,
    ];
    function mount()
    {
        $onMount = GeneralSetting::first();
        $this->settings = [
            'site_logo' => null,
            'favicon' => null,
            'body_background_image' => null,
            'prev_logo' => $onMount->logo,
            'prev_favicon' => $onMount->favicon,
            'prev_body_background_image' => $onMount->body_background_image,
            'site_title' => $onMount->site_title,
            'primary_color' => $onMount->primary_color,
            'secondary_color' => $onMount->secondary_color,
            'text_color' => $onMount->text_color,
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
            Storage::disk('public')->delete($this->settings['prev_logo']);
            $this->settings['prev_logo'] = $imag->storeAs('frontend/images/settings', $newImageName, 'public');
        }
        if ($this->settings['body_background_image'] != null) {
            $imag = $this->settings['body_background_image'];
            $newImageName = time() . '_' . $imag->getClientOriginalName();
            Storage::disk('public')->delete($this->settings['prev_body_background_image']);
            $this->settings['prev_body_background_image'] = $imag->storeAs('frontend/images/settings', $newImageName, 'public');
        }
        if ($this->settings['favicon'] != null) {
            $fav = $this->settings['favicon'];
            $ifav = time() . '_' . $fav->getClientOriginalName();
            Storage::disk('public')->delete($this->settings['prev_favicon']);
            $this->settings['prev_favicon'] = $fav->storeAs('frontend/images/settings', $ifav, 'public');
        }
        // dd($this->settings['prev_logo']);

        $if_present = GeneralSetting::first();
        if ($if_present) {
            $if_present->update([
                'logo' => $this->settings['prev_logo'],
                'favicon' => $this->settings['prev_favicon'],
                'body_background_image' => $this->settings['prev_body_background_image'],
                'site_title' => $this->settings['site_title'],
                'primary_color' => $this->settings['primary_color'],
                'secondary_color' => $this->settings['secondary_color'],
                'text_color' => $this->settings['text_color'],
                'site_motto' => $this->settings['site_motto'],
                'meta_title' => $this->settings['meta_title'],
                'meta_description' => $this->settings['meta_description'],
            ]);
        } else {
            $rt = GeneralSetting::create([
                'logo' => $this->settings['prev_logo'],
                'favicon' => $this->settings['prev_favicon'],
                'body_background_image' => $this->settings['body_background_image'],
                'primary_color' => $this->settings['primary_color'],
                'secondary_color' => $this->settings['secondary_color'],
                'text_color' => $this->settings['text_color'],
                'site_title' => $this->settings['site_title'],
                'site_motto' => $this->settings['site_motto'],
                'meta_title' => $this->settings['meta_title'],
                'meta_description' => $this->settings['meta_description'],
            ]);
        }

        // $this->resetAll();
        $this->iteration++;
        $this->alert('success', 'Settings Saved Successfully!');
    }
    function resetAll()
    {
        $this->settings = [
            'site_logo' => null,
            'body_background_image' => null,
            'prev_body_background_image' => null,
            'primary_color' => null,
            'secondary_color' => null,
            'text_color' => null,
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
