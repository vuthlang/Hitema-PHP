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

// Authentification 
function getValues()
{
    return $_POST;
}

function isSubmitted(): bool
{
    return isset($_POST['submit']);
}

function isEmail(string|null $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function isNotBlank(string|null|array $field): bool
{
    return !empty($field);
}

function processLoginForm(): void
{
    if (isSubmitted() && isValid()) {
        if (checkUser(
            getValues()['email'],
            getValues()['password']
        )) {
            echo "<p class='fw-bold text-success'>Authentication successful</p>";
        } else {
            echo "<p class='font-weight-bold text-danger'>Authentication failed</p>";
        }
    }
}

// Define the constraints of validation
function isValid(): bool
{
    $constraints = [
        'email' => [
            'isValidate' => isEmail(getValues()['email']),
            'message' => "Incorrect credential(s)"
        ],
        'password' => [
            'isValidate' => isNotBlank(getValues()['password']),
            'message' => "Incorrect credential(s)"
        ]
    ];

    return checkConstraints($constraints);
}

// check the constraints
function checkConstraints(array $constraints): bool
{
    $validation = true;

    foreach ($constraints as $name => $field) {
        if (!$field['isValidate']) {
            $validation = false;
        }
    }

    return $validation;
}


//Check if the user email exists
function getUserByLogin($login)
{
    $connection = dbConnection();
    $sql = 'SELECT email, password FROM videogames.admin WHERE email="' . $login . '"';

    $query = $connection->prepare($sql);
    $query->execute();

    return $query->fetch() ?? false;
}

//Check if the user email and password
function checkUser($email, $password): bool
{
    if (!getUserByLogin($email)) {
        return false;
    }

    if (!password_verify(
        $password,
        getUserByLogin($email)['password'],
    )) {
        return false;
    }

    return true;
}
