<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>User Account Activation by Email Verification using PHP</title>
<!-- CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php
session_start();
if($_GET['key'] && $_GET['token'])
{
        $conn = mysqli_connect('localhost', 'root', '', 'mysteriadb');
        if(!$conn)
        {
            die("The database is not connected");
        }
        $email = $_GET['key'];
        $token = $_GET['token'];
        $user = $_GET['user'];
        $query = mysqli_query($conn,"SELECT * FROM registration WHERE `email_verification_link`='$token' and `user_email`='$email' and user_name='$user';" );
      
       
        $d = date('Y-m-d H:i:s');
        if (mysqli_num_rows($query) > 0){
            $row= mysqli_fetch_array($query);
            if($row['email_verified_at'] == NULL){
                $update="UPDATE registration SET email_verified_at ='$d' WHERE user_email='$email' and user_name='$user'";
                mysqli_query($conn,$update);
                
                $_SESSION['sent'] = <<<eol
                <span id="message" style="font-size:15px; color:green;">Congratulations! Your email has been verified. please login</span>
                eol;
                header("Location: http://localhost/Mysteria/shared/signup.php");
                // echo '<script type ="application/JavaScript"> alert ( "your selection has been added to your cart!"); window.location.assign("http://localhost/Mysteria/shared/signup.php"); </script>'; 
            }else{
                $_SESSION['sent'] = <<<eol
                <span id="message" style="font-size:15px; color:blue;">You have already verified your account with us. Feel free to login</span>
                eol;
                header("Location: http://localhost/Mysteria/shared/signup.php");
            }
        } else {
            $_SESSION['sent'] = <<<eol
            <span id="message" style="font-size:15px; color:red;">This email has been not registered with us </span>
            eol;
            header("Location: http://localhost/Mysteria/shared/signup.php");
        }
}
else
{
    echo "Danger! Your something went wrong.";
}
?>
<div class="container mt-3">
<div class="card">
<div class="card-header text-center">
User Account Activation by Email Verification using PHP
</div>
<div class="card-body">
<p><?php echo $msg; ?></p>
</div>
</div>
</div>
</body>
</html>