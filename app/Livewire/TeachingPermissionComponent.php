<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\TeachingPermission;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class TeachingPermissionComponent extends Component
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
        // dd($this->fields['files']);
        $this->validate([
            'fields.description' => 'required|min:3',
            'fields.files' => 'required'
        ]);
        // dd($this->fields['files']);
        foreach ($this->fields['files'] as $file) {
            $newImageName = time() . '_' . $file->getClientOriginalName();
            $filos[] = $file->storeAs('frontend/files/permissions', $newImageName, 'public');
        }
        TeachingPermission::create([
            'description' => $this->fields['description'],
            'files' => json_encode($filos),
        ]);
        $this->iteration++;
        $this->resetFields();
        $this->alert('success', 'পাঠদানের অনুমতির তথ্য সফলভাবে তৈরি করা হয়েছে!');
    }
    function EditClass($id)
    {
        $ec = TeachingPermission::find($id);
        $this->fields['status'] = true;
        $this->fields['editable_id'] = $id;
        $this->fields['description'] = $ec['description'];
        $this->fields['files_in_edit'] = json_decode($ec['files']);
    }
    function UpdateClass()
    {

        $this->validate([
            'fields.description' => 'required|min:3'
        ]);
        if ($this->fields['files']) {
            foreach ($this->fields['files_in_edit'] as $file) {
                Storage::disk('public')->delete($file);
            }
            foreach ($this->fields['files'] as $file) {
                $newImageName = time() . '_' . $file->getClientOriginalName();
                $filos[] = $file->storeAs('frontend/files/permissions', $newImageName, 'public');
            }
        } else {
            $filos = $this->fields['files_in_edit'];
        }
        $updatable = TeachingPermission::find($this->fields['editable_id']);
        $updatable->update([
            'description' => $this->fields['description'],
            'files' => json_encode($filos),
        ]);
        $this->iteration++;
        $this->resetFields();
        $this->alert('success', 'পাঠদানের অনুমতির তথ্য সফলভাবে আপডেট করা হয়েছে!');
    }
    function DeleteClass($id)
    {
        $updatable = TeachingPermission::find($id);
        foreach (json_decode($updatable->files) as $file) {
            Storage::disk('public')->delete($file);
        }
        $updatable->delete();
        $this->resetFields();
        $this->alert('success', 'পাঠদানের অনুমতির তথ্য সফলভাবে ডিলিট করা হয়েছে!');
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
        ];
    }
    public function downloadFile($filename)
    {
        $filePath = storage_path('app/public/' . $filename);

        if (File::exists($filePath)) {
            $fileContents = File::get($filePath);

            $response = Response::stream(
                function () use ($fileContents) {
                    echo $fileContents;
                },
                200,
                [
                    'Content-Type' => 'application/octet-stream',
                    'Content-Disposition' => 'attachment; filename="' . basename($filePath) . '"',
                ]
            );

            return $response;
        } else {
            abort(404);
        }
    }
    public function ReOrder($list)
    {
        foreach ($list as $data) {
            TeachingPermission::findOrFail($data['value'])->update(['position' => $data['order']]);
        }
        $this->alert('success', 'Re-Ordered');
    }
    public function render()
    {
        $permissions = TeachingPermission::orderBy('position')->paginate(8);
        return view('livewire.teaching-permission-component', ['permissions' => $permissions]);
    }
}
