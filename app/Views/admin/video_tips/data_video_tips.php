<?= $this->extend('templates/index'); ?>

<?= $this->section('section'); ?>
<!-- Begin Page Content -->
<h1 class="h3 mb-4 text-gray-800">Video Tips</h1>
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif; ?>
<div class="card shadow mb-4">
    <div class="blog-header">
        <a href="/admin/add_video_tips" class="tambah-data">Add Video</a>
    </div>
</div>

<div class="card shadow rounded">
    <div class="data-blog table-responsive">
        <table class="table table-striped rounded table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tips</th>
                    <th scope="col">Alt Text</th>
                    <th scope="col">Video</th>
                    <th scope="col" width="20%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                helper('text');
                $i = 1;
                foreach ($video_tips as $video_tips) :
                    $dt_tips = $tips->where(['id' => $video_tips['id_tips']])->first();
                ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $dt_tips['judul_tips']; ?></td>
                        <td><?= $video_tips['alt_text']; ?></td>
                        <td><?= $video_tips['video_resource']; ?></td>
                        <td>
                            <a href="/admin/update_video_tips/<?= $video_tips['id_tips']; ?>" class=" btn bg-warning"></a>
                            <form action="/admin/delete_videotips/<?= $video_tips['id']; ?>" method="post" class="d-inline">
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