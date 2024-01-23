<?php 

 function printMenu($food_type,$sort,$filter){
    
    $DBpath=$_SERVER['DOCUMENT_ROOT'];
    $DBpath.="/Mysteriamain/db/connectVar.php";
    include ($DBpath);

    if($food_type=="cart"){
        $userId=$_SESSION['userID'];
        $sql= "SELECT foodmenu.food_id,foodmenu.food_name, foodmenu.ingredient,foodmenu.imagePath, foodmenu.price,cart.quantity FROM foodmenu INNER JOIN cart WHERE cart.user_id='$userId' and cart.food_id= foodmenu.food_id $filter $sort";
        $insertionResult2 = mysqli_query($connectVariable, $sql);
        if(mysqli_num_rows($insertionResult2)>0){
            while ($row1 = mysqli_fetch_assoc($insertionResult2)) {
                $foodID=$row1['food_id'];
                $quan=$row1['quantity'];
                $img= $row1['imagePath'];
                $img=substr($img,3);
                $name= $row1['food_name'];
                $ingred=$row1['ingredient'];
                $price=$row1['price'];
                $foodID=$row1['food_id'];
                $items=<<< EOL
                    <div class= "items">            
                        <img src= "$img"><br>
                            <h4>$name</h4>
                        <div class= "details">
                            <div class= "sub-details">
                                <h5 class= "price">Price: $price ETB</h5>
                            </div>
                            <div class= "middle">
                                <div class= "text">
                                    <p><h5>Main Ingredients</h5>$ingred</p>
                            </div>
                        </div>
                            <label for="foodQuantity"> Quantity: </label><input type="number" name="$foodID" value="$quan" min="1"/><br>
                            <label><input type="checkbox" class="fCheck" name="foodChecked[]" value="$foodID"/>check to order/remove with others</label>
                            <button type="submit" value="$foodID" name="removeAlone">remove item</button>  
                            <button type="submit" value="$foodID" name="orderAlone" formaction="../public/order/order2.php">order item</button> 
                            <button type="submit" value="$foodID" name="orderDelivAlone" formaction="../public/delivery/delivery.php">order delivery</button>                       
                        </div>           
                    </div>
                    
                    EOL;
                    echo $items;
                }                   

        }
        else if(mysqli_num_rows($insertionResult2)==0 && $sort=="" && $filter=="") {
            $emp=<<< eol
            <div id="emp">
                <h3>Your cart is empty</h3>
            </div>
            eol;
            echo $emp;
        }
        else if(mysqli_num_rows($insertionResult2)==0 && ($sort!="" || $filter!="")){
            echo "No such item in your cart";
        }
           }
    else{
        $sql= "SELECT * FROM foodmenu where food_category = '$food_type' $filter $sort";
        $insertionResult2 = mysqli_query($connectVariable, $sql);
       
        while ($row = mysqli_fetch_assoc($insertionResult2)) {
            $img= $row['imagePath'];
            $name= $row['food_name'];
            $ingred=$row['ingredient'];
            $price=$row['price'];
            $foodID=$row['food_id'];
            $quantity=$row['quantity'];
            if($quantity>0){
                $items=<<< EOL
                <div class= "items">            
                    <img src= "$img"><br>
                        <h4>$name</h4>
                    <div class= "details">
                        <div class= "sub-details">
                            <h5 class= "price">Price: $price ETB</h5>
                        </div>
                        <div class= "middle">
                            <div class= "text">
                                <p><h5>Main Ingredients</h5>$ingred</p>
                            </div>
                        </div>
                        <label for= "foodQuantity"> Quantity: </label><input type= "number" name= "$foodID" value=1 min= "1 "/><br>
                        <label><input type= "checkbox" class= "fCheck" name= "foodChecked[]" value= "$foodID"/> check to add with others</label>
                       <button type= "submit" value= "$foodID" name= "cardAlone">&#x1f6d2; add to cart</button>
                    </div>           
                </div>
                EOL;
            }
            else{
             $items=<<< EOL
                <div class= "items">            
                    <img src= "$img"><br>
                        <h4>$name</h4>
                    <div class= "details">
                        <div class= "sub-details">
                            <h5 class= "price">Price: $price ETB</h5>
                        </div>
                        <div class= "middle">
                            <div class= "text">
                                <p><h5>Main Ingredients</h5>$ingred</p>
                            </div>
                        </div>
                      <label> Out Of Stock</label>
                    </div>           
                </div>
                EOL;
            }
          
            echo $items;
        }
    }
 }
?>