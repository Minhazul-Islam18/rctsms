<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\SiteNotice;
use App\Models\PhotoGallery;
use App\Models\FooterWidget1;
use App\Models\FooterWidget2;
use App\Models\ImportantLink;
use App\Models\EdditionalLink;
use App\Models\HomepageSlider;
use Livewire\Attributes\Layout;
use App\Models\AboutSchoolWidget;
use App\Models\BlogPost;
use App\Models\ImportantIndividual;
use App\Models\VideoGallery;

class HomepageComponent extends Component
{
    #[Layout('livewire.frontend.layouts.common')]
    public $videoLinks = [];
    public $count = 1;

    public function mount()
    {
        // Fetch video links from your database and set them to $videoLinks
        $this->videoLinks = VideoGallery::pluck('link')->toArray();
    }
    public function render()
    {
        $home_slider = HomepageSlider::orderBy('position')->get();
        $individual = ImportantIndividual::orderBy('position')->get();
        $additionalLinks = ImportantLink::orderBy('position')->get();
        $notices = SiteNotice::orderBy('position')->limit(5)->get();
        $news = BlogPost::orderBy('position')->limit(1)->get();
        $schoolWidgets = AboutSchoolWidget::orderBy('position')->get();
        $galleryImages = PhotoGallery::orderBy('position')->limit(5)->get();
        return view('livewire.frontend.index', [
            'news' => $news,
            'home_slider' => $home_slider,
            'individual' => $individual,
            'additionalLinks' => $additionalLinks,
            'notices' => $notices,
            'schoolWidgets' => $schoolWidgets,
            'galleryImages' => $galleryImages,
        ]);
    }
}
