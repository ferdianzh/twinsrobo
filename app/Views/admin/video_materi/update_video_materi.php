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
                <h6 class="m-0 font-weight-bold text-primary">Update Video Materi</h6>
            </div>
            <div class="card-body add-blog px-4 tambah-kesulitan">
                <form action="/videomateri/update/<?= $video_materi['id']; ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>

                    <div class="input-group mb-3">

                        <input type="hidden" class="rounded-right form-control<?= ($validation->hasError('id_user')) ? ' is-invalid' : ''; ?>" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="nama_sekolah" value="<?= old('nama_sekolah'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_user'); ?>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Id Materi</label>
                        </div>
                        <select class="rounded-right custom-select <?= ($validation->hasError('id_materi')) ? ' is-invalid' : ''; ?>" id="inputGroupSelect01" name="id_materi">
                            <option value="<?= (old('id_materi')) ? old('id_materi') : $video_materi['id_materi']; ?>" selected hidden><?= (old('id_materi')) ? old('id_materi') : $video_materi['id_materi'] . '. ' . $id_materi['judul_materi'];
                                                                                                                                        ?></option>
                            <?php
                            foreach ($materi as $materi) :
                            ?>
                                <option value="<?= $materi['id']; ?>"><?= $materi['id'] . '. ' . $materi['judul_materi']; ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_materi'); ?>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Nama Video</span>
                        </div>
                        <input type="text" class="rounded-right form-control<?= ($validation->hasError('alt_text')) ? ' is-invalid' : ''; ?>" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="alt_text" value="<?= (old('alt_text')) ? old('alt_text') : $video_materi['alt_text']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('alt_text'); ?>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Link Video</span>
                        </div>
                        <input type="text" class="rounded-right form-control<?= ($validation->hasError('video_resource')) ? ' is-invalid' : ''; ?>" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="video_resource" value="<?= (old('video_resource')) ? old('video_resource') : $video_materi['video_resource']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('video_resource'); ?>
                        </div>
                    </div>

                    <input type="submit" value="Update" class="submit btn-save">
                    <a href="/admin/data_video_materi" class="btn btn-danger back btn-back">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
<?= $this->endSection(); ?>