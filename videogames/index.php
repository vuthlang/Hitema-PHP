<?php
require_once '_inc/header.php';
require_once '_inc/nav.php';
require_once 'functions.php';

$result = getGames();
?>

<div>
    <h1 class="text-center m-5">Home</h1>
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
            foreach ($result as $game) { ?>
                <tr>
                    <td class="text-center" style="word-break:break-word;">
                        <p class="font-weight-bold">
                            <?= $game['title'] ?>
                        </p>
                        <a href="game.php?id=<?= $game['id'] ?>">
                            <button type="button" class="btn btn-info text-white">Details</button>
                        </a>
                    </td>
                    <td style="word-break:break-word;">
                        <img src=<?= $game['poster'] ?>>
                    </td>
                    <td style="word-break:break-word;">
                        <?= $game['price'] ?>€
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<?php
require_once '_inc/footer.php';
?>