<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\InstitutionCommittee;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class InstitutionCommitteeComponent extends Component
{
    use LivewireAlert, WithPagination, WithFileUploads;
    public $iteration;
    public $fields = [
        'status' => false,
        'image_in_edit' => null,
        'editable_id' => null,
        'person_name' => null,
        'person_image' => null,
        'educational_qualification' => null,
        'identity' => null,
        'person_post' => null,
        'person_address' => null,
        'expired_at' => null,
    ];
    public $editable_id;
    function SaveClass()
    {
        $this->validate([
            'fields.person_name' => 'required|min:3',
            'fields.educational_qualification' => 'required|min:3',
            'fields.identity' => 'required',
            'fields.person_post' => 'required',
            'fields.person_address' => 'required',
        ]);
        $io = $this->fields['person_image'];
        $newImageName = time() . '_' . $io->getClientOriginalName();
        $this->fields['person_image'] = $io->storeAs('frontend/images/committee', $newImageName, 'public');
        InstitutionCommittee::create([
            'person_name' => $this->fields['person_name'],
            'person_image' => $this->fields['person_image'],
            'educational_qualification' => $this->fields['educational_qualification'],
            'identity' => $this->fields['identity'],
            'person_post' => $this->fields['person_post'],
            'person_address' => $this->fields['person_address'],
            'expired_at' => $this->fields['expired_at'],
        ]);
        $this->iteration++;
        $this->resetFields();
        $this->alert('success', 'কমিটি সদস্য সফলভাবে তৈরি করা হয়েছে!');
    }
    function EditClass($id)
    {
        $ec = InstitutionCommittee::find($id);
        $this->fields['status'] = true;
        $this->fields['editable_id'] = $id;
        $this->fields['person_name'] = $ec['person_name'];
        $this->fields['image_in_edit'] = $ec['person_image'];
        $this->fields['person_image'] = null;
        $this->fields['educational_qualification'] = $ec['educational_qualification'];
        $this->fields['identity'] = $ec['identity'];
        $this->fields['person_post'] = $ec['person_post'];
        $this->fields['person_address'] = $ec['person_address'];
        $this->fields['expired_at'] = $ec['expired_at'];
    }
    function UpdateClass()
    {
        $this->validate([
            'fields.person_name' => 'required|min:3',
            'fields.educational_qualification' => 'required|min:3',
            'fields.identity' => 'required',
            'fields.person_post' => 'required',
            'fields.person_address' => 'required',
        ]);
        if ($this->fields['person_image']) {
            Storage::disk('public')->delete($this->fields['image_in_edit']);
            $io = $this->fields['person_image'];
            $newImageName = time() . '_' . $io->getClientOriginalName();
            $this->fields['person_image'] = $io->storeAs('frontend/images/committee', $newImageName, 'public');
        } else {
            $this->fields['person_image'] = $this->fields['image_in_edit'];
        }
        $updatable = InstitutionCommittee::find($this->fields['editable_id']);
        $updatable->update([
            'person_name' => $this->fields['person_name'],
            'person_image' => $this->fields['person_image'],
            'educational_qualification' => $this->fields['educational_qualification'],
            'identity' => $this->fields['identity'],
            'person_post' => $this->fields['person_post'],
            'person_address' => $this->fields['person_address'],
            'expired_at' => $this->fields['expired_at'],
        ]);
        $this->resetFields();
        $this->iteration++;
        $this->alert('success', 'কমিটি সদস্য সফলভাবে আপডেট করা হয়েছে!');
    }
    function DeleteClass($id)
    {
        $updatable = InstitutionCommittee::find($id);
        Storage::disk('public')->delete($updatable->person_image);
        $updatable->delete();
        $this->resetFields();
        $this->alert('success', 'কমিটি সদস্য সফলভাবে ডিলিট করা হয়েছে!');
    }
    public function resetFields()
    {
        $this->fields = [
            'status' => false,
            'image_in_edit' => null,
            'editable_id' => null,
            'person_name' => null,
            'person_image' => null,
            'educational_qualification' => null,
            'identity' => null,
            'person_post' => null,
            'person_address' => null,
            'expired_at' => null,
        ];
    }
    function CancelEdit()
    {
        $this->resetFields();
    }
    public function render()
    {
        $CommitteePersons = InstitutionCommittee::paginate(8);
        return view('livewire.institution-committee-component', ['CommitteePersons' => $CommitteePersons]);
    }
}
