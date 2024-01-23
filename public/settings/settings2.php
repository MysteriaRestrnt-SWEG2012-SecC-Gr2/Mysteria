<?php
session_start();

if (isset($_POST['update'])) {
    $Username = $_POST["Username"];
    $Password = $_POST["Password"];
    $cpassword = $_POST["Password2"];
    $Email = $_POST["Email"];
    $ID=$_SESSION['userID'];

    if($cpassword!=$Password)
    {
        echo '<script type ="application/JavaScript"> alert ("Password and confirm password should match"); window.location.href="signup.php#Signin"; </script>'; 
    }
    else{
            $hash=password_hash ($Password, PASSWORD_DEFAULT);

        $connectVariable = mysqli_connect('localhost', 'root', '', 'mysteriadb');
        // $passwordexist = mysqli_real_escape_string($connectVariable,$_POST["passwordsignin"]);
        if (!$connectVariable){
            die("The database is not connected");}
        $sql="UPDATE registration SET user_name='$Username', user_email='$Email', user_password='$hash' WHERE user_id = '$ID'";    
        
        $insertionResult2 = mysqli_query($connectVariable, $sql);

            // $row=mysqli_fetch_assoc($insertionResult2);
            // $passdecrypt=$row["user_password"];
            // $verify=password_verify($passwordexist,$passdecrypt);
        if($insertionResult2){
        $_SESSION['updated']="you have updated your account";
        $_SESSION['old_username']="";
        $_SESSION['old_password']="";
        $_SESSION['old_email']="";
        $_SESSION['user']=$Username;
            header ("Location: acc_sett.php");
            exit();
        }
        else{
            echo "Your User name or Password is invalid.";
        }
    }
  

}
?>