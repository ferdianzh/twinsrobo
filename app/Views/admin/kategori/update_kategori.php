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
                <h6 class="m-0 font-weight-bold text-primary">Update Kategori</h6>
            </div>
            <div class="card-body add-blog px-4 tambah-kesulitan">
                <form action="/kategori/update/<?= $kategori['id']; ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="fotoLama" value="<?= $kategori['logo']; ?>">

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Id Kesulitan</label>
                        </div>
                        <select class="rounded-right custom-select <?= ($validation->hasError('id_kesulitan')) ? ' is-invalid' : ''; ?>" id="inputGroupSelect01" name="id_kesulitan">
                            <option value="<?= (old('id_kesulitan')) ? old('id_kesulitan') : $kategori['id_kesulitan']; ?>" selected hidden><?= (old('id_kesulitan')) ? old('id_kesulitan') : $id_kesulitan['kesulitan']; ?></option>
                            <?php
                            foreach ($kesulitan as $kesulitan) :
                            ?>
                                <option value="<?= $kesulitan['id']; ?>"><?= $kesulitan['kesulitan']; ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_kesulitan'); ?>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Nama Kategori</span>
                        </div>
                        <input type="text" class="rounded-right form-control<?= ($validation->hasError('nama_kategori')) ? ' is-invalid' : ''; ?>" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="nama_kategori" value="<?= (old('nama_kategori')) ? old('nama_kategori') : $kategori['nama_kategori']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_kategori'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" style="font-size: 16px;">Deskripsi</label>
                        <textarea class="form-deskripsi form-control text rounded<?= ($validation->getError('deskripsi')) ? ' is-invalid' : ''; ?>" id="exampleFormControlTextarea" name="deskripsi"  rows="4"><?= (old('deskripsi')) ? old('deskripsi') : $kategori['deskripsi']; ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('deskripsi'); ?>
                        </div>
                    </div>

                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Logo</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="rounded-right custom-file-input <?= ($validation->hasError('foto')) ? ' is-invalid' : ''; ?>" id="foto" aria-describedby="inputGroupFileAddon01" name="foto" onchange="previewImage()" value="<?= (old('foto')) ? old('foto') : $kategori['logo']; ?>">
                            <div class="invalid-feedback invalid-foto">
                                <?= $validation->getError(''); ?>
                            </div>
                            <label class="custom-file-label <?= ($validation->hasError('foto')) ? ' is-invalid' : ''; ?>" id="label-gambar" for="inputGroupFile01"><?= (old('foto')) ? old('foto') : $kategori['logo']; ?></label>
                        </div>
                    </div>
                    <small id="passwordHelpBlock" class="form-text text-muted ml-3">
                        <li>ukuran gambar maksimal 5 mb.</li>
                    </small>
                    <div class="invalid-feedback">
                        <?= $validation->getError('foto'); ?>
                    </div>
                    <div class="col-sm-2 mt-2">
                        <img src="/img/kategori/<?= $kategori['logo']; ?>" alt="" class="img-thumbnail img-preview">
                    </div>

                    <input type="submit" value="Update" class="submit btn-save">
                    <a href="/admin/data_kategori" class="btn btn-danger back btn-back">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
<?= $this->endSection(); ?>