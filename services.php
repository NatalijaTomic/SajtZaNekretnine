<!-- /*
* Template Name: Property
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Untree.co" />
    <link rel="shortcut icon" href="favicon.png" />

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="fonts/icomoon/style.css" />
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css" />

    <link rel="stylesheet" href="css/tiny-slider.css" />
    <link rel="stylesheet" href="css/aos.css" />
    <link rel="stylesheet" href="css/style.css" />

    <title>
      Sajt za nekretnine - Dream Team
    </title>
  </head>
  <body>
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
          <span class="icofont-close js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <nav class="site-nav">
    <div class="container">
        <div class="menu-bg-wrap">
          <div class="site-navigation">
            <?php include 'components/site-nav.php';?>
            <a
              href="#"
              class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
              data-toggle="collapse"
              data-target="#main-navbar"
            >
              <span></span>
            </a>
          </div>
        </div>
      </div>
    </nav>

    <div
      class="hero page-inner overlay"
      style="background-image: url('images/hero_bg_1.jpg')"
    >
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center mt-5">
            <h1 class="heading" data-aos="fade-up">Usluge</h1>

            <nav
              aria-label="breadcrumb"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <ol class="breadcrumb text-center justify-content-center">
                <li class="breadcrumb-item"><a href="index.php">Početna strana</a></li>
                <li
                  class="breadcrumb-item active text-white-50"
                  aria-current="page"
                >
                  Usluge
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <div class="section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
            <div class="box-feature mb-4">
              <span class="flaticon-house mb-4 d-block"></span>
              <h3 class="text-black mb-3 font-weight-bold">
                Kvalitetne nekretnine
              </h3>
              <p class="text-black-50">
              Mi smo broj jedan sajt za nekretnine u Srbiji. Razvili smo opciju "Tražimo za vas" koja na vaš e-mail šalje sve najnovije nekretnine po kriterijumima koje ste sami izabrali.
              </p>
              <p><a href="#" class="learn-more">Opširnije</a></p>
            </div>
          </div>
          <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
            <div class="box-feature mb-4">
              <span class="flaticon-house-2 mb-4 d-block-3"></span>
              <h3 class="text-black mb-3 font-weight-bold">Najbolje rangirani agenti za nekretnine.</h3>
              <p class="text-black-50">
              Tim čine posvećeni ljudi koji žele da vam kupovinu, prodaju ili izdavanje nekretnine olakšaju na sve moguće načine.
              </p>
              <p><a href="#" class="learn-more">Opširnije</a></p>
            </div>
          </div>
          <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="500">
            <div class="box-feature mb-4">
              <span class="flaticon-building mb-4 d-block"></span>
              <h3 class="text-black mb-3 font-weight-bold">
                Stanovi na prodaju
              </h3>
              <p class="text-black-50">
              Prvi možete doći do doma vaših snova.
              </p>
              <p><a href="#" class="learn-more">Opširnije</a></p>
            </div>
          </div>
          <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="600">
            <div class="box-feature mb-4">
              <span class="flaticon-house-3 mb-4 d-block-1"></span>
              <h3 class="text-black mb-3 font-weight-bold">Kuće na prodaju</h3>
              <p class="text-black-50">
              Sarađujemo sa svim vodećim agencijama i investitorima iz cele Srbije.
              </p>
              <p><a href="#" class="learn-more">Opširnije</a></p>
            </div>
          </div>
        </div>
      </div> 
    </div>

    <div class="section sec-testimonials">
      <div class="container">
        <div class="row mb-5 align-items-center">
          <div class="col-md-6">
            <h2 class="font-weight-bold heading text-primary mb-4 mb-md-0">
              Utisci kupaca
            </h2>
          </div>
          <div class="col-md-6 text-md-end">
            <div id="testimonial-nav">
              <span class="prev" data-controls="prev">Prethodno</span>

              <span class="next" data-controls="next">Sledeće</span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4"></div>
        </div>
        <div class="testimonial-slider-wrap">
          <div class="testimonial-slider">
            <div class="item">
              <div class="testimonial">
                <img
                  src="images/person_1-min.jpg"
                  alt="Image"
                  class="img-fluid rounded-circle w-25 mb-4"
                />
                <div class="rate">
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                </div>
                <h3 class="h5 text-primary mb-4">Rista Komnenić</h3>
                <blockquote>
                  <p>
                    &ldquo;Naučio sam da cenim različitosti i da me iste inspirišu umesto da me frustriraju.&rdquo;
                  </p>
                </blockquote>
                <p class="text-black-50">Vlasnik malog preduzeća</p>
              </div>
            </div>

            <div class="item">
              <div class="testimonial">
                <img
                  src="images/person_2-min.jpg"
                  alt="Image"
                  class="img-fluid rounded-circle w-25 mb-4"
                />
                <div class="rate">
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                </div>
                <h3 class="h5 text-primary mb-4">Miloš Nikćević</h3>
                <blockquote>
                  <p>
                    &ldquo;Kao student, na raskrsnici sam života. Sve bih da probam, da istražim za ovo kratko vreme. &rdquo;
                  </p>
                </blockquote>
                <p class="text-black-50">Student</p>
              </div>
            </div>

            <div class="item">
              <div class="testimonial">
                <img
                  src="images/person_3-min.jpg"
                  alt="Image"
                  class="img-fluid rounded-circle w-25 mb-4"
                />
                <div class="rate">
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                </div>
                <h3 class="h5 text-primary mb-4">Nikola Jovičić</h3>
                <blockquote>
                  <p>
                    &ldquo;Pouzdan rad e-poslovanja bez ispada i izgubljenih dokumenata.&rdquo;
                  </p>
                </blockquote>
                <p class="text-black-50">GM SWM</p>
              </div>
            </div>

            <div class="item">
              <div class="testimonial">
                <img
                  src="images/person_4-min.jpg"
                  alt="Image"
                  class="img-fluid rounded-circle w-25 mb-4"
                />
                <div class="rate">
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                </div>
                <h3 class="h5 text-primary mb-4">Marija Janketić</h3>
                <blockquote>
                  <p>
                    &ldquo;KHLM d.o.o. Beograd već više od 10 godina sarađuje sa firmom “Dream team”. Kvalitet, dostupnost i posvećenost zaposlenih u pružanju usluga našoj firmi potvrđuju poverenje koje imamo i razlog zašto kontinuriano sarađujemoS.&rdquo;
                  </p>
                </blockquote>
                <p class="text-black-50">Izvršni direktor</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include 'components/footer.php';?>

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border" role="status">
        <span class="visually-hidden">Učitavanje...</span>
      </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/tiny-slider.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/counter.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>
