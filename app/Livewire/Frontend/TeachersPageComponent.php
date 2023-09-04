<?php

namespace App\Livewire\Frontend;

use App\Models\TeacherAndStaffs;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

class TeachersPageComponent extends Component
{
    use WithPagination;
    public $iteration = 1;
    #[Layout('livewire.frontend.layouts.common')]
    public function render()
    {
        $teachers = TeacherAndStaffs::paginate(8);
        return view('livewire.frontend.teachers-page-component', ['teachers' => $teachers]);
    }
}
