<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Layout;
use App\Models\InstitutionCommittee;

class InstitutionalCommitteePageComponent extends Component
{
    use WithPagination;
    public $iteration = 1;
    #[Layout('livewire.frontend.layouts.common')]
    public function render()
    {
        $currentDate = Carbon::now()->format('d-m-Y');;
        $committees = InstitutionCommittee::where('expired_at', '>', $currentDate)->paginate(8);
        // dd($committees);
        return view('livewire.frontend.institutional-committee-page-component', ['committees' => $committees]);
    }
}
