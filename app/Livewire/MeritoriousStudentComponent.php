<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use App\Models\MeritoriousStudent;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class MeritoriousStudentComponent extends Component
{
    use LivewireAlert, WithPagination, WithFileUploads;
    #[Rule('nullable')]
    public $student_image;
    #[Rule('required')]
    public $student_name;
    #[Rule('required')]
    public $student_study_period;
    #[Rule('required')]
    public $student_merits;
    public $actions = [
        'id' => null,
        'image' => null,
        'preview' => false,
        'edit' => false
    ];
    public function store()
    {
        $this->validate();
        $io = $this->student_image;
        $newImageName = time() . '_' . $io->getClientOriginalName();
        $this->student_image = $io->storeAs('frontend/images/students', $newImageName, 'public');
        MeritoriousStudent::create([
            'image' => $this->student_image,
            'name' => $this->student_name,
            'study_period' => $this->student_study_period,
            'merits' => $this->student_merits
        ]);
        $this->resetAction();
        $this->alert('success', 'Meritorious Student Record Created.');
    }
    function edit($id)
    {
        $this->actions['id'] = $id;
        $this->actions['edit'] = true;
        $ec = MeritoriousStudent::find($this->actions['id']);
        $this->actions['image'] = $ec->image;
        $this->student_name = $ec->name;
        $this->student_merits = $ec->merits;
        $this->student_study_period = $ec->study_period;
    }

    public function update()
    {
        $this->validate();
        if ($this->student_image) {
            Storage::disk('public')->delete($this->actions['image']);
            $io = $this->student_image;
            $newImageName = time() . '_' . $io->getClientOriginalName();
            $this->student_image = $io->storeAs('frontend/images/students', $newImageName, 'public');
        } else {
            $this->student_image = $this->actions['image'];
        }
        $ec = MeritoriousStudent::find($this->actions['id']);
        $ec->update([
            'image' => $this->student_image,
            'name' => $this->student_name,
            'study_period' => $this->student_study_period,
            'merits' => $this->student_merits
        ]);
        $this->resetAction();
        $this->alert('success', 'Meritorious Student Record Updated.');
    }
    public function destroy($id)
    {
        $ec = MeritoriousStudent::find($id);
        Storage::disk('public')->delete($ec->image);
        $ec->delete();
        $this->alert('success', 'Meritorious Student Record Deleted.');
    }

    public function resetAction()
    {
        $this->student_image = null;
        $this->student_merits = null;
        $this->student_name = null;
        $this->student_study_period = null;
        $this->actions = [
            'id' => null,
            'preview' => false,
            'edit' => false
        ];
    }
    public function ReOrder($list)
    {
        foreach ($list as $data) {
            MeritoriousStudent::findOrFail($data['value'])->update(['position' => $data['order']]);
        }
        $this->alert('success', 'Re-Ordered');
    }
    public function render()
    {
        $mStudents = MeritoriousStudent::orderBy('position', 'ASC')->paginate(8);
        return view('livewire.meritorious-student-component', ['mStudents' => $mStudents]);
    }
}
