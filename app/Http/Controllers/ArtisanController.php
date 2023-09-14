<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ArtisanController extends Controller
{
    public function runCommand(Request $request)
    {
        // Check if the request is authorized (e.g., based on a token or user role).
        // Implement proper authorization logic here.

        if (!auth()->check()) {
            abort(403, 'Unauthorized'); // Example unauthorized response.
        }

        // Run the Artisan command.

        Artisan::call('app:delete-storage-folder');
        Artisan::call('storage:link');

        // You can return a response or redirect to a specific page.
        return 'Artisan command executed successfully.';
    }
}
