<!DOCTYPE html>
<?php 
include '../../shared/CheckLogin.php';
require_once '../../db/connectVar.php';
?>
<html>
<head>
    <meta name="charset" content="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <meta name="author" content="paulos">
    <meta name="description" content="webpage for mysteria restaurant's delivery">
    <meta name="keywords" content="delivery,mysteria">
    <link rel="stylesheet" href="../../css/style-1.css">
    <link rel="stylesheet" href="../../css/popup.css">
    <title>Ordering page</title>
    <script src="../../js/side nav.js"></script>
    <script src="../../js/validator.js"></script>
</head>
<body>
<?php include '../../shared/header2.php';?>

<section>
    <div class="row" id="sectionTopOrder">
        <div class="topTxt">
            <h1><span class="restaurant">Mysteria restaurant</span> ordering</h1>
            <p>...enjoy food like never before</p>
        </div>
    </div>
    <div class="row">
        <div class="form col-6">
        <h2>Order form</h2>
        <?php
                if(isset($_POST["orderSelected"])){
                    
                    if (!empty($_POST['foodChecked'])) {
                            $cartFoodArray=array();
                            $cartQuantArray=array();
                        foreach ($_POST['foodChecked'] as $foods) {
                            $foodID=$foods;
                            $foodQuan=$_POST[$foodID];
                            
                            array_push($cartFoodArray,$foodID);
                            array_push($cartQuantArray,$foodQuan);
                        }
                        $_SESSION['foodsInCart']=$cartFoodArray;
                        $_SESSION['quantityInCart']=$cartQuantArray;
                    }
                    else{
                        echo '<script type ="application/JavaScript"> alert ( "please check a value/s before ordering from cart!"); 
                        window.location.assign("http://localhost/Mysteria/shared/cart.php"); </script>';
                    }
                                
                }
                else if(isset($_POST["orderAlone"])){
                    $foodID=$_POST["orderAlone"];
                    $foodQuan=$_POST[$foodID]; 

                    $cartFoodArray=array();
                    $cartQuantArray=array();

                    array_push($cartFoodArray,$foodID);
                    array_push($cartQuantArray,$foodQuan);

                    $_SESSION['foodsInCart']=$cartFoodArray;
                    $_SESSION['quantityInCart']=$cartQuantArray;
                   

                }


                
        ?>

            <form  class="delivForm"  method="POST" action="orderdb.php" >
                <p>Message: Number of order can not exceed 10 <b>Thank you</b></p><br>
                <?php if(isset($_SESSION['sent'])){
                    $var=$_SESSION['sent'];
                    echo $var;
                    $_SESSION['sent']="";
                }?>
                <big><label for="CustName">Customer:             <?php $var=$_SESSION['user']; echo"$var"?></label></big><br>
                
                <label for="order">Your order</label><br>
                <textarea id="order" name="order" rows="3" cols="30"
                  placeholder="Place Your Order Here"><?php
                     if(isset($_POST["orderSelected"])){
                    
                           foreach($_SESSION['foodsInCart'] as $key=>$fID){
                            $sql ="SELECT food_name FROM foodmenu WHERE food_id='$fID'";
                            $result=mysqli_query($connectVariable,$sql);
                            $res=mysqli_fetch_row($result);
                            echo $res[0]." \n ";
                           }
                               
                    }
                    else if(isset($_POST["orderAlone"])){
                        $sql ="SELECT food_name FROM foodmenu WHERE food_id='$foodID'";
                            $result=mysqli_query($connectVariable,$sql);
                            $res=mysqli_fetch_row($result);
                            echo $res[0];
                    } 
                        ?></textarea><br>
                
               <label for="ingredient1">If any allergic:(skip if none)</label><br>
                <input type="checkbox" name="allergy[]" id="ingredient1" value="Shrimp ">Shrimp <br>
                <input type="checkbox" name="allergy[]" id="ingredient2" value="Garlic ">Garlic <br>
                <input type="checkbox" name="allergy[]" id="ingredient3" value="Peanuts">Peanuts <br>
                <input type="checkbox" name="allergy[]" id="ingredient4" value="Orange/lemon">Orange/lemon <br>
                <input type="checkbox" name="allergy[]" id="ingredient5" value="Milk">Milk<br>
                <input type="checkbox" name="allergy[]" id="ingredient6" value="Soy">Soy<br>
                <input type="checkbox" name="allergy[]" id="ingredient7" value="Egg">Egg<br>
                <input type="checkbox" name="allergy[]" id="ingredient8" value="fish">fish<br>
                <input type="checkbox" name="allergy[]" id="ingredient10" value="Coconut Oil">Coconut Oil<br>
      
                <label for="other">Other allergic type</label>
                <input type="text"  name="other" id="other"  placeholder="please write other allergic ingreadients separated by comma" size=70px><br>
                <label for="date">Date:</label>
                <input type="date" name="date" id="date" min="<?php $d=$date=date_create(date('Y-m-d')); date_sub($d,date_interval_create_from_date_string("0 days")); echo date_format($d,"Y-m-d"); ?>"><br>
                <label for="time">Time:</label>
                <input type="Time" name="time" id="time" ><br>
              
                <label for="phone">Phone Number:</label>
                <select name="phone" id="phone">
                    <option value="+251">+251</option>
                    <option value="+12">+120</option>
                </select>
                <input type="tel" id="phone1" name="phone1" placeholder="967882862"><br>
                <label for="address">Address:</label>
                <textarea name="address" placeholder="enter your address" id="address" cols="20" rows="5" ></textarea><br>
                <a><input type="submit" name="submit" value="Order now" onclick="return orderValidateForm()"></a><hr>
            </form>
        </div>
        <div class="col-3 goto1">
            <div class="goto"><a href="#btm">&#10225; &nbsp; Bottom</a></div>
        </div>
    </div>

</section>
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
                                <button class="feedback-button" id="submit" onclick="checkInput()">
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

<section class="popup" id="popup3">
    <div class="popup_page">
        <div class="popup_page-close">
            <a href="../home/home.php" class="popup_page-close">&times;</a>
        </div>
        <div class="popup_page-content">
            <p>You have ordered your food successfully,you will receive your order number via e-mail shortly.<br>THANK YOU FOR CHOOSING US.<br>
               Email Us at <a href="www.restaurantmysteria@gmail.com">restaurantmysteria@gmail.com</a> For more information.<br>
            </p>
            <button  onclick="window.location.href='../menu_bar/FoodMenu.php';">Order again</button>
        </div>
    </div>
</section>
<!--<a href="#popup3">Feedback</a>-->
<footer>
    <div id="btm" class="feedback col-3">
        <a href="#">Feedback</a>
        <address>
             call:<br>
            +251110000101<br>
            +251967882862
        </address>
    </div>
    <div class="footer row">
        <div class="col-9 followLinks">
            <br><br>
            <p>Follow us on </p>
            <div id="btmlinks">
                <a href="https://www.facebook.com/103469795537169/posts/103501355534013"><img src="../../resources/images/fb2.png"></a>&nbsp;
                <a href="https://www.instagram.com"><img src="../../resources/images/insta2.png"></a>&nbsp;
                <a href="https://www.twitter.com"><img src="../../resources/images/twitter2.png"></a>&nbsp;
                <a href="https://t.me/mysteriaRestaurant"><img src="../../resources/images/tg2.png"></a>&nbsp;
            </div>
            <br><br>
            <p  style="font-size:16px; text-align:left; ">Copyright &copy; Mysteria 2021/22, all rights reserved </p>
        </div>
    </div>
</footer>
</body>
<?php require_once "../../db/connorder.php";?>
</html>
