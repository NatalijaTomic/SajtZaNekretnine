<?php

use DreamTeam\Property;

require_once __DIR__ . '/lib/Property.php';
$property = new Property();
$properties = $property->getProperties();
?>
<?php include 'components/layout.php'; ?>
<?php include 'components/site-nav.php'; ?>


<div class="hero">
  <div class="hero-slide">
    <div class="img overlay" style="background-image: url('images/hero_bg_3.jpg')"></div>
    <div class="img overlay" style="background-image: url('images/hero_bg_2.jpg')"></div>
    <div class="img overlay" style="background-image: url('images/hero_bg_1.jpg')"></div>
  </div>

  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-lg-9 text-center">
        <h1 class="heading" data-aos="fade-up">
          Najlakši način da pronađete Vaš dom iz snova
        </h1>
        <form method="post" action="search.php" class="narrow-w form-search d-flex align-items-stretch mb-3" data-aos="fade-up" data-aos-delay="200">
          <input type="text" class="form-control px-4" name="cena" required placeholder="Unesite željenu cenu nekretnine." />
          <input type="hidden" name="adresa" value="">
          <input type="hidden" name="opis" value="">
          <input type="submit" class="btn btn-primary" value="Pretraga" name="search-btn">
        </form>
      </div>
    </div>
  </div>
</div>

<div class="section">
  <div class="container">
    <div class="row mb-5 align-items-center">
      <div class="col-lg-6">
        <h2 class="font-weight-bold text-primary heading">
          Najnovije nekretnine
        </h2>
      </div>
      <div class="col-lg-6 text-lg-end">
        <p>
          <a href="properties.php" target="_blank" class="btn btn-primary text-white py-3 px-4">Pogledaj sve nekretnine</a>
        </p>
      </div>
    </div>
    <?php include 'components/properties-slider.php'; ?>
  </div>
</div>
</div>

