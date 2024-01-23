<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'C:/xampp/composer/vendor/autoload.php';
$mail = new PHPMailer;
//     if(isset($_POST['submit'])){
//         require_once '../../db/connectVar.php';
//     $date = $_POST["date"];
//     $other = $_POST["other"];
//     $order = $_POST["order"];
//     $phone = $_POST["phone"];
//     $phone1 = $_POST["phone1"];
//     $address = $_POST["address"];
//         $user=$_SESSION['userID'];
  
    
//     $sql = "INSERT INTO delivery (user_id,date , other, orders, quantity, phone , phone1, address)
//     VALUES ('$user','$date','$other','$order', '$quantity', '$phone', '$phone1', '$address')";
    
//     if ($connectVariable->query($sql) === TRUE) {
//         header("Location: delivery.php#popup3");
//     } else {
//         echo "Error: " . $sql . "<br>" . $connectVariable->error;
//     }
    
//     $connectVariable->close();
// }
if (isset($_POST['submit'])) {
    $delivID=0;
    $userID=$_SESSION['userID'];
    $order=$_POST["order"];

  

    $other=$_POST["other"];


    $date=$_POST["date"];
    $phone=$_POST["phone"];
    $phone1=$_POST["phone1"];
    $address=$_POST["address"];

    $connectVariable = mysqli_connect('localhost', 'root', '', 'mysteriadb');
    if (!$connectVariable) {
        die("The database is not connected");
    }

        
    $queryInsertion = "INSERT INTO delivery(user_id ,orders, other, date,phone, phone1, address)";
    $queryInsertion .= "VALUES('$userID','$order','$other','$date','$phone','$phone1','$address')";
    $insertionResult = mysqli_query($connectVariable, $queryInsertion);

    $query2 = "SELECT delivery_id FROM delivery WHERE user_id='$userID' ORDER BY delivery_id DESC LIMIT 1";
    $insertionResult2 = mysqli_query($connectVariable, $query2);
    if ($insertionResult2) {
        $row = mysqli_fetch_row($insertionResult2);
        $delivID=$row[0];
    } else {
        die("Not Connected");
    }

    foreach ($_SESSION['foodsInCartD'] as $key=>$fID) {
        $q=$_SESSION['quantityInCartD'][$key];

        $sql="SELECT * FROM cart WHERE user_id=' $userID' and food_id='$fID'";
        $result=mysqli_query($connectVariable, $sql);
        $row=mysqli_fetch_assoc($result);
        $dbQuan=$row['quantity'];


        if ($result->num_rows==1) {
            if ($dbQuan>$q) {
                $sql="UPDATE cart SET quantity='$dbQuan'-'$q' WHERE user_id='$userID' and food_id='$fID'";
                $result=mysqli_query($connectVariable, $sql);
                $sql="UPDATE foodMenu SET quantity=quantity+'$q'  WHERE food_id='$fID'";
                $result=mysqli_query($connectVariable, $sql);
            } elseif ($dbQuan<=$q) {
                $sql="DELETE FROM cart WHERE user_id='$userID' and food_id='$fID'";
                $result=mysqli_query($connectVariable, $sql);
                $sql="UPDATE foodMenu SET quantity=quantity+'$dbQuan'  WHERE food_id='$fID'";
                $result=mysqli_query($connectVariable, $sql);
            }
        } else {
            die("not connected");
        }

        $sql ="INSERT INTO ordered_delivery(delivery_id,food_id,quantity) VALUES ($delivID,$fID,$q)";
        $result=mysqli_query($connectVariable, $sql);
    }

    if ($insertionResult) {
                $mail->SMTPDebug = false;                             //Enable verbose debug output
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
                $mail->Subject = 'Mysteria Delivery';
                $mail->Body = 'Your delivery order is successful your delivery number is ' .$delivID.' please refer back to this information for when you recieve your order .';

                if( $mail->send())
                {            // header("Location: ");
                    echo '<script type ="application/JavaScript"> window.location.assign("http://localhost/Mysteriamain/public/delivery/delivery.php#popup3"); </script>';
                    exit();
                }
                else 
                {
                    die("Not Connected");
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }
}

?>