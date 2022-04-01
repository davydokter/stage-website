<?php
session_start();
require 'dbconnect.php';
if ($_SESSION['username']){
    if($_SESSION['role'] == "mentor"){
        require "dbconnect.php";
        $id = $_GET['id'];

        $query = "SELECT * FROM `gebruikers` WHERE `ID` = " . $id;
        $results = mysqli_query($db_connect, $query);

        while($row = mysqli_fetch_array($results)) {
            ?>
            <div class="header">
                <nav class="nav-bar">
                    <ul class="nav-ul">
                        <li class="nav-li"><a href="index.php">Terug</a></li>
                    </ul>
                </nav>
            </div>
            <main>
                <table border="1" class="tableAanmelding">
                    <tr>
                        <th class="thAanmelding">Naam</th>
                        <th class="thAanmelding">Klas</th>
                        <th class="thAanmelding">StudentNR</th>
                        <th class="thAanmelding">Bedrijf</th>
                        <th class="thAanmelding">Datum</th>
                        <th class="thAanmelding">Plaats</th>
                        <th class="thAanmelding">Website</th>
                        <th class="thAanmelding">Contact Persoon</th>
                    </tr>

                    <tr>
                        <td><?=$row["username"]?></td>
                        <td><?=$row["klas"]?></td>
                        <td><?=$row["studentnr"]?></td>
                        <td><?=$row["bedrijf"]?></td>
                        <td><?=$row["datum"]?></td>
                        <td><?=$row["plaats"]?></td>
                        <td><?=$row["website"]?></td>
                        <td><?=$row["contactpersoon"]?></td>
                    </tr>
                </table>
            </main>

            <?php
        }
    } else {
            header("Location: index.php");
    }
} ?>

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
    .tableAanmelding {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 50%;
        height: fit-content;
        padding: 5px;
        border-radius: 5px;
    }
    .tableAanmelding th {
        border-radius: 5px;
    }
    .tableAanmelding td {
        text-align: center;
        border-radius: 5px;
    }
</style>
