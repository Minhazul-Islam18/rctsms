<?php

namespace App\Livewire;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class PhotoGalleryComponent extends Component
{
    use WithFileUploads, LivewireAlert;
    public $items, $title, $description, $image, $selectedItem, $modal;
    public function render()
    {
        return view('livewire.photo-gallery-component');
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
            'image' => 'image|max:1024', // Adjust image validation rules as needed
        ]);

        $imagePath = $this->image->store('images'); // Store image in the 'images' directory

        GalleryItem::create([
            'title' => $this->title,
            'description' => $this->description,
            'image' => $imagePath,
        ]);

        $this->resetForm();
        $this->closeModal();
    }

    public function edit($id)
    {
        $item = GalleryItem::findOrFail($id);
        $this->selectedItem = $item;
        $this->title = $item->title;
        $this->description = $item->description;
        $this->openModal();
    }

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($this->selectedItem) {
            $item = GalleryItem::find($this->selectedItem->id);
            $item->update([
                'title' => $this->title,
                'description' => $this->description,
            ]);
            $this->resetForm();
            $this->closeModal();
        }
    }

    public function delete($id)
    {
        $item = PhotoGalleryComponent::findOrFail($id);
        $item->delete();
    }

    private function resetForm()
    {
        $this->title = '';
        $this->description = '';
        $this->image = null;
        $this->selectedItem = null;
    }
}
