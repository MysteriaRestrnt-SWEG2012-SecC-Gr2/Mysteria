<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'C:/xampp/composer/vendor/autoload.php';
$mail = new PHPMailer(true);

if (isset($_POST['signup']))
{
    $UserName = $_POST["Username"];
    $Id=$_SESSION["userID"];
    $email = $_POST["Email"];
    $password = $_POST["Password"];
    $cpassword = $_POST["Password2"];
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

   $insert = ("insert into registration(user_name,user_email,user_password, email_verification_link) 
   values('$UserName', '$email','$hash', '$vkey')");
  

    mysqli_query($conn, $insert);
    $link= "<a href= 'http://localhost/Mysteria/shared/mail/verify.php?key=".$email."&token=".$vkey."&user=".$UserName."'>Register Account</a>";

    $mail->SMTPDebug = false;                             //Enable verbose debug output
    $mail->isSMTP();                                                  //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                            //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                       //Enable SMTP authentication
    $mail->Username   = 'restaurantmysteria@gmail.com';                   //SMTP username
    $mail->Password   = '@Mysteria#2';                              //SMTP password
    $mail->SMTPSecure = 'tls';                                   //Enable implicit TLS encryption
    $mail->Port       = 587;  

    //Recipients
    $mail->setFrom('restaurantmysteria@gmail.com', 'MYSTERIA RESTAURANT');
    $mail->addAddress($email, $UserName);     //Add a recipient
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Account verification';
    $mail->Body = 'click on this link '.$link.'';
    

    if( $mail->send())
    {
        echo "Message has been sent";
    }
    else 
    {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }


     if (isset($_POST['sub_btn3'])) 
    {
        $conn = mysqli_connect('localhost', 'root', '', 'mysteriadb');
        if(!$conn){
            die("The database is not connected");
        }

        $id=$_POST["sub_btn3"];
        
        $UserName=$_POST["newUser"];
        $new_pass=$_POST["newPassword"];
        $c_pass=$_POST["Password2"];

        $UserName = $conn-> real_escape_string($UserName);
        $password = $conn-> real_escape_string($new_pass);
        $c_pass = $conn-> real_escape_string($c_pass);
        

        $rand= "SELECT * FROM registration WHERE user_id='$id'";
        $result= mysqli_query($conn,$rand);
        $row=mysqli_fetch_assoc($result);
        $email=$row['user_email'];
        $hash = password_hash ($c_pass, PASSWORD_DEFAULT);

        $Insertion = "UPDATE registration SET user_name='$UserName', user_password='$hash' WHERE user_email='$email' and user_id='$id'";
        mysqli_query($conn, $Insertion);

        $sql= "SELECT * FROM registration where user_id='$id'";
        $insertionResult2 = mysqli_query($conn, $sql);
        
        $row=mysqli_fetch_assoc($insertionResult2);

if($Insertion && isset($row['email_verified_at'])){
    $_SESSION['user']=$UserName;
    $_SESSION['userID']=$row["user_id"];
    $_SESSION['email']=$row["user_email"];
    $_SESSION['user_grp']=$row['user_grp'];            
    $_SESSION['query']="";
    $_SESSION['cartCount']=0;
    $_SESSION['terms']=false;
    $_SESSION['terms2']=false;
    $session_id=session_id();

    $sql= "SELECT * FROM registration where user_name='$UserName' and (active_sessions='$session_id' or active_sessions IS NULL or active_sessions=''  )";
    $insertionResult2 = mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($insertionResult2);
    
    if(mysqli_num_rows($insertionResult2)==0){
        session_unset();
        echo '<script type ="application/JavaScript"> alert ("this account is already logged in."); window.location.href="signup.php#Signin"; </script>';
        // echo "hi";
    }
    else if(mysqli_num_rows($insertionResult2)>0){
        $_SESSION['start'] = time();
        $sql2="UPDATE registration SET active_sessions='$session_id' WHERE user_name = '$UserName'";
        $insertion = mysqli_query($conn, $sql2);
        if( $row['user_grp']=="admin"){
           
        header ("Location: ../../admin/AdminPage.php");
        }
        else{
        header ("Location: ../../public/home/home.php");
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