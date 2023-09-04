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
        $currentDate = Carbon::now()->format('d-m-Y');;
        $FormerCommittees = InstitutionCommittee::where('expired_at', '<', $currentDate)
            ->where('person_post', '=', 'সভাপতি')
            ->paginate(8);
        return view('livewire.frontend.former-committee-page-component', ['FormerCommittees' => $FormerCommittees]);
    }
}
