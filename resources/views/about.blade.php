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
    // $appId = get_applications_by_id('');


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
  <link href="{{ asset('assets/img/LogoTanniewa.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  {{-- <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet"> --}}
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">


  <!-- =======================================================
  * Template Name: Techie
  * Template URL: https://bootstrapmade.com/techie-free-skin-bootstrap-3/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top" style="background-color: #800909;">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
         <div class="logo"><img src="{{asset('assets/img/LogoTanniewa.png')}}" alt=""></div>
        <h1 class="sitename">{{ $site_name }}</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
            <li><a href="../../#hero">Beranda</a></li>
            <li class="dropdown"><a href="/about"><span id="dropdown-tentang-label">Tentang</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                    <li><a href="#about" class="dropdown-item" onclick="updateDropdownTentangLabel('Tentang')">{{ $about->title }}</a></li>
                    <li><a href="#Sejarah" class="dropdown-item" onclick="updateDropdownTentangLabel('Sejarah')">{{ $sejarah->title }}</a></li>
                    <li><a href="#visimisi" class="dropdown-item" onclick="updateDropdownTentangLabel('Visi Misi')">Visi Misi</a></li>
                    <li><a href="#team" class="dropdown-item" onclick="updateDropdownTentangLabel('Tim')">Tim</a></li>
                </ul>
            </li>

            <li><a href="../../#services">Layanan</a></li>
            <li><a href="../../#portfolio">Pengalaman</a></li>
            <li><a href="../../#kontak">Karir</a></li>
            <li><a href="../../#contact">Kontak</a></li>
            <li class="dropdown">
                <a href="#"><span id="dropdown-label">Lainnya</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul id="dropdown-options">
                    @if ($app->isEmpty())
                        <li><p>Data tidak ada</p></li>
                    @else
                        @foreach ($app as $apps)
                            <li>
                                <a href="{{ route('newApp.show', $apps->id) }}" class="dropdown-item" onclick="updateDropdownLabel(event, '{{ $apps->title }}')">
                                    {{ $apps->title }}
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </li>

        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="" >Get Started</a>

    </div>
  </header>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Cek apakah ada pilihan dropdown tersimpan di local storage
        const lastSelectedText = localStorage.getItem("lastDropdownSelection");

        if (lastSelectedText) {
            // Atur teks label dropdown menjadi pilihan terakhir yang tersimpan
            document.getElementById("dropdown-label").textContent = lastSelectedText;
        }
    });

    function updateDropdownLabel(event, selectedText) {
        // Ubah teks label dropdown
        document.getElementById("dropdown-label").textContent = selectedText;

        // Simpan pilihan terakhir di local storage
        localStorage.setItem("lastDropdownSelection", selectedText);

        // Menghapus kelas aktif dari semua item di dropdown
        document.querySelectorAll('#dropdown-options .dropdown-item').forEach(item => {
            item.classList.remove('active');
        });

        // Menambahkan kelas aktif ke item yang diklik
        event.target.classList.add('active');
    }
</script>



  {{-- <main class="main"> --}}

    <main class="main">

<!-- About Section -->
<section id="about" class="about section" style="margin-top: 80px">

    <div class="container">

      <div class="row ">

        <div class="col-lg-6 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="100">
          <img src="{{ Storage::url($about->image) }}" class="img-fluid" alt="">
        </div>

        <div class="col-lg-6 order-1 order-lg-2 content" data-aos="fade-up" data-aos-delay="200">
          <h3>{{ $about->title }}</h3>
          <p class="desk-about">
              {{ $about->subtitle }}
          </p>
          <p style="text-align: justify;" class="desk-about">{!! strip_tags($about->content) !!}</p>
          <a href="#" class="read-more"><span>Kontak</span><i class="bi bi-arrow-right"></i></a>
        </div>

      </div>

    </div>

  </section><!-- /About Section -->

  <!-- Sejarah Section -->
  <section id="Sejarah" class="Sejarah section">

    <div class="container">

      <div class="row ">

        <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="200">
          <img src="{{ Storage::url($sejarah->image) }}" class="img-fluid" alt="">
        </div>

        <div class="col-lg-6 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="100">
          <h3>{{ $sejarah->title }}</h3>
          <p style="text-align: justify;" class="desk-Sejarah">{!! strip_tags($sejarah->content) !!}
            <ul>
              <li>Perancangan Software</li>
              <li>Sistem  informasi berbasis Web (Web based Information Systems)</li>
              <li>Jaringan (Networking)</li>
              <li>Pelatihan (Training)</li>
            </ul>
            </p>
        </div>

      </div>

    </div>

  </section><!-- /Sejarah Section -->

  <!-- Visi Misi Section -->
  <section id="visimisi" class="visimisi section">

    <div class="container">

      <div class="container section-title" data-aos="fade-up">

       <div class="visimisi"><h2>{{ $visi->title }}</h2>
       <p>{!! strip_tags($visi->content) !!}</p>
       <h2>{{ $misi->title }}</h2>
       <p>{!! strip_tags($misi->content) !!}</p>

      </div>
    </div>

    </div>

  </section><!-- /visimisi Section -->

      <!-- Team Section -->
<section id="team" class="team section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Team</h2>
    <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
  </div><!-- End Section Title -->

  <div class="container">
    @if ($teams->isEmpty())
      <p>No data found.</p>
    @else
      <div class="row ">
        @foreach ($teams as $team)
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member">
              <div class="member-img">
                <img src="{{ Storage::url($team->image) }}" class="img-fluid" alt="{{ $team->name }}">
                <div class="social">
                  <a href="#"><i class="bi bi-facebook"></i></a>
                  <a href="#"><i class="bi bi-instagram"></i></a>
                  <a href="#"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>{{ $team->name }}</h4>
                <span>{{ $team->position }}</span>
                <p>{{ $team->description }}</p>
              </div>
            </div>
          </div><!-- End Team Member -->
        @endforeach
      </div>
    @endif
  </div>

</section><!-- /Team Section -->




  <footer id="footer" class="footer accent-background">

    <div class="container footer-top">
      <div class="row gy-4">
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

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
