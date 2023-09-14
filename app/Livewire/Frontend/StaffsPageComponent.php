<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use App\Models\TeacherAndStaffs;

class StaffsPageComponent extends Component
{
    use WithPagination;
    public $iteration = 1;
    #[Layout('livewire.frontend.layouts.common')]
    public function render()
    {
        $staffs = TeacherAndStaffs::where('active', 1)
            ->where('employee_type', 'staff')
            ->paginate(8);
        return view('livewire.frontend.staffs-page-component', ['staffs' => $staffs]);
    }
}
