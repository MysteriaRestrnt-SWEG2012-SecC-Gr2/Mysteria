<?php
session_start();
$connectVariable = mysqli_connect('localhost', 'root', '', 'mysteriadb');
    if (!$connectVariable){
        die("The database is not connected");}
    $session_id=session_id();
    $UserID=$_SESSION['userID'];
    $sql="UPDATE registration SET active_sessions=null WHERE user_id= '$UserID'";
    $insertionResult2 = mysqli_query($connectVariable, $sql);


session_unset();

session_destroy();

header("Location: signup.php");
die();
?>