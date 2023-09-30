<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SiteMenu;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class HeaderMenuComponent extends Component
{
    use LivewireAlert;
    public $iteration;
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
    public function ReOrder($list)
    {
        foreach ($list as $data) {
            SiteMenu::findOrFail($data['value'])->update(['position' => $data['order']]);
        }
        $this->alert('success', 'Re-Ordered');
    }
    public function render()
    {
        $menus = SiteMenu::whereNull('parent_id')->with('submenus')->orderBy('position', 'ASC')->get();
        return view('livewire.header-menu-component', compact('menus'));
    }
}
