<?php

function checkAuthentication()
{
    if (!array_key_exists('user', $_SESSION)) {
        $_SESSION['notice'] = 'Accès refusé';
        header('Location: ../index.php');
        exit();
    }
}
