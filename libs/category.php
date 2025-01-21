<?php

function getCategories(PDO $pdo)
{
    $sql = "SELECT * FROM category ORDER BY name ASC";
    $query = $pdo->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
