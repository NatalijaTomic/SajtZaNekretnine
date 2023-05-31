<?php
use DreamTeam\Member;
require_once __DIR__ . '/lib/Member.php';

if (!empty($_POST["login-btn"])) {
    $member = new Member();
  
    $loginResult = $member->loginMember();
}

?>
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
            <h1 class="heading" data-aos="fade-up">Prijava</h1>

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
                  Prijava
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="container">
      <div class="row justify-content-center align-items-center">
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <form name="login" action="login.php" method="post">
                <div class="input-group form-group mt-3">
                <div class="bg-secondary rounded-start">
                  <span class="m-3"><i class="fas fa-user mt-2"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="korisničko ime"
                  name="username" required>
              </div>
              <div class="input-group form-group mt-3">
                <div class="bg-secondary rounded-start">
                  <span class="m-3"><i class="fas fa-key mt-2"></i></span>
                </div>
                <input type="password" class="form-control" placeholder="lozinka"
                  name="password" required>
              </div>

              <div class="form-group mt-3">
                <input type="submit" value="Prijava"
                  class="btn bg-secondary float-end text-white w-100"
                  name="login-btn">
              </div>
                  
            </form>
            <?php if(!empty($loginResult)){?>
              <div class="text-danger"><?php echo $loginResult;?></div>
              <?php }?>
        </div>
			        </div>
              <div class="row justify-content-center align-items-center">
                  <div class="col-lg-4 mt-3 d-flex">
                    <div>Ukoliko se već niste registrovali, registrujte se <a href="register.php" class="fw-bold">ovde</a>.</div>
                  </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.untree_co-section -->
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
