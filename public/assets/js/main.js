/**
* Template Name: Techie
* Template URL: https://bootstrapmade.com/techie-free-skin-bootstrap-3/
* Updated: Aug 07 2024 with Bootstrap v5.3.3
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/


(function() {
  "use strict";

  /**
   * Apply .scrolled class to the body as the page is scrolled down
   */
  function toggleScrolled() {
    const selectBody = document.querySelector('body');
    const selectHeader = document.querySelector('#header');
    if (!selectHeader.classList.contains('scroll-up-sticky') && !selectHeader.classList.contains('sticky-top') && !selectHeader.classList.contains('fixed-top')) return;
    window.scrollY > 100 ? selectBody.classList.add('scrolled') : selectBody.classList.remove('scrolled');
  }

  document.addEventListener('scroll', toggleScrolled);
  window.addEventListener('load', toggleScrolled);

  /**
   * Mobile nav toggle
   */
  const mobileNavToggleBtn = document.querySelector('.mobile-nav-toggle');

  function mobileNavToogle() {
    document.querySelector('body').classList.toggle('mobile-nav-active');
    mobileNavToggleBtn.classList.toggle('bi-list');
    mobileNavToggleBtn.classList.toggle('bi-x');
  }
  mobileNavToggleBtn.addEventListener('click', mobileNavToogle);

  /**
   * Hide mobile nav on same-page/hash links
   */
  document.querySelectorAll('#navmenu a').forEach(navmenu => {
    navmenu.addEventListener('click', () => {
      if (document.querySelector('.mobile-nav-active')) {
        mobileNavToogle();
      }
    });

  });

  /**
   * Toggle mobile nav dropdowns
   */
  document.querySelectorAll('.navmenu .toggle-dropdown').forEach(navmenu => {
    navmenu.addEventListener('click', function(e) {
      e.preventDefault();
      this.parentNode.classList.toggle('active');
      this.parentNode.nextElementSibling.classList.toggle('dropdown-active');
      e.stopImmediatePropagation();
    });
  });

  /**
   * Preloader
   */
  const preloader = document.querySelector('#preloader');
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove();
    });
  }

  /**
   * Scroll top button
   */
  let scrollTop = document.querySelector('.scroll-top');

  function toggleScrollTop() {
    if (scrollTop) {
      window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
    }
  }
  scrollTop.addEventListener('click', (e) => {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });

  window.addEventListener('load', toggleScrollTop);
  document.addEventListener('scroll', toggleScrollTop);

  /**
   * Animation on scroll function and init
   */
  function aosInit() {
    AOS.init({
      duration: 600,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    });
  }
  window.addEventListener('load', aosInit);

  /**
   * Initiate glightbox
   */
  const glightbox = GLightbox({
    selector: '.glightbox'
  });

  /**
   * Initiate Pure Counter
   */
  new PureCounter();

  /**
   * Init swiper sliders
   */
  function initSwiper() {
    document.querySelectorAll(".init-swiper").forEach(function(swiperElement) {
      let config = JSON.parse(
        swiperElement.querySelector(".swiper-config").innerHTML.trim()
      );

      if (swiperElement.classList.contains("swiper-tab")) {
        initSwiperWithCustomPagination(swiperElement, config);
      } else {
        new Swiper(swiperElement, config);
      }
    });
  }

  window.addEventListener("load", initSwiper);

  /**
   * Init isotope layout and filters
   */
  document.querySelectorAll('.isotope-layout').forEach(function(isotopeItem) {
    let layout = isotopeItem.getAttribute('data-layout') ?? 'masonry';
    let filter = isotopeItem.getAttribute('data-default-filter') ?? '*';
    let sort = isotopeItem.getAttribute('data-sort') ?? 'original-order';

    let initIsotope;
    imagesLoaded(isotopeItem.querySelector('.isotope-container'), function() {
      initIsotope = new Isotope(isotopeItem.querySelector('.isotope-container'), {
        itemSelector: '.isotope-item',
        layoutMode: layout,
        filter: filter,
        sortBy: sort
      });
    });

    isotopeItem.querySelectorAll('.isotope-filters li').forEach(function(filters) {
      filters.addEventListener('click', function() {
        isotopeItem.querySelector('.isotope-filters .filter-active').classList.remove('filter-active');
        this.classList.add('filter-active');
        initIsotope.arrange({
          filter: this.getAttribute('data-filter')
        });
        if (typeof aosInit === 'function') {
          aosInit();
        }
      }, false);
    });

  });

  /**
   * Frequently Asked Questions Toggle
   */
  document.querySelectorAll('.faq-item h3, .faq-item .faq-toggle').forEach((faqItem) => {
    faqItem.addEventListener('click', () => {
      faqItem.parentNode.classList.toggle('faq-active');
    });
  });

  /**
   * Correct scrolling position upon page load for URLs containing hash links.
   */
  window.addEventListener('load', function(e) {
    if (window.location.hash) {
      if (document.querySelector(window.location.hash)) {
        setTimeout(() => {
          let section = document.querySelector(window.location.hash);
          let scrollMarginTop = getComputedStyle(section).scrollMarginTop;
          window.scrollTo({
            top: section.offsetTop - parseInt(scrollMarginTop),
            behavior: 'smooth'
          });
        }, 100);
      }
    }
  });

  /**
   * Navmenu Scrollspy
   */
  let navmenulinks = document.querySelectorAll('.navmenu a');

  function navmenuScrollspy() {
    navmenulinks.forEach(navmenulink => {
      if (!navmenulink.hash) return;
      let section = document.querySelector(navmenulink.hash);
      if (!section) return;
      let position = window.scrollY + 200;
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        document.querySelectorAll('.navmenu a.active').forEach(link => link.classList.remove('active'));
        navmenulink.classList.add('active');
      } else {
        navmenulink.classList.remove('active');
      }
    })
  }
  window.addEventListener('load', navmenuScrollspy);
  document.addEventListener('scroll', navmenuScrollspy);

})();


