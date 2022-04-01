<?php
require 'dbconnect.php';
session_start();

switch($_SESSION['role']){
    case "mentor":
        header("Location: overzicht.php");
        break;
    case "student":
        header("Location: student/student.php");
        break;
    default:
        break;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <div class="header">
        <nav class="nav-bar">
            <ul class="nav-ul">
                <li class="nav-li"><a href="login/login.php">Login</a></li>
                <?php
                if($_SESSION['username'])
                {
                    ?> <li class="nav-li"><a href="login/out.php">Logout</a></li><?php
                } ?>
            </ul>
        </nav>
    </div>
    <div class="main-div">
        <h1>Stage</h1>
        <h3>Website om een stage te vinden:</h3>
        <p><a href="https://stagemarkt.nl/">Klik hier</a></p>
        <h3>Website met tips voor solicitaties:</h3>
        <p><a href="https://www.randstad.nl/ontwikkelen/loopbaan/solliciteren/sollicitatiegesprek-voorbereiden">Klik hier</a></p>
        <h3>Website met tips voor een solicitatiebrief:</h3>
        <p><a href="https://www.randstad.nl/ontwikkelen/loopbaan/solliciteren/sollicitatiebrief">Klik hier</a></p>
    </div>
</body>
</html>

<style>
    * {
        font-family: 'Poppins', sans-serif;
        background-color: #dedfdf;
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

    .main-div {
        border: 1px solid greenyellow;
        border-radius: 5px;
        box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.5);
        position: absolute;
        height: fit-content;
        width: 50%;
        top: 25%;
        left: 25%;
        margin: 0;
    }

    .main-div{
        text-align: center;
    }

</style>