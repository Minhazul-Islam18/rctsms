<div>
    <div class="card">
        <div class="card-body">
            <form class="row g-3 needs-validation" action="" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <div class="py-3">
                                <label for="" class="form-label">Logo</label>
                                <input type="file" class="form-control" name="" id="" placeholder=""
                                    aria-describedby="fileHelpId">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="py-3">
                                <label for="" class="form-label">Favicon</label>
                                <input type="file" class="form-control" name="" id="" placeholder=""
                                    aria-describedby="fileHelpId">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Site Title</label>
                    <input type="text" class="form-control" id="validationCustom01" value="Mark" required>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom02" class="form-label">Site Motto</label>
                    <input type="text" class="form-control" id="validationCustom02" value="Otto" required>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Meta Title</label>
                    <input type="text" class="form-control" id="validationCustom01" value="Mark" required>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom02" class="form-label">Meta Description</label>
                    <textarea class="form-control" name="" id="" rows="3"></textarea>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card mt-md-3 mt-sm-2 mt-2">
        <div class="card-body">
            <form class="row g-3 needs-validation" action="" enctype="multipart/form-data">
                @csrf
                <div class="col-4 col-sm-12 col-md-4">
                    <label for="summernote">
                        Cookie Banner text
                    </label>
                </div>
                <div class="col-8 col-sm-12 col-md-8">
                    <div class="wrapper-editor">
                        <div id="summernote"></div>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
