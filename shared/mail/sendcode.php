<?php 
session_start();
require_once '../../db/connectVar.php';
include '../../controller/filter.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'C:/xampp/composer/vendor/autoload.php';
$mail = new PHPMailer;

if (isset($_POST['signup']))
{
  
    $UserName = check_signup($_POST["Username"],"name");
    if(isset($_SESSION["userID"])){
         $Id=$_SESSION["userID"];
    }
   
    $email = check_signup($_POST["Email"],"email");
    $password = check_signup($_POST["Password"],"psd");
    $cpassword = check_signup($_POST["Password2"],"");
    //Create an instance; passing `true` enables exceptions
    $conn = mysqli_connect('localhost', 'root', '', 'mysteriadb');
  
    //sanitize form data

    $UserName = $conn-> real_escape_string($UserName);
    $password = $conn-> real_escape_string($password);
    $cpassword = $conn-> real_escape_string($cpassword);
    $email = $conn-> real_escape_string($email);
   
    //generate key
   $vkey = md5($email.rand(10,9999)); 
   $hash = password_hash($password, PASSWORD_DEFAULT);

if(!$conn){
    die("The database is not connected");
}

$sql= "SELECT * FROM registration WHERE user_name = '$UserName'";
$insertionResult2 = mysqli_query($connectVariable, $sql);
    if(mysqli_num_rows($insertionResult2)>0){
        echo '<script type ="application/JavaScript"> alert ("username is taken"); window.location.href="../signup.php"; </script>'; 
    }else{
      

         $link= "<a href= 'http://localhost/Mysteria/shared/mail/verify.php?key=".$email."&token=".$vkey."&user=".$UserName."'>Register Account</a>";
     
        //Enable verbose debug output
        $mail->IsSMTP();   
        $mail->SMTPDebug = 4;                                          //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'restaurantmysteria@gmail.com';                     //SMTP username
        $mail->Password   = 'zfahqguufmkoznks'; 
        //cgybsqosnsctuftr                              //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;    
         
         //Recipients
         $mail->setFrom('restaurantmysteria@gmail.com', 'Mysteria Restaurant');
         $mail->addAddress($email, $UserName);     //Add a recipient
         
         //Content
         $mail->IsHTML(true);                                  //Set email format to HTML
         $mail->Subject = 'Account verification';
         $mail->Body = '<b>click on this link to verify your account '.$link.'<b>';
         
     
         if( $mail->send())
         {
            $insert = ("insert into registration(user_name,user_email,user_password, email_verification_link) 
            values('$UserName', '$email','$hash', '$vkey')");
            mysqli_query($conn, $insert);

             $_SESSION['sent'] = <<<eol
                     <span id="message" style="font-size:15px; color:green;">we have sent an email to verify your account</span>
                     eol;
                     echo"<script> window.location.assign('http://localhost/Mysteria/shared/signup.php'); </script>";
         }
         else 
         {
                $_SESSION['sent'] = <<<eol
                <span id="message" style="font-size:15px; color:red;">Message could not be sent. Mailer Error: {$mail->ErrorInfo}</span>
                eol;
                echo"<script> window.location.assign('http://localhost/Mysteria/shared/signup.php'); </script>";
             }
    }
   
    }


?>