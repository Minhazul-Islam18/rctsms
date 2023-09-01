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
    // #[Rule('mimes:png,jpg,jpeg,webp,gif')]
    public $editing = false;
    public $editableId;
    public $person_image;
    // #[Rule('required|unique:important_persons, person_name|min:5')]
    public $person_name;
    // #[Rule('mimes:png,jpg,jpeg,webp,gif')]
    public $person_signiture;
    // #[Rule('required|min:5')]
    public $person_words;
    public $PersonimageName;
    public $PersonSignitureimage;
    public $person =
    [
        'image' => null,
        'signiture' => null,
        'name' => null,
        'words' => null,
    ];
    public $settings =
    [
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
        $this->alert('success', 'Information Saved Successfully!');
    }
    function resetAll()
    {
        $this->settings = [
            'school_name' => null,
            'established_at' => null,
            'eiin' => null,
            'domain' => null,
            'contact_number' => null,
            'contact_mail' => null,
            'address' => null,
        ];
    }
    public function SavePerson()
    {
        // $this->validate();
        $imgc = $this->person['image'];
        $newImageName = time() . '_' . $imgc->getClientOriginalName();
        $this->PersonimageName = $imgc->storeAs('frontend/images/persons', $newImageName, 'public');

        $imgs = $this->person['signiture'];
        $signitureImageName = time() . '_' . $imgs->getClientOriginalName();
        $this->PersonSignitureimage = $imgs->storeAs('frontend/images/persons', $signitureImageName, 'public');
        // dd($this->PersonimageName);
        $inserted =  ImportantIndividual::create(
            [
                'person_name' => $this->person['name'],
                'person_image' => $this->PersonimageName,
                'person_words' => $this->person['words'],
                'person_signiture' => $this->PersonSignitureimage,
            ]
        );
        if ($inserted) {
            $this->person = [
                'name' => null,
                'image' => null,
                'words' => null,
                'signiture' => null
            ];
            $this->iteration++;
            $this->alert('success', 'Person Created Successfully!');
        }
    }
    function editIndividual($id)
    {
        $pre =  ImportantIndividual::find($id);
        if ($pre) {
            $this->editing = true;
            $this->editableId = $id;
        }
        $this->person = [
            'name' => $pre->person_name,
            'image' => $pre->person_image,
            'words' => $pre->person_words,
            'signiture' => $pre->person_signiture
        ];
    }
    function updateIndividual()
    {
        // dd($this->person);
        if ($this->person['image'] != null && !is_string($this->person['image'])) {
            Storage::disk('public')->delete($this->image);
            $imgc = $this->person['image'];
            $newImageName = time() . '_' . $imgc->getClientOriginalName();
            $this->PersonimageName = $imgc->storeAs('frontend/images/persons', $newImageName, 'public');
        }

        if ($this->person['signiture'] && !is_string($this->person['signiture'])) {
            Storage::disk('public')->delete($this->signiture);
            $imgs = $this->person['signiture'];
            $signitureImageName = time() . '_' . $imgs->getClientOriginalName();
            $this->PersonSignitureimage = $imgs->storeAs('frontend/images/persons', $signitureImageName, 'public');
        }


        // dd($this->PersonimageName);
        $found =  ImportantIndividual::find($this->editableId);
        $inserted = $found->update(
            [
                'person_name' => $this->person['name'],
                'person_image' => $this->PersonimageName ?? $this->person['image'],
                'person_words' => $this->person['words'],
                'person_signiture' => $this->PersonSignitureimage ?? $this->person['signiture'],
            ]
        );
        if ($inserted) {
            $this->person = [
                'name' => null,
                'image' => null,
                'words' => null,
                'signiture' => null
            ];
            $this->editing = false;
            $this->editableId = null;
            $this->iteration++;
            $this->alert('success', 'Person Updated Successfully!');
        }
    }
    function deleteIndividual($id)
    {
        $pre =  ImportantIndividual::find($id);
        $pre->person_image != null ? Storage::disk('public')->delete($pre->person_image) : $this->person['image'] = null;
        $pre->delete();
        $this->alert('success', 'Person Deleted Successfully!');
    }
    public function render()
    {
        $individuals =  ImportantIndividual::all();
        return view('livewire.school-profile-component', ['individuals' => $individuals]);
    }
}
