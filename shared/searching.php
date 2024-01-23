<?php 
session_start();
include 'CheckLogin.php';
require_once '../db/connectVar.php';
include 'searchHeader.php';
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
    <link rel="stylesheet" type="text/css" href="../css/MenuStyle.css">
    <link rel="stylesheet" type="text/css" href="../css/headerNfooter.css">
    <link rel="stylesheet" type="text/css" href="../css/popup.css">
    <script src="../js/side nav.js"></script>
    <script src="../js/validator.js"></script>
    <title>search results</title>

</head>

<body>
<section id="upper">
    <div class="upper-inner">
      <div id="heroCarousel" class="carousel slide carousel-fade">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner">

          <div class="carousel-item active" style="background-image: url(../resources/images/platter.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown"><span>Mysteria</span> Search results</h2>
               
              </div>
            </div>
          </div>
      </div>
  </div>
</div>
</section>
<main >
            <section>
            <div class="middlebox">
            <div class="content">
               
        
      <?php
      if(isset($_GET['search']))
       {
                $srchQuery=$_GET['query'];
                if(empty($srchQuery)){
                    
                    $srchQuery=$_SESSION['query'];
                }
                else{
                    $_SESSION['query']=$srchQuery;
                }
                    $sort="";
                    $filter="";
                if($_GET['sort']!=""){
                
                    $sort="ORDER BY ".$_GET['sort'];
                }
                if($_GET['filter']!=""){
                    if($_GET['filter']=="price>"||$_GET['filter']=="price<")
                        {
                            $filter="and ".$_GET['filter'].$_GET['compare'];
                        }
                    else {
                        $filter="and food_category="."\"".$_GET['filter']."\"";
                    }    
                }

                echo " <div class=\"col-12 srchResult\">
                <label>Search results for $srchQuery</label>
                </div> <div class=\"main\">";
                
                
                $sql= "SELECT * FROM foodmenu where (food_name LIKE '%$srchQuery%' or food_category LIKE '%$srchQuery%' or ingredient  LIKE '%$srchQuery%')$filter $sort;";
                    $insertionResult2 = mysqli_query($connectVariable, $sql);
                    
                
                        while ($row = mysqli_fetch_assoc($insertionResult2)){
                        
                            $img= str_replace('../','',$row['imagePath']);
                            $img="../".$img;
                            $name= $row['food_name'];
                            $ingred=$row['ingredient'];                              
                            $price=$row['price'];
                            $foodID=$row['food_id'];
                                $items=" <div class=\"items\">
                                    <img src=\"$img\"> <br>
                                        <h4>$name</h4>
                                        <div class=\"details\">
                                            <div class=\"sub-details\">
                                                <h5 class=\"price\">Price: $price ETB</h5>
                                            </div>
                                            <div class=\"middle\">
                                            <div class=\"text\">
                                        <p><h5>Main Ingredients</h5>$ingred
                                        </p></div>
                                        </div>
                                        <a href=\"../order/order2.php\"><button type=\"submit\" value=\"$foodID\">order</button></a>
                                    </div>
                                </div>";
                                echo $items;
                                }
        }
      ?>
        </div>
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
                                            src="../resources/images/close_button.png" alt=""
                                            class="popup_page-close-button"></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
                                        
</main>
<footer>
        <div id="btm" class="feedback col-3">
        <a href="#popup4">Feedback</a>
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
                    <a href="https://www.facebook.com/103469795537169/posts/103501355534013"><img src="../resources/images/fb2.png"></a>&nbsp;
                    <a href="https://www.instagram.com"><img src="../resources/images/insta2.png"></a>&nbsp;
                    <a href="https://www.twitter.com"><img src="../resources/images/twitter2.png"></a>&nbsp;
                    <a href="https://t.me/mysteriaRestaurant"><img src="../resources/images/tg2.png"></a>&nbsp;
                </div>
                <br><br>
                <p style="font-size:16px; text-align:left; ">Copyright &copy; Mysteria 2021/22, all rights reserved </p>
            </div>
        </div>
</footer>
</body>

</html>