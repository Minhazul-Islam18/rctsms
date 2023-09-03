<?php

namespace App\Livewire;

use App\Models\FooterWidget1;
use App\Models\FooterWidget2;
use Livewire\Component;
use App\Models\SiteMenu;
use App\Models\HeaderSetting;
use App\Models\HomepageSlider;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;

class HeaderFooterSettingsComponent extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    public $imageName;
    public $image;
    public $iteration;
    public $menuId;
    public $name;
    public $url;
    public $parentId;
    #[Rule('required')]
    public $FW1status;
    #[Rule('required|min:3', onUpdate: false)]
    public $FW1title;
    #[Rule('required|min:3', onUpdate: false)]
    public $FW1smr_text;
    #[Rule('required')]
    public $FW2status;
    #[Rule('required|min:3', onUpdate: false)]
    public $FW2title;
    #[Rule('required|min:3', onUpdate: false)]
    public $FW2smr_text;

    public function createMenu()
    {
        if ($this->parentId) {
            $parent = SiteMenu::findOrFail($this->parentId);
            $submenu = $parent->submenus()->create([
                'name' => $this->name,
                'url' => $this->url,
            ]);
        } else {
            SiteMenu::create([
                'name' => $this->name,
                'url' => $this->url,
            ]);
        }

        $this->resetFields();
    }

    public function editMenu($id)
    {
        $menu = SiteMenu::findOrFail($id);
        $this->menuId = $menu->id;
        $this->name = $menu->name;
        $this->url = $menu->url;
    }

    public function updateMenu()
    {
        $menu = SiteMenu::findOrFail($this->menuId);
        $menu->update([
            'name' => $this->name,
            'url' => $this->url,
        ]);

        $this->resetFields();
    }

    public function deleteMenu($id)
    {
        $menu = SiteMenu::findOrFail($id);
        $menu->delete();
    }
    public function editSubmenu($id)
    {
        $submenu = SiteMenu::findOrFail($id);
        $this->menuId = $submenu->id;
        $this->parentId = $submenu->parent_id;
        $this->name = $submenu->name;
        $this->url = $submenu->url;
    }

    public function updateSubmenu()
    {
        $submenu = SiteMenu::findOrFail($this->menuId);
        $submenu->update([
            'name' => $this->name,
            'url' => $this->url,
        ]);

        $this->resetFields();
    }

    public function deleteSubmenu($id)
    {
        $submenu = SiteMenu::findOrFail($id);
        $submenu->delete();
    }
    public function cancel()
    {
        return $this->menuId; //annonymously works after added this line!
        $this->resetFields();
    }
    public function resetFields()
    {
        $this->menuId = null;
        $this->name = '';
        $this->url = '';
        $this->parentId = null;
    }

    //delete header image
    public function deleteImage($imageId)
    {
        $image = HeaderSetting::findOrFail($imageId);
        $img_deletable = $image->header_image;
        // Delete from the database
        $image->delete();
        // Delete from the folder
        Storage::disk('public')->delete($img_deletable);
        $this->reset(['image']);
        $this->reset(['imageName']);
    }
    //upload header image
    public function uploadImage()
    {
        // dump($this->image = '');
        $image = $this->image;
        $myvalidate = Validator::make(["image" => $image], [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ])->validate();

        $newImageName = time() . '_' . $this->image->getClientOriginalName();

        $this->imageName = $this->image->storeAs('frontend/images', $newImageName, 'public');

        $if_exist = HeaderSetting::first();
        if ($if_exist) {
            $if_exist->update(
                ['header_image' => $this->imageName]
            );
        } else {
            $settingsUPdate =  HeaderSetting::create(['header_image' => $this->imageName]);
        }

        if (isset($settingsUPdate) || $if_exist) {
            $this->image = null;
            $this->iteration++;
            $this->resetValidation(['image']);


            $this->imageName = null;
            $this->alert('success', 'Header Image Uploaded Successfully!');
        }
    }

    //footer widget
    public function footerWidget($widget = null)
    {
        // dd($this->FW1smr_text);
        if ($widget == 1) {
            $row = FooterWidget1::first();

            if ($row) {
                $row->update([
                    'status' => $this->FW1status,
                    'title' => $this->FW1title,
                    'text' => $this->FW1smr_text,
                ]);
            } else {
                FooterWidget1::create([
                    'status' => $this->FW1status,
                    'title' => $this->FW1title,
                    'text' => $this->FW1smr_text,
                ]);
            }
        } elseif ($widget == 2) {
            // dd($this->FW2smr_text);
            $row = FooterWidget2::first();
            if ($row) {
                $row->update([
                    'status' => $this->FW2status,
                    'title' => $this->FW2title,
                    'text' => $this->FW2smr_text,
                ]);
            } else {
                FooterWidget2::create([
                    'status' => $this->FW2status,
                    'title' => $this->FW2title,
                    'text' => $this->FW2smr_text,
                ]);
            }
        }
        // Reset the form fields
        $this->FW1status = '';
        $this->FW1title = '';
        $this->FW1smr_text = '';
        $this->FW1status = '';
        $this->FW2title = '';
        $this->FW2smr_text = '';
        $this->alert('success', 'Widget ' . $widget . 'Updated Successfully!');
    }
    public function mount()
    {
        $FW1 = FooterWidget1::first();
        $FW2 = FooterWidget2::first();
        if ($FW2) {
            $this->FW2status = $FW2->status ?? '';
            $this->FW2title = $FW2->title ?? '';
            $this->FW2smr_text = $FW2->text ?? '';
        }

        if ($FW1) {
            $this->FW1status = $FW1->status ?? '';
            $this->FW1title = $FW1->title ?? '';
            $this->FW1smr_text = $FW1->text ?? '';
        }
    }
    public function render()
    {
        $menus = SiteMenu::whereNull('parent_id')->with('submenus')->get();
        $header_image = HeaderSetting::first();
        return view('livewire.header-footer-settings-component', compact('menus', 'header_image'));
    }
}
