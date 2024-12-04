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
                <h3 id="header1">Upload Books</h3>
                <div id="center">
                <?php 
                if (isset($_POST["submit"])) {
                    $sql = "INSERT INTO book (BTITLE, `STOCK AVAILABLE`, `AUTHOR NAME`) VALUES ('{$_POST["bname"]}', '{$_POST["stock"]}', '{$_POST["auname"]}')";
                    if ($db->query($sql) === TRUE) {
                        echo "<p class='success'>Book uploaded</p>";
                    } else {
                        echo "<p class='error'>Error in Upload: " . $db->error . "</p>";
                    }
                }
                ?>
                    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                        <label>Book Title</label>
                        <input type="text" name="bname" required>
                        <label>Stock Available</label>
                        <input type="text" name="stock" required>
                        <label>Author Name</label>
                        <textarea name="auname" required></textarea>
                        <button type="submit" name="submit">Upload Book</button>
                    </form>
                </div>  
            </div>
            <div id="nav">
                <?php include "adminsidebar.php"; ?>
            </div>
            <div id="footer">
                <p>Library Management</p>
            </div>
        </div>
    </body>
</html>
