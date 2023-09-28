<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ClassSyllabus;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class SyllabusPageComponent extends Component
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
        $syllabuses = ClassSyllabus::paginate(8);
        return view('livewire.frontend.syllabus-page-component', ['syllabuses' => $syllabuses]);
    }
}
