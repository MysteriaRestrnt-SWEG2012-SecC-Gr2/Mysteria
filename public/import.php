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

  $output .= "<label class='text'>Data Inserted</label><br /><table class='table'>";
  foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
  {
   $highestRow = $worksheet->getHighestRow();
   for($row=1; $row<=$highestRow; $row++)
   {
    $output .= "<tr>";
    $food_name = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
    $food_category = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
    $imagePath = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
    $ingredient = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
    $price = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
    $date = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(6, $row)->getValue());

    $query = "INSERT INTO foodmenu(food_name, food_category, imagePath, ingredient, price, date_added) 
    VALUES ('".$food_name."', '".$food_category."', '".$imagePath."', '".$ingredient."', '".$price."', '".$date."')";
    mysqli_query($connect, $query);
    $output .= '<td>'.$food_name.'</td>';
    $output .= '<td>'.$food_category.'</td>';
    $output .= '<td>'.$imagePath.'</td>';
    $output .= '<td>'.$ingredient.'</td>';
    $output .= '<td>'.$price.'</td>';
    $output .= '<td>'.$date.'</td>';
    $output .= '</tr>';
   }
  } 
  $output .= '</table>';

 }
 else
 {
  $output = '<label class="text-danger">Invalid File</label>'; //if not allowed file extension then
  echo $output;
 }
}
?> 
<html>
  <head>
    <title>Import Files</title>
    <link rel="stylesheet" type="text/css" href="../css/AdminStyle.css">
    <link rel="stylesheet" type="text/css" href="../css/reportstyle.css"> 
  </head>
  <body>
  <header class="header">
        <div class="headerNav" style="margin-left: 5%;">
            <a href="../admin/AdminPage.php" >Home</a>
            <a href="../public/home/home.php">Mysteria site</a>
            <a href="../public/import.php">Import</a>
            <a href="../admin/adminAddForm.php">Add admin</a>
            <a href="../admin/chart.php">Report</a>
            <a href="../admin/FoodAddForm.php">Add Menu</a>
            <a href="../shared/logout.php">Log Out </a>
            <form id="srchform" role="search">
                <input type="search" id="query" name="q" placeholder="Search" aria-label="search through site content">
                <button id="srchbtn" type="submit"><img id="srchimg" src="../resources/images/searchwhite.png"></button>
            </form>
        </div>
        <div>
            <label>
            </label>
        </div>
    </header> 
    <div class="container">
      <div class="wrapper2">
      <h1 style="padding: 0px 230px  ">Import your file</h1>
        <div class="data">
          <form method="post" enctype="multipart/form-data">
          <div id="repoForm">
            <label style="padding:80px  ">Select File</label>
            <input type="file" name="excel" />
          
            <input type="submit" name="import" class="btns" value="Import" />
</div>
          </form>
          <br />
          <br />
          <div class="output">
      <?php
          echo $output;
          ?>
      </div>
        </div>
       
      </div>
      
         
    </div>
  </body>
  <footer class="footer">
    <div id="btm" class="feedback col-3">
        <address>
                call: +251110000101<br> +251967882862
            </address>
        <p style="font-size:16px; text-align:center; ">Copyright &copy; Mysteria 2021/22, all rights reserved </p>
    </div>
</footer>
</html>