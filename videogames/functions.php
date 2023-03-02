<?php
function dbConnection(): PDO
{
    $connection = new PDO('mysql:host:127.0.0.1; db_name=game', 'root', '', [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
    return $connection;
}

function getGames($nbGames = null)
{
    $nbGames ?? $nbGames = 3;
    $connection = dbConnection();
    $sql = 'SELECT * FROM videogames.game ORDER BY RAND() LIMIT 3';
    $query = $connection->prepare($sql);
    $query->execute();

    return $query->fetchAll();
}

function getAllGames()
{
    $connection = dbConnection();
    $sql = 'SELECT * FROM videogames.game';
    $query = $connection->prepare($sql);
    $query->execute();

    return $query->fetchAll();
}

function getOneGame($id)
{
    $connection = dbConnection();
    $sql = 'SELECT * FROM videogames.game WHERE id=' . $id . '';
    $query = $connection->prepare($sql);
    $query->execute();

    return $query->fetchAll();
}
