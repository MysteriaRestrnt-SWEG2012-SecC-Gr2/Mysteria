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
    <title>Mysteria mysterious Menu</title>
    <link rel="stylesheet" type="text/css" href="../../css/MenuStyle.css">
    <link rel="stylesheet" href="../../css/popup.css">
    <script src="../../js/side nav.js"></script>
    <script src="../../js/validator.js"></script>
</head>
<body>
<?php include '../../shared/header2.php';?>
<section id="upper">
    <div class="upper-inner">
      <div id="heroCarousel" class="carousel slide carousel-fade">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner">

          <div class="carousel-item active" style="background-image: url(../../resources/images/menu.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown"><span>Mysteria Restaurant</span> Food menu</h2>
                <p class="animate__animated animate__fadeInUp">Real food doesn't have ingredients, real food is ingredients.<br>
                													- Jamie Oliver</p>
                <div>
                  <a href="Appetizer.php" class="btn-menu animate__animated animate__fadeInUp scrollto">Appetizer</a>
                  <a href="vegetarian.php" class="btn-book animate__animated animate__fadeInUp scrollto">Vegeterian</a>
                  <a href="Meatatarian (meat, chicken, fish, vegetables).php" class="btn-menu animate__animated animate__fadeInUp scrollto">Meataterian(Meat, Chicken, Fish....)</a>
                  <a href="Drinks.php" class="btn-book animate__animated animate__fadeInUp scrollto">Drinks</a>
                  <a href="Dessert.php" class="btn-menu animate__animated animate__fadeInUp scrollto">Dessert</a>
                  <a href="special.php" class="btn-book animate__animated animate__fadeInUp scrollto">Special</a>
                </div>
              </div>
            </div>
          </div>
      </div>
  </div>
</div>
</section>
<main id="main">
	
 <section id="gallery" class="gallery">

      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Gallery</h2>
          <p>Some photos and videos from Our Restaurant</p>
        </div>
      </div>

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-0">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <video width="400" height="250" autoplay controls muted loop id="video-style">" <source src="../../Resources/videos/Kitchen - 3510.mp4"  type="video/mp4" title="Eat Healthier Live happier">Your browser can't play this video </video>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
               <video align="center" valign="middle" width="400" height="250" autoplay controls muted loop> <source  src="../../Resources/videos/mainpage.mp4"  type="video/mp4" title="Eat Healthier Live happier">Your browser can't play this video </video>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <video align="center" valign="middle" width="400" height="250" autoplay controls muted loop> <source  src="../../Resources/videos/istockphoto.mp4"   type="video/mp4" title="Eat Healthier Live happier">Your browser can't play this video </video>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <video align="center" valign="middle" width="400" height="250"  controls autoplay muted loop> <source src="../../Resources/videos/Dessert.mp4"   type="video/mp4" title="Eat Healthier Live happier">Your browser can't play this video </video>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <video align="center" valign="middle" width="400" height="250" autoplay controls muted loop> <source src="../../Resources/videos/Wine - 81170.mp4"   type="video/mp4" title="Eat Healthier Live happier">Your browser can't play this video </video>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <video align="center" valign="middle" width="400" height="250" autoplay controls muted loop> <source src="../../Resources/videos/fooddii (2).mp4"  type="video/mp4" title="Eat Healthier Live happier">Your browser can't play this video </video>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
             <img src="../../resources/images/Old-Fashioned-Peanut-Butter-Cookies.jpg" width="400px" height="250px">
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <img src="../../Resources/images/apple.jpeg" width="400px" height="250px">
            </div>
          </div>
          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <img src="../../resources/images/Roast-Chicken.jpg" width="400px" height="250px">
            </div>
          </div>
          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <img src="../../resources/images/Zucchini-Lasagna-Rolls.jpg" width="400px" height="250px">
            </div>
          </div>
          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <img src="../../resources/images/beef burger.jpg" width="400px" height="250px">
            </div>
          </div>
          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <img src="../../resources/images/Tibs.jpg" width="400px" height="250px">
            </div>
          </div>
            <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <img src="../../resources/images/Homemade-Chocolate-Pudding.jpg" width="400px" height="250px">
            </div>
          </div>
          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <img src="../../resources/images/garlic grilled steaks.jpg" width="400px" height="250px">
            </div>
          </div>
          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <img src="../../resources/images/tej.jpeg" width="400px" height="250px">
            </div>
          </div>
          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <img src="../../resources/images/Guacamole.jpg" width="400px" height="250px">
            </div>
          </div>
          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <img src="../../resources/images/Samosas.jpg" width="400px" height="250px">
            </div>
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
