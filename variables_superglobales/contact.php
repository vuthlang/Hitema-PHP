<?php

//récupération de données envoyées par le serveur
$submissionDate = date_format((new DateTime)->setTimestamp($_SERVER['REQUEST_TIME']), 'd-m-Y H:i:s');

// récupération data + décomposition
if (isset($_POST) && !empty($_POST)) {
    [
        'firstname' => $firstname,
        'lastname' => $lastname,
        'email' => $email,
        'subject' => $subject,
        'message' => $message,
    ] = $_POST;
}

// inclusions 
require_once '_inc/header.php';
require_once '_inc/nav.php';
?>

<main>

    <h1 class="m-5 text-center">Contact</h1>
    <form method="post">

        <div class="form-group row m-2">
            <label class="col-sm-2 col-form-label">Firstname</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="firstname">
            </div>
        </div>

        <div class="form-group row m-2">
            <label class="col-sm-2 col-form-label">Lastname</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="lastname">
            </div>
        </div>

        <div class="form-group row m-2">
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="email">
            </div>
        </div>

        <div class="form-group row m-2">
            <label class="col-sm-2 col-form-label">Subject</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="subject">
            </div>
        </div>

        <div class="form-group row m-2">
            <label class="col-sm-2 col-form-label">Message</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="message" rows="3"></textarea>
            </div>
        </div>

        <button class="btn btn-primary m-2" type="submit" name="submit">Submit</button>

    </form>

    <?php
    if (isset($_POST) && !empty($_POST)) { ?>
        <div class='m-2'>
            <h2 class='mt-5 mb-4'>Content of the Contact form</h2>
            <p>
                <b>Firstname : </b> <?= $firstname ?>
            </p>
            <p>
                <b>Lastname : </b> <?= $lastname ?>
            </p>
            <p>
                <b>Email : </b> <?= $email ?>
            </p>
            <p>
                <b>Subject : </b> <?= $subject ?>
            </p>
            <p>
                <b>Message : </b> </br> <?= $message ?>
            </p>
            <p>
                <b>Form submitted : </b> <?= $submissionDate ?>
            </p>
        </div>
    <?php
    }
    ?>

</main>

<?php
require_once '_inc/footer.php';
?>