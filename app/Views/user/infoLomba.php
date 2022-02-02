<?= $this->extend('/templates/super_user2'); ?>

<?= $this->section('content'); ?>
<!-- Awal Jumbotron -->
<div class="jumbotron jumbotron-fluid" style="position: relative;">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-7 d-flex flex-column" data-aos="fade-up">
                <h1 class="display-4">PEMROGRAMMAN ROBOT</h1>
                <p class="lead">Bersenang-senang Belajar Pemrogramman Robot Bersama Twins Robo.</p>

                <div class="">
                    <form class="form-row">
                        <div class="col-9">
                            <input class="form-control mr-md-2" type="search" placeholder="Search Blog Post..." aria-label="Search" />
                        </div>

                        <button class="col-2 btn btn-primary hvr-icon-pulse-shrink" type="submit">
                            <i class="fas fa-search hvr-icon" style="font-weight: 200;"></i>
                            <span class="cari">Cari</span>
                        </button>
                    </form>
                </div>

            </div>
            <div class="col-lg-5 animasi">
                <lottie-player src="json/lottie/robot.json" background="transparent" speed="1" style="width: 100%; height: 300px;" loop autoplay></lottie-player>
            </div>
        </div>
        <!-- Akhir Row -->
    </div>
    <!-- Akhir Container -->
    <svg style="position: absolute; bottom:0; left:0;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#BCE5FF" fill-opacity="0.20" d="M0,160L48,165.3C96,171,192,181,288,181.3C384,181,480,171,576,154.7C672,139,768,117,864,133.3C960,149,1056,203,1152,197.3C1248,192,1344,128,1392,96L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
        </path>
    </svg>

</div>
<!-- Akhir Jumbotron -->

<!-- Materi Pembelajaran -->
<div class="materiPembelajaran">
    <div class="container">
        <div class="text-center mt-4">
            <h1 class="title" data-aos="fade-up">Materi Pembelajaran</h1>
        </div>
    </div>
</div>
<!-- Akhir Materi Pembelajaran -->

<!-- Awal Blog -->
<div id="blog2">
    <div class="container">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-featured" role="tabpanel" aria-labelledby="pills-featured-tab">

                <!--Awal Blog Bagian Bawah -->
                <div class="blogBawah aos-init aos-animate" data-aos="fade-up">
                    <div class="row">
                        <div class="col-lg-4 m-pembelajaran">
                            <a href="#">
                                <div class="card">
                                    <div class="gambar">
                                        <img src="img/Dashboard.png" class="card-img-top" style="width: fit-content;" alt="" />
                                    </div>
                                    <div class="card-body px-0">
                                        <h2 class="title">Pemrogramman Robot Dasar</h2>
                                        <div class="d-flex align-items-center">
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
                        <div class="col-lg-4 m-pembelajaran">
                            <a href="#">
                                <div class="card">
                                    <div class="gambar">
                                        <img src="img/Dashboard.png" class="card-img-top" style="width: fit-content;" alt="" />
                                    </div>
                                    <div class="card-body px-0">
                                        <h2 class="title">Pemrogramman Robot Dasar</h2>
                                        <div class="d-flex align-items-center">
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
                        <div class="col-lg-4 m-pembelajaran">
                            <a href="#">
                                <div class="card">
                                    <div class="gambar">
                                        <img src="img/Dashboard.png" class="card-img-top" style="width: fit-content;" alt="" />
                                    </div>
                                    <div class="card-body px-0">
                                        <h2 class="title">Pemrogramman Robot Dasar</h2>
                                        <div class="d-flex align-items-center">
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

                    <div class="row">
                        <div class="col-lg-4 m-pembelajaran">
                            <a href="#">
                                <div class="card">
                                    <div class="gambar">
                                        <img src="img/Dashboard.png" class="card-img-top" style="width: fit-content;" alt="" />
                                    </div>
                                    <div class="card-body px-0">
                                        <h2 class="title">Pemrogramman Robot Dasar</h2>
                                        <div class="d-flex align-items-center">
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
                        <div class="col-lg-4 m-pembelajaran">
                            <a href="#">
                                <div class="card">
                                    <div class="gambar">
                                        <img src="img/Dashboard.png" class="card-img-top" style="width: fit-content;" alt="" />
                                    </div>
                                    <div class="card-body px-0">
                                        <h2 class="title">Pemrogramman Robot Dasar</h2>
                                        <div class="d-flex align-items-center">
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
                        <div class="col-lg-4 m-pembelajaran">
                            <a href="#">
                                <div class="card">
                                    <div class="gambar">
                                        <img src="img/Dashboard.png" class="card-img-top" style="width: fit-content;" alt="" />
                                    </div>
                                    <div class="card-body px-0">
                                        <h2 class="title">Pemrogramman Robot Dasar</h2>
                                        <div class="d-flex align-items-center">
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

                    <div class="row">
                        <div class="col-lg-4 m-pembelajaran">
                            <a href="#">
                                <div class="card">
                                    <div class="gambar">
                                        <img src="img/Dashboard.png" class="card-img-top" style="width: fit-content;" alt="" />
                                    </div>
                                    <div class="card-body px-0">
                                        <h2 class="title">Pemrogramman Robot Dasar</h2>
                                        <div class="d-flex align-items-center">
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
                        <div class="col-lg-4 m-pembelajaran">
                            <a href="#">
                                <div class="card">
                                    <div class="gambar">
                                        <img src="img/Dashboard.png" class="card-img-top" style="width: fit-content;" alt="" />
                                    </div>
                                    <div class="card-body px-0">
                                        <h2 class="title">Pemrogramman Robot Dasar</h2>
                                        <div class="d-flex align-items-center">
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
                        <div class="col-lg-4 m-pembelajaran">
                            <a href="#">
                                <div class="card">
                                    <div class="gambar">
                                        <img src="img/Dashboard.png" class="card-img-top" style="width: fit-content;" alt="" />
                                    </div>
                                    <div class="card-body px-0">
                                        <h2 class="title">Pemrogramman Robot Dasar</h2>
                                        <div class="d-flex align-items-center">
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

                    <!-- Awal Pagination -->
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="First">
                                <span aria-hidden="true"> <img src="img/next.png" alt="" style="transform: rotate(180deg) scale(.6)"> </span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true"> <i class="bi bi-arrow-left"></i> </span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true"> <i class="bi bi-arrow-right"></i> </span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Last">
                                <span aria-hidden="true"> <img src="img/next.png" alt="" style="transform: scale(.6);"> </span>
                            </a>
                        </li>
                    </ul>
                    <!-- Akhir Pagination -->
                </div>
                <!--Akhir Blog Bagian Bawah -->
            </div>
        </div>
    </div>
</div>
</div>
<!-- Akhir Blog -->

<?= $this->endSection(); ?>