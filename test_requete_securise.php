<?php
$pdo = new PDO('mysql:dbname=studi_okaz;host=localhost;charset=utf8mb4', 'root', '');

$id = (int)$_GET['id'];
$query = $pdo->prepare("SELECT * FROM user WHERE id = :id");
$query->bindValue(':id', $id, PDO::PARAM_INT);
$query->execute();
//fetch() nous permet de récupérer une seule ligne
$result = $query->fetch(PDO::FETCH_ASSOC);
//$result est un tableau association qu’on peut manipuler comme on l’a vu précédemment
var_dump($result);
