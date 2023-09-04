<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\TeachingPermission;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class TeachingPermissionPageComponent extends Component
{
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
        $permissions = TeachingPermission::all();
        return view('livewire.frontend.teaching-permission-page-component', ['permissions' => $permissions]);
    }
}
