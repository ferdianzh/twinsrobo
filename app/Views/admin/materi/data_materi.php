<?= $this->extend('templates/index'); ?>

<?= $this->section('section'); ?>
<!-- Begin Page Content -->
<h1 class="h3 mb-4 text-gray-800">Materi</h1>
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif; ?>
<div class="card shadow mb-4">
    <div class="blog-header">
        <a href="/admin/add_materi" class="tambah-data">Add Materi</a>
    </div>
</div>

<div class="card shadow rounded">
    <div class="data-blog table-responsive">
        <table class="table table-striped rounded table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Judul Materi</th>
                    <th scope="col">Modul</th>
                    <th scope="col">Konten</th>
                    <th scope="col" width="20%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                helper('text');
                $i = 1;
                foreach ($materi as $materi) :
                    $dt_modul = $modul->where(['id' => $materi['id_modul']])->first();
                ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $materi['judul_materi']; ?></td>
                        <td><?= $dt_modul['judul_modul']; ?></td>
                        <td><?= word_limiter($materi['konten_materi'], 5); ?></td>
                        <td>
                            <a href="/admin/update_materi/<?= $materi['id_modul']; ?>" class=" btn bg-warning"></a>
                            <form action="/admin/delete_materi/<?= $materi['id']; ?>" method="post" class="d-inline">
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