<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class CreateRole extends Component
{
    use WithPagination;
    // #[Rule('required|min:3|max:50')]
    public $rolePermission;
    public $giveRole = '';
    public $RoleName;
    public $WillUpdate;
    public $WillUpdateRole;
    public $editing = false;

    function cancel()
    {
        $this->editing = false;
    }

    public function createNew()
    {
        $this->validate([
            'RoleName' => 'required|min:3|max:50',
            'rolePermission' => 'required'
        ]);
        $role = Role::create(['name' => $this->RoleName, 'guard_name' => 'web']);
        $role->syncPermissions($this->rolePermission);
        $this->reset('RoleName');
        $this->reset('rolePermission');
        session()->flash('success', 'Role Created Successfully');
    }
    public function edit($id)
    {
        // Fetch the post for editing
        $this->WillUpdate = Role::find($id);
        $this->RoleName = $this->WillUpdate->name;
        $this->editing = true;
    }
    public function update()
    {
        // Validation and update logic
        $this->validate([
            'RoleName' => 'required|min:3|max:50'
        ]);

        $role =  $this->WillUpdate->update([
            'name' => $this->RoleName
        ]);
        $this->WillUpdate->syncPermissions($this->rolePermission);
        $this->reset('RoleName');
        $this->reset('rolePermission');
        session()->flash('success', 'Role Updated Successfully');
    }

    public function userEdit($id)
    {
        // Fetch the post for editing
        $this->WillUpdate = User::find($id);
        $this->RoleName = $this->WillUpdate->name;
        $this->editing = true;
    }
    public function updateUser()
    {
        // Validation and update logic
        $this->validate([
            'giveRole' => 'required'
        ]);
        $this->WillUpdate->syncRoles($this->giveRole);
        $this->reset('giveRole');
        session()->flash('successfully_assigned_role', 'User Updated Successfully');
    }
    public function delete($id)
    {
        // Delete logic
        Role::destroy($id);
        session()->flash('success', 'Role Deleted Successfully');
    }
    public function render()
    {
        $roles = Role::paginate(7);
        $giveroles = Role::all();
        $users = User::with('roles')->paginate(7);
        $permissions = Permission::all();
        return view('livewire.create-role', compact('roles', 'users', 'giveroles', 'permissions'));
    }
}
