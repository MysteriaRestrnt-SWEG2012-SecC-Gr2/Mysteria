<?php 
   require_once '../db/connectVar.php';
   require ('../fpdf/fpdf.php');

?>
<!DOCTYPE html>  
       <html>  
            <head>  
                 <title> Export</title>  
                 <link rel="stylesheet" type="text/css" href="../css/reportstyle.css"> 
            </head>  
            <body>
                
                 <div class="container">  
                      <div class="wrapper">
                          <h1>Report</h1>
                      </div>
                      <div class="data">
        <form action="csv2.php" method="GET">
          <select class="forms" name="category" value="export">
                            <option  value="delivery"> Export delivery</option>
                            <option  value="feedback">Export feedback</option>
                            <option  value="ingredient">Export ingredient</option>
                            <option  value="ordersfood">Export ordersfood</option>
                            <option  value="registration">Export registration</option>
                            <option  value="reservation">Export reservation</option>
                            <option  value="tablereservation">Export table reservation</option>
                        </select>
        <select name="exportcat" class="forms" value="export" >
            <option value="pdf">To PDF</option>
            <option value="excel">To Excel</option>
        </select><br>
        <input type="submit" name="submit" value="Submit" class="btns">

    </form>
                    <?php
                    if(isset($_GET['submit']))
                    {
                        $srchQuery2=$_GET['exportcat'];
                        if(empty($srchQuery2)){
                                                   
                            $srchQuery2=$_SESSION['exportcat'];
                        }
                        else{
                            $_SESSION['exportcat']=$srchQuery2;
                        }
                        $output ='';
                        if($srchQuery2 == 'pdf'){

                                               $srchQuery=$_GET['category'];
                                               if(empty($srchQuery)){
                                                   
                                                   $srchQuery=$_SESSION['category'];
                                               }
                                               else{
                                                   $_SESSION['category']=$srchQuery;
                                               }
                                               
                                               
                                               if($srchQuery == 'ordersfood'){
                                               $sql= "SELECT * FROM ordersfood ;";
                                                   $insertionResult2 = mysqli_query($connectVariable, $sql);
                                                  
                                                while($row = mysqli_fetch_assoc($insertionResult2))
                                                { 
                                                   $orderid= $row["order_id"];
                                                   $user= $row["user_id"]; 
                                                   $order=$row["food_ordered"];
                                                   $allergy=$row["allergy"];
                                                   $date= $row["date"];
                                                   $time= $row["time"];
                                                   $quantity= $row["quantity"];
                                                   $phone1= $row["phone1"];
                                                   $address= $row["address"];
                                   
                                                   $pdf = new FPDF();
                                                   $pdf->AddPage();
                                                   $pdf->SetFont("Arial", "I", 13);
                                                   $pdf->Cell(110,10,"Order Information", 1,1,'C');
                                               
                                   
                                                   $pdf->Cell(50,10,"Order ID: ",1,0);
                                                   $pdf->Cell(60,10,$orderid,1,1);
                                   
                                                   $pdf->Cell(50,10,"User ID: ",1,0);
                                                   $pdf->Cell(60,10,$user,1,1);
                                   
                                                   $pdf->Cell(50,10,"Order: ",1,0);
                                                   $pdf->Cell(60,10,$order,1,1);
                                   
                                                   $pdf->Cell(50,10,"allergy: ",1,0);
                                                   $pdf->Cell(60,10,$allergy,1,1);
                                   
                                                   $pdf->Cell(50,10,"Date: ",1,0);
                                                   $pdf->Cell(60,10,$date,1,1);
                                   
                                                   $pdf->Cell(50,10,"Time: ",1,0);
                                                   $pdf->Cell(60,10,$time,1,1);
                                   
                                                   $pdf->Cell(50,10,"Quantity: ",1,0);
                                                   $pdf->Cell(60,10,$Quantity,1,1);
                                   
                                                   $pdf->Cell(50,10,"Phone: ",1,0);
                                                   $pdf->Cell(60,10,$phone1,1,1);
                                   
                                                   $pdf->Cell(50,10,"Address: ",1,0);
                                                   $pdf->Cell(60,10,$address,1,1);
                                   
                                                   header('Content-Type: application/pdf');
                                                   header('Content-Disposition: attachment; filename=download.pdf');
                                                   $pdf->output();
                                                   ob_end_flush();
                                               }     
                                                       
                                                               
                                       }
                                          else if($srchQuery == 'delivery'){
                                              $sql1= "SELECT * FROM delivery ;";
                                                  $insertionResult3 = mysqli_query($connectVariable, $sql1);
                                                  
                                                  while($row3 = mysqli_fetch_assoc($insertionResult3))
                                                        { 
                                                            $deliveryid= $row3["delivery_id"];
                                                            $user= $row3["user_id"]; 
                                                            $date= $row3["date"];
                                                            $order= $row3["orders"];
                                                            $other= $row3["other"];
                                                            $quantity= $row3["quantity"];
                                                            $phone1= $row3["phone1"];
                                                            $address= $row3["address"];
                                            
                                                            $pdf = new FPDF();
                                                            $pdf->AddPage();
                                                            $pdf->SetFont("Arial", "I", 13);
                                                            $pdf->Cell(110,10,"Delivery Information", 1,1,'C');
                                                        
                                            
                                                            $pdf->Cell(50,10,"Delivery ID: ",1,0);
                                                            $pdf->Cell(60,10,$deliveryid,1,1);
                                            
                                                            $pdf->Cell(50,10,"User ID: ",1,0);
                                                            $pdf->Cell(60,10,$user,1,1);
                                            
                                                            $pdf->Cell(50,10,"Date: ",1,0);
                                                            $pdf->Cell(60,10,$date,1,1);
                
                                                            $pdf->Cell(50,10,"Order: ",1,0);
                                                            $pdf->Cell(60,10,$order,1,1);
                                            
                                                            $pdf->Cell(50,10,"Other: ",1,0);
                                                            $pdf->Cell(60,10,$other,1,1);
                                            
                                                            $pdf->Cell(50,10,"Quantity: ",1,0);
                                                            $pdf->Cell(60,10,$Quantity,1,1);
                                            
                                                            $pdf->Cell(50,10,"Phone: ",1,0);
                                                            $pdf->Cell(60,10,$phone1,1,1);
                                            
                                                            $pdf->Cell(50,10,"Address: ",1,0);
                                                            $pdf->Cell(60,10,$address,1,1);
                                            
                                                            header('Content-Type: application/pdf');
                                                            header('Content-Disposition: attachment; filename=download.pdf');
                                                            $pdf->output();
                                                            ob_end_flush();
                                                        }
                                      }
                                      else if($srchQuery == 'feedback'){
                                          $sql2= "SELECT * FROM feedback ;";
                                              $insertionResult4 = mysqli_query($connectVariable, $sql2);
                                              
                                              while($row4 = mysqli_fetch_assoc($insertionResult4))
                                                        { 
                                                            $feedbackid= $row4["feedback_no"];
                                                            $subject= $row4["subject"]; 
                                                            $date= $row["date"];
                                                            $comment= $row["comment"];
                
                                                            $pdf = new FPDF();
                                                            $pdf->AddPage();
                                                            $pdf->SetFont("Arial", "I", 13);
                                                            $pdf->Cell(110,10,"Feedback Information", 1,1,'C');
                                                        
                                            
                                                            $pdf->Cell(50,10,"Feedback ID: ",1,0);
                                                            $pdf->Cell(60,10,$feedbackid,1,1);
                                            
                                                            $pdf->Cell(50,10,"Subject: ",1,0);
                                                            $pdf->Cell(60,10,$subject,1,1);
                                            
                                                            $pdf->Cell(50,10,"Date: ",1,0);
                                                            $pdf->Cell(60,10,$date,1,1);
                                            
                                                            $pdf->Cell(50,10,"Comment: ",1,0);
                                                            $pdf->Cell(60,10,$comment,1,1);
                                            
                                                            header('Content-Type: application/pdf');
                                                            header('Content-Disposition: attachment; filename=download.pdf');
                                                            $pdf->output();
                                                            ob_end_flush();
                                                        }
                                  }
                              else if($srchQuery == 'ingredient'){
                                  $sql3= "SELECT * FROM ingredient ;";
                                      $insertionResult5 = mysqli_query($connectVariable, $sql3);
                                      
                                      while($row5 = mysqli_fetch_assoc($insertionResult5))
                                                        { 
                                                            $ingredientid= $row5["ingredients_id"];
                                                            $name= $row5["name"]; 
                                                           
                                            
                                                            $pdf = new FPDF();
                                                            $pdf->AddPage();
                                                            $pdf->SetFont("Arial", "I", 13);
                                                            $pdf->Cell(110,10,"Ingredient Information", 1,1,'C');
                                                        
                                            
                                                            $pdf->Cell(50,10,"Ingredient ID: ",1,0);
                                                            $pdf->Cell(60,10,$ingredientid,1,1);
                                            
                                                            $pdf->Cell(50,10,"Name: ",1,0);
                                                            $pdf->Cell(60,10,$name,1,1);
                                            
                                                            header('Content-Type: application/pdf');
                                                            header('Content-Disposition: attachment; filename=download.pdf');
                                                            $pdf->output();
                                                            ob_end_flush();
                                                        }
                          }
                          else if($srchQuery == 'registration'){
                              $sql4= "SELECT * FROM registration ;";
                                  $insertionResult6 = mysqli_query($connectVariable, $sql4);
                                  
                                  while($row6 = mysqli_fetch_assoc($insertionResult6))
                                                        { 
                                                            $userid= $row6["user_id"];
                                                            $username= $row6["user_name"];
                                                            $email= $row6["user_email"]; 
                                                            $verifyemail=$row6["email_verification_link"];
                                            
                                                            $pdf = new FPDF();
                                                            $pdf->AddPage();
                                                            $pdf->SetFont("Arial", "I", 13);
                                                            $pdf->Cell(110,10,"Registration Information", 1,1,'C');
                                                        
                                            
                                                            $pdf->Cell(50,10,"User ID: ",1,0);
                                                            $pdf->Cell(60,10,$userid,1,1);
                                            
                                                            $pdf->Cell(50,10,"User Name: ",1,0);
                                                            $pdf->Cell(60,10,$username,1,1);
                                            
                                                            $pdf->Cell(50,10,"Email: ",1,0);
                                                            $pdf->Cell(60,10,$email,1,1);
                                            
                                                            $pdf->Cell(50,10,"Verification Link: ",1,0);
                                                            $pdf->Cell(60,10,$verifyemail,1,1);
                                            
                                            
                                                            header('Content-Type: application/pdf');
                                                            header('Content-Disposition: attachment; filename=download.pdf');
                                                            $pdf->output();
                                                            ob_end_flush();
                                                        }
                      }
                      else if($srchQuery == 'reservation'){
                          $sql5= "SELECT * FROM reservation ;";
                              $insertionResult7 = mysqli_query($connectVariable, $sql5);
                              
                              while($row7 = mysqli_fetch_assoc($insertionResult3))
                                                        { 
                                                            $reserveid= $row7["reserve_id"];
                                                            $userid= $row7["user_id"]; 
                                                            $date= $row7["date"];
                                                            $time= $row7["time"];
                                                            $occasion= $row7["occasion"];
                                                            $quantity= $row7["quantity"];
                                                            $phone1= $row7["phone1"];
                                                            $reserved= $row7["reserved"];
                                            
                                                            $pdf = new FPDF();
                                                            $pdf->AddPage();
                                                            $pdf->SetFont("Arial", "I", 13);
                                                            $pdf->Cell(110,10,"Reservation Information", 1,1,'C');
                                            
                                                            $pdf->Cell(50,10,"Reserve ID: ",1,0);
                                                            $pdf->Cell(60,10,$reserveid,1,1);
                                            
                                                            $pdf->Cell(50,10,"User ID: ",1,0);
                                                            $pdf->Cell(60,10,$userid,1,1);
                                            
                                                            $pdf->Cell(50,10,"Date: ",1,0);
                                                            $pdf->Cell(60,10,$date,1,1);
                                            
                                                            $pdf->Cell(50,10,"Time: ",1,0);
                                                            $pdf->Cell(60,10,$time,1,1);
                
                                                            $pdf->Cell(50,10,"Occasion: ",1,0);
                                                            $pdf->Cell(60,10,$occasion,1,1);
                                            
                                                            $pdf->Cell(50,10,"Quantity: ",1,0);
                                                            $pdf->Cell(60,10,$Quantity,1,1);
                                            
                                                            $pdf->Cell(50,10,"Phone: ",1,0);
                                                            $pdf->Cell(60,10,$phone1,1,1);
                                            
                                                            $pdf->Cell(50,10,"Reservation status: ",1,0);
                                                            $pdf->Cell(60,10,$reserved,1,1);
                                            
                                                            header('Content-Type: application/pdf');
                                                            header('Content-Disposition: attachment; filename=download.pdf');
                                                            $pdf->output();
                                                            ob_end_flush();
                                                        }
                                        
                  }
                  else if($srchQuery == 'tablereservation'){
                      $sql6= "SELECT * FROM tablereservation ;";
                          $insertionResult8 = mysqli_query($connectVariable, $sql6);
                
                          while($row = mysqli_fetch_assoc($insertionResult3))
                                                        { 
                                                            $userid= $row["user_id"];
                                                            $date= $row["date"];
                                                            $time= $row["time"];
                                                            $position= $row["position"]; 
                                                            $tabletype=$row["table_type"];
                                                            $parking=$row["car_parking"];
                                                            $quantity= $row["number_of_people"];
                                                            $phone= $row["phone"];
                                                            $paymenttype= $row["payment_type"];
                                                            $accountnumber= $row["account_number"];
                                                            $reserved= $row["reserved"];
                                            
                                                            $pdf = new FPDF();
                                                            $pdf->AddPage();
                                                            $pdf->SetFont("Arial", "I", 13);
                                                            $pdf->Cell(110,10,"Table Reservation Information", 1,1,'C');
                                                        
                                            
                                                            $pdf->Cell(50,10,"User ID: ",1,0);
                                                            $pdf->Cell(60,10,$userid,1,1);
                                            
                                                            $pdf->Cell(50,10,"Date: ",1,0);
                                                            $pdf->Cell(60,10,$date,1,1);
                                            
                                                            $pdf->Cell(50,10,"Time: ",1,0);
                                                            $pdf->Cell(60,10,$time,1,1);
                
                                                            $pdf->Cell(50,10,"Position: ",1,0);
                                                            $pdf->Cell(60,10,$position,1,1);
                                            
                                                            $pdf->Cell(50,10,":Table type ",1,0);
                                                            $pdf->Cell(60,10,$tabletype,1,1);
                
                                                            $pdf->Cell(50,10,"Parking: ",1,0);
                                                            $pdf->Cell(60,10,$parking,1,1);
                                            
                                                            $pdf->Cell(50,10,"Quantity: ",1,0);
                                                            $pdf->Cell(60,10,$quantity,1,1);
                
                                                            $pdf->Cell(50,10,"Phone: ",1,0);
                                                            $pdf->Cell(60,10,$phone,1,1);
                
                                                            $pdf->Cell(50,10,"Payment Type: ",1,0);
                                                            $pdf->Cell(60,10,$phone1,1,1);
                                            
                                                            $pdf->Cell(50,10,"Account number: ",1,0);
                                                            $pdf->Cell(60,10,$address,1,1);
                
                                                            $pdf->Cell(50,10,"Reservation Status: ",1,0);
                                                            $pdf->Cell(60,10,$reserved,1,1);
                                            
                                                            header('Content-Type: application/pdf');
                                                            header('Content-Disposition: attachment; filename=download.pdf');
                                                            $pdf->output();
                                                            ob_end_flush();
                                                        }
                  }
                  }
                  if($srchQuery2 == 'excel'){
                    $srchQuery=$_GET['category'];
                    if(empty($srchQuery)){
                        
                        $srchQuery=$_SESSION['category'];
                    }
                    else{
                        $_SESSION['category']=$srchQuery;
                    }
                    
                    
                    if($srchQuery == 'ordersfood'){
                    $sql= "SELECT * FROM ordersfood ;";
                        $insertionResult2 = mysqli_query($connectVariable, $sql);
                        
                        $output .= '
                           <table border="1" class="table">
                           <tr>
                               <th>Order ID  </th>   
                               <th>user Id</th>  
                               <th>Orders</th>  
                               <th>Allergic to</th>  
                               <th>Date</th> 
                               <th>Time</th> 
                               <th>Quantity </th> 
                               <th>Phone Number </th> 
                               <th>Address </th> 
                       </tr>';
                            while ($row = mysqli_fetch_assoc($insertionResult2)){
                            
                               $output .= ' 
                                <tr>  
                                    <td>'.$row["order_id"].'</td>   
                                    <td>'.$row["user_id"].'</td>  
                                    <td>'.$row["food_ordered"].'</td>
                                    <td>'.$row["allergy"].'</td>
                                    <td>'.$row["date"].'</td>   
                                    <td>'.$row["time"].'</td>                                 
                                    <td>'.$row["quantity"].'</td>
                                    <td>'.$row["phone1"].'</td>
                                    <td>'.$row["address"].'</td>
                                </tr>  
                                    '; 
                                    } $output .= '</table>';
                                    header('Content-Type: application/xls');
                                    header('Content-Disposition: attachment; filename=download.xls');
                                    echo $output;
                                    
                
               
                                    
            }
               else if($srchQuery == 'delivery'){
                   $sql1= "SELECT * FROM delivery ;";
                       $insertionResult3 = mysqli_query($connectVariable, $sql1);
                       
                       $output .= '<table border="1" class="table">
                       <tr>
                           <th>Delivery ID  </th>   
                              <th>user Id</th> 
                              <th>Date</th> 
                              <th>Orders</th>    
                              <th>Other</th> 
                              <th>Quantity </th> 
                              <th>Phone Number </th> 
                              <th>Address </th> 
                       </tr>';
                   
                           while ($row3 = mysqli_fetch_assoc($insertionResult3)){
                           
                             $output .=  '  
                               <tr>  
                                   <td>'.$row3["delivery_id"].'</td>   
                                   <td>'.$row3["user_id"].'</td>  
                                   <td>'.$row3["date"].'</td>   
                                   <td>'.$row3["orders"].'</td>  
                                   <td>'.$row3["other"].'</td>                               
                                   <td>'.$row3["quantity"].'</td>
                                   <td>'.$row3["phone1"].'</td>
                                   <td>'.$row3["address"].'</td>
                               </tr>  
                                   '; 
                                   }
                                   $output .= '</table>';
                                   header('Content-Type: application/xls');
                                   header('Content-Disposition: attachment; filename=download.xls');
                                   echo $output;
           }
           else if($srchQuery == 'feedback'){
               $sql2= "SELECT * FROM feedback ;";
                   $insertionResult4 = mysqli_query($connectVariable, $sql2);
                   
                   $output .= '<table border="1" class="table">
                       <tr>
                           <th>Feedback number  </th>   
                           <th>Subject</th> 
                           <th>Date</th> 
                           <th>Comment</th> 
                       </tr>';
               
                       while ($row4 = mysqli_fetch_assoc($insertionResult4)){
                       
                          $output .=  '  
                           <tr>  
                                       <td>'.$row4["feedback_no"].'</td>   
                                       <td>'.$row4["subject"].'</td>  
                                       <td>'.$row4["date"].'</td>   
                                       <td>'.$row4["comment"].'</td>  
                                   </tr>  
                               '; 
                               }
                               $output .= '</table>';
                               header('Content-Type: application/xls');
                               header('Content-Disposition: attachment; filename=download.xls');
                               echo $output;
       }
   else if($srchQuery == 'ingredient'){
       $sql3= "SELECT * FROM ingredient ;";
           $insertionResult5 = mysqli_query($connectVariable, $sql3);
           
           $output .= '<table border="1" class="table">
           <tr>
               <th>Ingredients ID  </th>   
               <th>Ingredient name </th> 
           </tr>';
               while ($row5 = mysqli_fetch_assoc($insertionResult5)){
               
                 $output .=  '  
                   <tr>  
                               <td>'.$row5["ingredients_id"].'</td>   
                               <td>'.$row5["name"].'</td>
                           </tr>  
                       '; 
                       }
                       $output .= '</table>';
                       header('Content-Type: application/xls');
                       header('Content-Disposition: attachment; filename=download.xls');
                       echo $output;
}
else if($srchQuery == 'registration'){
   $sql4= "SELECT * FROM registration ;";
       $insertionResult6 = mysqli_query($connectVariable, $sql4);
       
       $output .= '<table border="1" class="table">
       <tr>
           <th>User ID  </th>   
           <th>User name</th> 
           <th>Email</th> 
           <th>Verification link</th> 
       </tr>';
           while ($row6 = mysqli_fetch_assoc($insertionResult6)){
           
              $output .=  '  
               <tr>  
                           <td>'.$row6["user_id"].'</td>   
                           <td>'.$row6["user_name"].'</td>  
                           <td>'.$row6["user_email"].'</td>   
                           <td>'.$row6["email_verification_link"].'</td>  
                       </tr>  
                   '; 
                   }
                   $output .= '</table>';
                   header('Content-Type: application/xls');
                   header('Content-Disposition: attachment; filename=download.xls');
                   echo $output;
}
else if($srchQuery == 'reservation'){
$sql5= "SELECT * FROM reservation ;";
   $insertionResult7 = mysqli_query($connectVariable, $sql5);
   
   $output .= '<table border="1" class="table">
           <tr>
               <th>Reservation ID  </th>   
               <th>user Id</th> 
               <th>Date</th> 
               <th>Time</th>    
               <th>Occasion</th> 
               <th>Quantity </th> 
               <th>Phone Number </th> 
               <th>Reservation status </th> 
           </tr>';

       while ($row7 = mysqli_fetch_assoc($insertionResult7)){
       
        $output .=  '  
           <tr>  
                       <td>'.$row7["reserve_id"].'</td>   
                       <td>'.$row7["user_id"].'</td>  
                       <td>'.$row7["date"].'</td>   
                       <td>'.$row7["time"].'</td>  
                       <td>'.$row7["occasion"].'</td>                               
                       <td>'.$row7["quantity"].'</td>
                       <td>'.$row7["phone1"].'</td>
                       <td>'.$row7["reserved"].'</td>
                   </tr>  
               '; 
               }
                $output .= '</table>';
header('Content-Type: application/xls');
header('Content-Disposition: attachment; filename=download.xls');
echo $output;
}
else if($srchQuery == 'tablereservation'){
$sql6= "SELECT * FROM tablereservation ;";
$insertionResult8 = mysqli_query($connectVariable, $sql6);
$output .= '<table border="1" class="table">
                       <tr>
                           <th>Table ID  </th>   
                              <th>user Id</th> 
                              <th>Date</th> 
                              <th>Time</th>    
                              <th>Position</th> 
                              <th>Table type</th> 
                              <th>Parking </th> 
                              <th>No of people </th> 
                              <th>Phone Number </th> 
                              <th>Payment type </th> 
                              <th>Account no </th>
                              <th>Reservation status </th>
                       </tr>';

   while ($row8 = mysqli_fetch_assoc($insertionResult8)){
   
     $output .=  '  
       <tr>  
                   <td>'.$row8["table_id"].'</td>   
                   <td>'.$row8["user_id"].'</td>  
                   <td>'.$row8["date"].'</td>   
                   <td>'.$row8["time"].'</td>  
                   <td>'.$row8["position"].'</td>                               
                   <td>'.$row8["table_type"].'</td>
                   <td>'.$row8["car_parking"].'</td>
                   <td>'.$row8["number_of_people"].'</td>
                   <td>'.$row8["phone"].'</td>
                   <td>'.$row8["payment_type"].'</td>
                   <td>'.$row8["account_number"].'</td>
                   <td>'.$row8["reserved"].'</td>


               </tr>  
           '; 
           }
           $output .= '</table>';
           header('Content-Type: application/xls');
           header('Content-Disposition: attachment; filename=download.xls');
           echo $output;
}
                  }
                
                }
                    ?>
                          
                      
                 </div>  
           </body>  
       </html>
    ?>