<section class="features-1">
  <div class="container">
    <div class="row">
      <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
        <div class="box-feature">
          <span class="flaticon-house"></span>
          <h3 class="mb-3">Iznajmite nekretninu</h3>
          <p>
            Želite da iznajmite nekretninu ili da pronađete nekretninu za iznajmljivanje? Na pravom ste mestu. Pogledajte našu ponudu nekretnina za iznajmljivanje.
          </p>
          <p><a href="#" class="learn-more">Pogledaj više</a></p>
        </div>
      </div>
      <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="500">
        <div class="box-feature">
          <span class="flaticon-building"></span>
          <h3 class="mb-3">Nekretnine na prodaju</h3>
          <p>
            Najnovije i najatraktivnije nekretnine ćete pronaći u našoj širokoj ponudi nekretnina.
          </p>
          <p><a href="#" class="learn-more">Pogledaj više</a></p>
        </div>
      </div>
      <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
        <div class="box-feature">
          <span class="flaticon-house-3"></span>
          <h3 class="mb-3">Upoznajte Vašeg agenta za nekretnine </h3>
          <p>
            U Agenciji su zaposleni vrhunski stručnjaci iz oblasti nekretnina, prava, građevine, arhitekture. Akreditovani smo zastupnici kupaca i tu smo da Vam pomognemo u bilo kojoj oblasti vezano za Vaše i naše poslovanje.
          </p>
          <p><a href="#" class="learn-more">Pogledaj više</a></p>
        </div>
      </div>
      <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="600">
        <div class="box-feature">
          <span class="flaticon-house-1"></span>
          <h3 class="mb-3">Kuće na prodaju</h3>
          <p>
            Na našem sajtu ćete pronaći najveći izbor kuća koje su na prodaju. Kontaktirajte nas, i zajedno ćemo pronaći kuću koja najviše odgovara vašim željama i zahtevima.
          </p>
          <p><a href="#" class="learn-more">Pogledaj više</a></p>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="section sec-testimonials">
  <div class="container">
    <div class="row mb-5 align-items-center">
      <div class="col-md-6">
        <h2 class="font-weight-bold heading text-primary mb-4 mb-md-0">
          Recenzije zadovoljnih klijenata
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
            <img src="images/person_1-min.jpg" alt="Image" class="img-fluid rounded-circle w-25 mb-4" />
            <div class="rate">
              <span class="icon-star text-warning"></span>
              <span class="icon-star text-warning"></span>
              <span class="icon-star text-warning"></span>
              <span class="icon-star text-warning"></span>
              <span class="icon-star text-warning"></span>
            </div>
            <h3 class="h5 text-primary mb-4">Marko Đorđević</h3>
            <blockquote>
              <p>
                &ldquo;Sve pohvale za agenciju Dream team. Prezadovoljan sam uslugom. Brzo su pronašli stan kakav sam tražio.&rdquo;
              </p>
            </blockquote>
            <p class="text-black-50">Dizajner</p>
          </div>
        </div>

        <div class="item">
          <div class="testimonial">
            <img src="images/person_2-min.jpg" alt="Image" class="img-fluid rounded-circle w-25 mb-4" />
            <div class="rate">
              <span class="icon-star text-warning"></span>
              <span class="icon-star text-warning"></span>
              <span class="icon-star text-warning"></span>
              <span class="icon-star text-warning"></span>
              <span class="icon-star text-warning"></span>
            </div>
            <h3 class="h5 text-primary mb-4">Nikola Colić</h3>
            <blockquote>
              <p>
                &ldquo;Veoma ljubazno i profesionalno osoblje. Sve pohvale.&rdquo;
              </p>
            </blockquote>
            <p class="text-black-50">Stomatolog</p>
          </div>
        </div>

        <div class="item">
          <div class="testimonial">
            <img src="images/person_3-min.jpg" alt="Image" class="img-fluid rounded-circle w-25 mb-4" />
            <div class="rate">
              <span class="icon-star text-warning"></span>
              <span class="icon-star text-warning"></span>
              <span class="icon-star text-warning"></span>
              <span class="icon-star text-warning"></span>
              <span class="icon-star text-warning"></span>
            </div>
            <h3 class="h5 text-primary mb-4">Miloš Begović</h3>
            <blockquote>
              <p>
                &ldquo;Jedna od najboljih agencija u Srbiji. Jednostavno, na vreme i profesionalno. Sve preporuke.&rdquo;
              </p>
            </blockquote>
            <p class="text-black-50">IT programer</p>
          </div>
        </div>

        <div class="item">
          <div class="testimonial">
            <img src="images/person_4-min.jpg" alt="Image" class="img-fluid rounded-circle w-25 mb-4" />
            <div class="rate">
              <span class="icon-star text-warning"></span>
              <span class="icon-star text-warning"></span>
              <span class="icon-star text-warning"></span>
              <span class="icon-star text-warning"></span>
              <span class="icon-star text-warning"></span>
            </div>
            <h3 class="h5 text-primary mb-4">Milica Radović</h3>
            <blockquote>
              <p>
                &ldquo;Agencija sa najboljom provizijom. Veoma brzo su mi pronašli lokal za iznajmljivanje po najpovoljnijim uslovima i na idealnoj lokaciji.&rdquo;
              </p>
            </blockquote>
            <p class="text-black-50">Knjigovođa</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="section section-4 bg-light">
  <div class="container">
    <div class="row justify-content-center text-center mb-5">
      <div class="col-lg-5">
        <h2 class="font-weight-bold heading text-primary mb-4">
          Hajde da zajedno pronađemo nekretninu koja Vam najbolje pristaje
        </h2>
        <p class="text-black-50">
          Garanciju za naš rad daje veliki broj zadovoljnih klijenata.
        </p>
      </div>
    </div>
    <div class="row justify-content-between mb-5">
      <div class="col-lg-7 mb-5 mb-lg-0 order-lg-2">
        <div class="img-about dots">
          <img src="images/hero_bg_3.jpg" alt="Image" class="img-fluid" />
        </div>
      </div>
      <div class="col-lg-4">
        <div class="d-flex feature-h">
          <span class="wrap-icon me-3">
            <span class="icon-home2"></span>
          </span>
          <div class="feature-text">
            <h3 class="heading">Šta nas izdvaja</h3>
            <p class="text-black-50">
              Preko 5000 nekretnina u bazi podataka, veliki broj aktivnih zakupaca i veliki broj zadovoljnih klijenata.
            </p>
          </div>
        </div>

        <div class="d-flex feature-h">
          <span class="wrap-icon me-3">
            <span class="icon-person"></span>
          </span>
          <div class="feature-text">
            <h3 class="heading">Najbolje ocenjeni agenti prodaje</h3>
            <p class="text-black-50">
              Poverite Vašu nekretninu pouzdanom posredniku, našim pouzdanim agentima prodaje.
            </p>
          </div>
        </div>

        <div class="d-flex feature-h">
          <span class="wrap-icon me-3">
            <span class="icon-security"></span>
          </span>
          <div class="feature-text">
            <h3 class="heading">Legitimne nekretnine</h3>
            <p class="text-black-50">
              Dajemo garancije na završene građevinske objekte i nudimo Vam novogradnju sa urednim dokumentima.
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="row section-counter mt-5">
      <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
        <div class="counter-wrap mb-5 mb-lg-0">
          <span class="number"><span class="countup text-primary">3298</span></span>
          <span class="caption text-black-50"># kupljenih nekretnina</span>
        </div>
      </div>
      <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
        <div class="counter-wrap mb-5 mb-lg-0">
          <span class="number"><span class="countup text-primary">2181</span></span>
          <span class="caption text-black-50"># izdatih nekretnina</span>
        </div>
      </div>
      <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="500">
        <div class="counter-wrap mb-5 mb-lg-0">
          <span class="number"><span class="countup text-primary">9316</span></span>
          <span class="caption text-black-50"># svih nekretnina</span>
        </div>
      </div>
      <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="600">
        <div class="counter-wrap mb-5 mb-lg-0">
          <span class="number"><span class="countup text-primary">191</span></span>
          <span class="caption text-black-50"># naših agenata</span>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="section">
  <div class="row justify-content-center footer-cta" data-aos="fade-up">
    <div class="col-lg-7 mx-auto text-center">
      <h2 class="mb-4">Budite deo našeg stalno rastućeg tima agenata za nekretnine</h2>
      <p>
        <a href="#" target="_blank" class="btn btn-primary text-white py-3 px-4">Prijavite se za agenta za nekretnine</a>
      </p>
    </div>
    <!-- /.col-lg-7 -->
  </div>
  <!-- /.row -->
