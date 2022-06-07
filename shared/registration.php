<?php
session_start();
if (isset($_POST["signup"])) {
    $UserName = $_POST["Username"];
    $email = $_POST["Email"];
    $password = $_POST["Password"];
    $cpassword = $_POST["Password2"];
    if($cpassword!=$password)
    {
        echo '<script type ="application/JavaScript"> alert ("Password and confirm password should match"); window.location.href="signup.php#Signin"; </script>'; 
    }
    else{

        $hash = password_hash ($password, PASSWORD_DEFAULT);
    
        $connectVariable = mysqli_connect('localhost', 'root', '', 'mysteriadb');
        if (!$connectVariable)
            die("The database is not connected");
        $sql= "SELECT * FROM registration WHERE user_name = '$UserName'";
        $insertionResult2 = mysqli_query($connectVariable, $sql);
        if(mysqli_num_rows($insertionResult2)>0){
            echo '<script type ="application/JavaScript"> alert ("username is taken"); window.location.href="signup.php"; </script>'; 
        }
        else{
    
            $queryInsertion = "INSERT INTO registration(user_name , user_password, user_email)";
            $queryInsertion .= "VALUES('$UserName','$hash','$email')";
        
            $insertionResult = mysqli_query($connectVariable, $queryInsertion);
            if ($insertionResult){
                echo '<script type ="application/JavaScript"> alert ("You Have Been Registered. We are glad to have you on our side"); window.location.href="signup.php#Signin"; </script>'; 
            }
            else{
                die("Not Connected");
            }
        }
    }
}

if (isset($_POST['signin'])) {
        $UserNameexist = $_POST["usernamesignin"];
        $passwordexist = $_POST["passwordsignin"];

        $connectVariable = mysqli_connect('localhost', 'root', '', 'mysteriadb');
        $passwordexist = mysqli_real_escape_string($connectVariable,$_POST["passwordsignin"]);
        if (!$connectVariable){
        die("The database is not connected");}


        $sql= "SELECT * FROM registration where user_name = '$UserNameexist'";
        $insertionResult2 = mysqli_query($connectVariable, $sql);
        
        $row=mysqli_fetch_assoc($insertionResult2);
        $passdecrypt=$row["user_password"];
        $verify=password_verify($passwordexist,$passdecrypt);

        if($verify && isset($row['email_verified_at'])){
                $_SESSION['user']=$UserNameexist;
                $_SESSION['userID']=$row["user_id"];
                $_SESSION['email']=$row["user_email"];
                $_SESSION['user_grp']=$row['user_grp'];            
                $_SESSION['query']="";
                $_SESSION['cartCount']=0;
                $_SESSION['terms']=false;
                $_SESSION['terms2']=false;
                $session_id=session_id();

                $sql= "SELECT * FROM registration where user_name='$UserNameexist' and (active_sessions='$session_id' or active_sessions IS NULL or active_sessions=''  )";
                $insertionResult2 = mysqli_query($connectVariable, $sql);
                $row=mysqli_fetch_assoc($insertionResult2);
                
                if(mysqli_num_rows($insertionResult2)==0){
                    session_unset();
                    echo '<script type ="application/JavaScript"> alert ("this account is already logged in."); window.location.href="signup.php#Signin"; </script>';
                    // echo "hi";
                }
                else if(mysqli_num_rows($insertionResult2)>0){
                    $_SESSION['start'] = time();
                    $sql2="UPDATE registration SET active_sessions='$session_id' WHERE user_name = '$UserNameexist'";
                    $insertion = mysqli_query($connectVariable, $sql2);
                    if( $row['user_grp']=="admin"){
                    header ("Location: ../admin/AdminPage.php");
                    }
                    else{
                    header ("Location: ../public/home/home.php");
                    }        
                }
        }
        else if(!isset($row['email_verified_at'])){
            $_SESSION['sent'] = <<<eol
            <span id="message" style="font-size:15px; color:red;">Please verify your account before login.</span>
            eol;
            header("Location: http://localhost/Mysteria/shared/signup.php");
    
            }
        else{
            $_SESSION['sent'] = <<<eol
            <span id="message" style="font-size:15px; color:red;">Your Username or Password is invalid.</span>
            eol;
            header("Location: http://localhost/Mysteria/shared/signup.php");
    
            }

}
?>