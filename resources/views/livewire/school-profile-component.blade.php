    @section('page-title')
        {{ 'Settings-School Profile' }}
    @endsection

    <div>
        <form action="" wire:submit='SaveGeneralSettings'>
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="h5 m-0">
                        General Information
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                <div class="card-body">
                    <div class="row g-2">
                        <div class="col-12 col-md-6 col-sm-12">
                            <div class="">
                                <label for="" class="form-label">School Name</label>
                                <input type="text" class="form-control" name="" id=""
                                    wire:model.delay.blur='settings.school_name' placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="" class="form-label">Location <sub>(Place Embeded Code
                                        Here.)</sub></label>
                                <textarea class="form-control" wire:model.delay.blur='settings.location' name="" id="" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-sm-12">
                            <div class="">
                                <label for="" class="form-label">Established At</label>
                                <input type="text" class="form-control" name="" id=""
                                    wire:model.delay.blur='settings.established_at' placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-sm-12">
                            <div class="">
                                <label for="" class="form-label">EIIN no.</label>
                                <input type="text" class="form-control" name="" id=""
                                    wire:model.delay.blur='settings.eiin' placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-sm-12">
                            <div class="">
                                <label for="" class="form-label">Domain <sub>(https://domain.com)</sub></label>
                                <input type="text" class="form-control" name="" id=""
                                    wire:model.delay.blur='settings.domain' placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-sm-12">
                            <div class="">
                                <label for="" class="form-label">Contact Number</label>
                                <input type="text" class="form-control" name="" id=""
                                    wire:model.delay.blur='settings.contact_number' placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-sm-12">
                            <div class="">
                                <label for="" class="form-label">Contact Mail</label>
                                <input type="text" class="form-control" name="" id=""
                                    wire:model.delay.blur='settings.contact_mail' placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="" class="form-label">Address</label>
                                <textarea class="form-control" wire:model.delay.blur='settings.address' name="" id="" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="" class="form-label">History</label>
                                <textarea class="form-control" wire:model.delay.blur='settings.history' name="" id="" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="" class="form-label">History image</label>
                                <input type="file" class="form-control"
                                    wire:model.defer.blur="settings.history_image" id="">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>

                </div>
            </div>
        </form>
    </div>
