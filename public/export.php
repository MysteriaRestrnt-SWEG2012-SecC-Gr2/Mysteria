<?php  
      //export.php  
 if(isset($_POST["export"]))  
 {  
      $connect = mysqli_connect("localhost", "root", "", "mysteriadb");  
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=download.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('order_id','user_id','food_ordered',  
      'allergy', 'date','time','quantity','phone','phone1','address'));  
      $query = "SELECT * from ordersfood ORDER BY order_id DESC";  
      $result = mysqli_query($connect, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 ?>   