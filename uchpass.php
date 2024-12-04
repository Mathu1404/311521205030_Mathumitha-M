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
                <h3 id="header1">Change Password</h3>
                <div id="center">
                    <?php 
                    if(isset($_POST["submit"])){
                        $sql="SELECT *FROM student WHERE PASS='{$_POST["opass"]}' and ID='{$_SESSION["ID"]}'";
                        $res=$db->query($sql);
                        if($res->num_rows > 0){
                            $s="Update student set PASS='{$_POST["npass"]}' WHERE ID=".$_SESSION["ID"];
                            $db->query($s);
                            echo "<p class='success'>Password Changed</p>";
                    }
                    else{
                        echo "<p class='error'>Invalid pass</p>";
                    }
                    }
                    ?>
                    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                        <label>Old Password</label>
                        <input type="password" name="opass"required>
                        <label>New Password</label>
                        <input type="password" name="npass"required>
                        <button typ="submit" name="submit">Update Password</button>
                    </form>
                </div>  
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
