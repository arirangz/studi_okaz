<?php

function getCategories(PDO $pdo)
{
    $sql = "SELECT * FROM category";
    $query = $pdo->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
