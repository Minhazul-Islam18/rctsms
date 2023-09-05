<?php

namespace App\Livewire;

use App\Models\ClassList;
use App\Models\ClassSection;
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
        'boys' => null,
        'girls' => null,
        'section_editing' => false,
        'section_name' => null,
        'section_student' => null,
        'class_id' => null,
    ];
    public $section_editing = false;
    public $editable_id;
    public $class_name;
    public $observation;
    public $boys;
    public $girls;
    function resetAll()
    {
        $this->fields = [
            'status' => false,
            'editable_id' => null,
            'class_name' => null,
            'observation' => null,
            'boys' => null,
            'girls' => null,
            'section_editing' => false,
            'section_name' => null,
            'section_student' => null,
            'class_id' => null,
        ];
    }
    function SaveSection()
    {
        $this->validate([
            'fields.section_name' => 'required',
            'fields.section_student' => 'required',
            'fields.class_id' => 'required',
        ]);
        ClassSection::create([
            'section_name' => $this->fields['section_name'],
            'section_student' => $this->fields['section_student'],
            'class_list_id' => $this->fields['class_id'],
        ]);

        $this->resetAll();
        $this->alert('success', 'ক্লাস সফলভাবে তৈরি করা হয়েছে!');
    }
    function SaveClass()
    {
        $this->validate([
            'fields.class_name' => 'required',
            'fields.observation' => 'required|min:3',
            'fields.boys' => 'required',
            'fields.girls' => 'required',
        ]);
        ClassList::create([
            'class_name' => $this->fields['class_name'],
            'observation' => $this->fields['observation'],
            'boys' => $this->fields['boys'],
            'girls' => $this->fields['girls'],
        ]);

        $this->resetAll();
        $this->alert('success', 'ক্লাস সফলভাবে তৈরি করা হয়েছে!');
    }
    function EditClass($id)
    {
        $ec = ClassList::find($id);
        $this->fields['status'] = true;
        $this->fields['editable_id'] = $id;
        $this->fields['class_name'] = $ec['class_name'];
        $this->fields['observation'] = $ec['observation'];
        $this->fields['boys'] = $ec['boys'];
        $this->fields['girls'] = $ec['girls'];
    }
    function EditSection($id)
    {
        $ec = ClassSection::find($id);
        $this->fields['section_editing'] = true;
        $this->fields['class_list_id'] = $id;
        $this->fields['class_id'] = $ec['class_list_id'];
        $this->fields['section_name'] = $ec['section_name'];
        $this->fields['section_student'] = $ec['section_student'];
    }
    function UpdateSection()
    {
        $this->validate([
            'fields.section_name' => 'required',
            'fields.section_student' => 'required',
            'fields.class_id' => 'required',
        ]);

        $updatable = ClassSection::find($this->fields['class_list_id']);
        $updatable->update([
            'section_name' => $this->fields['section_name'],
            'section_student' => $this->fields['section_student'],
            'class_list_id' => $this->fields['class_id'],
        ]);
        $this->resetAll();
        $this->alert('success', 'ক্লাস সফলভাবে আপডেট করা হয়েছে!');
    }
    function UpdateClass()
    {
        $this->validate([
            'fields.class_name' => 'required',
            'fields.observation' => 'required|min:3',
            'fields.boys' => 'required',
            'fields.girls' => 'required',
        ]);
        $updatable = ClassList::find($this->fields['editable_id']);
        $updatable->update([
            'class_name' => $this->fields['class_name'],
            'observation' => $this->fields['observation'],
            'student_number' => $this->fields['student_number'],
            'boys' => $this->fields['boys'],
            'girls' => $this->fields['girls'],
        ]);
        $this->resetAll();
        $this->alert('success', 'ক্লাস সফলভাবে আপডেট করা হয়েছে!');
    }
    function DeleteClass($id)
    {
        $updatable = ClassList::find($id);
        $updatable->delete();
        $this->resetAll();
        $this->alert('success', 'ক্লাস সফলভাবে আপডেট করা হয়েছে!');
    }
    function DeleteSection($id)
    {
        $updatable = ClassSection::find($id);
        $updatable->delete();
        $this->resetAll();
        $this->alert('success', 'ক্লাস সফলভাবে আপডেট করা হয়েছে!');
    }
    public function render()
    {
        $classes = ClassList::with('sections')->get();
        $sections = ClassSection::with('classes')->get();
        // dd($classes);
        return view('livewire.classlist-component', ['classes' => $classes, 'sections' => $sections]);
    }
}
