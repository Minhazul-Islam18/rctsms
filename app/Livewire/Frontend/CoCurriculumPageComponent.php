<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\CoCurriculum;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class CoCurriculumPageComponent extends Component
{
    use WithPagination;
    public $iteration = 1;
    #[Layout('livewire.frontend.layouts.common')]
    public function downloadFile($filename)
    {
        if (Storage::disk('public')->exists($filename)) {
            $thisFile = Storage::disk('public')->path($filename);
            return response()->download($thisFile);
        }
        return abort(404);
    }
    public function render()
    {
        $co_curriculums = CoCurriculum::paginate(8);
        return view('livewire.frontend.co-curriculum-page-component', ['co_curriculums' => $co_curriculums]);
    }
}
