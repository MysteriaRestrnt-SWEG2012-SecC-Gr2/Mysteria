<?php 
include 'CheckLogin.php';
$DBpath=$_SERVER['DOCUMENT_ROOT'];
$DBpath.="/Mysteriamain/db/connectVar.php";
require_once($DBpath);
$user=$_SESSION['userID'];




if(isset($_POST["cardAlone"])){
    $foodID=$_POST["cardAlone"];
    $foodQuan=$_POST[$foodID]; 
  

    $sql="SELECT * FROM cart WHERE user_id='$user' and food_id='$foodID'";
    $result=mysqli_query($connectVariable,$sql);
    // $rowCart=mysqli_fetch_assoc($result);
    // $cartQuantity=$rowCart['quantity'];

    $sql="SELECT quantity FROM foodMenu WHERE food_id='$foodID'";
    $result2=mysqli_query($connectVariable,$sql);
    $rowMenu=mysqli_fetch_row($result2);
    $menuQuantity=$rowMenu[0];

    if($result->num_rows==1){
        if($menuQuantity>0 && $menuQuantity>=$foodQuan){
            $sql="UPDATE cart SET quantity=quantity+'$foodQuan' WHERE user_id='$user' and food_id='$foodID'";
            $result=mysqli_query($connectVariable,$sql);
            $sql="UPDATE foodMenu SET quantity=quantity-'$foodQuan'  WHERE food_id='$foodID'";
            $result=mysqli_query($connectVariable,$sql);
         
            echo '<script type ="application/JavaScript"> alert ( "your selection has been added to your cart!"); window.location.assign("http://localhost/Mysteriamain/public/menu_bar/FoodMenu.php"); </script>'; 
           
        }
        else{
            echo '<script type ="application/JavaScript"> alert ( "Sorry! we do not have that many food items in our inventory!\n please decrease the quantity of the food items and order again"); history.back(); </script>';
        }
       
    }
    else if($result->num_rows==0){
        if($menuQuantity>0 && $menuQuantity>=$foodQuan){
            $sql="INSERT INTO cart(user_id,food_id,quantity) VALUES ('$user','$foodID','$foodQuan')";
            $result=mysqli_query($connectVariable, $sql);
            $sql="UPDATE foodMenu SET quantity=quantity-'$foodQuan'  WHERE food_id='$foodID'";
            $result=mysqli_query($connectVariable, $sql);
          
            echo '<script type ="application/JavaScript"> alert ( "your selection has been added to your cart!"); window.location.assign("http://localhost/Mysteriamain/public/menu_bar/FoodMenu.php"); </script>'; 
        }
        else{
            echo '<script type ="application/JavaScript"> alert ( "Sorry! we do not have that many food items in our inventory!\n please decrease the quantity of the food items and order again"); history.back(); </script>';
        }
    }else{
        die("not connected");
    }


}
else if(isset($_POST["cardSelected"])){

        if(!empty($_POST['foodChecked'])){

        foreach($_POST['foodChecked'] as $foods){

                $foodID=$foods;
                $foodQuan=$_POST[$foodID]; 

                $sql="SELECT * FROM cart WHERE user_id='$user' and food_id='$foodID'";
                $result=mysqli_query($connectVariable,$sql);


                $sql="SELECT quantity FROM foodMenu WHERE food_id='$foodID'";
                $result2=mysqli_query($connectVariable,$sql);
                $rowMenu=mysqli_fetch_row($result2);
                $menuQuantity=$rowMenu[0];

                if($result->num_rows==1){
                    if($menuQuantity>0 && $menuQuantity>=$foodQuan){
                        $sql="UPDATE cart SET quantity=quantity+'$foodQuan' WHERE user_id='$user' and food_id='$foodID'";
                        $result=mysqli_query($connectVariable,$sql);
                        $sql="UPDATE foodMenu SET quantity=quantity-'$foodQuan'  WHERE food_id='$foodID'";
                        $result=mysqli_query($connectVariable,$sql);
                      
                        echo '<script type ="application/JavaScript"> alert ( "your selections have been added to your cart!");  window.location.assign("http://localhost/Mysteriamain/public/menu_bar/FoodMenu.php"); </script>'; 
                    }
                    else{
                        echo '<script type ="application/JavaScript"> alert ( "Sorry! we do not have that many food items in our inventory!\n please decrease the quantity of the food items and order again"); history.back(); </script>';
                    }
                
                }
                else if($result->num_rows==0){
                    if($menuQuantity>0 && $menuQuantity>=$foodQuan){
                        $sql="INSERT INTO cart(user_id,food_id,quantity) VALUES ('$user','$foodID','$foodQuan')";
                        $result=mysqli_query($connectVariable, $sql);
                        $sql="UPDATE foodMenu SET quantity=quantity-'$foodQuan'  WHERE food_id='$foodID'";
                        $result=mysqli_query($connectVariable, $sql);
                      
                        echo '<script type ="application/JavaScript"> alert ( "your selections have been added to your cart!");  window.location.assign("http://localhost/Mysteriamain/public/menu_bar/FoodMenu.php"); </script>'; 
                    }
                    else{
                        echo '<script type ="application/JavaScript"> alert ( "Sorry! we do not have that many food items in our inventory!\n please decrease the quantity of the food items and order again"); history.back(); </script>';
                    }
                }else{
                    die("not connected");
                }

        }
        }
        else{
            echo '<script type ="application/JavaScript"> alert ( "please check a value/s before adding to cart!"); history.back(); </script>';
        }
}

