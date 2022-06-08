<?php
if (isset($_POST["submit"])){
    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $dbname = "mysteriadb";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $ItemName = $_POST["FoodName"];
    $CategoryName = $_POST["FoodCategory"];
    $Ingredients = $_POST["Ingredients"];
    $Ingred=explode(",",$Ingredients);
    $Price= $_POST["Price"];
    $Date_added=date("Y-m-d");
    $uploadOk = 1;
    $targetPath="../resources/images/";
    // $targetPath2="../../resources/images/";
    // $imgTempName=$_FILES["ItemImage"]["name"];
    $imgPath= $targetPath. basename($_FILES["ItemImage"]["name"]);
    $imgPath2= "../".$targetPath. basename($_FILES["ItemImage"]["name"]);
    $imageFileType = strtolower(pathinfo($imgPath,PATHINFO_EXTENSION));
   
   
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }


    $check = getimagesize($_FILES["ItemImage"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }

    if (file_exists($imgPath)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
      }

    if ($_FILES["ItemImage"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
      }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
            }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {


             $sql = "INSERT INTO foodmenu (food_name , food_category, ingredient, price, imagePath, date_added)
             VALUES ('$ItemName','$CategoryName','$Ingredients', '$Price','$imgPath2','$Date_added')";
             $result = mysqli_query($conn, $sql);


             $sql2="SELECT food_id FROM foodmenu WHERE food_name='$ItemName'  and  food_category='$CategoryName' and  ingredient='$Ingredients' and  price='$Price' and  imagePath='$imgPath2' and  date_added='$Date_added'";
             $result2=mysqli_query($conn, $sql);
             $fdID=mysqli_fetch_row($result2);
                
             foreach($Ingred as $i){
                if(strpos($i,"'")!==false){
                    $i= substr_replace($i, "'",strpos($i,"'") , 0);
                }
                    $sql = "INSERT INTO ingredient (food_id ,ingredient_name)
                    VALUES ('$fdID[0]','$i')";
                    $result = mysqli_query($conn, $sql);
                }

                if ($conn->query($sql) === TRUE && move_uploaded_file($_FILES["ItemImage"]["tmp_name"],$imgPath)) {
                    echo '<script type ="application/JavaScript"> alert ("The file  has been uploaded."); window.location.href="AdminPage.php"; </script>'; 
                   
                }
                else {
                    echo "Sorry, there was an error uploading your file.";

                    
                }
                $conn->close();
        }




    }
/*if (isset($_POST["submit"])){
    $ItemName = $_POST["ItemName"];
    $CategoryName = $_POST["Category"];
    $Ingredients = $_POST["Ingredients"];
    $Price= $_POST["Price"];
    $Itemimage = $_POST["ItemImage"];

    $connectVariable = mysqli_connect('localhost', 'root', '', 'mysteriadb');
    if (!$connectVariable)
        die("The database is not connected");

    $queryInsertion = "INSERT INTO menu(ItemName , CategoryName, Ingredients, Price(inBirr), Itemimage)";
    $queryInsertion .= "VALUES('$ItemName','$CategoryName','$Ingredients', '$Price', '$Itemimage')";

    $insertionResult = mysqli_query($connectVariable, $queryInsertion);
    if ($insertionResult){
        echo "successfull!";
        header ("Location: SignUp.php#Signin");
        $stmt -> store_result();
        exit();
    }
    else{
        die("Not Connected");
    }
}*/
?>