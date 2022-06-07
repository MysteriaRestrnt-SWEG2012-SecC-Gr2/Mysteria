<?php  
 $connect = mysqli_connect("localhost", "root", "", "mysteriadb");  
 $query ="SELECT * FROM ordersfood ORDER BY order_id asc";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>CSV report</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
           <link rel="stylesheet" type="text/css" href="../css/AdminStyle.css"> 
      </head>  
      <body style="background: linear-gradient(-45deg, #f0b342, #520852);" >  
           <br /><br />  
           <div class="container" style="width:900px; color:white">  
                <h2 align="center">File Report</h2>  
                <h3 align="center">Order Data</h3>                 
                <br/>  
                <br/>  
                <div class="table-responsive" id="employee_table">  
                     <table style="border:solid; color:white"; class="table table-bordered">  
                          <tr>  
                               <th width="50%">Order ID  </th>   
                               <th width="90%">user Id</th>  
                               <th>Orders</th>  
                               <th>Allergic to</th>  
                               <th>Date</th> 
                               <th>Time</th> 
                               <th>Quantity </th> 
                               <th>Phone Number </th> 
                               <th>Address </th> 
                               
                          </tr>  
                     <?php  
                     while($row = mysqli_fetch_array($result)) 
                     {  
                          echo '  
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
                     ?>  
                     </table> 
                     <table>
                     <tr> 
                            <th width="70%"><form method="post" action="export3.php" align="center">
                                <input type="submit" name="export" class="btn btn-success" value="Export to pdf" />
                            </form></th> 
                        </tr>
                        <tr> 
                            <th width="70%"><form method="post" action="export2.php" align="center">
                                <input type="submit" name="export" class="btn btn-success" value="Export to excel" />
                            </form></th> 
                        </tr>
                     </table>  
                </div>  
           </div>  
     </body>  
 </html>  