</div>

<div class="section section-5 bg-light">
  <div class="container">
    <div class="row justify-content-center text-center mb-5">
      <div class="col-lg-6 mb-5">
        <h2 class="font-weight-bold heading text-primary mb-4">
          Upoznajte naš tim
        </h2>
        <p class="text-black-50">
          Dream Team - Vaši agenti za nekretnine.
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0">
        <div class="h-100 person">
          <img src="images/ContactsNatali.jpg" alt="Image" class="img-fluid" />

          <div class="person-contents">
            <h2 class="mb-0"><a href="#">Natalija Tomić</a></h2>
            <span class="meta d-block mb-3">Agent sa licencom</span>
            <p>
              Dream Team nekretnine - Vaš prvi izbor.
            </p>

            <ul class="social list-unstyled list-inline dark-hover">
              <li class="list-inline-item">
                <a href="#"><span class="icon-twitter"></span></a>
              </li>
              <li class="list-inline-item">
                <a href="#"><span class="icon-facebook"></span></a>
              </li>
              <li class="list-inline-item">
                <a href="#"><span class="icon-linkedin"></span></a>
              </li>
              <li class="list-inline-item">
                <a href="#"><span class="icon-instagram"></span></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0">
        <div class="h-100 person">
          <img src="images/ContactsDanijela.jpg" alt="Image" class="img-fluid" />

          <div class="person-contents">
            <h2 class="mb-0"><a href="#">Danijela Todić</a></h2>
            <span class="meta d-block mb-3">Agent sa licencom</span>
            <p>
              Dream Team nekretnine - Vaš prvi izbor.
            </p>

            <ul class="social list-unstyled list-inline dark-hover">
              <li class="list-inline-item">
                <a href="#"><span class="icon-twitter"></span></a>
              </li>
              <li class="list-inline-item">
                <a href="#"><span class="icon-facebook"></span></a>
              </li>
              <li class="list-inline-item">
                <a href="#"><span class="icon-linkedin"></span></a>
              </li>
              <li class="list-inline-item">
                <a href="#"><span class="icon-instagram"></span></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0">
        <div class="h-100 person">
          <img src="images/ContactsMilica.jpg" alt="Image" class="img-fluid" />

          <div class="person-contents">
            <h2 class="mb-0"><a href="#">Milica Stojković</a></h2>
            <span class="meta d-block mb-3">Agent sa licencom</span>
            <p>
              Dream Team nekretnine - Vaš prvi izbor.
            </p>

            <ul class="social list-unstyled list-inline dark-hover">
              <li class="list-inline-item">
                <a href="#"><span class="icon-twitter"></span></a>
              </li>
              <li class="list-inline-item">
                <a href="#"><span class="icon-facebook"></span></a>
              </li>
              <li class="list-inline-item">
                <a href="#"><span class="icon-linkedin"></span></a>
              </li>
              <li class="list-inline-item">
                <a href="#"><span class="icon-instagram"></span></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'components/footer.php'; ?>

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