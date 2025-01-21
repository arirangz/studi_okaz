<div class="col d-flex align-items-center justify-content-center">

    <div class="text-center">
        <div class="text-centericon-square text-body-emphasis  d-inline-flex align-items-center justify-content-center fs-2 flex-shrink-0 me-3">
            <i class="bi-<?= $category["icon"] ?>"></i>
        </div>
        <h3 class="fs-2 text-body-emphasis"><?= $category["name"] ?></h3>
        <a href="annonces.php?search=&min_price=&max_price=&category=<?= $category["id"]; ?>" class="btn btn-primary">
            Voir la catégorie
        </a>
    </div>
</div>