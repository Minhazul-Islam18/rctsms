<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\SiteNotice;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class SingleNoticePageComponent extends Component
{
    #[Layout('livewire.frontend.layouts.common')]
    public $notice;
    function mount($title)
    {
        $this->notice = SiteNotice::where('title', '=', $title)->first();
    }
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
        return view('livewire.frontend.single-notice-page-component');
    }
}
