<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Layout;
use App\Models\TeacherAndStaffs;

class TeachersPageComponent extends Component
{
    use WithPagination;
    public $iteration = 1;
    #[Layout('livewire.frontend.layouts.common')]
    public function render()
    {
        // $currentDate = Carbon::now()->format('Y-m-d');
        $teachers = TeacherAndStaffs::where('active', 1)
            ->where('employee_type', 'teacher')
            ->paginate(8);
        return view('livewire.frontend.teachers-page-component', ['teachers' => $teachers]);
    }
}
