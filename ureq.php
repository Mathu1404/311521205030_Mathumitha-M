<?php
session_start();
include "database.php";
if (!isset($_SESSION["ID"])) {
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
                <h3 id="header1">Book Request</h3>
                <div id="center">
                    <?php 
                    if (isset($_POST["submit"])) {
                        $sql = "INSERT INTO request (ID, REQ, LOGS) VALUES ('{$_SESSION["ID"]}', '{$_POST["req"]}', NOW())";
                        if ($db->query($sql)) {
                            echo "<p class='success'>Request Submitted Successfully</p>";
                        } else {
                            echo "<p class='error'>Error in submitting request</p>";
                        }
                    }
                    ?>
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                        <label>Your Book Request</label>
                        <textarea required name="req"></textarea>
                        <button type="submit" name="submit">Submit Request</button>
                    </form>
                </div>  
            </div>
            <div id="nav">
                <?php include "usersidebar.php"; ?>
            </div>
            <div id="footer">
                <p>Library Management</p>
            </div>
        </div>
    </body>
</html>
