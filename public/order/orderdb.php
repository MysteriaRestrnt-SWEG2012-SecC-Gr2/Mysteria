<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'C:/xampp/composer/vendor/autoload.php';
$mail = new PHPMailer(true);

if (isset($_POST['submit'])) {
    $orderID=0;
    $userID=$_SESSION['userID'];
    $order=$_POST["order"];
    $ingrid="";
    $othArr=array();

    $other=$_POST["other"];
    //     $othArr=explode(',',$other);
        
    //     $allergicFoods=array();

    // foreach($othArr as $addit){
    //     $sql="SELECT food_id FROM ingredient WHERE ingredient_name LIKE '%$addit%'";
        
    //     $result=mysqli_query($connectVariable,$sql);
    //     if($result){
    //         while( $row=mysqli_fetch_row($result)){
    //             echo $addit;
    //             array_push($allergicFoods,$row[0]);
    //         }
    //     }
    //     }
    
   
    if (!empty($_POST['allergy'])) {
        foreach ($_POST['allergy'] as $str) {
            
            // $sql="SELECT * FROM foodmenu INNER JOIN ingredient WHERE  ingredient_name LIKE '$str%' and foodmenu.food_id=ingredient.food_id";;
            // $result=mysqli_query($connectVariable,$sql);
            // if($result){
            //     while( $row=mysqli_fetch_assoc($result)){
            //         $id=$row['food_id'];
            //         echo $str." $id <br>";
            //         array_push($allergicFoods,$id);
            //     }
            // }
                
            
            $ingrid.=$str.", ";
        }
    }
    $ingrid.=" ".$other;

    $date=$_POST["date"];
    $time=$_POST["time"];
    $phone=$_POST["phone"];
    $phone1=$_POST["phone1"];
    $address=$_POST["address"];

    $connectVariable = mysqli_connect('localhost', 'root', '', 'mysteriadb');
    if (!$connectVariable) {
        die("The database is not connected");
    }

    // foreach ($_SESSION['foodsInCart'] as $key=>$fID) {
    //     foreach($allergicFoods as $aller){
    //         if($fID==$aller){
    //             $query = "SELECT * FROM foodmenu INNER JOIN ingredient WHERE  foodmenu.food_id='$fID' and foodmenu.food_id=ingredient.food_id";
    //             $qResult = mysqli_query($connectVariable, $query);
    //             $row=mysqli_fetch_assoc($qResult);
    //             $name=$row['food_name'];
    //             $ing=$row['ingredient_name'];
    //             if (mysqli_num_rows($qResult)>0) {
    //                 echo "yes $fID $name  $ing<br>";
    //             } else {
    //                 echo "no";
    //             }
    //         }
    //     }
    // }


        



    $queryInsertion = "INSERT INTO ordersfood(user_id ,food_ordered, allergy, date, time,phone, phone1, address)";
    $queryInsertion .= "VALUES('$userID','$order','$ingrid','$date','$time','$phone','$phone1','$address')";
    $insertionResult = mysqli_query($connectVariable, $queryInsertion);

    $query2 = "SELECT order_id FROM ordersfood WHERE user_id='$userID' ORDER BY order_id DESC LIMIT 1";
    $insertionResult2 = mysqli_query($connectVariable, $query2);
    if ($insertionResult2) {
        $row = mysqli_fetch_row($insertionResult2);
        $orderID=$row[0];
    } else {
        die("Not Connected");
    }

    foreach ($_SESSION['foodsInCart'] as $key=>$fID) {
        $q=$_SESSION['quantityInCart'][$key];

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

        $sql ="INSERT INTO orders(order_id,food_id,quantity) VALUES ($orderID,$fID,$q)";
        $result=mysqli_query($connectVariable, $sql);
    }

    if ($insertionResult) {
        $mail->SMTPDebug = false;                             //Enable verbose debug output
                $mail->isSMTP();                                                  //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                            //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                       //Enable SMTP authentication
                $mail->Username   = 'restaurantmysteria@gmail.com';                   //SMTP username
                $mail->Password   = 'vsdvvakdcmkncfpc';                              //SMTP password
                $mail->SMTPSecure = 'tls';                                   //Enable implicit TLS encryption
                $mail->Port       = 587;  

                //Recipients
                $mail->setFrom('restaurantmysteria@gmail.com', 'MYSTERIA RESTAURANT');
                $mail->addAddress($_SESSION['email'], $_SESSION['user']);     //Add a recipient

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Mysteria Order';
                $mail->Body = 'Your order is successful your order number is ' .$orderID.' please refer back to this information for when you recieve your order .';

                if( $mail->send())
                {
                    echo '<script type ="application/JavaScript"> window.location.assign("http://localhost/Mysteria/public/order/order2.php#popup3"); </script>';
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