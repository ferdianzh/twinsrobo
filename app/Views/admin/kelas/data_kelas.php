<?= $this->extend('templates/index'); ?>

<?= $this->section('section'); ?>
<!-- Begin Page Content -->
<h1 class="h3 mb-4 text-gray-800">Kelas</h1>
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif; ?>
<div class="card shadow mb-4">
    <div class="blog-header">
        <a href="/admin/add_kelas" class="tambah-data">Add Kelas</a>
    </div>
</div>

<div class="card shadow rounded">
    <div class="data-blog table-responsive">
        <table class="table table-striped rounded table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Mentor</th>
                    <th scope="col">Nama Kelas</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col" width="20%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                helper('text');
                $i = 1;
                foreach ($kelas as $kelas) :
                    $dt_mentor = $mentor->where(['id' => $kelas['id_mentor']])->first();
                    $dt_user = $user->where(['id' => $dt_mentor['id_user']])->first();
                ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $dt_user['nama_depan'] . ' ' . $dt_user['nama_belakang']; ?></td>
                        <td><?= $kelas['nama_kelas']; ?></td>
                        <td><?= word_limiter($kelas['deskripsi'], 5); ?></td>
                        <td>
                            <a href="/admin/update_kelas/<?= $kelas['id_mentor']; ?>" class=" btn bg-warning"></a>
                            <form action="/admin/delete_kelas/<?= $kelas['id']; ?>" method="post" class="d-inline">
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