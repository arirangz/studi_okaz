<?php

function getListings(PDO $pdo): array
{
    $sql = "SELECT listing.id, listing.title, listing.description, listing.image, listing.price
            FROM listing";

    $query = $pdo->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}


function getListingById(PDO $pdo, int $id): array|bool
{
    $sql = "SELECT listing.id, listing.title, listing.description, listing.image, listing.price
            FROM listing
            WHERE listing.id = :id";

    $query = $pdo->prepare($sql);
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}
