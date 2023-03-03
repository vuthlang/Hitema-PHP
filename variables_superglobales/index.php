<?php
session_start();

require_once '_inc/functions.php';
require_once '_inc/header.php';
require_once '_inc/nav.php';
?>

<main>
    <h1 class='m-5 text-center'>Home</h1>
    <?php
    if (isset($_SESSION['notice'])) {
        $notice = getSessionFlashMessage('notice');
        echo "<p class='alert alert-success'>$notice</p>";
    }
    ?>
</main>

<?php
require_once '_inc/footer.php';
?>