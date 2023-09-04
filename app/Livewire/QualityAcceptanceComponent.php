<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Response;
use Livewire\WithFileUploads;
use App\Models\QualificationAcceptance;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class QualityAcceptanceComponent extends Component
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
            $filos[] = $file->storeAs('frontend/files/acceptance', $newImageName, 'public');
        }
        QualificationAcceptance::create([
            'description' => $this->fields['description'],
            'files' => json_encode($filos),
        ]);
        $this->iteration++;
        $this->resetFields();
        $this->alert('success', 'স্বীকৃতির তথ্য সফলভাবে তৈরি করা হয়েছে!');
    }
    function EditClass($id)
    {
        $ec = QualificationAcceptance::find($id);
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
                $filos[] = $file->storeAs('frontend/files/acceptance', $newImageName, 'public');
            }
        } else {
            $filos = $this->fields['files_in_edit'];
        }
        $updatable = QualificationAcceptance::find($this->fields['editable_id']);
        $updatable->update([
            'description' => $this->fields['description'],
            'files' => json_encode($filos),
        ]);
        $this->iteration++;
        $this->resetFields();
        $this->alert('success', 'স্বীকৃতির তথ্য সফলভাবে আপডেট করা হয়েছে!');
    }
    function DeleteClass($id)
    {
        $updatable = QualificationAcceptance::find($id);
        foreach (json_decode($updatable->files) as $file) {
            Storage::disk('public')->delete($file);
        }
        $updatable->delete();
        $this->resetFields();
        $this->alert('success', 'স্বীকৃতির তথ্য সফলভাবে ডিলিট করা হয়েছে!');
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
        // dd($filePath);

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
        $acceptances = QualificationAcceptance::paginate(8);
        return view('livewire.quality-acceptance-component', ['acceptances' => $acceptances]);
    }
}
