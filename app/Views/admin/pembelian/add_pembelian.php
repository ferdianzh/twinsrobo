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
                <form action="/pembelian/save" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Siswa</label>
                        </div>
                        <select class="rounded-right custom-select <?= ($validation->hasError('id_siswa')) ? ' is-invalid' : ''; ?>" id="inputGroupSelect01" name="id_siswa">
                            <option value="<?= (old('id_siswa')) ? old('id_siswa') : ''; ?>" selected hidden><?= (old('id_siswa')) ? old('id_siswa') : 'Choose...'; ?></option>
                            <?php
                            foreach ($siswa as $sis) :
                            ?>
                                <option value="<?= $sis['id_siswa']; ?>"><?= $sis['id_siswa'] . ' - ' . $sis['email']; ?></option>
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
                            <label class="input-group-text" for="inputGroupSelect01">Modul</label>
                        </div>
                        <select class="rounded-right custom-select <?= ($validation->hasError('id_modul')) ? ' is-invalid' : ''; ?>" id="inputGroupSelect01" name="id_modul[]" multiple>
                            <option value="<?= (old('id_modul[]')) ? old('id_modul[]') : ''; ?>" selected hidden><?= (old('id_modul[]')) ? old('id_modul[]') : 'Choose...'; ?></option>
                            <?php
                            foreach ($modul as $mdl) :
                            ?>
                                <option value="<?= $mdl['id']; ?>"><?= $mdl['id'] .'. '. $mdl['judul_modul']; ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_modul'); ?>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Metode pembayaran</label>
                        </div>
                        <select class="rounded-right custom-select <?= ($validation->hasError('metode')) ? ' is-invalid' : ''; ?>" id="inputGroupSelect01" name="metode">
                            <option value="<?= (old('metode')) ? old('metode') : ''; ?>" selected hidden><?= (old('metode')) ? old('metode') : 'Choose...'; ?></option>
                                <option value="indomaret">Indomaret</option>
                                <option value="alfamart">Alfamart</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('metode'); ?>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Potongan</span>
                        </div>
                        <input type="text" class="rounded-right form-control<?= ($validation->hasError('diskon')) ? ' is-invalid' : ''; ?>" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="diskon" value="<?= old('diskon'); ?>" maxlength="3">
                        <div class="invalid-feedback">
                            <?= $validation->getError('diskon'); ?>
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