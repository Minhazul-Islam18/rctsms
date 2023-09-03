<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\ImportantIndividual;

class PersonpageComponent extends Component
{
    #[Layout('livewire.frontend.layouts.common')]
    public $person;
    function mount($id)
    {
        $this->person =  ImportantIndividual::find($id);
    }
    public function render()
    {
        return view('livewire.frontend.personpage-component');
    }
}
