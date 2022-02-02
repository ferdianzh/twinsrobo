<?= $this->extend('/templates/super_user2'); ?>

<?= $this->section('content'); ?>
<!-- Awal Jumbotron -->
<div class="jumbotron jumbotron-fluid" style="position: relative;">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-7 d-flex flex-column" data-aos="fade-up">
                <h1 class="display-4">Kuy Kita Belajar Bersama Twins Robo!</h1>
                <p class="lead">Bersenang-senang dan belajar aplikasi robot secara lengkap di Twins Robo</p>

                <form class="form-row">
                    <div class="col-9">
                        <input class="form-control mr-md-2" type="search" placeholder="Search Blog Post..."
                            aria-label="Search" />
                    </div>

                    <button class="col-2 btn btn-primary hvr-icon-pulse-shrink" type="submit">
                        <i class="fas fa-search hvr-icon" style="font-weight: 200;"></i>
                        <span class="cari">Cari</span>
                    </button>
                </form>

            </div>
            <div class="col-lg-5 animasi an-pembelajaran">
                <lottie-player src="https://assets8.lottiefiles.com/private_files/lf30_nIhxTu.json"
                    background="transparent" speed="1" style="width: 100%; height: 300px;" loop autoplay>
                </lottie-player>
            </div>
        </div>
        <!-- Akhir Row -->
    </div>
    <!-- Akhir Container -->
    <svg style="position: absolute; bottom:0; left:0;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#BCE5FF" fill-opacity="0.20"
            d="M0,160L48,165.3C96,171,192,181,288,181.3C384,181,480,171,576,154.7C672,139,768,117,864,133.3C960,149,1056,203,1152,197.3C1248,192,1344,128,1392,96L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
        </path>
    </svg>

</div>
<!-- Akhir Jumbotron -->

