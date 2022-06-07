<?php 
session_start();
if (!isset($_SESSION['userID'])){
}
else{
    $_SESSION['old_username']="";
    $_SESSION['old_password']="";
    $_SESSION['old_email']="";

    $connectVariable = mysqli_connect('localhost', 'root', '', 'mysteriadb');
    if (!$connectVariable){
        die("The database is not connected");}
    $session_id=session_id();
    $sql= "SELECT * FROM registration where active_sessions= '$session_id'";
    $insertionResult2 = mysqli_query($connectVariable, $sql);
    $row=mysqli_fetch_assoc($insertionResult2);
    if(mysqli_num_rows($insertionResult2)==0 || mysqli_num_rows($insertionResult2)>1){
        echo '<script type ="application/JavaScript"> alert ("Simultaneous login is not allowed. Please login again");  
                     window.location.assign("http://localhost/Mysteria/shared/signup.php"); </script>'; 
        $sql="UPDATE registration SET active_sessions=null WHERE active_sessions= '$session_id'";
            $insertionResult2 = mysqli_query($connectVariable, $sql);
            session_unset();
        
            session_destroy();
        // header("Location:http://localhost/Mysteria/shared/signup.php");
        die();
    }
    else{
        header("Location: http://localhost/Mysteria/public/home/home.php");
        die();
    }
}
?>