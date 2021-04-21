<?= $this->extend('templates/index'); ?>

<?= $this->section('section'); ?>
<!-- Begin Page Content -->
<!-- add admin -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<div class="row">

    <div class="col-sm-12">

        <!-- Circle Buttons -->
        <div class="card shadow mb-4 card-data">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add New Admin</h6>
            </div>
            <div class="card-body add-blog px-4 tambah-admin">
                <form action="/admin/save" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Nama</span>
                        </div>
                        <input type="text" class="rounded-right form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="nama" value="<?= old('nama'); ?>">
                        <div class="invalid-feedback">

                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Email</span>
                        </div>
                        <input type="text" class="rounded-right form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="email" value="<?= old('email'); ?>">
                        <div class="invalid-feedback">

                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Password</span>
                        </div>
                        <input type="password" class="rounded-right form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="password" value="<?= old('password'); ?>">
                        <div class="invalid-feedback">

                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Tipe Admin</label>
                        </div>
                        <select class="rounded-right custom-select" id="inputGroupSelect01" name="tipe_admin">
                            <option value="<?= (old('tipe_admin')) ? old('tipe_admin') : ''; ?>" selected hidden><?= (old('tipe_admin')) ? old('tipe_admin') : 'Choose...'; ?></option>
                            <option value="Super Admin">Super Admin</option>
                            <option value="Admin">Admin</option>
                        </select>
                        <div class="invalid-feedback">

                        </div>
                    </div>

                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Upload Foto</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="rounded-right custom-file-input" id="foto" aria-describedby="inputGroupFileAddon01" name="foto" onchange="previewImage()">
                            <div class="invalid-feedback invalid-foto">

                            </div>
                            <label class="custom-file-label" id="label-gambar" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                    <small id="passwordHelpBlock" class="form-text text-muted ml-3">
                        <li>ukuran gambar maksimal 1 mb.</li>
                    </small>
                    <div class="col-sm-2 mt-2">
                        <img src="/assets/img/admin/customer-service.png" alt="" class="img-thumbnail img-preview">
                    </div>

                    <input type="submit" value="Create" class="submit btn-save">
                    <a href="/data_admin" class="btn btn-danger back btn-back">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
<?= $this->endSection(); ?>