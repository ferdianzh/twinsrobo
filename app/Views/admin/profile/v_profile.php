<?= $this->extend('templates/index'); ?>

<?= $this->section('section'); ?>
<!-- Begin Page Content -->
<div class="card shadow mb-4 col-12 px-0 mx-auto rounded">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Admin Profile</h6>
    </div>
    <div class="data-blog pb-4">
        <div class="container">
            <div class="row">

                <div class="col-sm-12 profile pb-4">
                    <div class="border-profile">
                        <div class="img-profile">
                            <img src="/img/admin/<?= $foto; ?>" alt="" id="im-profile" onload="profile()" style="width: 100%; height: 100%">
                        </div>
                    </div>
                    <p class="nama"><?= ucwords($nama); ?></p>
                    <p class="font-weight-normal font-italic email"><?= $email; ?></p>
                    <!-- <p class="font-italic jumlah-blog">Jumlah Blog</p>
                        <p class="font-weight-normal font-italic result-blog">13</p> -->
                    <a href="/admin/update_admin/<?= session()->get('id'); ?>" class="btn btn-info">Update Data</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
<?= $this->endSection(); ?>