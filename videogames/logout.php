<?php
session_start();

require_once '_inc/functions.php';

if (isset($_SESSION['user'])) {
    unset($_SESSION['user']);
}

header('Location: index.php');
