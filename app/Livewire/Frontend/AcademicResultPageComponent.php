<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\AcademicResult;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class AcademicResultPageComponent extends Component
{
    use WithPagination;
    public $count = 1;
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
        $results = AcademicResult::with('class')->orderBy('position', 'ASC')->paginate(8);
        return view('livewire.frontend.academic-result-page-component', ['results' => $results]);
    }
}
