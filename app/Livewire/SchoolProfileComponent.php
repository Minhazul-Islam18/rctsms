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
    // #[Rule('required')]
    public $person_image;
    // #[Rule('required')]
    public $person_name;
    // #[Rule('required')]
    public $person_signiture;
    // #[Rule('required')]
    public $person_words;
    public $PersonimageName;
    public $PersonSignitureimage;
    public $person =
    [
        'image' => null,
        'signiture' => null,
        'name' => null,
        'words' => null,
        'post' => null,
    ];
    public $settings =
    [
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
        $this->alert('success', 'Information Saved Successfully!');
    }
    function resetAll()
    {
        $this->settings = [
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
    public function SavePerson()
    {
        $this->validate([
            'person.image' => 'required',
            'person.signiture' => 'required',
            'person.name' => 'required',
            'person.words' => 'required',
            'person.post' => 'required',
        ]);
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
                'person_post' => $this->person['post'],
                'person_image' => $this->PersonimageName,
                'person_words' => $this->person['words'],
                'person_signiture' => $this->PersonSignitureimage,
            ]
        );
        if ($inserted) {
            $this->person = [
                'name' => null,
                'post' => null,
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
            'post' => $pre->person_post,
            'words' => $pre->person_words,
            'signiture' => $pre->person_signiture
        ];
    }
    function updateIndividual()
    {
        $this->validate([
            'person.image' => 'required',
            'person.signiture' => 'required',
            'person.name' => 'required',
            'person.words' => 'required',
            'person.post' => 'required',
        ]);
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
                'person_post' => $this->person['post'],
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
                'post' => null,
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
