<?php

function addUser(PDO $pdo, string $username, string $email, string $password): bool
{
    $query = $pdo->prepare("INSERT INTO user (username, email, password) VALUES (:username, :email, :password)");

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query->bindValue(':username', $username);
    $query->bindValue(':email', $email);
    $query->bindValue(':password', $password);

    return $query->execute();
}

function verifyUser($user): array|bool
{
    $errors = [];
    if (isset($user["username"])) {
        if ($user["username"] === "") {
            $errors["username"] = "Le champ username est obligatoire";
        }
    } else {
        $errors["username"] = "Le champ username n'a as été envoyé";
    }

    if (count($errors)) {
        return $errors;
    } else {
        return true;
    }
}
