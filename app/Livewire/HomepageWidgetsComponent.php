<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;
use App\Models\AboutSchoolWidget;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class HomepageWidgetsComponent extends Component
{
    use WithPagination, WithFileUploads, LivewireAlert;
    public $widget;
    public $updatedImg;
    public $iteration;
    public $imageName;
    public $image;
    public $widget_link_name;
    public $widget_links = [];
    public $rows = [];
    #[Rule('required')]
    public $widget_name;
    public $widget_url;
    public $widgetId;
    public $willDeleteWidgetId;
    public $editing = false;
    public function editWidget($widgetId)
    {
        $this->widgetId = $widgetId;
        $this->editing = true;
        $ntc = AboutSchoolWidget::find($this->widgetId);
        $this->widget_name = $ntc->title;
        $this->imageName = $ntc->image;
        $this->rows = json_decode($ntc->links);
        $this->rows = collect($this->rows)->map(function ($row, $index) {
            return [
                'text' => $row->text,
                'url' => $row->url,
            ];
        })->toArray();
    }
    public function cancelEdit()
    {
        $this->editing = false;
        $this->widgetId = '';
        $this->widget_name = '';
        $this->imageName = '';
        $this->rows = [];
    }
    protected $listeners = ['confirmDelete'];

    public function confirmDelete($willDeleteWidgetId)
    {
        $this->willDeleteWidgetId = $willDeleteWidgetId;
    }
    public function createWidget()
    {
        $this->validate();
        $newImageName = time() . '_' . $this->image->getClientOriginalName();
        $this->imageName = $this->image->storeAs('frontend/images/widget', $newImageName, 'public');
        $rt = AboutSchoolWidget::create([
            'title' => $this->widget_name,
            'image' => $this->imageName,
            'links' => json_encode($this->rows)
        ]);
        // Reset input fields
        $this->widget_name = null;
        $this->image = null;
        $this->imageName = null;
        $this->rows = [];
        $this->iteration++;
        $this->alert('success', 'widget Created Successfully!');
    }
    public function updateWidget()
    {

        // dd($this->rows);
        $this->validate();
        $widget = AboutSchoolWidget::find($this->widgetId);
        if ($this->image) {
            Storage::disk('public')->delete($widget->image);
            $newImageName = time() . '_' . $this->image->getClientOriginalName();
            $this->updatedImg = $this->image->storeAs('frontend/images/widget', $newImageName, 'public');
        } elseif ($this->imageName) {
            $this->updatedImg = $this->imageName;
        }
        if ($widget) {
            $widget->update([
                'title' => $this->widget_name,
                'image' => $this->updatedImg,
                'links' => json_encode($this->rows)
            ]);
        }
        // Reset input fields
        $this->widget_name = null;
        $this->image = null;
        $this->updatedImg = null;
        $this->imageName = null;
        $this->rows = [];
        $this->iteration++;
        $this->alert('success', 'Widget Updated Successfully!');
    }
    public function deleteWidget()
    {
        $widget = AboutSchoolWidget::find($this->willDeleteWidgetId);
        Storage::disk('public')->delete($widget->image);
        $widget->delete();
        $this->willDeleteWidgetId = '';

        // Reset the widgetId and editing state
        $this->widgetId = null;
        $this->editing = false;
        $this->alert('success', 'widget Deleted Successfully!');
    }
    public function cancelDeletewidget()
    {
        $this->willDeleteWidgetId = '';
    }
    public function render()
    {
        $widgets = AboutSchoolWidget::paginate(8);
        $widget = AboutSchoolWidget::find($this->widgetId);
        return view('livewire.homepage-widgets-component', [
            'widget' => $widget,
            'widgets' => $widgets
        ]);
    }
}
