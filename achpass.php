<?php
session_start();
include "database.php";
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
                <h3 id="header1">Change Password</h3>
                <div id="center">
                    <?php 
                    if(isset($_POST["submit"])){
                        $sql="SELECT *FROM admin WHERE APASS='{$_POST["opass"]}' and AID='{$_SESSION["AID"]}'";
                        $res=$db->query($sql);
                        if($res->num_rows > 0){
                            $s="Update admin set APASS='{$_POST["npass"]}' WHERE AID=".$_SESSION["AID"];
                            $db->query($s);
                            echo "<p class='success'>Password Changed</p>";
                    }
                    else{
                        echo "invalid pass";
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
                include "adminsidebar.php";
                ?>
            </div>
            <div id="footer">
            <p>Library Management</p>
            </div>
        </div>
    </body>
</html>
