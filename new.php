<?php 
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
                <h3 id="header1">Student Registration</h3>
                <div id="center">
                    <?php 
                    if (isset($_POST["submit"])) {
                        $sql = "INSERT INTO student (`NAME`, `PASS`, `MAIL`, `DEPT`) VALUES ('{$_POST["name"]}', '{$_POST["pass"]}', '{$_POST["mail"]}', '{$_POST["dept"]}')";
                        if ($db->query($sql) === TRUE) {
                            echo "<p class='success'>User Registration Success</p>";
                        } else {
                            echo "<p class='error'>Error: " . $db->error . "</p>";
                        }
                    }
                    ?>
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                        <label>Name</label>
                        <input type="text" name="name" required>
                        <label>Password</label>
                        <input type="password" name="pass" required>
                        <label>E-Mail Id</label>
                        <input type="text" name="mail" required>
                        <button type="submit" name="submit">SUBMIT</button>
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
