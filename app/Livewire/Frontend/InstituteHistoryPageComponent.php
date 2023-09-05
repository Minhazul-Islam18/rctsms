<?php

namespace App\Livewire\Frontend;

use App\Models\HomepageSlider;
use Livewire\Component;
use Livewire\Attributes\Layout;

class InstituteHistoryPageComponent extends Component
{
    #[Layout('livewire.frontend.layouts.common')]
    public function render()
    {
        $home_slider = HomepageSlider::all();
        return view('livewire.frontend.institute-history-page-component', ['home_slider' => $home_slider]);
    }
}
