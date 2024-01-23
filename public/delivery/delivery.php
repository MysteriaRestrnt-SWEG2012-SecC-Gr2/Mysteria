<?php 
include '../../shared/CheckLogin.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="charset" content="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <meta name="author" content="paulos">
    <meta name="description" content="webpage for mysteria restaurant's delivery">
    <meta name="keywords" content="delivery,mysteria">
    <link rel="stylesheet" href="../../css/popup.css">
    <link rel="stylesheet" href="../../css/style-1.css">
    <title>Delivery page</title>
    <script src="../../js/side nav.js"></script>
    <script src="../../js/validator.js"></script>
</head>

<body>
<?php include '../../shared/header2.php';?>
   
    <section>
  
        <div class="row" id="sectionTop">
            <div class="topTxt">
                <h1><span class="restaurant">Mysteria restaurant</span> delivery</h1>
                <p>...order our satisfactory delivery and enjoy exquisite meals from the comfort of your home</p>
            </div>
        </div>
        <div class="row">
            <div class="form col-6">

                <h2>Delivery form</h2>
                <?php
                if(isset($_POST["orderDelivSelected"])){
                    
                    if (!empty($_POST['foodChecked'])) {
                            $cartFoodArray=array();
                            $cartQuantArray=array();
                        foreach ($_POST['foodChecked'] as $foods) {
                            $foodID=$foods;
                            $foodQuan=$_POST[$foodID];
                            
                            array_push($cartFoodArray,$foodID);
                            array_push($cartQuantArray,$foodQuan);
                        }
                        $_SESSION['foodsInCartD']=$cartFoodArray;
                        $_SESSION['quantityInCartD']=$cartQuantArray;
                    }
                    else{
                        echo '<script type ="application/JavaScript"> alert ( "please check a value/s before ordering from cart!"); 
                        window.location.assign("http://localhost/Mysteriamain/shared/cart.php"); </script>';
                    }
                                
                }
                else if(isset($_POST["orderDelivAlone"])){
                    $foodID=$_POST["orderDelivAlone"];
                    $foodQuan=$_POST[$foodID]; 

                    $cartFoodArray=array();
                    $cartQuantArray=array();

                    array_push($cartFoodArray,$foodID);
                    array_push($cartQuantArray,$foodQuan);

                    $_SESSION['foodsInCartD']=$cartFoodArray;
                    $_SESSION['quantityInCartD']=$cartQuantArray;
                   

                }
 
        ?>
                <form class="delivForm" method="post" action="deliv.php" onsubmit="return deliValidateForm()">
                <big><label for="CustName">Customer:             <?php $var=$_SESSION['user']; echo"$var"?></label></big><br><br>
                    <label for="date">Date:</label><br>
                    <input type="date" name="date" id="date"  min="<?php $d=$date=date_create(date('Y-m-d')); date_sub($d,date_interval_create_from_date_string("0 days")); echo date_format($d,"Y-m-d"); ?>"><br>

                    <label for="other">allergic ingredients: </label><br>
                    <input type="text" name="other" id="other" placeholder="Your allergies"><br>

                    <label for="order">Your order</label><br>
                    <textarea id="order" name="order" rows="3" cols="30"
                        placeholder="Place Your Order Here"><?php
                     if(isset($_POST["orderDelivSelected"])){
                    
                           foreach($_SESSION['foodsInCartD'] as $key=>$fID){
                            $sql ="SELECT food_name FROM foodmenu WHERE food_id='$fID'";
                            $result=mysqli_query($connectVariable,$sql);
                            $res=mysqli_fetch_row($result);
                            echo $res[0]." \n ";
                           }
                               
                    }
                    else if(isset($_POST["orderDelivAlone"])){
                        $sql ="SELECT food_name FROM foodmenu WHERE food_id='$foodID'";
                            $result=mysqli_query($connectVariable,$sql);
                            $res=mysqli_fetch_row($result);
                            echo $res[0];
                    } 
                        ?></textarea><br>

                    <label for="phone">Phone Number:</label><br>
                    <select name="phone" id="phone">
                        <option value="+251">+251</option>
                        <option value="+12" >+120</option>
                    </select>
                    <input type="tel" id="phone1" name="phone1" placeholder="967882862"><br>

                    <label for="address">Address:</label><br>
                    <textarea name="address" placeholder="enter your address" id="address" cols="20" rows="5"
                        ></textarea><br>

                    <input type="submit" name='submit' value="Submit Delivery Information" >
                    <hr>
                </form>
            </div>
            <div class="col-3 goto1">
                <div class="goto"><a href="#btm">&#10225; &nbsp; Bottom</a></div>
            </div>
        </div>
        <section>
            <div class="popup" id="popup4">
                <div class="feedback-body">
                    <div class="feedback-container">
                        <div class="feedback-header">
                            <h2 class="feedback-h2">
                                Feedback Form
                            </h2>
                        </div>
                        <form class="feedback-form" id="form">
                            <div class="feedback-form-control">
                                <lable class="feedback-lable">
                                    <span class="feedback-span">User Name</span>
                                </lable>
                                <input type="text" class="feedback-input feedback-username" placeholder="Username"
                                    id="username">
                            </div>
                            <div class="form-control">
                                <lable class="feedback-lable">
                                    <span class="feedback-span">Email</span>
                                </lable><br>
                                <input type="email" class="feedback-input feedback-email"
                                    style="border-color: black; padding: 20px; width: 100%;" placeholder="email address"
                                    id="email">
                                <br><br>
                                <div class="feedback-form-control">
                                    <lable class="feedback-lable">
                                        <span class="feedback-span">Feedback</span>
                                    </lable><br>
                                    <textarea class="feedback-input feedback-textarea" placeholder="Your Feedback Please"
                                        id="feedback"></textarea>
                                </div>
                                <button class="feedback-button" id="submit" onclick="validate()">
                                    Submit
                                </button>
                                <div class="popup_page-close">
                                    <a href="#Feedback" class="popup_page-close"><img
                                            src="../../resources/images/close_button.png" alt=""
                                            class="popup_page-close-button"></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </section>
    <section class="popup" id="popup3">
        <div class="popup_page">
            <div class="popup_page-close">
                <a href="../home/home.php" class="popup_page-close">&times;</a>
            </div>
            <div class="popup_page-content">
                <p>You have ordered delivery for your food successfully, your order will be delivered shortly.<br>THANK YOU FOR
                    CHOOSING US.<br>
                    Email Us at <a href="www.restaurantmysteria@gmail.com">restaurantmysteria@gmail.com</a> For more
                    information.<br>
                </p>
                <button onclick="window.location.href='../menu_bar/FoodMenu.php';">Order again</button>
            </div>
        </div>
    </section>
    <!--<a href="#popup3">Feedback</a>-->
<?php include '../../shared/footer.php';?>
</body>
<?php require_once "../../db/conndelivery.php";?>
</html>
