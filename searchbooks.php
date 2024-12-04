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
                <h3 id="header1">Search Book</h3>
                <div id="center">
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                        <label>Enter the Book Name</label>
                        <textarea required name="name"></textarea>
                        <button type="submit" name="submit">Search!</button>
                    </form>
                </div>
                <?php
                if (isset($_POST["submit"])){
                $sql="SELECT * FROM book where`BTITLE` like '%{$_POST["name"]}%' or `STOCK AVAILABLE`like '%{$_POST["name"]}%' ";
                $res=$db->query($sql);
                if($res->num_rows > 0){
                    echo "<table>
                    <tr>
                        <th>SNO</th>
                        <th>BOOK NAME</th>
                        <th>BOOK</th>
                        <th>AUTHOR</th>
                    </tr>
                        ";
                    $i=0;
                    while($row=$res->fetch_assoc()){ 
                        $i++;
                        echo "<tr>";
                        echo "<td>{$i}</td>";
                        echo "<td>{$row["BTITLE"]}</td>";
                        echo "<td>{$row["STOCK AVAILABLE"]}</td>";
                        echo "<td>{$row["AUTHOR NAME"]}</td>";
                        echo "</tr>";
                }
                echo "</table>";
            }
                else{
                    echo "<p class='error'>No Book Records Found!</p>";
                }
            }
                ?>
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
