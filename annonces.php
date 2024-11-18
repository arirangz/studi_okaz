<?php
require_once "templates/header.php";

require_once 'libs/listing.php';

$listings = getListings();
?>

<div class="row">
    <h1>Les annonces</h1>
</div>

<div class="row">
    <div class="col-md-3">
        <form action="" method="get">
            <h2>Filtres</h2>
            <div>
                <input type="text" name="search" id="search" class="form-control" placeholder="Rechercher">
            </div>
        </form>
    </div>

    <div class="col-md-9">
        <div class="row">
            <?php foreach ($listings as $listing) {
                require 'templates/listing_part.php';
            } ?>
        </div>

    </div>


</div>



<?php
require_once "templates/footer.php";
?>