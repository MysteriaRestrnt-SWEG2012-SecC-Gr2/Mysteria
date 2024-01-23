<?php 
include '../../shared/CheckLogin.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="charset" content="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Meron E.">
    <meta name="description" content="webpage for mysteria restaurant's Menu">
    <meta name="keywords" content="Menu,mysteria">
    <title>Mysteria Meatatarian menu</title>
    <link rel="stylesheet" type="text/css" href="../../css/MenuStyle.css">
    <link rel="stylesheet" href="../../css/popup.css">
    <script src="../../js/side nav.js"></script>
    <script src="../../js/validator.js"></script>
    <script src="../../js/addCartMenu.js"></script>
</head>
<body>
<?php include '../../shared/header2.php';?>
<section id="upper">
    <div class="upper-inner">
      <div id="heroCarousel" class="carousel slide carousel-fade">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner">

          <div class="carousel-item active" style="background-image: url(../../resources/images/meatbg.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown"><span>Mysteria</span> Meatatarian menu</h2>
                <p class="animate__animated animate__fadeInUp">Laughter is Brightest, Where Food is Best.<br>
                                                                    - Anonymous</p>
              </div>
            </div>
          </div>
      </div>
  </div>
</div>
</section>
    <main>
        <section>
            <div class="middlebox" style="max-width:1900px;margin-top:100px">
            <div class="content">
            <div class="col-12 sortBox">
                <form method="GET" action="Meatatarian (meat, chicken, fish, vegetables).php">
                <label for="sort">   &nbsp; &nbsp; Sort by: </label>
                <select id="sort" name="sort">
                    <option value="">none</option>
                    <option value="food_name">name</option>
                    <option value="price">price</option>
                    <option value="food_name desc">name desc</option>
                    <option value="price desc">price desc</option>
                </select>
                <label for="filter">   &nbsp;  filter: </label>
                <select id="filter" name="filter"  onchange="checkOptions2(this)">
                    <option value="">none</option>
                    <option value="price>">price > </option>
                    <option value="price<">price < </option>
                </select>
                <input type="number" name="compare2" id="compare2" value="100" style="display:none;">
                <input type="submit" name="sorter" value="sort" style="width:4%;">
                <input type="checkbox" id="chkALL" name="chkALL" onclick="checkAll()"/><label for="chkALL">Select all cart items</label>
                </form>
            </div>
            <form action="../../shared/addToCart.php" method="POST">
                <div class="main">
                <?php
                $sort="";
                $filter="";
                if(isset($_GET['sorter'])){
                if($_GET['sort']!=""){

                $sort="ORDER BY ".$_GET['sort'];
                }
                if ($_GET['filter']!="") {
                $filter="and ".$_GET['filter'].$_GET['compare2'];
                }
                } 
                include '../../shared/showMenu.php';
                printMenu("Meatatarian",$sort,$filter);
                ?>
                </div> 
                <div class="cartBTN" id="cartBTNdiv">
                <button id="cartBTNM"  name="cardSelected" type="submit" value="1">add selected items to cart</button>
                </div>
            </form>  
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

        </main>
 <footer>
     <div id="btm" class="feedback col-3">

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
             <p style="font-size:16px; text-align:left; ">Copyright &copy; Mysteria 2021/22, all rights reserved </p>
         </div>
     </div>
 </footer>
</body>
</html>
