<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'C:/xampp/composer/vendor/autoload.php';
$mail = new PHPMailer;


if (isset($_POST["Treserve"])) {
    $user_id=$_SESSION['userID'];
    $date = $_POST["date"];
    $time=$_POST["time"];
    $occasion=$_POST["occasion"];
    $people = $_POST["people"];
    $phonecode = $_POST["phone1"];
    $phone = $_POST["phone2"];
    $paymenttype=$_POST["card_type"];
    $accountnumber = $_POST["account_number"];
    $reserved=true;
 
    
    $connectVariable = mysqli_connect('localhost', 'root', '', 'mysteriadb');
    if (!$connectVariable)
        {die("The database is not connected");}
else{
        $query = "SELECT * FROM reservation WHERE date='$date'";
        $result2= mysqli_query($connectVariable,$query); 
        
        if(mysqli_num_rows($result2)>=2)
        {
            echo '<script type ="application/JavaScript"> alert ("Booked out for the date specified please choose another date.");history.back(); </script>'; 
        }
        else if(mysqli_num_rows($result2)<2)
        {      
            $number=1;
            if(mysqli_num_rows($result2)==1){
                $row=mysqli_fetch_assoc($result2);
                $number=$row["room"];
                if ($number==1){
                    $number=2;
                }
                else{
                    $number==1;
                }
            }       
             

                
                $mail->IsSMTP();   
                $mail->SMTPDebug = false;                                          //Send using SMTP
                $mail->Host       = 'smtp.mail.yahoo.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'restaurantmysteria@yahoo.com';                     //SMTP username
                $mail->Password   = 'cgybsqosnsctuftr';                               //SMTP password
                $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
                $mail->Port       = 465;    
                //Recipients
                $mail->setFrom('restaurantmysteria@yahoo.com', 'MYSTERIA RESTAURANT');
                $mail->addAddress($_SESSION['email'], $_SESSION['user']);     //Add a recipient
               
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Event Reservation';
                $mail->Body = 'Event have been successfuly reserved for the date '.$date.'and for time '.$time. 'for '.$people.' people with room number '.$number.'. please refer back to this information for canceling your reservation.';
                if( $mail->send())
                {
                    
                    $queryInsertion = "INSERT INTO reservation(user_id,date,time,occasion,number_of_people, phone1, phone2,payment_type,account_number,reserved,room)";
                    $queryInsertion .= " VALUES ('$user_id','$date','$time','$occasion','$people','$phonecode','$phone','$paymenttype','$accountnumber','$reserved','$number')";
                    $insertionResult = mysqli_query($connectVariable, $queryInsertion);
                    if($insertionResult){
                        echo '<script type ="application/JavaScript"> window.location.assign("http://localhost/Mysteria/public/event/reserve.php#popup3"); </script>';
                        exit(); 
                    }
                    else{
                        echo"enkuan";

                    }
                }
                else 
                {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }
    }
}
    ?>