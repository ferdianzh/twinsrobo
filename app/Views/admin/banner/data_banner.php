<?= $this->extend('templates/v_super'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add New Banner</h6>
        </div>
        <div class="card-body add-blog px-4 tambah-admin">
            <form action="/banner/update/<?= $banner['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="layanan" value="home">
                <input type="hidden" name="link" value="index">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Deskripsi</label>
                    <textarea class="form-control text rounded<?= ($validation->getError('deskripsi')) ? ' is-invalid' : ''; ?>" id="exampleFormControlTextarea" name="deskripsi" value=""><?= (old('deskripsi')) ? old('deskripsi') : $banner['deskripsi']; ?></textarea>
                    <div class="invalid-feedback">
                        <?= $validation->getError('deskripsi'); ?>
                    </div>
                </div>

                <div class="input-group mb-3 cabang">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Gambar Banner</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input<?= ($validation->getError('foto')) ? ' is-invalid' : ''; ?>" id="foto" aria-describedby="inputGroupFileAddon01" name="foto" onchange="previewImage()" value="<?= old('foto'); ?>">
                        <div class="invalid-feedback invalid-foto">
                            <?= $validation->getError('foto'); ?>
                        </div>
                        <label class="custom-file-label" for="inputGroupFile01"><?= (old('foto')) ? old('foto') : $banner['foto']; ?></label>
                    </div>
                </div>
                <small id="passwordHelpBlock" class="form-text text-muted ml-3">
                    <li>ukuran gambar maksimal 5 mb.</li>
                </small>
                <div class="col-sm-2 mt-2">
                    <img src="/assets/img/banner/<?= $banner['foto']; ?>" alt="" class="img-thumbnail img-preview shadow-sm">
                </div>

                <input type="submit" value="Create" class="submit btn-save">
            </form>
        </div>
    </div>

    <div class="card shadow mb-3">
        <div class="data-blog table-responsive">
            <table class="table table-bordered table-striped table-hover mb-0">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Gambar Banner</th>
                        <th scope="col" width="200px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td><?= $banner['deskripsi']; ?></td>
                        <td><img src="/assets/img/banner/<?= $banner['foto']; ?>" alt="<?= $banner['foto']; ?>" class="img-thumbnail show-thumbnail myImg"></td>
                        <!-- The Modal -->
                        <div id="myModal" class="modal">
                            <span class="close">&times;</span>
                            <img class="modal-content" id="img01">
                            <div id="caption"></div>
                        </div>
                        <td>
                            <a href="/update_banner/<?= $banner['id']; ?>" class=" btn bg-warning"></a>
                            <form action="/banner/<?= $banner['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus data ini ?')"></button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?= $this->endSection(); ?>