<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ImportantLink;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ImportantLinksComponent extends Component
{
    use WithPagination, LivewireAlert;
    public $link;
    public $link_name;
    public $link_url;
    public $linkId;
    public $willDeleteLinkId;
    public $editing = false;
    // public ImportantLink $ImportantLink;

    // protected $rules = [
    //     'ImportantLink.link_name' => 'required|min:5',
    //     'ImportantLink.link_url' => 'required'
    // ];
    public function editLink($linkId)
    {
        $this->linkId = $linkId;
        $this->editing = true;
        $ntc = ImportantLink::find($this->linkId);
        $this->link_name = $ntc->link_name;
        $this->link_url = $ntc->link_url;
    }
    public function cancelEdit()
    {
        $this->editing = false;
    }
    protected $listeners = ['confirmDelete'];

    public function confirmDelete($Id)
    {
        // dd($this->willDeleteLinkId);
        $this->willDeleteLinkId = $Id;
    }
    public function createLink()
    {
        $this->validate([
            'link_name' => 'required|min:5',
            'link_url' => 'required'
        ]);
        $rt = ImportantLink::create([
            'link_name' => $this->link_name,
            'link_url' => $this->link_url
        ]);
        // Reset input fields
        $this->link_name = '';
        $this->link_url = '';
        $this->alert('success', 'Link Created Successfully!');
    }
    public function updateLink()
    {
        $Link = ImportantLink::find($this->linkId);

        if ($Link) {
            $Link->update([
                'link_name' => $this->link_name,
                'link_url' => $this->link_url,
            ]);
        }

        $this->editing = false;
        $this->link_name = '';
        $this->link_url = '';
        $this->alert('success', 'Link Updated Successfully!');
    }
    public function deleteLink()
    {
        $Link = ImportantLink::find($this->willDeleteLinkId);
        $Link->delete();
        $this->willDeleteLinkId = '';

        // Reset the LinkId and editing state
        $this->linkId = null;
        $this->editing = false;
        $this->alert('success', 'Link Deleted Successfully!');
    }
    public function cancelDeleteLink()
    {
        $this->willDeleteLinkId = '';
    }
    public function ReOrder($list)
    {
        foreach ($list as $data) {
            ImportantLink::findOrFail($data['value'])->update(['position' => $data['order']]);
        }
        $this->alert('success', 'Re-Ordered');
    }
    public function render()
    {
        $links = ImportantLink::orderBy('position')->get();
        return view('livewire.important-links-component', [
            'links' => $links
        ]);
    }
}
