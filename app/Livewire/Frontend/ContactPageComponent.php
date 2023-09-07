<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use Livewire\Attributes\Layout;

class ContactPageComponent extends Component
{
    #[Layout('livewire.frontend.layouts.common')]
    public function render()
    {
        return view('livewire.frontend.contact-page-component');
    }
}