document.getElementById('job-application-form').addEventListener('submit', function(event) {
  event.preventDefault(); // Cegah pengiriman default formulir

  const form = this;
  const submitButton = form.querySelector("button[type='submit']");
  const formData = new FormData(form);

   // Nonaktifkan tombol submit agar tidak bisa diklik lagi
    submitButton.disabled = true;
    submitButton.textContent = "Mengirim..."; // Ubah teks tombol untuk menunjukkan status pengiriman


  // Kirim formulir ke Laravel
  fetch(form.action, {
    method: 'POST',
    body: formData,
    headers: {
      'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
    }
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
    //   alert('Formulir berhasil disimpan di database!');
      // Kirim data ke Web3Forms
      fetch('https://api.web3forms.com/submit', {
        method: 'POST',
        body: formData
      })
      .then(res => res.json())
      .then(result => {
        if (result.success) {
             // Menampilkan pesan sukses
            document.getElementById("success-message").style.display = "block";

            // Alihkan ke halaman utama setelah beberapa detik
            setTimeout(() => {
            window.location.href = "/";
            }, 1500); // Redirect setelah 3,5 detik
        } else {
          alert('Gagal mengirim ke Web3Forms.');
        }
      });
    } else {
      alert('Gagal menyimpan data di database.');
    }
  })
  .catch(error => console.error('Error:', error));
});


// ABOUTS
    document.addEventListener("DOMContentLoaded", function() {
        // Set label dari localStorage jika ada
        const lastSelectedTentang = localStorage.getItem("lastDropdownTentangSelection");
        if (lastSelectedTentang) {
            document.getElementById("dropdown-tentang-label").textContent = lastSelectedTentang;
        }

        // Event listener untuk scroll
        window.addEventListener("scroll", updateLabelOnScroll);
    });

    function updateDropdownTentangLabel(selectedText) {
        // Ubah teks label dropdown
        document.getElementById("dropdown-tentang-label").textContent = selectedText;

        // Simpan pilihan terakhir di localStorage
        localStorage.setItem("lastDropdownTentangSelection", selectedText);
    }

    function updateLabelOnScroll() {
        const sections = [
            { id: "about", label: "Tentang" },
            { id: "Sejarah", label: "Sejarah" },
            { id: "visimisi", label: "Visi Misi" },
            { id: "team", label: "Tim" }
        ];

        const navbarHeight = document.querySelector(".header").offsetHeight;
        const scrollPosition = window.scrollY + navbarHeight + (window.innerHeight / 2);

        // Loop untuk cek bagian mana yang saat ini terlihat di viewport
        for (const section of sections) {
            const element = document.getElementById(section.id);
            if (element) {
                const elementTop = element.offsetTop;
                const elementBottom = elementTop + element.offsetHeight;

                // Debugging informasi posisi scroll dan elemen
                console.log(`Checking section: ${section.label}, scrollPosition: ${scrollPosition}, elementTop: ${elementTop}, elementBottom: ${elementBottom}`);

                // Cek apakah scrollPosition ada di dalam elemen saat ini
                if (scrollPosition >= elementTop && scrollPosition < elementBottom) {
                    document.getElementById("dropdown-tentang-label").textContent = section.label;
                    localStorage.setItem("lastDropdownTentangSelection", section.label);
                    break;
                }
            }
        }
    }