else if(isset($_POST["removeAlone"])){
    $foodID=$_POST["removeAlone"];
    $foodQuan=$_POST[$foodID]; 
  

    $sql="SELECT * FROM cart WHERE user_id='$user' and food_id='$foodID'";
    $result=mysqli_query($connectVariable,$sql);
    $row=mysqli_fetch_assoc($result);
    $dbQuan=$row['quantity'];

    if($result->num_rows==1){
        if($dbQuan>$foodQuan){
            $sql="UPDATE cart SET quantity='$dbQuan'-'$foodQuan' WHERE user_id='$user' and food_id='$foodID'";
            $result=mysqli_query($connectVariable,$sql);
            $sql="UPDATE foodMenu SET quantity=quantity+'$foodQuan'  WHERE food_id='$foodID'";
            $result=mysqli_query($connectVariable,$sql);
            
            echo '<script type ="application/JavaScript"> alert ("the item has been removed from your cart");  window.location.assign("http://localhost/Mysteriamain/shared/cart.php"); </script>'; 
        }
        else if($dbQuan<=$foodQuan){
            $sql="DELETE FROM cart WHERE user_id='$user' and food_id='$foodID'";
            $result=mysqli_query($connectVariable,$sql);
            $sql="UPDATE foodMenu SET quantity=quantity+'$dbQuan'  WHERE food_id='$foodID'";
            $result=mysqli_query($connectVariable,$sql);
            
            echo '<script type ="application/JavaScript"> alert ("the item has been removed from your cart");  window.location.assign("http://localhost/Mysteriamain/shared/cart.php"); </script>';
        }
    }
    else{
        die("not connected");
    }

}
else if(isset($_POST["removeSelected"])){
    if(!empty($_POST['foodChecked'])){
        foreach($_POST['foodChecked'] as $foods){

            $foodID=$foods;
            $foodQuan=$_POST[$foodID]; 

            $sql="SELECT * FROM cart WHERE user_id='$user' and food_id='$foodID'";
            $result=mysqli_query($connectVariable,$sql);
            $row=mysqli_fetch_assoc($result);
            $dbQuan=$row['quantity'];

            if($result->num_rows==1){
                if($dbQuan>$foodQuan){
                    $sql="UPDATE cart SET quantity='$dbQuan'-'$foodQuan' WHERE user_id='$user' and food_id='$foodID'";
                    $result=mysqli_query($connectVariable,$sql);
                    $sql="UPDATE foodMenu SET quantity=quantity+'$foodQuan'  WHERE food_id='$foodID'";
                    $result=mysqli_query($connectVariable,$sql);
                    
                    echo '<script type ="application/JavaScript"> alert ("the selected items have been removed from your cart"); window.location.assign("http://localhost/Mysteriamain/shared/cart.php");  </script>'; 
                }
                else if($dbQuan<=$foodQuan){
                    $sql="DELETE FROM cart WHERE user_id='$user' and food_id='$foodID'";
                    $result=mysqli_query($connectVariable,$sql);
                    $sql="UPDATE foodMenu SET quantity=quantity+'$dbQuan'  WHERE food_id='$foodID'";
                    $result=mysqli_query($connectVariable,$sql);
                    
                    echo '<script type ="application/JavaScript"> alert ("the selected items have been removed from your cart"); window.location.assign("http://localhost/Mysteriamain/shared/cart.php");  </script>';
                }
            }
            else{
                die("not connected");
            }
        }
    }
    else{
        echo '<script type ="application/JavaScript"> alert ( "please check a value/s before removing from cart!"); window.location.assign("http://localhost/Mysteriamain/shared/cart.php"); </script>';
    }

}

?>