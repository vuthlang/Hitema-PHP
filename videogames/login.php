<?php
require_once '_inc/header.php';
require_once '_inc/nav.php';
require_once 'functions.php';

if (isset($_POST) && !empty($_POST)) {
    [
        'email' => $email,
        'password' => $password,
    ] = $_POST;
}
?>

<div class="container w-50">
    <h1 class="m-4 text-center">Login</h1>
    <form method="post">
        <div class="form-group mt-2">
            <label>Email</label>
            <input type="email" class="form-control" name="email" placeholder="Enter email" value="<?= getValues()['email'] ?? null; ?>">
        </div>
        <div class="form-group mt-2">
            <label>Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <button type="submit" name="submit" class="btn btn-primary  mt-3">Submit</button>
        <?php processLoginForm() ?>
    </form>
</div>
<?php
require_once '_inc/footer.php';
?>