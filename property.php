<div class="property-content">
    <?php
    if (is_array($properties)) {
        $count = count($properties);
        if ($count > 0) {
            foreach ($properties as $property) {
                echo '<div class="price mb-2"><span>' . $property['cena'] . '</span></div>';
                echo '<div><span class="d-block mb-2 text-black-50">' . $property['adresa'] . '</span>';
                echo '<div class="specs d-flex mb-4">
                            <span class="d-block d-flex align-items-center me-3">
                              <span class="icon-bed me-2"></span>
                              <span class="caption">' . $property['opis'] . '</span>';
            }
        }
    } ?>
    <a href="property-single.php" class="btn btn-primary py-2 px-3">Detaljnije</a>
</div>
</div>
</div>
<!-- .item -->
<!-- povloačenje informacija o pojedinačnim nekretninama iz baze i prikaz-->