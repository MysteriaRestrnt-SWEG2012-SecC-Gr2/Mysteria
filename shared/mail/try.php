<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'C:/xampp/composer/vendor/autoload.php';

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

                    // $to = $_POST['to'];
                    // $email=$_POST['email'];
                    // $subject=$_POST['subject'];
                    // $message=$_POST['message'];
                    $mail=new PHPMailer();
                    $mail-> isSMTP();
                    $mail->SMTPAuth= true;
                    $mail->SMTPSecure="tls";
                    $mail->Host="smtp.gmail.com";
                    $mail->Port=587;

                    $mail->Username   = 'restaurantmysteria@gmail.com';                   //SMTP username
                    $mail->Password   = '@Mysteria#2';   
                    
                

                    $mail->setFrom('restaurantmysteria@gmail.com', 'Mysteria');
                    $mail->addAddress('rberhane383@gmail.com', 'red'); 

                    $mail->addReplyTo('restaurantmysteria@gmail.com', 'Mysteria');
                    $mail->addBCC('restaurantmysteria@gmail.com');

          
                    $mail->IsHTML(true);


                    $mail->Subject = 'Here is the subject';
                    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                    if(!$mail->Send())
                    {

                    echo"Mailer Error:".$mail->ErrorInfo;

                    }else{

                    echo "message has been sent";
                    }








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
// //Create an instance; passing true enables exceptions
// $mail = new PHPMailer(true);

// try {
//     //Server settings
//     $mail->SMTPDebug = SMTP::DEBUG_SERVER;                             //Enable verbose debug output
//     $mail->isSMTP();                                                  //Send using SMTP
//     $mail->Host       = 'smtp.gmail.com';                            //Set the SMTP server to send through
//     $mail->SMTPAuth   = true;                                       //Enable SMTP authentication
//     $mail->Username   = 'restaurantmysteria@gmail.com';                   //SMTP username
//     $mail->Password   = '@Mysteria#2';                              //SMTP password
//     $mail->SMTPSecure = 'tls';                                   //Enable implicit TLS encryption
//     $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS

//     //Recipients
//     $mail->setFrom('restaurantmysteria@gmail.com', 'Mysteria');
//     $mail->addAddress('rberhane383@gmail.com', 'red');          //Add a recipient
//     //$mail->addAddress('ellen@example.com');                  //Name is optional
//     $mail->addReplyTo('restaurantmysteria@gmail.com', 'Mysteria');
//     //$mail->addCC('cc@example.com');
//     $mail->addBCC('restaurantmysteria@gmail.com');

//     //Attachments
//     //$mail->addAttachment('/var/tmp/file.tar.gz');          //Add attachments
//     //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

//     //Content
//     // $mail->isHTML(true);                                  //Set email format to HTML
//     $mail->Subject = 'Here is the subject';
//     $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
//     $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

//     $mail->send();
//     echo 'Message has been sent';
// } catch (Exception $e) {
//     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
// }


// require 'PHPMailer/vendor/autoload.php';
 