<!-- Awal Blog -->
<div id="blog2">
    <div class="container">
        <!--Awal Blog Bagian Atas -->
        <div class="blogAtas">
            <h2 class="title mb-5 aos-init aos-animate" data-aos="fade-right">Top 5 Course</h2>
            <div class="row">
                <!-- Awal atasKiri -->
                <div class="atasKiri col-lg-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                    <div class="card">
                        <div class="gambar">
                            <img src="img/dashboard.png" class="card-img-top" alt="" style="width: 100%;" />
                        </div>
                        <div class="card-body">
                            <div class="isiSub">
                                <img src="img/Logo Apps Twins Robo.png" alt="" />
                                <h4 class="sub-title">Twins Robo App</h4>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h2 class="title">
                                        Pemrogramman Robot Dasar
                                    </h2>
                                </div>
                            </div>

                            <div class="d-flex justify-content-start align-items-center">
                                <p class="diskon mr-3">Rp 355,000</p>
                                <p class="setelahDiskon">Rp 123,321</p>
                            </div>

                            <div class="rating">
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span>(35)</span>
                                </div>
                                <img class="bar" src="/img/isipembelajaran/hard.png" alt="">
                            </div>
                            <hr style="height:1px; width: 100%; color:aqua;">

                            <div class="bayar-sekali d-flex justify-content-start align-items-center">
                                <i class="fas fa-check-circle"></i>
                                <p>Bayar Sekali Akses Selamanya</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Akhir atasKiri -->

                <!-- Awal atasKanan -->
                <div class="atasKanan col-lg-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="500">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 m-pembelajaran">
                            <a href="#">
                                <div class="card h-100">
                                    <div class="gambar">
                                        <img src="img/dashboard.png" class="card-img-top" alt=""
                                            style="width: 171px; height: 128px" />
                                    </div>
                                    <div class="card-body">
                                        <h2 class="title">Pemrogramman Arduino Dasar</h2>
                                        <div class="row d-flex">
                                            <!-- <div class="col-sm-6"> -->
                                            <p class="diskon mr-3">Rp 355,000</p>
                                            <!-- </div> -->
                                            <!-- <div class="col-sm-6"> -->
                                            <p class="setelahDiskon">Rp 123,321</p>
                                            <!-- </div> -->
                                        </div>

                                        <div class="rating">
                                            <div class="stars">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <span>(35)</span>
                                            </div>
                                            <img class="bar" src="/img/isipembelajaran/hard.png" alt="">
                                        </div>
                                        <hr style="height:1px; width: 100%; color:aqua;">

                                        <div class="bayar-sekali d-flex justify-content-start align-items-center">
                                            <i class="fas fa-check-circle"></i>
                                            <p>Bayar Sekali Akses Selamanya</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6 m-pembelajaran">
                            <a href="#">
                                <div class="card h-100">
                                    <div class="gambar">
                                        <img src="img/dashboard.png" class="card-img-top" alt=""
                                            style="width: 171px; height: 128px" />
                                    </div>
                                    <div class="card-body">
                                        <h2 class="title">Pemrogramman IoT Dasar</h2>
                                        <div class="row d-flex">
                                            <!-- <div class=" col-sm-6"> -->
                                            <p class="diskon mr-3">Rp 355,000</p>
                                            <!-- </div> -->
                                            <!-- <div class="col-sm-6"> -->
                                            <p class="setelahDiskon">Rp 123,321</p>
                                            <!-- </div> -->
                                        </div>

                                        <div class="rating">
                                            <div class="stars">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <span>(35)</span>
                                            </div>
                                            <img class="bar" src="/img/isipembelajaran/hard.png" alt="">
                                        </div>
                                        <hr style="height:1px; width: 100%; color:aqua;">

                                        <div class="bayar-sekali d-flex justify-content-start align-items-center">
                                            <i class="fas fa-check-circle"></i>
                                            <p>Bayar Sekali Akses Selamanya</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6 m-pembelajaran">
                            <a href="#">
                                <div class="card h-100">
                                    <div class="gambar">
                                        <img src="img/dashboard.png" class="card-img-top" alt=""
                                            style="width: 171px; height: 128px" />
                                    </div>
                                    <div class="card-body">
                                        <h2 class="title">Merancang IoT Dasar</h2>
                                        <div class="row d-flex">
                                            <!-- <div class="col-sm-6"> -->
                                            <p class="diskon mr-3">Rp 355,000</p>
                                            <!-- </div> -->
                                            <!-- <div class="col-sm-6"> -->
                                            <p class="setelahDiskon">Rp 123,321</p>
                                            <!-- </div> -->
                                        </div>

                                        <div class="rating">
                                            <div class="stars">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <span>(35)</span>
                                            </div>
                                            <img class="bar" src="/img/isipembelajaran/hard.png" alt="">
                                        </div>
                                        <hr style="height:1px; width: 100%; color:aqua;">

                                        <div class="bayar-sekali d-flex justify-content-start align-items-center">
                                            <i class="fas fa-check-circle"></i>
                                            <p>Bayar Sekali Akses Selamanya</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6 m-pembelajaran">
                            <a href="#">
                                <div class="card h-100">
                                    <div class="gambar">
                                        <img src="img/dashboard.png" class="card-img-top" alt=""
                                            style="width: 171px; height: 128px" />
                                    </div>
                                    <div class="card-body">
                                        <h2 class="title">Pengenalan Elektronika Dasar</h2>
                                        <div class="row">
                                            <!-- <div class="col-sm-6"> -->
                                            <p class="diskon mr-3">Rp 355,000</p>
                                            <!-- </div> -->
                                            <!-- <div class="col-sm-6"> -->
                                            <p class="setelahDiskon">Rp 123,321</p>
                                            <!-- </div> -->
                                        </div>

                                        <div class="rating">
                                            <div class="stars">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <span>(35)</span>
                                            </div>
                                            <img class="bar" src="/img/isipembelajaran/hard.png" alt="">
                                        </div>
                                        <hr style="height:1px; width: 100%; color:aqua;">

                                        <div class="bayar-sekali d-flex justify-content-start align-items-center">
                                            <i class="fas fa-check-circle"></i>
                                            <p>Bayar Sekali Akses Selamanya</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Akhir atasKanan -->
            </div>
        </div>
        <!--Akhir Blog Bagian Atas -->
    </div>
</div>
<!-- Akhir Blog -->

<!-- Awal Kategori Pembelajaran -->
<div id="kategoriPembelajaran">
    <!-- Awal Container -->
    <div class="container">
        <h1 class="aos-init aos-animate" data-aos="fade-right">Kategori Pembelajaran Twins Robo</h1>
        <div class="kategori aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <a href="" class="h-100">
                        <img src="img/kategori1.png" alt="" />
                        <p>Pemrograman Robot</p>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <a href="" class="h-100">
                        <img src="img/kategori5.png" class="bg-primary" alt="" />
                        <p>Merakit Robot</p>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <a href="" class="h-100">
                        <img src="img/kategori6.png" class="bg-danger" alt="" />
                        <p>Pemrograman Arduino</p>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <a href="" class="h-100">
                        <img src="img/kategori7.png" class="bg-primary" alt="" />
                        <p>Pembelajaran Internet of Things</p>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <a href="" class="h-100">
                        <img src="img/kategori8.png" class="bg-primary" alt="" />
                        <p>Pengenalan Elektronika</p>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <a href="" class="h-100">
                        <img src="img/kategori9.png" class="bg-primary" alt="" />
                        <p>Pemrograman Android</p>
                    </a>
                </div>


            </div>
            <!-- Akhir Row -->
        </div>
        <!-- Akhir Kategori -->
    </div>
    <!-- Akhir Container -->
</div>
<!-- Akhir Kategori Pembelajaran -->

<?= $this->endSection(); ?>