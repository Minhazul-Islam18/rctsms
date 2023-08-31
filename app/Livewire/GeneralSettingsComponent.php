<?php

namespace App\Livewire;

use Livewire\Component;

class GeneralSettingsComponent extends Component
{
    public $site_title;
    public $site_logo;
    public $meta_title;
    public $meta_description;
    public $favicon;
    public $iteration;
    function SaveGeneralSettings()
    {
        dd('ok');
    }
    public function render()
    {
        return view('livewire.general-settings-component');
    }
}
