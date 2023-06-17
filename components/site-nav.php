<?php
session_start();
if (!empty($_SESSION["name"])) {
  $name = $_SESSION["name"];
  $userType = $_SESSION["userType"];
  $agencyId = $_SESSION["agency_id"];
} else {
  session_unset();
}
session_write_close() ?>
<nav class="site-nav">
  <div class="container">
    <div class="menu-bg-wrap">
      <div class="site-navigation">
        <a href="index.php" class="logo m-0 float-start">Sajt za nekretnine - Dream Team</a>
        <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end">
          <li><a href="index.php">Početna stranica</a></li>
          <li class="has-children">
            <a href="properties.php">Nekretnine</a>
            <ul class="dropdown">
              <?php if (!empty($agencyId)) {
              ?>
                <li><a href="agency.php">Moje nekretnine</a></li>
              <?php
              } else { ?>
                <li><a href="properties.php">Sve nekretnine</a></li>
              <?php } ?>
              <li><a href="search.php">Pretražite nekretnine</a></li>
              <li><a href="insert.php">Prodajte nekretninu</a></li>
              <!-- <li class="has-children">
                <a href="#">Dropdown</a>
                <ul class="dropdown">
                  <li><a href="#">Sub Menu One</a></li>
                  <li><a href="#">Sub Menu Two</a></li>
                  <li><a href="#">Sub Menu Three</a></li>
                </ul>
              </li> -->
            </ul>
          </li>
          <li><a href="services.php">Usluge</a></li>
          <li><a href="about.php">O nama</a></li>
          <li><a href="contact.php">Kontaktirajte nas</a></li>
          <?php if (!empty($name)) {
          ?>
            <li><a href="logout.php">Odjavite se</a></li>
          <?php
          } else { ?>
            <li class="active"><a href="login.php">Prijavite se</a></li>
          <?php } ?>
          <?php
          if (!empty($name)) {
            $ime = $name;
            if (!empty($userType))
              $writeType = ", " . $userType;
            else
              $writeType = "";
            echo "<span class=\"text-warning\">Prijavljen: " . $ime . $writeType . "</span>";
          } ?>
          <?php if (!empty($_SESSION["name"]) && $_SESSION["userType"] == 'Admin') {
          ?>
            <li><a href="approval.php">Autorizacija korisnika</a></li>
          <?php } ?>
        </ul>
        <a href="#" class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none" data-toggle="collapse" data-target="#main-navbar">
          <span></span>
        </a>
      </div>
    </div>
  </div>
</nav>