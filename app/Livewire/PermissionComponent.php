<?php

namespace App\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    // #[Rule('required|min:3|max:50')]
    public $acceptPermissions;
    public $Permission;
    public $WillUpdate;
    public $WillUpdateRole;
    public $editing = false;
    public function toggleIsActive()
    {
        $this->editing = !$this->editing;
    }
    public function createNew()
    {

        $this->validate([
            'Permission' => 'required|min:3|max:50'
        ]);
        Permission::create(['name' => $this->Permission]);
        $this->reset('Permission');
        session()->flash('success', 'Permission Created Successfully');
    }
    public function edit($id)
    {
        // Fetch the post for editing
        $this->WillUpdate = Permission::find($id);
        // dd($this->WillUpdate->name);
        $this->Permission = $this->WillUpdate->name;
        $this->editing = true;
    }
    public function editRoleWithPermission($id)
    {
        // Fetch the post for editing
        $this->WillUpdate = Role::find($id);
        // dd($this->WillUpdate->name);
        $this->Permission = $this->WillUpdate->name;
        $this->editing = true;
    }
    public function updateRoleWithPermission(Request $request)
    {
        // dd($this->WillUpdate->id);
        $role = Role::find($this->WillUpdate->id);
        // dd($role);
        $role->givePermissionTo($this->acceptPermissions);
        $this->reset($this->WillUpdate);
        $this->reset($this->acceptPermissions);
        $this->editing = false;
    }
    public function update()
    {
        // Validation and update logic
        $this->validate([
            'Permission' => 'required|min:3|max:50'
        ]);

        $this->WillUpdate->update([
            'name' => $this->Permission,
            'guard_name' => 'web',
        ]);
        $this->reset('Permission');
        session()->flash('success', 'Permission Updated Successfully');
    }
    public function delete($id)
    {
        // Delete logic
        Permission::destroy($id);
        session()->flash('success', 'Permission Deleted Successfully');
    }
    public function render()
    {
        $permissions = Permission::paginate(5);
        $roles = Role::with('permissions')->paginate(5);
        return view('livewire.permission-component', compact('permissions', 'roles'));
    }
}
