<?php
session_start();
include "database.php";
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
                <h3 id="header1">Student Login Here</h3>
                <div id="center">
                    <?php
                    if(isset($_POST["submit"])){
                         $name = $_POST["name"];
                         $pass = $_POST["pass"];
                         $sql = "SELECT * FROM student WHERE NAME='$name' AND PASS='$pass'";
                         $res = $db->query($sql);

                         if($res->num_rows > 0){
                            $row=$res->fetch_assoc();
                            $_SESSION["ID"]=$row["ID"];
                            $_SESSION["NAME"]=$row["NAME"];
                            header("location:uhome.php");
                         } else {
                            echo "<p class='error'>Invalid Username or Password!</p>";
                         }
                    }
                    ?>
                <form action="ulogin.php" method="post">
                    <label>Name</label>
                    <input type="text" name="name" required>
                    <label>Password</label>
                    <input type="password" name="pass" required>
                    <button type="submit" name="submit">Login Now</button>
                </form>
                </div>
            </div>
            <div id="nav">
                <?php
                include "sidebar.php";
                ?>
            </div>
            <div id="footer">
            <p>Library Management</p>
            </div>
        </div>
    </body>
</html>