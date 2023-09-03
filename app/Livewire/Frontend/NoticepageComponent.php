<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\SiteNotice;
use Livewire\Attributes\Layout;

class NoticepageComponent extends Component
{
    #[Layout('livewire.frontend.layouts.common')]
    public $notice;
    function mount($title)
    {
        $this->notice = SiteNotice::where('title', '=', $title)->first();
    }
    public function render()
    {
        return view('livewire.frontend.noticepage-component');
    }
}
