@php
    $site_name = get_setting_value('_site_name');
    $location = get_setting_value('_location');
    $email = get_setting_value('_email');
    $linkedin = get_setting_value('_linkedin');
    $facebook = get_setting_value('_facebook');
    $layanan = get_setting_value('_layanan');
    $whatsapp = get_setting_value('_whatsapp');
    $desk = get_setting_value('_deskripsi');
    $legalitas = get_setting_value("_legalitas");

    $about = get_about_value("TENTANG");
    $sejarah = get_about_value("SEJARAH");

    $visi = get_visimisis_value("VISI");
    $misi = get_visimisis_value("MISI");

    $isiProduk = get_products_value("_title");
    $produk1 = get_products_value("_produk1");
    $produk2 = get_products_value("_produk2");
    $produk3 = get_products_value("_produk3");

    $isiLayanan = get_layanans_value("_title");
    $layanan1 = get_layanans_value("_layanan1");
    $layanan2 = get_layanans_value("_layanan2");
    $layanan3 = get_layanans_value("_layanan3");
    $layanan4 = get_layanans_value("_layanan4");

    $teams = get_all_teams();
    $pengalaman = get_all_pengalaman();
    $app = get_all_applications();

    $karirList = get_all_karir();

    $pesanwebsite = get_all_website();



@endphp



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>{{ $site_name }}</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/LogoTanniewa.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Techie
  * Template URL: https://bootstrapmade.com/techie-free-skin-bootstrap-3/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
         <div class="logo"><img src="assets/img/LogoTanniewa.png" alt=""></div>
        <h1 class="sitename">{{ $site_name }}</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Beranda</a></li>
          <li class="dropdown"><a href="/about"><span id="dropdown-tentang-label">Tentang</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
                <li><a href="/about" class="dropdown-item" onclick="updateDropdownTentangLabel('Tentang')">{{ $about->title }}</a></li>
                <li><a href="/about#Sejarah" class="dropdown-item" onclick="updateDropdownTentangLabel('Sejarah')">{{ $sejarah->title }}</a></li>
                <li><a href="/about#visimisi" class="dropdown-item" onclick="updateDropdownTentangLabel('Visi Misi')">Visi Misi</a></li>
                <li><a href="/about#team" class="dropdown-item" onclick="updateDropdownTentangLabel('Tim')">Tim</a></li>
            </ul>
        </li>




          <li><a href="#features">Layanan</a></li>
          <li><a href="#portfolio">Pengalaman</a></li>
          <li><a href="#testimonials">Karir</a></li>
          <li><a href="#contact">Kontak</a></li>
          <li class="dropdown"><a href="#"><span>Lainnya</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
                @if ($app->isEmpty())
                    <p>data tidak ada</p>
            @else
                <div class="row">
                @foreach ($app as $apps)
                    <li><a href="{{ route('newApp.show', $apps->id) }}">{{ $apps->title }}</a></li>
                    @endforeach
                </div>
            @endif
            </ul>
          </li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="#pesan" >Pesan</a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section accent-background">

      <div class="container">
        <div class="row ">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h1>Selamat Datang di {{ $site_name }}</h1>
            <p>Kami memberikan solusi terbaik di bidang pengembangan website dan layanan digital.</p>
            <div class="d-flex">
              <a href="#about" class="btn-get-started">lihat lebih lanjut</a>
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img">
            <img src="assets/img/welcome2.png" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->



    <!-- Stats Section -->
    <section id="stats" class="stats section accent-background">

      <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

        <div class="row ">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
              <p>Clients</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
              <p>Projects</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
              <p>Hours Of Support</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span>
              <p>Workers</p>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>

    </section><!-- /Stats Section -->



    <!-- Layanan Section -->
    <section id="features" class="features section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>{{ $isiLayanan->label }}</h2>
        <p>{{ $isiLayanan->value }}</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row  justify-content-between">
          <div class="features-image col-lg-5 order-lg-2 d-flex align-items-center" data-aos="fade-up" data-aos-delay="100"><img src="assets/img/features.svg" class="img-fluid" alt=""></div>
          <div class="col-lg-6 d-flex flex-column justify-content-center">

            <div class="features-item d-flex ps-0 ps-lg-3 pt-4 pt-lg-0" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-archive flex-shrink-0"></i>
              <div>
                <h4>{{ $layanan1->label }}</h4>
                <p>{{ $layanan1->value }}</p>
              </div>
            </div><!-- End Features Item-->

            <div class="features-item d-flex mt-5 ps-0 ps-lg-3" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-basket flex-shrink-0"></i>
              <div>
                <h4>{{ $layanan2->label }}</h4>
                <p>{{ $layanan2->value }}</p>
              </div>
            </div><!-- End Features Item-->

            <div class="features-item d-flex mt-5 ps-0 ps-lg-3" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-broadcast flex-shrink-0"></i>
              <div>
                <h4>{{ $layanan3->label }}</h4>
                <p>{{ $layanan3->value }}</p>
              </div>
            </div><!-- End Features Item-->

            <div class="features-item d-flex mt-5 ps-0 ps-lg-3" data-aos="fade-up" data-aos-delay="500">
              <i class="bi bi-camera-reels flex-shrink-0"></i>
              <div>
                <h4>{{ $layanan4->label }}</h4>
                <p>{{ $layanan4->value }}/p>
              </div>
            </div><!-- End Features Item-->

          </div>
        </div>

      </div>

    </section><!-- /Features Section -->

        <!-- Services Section -->
        <section id="services" class="services section">

          <!-- Section Title -->
          <div class="container section-title" data-aos="fade-up">
            <h2>{{ $isiProduk->label }}</h2>
            <p>{{ $isiProduk->value }}</p>
          </div><!-- End Section Title -->

          <div class="container">

            <div class="row ">

              <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item d-flex">
                  <div class="icon flex-shrink-0"><i class="bi bi-briefcase"></i></div>
                  <div>
                    <h4 class="title"><a href="#" class="stretched-link">{{ $produk1->label }}</a></h4>
                    <p class="description">{{ $produk1->value }}</p>
                  </div>
                </div>
              </div>
              <!-- End Service Item -->

              <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-item d-flex">
                  <div class="icon flex-shrink-0"><i class="bi bi-card-checklist"></i></div>
                  <div>
                    <h4 class="title"><a href="#" class="stretched-link">{{ $produk2->label }}</a></h4>
                    <p class="description">{{ $produk2->value }}</p>
                  </div>
                </div>
              </div><!-- End Service Item -->

              <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-item d-flex">
                  <div class="icon flex-shrink-0"><i class="bi bi-bar-chart"></i></div>
                  <div>
                    <h4 class="title"><a href="#" class="stretched-link">{{ $produk3->label }}</a></h4>
                    <p class="description">{{ $produk3->value }}</p>
                  </div
                </div>
              </div><!-- End Service Item -->


            </div>

          </div>

        </section><!-- /Services Section -->


    <!-- Portfolio Section -->
