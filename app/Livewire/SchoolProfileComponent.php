<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use App\Models\ImportantIndividual;
use App\Models\SchoolProfile;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class SchoolProfileComponent extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    public $editing = false;
    public $editableId;
    public $settings =
    [
        'location' => null,
        'history' => null,
        'school_name' => null,
        'established_at' => null,
        'eiin' => null,
        'domain' => null,
        'contact_number' => null,
        'contact_mail' => null,
        'address' => null,
    ];
    public $iteration;
    function mount()
    {
        $if_present = SchoolProfile::first();
        $this->settings = [
            'location' => $if_present->location,
            'history' => $if_present->history,
            'school_name' => $if_present->school_name,
            'established_at' => $if_present->established_at,
            'eiin' => $if_present->eiin,
            'domain' => $if_present->domain,
            'contact_number' => $if_present->contact_number,
            'contact_mail' => $if_present->contact_mail,
            'address' => $if_present->address,
        ];
    }
    function SaveGeneralSettings()
    {
        $if_present = SchoolProfile::first();
        if ($if_present) {
            $if_present->update([
                'location' => $this->settings['location'],
                'history' => $this->settings['history'],
                'school_name' => $this->settings['school_name'],
                'established_at' => $this->settings['established_at'],
                'eiin' => $this->settings['eiin'],
                'domain' => $this->settings['domain'],
                'contact_number' => $this->settings['contact_number'],
                'contact_mail' => $this->settings['contact_mail'],
                'address' => $this->settings['address'],
            ]);
        } else {
            $rt = SchoolProfile::create([
                'location' => $this->settings['location'],
                'history' => $this->settings['history'],
                'school_name' => $this->settings['school_name'],
                'established_at' => $this->settings['established_at'],
                'eiin' => $this->settings['eiin'],
                'domain' => $this->settings['domain'],
                'contact_number' => $this->settings['contact_number'],
                'contact_mail' => $this->settings['contact_mail'],
                'address' => $this->settings['address'],
            ]);
        }

        $this->resetAll();
        $this->mount();
        $this->alert('success', 'Information Saved Successfully!');
    }
    function resetAll()
    {
        $this->settings = [
            'location' => null,
            'history' => null,
            'school_name' => null,
            'established_at' => null,
            'eiin' => null,
            'domain' => null,
            'contact_number' => null,
            'contact_mail' => null,
            'address' => null,
        ];
    }

    public function render()
    {

        return view('livewire.school-profile-component');
    }
}
