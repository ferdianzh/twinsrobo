<?= $this->extend('templates/index'); ?>

<?= $this->section('section'); ?>
<!-- Begin Page Content -->
<h1 class="h3 mb-4 text-gray-800">Blog</h1>

<div class="row">

    <div class="col-sm-12">

        <!-- Circle Buttons -->
        <div class="card shadow mb-4 card-data">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add New Blog</h6>
            </div>
            <div class="card-body add-blog blog-form">
                <form action="/blog/save" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Judul</span>
                        </div>
                        <input type="text" class="form-control rounded-right" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="judul" value="<?= old('judul'); ?>">
                        <div class="invalid-feedback">

                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Kategori</label>
                        </div>
                        <select class="custom-select rounded-right" id="inputGroupSelect01" name="kategori">
                            <option value="" selected hidden disabled></option>

                            <option value=""></option>

                        </select>
                        <div class="invalid-feedback">

                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Sub Kategori</label>
                        </div>
                        <select class="custom-select rounded-right" id="inputGroupSelect01" name="sub_kategori">
                            <option value="" selected hidden disabled></option>

                            <option value=""></option>

                        </select>
                        <div class="invalid-feedback">

                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2 font-weight-bold ml-3">Tag Blog</div>
                        <div class="col-sm-9 checkbox">
                            <div class="form-check mb-2 d-inline mr-4">
                                <input class="form-check-input input-checkbox" type="checkbox" id="gridCheck1" name="tag[]" value="">
                                <label class="form-check-label" for="gridCheck1">
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea2" class="font-weight-bold">Describ Preview</label>
                        <textarea rows="3" maxlength="300" class="form-control rounded text" id="describ" name="describ" value=""><?= old('describ'); ?></textarea>
                        <div class="invalid-feedback">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="font-weight-bold">Materi Blog</label>
                        <textarea rows="4" class="form-control text" id="exampleFormControlTextarea1" name="materi" value=""><?= old('materi'); ?></textarea>
                        <div class="invalid-feedback">

                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Penulis</span>
                        </div>
                        <select class="custom-select rounded-right" id="inputGroupSelect01" name="penulis">
                            <option value="<?= (old('penulis')) ? old('penulis') : ''; ?>" selected hidden disabled><?= (old('penulis')) ? old('penulis') : 'Choose...'; ?></option>

                            <option value=""></option>

                        </select>
                        <div class="invalid-feedback">

                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Gambar Utama</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="foto" aria-describedby="inputGroupFileAddon01" name="foto" onchange="previewImage()" value="<?= old('foto'); ?>">
                            <div class="invalid-feedback invalid-foto">

                            </div>
                            <label id="label-gambar" class="custom-file-label" for="inputGroupFile01"><?= (old('foto')) ? old('foto') : 'Choose...'; ?></label>
                        </div>
                    </div>
                    <small id="passwordHelpBlock" class="form-text text-muted ml-3">
                        <li>ukuran gambar maksimal 1 mb.</li>
                    </small>
                    <div class="col-sm-2 mt-2">
                        <img src="/assets/img/blog/image.png" alt="" class="img-thumbnail img-preview shadow-sm">
                    </div>

                    <input type="submit" value="Create" class="submit btn-save">
                    <a href="/data_admin" class="btn btn-danger back btn-back">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- End of Main Content -->
<?= $this->endSection(); ?>