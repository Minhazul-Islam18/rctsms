@section('page-title')
    {{ 'Settings - Role settings' }}
@endsection
<div>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Roles</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-7 col-sm-12 col-lg-7 order-2 order-md-1">
                    @if (session('success') || session('update_role'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                            <strong>{{ session('success') }}</strong>
                        </div>
                    @endif
                    @error('RoleName')
                        <div class="alert alert-warning" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                    @error('rolePermission')
                        <div class="alert alert-warning" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Role</th>
                                <th scope="col">Permissions</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @php
                                            $Ppermissions = $role->permissions;
                                            $permissionNames = $Ppermissions->pluck('name');
                                            $permissionNamesArray = $permissionNames->toArray();
                                        @endphp
                                        @foreach ($permissionNamesArray as $item)
                                            <span class="badge text-bg-warning">{{ $item }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <button class="btn btn-info" wire:click="edit({{ $role->id }})"><i
                                                data-acorn-icon="edit" class="icon me-2"
                                                data-acorn-size="18"></i>Edit</button>
                                        <button class="btn btn-danger" wire:click="delete({{ $role->id }})"><i
                                                data-acorn-icon="bin" class="icon me-2"
                                                data-acorn-size="18"></i>Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                            {{ $roles->links() }}
                        </tbody>
                    </table>
                </div>
                <div class="col-12 col-md-5 col-sm-12 col-lg-5 order-1 order-md-2">
                    <form wire:submit.prevent="{{ $editing ? 'update' : 'createNew' }}">
                        <label for="RoleName" class="form-label">Role name</label>
                        <input type="text" class="form-control" wire:model="RoleName" placeholder="">
                        <div class="mt-3">
                            <label for="" class="form-label">Permissions</label>
                            <select multiple class="form-select form-select-lg" wire:model="rolePermission"
                                id="">
                                @foreach ($permissions as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-success mt-2"
                            type="submit">{{ $editing ? 'Update' : 'Create' }}</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <div class="card mt-3">
        <div class="card-header">
            <h5 class="mb-0">Users</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-7 col-sm-12 col-lg-7">
                    @if (session('successfully_assigned_role'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>

                            <strong>{{ session('successfully_assigned_role') }}</strong>
                        </div>
                    @endif
                    @error('RoleName')
                        <div class="alert alert-warning" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">User</th>
                                <th scope="col">Role</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        @foreach ($user->roles as $role)
                                            {{ $role->name }}
                                        @endforeach
                                    </td>
                                    <td>
                                        <button class="btn btn-info" wire:click="userEdit({{ $user->id }})"><i
                                                data-acorn-icon="edit" class="icon me-2"
                                                data-acorn-size="18"></i>Edit</button>
                                        <button class="btn btn-danger" wire:click="delete({{ $user->id }})"><i
                                                data-acorn-icon="bin" class="icon me-2"
                                                data-acorn-size="18"></i>Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                            {{ $users->links() }}
                        </tbody>
                    </table>
                </div>
                <div class="col-12 col-md-5 col-sm-12 col-lg-5">
                    @if ($editing)
                        <form wire:submit.prevent="{{ $editing ? 'updateUser' : 'createNew' }}">
                            <label for="RoleName" class="form-label">Role name</label>
                            <input type="text" class="form-control" wire:model="RoleName" placeholder="">
                            <select class="form-select form-select-lg mt-2" wire:model="giveRole" id="">
                                <option selected>Select one</option>
                                @foreach ($giveroles as $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-success mt-2"
                                type="submit">{{ $editing ? 'Update' : 'Create' }}</button>
                            <button type="button" wire:click='cancel()' class="btn btn-primary">Cancel</button>
                        </form>
                    @endif

                </div>
            </div>

        </div>
    </div>
</div>
