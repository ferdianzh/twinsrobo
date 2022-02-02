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
                <h6 class="m-0 font-weight-bold text-primary">Add New Materi</h6>
            </div>
            <div class="card-body add-blog px-4 tambah-kesulitan">
                <form action="/materi/save" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>

                    <div class="input-group mb-3">

                        <input type="hidden" class="rounded-right form-control<?= ($validation->hasError('id_user')) ? ' is-invalid' : ''; ?>" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="nama_sekolah" value="<?= old('nama_sekolah'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_user'); ?>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Id Modul</label>
                        </div>
                        <select class="rounded-right custom-select <?= ($validation->hasError('id_modul')) ? ' is-invalid' : ''; ?>" id="inputGroupSelect01" name="id_modul">
                            <option value="<?= (old('id_modul')) ? old('id_modul') : ''; ?>" selected hidden><?= (old('id_modul')) ? old('id_modul') : 'Choose...'; ?></option>
                            <?php
                            foreach ($modul as $modul) :
                            ?>
                                <option value="<?= $modul['id']; ?>"><?= $modul['id'] . '. ' . $modul['judul_modul']; ?></option>
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
                            <span class="input-group-text" id="basic-addon1">Judul Materi</span>
                        </div>
                        <input type="text" class="rounded-right form-control<?= ($validation->hasError('judul_materi')) ? ' is-invalid' : ''; ?>" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="judul_materi" value="<?= old('judul_materi'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('judul_materi'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" style="font-size: 16px;">Konten Materi</label>
                        <textarea class="form-deskripsi form-control text rounded<?= ($validation->getError('konten_materi')) ? ' is-invalid' : ''; ?>" id="exampleFormControlTextarea" name="konten_materi" rows="4"><?= old('konten_materi'); ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('konten_materi'); ?>
                        </div>
                    </div>

                    <input type="submit" value="Create" class="submit btn-save">
                    <a href="/admin/data_materi" class="btn btn-danger back btn-back">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
<?= $this->endSection(); ?>