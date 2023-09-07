<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SiteNotice;
use App\Models\AboutSchoolWidget;

class DashboardComponent extends Component
{
    public function render()
    {
        $notices = SiteNotice::take(5)->latest()->get();
        $schoolWidgets = AboutSchoolWidget::all();
        return view('backend.admin.index', ['notices' => $notices, 'schoolWidgets' => $schoolWidgets]);
    }
}
