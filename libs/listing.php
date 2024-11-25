<?php

function getListings(): array
{
    return [
        ["title" => "Rocket League PS4", "price" => 30, "image" => "rocket-league.jpg", "description" => "Test description"],
        ["title" => "Test2", "price" => 25, "image" => "rocket-league.jpg", "description" => "Test description"],
        ["title" => "Test3", "price" => 28, "image" => "rocket-league.jpg", "description" => "Test description"],
    ];
}


function getListingById(int $id): array
{
    $listings = getListings();
    return $listings[$id];
}
