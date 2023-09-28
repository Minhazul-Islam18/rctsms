<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SiteNotice;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\SiteNoticeCategory;
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
    public $Vnotice;
    public $title;
    public $description;
    public $notice_category_id;
    public $noticeId;
    public $noticeCategoryId;
    public $willDeletenoticeId;
    public $editing = false;
    public $editingCategory = false;
    public $isOpen = false;
    public $category_name = null;
    protected $rules = [
        'title' => 'required',
        'files' => 'required',
    ];
    public function viewNotice($noticeId)
    {
        $this->noticeId = $noticeId;
        $this->Vnotice = SiteNotice::find($this->noticeId);
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
        $this->notice_category_id = $ntc->site_notice_category_id;
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
        $this->validate();
        foreach ($this->files as $file) {
            $NewFileName = time() . '_' . $file->getClientOriginalName();
            $filos[] = $file->storeAs('frontend/files/notices', $NewFileName, 'public');
        }
        $rt = SiteNotice::create([
            'site_notice_category_id' => $this->notice_category_id,
            'title' => $this->title,
            'description' => $this->description,
            'files' => json_encode($filos),
        ]);

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
                'site_notice_category_id' => $this->notice_category_id,
                'title' => $this->title,
                'description' => $this->description,
                'files' => json_encode($filos),
            ]);
        }

        $this->editing = false;
        $this->title = '';
        $this->notice_category_id = '';
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

    public function createNoticeCategory()
    {
        SiteNoticeCategory::create([
            'category_name' => $this->category_name,
            'category_slug' => Str::slug($this->category_name),
        ]);
        // Reset input fields
        $this->category_name = '';
        $this->alert('success', 'Notice Created Successfully!');
    }
    public function editNoticeCategory($noticeCategoryId)
    {
        $this->noticeCategoryId = $noticeCategoryId;
        $this->editingCategory = true;
        $ntc = SiteNoticeCategory::find($this->noticeCategoryId);
        $this->category_name = $ntc->category_name;
    }
    public function updateNoticeCategory()
    {
        $noticeCategory = SiteNoticeCategory::find($this->noticeCategoryId);
        if ($noticeCategory) {
            $noticeCategory->update([
                'category_name' => $this->category_name,
                'category_slug' => Str::slug($this->category_name),
            ]);
        }
        $this->category_name = '';
        $this->editingCategory = false;
        $this->alert('success', 'Notice Updated Successfully!');
    }
    public function deleteNoticeCategory($Id)
    {
        $notice = SiteNoticeCategory::find($Id);
        $notice->delete();

        $this->alert('success', 'Notice Deleted Successfully!');
    }
    public function cancelDeleteNotice()
    {
        $this->willDeletenoticeId = '';
    }
    public function downloadFile($filename)
    {
        if (Storage::disk('public')->exists($filename)) {
            $thisFile = Storage::disk('public')->path($filename);
            return response()->download($thisFile);
        }
        return abort(404);
    }
    public function mount(SiteNotice $SiteNotice)
    {
        $this->notice = $notice ?? '';
        $this->title = $SiteNotice->title ?? '';
        $this->description = $SiteNotice->description ?? '';
    }
    public function ReOrder($list)
    {
        foreach ($list as $data) {
            SiteNotice::findOrFail($data['value'])->update(['position' => $data['order']]);
        }
        $this->alert('success', 'Re-Ordered');
    }
    public function ReOrderCategory($list)
    {
        foreach ($list as $data) {
            SiteNoticeCategory::findOrFail($data['value'])->update(['position' => $data['order']]);
        }
        $this->alert('success', 'Re-Ordered');
    }
    public function render()
    {
        $notices = SiteNotice::orderBy('position')->paginate(8);
        $nCategories = SiteNoticeCategory::orderBy('position')->paginate(8);
        return view('livewire.notice-board-component', ['nCategories' => $nCategories, 'notices' => $notices]);
    }
}
