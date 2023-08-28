<div>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Permissions</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-7">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                            <strong>{{ session('success') }}</strong>
                        </div>
                    @endif
                    @error('Permission')
                        <div class="alert alert-warning" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Permission</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->id }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>
                                        <button class="btn btn-info" wire:click="edit({{ $permission->id }})"><i
                                                data-acorn-icon="edit" class="icon me-2"
                                                data-acorn-size="18"></i>Edit</button>
                                        <button class="btn btn-danger" wire:click="delete({{ $permission->id }})"><i
                                                data-acorn-icon="bin" class="icon me-2"
                                                data-acorn-size="18"></i>Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $permissions->links() }}
                    </div>
                </div>
                <div class="col-5">
                    <form wire:submit.prevent="{{ $editing ? 'update' : 'createNew' }}">
                        <label for="RoleName" class="form-label">Permission</label>
                        <input type="text" class="form-control" wire:model="Permission" placeholder="">
                        <button class="btn btn-success mt-2"
                            type="submit">{{ $editing ? 'Update' : 'Create' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="m-0">Permission Assign to Role</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-7">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>

                            <strong>{{ session('success') }}</strong>
                        </div>
                    @endif
                    @error('Permission')
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
                            @foreach ($roles as $rl)
                                <tr>
                                    <td>{{ $rl->id }}</td>
                                    <td>{{ $rl->name }}</td>
                                    <td>
                                        @foreach ($rl->permissions as $item)
                                            <span class="badge text-bg-warning">{{ $item->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <button class="btn btn-info"
                                            wire:click="editRoleWithPermission({{ $rl->id }})"><i
                                                data-acorn-icon="edit" class="icon me-2"
                                                data-acorn-size="18"></i>Edit</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $roles->links() }}
                    </div>
                </div>
                <div class="col-5">
                    <form wire:submit.prevent="{{ $editing ? 'updateRoleWithPermission' : 'createNew' }}">
                        <label for="RoleName" class="form-label">Permission</label>
                        <input type="text" class="form-control" wire:model="Permission" placeholder="">
                        @if ($editing)
                            <div class="mt-3">
                                <label for="" class="form-label">Permissions</label>
                                <select multiple class="form-select form-select-lg" wire:model="acceptPermissions"
                                    id="">
                                    <option selected>Select one</option>
                                    @foreach ($permissions as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif

                        <button class="btn btn-success mt-2"
                            type="submit">{{ $editing ? 'Update' : 'Create' }}</button>
                        @if ($editing)
                            <button class="btn btn-success mt-2"
                                wire:click="toggleIsActive">{{ __('Cancel') }}</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
