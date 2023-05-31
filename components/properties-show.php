<div class="row">
        <?php
        if (is_array($properties)) {
          $count = count($properties);
          if ($count > 0) {
            foreach ($properties as $property) {
              $id = $property['id'];
              $slika = $property['slika'];
              $cena = $property['cena'];
              $adresa = $property['adresa'];
              $opis = $property['opis'];
              echo "
              <div class='col-xs-12 col-sm-6 col-md-6 col-lg-4'>
                <div class='property-item mb-30'>
                  <img src='images/".$property['slika'].".jpg' onclick='location.href=\"property-single.php?id=$id\"' alt='Image' class='img-fluid'/>
                        
                  <div class='property-content'>
                    <div class='price mb-2'><span>€ ".number_format((int)$property['cena'])."</span></div>
                    <div>
                      <span class='d-block mb-2 text-black-50'
                        >".$property['adresa']."</span
                      >
                      <span class='city d-block mb-3'>Beograd</span>
    
                      <div class='specs d-flex mb-4'>
                        <span class='d-block d-flex align-items-center me-3'>
                          <span class='icon-bed me-2'></span>
                          <span class='caption'>".$property['opis']."</span>
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
                </div>
              </div>";
            }
          }
        } ?>
      </div>