<?php

namespace App\Livewire;

use App\Models\PhotoGallery;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class PhotoGalleryComponent extends Component
{
    use WithFileUploads, LivewireAlert;
    public $items, $title, $description, $image, $selectedItem, $modal = false, $imageName;
    public function render()
    {
        $galleryImages = PhotoGallery::all();
        return view('livewire.photo-gallery-component', ['galleryImages' => $galleryImages]);
    }
    public function openModal()
    {
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->modal = false;
    }

    public function create()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image', // Adjust image validation rules as needed
        ]);

        $newImageName = time() . '_' . $this->image->getClientOriginalName();

        $this->imageName = $this->image->storeAs('frontend/images/gallery', $newImageName, 'public');
        // dd($this->imageName);
        PhotoGallery::create([
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->imageName,
        ]);

        $this->resetForm();
        $this->closeModal();
    }

    public function edit($id)
    {
        $item = PhotoGallery::findOrFail($id);
        $this->selectedItem = $item;
        $this->title = $item->title;
        $this->imageName = $item->image;
        $this->description = $item->description;
        $this->openModal();
    }

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        if ($this->image != null) {
            $newImageName = time() . '_' . $this->image->getClientOriginalName();

            $this->imageName = $this->image->storeAs('frontend/images/gallery', $newImageName, 'public');
        }

        // dd($this->imageName);
        if ($this->selectedItem) {
            $item = PhotoGallery::find($this->selectedItem->id);
            $item->update([
                'title' => $this->title,
                'description' => $this->description,
                'image' => $this->imageName,
            ]);
            $this->resetForm();
            $this->closeModal();
        }
    }

    public function delete($id)
    {
        $item = PhotoGallery::findOrFail($id);
        $item->image != null ? Storage::disk('public')->delete($item->image) : $this->image = null;
        $item->delete();
    }

    private function resetForm()
    {
        $this->title = '';
        $this->description = '';
        $this->image = null;
        $this->selectedItem = null;
        $this->imageName = null;
    }
}
