<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class DeleteStorageFolder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-storage-folder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete the "storage" folder in the "public" directory';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $publicPath = public_path('storage');

        if (File::isDirectory($publicPath)) {
            File::deleteDirectory($publicPath);
            $this->info('The "storage" folder in the "public" directory has been deleted.');
        } else {
            $this->error('The "storage" folder in the "public" directory does not exist.');
        }
    }
}
