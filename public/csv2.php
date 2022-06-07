<?php
$connect = mysqli_connect("localhost", "root", "", "mysteriadb");
$output = '';
if(isset($_POST["import"]))
{
     $tmp = explode(".",$_FILES["excel"]["name"]);
 $extension = end($tmp); // For getting Extension of selected file
 $allowed_extension = array("xls", "xlsx", "csv"); //allowed extension
 if(in_array($extension, $allowed_extension)) //check selected file extension is present in allowed extension array
 {
  $file = $_FILES["excel"]["tmp_name"]; // getting temporary source of excel file
  include("../PHPExcel/Classes/PHPExcel/IOFactory.php"); // Add PHPExcel Library in this code
  $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file

  $output .= "<label class='text-success'>Data Inserted</label><br /><table class='table table-bordered'>";
  foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
  {
   $highestRow = $worksheet->getHighestRow();
   for($row=1; $row<=$highestRow; $row++)
   {
    $output .= "<tr>";
    $food_name = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
    $food_category = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
    $imagePath = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
    $ingredient = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
    $quantity = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
    $price = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(6, $row)->getValue());

    $query = "INSERT INTO foodmenu(food_name, food_category, imagePath, ingredient, price) 
    VALUES ('".$food_name."', '".$food_category."', '".$imagePath."', '".$ingredient."', '".$price."')";
    mysqli_query($connect, $query);
    $output .= '<td>'.$food_name.'</td>';
    $output .= '<td>'.$food_category.'</td>';
    $output .= '<td>'.$imagePath.'</td>';
    $output .= '<td>'.$ingredient.'</td>';
    $output .= '<td>'.$price.'</td>';
    $output .= '</tr>';
   }
  } 
  $output .= '</table>';

 }
 else
 {
  $output = '<label class="text-danger">Invalid File</label>'; //if non excel file then
  echo $output;
 }
}
?> 
<html>
 <head>
  <title>Import Files</title>
  <style>
  body
  {
   margin:0;
   padding:0;
   background-color:#f1f1f1;
  }
  .box
  {
   width:700px;
   border:1px solid #ccc;
   background-color:#fff;
   border-radius:5px;
   margin-top:100px;
  }
  
  </style>
 </head>
 <body>
  <div class="container box">
   <h3 align="center">Import your file</h3><br />
   <form method="post" enctype="multipart/form-data">
    <label>Select File</label>
    <input type="file" name="excel" />
    <br />
    <input type="submit" name="import" class="btn btn-info" value="Import" />
   </form>
   <br />
   <br />
   <?php
   echo $output;
   ?>
  </div>
 </body>
</html>