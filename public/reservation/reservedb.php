<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'C:/xampp/composer/vendor/autoload.php';
$mail = new PHPMailer(true);

if (isset($_POST["Treserve"])) {
    $user_id=$_SESSION['userID'];
    $date = $_POST["date"];
    $time=$_POST["time"];
    echo $time;
    $position = $_POST["position"];
    $tabletype = $_POST["table_type"];
    $carparking = $_POST["car_parking"];
    $people = $_POST["people"];
    $phonecode = $_POST["phone_code"];
    $phone = $_POST["phone"];
    $paymenttype=$_POST["card_type"];
    $accountnumber = $_POST["account_number"];
    $reserved=true;
    
    $connectVariable = mysqli_connect('localhost', 'root', '', 'mysteriadb');
    if (!$connectVariable)
        die("The database is not connected");

        $state=false;
       
        $query = "SELECT * FROM table_info WHERE position='$position' and table_type='$tabletype' and table_state='$state'";
        $result2= mysqli_query($connectVariable,$query);
        
        
        if(mysqli_num_rows($result2)==0)
        {   
             $_SESSION['sent'] = <<<eol
            <span id="message" style="font-size:15px; color:red;">all the tables of the type you have specified are already reserved.  Please reserve another table</span><br>
            eol;
            header("Location: http://localhost/Mysteria/public/reservation/reservationnew.php");
            // echo '<script type ="application/JavaScript"> alert ("all the tables of the type you have specified are already reserved. Please reserve another table");history.back(); </script>'; 
        }else if(mysqli_num_rows($result2)>0)
        {             
            $row=mysqli_fetch_assoc($result2);
            $number=$row["table_number"];
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
                $mail->addAddress($_SESSION['email'], $_SESSION['user']);     //Add a recipient

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Table Reservation';
                $mail->Body = 'Your table have been successfuly reserved for the date '.$date.' for '.$people.' people at time '.$time.'. your table number is ' .$number.' please refer back to this information for canceling your reservation.';

                if( $mail->send())
                {
                    
                 
                $state=true;
                $queryInsertion = "INSERT INTO tablereservation(user_id,date,time,position,table_type,car_parking,number_of_people, phone, phone1,payment_type,account_number,reserved,table_number)";
                $queryInsertion .= "VALUES('$user_id','$date','$time','$position','$tabletype','$carparking','$people','$phonecode','$phone','$paymenttype','$accountnumber','$reserved','$number');";
                $queryInsertion2="UPDATE table_info SET table_state='$state' WHERE table_number='$number';";

                $insertionResult = mysqli_query($connectVariable, $queryInsertion);
                $insertionResult2=mysqli_query($connectVariable, $queryInsertion2);
                if($insertionResult && $insertionResult2)
                {
                    echo '<script type ="application/JavaScript"> alert ("Mail has been sent.");  window.location.href="../home/home.php"; </script>'; 
                }
                }
                else 
                {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }

        }
        
    }
    ?>