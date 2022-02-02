<?= $this->extend('templates/index'); ?>

<?= $this->section('section'); ?>
<!-- Begin Page Content -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<div class="row">

    <div class="col-sm-12">

        <!-- Circle Buttons -->
        <div class="card shadow mb-4  card-data">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add New Karir</h6>
            </div>
            <div class="card-body add-blog">
                <form action="/karir/save" method="post">
                    <?= csrf_field(); ?>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Karir</label>
                        </div>
                        <select class="custom-select rounded-right" id="inputGroupSelect01" name="nama_karir">
                            <option value="<?= old('nama_karir'); ?>" hidden disabled selected><?= old('nama_karir'); ?></option>
                            <option value="Marketing Staff">Marketing Staff</option>
                            <option value="Android Developer">Android Developer</option>
                            <option value="Designer UI">Designer UI</option>
                            <option value="Website Developer">Website Developer</option>
                            <option value="Wordpress Enthusias">Wordpress Enthusias</option>
                        </select>
                        <div class="invalid-feedback">

                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Lokasi</label>
                        </div>
                        <select class="custom-select rounded-right" id="inputGroupSelect01" name="lokasi">
                            <option value="<?= old('lokasi'); ?>" hidden disabled selected><?= old('lokasi'); ?></option>
                            <option value="Surabaya">Surabaya</option>
                            <option value="Malang">Malang</option>
                        </select>
                        <div class="invalid-feedback">

                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Deskripsi</label>
                        </div>
                        <select class="custom-select rounded-right" id="inputGroupSelect01" name="deskripsi">
                            <option value="<?= old('deskripsi'); ?>" hidden disabled selected><?= old('deskripsi'); ?></option>
                            <option value="Full Time">Full Time</option>
                            <option value="Internship">Internship</option>
                            <option value="Internship & Full Time">Internship & Full Time</option>
                        </select>
                        <div class="invalid-feedback">

                        </div>
                    </div>

                    <input type="hidden" name="keterangan" id="keterangan" value="Buka">

                    <input type="submit" value="Create" class="submit btn-save">
                    <a href="/admin/data_karir" class="btn btn-danger back btn-back">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
<?= $this->endSection(); ?>