<?php
session_start();

if (isset($_POST['Search'])) {
    $UserNameexist = $_POST["usernamesignin"];
    $passwordexist = $_POST["passwordsignin"];

    $connectVariable = mysqli_connect('localhost', 'root', '', 'mysteriadb');
    if (!$connectVariable){
        die("The database is not connected");}
  
    
    $sql= "SELECT * FROM registration where user_name = '$UserNameexist'";
    $insertionResult2 = mysqli_query($connectVariable, $sql);
        $row=mysqli_fetch_assoc($insertionResult2);
        $passdecrypt=$row["user_password"];
        $verify=password_verify($passwordexist,$passdecrypt);
    if($verify){
       $_SESSION['old_username']=$UserNameexist;
       $_SESSION['old_password']=$passwordexist;
       $_SESSION['old_email']=$row["user_email"];
       header("Location: acc_sett.php");
       exit();
    }
    else{
        echo '<script type ="application/JavaScript"> alert ("Your Password is incorrect."); window.location.href="acc_sett.php"; </script>'; 
    }

}
?>