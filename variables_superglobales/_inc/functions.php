<?php

function processContactForm(): void
{
    if (isset($_POST['submit'])) {
        echo '<p class="text-success"><b>Form submitted</b></p>';
    }
}

function isEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function isLong($string)
{
    $error = null;

    if (strlen($string) >= 10) {
        $error = "<p>10 caractères minimum</p>";
    } else {
        $error = false;
    }

    return $error;
}

function getValues(): array
{
    return $_POST;
}
