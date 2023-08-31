<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SiteNotice;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class NoticeBoardComponent extends Component
{
    use WithFileUploads;
    use WithPagination;
    use LivewireAlert;
    public $imageUrl;
    public $imageName;
    public $iteration;
    public $image;
    public $notice;
    public $title;
    public $description;
    public $noticeId;
    public $willDeletenoticeId;
    public $editing = false;
    public $isOpen = false;
    protected $rules = [
        'title' => 'required',
        'description' => 'required',
    ];
    public function viewNotice($noticeId)
    {
        $this->noticeId = $noticeId;
        $this->isOpen = true;
    }
    public function closeModal()
    {
        $this->isOpen = false;
    }
    public function editNotice($noticeId)
    {
        $this->noticeId = $noticeId;
        $this->editing = true;
        $ntc = SiteNotice::find($this->noticeId);
        $this->title = $ntc->title;
        $this->description = $ntc->description;
        $this->imageUrl = $ntc->image;
    }
    public function cancelEdit()
    {
        $this->editing = false;
    }
    protected $listeners = ['confirmDelete'];

    public function confirmDelete($willDeletenoticeId)
    {
        $this->willDeletenoticeId = $willDeletenoticeId;
    }
    public function createNotice()
    {
        // dd($this->image);
        $this->validate();
        $image = $this->image;
        $myvalidate = Validator::make(["image" => $image], [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ])->validate();

        $newImageName = time() . '_' . $this->image->getClientOriginalName();

        $this->imageName = $this->image->storeAs('frontend/images/notice', $newImageName, 'public');

        $rt = SiteNotice::create([
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->imageName,
        ]);
        // dd($rt);
        session()->flash('message', 'Notice created successfully.');

        // Reset input fields
        $this->title = '';
        $this->description = '';
        $this->image = '';
        $this->iteration++;
        $this->alert('success', 'Notice Created Successfully!');
    }
    public function updateNotice()
    {
        $image = $this->image;
        $myvalidate = Validator::make(["image" => $image], [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ])->validate();

        $newImageName = time() . '_' . $this->image->getClientOriginalName();

        $this->imageName = $this->image->storeAs('frontend/images/notice', $newImageName, 'public');

        $notice = SiteNotice::find($this->noticeId);
        if ($this->image && $notice->image) {
            // Delete the old image
            $rt =  Storage::disk('public')->delete($notice->image);
            // dd($rt);
        }
        if ($notice) {
            $notice->update([
                'title' => $this->title,
                'description' => $this->description,
                'image' => $this->imageName,
            ]);
        }

        $this->editing = false;
        $this->title = '';
        $this->description = '';
        $this->image = '';
        $this->iteration++;
        $this->alert('success', 'Notice Updated Successfully!');
    }
    public function deleteNotice()
    {
        $notice = SiteNotice::find($this->willDeletenoticeId);

        if ($notice) {
            Storage::disk('public')->delete($notice->image);
            $notice->delete();
        }
        $this->willDeletenoticeId = '';

        // Reset the noticeId and editing state
        $this->noticeId = null;
        $this->editing = false;
        $this->alert('success', 'Notice Deleted Successfully!');
    }
    public function cancelDeleteNotice()
    {
        $this->willDeletenoticeId = '';
    }

    public function mount(SiteNotice $SiteNotice)
    {
        $this->notice = $notice ?? '';
        $this->title = $SiteNotice->title ?? '';
        $this->description = $SiteNotice->description ?? '';
    }

    public function render()
    {
        $notices = SiteNotice::paginate(8);
        $notice = SiteNotice::find($this->noticeId);
        // dd($notice);
        return view('livewire.notice-board-component', ['notice' => $notice, 'notices' => $notices]);
    }
}
