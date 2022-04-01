<?php
session_start();
if ($_SESSION['username']){
    if($_SESSION['role'] == "mentor"){
        require "dbconnect.php";

        $query = "SELECT * FROM `gebruikers`";
        $results = mysqli_query($db_connect, $query);
?>
            <div class="header">
                <nav class="nav-bar">
                    <ul class="nav-ul">
                        <li class="nav-li"><a href="login/out.php">Logout</a></li>
                    </ul>
                </nav>
            </div>
                <?php
                    if (mysqli_num_rows($results) == 0){
                        ?> <p>Er zijn geen studenten in uw klas</p> <?php
                    } else {
                        ?>
                        <table id="tableAanmelding" border="1">
                            <tr>
                                <th class="thAanmelding">Naam</th>
                                <th class="thAanmelding">Klas</th>
                                <th class="thAanmelding">StudentNR</th>
                                <th class="thAanmelding">Bedrijf</th>
                                <th class="thAanmelding">Datum Contract</th>
                                <th class="thAanmelding">Details</th>
                            </tr>
                            <?php
                        while($row = mysqli_fetch_array($results)) {
                            if($row['klas'] == $_SESSION['role']['mentor'])
                            ?>
                            <tr>
                                <td><?=$row["username"]?></td>
                                <td><?=$row["klas"]?></td>
                                <td><?=$row["studentnr"]?></td>
                                <?php
                                if($row["bedrijf"] == null){
                                    echo "";
                                } else {
                                 ?> <td><?=$row["bedrijf"]?></td>
                                    <td><?=$row["datum"]?></td>
                                    <td><a href="detail.php?id=<?=$row['ID']?>">Details</a></td>
                                    <?php
                                }
                                ?>
                            </tr>
                            <?php
                        }
                        ?>
                        </table> <?php
                    }
        }
    } else {
    header("Location: index.php");
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
