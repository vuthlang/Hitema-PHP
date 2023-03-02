<?php
require_once '_inc/header.php';
require_once '_inc/nav.php';
require_once 'functions.php';

$games = getAllGames();
?>

<div clas="container-fluid">
    <div class="row w-75 mx-auto my-5">
        <div class="col">
            <table class="table table-hover table-fit">

                <thead class="table-dark">
                    <tr>
                        <th scope="col">
                            <b>Title</b>
                        </th>
                        <th scope="col" class="font-weight-bold">
                            <b>Poster</b>
                        </th>
                        <th scope="col" class="font-weight-bold">
                            <b>Price</b>
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($games as $game) { ?>
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