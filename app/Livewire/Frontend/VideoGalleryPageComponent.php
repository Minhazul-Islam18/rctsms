<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\VideoGallery;
use Livewire\Attributes\Layout;

class VideoGalleryPageComponent extends Component
{
    #[Layout('livewire.frontend.layouts.common')]
    public function render()
    {
        $videos = VideoGallery::orderBy('position', 'ASC')->pluck('link')->toArray();
        return view('livewire.frontend.video-gallery-page-component', ['videos' => $videos]);
    }
}
