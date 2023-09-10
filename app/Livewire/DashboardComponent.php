<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SiteNotice;
use App\Models\HomepageSlider;
use App\Models\AboutSchoolWidget;

class DashboardComponent extends Component
{
    public function render()
    {
        $home_slider = HomepageSlider::all();
        $notices = SiteNotice::take(5)->latest()->get();
        $schoolWidgets = AboutSchoolWidget::all();
        return view('backend.admin.index', ['home_slider' => $home_slider, 'notices' => $notices, 'schoolWidgets' => $schoolWidgets]);
    }
}