<section id="portfolio" class="portfolio section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Pengalaman</h2>
      <p>Pengalaman perusahaan dalam membangun Website</p>
    </div>
    <!-- End Section Title -->

    <div class="container">
      @if ($pengalaman->isEmpty())
        <p>No data found.</p>
      @else
        <!-- Isotope Layout -->
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
          <div class="row isotope-container" data-aos="fade-up" data-aos-delay="200">
            @foreach ($pengalaman as $pengalamans)
              <div class="col-lg-4 col-md-6 gy-4 portfolio-item isotope-item filter-app">
                <div class="portfolio-content h-100">
                  <a href="pengalaman" data-gallery="portfolio-gallery-app" class="glightbox">
                    <img src="{{ Storage::url($pengalamans->image) }}" class="img-fluid" alt="">
                  </a>
                  <div class="portfolio-info">
                    <h4><a href="portfolio-details.html" title="More Details">{{ $pengalamans->projek }}</a></h4>
                    <p>Pemberi Tugas: {{ $pengalamans->klien }}</p>
                    <p>Lokasi: {{ $pengalamans->lokasi }}</p>
                    <p>Waktu: {{ $pengalamans->tahun }}</p>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
        <!-- End Isotope Layout -->
      @endif
    </div>
  </section>
  <!-- End Portfolio Section -->


<!-- pesan Section -->
<section id="pesan" class="pricing section">
  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Pesan</h2>
    <p>Selamat datang di layanan pemesanan online Tanniewa Putra. Kami berkomitmen untuk memberikan produk berkualitas terbaik untuk kebutuhan Anda. Silakan pilih produk yang diinginkan, isi formulir pemesanan, dan tim kami akan segera menghubungi Anda untuk proses selanjutnya.</p>
  </div><!-- End Section Title -->
  @if ($pesanwebsite->isEmpty())
  <p>No data found.</p>
    @else
  <div class="container">
    <div class="pricing-slider" style="display: flex; overflow-x: auto; gap: 20px; scroll-snap-type: x mandatory; padding: 10px;">
        @foreach ($pesanwebsite as $websites)

      <!-- Pricing Items -->
<div class="pricing-item" style="min-width: 300px; flex-shrink: 0; scroll-snap-align: start;" data-aos="zoom-in" data-aos-delay="100">
    <h3> {{ $websites->produk }} </h3>
    <h4><sup>Rp</sup> {{ substr($websites->harga, 0, -3) }} K<span> / month</span></h4>
    <ul>
        <li><i class="bi bi-check"></i> <span>{!! strip_tags($websites->keterangan) !!} </span></li>
        <li><i class="bi bi-check"></i> <span> perpanjangan : {{ $websites->perpanjangan }} / tahun</span></li>
        <li><i class="bi bi-link-45deg"></i>  <span><a href=" {{ $websites->link }} ">contoh desain</a></span></li>
      </ul>


    <a href="/pemesanan" class="buy-btn">Buy Now</a>
  </div><!-- End Pricing Item -->

  @endforeach
  @endif

    </div><!-- End Pricing Slider -->
  </div>
