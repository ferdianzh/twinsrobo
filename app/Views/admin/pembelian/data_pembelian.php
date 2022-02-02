<?= $this->extend('templates/index'); ?>

<?= $this->section('section'); ?>
<!-- Begin Page Content -->
<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif;
if ($pembelian < 1) {
?>
    <h1 class="no-result mx-auto">No Result Found</h1>
<?php
} else {
?>
    <div class="card shadow mb-4">
        <div class="blog-header">
            <a href="/admin/add_pembelian" class="tambah-data">Add Pembelian</a>
        </div>
    </div>

    <div class="card shadow rounded">
        <div class="data-blog table-responsive">
            <table class="table table-striped rounded table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Order ID</th>
                        <th scope="col">Siswa</th>
                        <th scope="col">Modul ID</th>
                        <th scope="col">Tanggal Pembelian</th>
                        <th scope="col">Status</th>
                        <th scope="col" width="20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pembelian as $beli) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $beli['order_id']; ?></td>
                            <td><?= $beli['id_siswa'] .') '. $beli['email']; ?></td>
                            <td><?= $beli['id_modul']; ?></td>
                            <td><?= $beli['tanggal']; ?></td>
                            <?php if ($beli['status'] == 'settlement') : ?>
                                <td style="color: darkgreen;"><?= $beli['status']; ?></td>
                            <?php elseif ($beli['status'] == 'cancel') : ?>
                                <td style="color: brown;"><?= $beli['status']; ?></td>
                            <?php else : ?>
                                <td style="color: darkgrey;"><?= $beli['status']; ?></td>
                            <?php endif; ?>
                            <td>
                                <a href="/pembelian/update_pembelian/<?= $beli['id']; ?>" class=" btn bg-warning"></a>
                                <form action="/admin/delete_pembelian/<?= $beli['id']; ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus data ini ?')"></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php
}
?>

<!-- End of Main Content -->
<?= $this->endSection(); ?>