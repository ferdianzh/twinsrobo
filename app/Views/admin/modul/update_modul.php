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
                <h6 class="m-0 font-weight-bold text-primary">Update Modul</h6>
            </div>
            <div class="card-body add-blog px-4 tambah-admin">
                <form action="/modul/update/<?= $modul['id']; ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="fotoLama" value="<?= $modul['logo']; ?>">

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Id Kategori</label>
                        </div>
                        <select class="rounded-right custom-select <?= ($validation->hasError('id_kategori')) ? ' is-invalid' : ''; ?>" id="inputGroupSelect01" name="id_kategori">
                            <option value="<?= (old('id_kategori')) ? old('id_kategori') : $modul['id_kategori'];
                                            ?>" selected hidden><?= (old('id_kategori')) ? old('id_kategori') : $modul['id_kategori'] . ' ' . $id_kategori['nama_kategori']; ?></option>
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
                            <span class="input-group-text" id="basic-addon1">Judul Modul</span>
                        </div>
                        <input type="text" class="rounded-right form-control<?= ($validation->hasError('judul_modul')) ? ' is-invalid' : ''; ?>" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="judul_modul" value="<?= (old('judul_modul')) ? old('judul_modul') : $modul['judul_modul']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('judul_modul'); ?>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Harga</span>
                        </div>
                        <input type="text" class="rounded-right form-control<?= ($validation->hasError('harga_modul')) ? ' is-invalid' : ''; ?>" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="harga_modul" value="<?= (old('harga_modul')) ? old('harga_modul') : $modul['harga_modul']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('harga_modul'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" style="font-size: 16px;">Deskripsi</label>
                        <textarea class="form-deskripsi form-control text rounded<?= ($validation->getError('deskripsi')) ? ' is-invalid' : ''; ?>" id="exampleFormControlTextarea" name="deskripsi" rows="4"><?= (old('deskripsi')) ? old('deskripsi') : $modul['deskripsi']; ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('deskripsi'); ?>
                        </div>
                    </div>

                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Upload Logo</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="rounded-right custom-file-input<?= ($validation->hasError('logo')) ? ' is-invalid' : ''; ?>" id="foto" aria-describedby="inputGroupFileAddon01" name="logo" onchange="previewImage()" value="<?= (old('logo')) ? old('logo') : $modul['logo']; ?>">
                            <label class="custom-file-label" id="label-gambar" for="inputGroupFile01"><?= (old('logo')) ? old('logo') : $modul['logo']; ?></label>
                        </div>
                    </div>
                    <div class="invalid-feedback invalid-foto">
                        <?= $validation->getError('logo'); ?>
                    </div>
                    <small id="passwordHelpBlock" class="form-text text-muted ml-3">
                        <li>ukuran gambar maksimal 1 mb.</li>
                    </small>
                    <div class="col-sm-2 mt-3">
                        <img src="/img/modul/<?= (old('logo')) ? old('logo') : $modul['logo']; ?>" alt="" class="img-thumbnail img-preview">
                    </div>

                    <input type="submit" value="Create" class="submit btn-save">
                    <a href="/admin/data_modul" class="btn btn-danger back btn-back">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
<?= $this->endSection(); ?>