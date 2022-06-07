<?php 
include '../shared/CheckAdminLogin.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="charset" content="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <meta name="author" content="">
    <meta name="description" content="webpage for mysteria restaurant's Admin Page">
    <meta name="keywords" content="admin,mysteria">
    <title>Admin page</title>
    <script src="../Js/side nav.js"></script>
    <script src="../Js/validator.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/AdminStyle.css">
    <link rel="stylesheet" type="text/css" href="../css/reportstyle.css"> 

</head>

<body>
    <header class="header">
        <div class="headerNav" style="margin-left: 5%;">
            <a href="#" >Home</a>
            <a href="../public/home/home.php">Mysteria site</a>
            <a href="../public/csv.php">Export</a>
            <a href="adminAddForm.php">Add admin</a>
            <a href="FoodAddForm.php">Add Menu</a>
            <a href="../shared/logout.php">Log Out </a>
            <form id="srchform" role="search">
                <input type="search" id="query" name="q" placeholder="Search" aria-label="search through site content">
                <button id="srchbtn" type="submit"><img id="srchimg" src="../resources/images/searchwhite.png"></button>
            </form>
        </div>
        <div>
            <label><?php
            $var=$_SESSION['user'];
            echo $var;
            ?>
            </label>
        </div>
    </header>
    <div class="container">  
        <div class="wrapper">
            <h1>Report</h1>
        </div>
        <div class="data">
            <form action="AdminPage.php" method="GET">
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
                <input type="submit" name="submit" value="Submit" class="btns">

            </form> 
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
                    $sql= "SELECT * FROM ordersfood INNER JOIN orders WHERE ordersfood.order_id=orders.order_id;";
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
                        $sql1= "SELECT * FROM delivery INNER JOIN ordered_delivery WHERE delivery.delivery_id = ordered_delivery.delivery_id;";
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
                    $sql2= "SELECT * FROM feedback INNER JOIN registration where feedback.user_id = registration.user_id;";
                        $insertionResult4 = mysqli_query($connectVariable, $sql2);
                        
                        echo'<table border="1" class="table">
                            <tr>
                                <th>Feedback number  </th>   
                                <th>Subject</th> 
                                <th>Date</th> 
                                <th>Feedback</th> 
                            </tr>';

                            while ($row4 = mysqli_fetch_assoc($insertionResult4)){
                            
                                echo '  
                                <tr>  
                                            <td>'.$row4["feedback_no"].'</td>   
                                            <td>'.$row4["subject"].'</td>  
                                            <td>'.$row4["date"].'</td>   
                                            <td width="250px">'.$row4["feedback"].'</td>  
                                        </tr>  
                                    '; 
                                    }
                    }
                    else if($srchQuery == 'ingredient'){
                    $sql3= "SELECT * FROM ingredient ;";
                        $insertionResult5 = mysqli_query($connectVariable, $sql3);
                        
                        echo'<table border="1" class="table">
                        <tr>
                            <th>FOOD ID  </th>   
                            <th>Ingredient name </th> 
                        </tr>';
                            while ($row5 = mysqli_fetch_assoc($insertionResult5)){
                            
                                echo '  
                                <tr>  
                                            <td>'.$row5["food_id"].'</td>   
                                            <td>'.$row5["ingredient_name"].'</td>
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
                                    <th>Number of people</th> 
                                    <th>Quantity </th> 
                                    <th>Phone Number </th> 
                                    <th>Reservation status </th>
                                    <th>Room number</th>  
                                </tr>';

                            while ($row7 = mysqli_fetch_assoc($insertionResult7)){
                            
                                echo '  
                                <tr>  
                                            <td>'.$row7["reserve_id"].'</td>   
                                            <td>'.$row7["user_id"].'</td>  
                                            <td>'.$row7["date"].'</td>   
                                            <td>'.$row7["time"].'</td>  
                                            <td>'.$row7["occasion"].'</td>
                                            <td>'.$row7["number_of_people"].'</td>                                   
                                            <td>'.$row7["quantity"].'</td>
                                            <td>'.$row7["phone1"].'</td>
                                            <td>'.$row7["reserved"].'</td>
                                            <td>'.$row7["room"].'</td>
                                          		
                                        </tr>  
                                    '; 
                                    }
                    }
                    else if($srchQuery == 'tablereservation'){
                    $sql6= "SELECT * FROM tablereservation INNER JOIN table_info WHERE tablereservation.table_number=table_info.table_number;";
                        $insertionResult8 = mysqli_query($connectVariable, $sql6);
                        echo'<table border="1" class="table">
                                                <tr>
                                                    <th>Reservation ID  </th>  
                                                    <th>Table number  </th>   
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
                                            <td>'.$row8["reservation_id"].'</td>
                                            <td>'.$row8["table_number"].'</td>   
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
   </div>
</body>
<br>
<footer class="footer">
    <div id="btm" class="feedback col-3">
        <address>
                call: +251110000101<br> +251967882862
            </address>
        <p style="font-size:16px; text-align:center; ">Copyright &copy; Mysteria 2021/22, all rights reserved </p>
    </div>
</footer>

</html>
