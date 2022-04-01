<?php
require '../dbconnect.php';
session_start();
if ($_SESSION['username']){
    if($_SESSION['role'] == "student"){

    $ID = $_SESSION["ID"];
    $query = "SELECT * FROM `gebruikers` WHERE `ID` = {$ID} AND `bedrijf` IS NOT NULL";
    $results = mysqli_query($db_connect, $query);

    ?>

        <div class="header">
            <nav class="nav-bar">
                <ul class="nav-ul">
                    <li class="nav-li"><a href="toevoegen.php">Bedrijf Toevoegen</a></li>
                    <li class="nav-li"><a href="../login/out.php">Logout</a></li>
                </ul>
            </nav>
        </div>
            <?php
            if (mysqli_num_rows($results) == 0){
                ?> <p>Er zijn geen stages</p> <?php
            } else {
                ?>
                <table id="tableAanmelding" class="content-table" border="1">
                    <tr>
                        <th class="thead">Bedrijf</th>
                        <th class="thead">Plaats</th>
                        <th class="thead">Website</th>
                        <th class="thead">Contact Persoon</th>
                        <th class="thead">Datum</th>
                        <th></th>
                    </tr>
                    <?php
                    while($row = mysqli_fetch_array($results)) {
                        ?>
                        <tr id="AanmeldingRow">
                            <td style="text-align: center;"><?=$row["bedrijf"]?></td>
                            <td><?=$row["plaats"]?></td>
                            <td><?=$row["website"]?></td>
                            <td><?=$row["contactpersoon"]?></td>
                            <td><?=$row["datum"]?></td>
                            <td><a href="../verwijder/verwijder.php">Verwijder</a></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table> <?php
            }
            ?>


    <?php

    } else {
        header("Location: index.php");
    }
}
?>
<style>
    * {
        font-family: 'Poppins', sans-serif;
    }
    .header {
        position: absolute;
        width: 99%;
        border: 1px solid black;
    }

    .nav-bar {
        position: relative;
        float: right;
    }

    .nav-bar .nav-ul .nav-li {
        right: 150px;
        list-style-type: none;
        display: inline;
        margin: 0.5rem;
        border: 1px solid black;
        padding: 5px;
        border-radius: 5px;
    }

    .nav-bar .nav-ul .nav-li a{
        text-decoration: none;
        color: black;
    }
    #tableAanmelding {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 50%;
        height: fit-content;
        padding: 5px;
    }

    #tableAanmelding td {
        text-align: center;
    }
</style>