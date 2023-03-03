<?php
session_start();

require_once '_inc/functions.php';
require_once '_inc/header.php';
require_once '_inc/nav.php';

checkAuthentication();
?>

<div clas="container-fluid">

    <h1 class="m-4 text-center">Admin</h1>

</div>

<?php
require_once '_inc/footer.php';
?>