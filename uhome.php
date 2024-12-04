<?php
session_start();
include "database.php";
if (!isset($_SESSION["ID"])){
    header("location:ulogin.php");
}
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>IT Library Management</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div id="container">
            <div id="header">
            <h1>IT Library Management System</h1>
            </div>
            <div id="wrapper">
                <h3 id="header1">Welcome <?php echo $_SESSION["NAME"]; ?>!</h3>
                
            </div>
            <div id="nav">
                <?php
                include "usersidebar.php";
                ?>
            </div>
            <div id="footer">
            <p>Library Management</p>
            </div>
        </div>
    </body>
</html>