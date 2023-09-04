<?php

namespace App\Livewire\Frontend;

use App\Models\TeachingPermission;
use Livewire\Component;
use Livewire\Attributes\Layout;

class TeachingPermissionPageComponent extends Component
{
    #[Layout('livewire.frontend.layouts.common')]

    public function render()
    {
        $permissions = TeachingPermission::all();
        return view('livewire.frontend.teaching-permission-page-component', ['permissions' => $permissions]);
    }
}
