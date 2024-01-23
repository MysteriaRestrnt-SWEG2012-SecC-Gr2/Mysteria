 <?php 
include '../shared/CheckAdminLogin.php';
    require_once '../db/connectVar.php';
 ?>
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title> report</title>  
           <link rel="stylesheet" type="text/css" href="../css/reportStyle.css"> 
      </head>  
      <body>
          
           <div class="container">  
                <div class="wrapper">
                    <h1>Report</h1>
                </div>
                <div class="data">
                    <form action="report.php" method="GET">
                        <select name="select">
                            <option value="select">*</option>                            
                        </select>
                        <select>
                            <option>from</option>
                        </select>
                        <select id="category" name="category">
                            <option  value="delivery">delivery</option>
                            <option  value="feedback">feedback</option>
                            <option  value="ingredient">ingredient</option>
                            <option  value="ordersfood">ordersfood</option>
                            <option  value="registration">registration</option>
                            <option  value="reservation">reservation</option>
                            <option  value="tablereservation">table reservation</option>
                        </select><br>
                        <input type="submit" name="submit" value="Submit" class="btn">

                    </form> btn2
                    <?php
                        if(isset($_GET['submit']))
                        {
                            $output ='';
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
                                     
                                        echo'
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
                                                 }
                                                 echo $output;
                                                 
                             
                            
                                                 
                         }
                            else if($srchQuery == 'delivery'){
                                $sql1= "SELECT * FROM delivery ;";
                                    $insertionResult3 = mysqli_query($connectVariable, $sql1);
                                    
                                    echo'<table border="1" class="table">
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
                                        
                                            echo '  
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
                        }
                        else if($srchQuery == 'feedback'){
                            $sql2= "SELECT * FROM feedback ;";
                                $insertionResult4 = mysqli_query($connectVariable, $sql2);
                                
                                echo'<table border="1" class="table">
                                    <tr>
                                        <th>Feedback number  </th>   
                                        <th>Subject</th> 
                                        <th>Date</th> 
                                        <th>Comment</th> 
                                    </tr>';
                            
                                    while ($row4 = mysqli_fetch_assoc($insertionResult4)){
                                    
                                        echo '  
                                        <tr>  
                                                    <td>'.$row4["feedback_no"].'</td>   
                                                    <td>'.$row4["subject"].'</td>  
                                                    <td>'.$row4["date"].'</td>   
                                                    <td>'.$row4["comment"].'</td>  
                                                </tr>  
                                            '; 
                                            }
                    }
                else if($srchQuery == 'ingredient'){
                    $sql3= "SELECT * FROM ingredient ;";
                        $insertionResult5 = mysqli_query($connectVariable, $sql3);
                        
                        echo'<table border="1" class="table">
                        <tr>
                            <th>Ingredients ID  </th>   
                            <th>Ingredient name </th> 
                        </tr>';
                            while ($row5 = mysqli_fetch_assoc($insertionResult5)){
                            
                                echo '  
                                <tr>  
                                            <td>'.$row5["ingredients_id"].'</td>   
                                            <td>'.$row5["name"].'</td>
                                        </tr>  
                                    '; 
                                    }
            }
            else if($srchQuery == 'registration'){
                $sql4= "SELECT * FROM registration ;";
                    $insertionResult6 = mysqli_query($connectVariable, $sql4);
                    
                    echo'<table border="1" class="table">
                    <tr>
                        <th>User ID  </th>   
                        <th>User name</th> 
                        <th>Email</th> 
                        <th>Verification link</th> 
                    </tr>';
                        while ($row6 = mysqli_fetch_assoc($insertionResult6)){
                        
                            echo '  
                            <tr>  
                                        <td>'.$row6["user_id"].'</td>   
                                        <td>'.$row6["user_name"].'</td>  
                                        <td>'.$row6["user_email"].'</td>   
                                        <td>'.$row6["email_verification_link"].'</td>  
                                    </tr>  
                                '; 
                                }
        }
        else if($srchQuery == 'reservation'){
            $sql5= "SELECT * FROM reservation ;";
                $insertionResult7 = mysqli_query($connectVariable, $sql5);
                
                echo'<table border="1" class="table">
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
                    
                        echo '  
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
    }
    else if($srchQuery == 'tablereservation'){
        $sql6= "SELECT * FROM tablereservation ;";
            $insertionResult8 = mysqli_query($connectVariable, $sql6);
            echo'<table border="1" class="table">
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
                
                    echo '  
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
    }
    }
    ?>
   <table class="tab3">
    <form action="csv2.php" method="GET">
          <tr>
             <th> <input type="submit" name="submit2" value="Export" class="btn3"></th></tr>
                    
    </form>
   
    </table>
                
           </div>  
     </body>  
 </html>