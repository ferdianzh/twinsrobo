<?= $this->extend('templates/index'); ?>

<?= $this->section('section'); ?>
<!-- Begin Page Content -->
<h1 class="h3 mb-4 text-gray-800">Siswa</h1>
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif; ?>
<div class="card shadow mb-4">
    <div class="blog-header">
        <a href="/admin/add_siswa" class="tambah-data">Add Siswa</a>
    </div>
</div>

<div class="card shadow rounded">
    <div class="data-blog table-responsive">
        <table class="table table-striped rounded table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Id User</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Sekolah</th>
                    <th scope="col">VIP</th>
                    <th scope="col" width="20%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($siswa as $siswa) :
                    $dt_user = $user->where(['id' => $siswa['id_user']])->first();
                ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $siswa['id_user']; ?></td>
                        <td><?= $dt_user['nama_depan'] . ' ' . $dt_user['nama_belakang']; ?></td>
                        <td><?= $siswa['nama_sekolah']; ?></td>
                        <td><?= $siswa['vip']; ?></td>
                        <td>
                            <a href="/admin/update_siswa/<?= $siswa['id_user']; ?>" class=" btn bg-warning"></a>
                            <form action="/admin/delete_siswa/<?= $siswa['id']; ?>" method="post" class="d-inline">
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