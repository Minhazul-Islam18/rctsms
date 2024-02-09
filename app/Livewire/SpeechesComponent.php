<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\ImportantIndividual;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class SpeechesComponent extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    // #[Rule('mimes:png,jpg,jpeg,webp,gif')]
    public $editing = false;
    public $editableId;
    // #[Rule('required')]
    public $edit_person_image;
    // #[Rule('required')]
    public $person_name;
    // #[Rule('required')]
    public $edit_person_signiture;
    public $words = null;
    // #[Rule('required')]
    public $person_words;
    public $PersonimageName;
    public $PersonSignitureimage;
    public $iteration;
    public $person =
    [
        'image' => null,
        'signiture' => null,
        'name' => null,
        'words' => null,
        'post' => null,
    ];
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
                'person_words' => $this->words,
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
        $this->edit_person_image = $pre->person_image;
        $this->edit_person_signiture = $pre->person_signiture;
        if ($pre) {
            $this->editing = true;
            $this->editableId = $id;
        }
        $this->words = $pre->person_words;
        $this->person = [
            'name' => $pre->person_name,
            'image' => $pre->person_image,
            'post' => $pre->person_post,
            // 'words' => $pre->person_words,
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
            Storage::disk('public')->delete($this->edit_person_signiture);
            Storage::disk('public')->delete($this->edit_person_image);
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
                'person_words' => $this->words,
                'person_signiture' => $this->PersonSignitureimage ?? $this->person['signiture'],
            ]
        );
        if ($inserted) {
            $this->words = null;
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
        $pre->person_signiture != null ? Storage::disk('public')->delete($pre->person_signiture) : $this->person['signiture'] = null;
        $pre->delete();
        $this->alert('success', 'Person Deleted Successfully!');
    }
    public function ReOrderPerson($list)
    {
        foreach ($list as $data) {
            ImportantIndividual::findOrFail($data['value'])->update(['position' => $data['order']]);
        }
        $this->alert('success', 'Re-Ordered');
    }
    public function render()
    {
        $individuals =  ImportantIndividual::orderBy('position')->get();
        return view('livewire.speeches-component', ['individuals' => $individuals]);
    }
}
