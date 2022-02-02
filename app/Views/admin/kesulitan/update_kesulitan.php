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
                <h6 class="m-0 font-weight-bold text-primary">Update Kesulitan</h6>
            </div>
            <div class="card-body add-blog px-4 tambah-kesulitan">
                <form action="/kesulitan/update/<?= $kesulitan['id']; ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>

                    <div class="input-group mb-3">

                        <input type="hidden" class="rounded-right form-control<?= ($validation->hasError('coba')) ? ' is-invalid' : ''; ?>" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="coba" value="<?= old('coba'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('coba'); ?>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Tingkat Kesulitan</label>
                        </div>
                        <select class="rounded-right custom-select <?= ($validation->hasError('kesulitan')) ? ' is-invalid' : ''; ?>" id="inputGroupSelect01" name="kesulitan">
                            <option value="<?= (old('kesulitan')) ? old('kesulitan') : $kesulitan['kesulitan']; ?>" selected hidden><?= (old('kesulitan')) ? old('kesulitan') : $kesulitan['kesulitan']; ?></option>
                            <option value="Mudah">Mudah</option>
                            <option value="Medium">Medium</option>
                            <option value="Sulit">Sulit</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('kesulitan'); ?>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Skore Tambahan</span>
                        </div>
                        <input type="text" class="rounded-right form-control<?= ($validation->hasError('skore')) ? ' is-invalid' : ''; ?>" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="skore" value="<?= (old('skore')) ? old('skore') : $kesulitan['skore']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('skore'); ?>
                        </div>
                    </div>

                    <input type="submit" value="Update" class="submit btn-save">
                    <a href="/admin/data_kesulitan" class="btn btn-danger back btn-back">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
<?= $this->endSection(); ?>