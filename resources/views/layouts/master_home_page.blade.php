<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield("title")</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ URL::asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ URL::asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ URL::asset('assets/frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/frontend/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/frontend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/frontend/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/frontend/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/frontend/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ URL::asset('assets/frontend/css/main.css') }}" rel="stylesheet">

</head>

<body>

<header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex justify-content-between align-items-center">

        <!-- Logo section -->
        <div class="logo-container d-flex align-items-center">
            <a href="{{url('/')}}" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="{{ URL::asset('assets/img/logo.svg') }}" alt="" class="logo-img">
            </a>
        </div>

        <!-- Navbar section -->
        <div class="navbar-container">
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="{{url('/')}}" id="link-home">Startseite</a></li>
                    <li class="dropdown"><a href="#" id="link-services"><span>Dienstleistungen</span> <i
                                class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            @foreach($services as $x)
                                <li><a href="{{ route('show_services', ['section_name' => urlencode(str_replace(' ', '-', $x))]) }}">{{$x}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#" id="link-projects"><span>Projekte</span> <i
                                class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            @foreach($projects as $one)
                                <li><a href="{{ route('show_projects', ['section_name' => urlencode(str_replace(' ', '-', $one))]) }}">{{$one}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{route('about_us')}}" id="link-about">Über uns</a></li>
                    <li><a href="{{route('contact_us')}}" id="link-contact">Kontakt</a></li>
                </ul>
            </nav>
        </div><!-- .navbar-container -->

    </div>
</header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url({{asset(url("/assets/img/breadcrumbs-bg.jpg"))}})">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>@yield('current_page')</h2>
          <ol>
              <li><a href="{{ url('/') }}">Start Seite</a></li>
              @hasSection('current_page')
                  <li>@yield('current_page')</li>
              @endif
              @hasSection('service_name')
                  <li>@yield('service_name')</li>
              @endif

          </ol>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

          @yield('contents')

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

    <div class="footer-content position-relative">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6">
                    <div class="footer-info">
                        <a href="{{url('/')}}">
                            <!-- Uncomment the line below if you also wish to use an image logo -->
                            <img src="{{ URL::asset('assets/img/logo.png') }}" alt="Oplas Bau" style="max-height: 130px;">
                        </a>
                    </div>
                </div><!-- End footer info column-->

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>ADRESSE</h4>
                    <a href="{{$information->address_link}}">
                        {{$information->address}}
                    </a>
                </div><!-- End footer links column-->

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>KONTAKTE INFO</h4>
                    <p style="var(--color-primary);">
                        {{$information->email}}<br>
                        {{$information->phone_number}}<br>
                    </p>
                </div><!-- End footer links column-->

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>SOZIALE MEDIEN</h4>
                    <div class="social-links d-flex mt-3">
                        <a href="https://wa.me/{{$information->phone_number}}" class="d-flex align-items-center justify-content-center"><i class="bi bi-whatsapp"></i></a>
                        <a href="{{$information->facebook_link}}" class="d-flex align-items-center justify-content-center"><i class="bi bi-facebook"></i></a>
                        <a href="{{$information->instagram_link}}" class="d-flex align-items-center justify-content-center"><i class="bi bi-instagram"></i></a>
                        <a href="{{$information->tiktok_link}}" class="d-flex align-items-center justify-content-center"><i class="bi bi-tiktok"></i></a>
                    </div>
                </div><!-- End footer links column-->

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>UNTERNEHMEN</h4>
                    <ul>
                        <li><a href="#">Impressum</a></li>
                        <li><a href="{{route('data_protection')}}">Datenschutz</a></li>
                        <li><a href="{{route('contact_us')}}">Kontakt</a></li>
                    </ul>
                </div><!-- End footer links column-->

            </div>
        </div>
    </div>

    <div class="footer-legal text-center position-relative">
        <div class="container">
            <div class="copyright">
                &copy;
                <script>document.write(new Date().getFullYear());</script>
                <a href="https://www.louioklaa.de/" style="font-weight: bolder;">Loui Oklaa</a> Alle Rechte
                vorbehalten.
                <a href="https://github.com/LouiOklaa" class="fab fa-github"></a>
                <a href="https://www.facebook.com/loui.oklaa/" class="fab fa-facebook"></a>
                <a href="https://www.linkedin.com/in/loui-oklaa/" class="fab fa-linkedin"></a>
                <a href="https://www.instagram.com/loui_oklaa/" class="fab fa-instagram"></a>
                <a href="https://wa.me/+4917670352663" class="fab fa-whatsapp"></a>
                <a href="https://x.com/loui_oklaa">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16" style="margin-bottom: 3px">
                        <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>

</footer>
<!-- End Footer -->

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="{{ URL::asset('assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::asset('assets/frontend/vendor/aos/aos.js') }}"></script>
<script src="{{ URL::asset('assets/frontend/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ URL::asset('assets/frontend/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ URL::asset('assets/frontend/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ URL::asset('assets/frontend/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ URL::asset('assets/frontend/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ URL::asset('assets/frontend/js/main.js') }}"></script>

<!-- Sort Services Script -->
<script>
    document.getElementById('sort1').addEventListener('change', function () {
        const sortValue = this.value;

        // Define the filter option as the first option in the list of choices
        const filterOption = this.options[0];
        // Hide or show the filter option based on the selected option
        if (sortValue) {
            filterOption.style.display = 'none'; // Hide the filter option
        } else {
            filterOption.style.display = 'block'; // Show the filter option if nothing is
        }

        const page = new URLSearchParams(window.location.search).get('page') || 1;
        const sectionName = document.querySelector('input[name="sectionName"]').value;

        fetch(`{{ route('sort_services') }}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ sort: sortValue, page: page , sectionName: sectionName,})
        })
            .then(response => response.json())
            .then(data => {
                // Update the page content with the new value returned.
                document.querySelector('.gy-5').innerHTML = data.html;
            })
            .catch(error => console.error('Error:', error));
    });
</script>

<!-- Sort All Services Script -->
<script>
    document.getElementById('sort2').addEventListener('change', function () {
        const sortValue = this.value;

        // Define the filter option as the first option in the list of choices
        const filterOption = this.options[0];
        // Hide or show the filter option based on the selected option
        if (sortValue) {
            filterOption.style.display = 'none'; // Hide the filter option
        } else {
            filterOption.style.display = 'block'; // Show the filter option if nothing is
        }

        const page = new URLSearchParams(window.location.search).get('page') || 1;

        fetch(`{{ route('sort_all_services') }}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ sort: sortValue, page: page })
        })
            .then(response => response.json())
            .then(data => {
                // Update the page content with the new value returned.
                document.querySelector('.gy-5').innerHTML = data.html;
            })
            .catch(error => console.error('Error:', error));
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const currentURL = location.href;

        const aboutLink = document.getElementById('link-about');
        const contactLink = document.getElementById('link-contact');
        const serviceLinks = document.querySelectorAll('.service-link');
        const projectLinks = document.querySelectorAll('.project-link');

        let isServiceActive = false;
        let isProjectActive = false;

        serviceLinks.forEach(link => {
            if (link.href === currentURL) {
                isServiceActive = true;
            }
        });

        projectLinks.forEach(link => {
            if (link.href === currentURL) {
                isProjectActive = true;
            }
        });

        if (aboutLink && aboutLink.href === currentURL) {
            aboutLink.classList.add('active');
        }

        if (contactLink && contactLink.href === currentURL) {
            contactLink.classList.add('active');
        }

        if (isServiceActive) {
            document.getElementById('link-services').classList.add('active');
        }

        if (isProjectActive) {
            document.getElementById('link-projects').classList.add('active');
        }
    });
