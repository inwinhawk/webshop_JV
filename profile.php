<?php

// Establishing Connection with Server by passing server_name, user_id and password as a parameter

include "dbconnect.php";

session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysql_query("select * from Klant", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['username'];
$admin =$row['admin'];
$login_session_id=$row['id'];

if(!isset($login_session)){
    mysql_close($connection); // Closing Connection
    header('Location: index.php'); // Redirecting To Home Page

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Home Page</title>
    <link href="../css/cart.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="profile">
    <b id="welcome">Welcome : <i><?php echo $login_session; ?></i><i><?php echo $admin; ?></i></b>
    <?php echo $login_session_id; ?>

    <?php

    $query1=mysql_query("select * from login inner JOIN customer on (login.id = customer.id) where login.id='$login_session_id'");
    echo "<table class='edituserdata'><tr><td>UserName</td><td>Password</td><td>email adress</td><td>admin (1= yes)</td><td>forname</td><td>surname</td>";
    while($query2=mysql_fetch_array($query1))
    {
        echo "<tr><td>".$query2['username']."</td>";
        echo "<td>".$query2['password']."</td>";
        echo "<td>".$query2['email']."</td>";
        echo "<td>".$query2['admin']."</td>";
        echo "<td>".$query2['adres']."</td>";
        echo "<td>".$query2['forname']."</td>";
        echo "<td>".$query2['surname']."</td>";
        echo "<td><a href='edit.php?id=".$query2['id']."'>Edit</a></td><</tr>";
        // echo "<td><a href='delete.php?id=".$query2['id']."'>Delete</a></td><tr>";  nog niet toegevoegd
    }
    ?>

    </table>



    <b id="logout"><a href="logout.php">Log Out</a></b>





</div>





</body>
</html>