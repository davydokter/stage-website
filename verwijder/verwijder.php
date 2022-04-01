<?php
session_start();
require '../dbconnect.php';

if ($_SESSION['username']){
    if($_SESSION['role'] == "student"){

        $query = "UPDATE `gebruikers` ";
        $query .= "SET `bedrijf` = NULL , `datum` = NULL, `plaats` = NULL, `website` = NULL, `contactpersoon` = NULL ";
        $query .= "WHERE `ID` = ".  $_SESSION["ID"];
        echo $query;
        $result = mysqli_query($db_connect, $query);

       if ($result) {
           header("Location: ../student/student.php");
       } else {
           echo "Fout bij verwijderen";
       }
    }
}