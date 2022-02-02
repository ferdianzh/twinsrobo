<?= $this->extend('templates/index'); ?>

<?= $this->section('section'); ?>
<!-- Begin Page Content -->
<h1 class="h3 mb-4 text-gray-800">Kesulitan</h1>
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif; ?>
<div class="card shadow mb-4">
    <div class="blog-header">
        <a href="/admin/add_kesulitan" class="tambah-data">Add Kesulitan</a>
    </div>
</div>

<div class="card shadow rounded">
    <div class="data-blog table-responsive">
        <table class="table table-striped rounded table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Tingkat Kesulitan</th>
                    <th scope="col">Skore</th>
                    <th scope="col" width="20%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($kesulitan as $kesulitan) :
                ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $kesulitan['id']; ?></td>
                        <td><?= $kesulitan['kesulitan']; ?></td>
                        <td><?= $kesulitan['skore']; ?></td>
                        <td>
                            <a href="/admin/update_kesulitan/<?= $kesulitan['id']; ?>" class=" btn bg-warning"></a>
                            <form action="/admin/delete_kesulitan/<?= $kesulitan['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus data ini ?')"></button>
                            </form>
                        </td>
                    </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </div>
</div>
<!-- End of Main Content -->
<?= $this->endSection(); ?>