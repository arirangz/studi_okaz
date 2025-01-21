<?php

function getListings(PDO $pdo, array $filters = [], int $limit = null): array
{
    $orderBy = "listing.id DESC";
    $relevance = "";
    $conditions = [];
    if (isset($filters["search"])) {
        $match = "MATCH(title) AGAINST(:search)";
        $conditions[] =  $match;
        $relevance =  ", $match as relevance";
        $orderBy = "relevance DESC";
    }
    if (isset($filters["min_price"])) {
        $conditions[] = "price >= :min_price";
    }
    if (isset($filters["max_price"])) {
        $conditions[] = "price <= :max_price";
    }
    if (isset($filters["category"]) && $filters["category"]) {
        $conditions[] = "category_id = :category";
    }
    $limitQuery = "";
    if ($limit) {
        $limitQuery = " LIMIT $limit";

    }
    $where = $conditions ? " WHERE " . implode(" AND ", $conditions) : "";
    $sql = "SELECT listing.id, listing.title, listing.description, listing.image, listing.price
            $relevance
            FROM listing
            $where
            $limitQuery";

    $query = $pdo->prepare($sql);
    if (isset($filters["search"])) {
        $query->bindValue(":search", "%{$filters["search"]}%");
    }
    if (isset($filters["min_price"])) {
        $query->bindValue(":min_price", $filters["min_price"]);
    }
    if (isset($filters["max_price"])) {
        $query->bindValue(":max_price", $filters["max_price"]);
    }
    if (isset($filters["category"]) && $filters["category"]) {
        $query->bindValue(":category", $filters["category"], PDO::PARAM_INT);
    }
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