</script>

<!-- Sort Projects Script -->
<script>
    document.getElementById('sort3').addEventListener('change', function () {
        const sortValue = this.value;

        // Define the filter option as the first option in the list of choices
        const filterOption = this.options[0];
        // Hide or show the filter option based on the selected option
        if (sortValue) {
            filterOption.style.display = 'none'; // Hide the filter option
        } else {
            filterOption.style.display = 'block'; // Show the filter option if nothing is
        }

        const page = new URLSearchParams(window.location.search).get('page') || 1;
        const sectionName = document.querySelector('input[name="sectionName"]').value;

        fetch(`{{ route('sort_projects') }}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ sort: sortValue, page: page , sectionName: sectionName,})
        })
            .then(response => response.json())
            .then(data => {
                // Update the page content with the new value returned.
                document.querySelector('.gy-4').innerHTML = data.html;
            })
            .catch(error => console.error('Error:', error));
    });
</script>

<!-- Sort All Projects Script -->
<script>
    document.getElementById('sort4').addEventListener('change', function () {
        const sortValue = this.value;

        // Define the filter option as the first option in the list of choices
        const filterOption = this.options[0];
        // Hide or show the filter option based on the selected option
        if (sortValue) {
            filterOption.style.display = 'none'; // Hide the filter option
        } else {
            filterOption.style.display = 'block'; // Show the filter option if nothing is
        }

        const page = new URLSearchParams(window.location.search).get('page') || 1;

        fetch(`{{ route('sort_all_projects') }}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ sort: sortValue, page: page })
        })
            .then(response => response.json())
            .then(data => {
                // Update the page content with the new value returned.
                document.querySelector('.gy-4').innerHTML = data.html;
            })
            .catch(error => console.error('Error:', error));
    });
</script>
@yield('JS')

</body>

</html>

