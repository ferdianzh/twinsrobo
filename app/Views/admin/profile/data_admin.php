<?= $this->extend('templates/index'); ?>

<?= $this->section('section'); ?>
<!-- Begin Page Content -->
<h1 class="h3 mb-4 text-gray-800">Admin</h1>
<?php if ($pesan = session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success <?php if ( strtok($pesan, " ") == 'Hanya' ) echo "alert-warning"?>" role="alert">
        <?= $pesan; ?>
    </div>
<?php endif; ?>
<div class="card shadow mb-4">
    <div class="blog-header">
        <?php if ( session()->get('tipe_admin') == 'Super Admin' ) : ?>
            <a href="/admin/add_admin" class="tambah-data">Add Admin</a>
        <?php else : ?>
            <button class="tambah-data btn btn-dark" disabled>Tidak tersedia</button>
        <?php endif; ?>
    </div>
</div>

<div class="card shadow rounded">
    <div class="data-blog table-responsive">
        <table class="table table-striped rounded table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tipe Admin</th>
                    <th scope="col" width="20%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($admin as $admin) :
                ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $admin['nama']; ?></td>
                        <td><?= $admin['email']; ?></td>
                        <td><?= $admin['tipe_admin']; ?></td>
                        <td>
                            <?php if ( session()->get('id') == $admin['id'] ) : ?>
                                <a href="/admin/update_admin/<?= $admin['id']; ?>" class=" btn bg-warning"></a>
                            <?php elseif ( session()->get('tipe_admin') == 'Super Admin' ) : ?>
                                <a href="/admin/update_admin/<?= $admin['id']; ?>" class=" btn bg-warning"></a>
                                <form action="/admin/delete_admin/<?= $admin['id']; ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus data ini ?')"></button>
                                </form>
                            <?php else : ?>
                                <button class="btn btn-dark" disabled>Tidak tersedia</button>
                            <?php endif; ?>
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