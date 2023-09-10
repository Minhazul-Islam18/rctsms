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
        $filePath = storage_path('app/public/' . $filename);
        if (file_exists($filePath)) {
            $fileContents = Storage::disk('public')->get($filename);

            return Response::stream(
                function () use ($fileContents) {
                    echo $fileContents;
                },
                200,
                [
                    'Content-Type' => 'application/octet-stream',
                    'Content-Disposition' => 'attachment; filename="' . basename($filePath) . '"',
                ]
            );
        } else {
            abort(404);
        }
    }
    public function render()
    {
        $syllabuses = ClassSyllabus::paginate(8);
        return view('livewire.frontend.syllabus-page-component', ['syllabuses' => $syllabuses]);
    }
}
