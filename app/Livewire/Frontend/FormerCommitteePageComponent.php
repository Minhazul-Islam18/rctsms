<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Layout;
use App\Models\InstitutionCommittee;

class FormerCommitteePageComponent extends Component
{
    use WithPagination;
    public $iteration = 1;
    #[Layout('livewire.frontend.layouts.common')]
    public function render()
    {
        $currentDate = Carbon::now();
        $FormerCommittees = InstitutionCommittee::where('person_post', '=', 'সভাপতি')
            ->where('expired_at', '<', $currentDate)
            ->paginate(8);
        //dd($currentDate);
        return view('livewire.frontend.former-committee-page-component', ['FormerCommittees' => $FormerCommittees]);
    }
}
