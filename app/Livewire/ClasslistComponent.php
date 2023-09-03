<?php

namespace App\Livewire;

use App\Models\ClassList;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class ClasslistComponent extends Component
{
    use LivewireAlert, WithPagination;
    public $fields = [
        'status' => false,
        'editable_id' => null,
        'class_name' => null,
        'observation' => null,
        'student_number' => null,
    ];
    public $editable_id;
    public $class_name;
    public $observation;
    public $student_number;
    function SaveClass()
    {
        $this->validate([
            'fields.class_name' => 'required|min:3',
            'fields.observation' => 'required|min:3',
            'fields.student_number' => 'required',
        ]);
        ClassList::create([
            'class_name' => $this->fields['class_name'],
            'observation' => $this->fields['observation'],
            'student_number' => $this->fields['student_number'],
        ]);

        $this->reset();
        // dd($this->fields);
        $this->alert('success', 'ক্লাস সফলভাবে তৈরি করা হয়েছে!');
    }
    function EditClass($id)
    {
        $ec = ClassList::find($id);
        $this->fields['status'] = true;
        $this->fields['editable_id'] = $id;
        $this->fields['class_name'] = $ec['class_name'];
        $this->fields['observation'] = $ec['observation'];
        $this->fields['student_number'] = $ec['student_number'];
    }
    function UpdateClass()
    {
        $this->validate([
            'fields.class_name' => 'required|min:3',
            'fields.observation' => 'required|min:3',
            'fields.student_number' => 'required',
        ]);
        $updatable = ClassList::find($this->fields['editable_id']);
        $updatable->update([
            'class_name' => $this->fields['class_name'],
            'observation' => $this->fields['observation'],
            'student_number' => $this->fields['student_number'],
        ]);
        $this->reset([$this->fields]);
        $this->alert('success', 'ক্লাস সফলভাবে আপডেট করা হয়েছে!');
    }
    function DeleteClass($id)
    {
        $updatable = ClassList::find($id);
        $updatable->delete();
        $this->reset([$this->fields]);
        $this->alert('success', 'ক্লাস সফলভাবে আপডেট করা হয়েছে!');
    }
    public function render()
    {
        $classes = ClassList::paginate(8);
        return view('livewire.classlist-component', ['classes' => $classes]);
    }
}
