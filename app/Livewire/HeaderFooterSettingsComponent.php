<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SiteMenu;
use App\Models\HeaderSetting;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class HeaderFooterSettingsComponent extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    public $imageName;
    public $image;
    public $menuId;
    public $name;
    public $url;
    public $parentId;
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
        $this->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        // Generate a new image name
        $newImageName = time() . '_' . $this->image->getClientOriginalName();

        $this->imageName = $this->image->storeAs('frontend/images', $newImageName, 'public');
        // dd($this->imageName);
        $if_exist = HeaderSetting::first();
        if ($if_exist) {
            $if_exist->update(
                ['header_image' => $this->imageName]
            );
        } else {
            HeaderSetting::create(['header_image' => $this->imageName]);
        }
        $this->reset(['image']);
        $this->imageName = null;
        $this->alert('success', 'Header Image Uploaded Successfully!');
    }
    public function render()
    {
        $menus = SiteMenu::whereNull('parent_id')->with('submenus')->get();
        $header_image = HeaderSetting::first();
        return view('livewire.header-footer-settings-component', compact('menus', 'header_image'));
    }
}
