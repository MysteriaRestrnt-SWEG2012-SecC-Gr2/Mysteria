<?php
if (isset($_POST["addAdmin"])){
    $UserName = $_POST["Username"];
    $email = $_POST["Email"];
    $password = $_POST["Password"];
    $cpassword = $_POST["Password2"];
    if($cpassword!=$password)
    {
        echo '<script type ="application/JavaScript"> alert ("Password and confirm password should match"); window.location.href="adminAddForm.php"; </script>'; 
    }
    else{

        $hash = password_hash ($password, PASSWORD_DEFAULT);
    
        $connectVariable = mysqli_connect('localhost', 'root', '', 'mysteriadb');
        if (!$connectVariable)
            die("The database is not connected");
        $sql= "SELECT * FROM registration WHERE user_name = '$UserName'";
        $insertionResult2 = mysqli_query($connectVariable, $sql);
        if(mysqli_num_rows($insertionResult2)>0){
            echo '<script type ="application/JavaScript"> alert ("username is taken"); window.location.href="adminAddForm.php"; </script>'; 
        }
        else{
    
            $queryInsertion = "INSERT INTO registration(user_name , user_password, user_email,user_grp)";
            $queryInsertion .= "VALUES('$UserName','$hash','$email','admin')";
        
            $insertionResult = mysqli_query($connectVariable, $queryInsertion);
            if ($insertionResult){
                echo '<script type ="application/JavaScript"> alert ("A new admin has been registered in the database!"); window.location.href="AdminPage.php"; </script>'; 
            }
            else{
                die("Not Connected");
            }
        }
    }
 
 
    }
?>