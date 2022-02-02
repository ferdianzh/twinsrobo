<?= $this->extend('templates/index'); ?>

<?= $this->section('section'); ?>
<!-- Begin Page Content -->
<h1 class="h3 mb-4 text-gray-800">Video Materi</h1>
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif; ?>
<div class="card shadow mb-4">
    <div class="blog-header">
        <a href="/admin/add_video_materi" class="tambah-data">Add Video</a>
    </div>
</div>

<div class="card shadow rounded">
    <div class="data-blog table-responsive">
        <table class="table table-striped rounded table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Materi</th>
                    <th scope="col">Alt Text</th>
                    <th scope="col">Video</th>
                    <th scope="col" width="20%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                helper('text');
                $i = 1;
                foreach ($video_materi as $video_materi) :
                    $dt_materi = $materi->where(['id' => $video_materi['id_materi']])->first();
                ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $dt_materi['judul_materi']; ?></td>
                        <td><?= $video_materi['alt_text']; ?></td>
                        <td><?= $video_materi['video_resource']; ?></td>
                        <td>
                            <a href="/admin/update_video_materi/<?= $video_materi['id_materi']; ?>" class=" btn bg-warning"></a>
                            <form action="/admin/delete_videomateri/<?= $video_materi['id']; ?>" method="post" class="d-inline">
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