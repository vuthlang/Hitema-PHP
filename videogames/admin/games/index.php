<?php
session_start();

require_once '../_inc/functions.php';
require_once '../../_inc/functions.php';
require_once '../_inc/header.php';
require_once '../_inc/nav.php';

checkAuthentication();

$games = getAllGames();
?>

<div clas="container-fluid">

    <h1 class="m-4 mt-5 text-center">Admin Games</h1>

    <div class="row w-75 mx-auto my-5">
        <div class="col">
            <table class="table table-hover table-fit">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" class="text-center font-weight-bold">
                            <b>Poster</b>
                        </th>
                        <th scope="col" class="text-center">
                            <b>Title</b>
                        </th>
                        <th scope="col" class="font-weight-bold">
                            <b>Price</b>
                        </th>
                        <th scope="col" class="font-weight-bold">
                            <b>Release Date</b>
                        </th>
                        <th scope="col" class="font-weight-bold">
                            <b>Actions</b>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($games as $game) { ?>
                        <tr>
                            <td class="w-25 text-center" style="word-break:break-word;">
                                <img src=<?= $game['poster'] ?>>
                            </td>
                            <td class="w-25 text-center" style="word-break:break-word;">
                                <p class="font-weight-bold">
                                    <?= $game['title'] ?>
                                </p>
                            </td>
                            <td style="word-break:break-word;">
                                <?= $game['price'] ?>€
                            </td>
                            <td>
                                <?= date("d/m/Y", strtotime($game['release_date'])) ?>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-secondary text-white m-1">Update</button>
                                <button type="button" class="btn btn-danger text-white m-1">Delete</button>
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

<?php require_once('../_inc/footer.php'); ?>