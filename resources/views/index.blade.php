<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>OPLAS BAU</title>
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
                    <li><a href="{{url('/')}}" class="active">Startseite</a></li>
                    <li class="dropdown"><a href="#"><span>Dienstleistungen</span> <i
                                class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            @foreach($services->pluck('section_name')->unique() as $one)
                                <li><a href="{{ route('show_services', ['section_name' => urlencode(str_replace(' ', '-', $one))]) }}">{{$one}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span>Projekte</span> <i
                                class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            @foreach($projects->pluck('section_name')->unique() as $one)
                                <li><a href="{{ route('show_projects', ['section_name' => urlencode(str_replace(' ', '-', $one))]) }}">{{$one}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="about.html">Über uns</a></li>
                    <li><a href="contact.html">Kontakt</a></li>
                </ul>
            </nav>
        </div><!-- .navbar-container -->

    </div>
</header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">

    <div class="info d-flex align-items-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <h2 data-aos="fade-down"><span style="color: var(--color-primary)">Willkommen bei</span><br><span>OPLAS BAU</span></h2>
            <p data-aos="fade-up">Ihrem Experten für hochwertige Bauleistungen!
                Unsere Firma bietet Ihnen professionelle Dienstleistungen im Bereich Trockenbau, Parkett, Laminat, Fliesen, Gipskarton und Malerarbeiten. Mit langjähriger Erfahrung und einem qualifizierten Team verwirklichen wir Ihre Bauwünsche bis ins kleinste Detail.</p>
            <a data-aos="fade-up" data-aos-delay="200" href="#jetzt-starten" class="btn-get-started">Jetzt Starten</a>
          </div>
        </div>
      </div>
    </div>

    <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

      <div class="carousel-item active" style="background-image: url(assets/img/hero-carousel/hero-carousel-1.jpg)">
      </div>
      <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/hero-carousel-2.jpg)"></div>
      <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/hero-carousel-3.jpg)"></div>
      <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/hero-carousel-4.jpg)"></div>
      <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/hero-carousel-5.jpg)"></div>

      <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>

  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= Get Started Section ======= -->
    <section id="jetzt-starten" class="get-started section-bg">
      <div class="container">

        <div class="row justify-content-between gy-4">

          <div class="col-lg-6 d-flex align-items-center" data-aos="fade-up">
            <div class="content">
              <h3>Ihr Projekt ist unsere Leidenschaft von der Planung bis zur Fertigstellung!</h3>
              <p>Jedes Bauprojekt beginnt mit einer Vision – und wir sind hier, um sie Wirklichkeit werden zu lassen. Ob es sich um Trockenbau, Parkett, Laminat, Fliesen, Gipskarton oder Malerarbeiten handelt – unser erfahrenes Team begleitet Sie bei jedem Schritt des Weges, von der ersten Planung bis zur letzten Feinabstimmung. Wir legen höchsten Wert auf Qualität, Präzision und Ihre Zufriedenheit. Kontaktieren Sie uns und lassen Sie uns gemeinsam die Räume schaffen, die Ihren Vorstellungen und Wünschen entsprechen!
            </div>
          </div>

          <div class="col-lg-5" data-aos="fade">
            <form action="forms/quote.php" method="post" class="php-email-form">
              <h3>Fragen Sie gerne an!</h3>
              <p>Wir sind für Sie da – lassen Sie uns wissen, wie wir helfen können!</p>
              <div class="row gy-3">

                <div class="col-md-12">
                  <input type="text" name="name" class="form-control" placeholder="Name" required>
                </div>

                <div class="col-md-12 ">
                  <input type="email" class="form-control" name="email" placeholder="E-Mail" required>
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="phone" placeholder="Telefonnummer" required>
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Ihr Nachricht" required></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your quote request has been sent successfully. Thank you!</div>

                  <button type="submit">Senden</button>
                </div>

              </div>
            </form>
          </div><!-- End Quote Form -->

        </div>

      </div>
    </section><!-- End Get Started Section -->

      <!-- ======= Features Section ======= -->
      <section id="features" class="features">
          <div class="container" data-aos="fade-up">

              <ul class="nav nav-tabs row  g-2 d-flex">

                  <li class="nav-item col-3">
                      <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
                          <h4>Hohe Qualität</h4>
                      </a>
                  </li><!-- End tab nav item -->

                  <li class="nav-item col-3">
                      <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
                          <h4>Vollständige Sicherheit</h4>
                      </a><!-- End tab nav item -->

                  <li class="nav-item col-3">
                      <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-3">
                          <h4>Umfangreiche Erfahrung</h4>
                      </a>
                  </li><!-- End tab nav item -->

                  <li class="nav-item col-3">
                      <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-4">
                          <h4>Präzision in der Arbeit</h4>
                      </a>
                  </li><!-- End tab nav item -->

              </ul>

              <div class="tab-content">

                  <div class="tab-pane active show" id="tab-1">
                      <div class="row">
                          <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center"
                               data-aos="fade-up" data-aos-delay="100">
                              <h3>Qualität, die begeistert</h3>
                              <p class="fst-italic">
                                  Wir bei OPLAS BAU gewährleisten die Umsetzung von Projekten nach den höchsten Qualitätsstandards.
                              </p>
                              <ul>
                                  <li><i class="bi bi-check2-all"></i> Unser geschultes Team sorgt dafür, dass jedes Projekt präzise ausgeführt wird.</li>
                                  <li><i class="bi bi-check2-all"></i> Wir verwenden hochwertige Baustoffe, um Haltbarkeit zu gewährleisten.</li>
                                  <li><i class="bi bi-check2-all"></i> Wir überwachen kontinuierlich den Fortschritt der Arbeiten, um die Qualität sicherzustellen.</li>
                              </ul>
                          </div>
                          <div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                              <img src="assets/img/features-1.jpg" alt="" class="img-fluid">
                          </div>
                      </div>
                  </div><!-- End tab content item -->

                  <div class="tab-pane" id="tab-2">
                      <div class="row">
                          <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                              <h3>Sicherheit steht an erster Stelle</h3>
                              <p class="fst-italic">
                                  Die Sicherheit der Mitarbeiter und der Baustelle hat bei OPLAS BAU oberste Priorität.
                              </p>
                              <ul>
                                  <li><i class="bi bi-check2-all"></i> Wir befolgen strenge Sicherheitsvorkehrungen in allen unseren Projekten.</li>
                                  <li><i class="bi bi-check2-all"></i> Unser Team wird kontinuierlich in Sicherheitsverfahren geschult.</li>
                                  <li><i class="bi bi-check2-all"></i> Wir verwenden moderne Ausrüstung, um eine sichere Arbeitsumgebung zu gewährleisten.</li>

                              </ul>
                          </div>
                          <div class="col-lg-6 order-1 order-lg-2 text-center">
                              <img src="assets/img/features-2.jpg" alt="" class="img-fluid">
                          </div>
                      </div>
                  </div><!-- End tab content item -->

                  <div class="tab-pane" id="tab-3">
                      <div class="row">
                          <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                              <h3>Erfahrung, die zählt</h3>
                              <p class="fst-italic">
                                  Dank unserer langjährigen Erfahrung bieten wir innovative und effiziente Lösungen für Bauprojekte.
                              </p>
                              <ul>
                                  <li><i class="bi bi-check2-all"></i> Wir haben erfolgreich zahlreiche komplexe Projekte realisiert.</li>
                                  <li><i class="bi bi-check2-all"></i> Wir verfügen über fundiertes Wissen in allen Bereichen des Bauens.</li>
                                  <li><i class="bi bi-check2-all"></i> Wir verstehen die Anforderungen des Marktes und die Bedürfnisse unserer Kunden.</li>
                              </ul>
                          </div>
                          <div class="col-lg-6 order-1 order-lg-2 text-center">
                              <img src="assets/img/features-3.jpg" alt="" class="img-fluid">
                          </div>
                      </div>
                  </div><!-- End tab content item -->

                  <div class="tab-pane" id="tab-4">
                      <div class="row">
                          <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                              <h3>Präzision bei jedem Schritt</h3>
                              <p class="fst-italic">
                                  Wir legen großen Wert auf Details und halten uns strikt an den Zeitplan.
                              </p>
                              <ul>
                                  <li><i class="bi bi-check2-all"></i> Jede Phase des Projekts wird präzise ausgeführt, um das bestmögliche Ergebnis zu erzielen.</li>
                                  <li><i class="bi bi-check2-all"></i> Wir garantieren die pünktliche Lieferung gemäß dem festgelegten Plan.</li>
                                  <li><i class="bi bi-check2-all"></i> Jedes Projekt wird mit höchster Sorgfalt durchgeführt, um die beste Qualität zu gewährleisten.</li>
                              </ul>
                          </div>
                          <div class="col-lg-6 order-1 order-lg-2 text-center">
                              <img src="assets/img/features-4.jpg" alt="" class="img-fluid">
                          </div>
                      </div>
                  </div><!-- End tab content item -->

              </div>

          </div>
      </section><!-- End Features Section -->

      <!-- ======= Services Section ======= -->
      <section id="recent-blog-posts" class="recent-blog-posts">
          <div class="container" data-aos="fade-up">
              <div class=" section-header">
                  <h2>Dienstleistungen</h2>
                  <p>Wir bei OPLAS BAU bieten eine breite Palette von Dienstleistungen im Bauwesen an, die speziell auf die Bedürfnisse unserer Kunden zugeschnitten sind.</p>
              </div>
              <div class="row gy-5">
                  @php
                      $displayedSections = [];
                      $servicesDisplayedCount = 0;
                  @endphp
                  @foreach($services as $one)
                      @if (!in_array($one->section_name, $displayedSections) && $servicesDisplayedCount < 6)
                          <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                              <div class="post-item position-relative h-100">
                                  <div class="post-img position-relative overflow-hidden">
                                      <a href="{{asset( 'Attachments/Services/' . $one->image)}}">
                                          <img src="{{url('/Attachments/Services/' .$one->image)}}" class="img-fluid" alt=""
                                               style="object-fit: cover; width: 100%; height: 300px;">
                                      </a>
                                  </div>
                                  <div class="post-content d-flex flex-column">
                                      <h3 class="post-title">{{$one->name}}</h3>
                                      <div class="meta d-flex align-items-center">
                                          <div class="d-flex align-items-center">
                                             <span class="ps-2" style="color: var(--color-primary); font-weight: bold">{{$one->section_name}}</span>
                                          </div>
                                      </div>
                                      <hr>
                                      <div class="meta d-flex align-items-center">
                                          <div class="d-flex align-items-center">
                                              <span class="ps-2">
                                                  <span class="post-title">Beschreibung :</span>
                                                  @if($one->note != 0)
                                                    {{$one->note}}
                                                  @else
                                                    Unverfügbar
                                                  @endif
                                              </span>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          @php
                              $displayedSections[] = $one->section_name;
                              $servicesDisplayedCount++;
                          @endphp
                     @endif
                  @endforeach
                  <div class="text-center">
                    <a class="btn button-y" href="{{ route('all_services') }}">Alle Dienstleistungen anzeigen</a>
                  </div>
              </div>
          </div>
      </section>
      <!-- End Services Section -->

    <!-- ======= Alt Services Section ======= -->
    <section id="alt-services" class="alt-services">
      <div class="container" data-aos="fade-up">

        <div class="row justify-content-around gy-4">
          <div class="col-lg-6 img-bg" style="background-image: url(assets/img/alt-services.jpg);" data-aos="zoom-in"
            data-aos-delay="100"></div>

          <div class="col-lg-5 d-flex flex-column justify-content-center">
            <h3>Unsere Leistungen im Überblick</h3>
            <p>Wir bieten Ihnen eine umfassende Palette an Bau- und Innenausbaudienstleistungen. Jede unserer Leistungen wird mit höchster Präzision und Qualität ausgeführt, um Ihre Erwartungen zu übertreffen.</p>

            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="100">
              <i class="bi bi-easel flex-shrink-0"></i>
              <div>
                <h4><a href="" class="stretched-link">Trockenbau und Fassadenbau</a></h4>
                <p>Wir bieten maßgeschneiderte Lösungen im Bereich Trockenbau und Fassadenbau, die funktionale Innenräume und ästhetische, langlebige Außenfassaden schaffen.</p>
              </div>
            </div><!-- End Icon Box -->

            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-patch-check flex-shrink-0"></i>
              <div>
                <h4><a href="" class="stretched-link">Parkett und Laminat Verlegung</a></h4>
                <p>Unser Service für die Verlegung von Parkett und Laminat garantiert Ihnen langlebige, stilvolle Böden, die Ihre Räume aufwerten.</p>
              </div>
            </div><!-- End Icon Box -->

            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-brightness-high flex-shrink-0"></i>
              <div>
                <h4><a href="" class="stretched-link"> Fliesenarbeiten und Gipskarton/Dekorbau</a></h4>
                <p>Unsere Fliesenarbeiten sorgen für exakte Verlegung, während wir mit Gipskarton und Dekorbau kreative und funktionale Raumgestaltungen umsetzen.</p>
              </div>
            </div><!-- End Icon Box -->

            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-brightness-high flex-shrink-0"></i>
              <div>
                <h4><a href="" class="stretched-link">Malerarbeiten</a></h4>
                <p>Unsere Malerarbeiten verleihen Ihren Räumen einen frischen, präzisen Anstrich mit hochwertigen Farben.</p>
              </div>
            </div><!-- End Icon Box -->

          </div>
        </div>

      </div>
    </section><!-- End Alt Services Section -->


    <!-- ======= Our Projects Section ======= -->
      <section id="projects" class="projects">
          <div class="container" data-aos="fade-up">

              <div class="section-header">
                  <h2>Unsere Projekte</h2>
                  <p>Entdecken Sie unsere abgeschlossenen Projekte und überzeugen Sie sich von der Qualität unserer Arbeit. Jedes Projekt wird mit höchster Präzision und Hingabe umgesetzt, um Ihre Erwartungen zu übertreffen.</p>
              </div>

              <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                   data-portfolio-sort="original-order">

                  <ul class="portfolio-flters" data-aos="fade-up" data-aos-delay="100">
                      <li data-filter="*" class="filter-active">All</li>
                      @php
                          $displayedProjectsSections = [];
                      @endphp
                      @foreach($projects as $project)
                          @if (!in_array($project->section_name, $displayedProjectsSections))
                              <li data-filter=".filter-{{ \Str::slug($project->section_name) }}">{{ $project->section_name }}</li>
                              @php
                                  $displayedProjectsSections[] = $project->section_name;
                              @endphp
                          @endif
                      @endforeach
                  </ul><!-- End Projects Filters -->

                  <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                      @php
                          $sectionProjects = [];
                      @endphp
                      @foreach($projects as $project)
                          @php
                              $sectionKey = \Str::slug($project->section_name);
                              if (!isset($sectionProjects[$sectionKey])) {
                                  $sectionProjects[$sectionKey] = [];
                              }
                              $sectionProjects[$sectionKey][] = $project;
                          @endphp
                      @endforeach

                      @foreach($sectionProjects as $sectionKey => $projects)
                          @foreach(array_slice($projects, 0, 6) as $project)
                                  <?php $mediaExtensions = pathinfo("Attachments/Galerie/$project->media", PATHINFO_EXTENSION) ?>
                              <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $sectionKey }}">
                                  <div class="portfolio-content h-100">
                                      @if(in_array($mediaExtensions , ['jpg' , 'jpeg' , 'png' , 'gif']))
                                          <img style="width: 100%; height: 300px; object-fit: cover;" src="{{ asset('Attachments/Galerie/' . $project->media) }}" class="img-fluid" />
                                      @elseif(in_array($mediaExtensions , ['mp4' , 'mkv' , 'mov']))
                                          <video style="width: 100%; height: 300px; object-fit: cover;" src="{{ asset('Attachments/Galerie/' . $project->media) }}" class="img-fluid"></video>
                                      @endif
                                      <div class="portfolio-info">
                                          <h4>{{ $project->name }}</h4>
                                          <p>{{ $project->note }}</p>
                                          <a href="{{ asset('Attachments/Galerie/' . $project->media) }}" class="glightbox preview-link">
                                              <i class="bi bi-zoom-in"></i>
                                          </a>
                                      </div>
                                  </div>
                              </div>
                          @endforeach
                      @endforeach
                  </div><!-- End Projects Container -->

              </div>
              <br>
              <div class="text-center">
                  <a class="btn button-y" href="{{ route('all_projects') }}">Alle Projekte anzeigen</a>
              </div>

          </div>
      </section><!-- End Our Projects Section -->


    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Was die Leute sagen</h2>
          <p>Echte Kundenbewertungen</p>
        </div>

        <div class="slides-2 swiper">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img style=" border-radius: 50%;" src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                  <h3>Nils Kessler</h3>
                  <h4>Malerarbeiten</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                      class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                      OPLAS BAU hat unsere Wände perfekt gestrichen. Die Farben sind genau so, wie wir sie uns vorgestellt haben, und die Arbeit wurde extrem sauber ausgeführt. Das Team war pünktlich und sehr professionell. Absolut empfehlenswert!
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img style=" border-radius: 50%;" src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                  <h3>Katrin Stoll</h3>
                  <h4>Fliesen</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                      class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                      Wir haben unsere Küche und das Badezimmer von OPLAS BAU fliesen lassen, und das Ergebnis ist einfach fantastisch! Die Fliesen sind makellos verlegt, und die Muster passen perfekt. Auch die Absprachen liefen reibungslos. Sehr zufrieden!
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img style=" border-radius: 50%;" src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                  <h3>Hendrik Falk</h3>
                  <h4>Parkett</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                      class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                      Das Parkett in unserem Wohnzimmer sieht jetzt dank OPLAS BAU wunderschön aus. Sie haben hochwertige Materialien verwendet und haben die Arbeit pünktlich abgeschlossen. Jeder Schritt wurde mit Präzision ausgeführt. Sehr beeindruckt!
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img style=" border-radius: 50%;" src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                  <h3>Abed Alrahman Bader</h3>
                  <h4>Trockenbau</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                      class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                      Die Trockenbauarbeiten wurden schnell und ohne Komplikationen erledigt. Die Wände sehen sehr stabil und glatt aus. Das Team von OPLAS BAU hat alles termingerecht fertiggestellt und war jederzeit hilfsbereit und freundlich.
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img style=" border-radius: 50%;" src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                  <h3>Matthias Dreyer</h3>
                  <h4>Gipskarton</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                      class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                      Ich bin sehr zufrieden mit der Gipskarton-Arbeit von OPLAS BAU. Die Installation war präzise und das Endergebnis hat die Raumaufteilung viel besser gemacht. Ein professioneller und zuverlässiger Service.
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-content position-relative">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
                <a href="index.html">
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
              <li><a href="#">Datenschutz</a></li>
              <li><a href="#">Kontakt</a></li>
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

</body>

</html>
