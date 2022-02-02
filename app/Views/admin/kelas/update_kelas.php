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
                <h6 class="m-0 font-weight-bold text-primary">Add New Kelas</h6>
            </div>
            <div class="card-body add-blog px-4 tambah-admin">
                <form action="/kelas/update/<?= $kelas['id']; ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>

                    <div class="input-group mb-3">

                        <input type="hidden" class="rounded-right form-control<?= ($validation->hasError('id_mentor')) ? ' is-invalid' : ''; ?>" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="nama_sekolah" value="<?= old('nama_sekolah'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_mentor'); ?>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Id Mentor</label>
                        </div>
                        <select class="rounded-right custom-select <?= ($validation->hasError('id_mentor')) ? ' is-invalid' : ''; ?>" id="inputGroupSelect01" name="id_mentor">
                            <option value="<?= (old('id_mentor')) ? old('id_mentor') : $kelas['id_mentor']; ?>" selected hidden><?= (old('id_mentor')) ? old('id_mentor') : $kelas['id_mentor'] . '. ' . $user_mentor['nama_depan'] . ' ' . $user_mentor['nama_belakang']; ?></option>
                            <?php
                            foreach ($mentor as $mentor) :
                                $dt_user = $user->where(['id' => $mentor['id_user']])->first();
                            ?>
                                <option value="<?= $mentor['id']; ?>"><?= $mentor['id'] . '. ' . $dt_user['nama_depan'] . ' ' . $dt_user['nama_belakang']; ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_mentor'); ?>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Nama Kelas</span>
                        </div>
                        <input type="text" class="rounded-right form-control<?= ($validation->hasError('nama_kelas')) ? ' is-invalid' : ''; ?>" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="nama_kelas" value="<?= (old('nama_kelas')) ? old('nama_kelas') : $kelas['nama_kelas']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_kelas'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" style="font-size: 16px;">Deskripsi</label>
                        <textarea class="form-deskripsi form-control text rounded<?= ($validation->getError('deskripsi')) ? ' is-invalid' : ''; ?>" id="exampleFormControlTextarea" name="deskripsi" rows="4"><?= (old('deskripsi')) ? old('deskripsi') : $kelas['deskripsi']; ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('deskripsi'); ?>
                        </div>
                    </div>

                    <input type="submit" value="Create" class="submit btn-save">
                    <a href="/admin/data_kelas" class="btn btn-danger back btn-back">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
<?= $this->endSection(); ?>