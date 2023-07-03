<div class="row">
    <div class="col-12">
        <div class="property-slider-wrap">
            <div class="property-slider">
                <?php
                if (is_array($properties)) {
                    $count = count($properties);
                    if ($count > 0) {
                        foreach ($properties as $property) {
                            $id = $property['id'];
                            $slika = $property['slika'];
                            $slikaSufix =  (strpos($slika, ".png") !== false || strpos($slika, ".jpg") !== false) ? "" : ".jpg";
                            $slika = $slika .$slikaSufix;
                            $cena = $property['cena'];
                            $adresa = $property['adresa'];
                            $opis = $property['opis'];
                            echo "
                    <div class='property-item'>
                     <img src='images/" . $slika . "' onclick='location.href=\"property-single.php?id=$id\"' alt='Image' class='img-fluid'/>
                      <div class='property-content'>
                        <div class='price mb-2'><span>€ " . number_format((int)$property['cena']) . "</span></div>
                        <div>
                          <span class='d-block mb-2 text-black-50'
                           >" . $property['adresa'] . "</span
                           >
                          <span class='city d-block mb-3'>Beograd</span>
  
                          <div class='specs d-flex mb-4'>
                            <span class='d-block d-flex align-items-center me-3'>
                              <span class='icon-bed me-2'></span>
                              <span class='caption'>" . $property['opis'] . "</span>
                            </span>
                            <span class='d-block d-flex align-items-center'>
                              <span class='icon-car me-2'></span>
                              <span class='caption'>parking</span>
                            </span>
                          </div>
                          <form method='GET' action='property-single.php'>
                          <input type='hidden' name='id' value=$id>
                          <input type='submit' value='Detaljnije' class='btn btn-primary py-2 px-3'>
                          </form>
                          </div>
                      </div>
                    </div>";
                        }
                    }
                } ?>
                <!-- .item -->
            </div>

            <div id="property-nav" class="controls" tabindex="0" aria-label="Carousel Navigation">
                <span class="prev" data-controls="prev" aria-controls="property" tabindex="-1">Prethodno</span>
                <span class="next" data-controls="next" aria-controls="property" tabindex="-1">Sledeće</span>
            </div>
        </div>
    </div>
</div>