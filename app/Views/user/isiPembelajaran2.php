<?= $this->extend('/templates/isiPembelajaran2_user'); ?>

<?= $this->section('content'); ?>
<div class="Pembelajaran2">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center" data-aos="fade-up">
                <h1 class="title mt-4">Pengenalan Program Robot</h1>
                <p>Tak Kenal Maka Kenalan Dengan Pemrogramman Robot</p>
            </div>
        </div>

        <div class="detail">
            <div class="row text-center mt-4">
                <div class="col-sm-3 col-md-6 col-lg-3" data-aos="fade-up">
                    <p>Member</p>
                    <p><span style="font-weight: bold;">1234</span> enrolled</p>
                </div>
                <div class="col-sm-3 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <p>Tingkatan</p>
                    <p> <img class="bar" src="/img/isipembelajaran/medium.png" alt="" srcset=""></p>
                </div>
                <div class="col-sm-3 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="600">
                    <p>Sertifikat</p>
                    <p> - </p>
                </div>
                <div class="col-sm-3 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="900">
                    <p>Konsultasi</p>
                    <p> - </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Pembelajaran2 -->

<div class="isiPembelajaran2 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8 sisiKiri">
                <div class="videoPembelajaran" data-aos="zoom-in-up" data-aos-delay="300">
                    <iframe width="100%" height="400px" src="https://www.youtube.com/embed/QHzAk4XBVVE"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen style="border-radius: 26px;"></iframe>
                </div>

                <div class="mP2-menu mt-4 aos-init aos-animate" data-aos="zoom-in-down">
                    <div class="row d-flex justify-content-between">
                        <div class="col-md-3 col-sm-6">
                            <a class="btn tombol active" href="">About</a>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <a class="btn tombol" href="">Lessons</a>
                        </div>
                        <div class=" col-md-3 col-sm-6">
                            <a class="btn tombol" href="">Tools</a>
                        </div>
                        <div class=" col-md-3 col-sm-6">
                            <a class="btn tombol" href="">Review</a>
                        </div>
                    </div>
                </div>

                <div class=" keteranganPembelajaran aos-init aos-animate" data-aos="fade-right" data-aos-delay="300">
                    <h2 class="title mt-4">Lorem ipsum dolor sit.</h2>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iste, reiciendis.
                        Lorem ipsum dolor sit
                        amet consectetur, adipisicing elit. Dignissimos cumque ullam magni,
                        cupiditate facilis tempore
                        quis dolorem recusandae aperiam earum voluptate consequatur, asperiores
                        mollitia vitae?. Lorem
                        ipsum dolor sit amet consectetur adipisicing elit. Hic, aliquid. Lorem ipsum
                        dolor sit amet
                        consectetur adipisicing elit. Alias nemo minima rerum amet, laboriosam vel
                        explicabo corporis
                        reiciendis non architecto!</p>
                </div>

                <div class="pengajar aos-init aos-animate" data-aos="fade-right">
                    <h2 class="title mt-5">Learn With Expert</h2>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-img d-flex justify-content-between">
                                        <img class="rounded-circle" src="img/Reza Arindra.png"
                                            style="border: 1px solid #1D79B2; padding: 3px;" alt="">
                                        <div class="rating">
                                            <div class="stars">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Akhir Card-Img -->
                                    <p class="card-text title"> Reza Arindra F</p>
                                    <p>Software Dev / Pengajar Robotik</p>
                                    <a class="btn tombol" href="">Profile Mentor</a>
                                </div>
                                <!-- Akhir Card Body -->
                            </div>
                            <!-- Akhir Card -->
                        </div>
                    </div>
                </div>
                <!-- Akhir Pengajar -->
            </div>
            <!-- Akhir Sisi kiri -->


            <div class="col-md-12 col-lg-4 sisiKanan">
                <div class="rightSidebar" data-aos="fade-up" data-aos-delay="300"
                    style="width: 100%; background: #1D79B2; border-radius: 26px; padding:10px; position:relative; padding-bottom: 85px">
                    <h3 class="title">5 lesson (15 Menit)</h3>

                    <div class="menuVideoPembelajaran d-flex flex-column">
                        <a class="btn tombolLesson" href=""> <i class="bi bi-play-circle"></i> Pengenalan
                            Program Robot
                            <span>3min</span></a>
                        <a class="btn tombolLesson" href=""> <i class="bi bi-play-circle"></i> Pengenalan
                            Program Robot
                            <span>3min</span></a>
                        <a class="btn tombolLesson" href=""> <i class="bi bi-play-circle"></i>Pengenalan Program
                            Robot
                            <span>3min</span></a>
                        <a class="btn tombolLesson" href=""> <i class="bi bi-lock-fill"></i> 5 Video Lainnya</a>
                    </div>

                    <a class="btn tombol" href=""
                        style="position: absolute; bottom:0; left:0; width:100%; border-radius: 0 0 18px 18px; height: 40px">Gabung
                        Kelas</a>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Isi Pembelajaran2 -->
<?= $this->endSection(); ?>