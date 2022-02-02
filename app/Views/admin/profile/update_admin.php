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
                <h6 class="m-0 font-weight-bold text-primary">Update Admin</h6>
            </div>
            <div class="card-body add-blog px-4 tambah-admin">
                <form action="/admin/update/<?= $admin['id']; ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="passwordLama" value="<?= $admin['password']; ?>">
                    <input type="hidden" name="fotoLama" value="<?= $admin['foto']; ?>">
                    <input type="hidden" name="emailLama" value="<?= $admin['email']; ?>">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Nama</span>
                        </div>
                        <input type="text" class="rounded-right form-control<?= ($validation->hasError('nama')) ? ' is-invalid' : ''; ?>" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="nama" value="<?= (old('nama')) ? old('nama') : $admin['nama']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Email</span>
                        </div>
                        <input type="text" class="rounded-right form-control<?= ($validation->hasError('email')) ? ' is-invalid' : ''; ?>" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="email" value="<?= (old('email')) ? old('email') : $admin['email']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('email'); ?>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Password</span>
                        </div>
                        <input type="password" class="rounded-right form-control<?= ($validation->hasError('password')) ? ' is-invalid' : ''; ?>" placeholder="Change password" aria-label="Username" aria-describedby="basic-addon1" name="password">

                        <input type="password" class="rounded-right form-control<?= ($validation->hasError('password')) ? ' is-invalid' : ''; ?>" placeholder="Re-type password" aria-label="Username" aria-describedby="basic-addon1" name="repassword">
                        
                        <div class="invalid-feedback">
                            <?= $validation->getError('password'); ?>
                            <?= $validation->getError('repassword'); ?>
                        </div>
                    </div>

                    <?php if (session()->get('tipe_admin') == 'Super Admin') : ?>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Tipe Admin</label>
                        </div>
                        <select class="rounded-right custom-select <?= ($validation->hasError('tipe_admin')) ? ' is-invalid' : ''; ?>" id="inputGroupSelect01" name="tipe_admin">
                            <option value="<?= (old('tipe_admin')) ? old('tipe_admin') : $admin['tipe_admin']; ?>" selected hidden><?= (old('tipe_admin')) ? old('tipe_admin') : $admin['tipe_admin']; ?></option>
                            <option value="Super Admin">Super Admin</option>
                            <option value="Admin">Admin</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('tipe_admin'); ?>
                        </div>
                    </div>
                    <?php else : ?>
                        <input type="hidden" name="tipe_admin" value="<?= $admin['tipe_admin'] ?>">
                    <?php endif; ?>

                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Upload Foto</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="rounded-right custom-file-input <?= ($validation->hasError('foto')) ? ' is-invalid' : ''; ?>" id="foto" aria-describedby="inputGroupFileAddon01" name="foto" onchange="previewImage()" value="<?= (old('foto')) ? old('foto') : $admin['foto']; ?>">
                            <div class="invalid-feedback invalid-foto">
                                <?= $validation->getError(''); ?>
                            </div>
                            <label class="custom-file-label <?= ($validation->hasError('foto')) ? ' is-invalid' : ''; ?>" id="label-gambar" for="inputGroupFile01"><?= (old('foto')) ? old('foto') : $admin['foto']; ?></label>
                        </div>
                    </div>
                    <small id="passwordHelpBlock" class="form-text text-muted ml-3">
                        <li>ukuran gambar maksimal 5 mb.</li>
                    </small>
                    <div class="invalid-feedback">
                        <?= $validation->getError('foto'); ?>
                    </div>
                    <div class="col-sm-2 mt-2">
                        <img src="/img/admin/<?= $admin['foto']; ?>" alt="" class="img-thumbnail img-preview">
                    </div>

                    <input type="submit" value="Update" class="submit btn-save">
                    <a href="/admin/data_admin" class="btn btn-danger back btn-back">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
<?= $this->endSection(); ?>