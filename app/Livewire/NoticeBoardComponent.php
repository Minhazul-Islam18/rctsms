<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SiteNotice;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class NoticeBoardComponent extends Component
{
    use WithFileUploads;
    use WithPagination;
    use LivewireAlert;
    public $imageUrl;
    public $imageName;
    public $iteration;
    public $image;
    public $files;
    public $files_in_edit;
    public $notice;
    public $title;
    public $description;
    public $noticeId;
    public $willDeletenoticeId;
    public $editing = false;
    public $isOpen = false;
    protected $rules = [
        'title' => 'required',
        'files' => 'required',
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
        // $this->files = json_decode($ntc['files']);
        $this->files_in_edit = json_decode($ntc['files']);
    }
    public function cancelEdit()
    {
        $this->title = '';
        $this->description = '';
        $this->willDeletenoticeId = '';
        $this->editing = false;
        $this->noticeId = '';

        $this->files_in_edit = '';
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
        foreach ($this->files as $file) {
            $NewFileName = time() . '_' . $file->getClientOriginalName();
            $filos[] = $file->storeAs('frontend/files/notices', $NewFileName, 'public');
        }
        $rt = SiteNotice::create([
            'title' => $this->title,
            'description' => $this->description,
            'files' => json_encode($filos),
        ]);
        session()->flash('message', 'Notice created successfully.');

        // Reset input fields
        $this->title = '';
        $this->description = '';
        $this->files = '';
        $this->iteration++;
        $this->alert('success', 'Notice Created Successfully!');
    }
    public function updateNotice()
    {
        if ($this->files) {
            foreach ($this->files_in_edit as $file) {
                Storage::disk('public')->delete($file);
            }
            foreach ($this->files as $file) {
                $newImageName = time() . '_' . $file->getClientOriginalName();
                $filos[] = $file->storeAs('frontend/files/notices', $newImageName, 'public');
            }
        } else {
            $filos = $this->files_in_edit;
        }
        $notice = SiteNotice::find($this->noticeId);
        if ($notice) {
            $notice->update([
                'title' => $this->title,
                'description' => $this->description,
                'files' => json_encode($filos),
            ]);
        }

        $this->editing = false;
        $this->title = '';
        $this->description = '';
        $this->files = '';
        $this->iteration++;
        $this->alert('success', 'Notice Updated Successfully!');
    }
    public function deleteNotice()
    {
        $notice = SiteNotice::find($this->willDeletenoticeId);

        if ($notice) {
            if ($notice->files != null) {
                foreach (json_decode($notice->files) as $file) {
                    Storage::disk('public')->delete($file);
                }
            }

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
    public function downloadFile($filename)
    {
        $filePath = storage_path('app/public/' . $filename);
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
