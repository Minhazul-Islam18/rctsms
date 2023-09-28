<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\SiteNotice;
use App\Models\SiteNoticeCategory;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Livewire\WithPagination;

class NoticepageComponent extends Component
{
    use WithPagination;
    public $selectedCategory;
    #[Layout('livewire.frontend.layouts.common')]
    public $count = 1;
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
        $this->dispatch('loading');
        $categories = SiteNoticeCategory::orderBy('position')->get();
        $notices = $this->selectedCategory
            ? SiteNoticeCategory::find($this->selectedCategory)->notices
            : SiteNotice::with('category')->orderBy('position', 'ASC')->paginate(8);
        $this->dispatch('loaded');
        return view('livewire.frontend.noticepage-component', ['notices' => $notices, 'categories' => $categories]);
    }
}
