<?php
session_start();

require_once 'functions.php';
require_once '_inc/header.php';
require_once '_inc/nav.php';

$id = $_GET['id'];
$game = getOneGame($id);
?>

<div clas="container-fluid">
    <div class="row w-75 mx-auto m-5">
        <div class="col">

            <?php
            foreach ($game as $element) { ?>

                <div class="text-center">
                    <h1 class="mb-4"><?= $element['title'] ?></h1>
                    <img src=<?= $element['poster'] ?> class="rounded mb-3" alt="...">
                    <p>
                        <b>Release date : </b>
                        <?= date("d/m/Y", strtotime($element['release_date'])) ?>
                    </p>
                    <p>
                        <b>Price : </b>
                        <?= $element['price'] ?>
                    </p>
                </div>

                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" class="font-weight-bold">
                                <b>Description</b>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="word-break:break-word;">
                                <?= $element['description'] ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<?php
require_once '_inc/footer.php';
?>