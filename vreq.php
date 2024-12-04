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
                <h3 id="header1">View Request Details</h3>
                <?php 
                $sql="SELECT student.NAME,request.REQ,request.LOGS from student inner join request on student.ID=request.ID;";
                $res=$db->query($sql);
                if($res->num_rows > 0){
                    echo "<table>
                    <tr>
                        <th>SNO</th>
                        <th>NAME</th>
                        <th>REQ</th>
                        <th>LOGS</th>
                    </tr>
                        ";
                    $i=0;
                    while($row=$res->fetch_assoc()){ 
                        $i++;
                        echo "<tr>";
                        echo "<td>{$i}</td>";
                        echo "<td>{$row['NAME']}</td>";
                        echo "<td>{$row['REQ']}</td>";
                        echo "<td>{$row['LOGS']}</td>";
                        echo "</tr>";
                }
                echo "</table>";
            }
                else{
                    echo "<p class='error'>No Request Records Found!</p>";
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
