<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\VideoGallery;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class VideoGalleryComponent extends Component
{
    use LivewireAlert, WithPagination;
    #[Rule('nullable')]
    public $link;
    public $actions = [
        'id' => null,
        'preview' => false,
        'edit' => false
    ];
    public function store()
    {
        $this->validate();
        VideoGallery::create([
            'link' => $this->link
        ]);
        $this->resetAction();
        $this->alert('success', 'Video Gallery Record Created.');
    }
    function edit($id)
    {
        $this->actions['id'] = $id;
        $this->actions['edit'] = true;
        $ec = VideoGallery::find($this->actions['id']);
        $this->link = $ec->link;
    }

    public function update()
    {
        $this->validate();
        $ec = VideoGallery::find($this->actions['id']);
        $ec->update([
            'link' => $this->link
        ]);
        $this->resetAction();
        $this->alert('success', 'Video Gallery Record Updated.');
    }
    public function destroy($id)
    {
        $ec = VideoGallery::find($id);
        $ec->delete();
        $this->alert('success', 'Video Gallery Record Deleted.');
    }

    public function resetAction()
    {
        $this->link = null;
        $this->actions = [
            'id' => null,
            'preview' => false,
            'edit' => false
        ];
    }

    public function ReOrder($list)
    {
        foreach ($list as $data) {
            VideoGallery::findOrFail($data['value'])->update(['position' => $data['order']]);
        }
        $this->alert('success', 'Re-Ordered');
    }
    public function render()
    {
        $gallery = VideoGallery::orderBy('position', 'ASC')->paginate(8);
        return view('livewire.video-gallery-component', ['gallery' => $gallery]);
    }
}
