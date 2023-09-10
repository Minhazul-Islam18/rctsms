<?php

namespace App\Livewire;

use App\Models\ClassSyllabus;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ClassSyllabusComponent extends Component
{
    use LivewireAlert, WithPagination, WithFileUploads;
    public $iteration;
    public $fields = [
        'status' => false,
        'files_in_edit' => null,
        'editable_id' => null,
        'files' => [],
        'class' => null,
        'description' => null,
    ];
    protected $listeners = ['downloadFile'];
    public $editable_id;
    function SaveClass()
    {

        foreach ($this->fields['files'] as $file) {
            $newImageName = time() . '_' . $file->getClientOriginalName();
            $filos[] = $file->storeAs('frontend/files/syllabus', $newImageName, 'public');
        }
        ClassSyllabus::create([
            'files' => json_encode($filos),
            'class' => $this->fields['class'],
            'description' => $this->fields['description'],
        ]);
        $this->iteration++;
        $this->resetFields();
        $this->alert('success', 'শ্রেণী সিলেবাসের তথ্য সফলভাবে তৈরি করা হয়েছে!');
    }
    function EditClass($id)
    {
        $ec = ClassSyllabus::find($id);
        $this->fields['status'] = true;
        $this->fields['description'] = $ec->description;
        $this->fields['class'] = $ec->class;
        $this->fields['editable_id'] = $id;
        $this->fields['files_in_edit'] = json_decode($ec['files']);
    }
    function UpdateClass()
    {
        $this->validate([
            'fields.class' => 'required',
            'fields.description' => 'required',
        ]);
        if ($this->fields['files']) {
            foreach ($this->fields['files_in_edit'] as $file) {
                Storage::disk('public')->delete($file);
            }
            foreach ($this->fields['files'] as $file) {
                $newImageName = time() . '_' . $file->getClientOriginalName();
                $filos[] = $file->storeAs('frontend/files/syllabus', $newImageName, 'public');
            }
        } else {
            $filos = $this->fields['files_in_edit'];
        }
        $updatable = ClassSyllabus::find($this->fields['editable_id']);
        $updatable->update([
            'files' => json_encode($filos),
            'description' => $this->fields['description'],
            'class' => $this->fields['class'],
        ]);
        $this->iteration++;
        $this->resetFields();
        $this->alert('success', 'শ্রেণী সিলেবাসের তথ্য সফলভাবে আপডেট করা হয়েছে!');
    }
    function DeleteClass($id)
    {
        $updatable = ClassSyllabus::find($id);
        foreach (json_decode($updatable->files) as $file) {
            Storage::disk('public')->delete($file);
        }
        $updatable->delete();
        $this->resetFields();
        $this->alert('success', 'শ্রেণী সিলেবাসের তথ্য সফলভাবে ডিলিট করা হয়েছে!');
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
            'files' => null,
            'description' => null,
            'class' => null,
        ];
    }
    public function downloadFile($filename)
    {
        $filePath = storage_path('app/public/' . $filename);
        if (file_exists($filePath)) {
            $fileContents = Storage::disk('public')->get($filename);

            return Response::stream(
                function () use ($fileContents) {
                    echo $fileContents;
                },
                200,
                [
                    'Content-Type' => 'application/octet-stream',
                    'Content-Disposition' => 'attachment; filename="' . basename($filePath) . '"',
                ]
            );
        } else {
            abort(404);
        }
    }
    public function render()
    {
        $syllabuses = ClassSyllabus::paginate(8);
        return view('livewire.class-syllabus-component', ['syllabuses' => $syllabuses]);
    }
}
