<?= $this->extend('templates/index'); ?>

<?= $this->section('section'); ?>
<!-- Begin Page Content -->
<h1 class="h3 mb-4 text-gray-800">Modul</h1>
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif;
?>
    <div class="card shadow mb-4">
        <div class="blog-header">
            <a href="/admin/add_atm" class="tambah-data">Add Rekening</a>
        </div>
    </div>

    <div class="card shadow rounded">
        <div class="data-blog table-responsive">
            <table class="table table-striped rounded table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Siswa</th>
                        <th scope="col">Nama Bank</th>
                        <th scope="col">No. Rekening</th>
                        <th scope="col" width="20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($atm as $atm) :
                        $dt_siswa = $siswa->where(['id' => $atm['id_siswa']])->first();
                        $dt_user = $user->where(['id' => $dt_siswa['id_user']])->first();
                    ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $dt_user['nama_depan'] . ' ' . $dt_user['nama_belakang']; ?></td>
                            <td><?= $atm['nama_bank']; ?></td>
                            <td><?= $atm['no_rekening']; ?></td>
                            <td>
                                <a href="/admin/update_atm/<?= $atm['id_siswa']; ?>" class=" btn bg-warning"></a>
                                <form action="/admin/delete_atm/<?= $atm['id']; ?>" method="post" class="d-inline">
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
    <?php
    ?>
    </div>
    <!-- End of Main Content -->
    <?= $this->endSection(); ?>