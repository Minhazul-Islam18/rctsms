<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CoCurriculum;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class CoCurriculumComponent extends Component
{
    use LivewireAlert, WithPagination, WithFileUploads;
    public $iteration;
    public $fields = [
        'status' => false,
        'files_in_edit' => null,
        'editable_id' => null,
        'files' => [],
        'description' => null,
    ];
    protected $listeners = ['downloadFile'];
    public $editable_id;
    function SaveClass()
    {

        foreach ($this->fields['files'] as $file) {
            $newImageName = time() . '_' . $file->getClientOriginalName();
            $filos[] = $file->storeAs('frontend/files/co-curriculum', $newImageName, 'public');
        }
        CoCurriculum::create([
            'files' => json_encode($filos),
            'description' => $this->fields['description'],
        ]);
        $this->iteration++;
        $this->resetFields();
        $this->alert('success', 'কে-কারিকুলামের তথ্য সফলভাবে তৈরি করা হয়েছে!');
    }
    function EditClass($id)
    {
        $ec = CoCurriculum::find($id);
        $this->fields['status'] = true;
        $this->fields['description'] = $ec->description;
        $this->fields['editable_id'] = $id;
        $this->fields['files_in_edit'] = json_decode($ec['files']);
    }
    function UpdateClass()
    {
        $this->validate([
            'fields.description' => 'required',
        ]);
        if ($this->fields['files']) {
            foreach ($this->fields['files_in_edit'] as $file) {
                Storage::disk('public')->delete($file);
            }
            foreach ($this->fields['files'] as $file) {
                $newImageName = time() . '_' . $file->getClientOriginalName();
                $filos[] = $file->storeAs('frontend/files/co-curriculum', $newImageName, 'public');
            }
        } else {
            $filos = $this->fields['files_in_edit'];
        }
        $updatable = CoCurriculum::find($this->fields['editable_id']);
        $updatable->update([
            'files' => json_encode($filos),
            'description' => $this->fields['description'],
        ]);
        $this->iteration++;
        $this->resetFields();
        $this->alert('success', 'কে-কারিকুলামের তথ্য সফলভাবে আপডেট করা হয়েছে!');
    }
    function DeleteClass($id)
    {
        $updatable = CoCurriculum::find($id);
        foreach (json_decode($updatable->files) as $file) {
            Storage::disk('public')->delete($file);
        }
        $updatable->delete();
        $this->resetFields();
        $this->alert('success', 'কে-কারিকুলামের তথ্য সফলভাবে ডিলিট করা হয়েছে!');
    }
    function CancelEdit()
    {
        $this->resetFields();
    }
    public function resetFields()
    {
        $this->fields = [
            'status' => false,
            'files_in_edit' => null,
            'editable_id' => null,
            'files' => [],
            'description' => null,
        ];
    }
    public function downloadFile($filename)
    {
        if (Storage::disk('public')->exists($filename)) {
            $thisFile = Storage::disk('public')->path($filename);
            return response()->download($thisFile);
        }
        return abort(404);
    }
    public function ReOrder($list)
    {
        foreach ($list as $data) {
            CoCurriculum::findOrFail($data['value'])->update(['position' => $data['order']]);
        }
        $this->alert('success', 'Re-Ordered');
    }
    public function render()
    {
        $coCurriculums = CoCurriculum::orderBy('position')->paginate(8);
        return view('livewire.co-curriculum-component', ['coCurriculums' => $coCurriculums]);
    }
}
