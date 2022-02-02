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
                <h6 class="m-0 font-weight-bold text-primary">Add New User</h6>
            </div>
            <div class="card-body add-blog px-4 tambah-user">
                <form action="/user/save" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Nama Depan</span>
                        </div>
                        <input type="text" class="rounded-right form-control<?= ($validation->hasError('nama_depan')) ? ' is-invalid' : ''; ?>" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="nama_depan" value="<?= old('nama_depan'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_depan'); ?>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Nama Belakang</span>
                        </div>
                        <input type="text" class="rounded-right form-control<?= ($validation->hasError('nama_belakang')) ? ' is-invalid' : ''; ?>" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="nama_belakang" value="<?= old('nama_belakang'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_belakang'); ?>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Email</span>
                        </div>
                        <input type="text" class="rounded-right form-control<?= ($validation->hasError('email')) ? ' is-invalid' : ''; ?>" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="email" value="<?= old('email'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('email'); ?>
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Password</span>
                        </div>
                        <input type="password" class="rounded-right form-control<?= ($validation->hasError('password')) ? ' is-invalid' : ''; ?>" placeholder="" id="user-password" aria-label="Username" aria-describedby="basic-addon1" name="password" value="<?= old('password'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('password'); ?>
                        </div>
                    </div>

                    <div class="form-group form-check ml-4 mb-3">
                        <input type="checkbox" class="form-check-input" id="showPassword">
                        <label class="form-check-label" for="exampleCheck1" id="label-password">Show Password</label>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Username</span>
                        </div>
                        <input type="text" class="rounded-right form-control<?= ($validation->hasError('username')) ? ' is-invalid' : ''; ?>" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="username" value="<?= old('username'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('username'); ?>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Tanggal Lahir</span>
                        </div>
                        <duet-date-picker name="tanggal_lahir" identifier="date" class="datepicker border rounded-right<?= ($validation->hasError('tanggal_lahir')) ? ' is-invalid' : ''; ?>" min="1980-01-01" value="<?= old('tanggal_lahir'); ?>" style="z-index: 2"></duet-date-picker>
                        <div class="invalid-feedback">
                            <?= $validation->getError('tanggal_lahir'); ?>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Jenis Kelamin</label>
                        </div>
                        <select class="rounded-right custom-select<?= ($validation->hasError('jenis_kelamin')) ? ' is-invalid' : ''; ?>" id="inputGroupSelect01" name="jenis_kelamin">
                            <option value="<?= (old('jenis_kelamin')) ? old('jenis_kelamin') : ''; ?>" selected hidden><?= (old('jenis_kelamin')) ? old('jenis_kelamin') : 'Choose...'; ?></option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('jenis_kelamin'); ?>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Phone</span>
                        </div>
                        <input type="number" class="rounded-right form-control<?= ($validation->hasError('phone')) ? ' is-invalid' : ''; ?>" placeholder="" aria-label="Phone" aria-describedby="basic-addon1" name="phone" value="<?= old('phone'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('phone'); ?>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Nationality</span>
                        </div>
                        <input type="text" class="rounded-right form-control<?= ($validation->hasError('nationality')) ? ' is-invalid' : ''; ?>" placeholder="" aria-label="Nationality" aria-describedby="basic-addon1" name="nationality" value="<?= old('nationality'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nationality'); ?>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Kota</span>
                        </div>
                        <input type="text" class="rounded-right form-control<?= ($validation->hasError('kota')) ? ' is-invalid' : ''; ?>" placeholder="" aria-label="Kota" aria-describedby="basic-addon1" name="kota" value="<?= old('kota'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('kota'); ?>
                        </div>
                    </div>

                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Upload Foto</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="rounded-right custom-file-input<?= ($validation->hasError('foto')) ? ' is-invalid' : ''; ?>" id="foto" aria-describedby="inputGroupFileAddon01" name="foto" onchange="previewImage()">
                            <div class="invalid-feedback invalid-foto">
                                <?= $validation->getError('foto'); ?>
                            </div>
                            <label class="custom-file-label" id="label-gambar" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                    <small id="passwordHelpBlock" class="form-text text-muted ml-3">
                        <li>ukuran gambar maksimal 1 mb.</li>
                    </small>
                    <div class="col-sm-2 mt-3">
                        <img src="/img/user/user.png" alt="" class="img-thumbnail img-preview">
                    </div>

                    <input type="submit" value="Create" class="submit btn-save">
                    <a href="/admin/data_users" class="btn btn-danger back btn-back">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="module" src="https://cdn.jsdelivr.net/npm/@duetds/date-picker@1.3.0/dist/duet/duet.esm.js"></script>
<script nomodule src="https://cdn.jsdelivr.net/npm/@duetds/date-picker@1.3.0/dist/duet/duet.js"></script>
<script>
    const chek_user = document.querySelector("#showPassword");
    const password_user = document.querySelector("#user-password");

    chek_user.addEventListener("click", showPassword);

    function showPassword() {
        if (this.checked) {
            password_user.type = "text";
        } else {
            password_user.type = "password";
        }
    }
</script>
<!-- End of Main Content -->
<?= $this->endSection(); ?>