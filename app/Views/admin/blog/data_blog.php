<?= $this->extend('templates/index'); ?>

<?= $this->section('section'); ?>
<!-- Begin Page Content -->
<h1 class="h3 mb-4 text-gray-800">Blog</h1>
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif; ?>

<div class="card shadow mb-4">
    <div class="blog-header">
        <a href="/admin/add_blog" class="tambah-data">Add Blog</a>
    </div>
</div>

<div class="card shadow">
    <div class="data-blog table-responsive">
        <table class="table table-bordered table-striped table-hover mb-0">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Gambar</th>
                    <th scope="col" width="200px">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><img src="/assets/img/blog/" alt="" class="img-thumbnail show-thumbnail myImg"></td>
                    <!-- The Modal -->
                    <div id="myModal" class="modal">
                        <span class="close">&times;</span>
                        <img class="modal-content" id="img01">
                        <div id="caption"></div>
                    </div>
                    <td>
                        <a href="/update_blog/" class="bg-warning btn"></a>
                        <form action="/blog/" method="post" class="d-inline">
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

<!-- End of Main Content -->
<?= $this->endSection(); ?>