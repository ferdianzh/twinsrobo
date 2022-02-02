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
                <h6 class="m-0 font-weight-bold text-primary">Add New Siswa</h6>
            </div>
            <div class="card-body add-blog px-4 tambah-admin">
                <form action="/siswa/save" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>

                    <div class="input-group mb-3">

                        <input type="hidden" class="rounded-right form-control<?= ($validation->hasError('id_user')) ? ' is-invalid' : ''; ?>" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="nama_sekolah" value="<?= old('nama_sekolah'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_user'); ?>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Id User</label>
                        </div>
                        <select class="rounded-right custom-select <?= ($validation->hasError('id_user')) ? ' is-invalid' : ''; ?>" id="inputGroupSelect01" name="id_user">
                            <option value="<?= (old('id_user')) ? old('id_user') : ''; ?>" selected hidden><?= (old('id_user')) ? old('id_user') : 'Choose...'; ?></option>
                            <?php
                            foreach ($user as $user) :
                            ?>
                                <option value="<?= $user['id']; ?>"><?= $user['id'] . '. ' . $user['nama_depan'] . ' ' . $user['nama_belakang']; ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_user'); ?>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Nama Sekolah</span>
                        </div>
                        <input type="text" class="rounded-right form-control<?= ($validation->hasError('nama_sekolah')) ? ' is-invalid' : ''; ?>" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="nama_sekolah" value="<?= old('nama_sekolah'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_sekolah'); ?>
                        </div>
                    </div>

                    <input type="submit" value="Create" class="submit btn-save">
                    <a href="/admin/data_siswa" class="btn btn-danger back btn-back">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
<?= $this->endSection(); ?>