<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use App\Models\AcademicResult;
use App\Models\ClassList;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AcademicResultComponent extends Component
{
    use LivewireAlert, WithPagination, WithFileUploads;
    #[Rule('nullable')]
    public $files;
    #[Rule('required')]
    public $content;
    #[Rule('required')]
    public $class_id;
    public $actions = [
        'id' => null,
        'files' => [],
        'preview' => false,
        'edit' => false
    ];
    public function store()
    {
        $this->validate();
        if ($this->files) {
            foreach ($this->files as $value) {
                $imageName  = time() . '.' . $value->getClientOriginalName();
                $path       = "frontend/files/results";
                $filos[] = Storage::disk('public')->put($path, $imageName);
            }
        }
        AcademicResult::create([
            'files' => json_encode($filos),
            'content' => $this->content,
            'class_list_id' => $this->class_id
        ]);
        $this->resetAction();
        $this->alert('success', 'Academic Result Record Created.');
    }
    function edit($id)
    {
        $this->actions['id'] = $id;
        $this->actions['edit'] = true;
        $ec = AcademicResult::find($this->actions['id']);
        $this->actions['files'] = json_decode($ec->files);
        $this->content = $ec->content;
        $this->class_id = $ec->class_list_id;
    }

    public function update()
    {
        $this->validate();
        if ($this->files) {
            foreach ($this->actions['files'] as $value) {
                Storage::disk('public')->delete($value);
            }
            foreach ($this->files as $value) {
                $imageName  = time() . '.' . $value->getClientOriginalName();
                $path       = "frontend/files/results";
                $filos[] = Storage::disk('public')->put($path, $imageName);
            }
        } else {
            $filos = $this->actions['files'];
        }
        $ec = AcademicResult::find($this->actions['id']);
        $ec->update([
            'files' => json_encode($filos),
            'content' => $this->content,
            'class_list_id' => $this->class_id
        ]);
        $this->resetAction();
        $this->alert('success', 'Academic Result Record Updated.');
    }
    public function destroy($id)
    {

        $ec = AcademicResult::find($id);
        if ($ec->files) {
            foreach (json_decode($ec->files) as $value) {
                Storage::disk('public')->delete($value);
            }
        }
        $ec->delete();
        $this->alert('success', 'Academic Result Record Deleted.');
    }

    public function resetAction()
    {
        $this->files = null;
        $this->content = null;
        $this->class_id = null;
        $this->actions = [
            'id' => null,
            'files' => [],
            'preview' => false,
            'edit' => false
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
            AcademicResult::findOrFail($data['value'])->update(['position' => $data['order']]);
        }
        $this->alert('success', 'Re-Ordered');
    }
    public function render()
    {
        $results = AcademicResult::with('class')->orderBy('position', 'ASC')->paginate(8);
        $classes =  ClassList::with('results')->orderBy('position', 'ASC')->paginate(8);
        return view('livewire.academic-result-component', ['results' => $results, 'classes' => $classes]);
    }
}
