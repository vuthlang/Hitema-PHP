<?php
session_start();

require_once '_inc/functions.php';
require_once '_inc/header.php';
require_once '_inc/nav.php';

$result = getGames();
$notice = getSessionFlashMessage('notice');
?>

<div clas="container-fluid">

    <h1 class="m-4 text-center">Home</h1>

    <?php
    if (isset($_SESSION['notice'])) { ?>
        <div class="w-50 mx-auto my-5">
            <?php
            echo "<p class='alert alert-success'>$notice</p>"; ?>
        </div>
    <?php
    }
    ?>

    <div class="row w-75 mx-auto my-5">
        <div class="col">
            <table class="table table-hover table-fit">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" class="text-center">
                            <b>Title</b>
                        </th>
                        <th scope="col" class="text-center font-weight-bold">
                            <b>Poster</b>
                        </th>
                        <th scope="col" class="font-weight-bold">
                            <b>Price</b>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($result as $game) { ?>
                        <tr>
                            <td class="w-25 text-center" style="word-break:break-word;">
                                <p class="font-weight-bold">
                                    <?= $game['title'] ?>
                                </p>
                                <a href="game.php?id=<?= $game['id'] ?>">
                                    <button type="button" class="btn btn-info text-white">Details</button>
                                </a>
                            </td>
                            <td class="w-50 text-center" style="word-break:break-word;">
                                <img src=<?= $game['poster'] ?>>
                            </td>
                            <td class="w-25" style="word-break:break-word;">
                                <?= $game['price'] ?>€
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
require_once '_inc/footer.php';
?>