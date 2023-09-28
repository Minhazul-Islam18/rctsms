<?php

namespace App\Livewire\Frontend;

use App\Models\MeritoriousStudent;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

class MeritoriousStudentPageComponent extends Component
{
    use WithPagination;
    public $count = 1;
    #[Layout('livewire.frontend.layouts.common')]
    public function render()
    {
        $mStudents = MeritoriousStudent::orderBy('position', 'ASC')->paginate(8);
        return view('livewire.frontend.meritorious-student-page-component', ['mStudents' => $mStudents]);
    }
}
