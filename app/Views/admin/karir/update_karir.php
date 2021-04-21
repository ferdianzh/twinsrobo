<?= $this->extend('templates/v_super'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">

        <div class="col-sm-12">

            <!-- Circle Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Add New Karir</h6>
                </div>
                <div class="card-body add-blog">
                    <form action="/karir/update/<?= $karir['id']; ?>" method="post">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id" value="<?= $karir['id']; ?>">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Nama Karir</label>
                            </div>
                            <select class="custom-select<?= ($validation->hasError('nama_karir')) ? ' is-invalid' : ''; ?>" id="inputGroupSelect01" name="nama_karir">
                                <option value="<?= (old('nama_karir')) ? old('nama_karir') : $karir['nama_karir']; ?>" hidden selected><?= (old('nama_karir')) ? old('nama_karir') : $karir['nama_karir']; ?></option>
                                <option value="Marketing Staff">Marketing Staff</option>
                                <option value="Android Developer">Android Developer</option>
                                <option value="Designer UI">Designer UI</option>
                                <option value="Website Developer">Website Developer</option>
                                <option value="Wordpress Enthusias">Wordpress Enthusias</option>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama_karir'); ?>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Lokasi</label>
                            </div>
                            <select class="custom-select<?= ($validation->hasError('lokasi')) ? ' is-invalid' : ''; ?>" id="inputGroupSelect01" name="lokasi">
                                <option value="<?= (old('lokasi')) ? old('lokasi') : $karir['lokasi']; ?>" hidden selected><?= (old('lokasi')) ? old('lokasi') : $karir['lokasi']; ?></option>
                                <?php foreach ($cabang->getResult() as $cabang) : ?>
                                    <option value="<?= $cabang->nama; ?>"><?= $cabang->nama; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('lokasi'); ?>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Deskripsi</label>
                            </div>
                            <select class="custom-select<?= ($validation->hasError('deskripsi')) ? ' is-invalid' : ''; ?>" id="inputGroupSelect01" name="deskripsi">
                                <option value="<?= (old('deskripsi')) ? old('deskripsi') : $karir['deskripsi']; ?>" hidden selected><?= (old('deskripsi')) ? old('deskripsi') : $karir['deskripsi']; ?></option>
                                <option value="Full Time">Full Time</option>
                                <option value="Internship">Internship</option>
                                <option value="Internship & Full Time">Internship & Full Time</option>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('deskripsi'); ?>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Keterangan</label>
                            </div>
                            <select class="custom-select<?= ($validation->hasError('keterangan')) ? ' is-invalid' : ''; ?>" id="inputGroupSelect01" name="keterangan">
                                <option value="<?= (old('keterangan')) ? old('keterangan') : $karir['keterangan']; ?>" hidden selected><?= (old('keterangan')) ? old('keterangan') : $karir['keterangan']; ?></option>
                                <option value="Buka">Buka</option>
                                <option value="Tutup">Tutup</option>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('keterangan'); ?>
                            </div>
                        </div>

                        <input type="submit" value="Update" class="submit btn-save">
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?= $this->endSection(); ?>