<?php
session_start();
require '../dbconnect.php';

if (isset($_POST['verzend']))
{
    $naam = $_POST['naamVeld'];
    $plaats = $_POST['plaatsVeld'];
    $website = $_POST['websiteVeld'];
    $contact = $_POST['contactVeld'];
    $datum = $_POST['datumVeld'];


    $query = "UPDATE `gebruikers` ";
    $query .= "SET `bedrijf` = '". $naam ."', `datum` = '". $datum ."', `plaats` = '". $plaats ."', `website` = '". $website ."', `contactpersoon` = '". $contact ."' ";
    $query .= "WHERE ID = " . $_SESSION["ID"];
    $result = mysqli_query($db_connect, $query);

    if ($result)
    {
        echo "Het item is toegevoeged<br/>";
        header("Location: student.php");
    }
    else
    {
        echo "FOUT bij toevoegen <br/>";
        echo $query . "<br/>";
        echo mysqli_error($db_connect);
    }
}
else
{
    echo "Het formulier is niet (goed) verstuurd<br/>";
}
?>