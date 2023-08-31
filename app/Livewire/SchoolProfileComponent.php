<?php

namespace App\Livewire;

use App\Models\ImportantIndividual;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class SchoolProfileComponent extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    // #[Rule('mimes:png,jpg,jpeg,webp,gif')]
    public $person_image;
    // #[Rule('required|unique:important_persons, person_name|min:5')]
    public $person_name;
    // #[Rule('mimes:png,jpg,jpeg,webp,gif')]
    public $person_signiture;
    // #[Rule('required|min:5')]
    public $person_words;
    public $test;
    public $iteration;
    function mount()
    {
        // dd('mounted');
    }
    public function hello()
    {
        dd('ho');
        $this->validate();
        // $newImageName = time() . '_' . $this->person_image->getClientOriginalName();

        // $this->PersonimageName = $this->image->storeAs('frontend/images/persons', $newImageName, 'public');
        // $signitureImageName = time() . '_' . $this->person_signiture->getClientOriginalName();

        // $this->PersonSignitureimage = $this->image->storeAs('frontend/images/persons', $signitureImageName, 'public');

        $inserted =  ImportantIndividual::create(
            [
                'person_name' => $this->person_name,
                'person_image' => $this->signitureImageName,
                'person_words' => $this->person_words,
                'person_signiture' => $this->PersonSignitureimage,
            ]
        );
        if ($inserted) {
            $this->person_name = '';
            $this->person_image = '';
            $this->person_words = '';
            $this->person_signiture = '';
            $this->alert('success', 'Person Created Successfully!');
        }
    }
    public function render()
    {
        return view('livewire.school-profile-component');
    }
}
