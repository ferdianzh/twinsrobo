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
                <h6 class="m-0 font-weight-bold text-primary">Add New Rekening</h6>
            </div>
            <div class="card-body add-blog px-4 tambah-admin">
                <form action="/atm/save" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">ID Siswa</label>
                        </div>
                        <select class="rounded-right custom-select <?= ($validation->hasError('id_siswa')) ? ' is-invalid' : ''; ?>" id="inputGroupSelect01" name="id_siswa">
                            <option value="<?= (old('id_siswa')) ? old('id_siswa') : ''; ?>" selected hidden><?= (old('id_siswa')) ? old('id_siswa') : 'Choose...'; ?></option>
                            <?php
                            foreach ($siswa as $sis) :
                            ?>
                                <option value="<?= $sis['id_siswa']; ?>"><?= $sis['id_siswa'] . '. ' . $sis['nama_depan'] . ' ' . $sis['nama_belakang']; ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_siswa'); ?>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Nama Bank</label>
                        </div>
                        <select class="rounded-right custom-select <?= ($validation->hasError('nama_bank')) ? ' is-invalid' : ''; ?>" id="inputGroupSelect01" name="nama_bank">
                            <option value="<?= (old('nama_bank')) ? old('nama_bank') : ''; ?>" selected hidden><?= (old('nama_bank')) ? old('nama_bank') : 'Choose...'; ?></option>
                            <?php
                            foreach ($banks as $bank) :
                            ?>
                                <option value="<?= $bank['code'] ?>"><?= $bank['name'] ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_bank'); ?>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">No.Rekening</span>
                        </div>
                        <input type="text" class="rounded-right form-control<?= ($validation->hasError('no_rekening')) ? ' is-invalid' : ''; ?>" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="no_rekening" value="<?= old('no_rekening'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('no_rekening'); ?>
                        </div>
                    </div>

                    <input type="submit" value="Create" class="submit btn-save">
                    <a href="/admin/data_atm" class="btn btn-danger back btn-back">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
<?= $this->endSection(); ?>