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
use App\Models\ImportantIndividual;

class HomepageComponent extends Component
{
    #[Layout('livewire.frontend.layouts.common')]
    public function render()
    {
        $home_slider = HomepageSlider::all();
        $individual = ImportantIndividual::all();
        $additionalLinks = ImportantLink::all();
        $notices = SiteNotice::all();
        $schoolWidgets = AboutSchoolWidget::all();
        $galleryImages = PhotoGallery::all();
        // $FooterWidget1 = FooterWidget1::first();
        // $FooterWidget2 = FooterWidget2::first();
        return view('livewire.frontend.index', [
            'home_slider' => $home_slider,
            'individual' => $individual,
            'additionalLinks' => $additionalLinks,
            'notices' => $notices,
            'schoolWidgets' => $schoolWidgets,
            'galleryImages' => $galleryImages,
            // 'FooterWidget1' => $FooterWidget1,
            // 'FooterWidget2' => $FooterWidget2,
        ]);
    }
}