</section><!-- /Pricing Section -->


{{-- Karir --}}
    <section id="testimonials" class="testimonials section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Karir</h2>
            <p>Kami menyediakan beberapa posisi yang kebetulan sedang kosong di perusahaan. Bagi yang sedang mencari pekerjaan, dapat mencoba untuk bergabung bersama kami. Tentunya dengan keahlian yang sesuai dengan posisi tersebut.
                Ayo bergabung bersama kami untuk memajukan kinerja perusahaan.</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="swiper init-swiper" data-speed="600" data-delay="5000" data-breakpoints="{ &quot;320&quot;: { &quot;slidesPerView&quot;: 1, &quot;spaceBetween&quot;: 40 }, &quot;1200&quot;: { &quot;slidesPerView&quot;: 3, &quot;spaceBetween&quot;: 40 } }">
                <script type="application/json" class="swiper-config">
                    {
                        "loop": true,
                        "speed": 600,
                        "autoplay": {
                            "delay": 5000
                        },
                        "slidesPerView": "auto",
                        "pagination": {
                            "el": ".swiper-pagination",
                            "type": "bullets",
                            "clickable": true
                        },
                        "breakpoints": {
                            "320": {
                                "slidesPerView": 1,
                                "spaceBetween": 40
                            },
                            "1200": {
                                "slidesPerView": 3,
                                "spaceBetween": 20
                            }
                        }
                    }
                </script>
                <div class="swiper-wrapper">
                    @if ($karirList->isEmpty())
                        <p>Saat ini Lowongan tidak tersedia</p>
                    @else
                        @foreach($karirList as $karir)
                            <div class="swiper-slide">
                                <div class="testimonial-item">

                                    <p>
                                        <i class=" bi bi-quote quote-icon-left"></i>
                                        <span >{{ Str::limit(strip_tags($karir->keterangan), 100) }}</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                    <img src="{{ asset('assets/img/testimonials/testimonials-1.jpg') }}" class="testimonial-img" alt="">
                                    <h3> {{ $karir->job }}</h3>
                                    <h4><i class="bi bi-building"></i> {{ $karir->jenis }}</h4>
                                    <h4 class="gaji">Rp.{{ $karir->gaji }} jt / bulan</h4>

                                    <a href="/karir" class="daftar mt-2"><span>Daftar</span></a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div><!-- End swiper-wrapper -->

                <div class="swiper-pagination"></div>
            </div>
        </div>

    </section><!-- /Testimonials Section -->



    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Kontak</h2>
        <p>Hubungi kami untuk informasi lebih lanjut</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row ">

          <div class="col-lg-6">

            <div class="row ">
              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="200">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Alamat</h3>
                  <p>{{ $location }}</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="300">
                  <i class="bi bi-telephone"></i>
                  <h3>Call Us</h3>
                  <a href="wa.me/{{ $whatsapp }}"><p>{{ $whatsapp }}</p></a>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="400">
                  <i class="bi bi-envelope"></i>
                  <h3>Email</h3>
                  <p>{{ $email }}</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="500">
                  <i class="bi bi-clock"></i>
                  <h3>Pelayanan</h3>
                  <p>Setiap hari

                    </p>
                    <p>9:00 - 17:00</p>
                </div>
              </div><!-- End Info Item -->

            </div>

          </div>

          <!-- Contact Form Section -->
        <div class="col-lg-6">
            <form action="https://api.web3forms.com/submit" method="POST" class="contact">
            <div class="row">
                <input type="hidden" name="access_key" value="cb7aa505-86dd-4946-b3ee-56aa80bc716f">
                <div class="col-md-6 gy-4">
                <input type="text" id="name" name="name" class="form-control" placeholder="Your Name" required="">
                </div>
                <div class="col-md-6 gy-4">
                <input type="email" id="email" name="email" class="form-control" placeholder="Your Email" required="">
                </div>

                <div class="col-12 gy-4">
                    <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                  </div>

                <div class="col-12 gy-4">
                <textarea id="message" name="message" class="form-control" rows="6" placeholder="Message" required=""></textarea>
                </div>
                <div class="col-12 text-center gy-4">
                <button type="submit">Kirim Pesan</button>
                </div>
            </div>
            </form>
        </div>
        <!-- End Contact Form Section -->


        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer accent-background">

    <div class="container footer-top">
      <div class="row ">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Legalitas</span>
          </a>
          <p>{{ $legalitas }}</p>
          <div class="social-links d-flex mt-4">
            <a href="{{ $facebook }}"><i class="bi bi-facebook"></i></a>
            <a href="{{ $linkedin }}"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Our Services</h4>
          {{ $layanan }}
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Alamat</h4>
          <p>{{ $location }}</p>
          <p class="mt-4"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
          <p><strong>Email:</strong> <span>{{ $email }}</span></p>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">{{ $site_name }}</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>


  <!-- Message to Email -->


  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
