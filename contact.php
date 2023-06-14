
<?php include 'components/layout.php'; ?>
<?php include 'components/site-nav.php'; ?>
<a href="#" class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none" data-toggle="collapse" data-target="#main-navbar">
  <span></span>
</a>
</div>
</div>
</div>
</nav>

<div class="hero page-inner overlay" style="background-image: url('images/hero_bg_1.jpg')">
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-lg-9 text-center mt-5">
        <h1 class="heading" data-aos="fade-up">Kontaktirajte nas</h1>

        <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
          <ol class="breadcrumb text-center justify-content-center">
            <li class="breadcrumb-item"><a href="index.php">Početna strana</a></li>
            <li class="breadcrumb-item active text-white-50" aria-current="page">
              Kontakt
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>

<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
        <div class="contact-info">
          <div class="address mt-2">
            <i class="icon-room"></i>
            <h4 class="mb-2">Nalazimo se u</h4>
            <p>
              Milutina Milankovića 87,<br />
              Beograd 11000
            </p>
          </div>

          <div class="open-hours mt-4">
            <i class="icon-clock-o"></i>
            <h4 class="mb-2">Radno vreme:</h4>
            <p>
              Ponedeljak-Petak:<br />
              11:00 - 20:00
            </p>
          </div>

          <div class="email mt-4">
            <i class="icon-envelope"></i>
            <h4 class="mb-2">E-mail:</h4>
            <p>info@dreamteam.com</p>
          </div>

          <div class="phone mt-4">
            <i class="icon-phone"></i>
            <h4 class="mb-2">Pozovite:</h4>
            <p>+381 64 4567890 55</p>
          </div>
        </div>
      </div>
      <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
        <form action="#">
          <div class="row">
            <div class="col-6 mb-3">
              <input type="text" class="form-control" placeholder="Vaše ime" />
            </div>
            <div class="col-6 mb-3">
              <input type="email" class="form-control" placeholder="Vaš e-mail" />
            </div>
            <div class="col-12 mb-3">
              <input type="text" class="form-control" placeholder="Naslov" />
            </div>
            <div class="col-12 mb-3">
              <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Poruka"></textarea>
            </div>

            <div class="col-12">
              <input type="submit" value="Pošaljite poruku" class="btn btn-primary" />
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /.untree_co-section -->

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