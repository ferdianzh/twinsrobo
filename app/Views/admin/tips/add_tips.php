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
                <h6 class="m-0 font-weight-bold text-primary">Add New Tips</h6>
            </div>
            <div class="card-body add-blog px-4 tambah-kesulitan">
                <form action="/tips/save" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>

                    <div class="input-group mb-3">

                        <input type="hidden" class="rounded-right form-control<?= ($validation->hasError('id_user')) ? ' is-invalid' : ''; ?>" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="nama_sekolah" value="<?= old('nama_sekolah'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_user'); ?>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Id Kategori</label>
                        </div>
                        <select class="rounded-right custom-select <?= ($validation->hasError('id_kategori')) ? ' is-invalid' : ''; ?>" id="inputGroupSelect01" name="id_kategori">
                            <option value="<?= (old('id_kategori')) ? old('id_kategori') : ''; ?>" selected hidden><?= (old('id_kategori')) ? old('id_kategori') : 'Choose...'; ?></option>
                            <?php
                            foreach ($kategori as $kategori) :
                            ?>
                                <option value="<?= $kategori['id']; ?>"><?= $kategori['id'] . '. ' . $kategori['nama_kategori']; ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_kategori'); ?>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Judul Tips</span>
                        </div>
                        <input type="text" class="rounded-right form-control<?= ($validation->hasError('judul_tips')) ? ' is-invalid' : ''; ?>" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="judul_tips" value="<?= old('judul_tips'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('judul_tips'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" style="font-size: 16px;">Konten Tips</label>
                        <textarea class="form-deskripsi form-control text rounded<?= ($validation->getError('konten_tips')) ? ' is-invalid' : ''; ?>" id="exampleFormControlTextarea" name="konten_tips" rows="4"><?= old('konten_tips'); ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('konten_tips'); ?>
                        </div>
                    </div>

                    <input type="submit" value="Create" class="submit btn-save">
                    <a href="/admin/data_tips" class="btn btn-danger back btn-back">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
<?= $this->endSection(); ?>