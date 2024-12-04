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
                <h3 id="header1">View Student Details</h3>
                <?php 
                $sql="SELECT * FROM student";
                $res=$db->query($sql);
                if($res->num_rows > 0){
                    echo "<table>
                    <tr>
                        <th>SNO</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                    </tr>
                        ";
                    $i=0;
                    while($row=$res->fetch_assoc()){ 
                        $i++;
                        echo "<tr>";
                        echo "<td>{$i}</td>";
                        echo "<td>{$row["NAME"]}</td>";
                        echo "<td>{$row["MAIL"]}</td>";
                        echo "</tr>";
                }
                echo "</table>";
            }
                else{
                    echo "<p class='error'>No Student Records Found!</p>";
                }
                ?>  
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
