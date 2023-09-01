<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\HomepageSlider;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class HomepageSliderComponent extends Component
{
    use LivewireAlert, WithFileUploads, WithPagination;
    public $confirmingDelete;
    public $selectedSlide;
    public $slideId;
    public $iteration;
    public $image;
    public $imageName;
    public $editing = false;
    public $formData = [
        'title' => '',
        'image' => '',
        'editimage' => '',
    ];
    public function editSlide($slideId)
    {
        $slide = HomepageSlider::findOrFail($slideId);
        // Storage::disk('public')->delete($slide->image);
        $this->formData['title'] = $slide->title;
        $this->formData['editimage'] = $slide->image;
        $this->editing = true;
        $this->slideId = $slideId;
        // dd($this->formData);
    }
    public function update()
    {
        // dd($this->formData['image']);
        $slide = HomepageSlider::findOrFail($this->slideId);

        if ($this->formData['image'] != null) {
            Storage::disk('public')->delete($slide->image);
            $imag = $this->formData['image'];
            // dd($imag->getClientOriginalName());
            $newImageName = time() . '_' . $imag->getClientOriginalName();

            $this->imageName = $imag->storeAs('frontend/images/slides', $newImageName, 'public');
        } elseif ($this->formData['editimage']) {
            $this->imageName = $this->formData['editimage'];
        }
        // dd($this->imageName);
        $slide->update([
            'title' => $this->formData['title'],
            'image' => $this->imageName
        ]);

        $this->formData['title'] = '';
        $this->formData['editimage'] = '';
        $this->formData['image'] = '';
        $this->editing = false;
        $this->slideId = null;
        $this->imageName = null;
        $this->iteration++;
        $this->alert('success', 'Slide updated successfully.');
    }
    public function create()
    {
        $imag = $this->formData['image'];
        // dd($imag->getClientOriginalName());
        $newImageName = time() . '_' . $imag->getClientOriginalName();

        $this->imageName = $imag->storeAs('frontend/images/slides', $newImageName, 'public');
        HomepageSlider::create([
            'title' => $this->formData['title'],
            'image' => $this->imageName
        ]);
        $this->reset(['formData']);
        $this->iteration++;
        $this->imageName = null;
        $this->alert('success', 'Slide created successfully.');
    }

    public function confirmDelete($selectedSlide)
    {
        $this->confirmingDelete = $selectedSlide;
    }
    public function cancelDelete()
    {
        $this->confirmingDelete = null;
    }
    public function cancelEdit()
    {
        $this->formData['title'] = '';
        $this->formData['editimage'] = '';
        $this->editing = false;
    }
    public function deleteSlide($selectedSlide)
    {
        $slider = HomepageSlider::findOrFail($selectedSlide);
        Storage::disk('public')->delete($slider->image);
        $slider->delete();
        $this->confirmingDelete = null;
    }
    public function render()
    {
        $slides = HomepageSlider::all();
        return view('livewire.homepage-slider-component', ['slides' => $slides]);
    }
}
