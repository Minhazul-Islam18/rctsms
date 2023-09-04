<?php

namespace App\Livewire\Frontend;

use App\Models\ClassList;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

class AcademicClassesPageComponent extends Component
{
    use WithPagination;
    #[Layout('livewire.frontend.layouts.common')]
    public function render()
    {
        $classes = ClassList::paginate(8);
        return view('livewire.frontend.academic-classes-page-component', ['classes' => $classes]);
    }
}
