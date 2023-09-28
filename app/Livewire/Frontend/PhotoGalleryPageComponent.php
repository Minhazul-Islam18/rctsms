<?php

namespace App\Livewire\Frontend;

use App\Models\PhotoGallery;
use Livewire\Component;
use Livewire\Attributes\Layout;

class PhotoGalleryPageComponent extends Component
{
    #[Layout('livewire.frontend.layouts.common')]
    public function render()
    {
        $gallery = PhotoGallery::orderBy('position', 'ASC')->get();
        return view('livewire.frontend.photo-gallery-page-component', ['gallery' => $gallery]);
    }
}
