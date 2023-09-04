<?php

namespace App\Livewire;

use App\Models\TeacherAndStaffs;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class TeachersStaffsComponent extends Component
{
    use LivewireAlert, WithPagination, WithFileUploads;
    public $iteration;
    public $fields = [
        'status' => false,
        'image_in_edit' => null,
        'editable_id' => null,
        'image' => null,
        'name' => null,
        'post' => null,
        'educational_qualification' => null,
        'mobile' => null,
        'email' => null,
        'facebook' => null,
        'website' => null,
        'address' => null,
        'is_resigned' => null,
    ];
    public $editable_id;
    function SaveClass()
    {
        $this->validate([
            'fields.name' => 'required|min:3',
            'fields.post' => 'required',
            'fields.educational_qualification' => 'required',
            'fields.mobile' => 'required',
            'fields.email' => 'required',
            'fields.facebook' => 'required',
            'fields.website' => 'required',
            'fields.address' => 'required',
        ]);
        $io = $this->fields['image'];
        $newImageName = time() . '_' . $io->getClientOriginalName();
        $this->fields['image'] = $io->storeAs('frontend/images/teacehers', $newImageName, 'public');
        TeacherAndStaffs::create([
            'image' => $this->fields['image'],
            'name' => $this->fields['name'],
            'post' => $this->fields['post'],
            'educational_qualification' => $this->fields['educational_qualification'],
            'mobile' => $this->fields['mobile'],
            'email' => $this->fields['email'],
            'facebook' => $this->fields['facebook'],
            'website' => $this->fields['website'],
            'address' => $this->fields['address'],
            'is_resigned' => $this->fields['is_resigned'],
        ]);
        $this->iteration++;
        $this->resetFields();
        $this->alert('success', 'শিক্ষক বা স্টাফ সফলভাবে তৈরি করা হয়েছে!');
    }
    function EditClass($id)
    {
        $ec = TeacherAndStaffs::find($id);
        $this->fields['status'] = true;
        $this->fields['editable_id'] = $id;
        $this->fields['image'] = null;
        $this->fields['image_in_edit'] = $ec['image'];
        $this->fields['name'] = $ec['name'];
        $this->fields['post'] = $ec['post'];
        $this->fields['educational_qualification'] = $ec['educational_qualification'];
        $this->fields['mobile'] = $ec['mobile'];
        $this->fields['email'] = $ec['email'];
        $this->fields['facebook'] = $ec['facebook'];
        $this->fields['website'] = $ec['website'];
        $this->fields['address'] = $ec['address'];
        $this->fields['is_resigned'] = $ec['is_resigned'];
    }
    function UpdateClass()
    {
        $this->validate([
            'fields.name' => 'required|min:3',
            'fields.post' => 'required',
            'fields.educational_qualification' => 'required',
            'fields.mobile' => 'required',
            'fields.email' => 'required',
            'fields.facebook' => 'required',
            'fields.website' => 'required',
            'fields.address' => 'required',
        ]);
        if ($this->fields['image']) {
            Storage::disk('public')->delete($this->fields['image_in_edit']);
            $io = $this->fields['image'];
            $newImageName = time() . '_' . $io->getClientOriginalName();
            $this->fields['image'] = $io->storeAs('frontend/images/teachers', $newImageName, 'public');
        } else {
            $this->fields['image'] = $this->fields['image_in_edit'];
        }
        $updatable = TeacherAndStaffs::find($this->fields['editable_id']);
        $updatable->update([
            'image' => $this->fields['image'],
            'name' => $this->fields['name'],
            'post' => $this->fields['post'],
            'educational_qualification' => $this->fields['educational_qualification'],
            'mobile' => $this->fields['mobile'],
            'email' => $this->fields['email'],
            'facebook' => $this->fields['facebook'],
            'website' => $this->fields['website'],
            'address' => $this->fields['address'],
            'is_resigned' => $this->fields['is_resigned'],
        ]);
        $this->iteration++;
        $this->resetFields();
        $this->alert('success', 'শিক্ষক বা স্টাফ সফলভাবে আপডেট করা হয়েছে!');
    }
    function DeleteClass($id)
    {
        $updatable = TeacherAndStaffs::find($id);
        Storage::disk('public')->delete($updatable->image);
        $updatable->delete();
        $this->resetFields();
        $this->alert('success', 'শিক্ষক বা স্টাফ সফলভাবে ডিলিট করা হয়েছে!');
    }
    function CancelEdit()
    {
        $this->resetFields();
    }
    public function resetFields()
    {
        $this->fields = [
            'status' => false,
            'image_in_edit' => null,
            'editable_id' => null,
            'image' => null,
            'name' => null,
            'post' => null,
            'educational_qualification' => null,
            'mobile' => null,
            'email' => null,
            'facebook' => null,
            'website' => null,
            'address' => null,
            'is_resigned' => null,
        ];
    }
    public function render()
    {
        $Persons = TeacherAndStaffs::paginate(8);
        return view('livewire.teachers-staffs-component', ['Persons' => $Persons]);
    }
}
