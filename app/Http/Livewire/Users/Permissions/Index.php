<?php

namespace App\Http\Livewire\Users\Permissions;

use Livewire\Component;
use Livewire\WithPagination;

use Spatie\Permission\Models\Permission;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        $permissions = Permission::paginate(10);
        return view('livewire.users.permissions.index', compact('permissions'));
    }
}
