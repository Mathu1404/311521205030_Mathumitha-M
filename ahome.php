<?php
session_start();
include "database.php";
function countRecord($sql,$db){
    $res = $db->query($sql);
    return $res->num_rows;
}
if (!isset($_SESSION["AID"])){
    header("location:alogin.php");
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
                <h3 id="header1">Welcome Admin!</h3>
                <div id="center">
                    <ul class="record">
                        <li>Total Students:<?php echo countRecord("SELECT * FROM student",$db); ?></li>
                        <li>Total Books:<?php echo countRecord("SELECT *FROM book",$db); ?></li>
                        <li>Total Request:<?php echo countRecord("SELECT * FROM request",$db); ?></li>
                    </ul>
                </div>
            </div>
            <div id="nav">
                <?php
                include "adminsidebar.php";
                ?>
            </div>
            <div id="footer">
            <p>Library Management</p>
            </div>
        </div>
    </body>
</html>