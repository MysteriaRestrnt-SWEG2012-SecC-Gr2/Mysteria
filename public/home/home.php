<?php 
include '../../shared/CheckLogin.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="charset" content="UTF-8">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <meta name="author" content="okitta">
    <meta name="description" content="webpage for mysteria restaurant's delivery">
    <meta name="keywords" content="delivery,mysteria">
    <title>Mysteria Restaurant</title>
    <link rel="stylesheet" href="../../css/all.css">
    <link rel="stylesheet" href="../../css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../css/basic icon/icon_font.css">
    <link rel="stylesheet" href="../../css/ecommerce icon/icon_ecommerce.css">
    <link rel="stylesheet" href="../../css/weather icon/weather_style.css">
    <link rel="stylesheet" href="../../css/general_style.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <script src="../../js/side nav.js"></script>
    <script src="../../js/validator.js"></script>
</head>
<body>
    <?php include '../../shared/header.php';?>

<main>
    <section class="section-about">
        <div class="u-center-text u-margine-bottom-8">
            <h2 class="secondary">
                Why
            </h2>
        </div>
        <div class="row">
            <div class="col-1-of-2">
                <h3 class="heading-theritiary u-margin-bottom-2">
                    Time Distance and Technology
                </h3>
                <p class="paragraph">
                    Why would we just see the photo of a food in which we can not eat it?
                    Why would we just eat only things found near by?
                    Why can not we make the time so small that we can order from anywhere?
                    Why can not we eat our favorite foods in our home with our families?
                </p>
                <p class="paragraph">
                    How can we eat any kind of food by just sending the ingrdients and phots?
                    How can we eat something put of our boundries?
                </p>
                <p class="paragraph u-margin-bottom-2">
                    How can we reduce the time and distance relation?
                    How can we eat anything we want with our families?
                    That is where our restaurant comes in.
                </p>
                <h3 class="heading-theritiary u-margin-bottom-2">
                    Us
                </h3>
                <p class="paragraph u-margin-bottom-2">
                    Till now we have been asking you the basic questions of the time. Now we will
                    provide you with satisfactory results.
                    Our Restaurant is build in order to answer for the above questions. There is
                    no reason for you to worry about your allergies
                    and health issues related to food we will take care of it for you. You can
                    even order anything you want from us from anywhere.
                    Because we are using a 21<sup>st</sup> century technology which the design
                    and build of websites that can be accessed anywhere.
                </p>
                <a href="../feedback2.html" class="button-text">
                    Try Us &rarr;
                </a>
            </div>
            <div class="col-1-of-2">
                <div class="comp1__now">
                    <img src="../../resources/images/bartender.jpg" alt="photo 1" class="comp1 comp1--p1">
                    <img src="../../resources/images/waiter.jpg" alt="photo 2" class="comp1 comp1--p2">
                    <img src="../../resources/images/kitchen.jpg" alt="photo 3" class="comp1 comp1--p3">
                </div>
            </div>
        </div>
    </section>
    <section class="popup" id="popup">
            <div class="popup_page-content">
                <div class="feedback-body">
                    <div class="feedback-container">
                        <div class="feedback-header">
                            <h2 class="feedback-h2">
                                Your Ingrdients
                            </h2>
                        </div>
                        <form class="feedback-form" action="#home" id="form">
                            <div class="feedback-form-control">
                                <lable class="feedback-lable">
                                    <span class="feedback-span" style="display: flex;">User Name</span>
                                </lable><br>
                                <input type="text" class="feedback-input feedback-username" placeholder="Username" id="username">
                            </div>
                            <div class="form-control">
                                <lable class="feedback-lable">
                                    <span class="feedback-span" style="display: flex;">Email</span>
                                </lable><br>
                                <input type="email" class="feedback-input feedback-email"
                                style="border-color: black; padding: 20px; width: 100%;" placeholder="email address" id="email">
                                <br><br>
                                <div class="feedback-form-control">
                                    <lable class="feedback-lable">
                                        <span class="feedback-span" style="display: flex;">Your Ingrdients and Recipe</span>
                                    </lable><br>
                                    <textarea class="feedback-input feedback-textarea" placeholder="Your Ingrdients and Recipe"
                                    id="feedback"></textarea>
                                </div>
                                <button class="button-text feedback-button" id="submit" onclick="checkInput()">
                                    Submit
                                </button>
                                <div class="popup_page-close">
                                    <a href="#Feedback" class="popup_page-close"><img src="../../resources/images/close_button.png"
                                        alt="" class="popup_page-close-button"></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
    <section class="popup" id="popup2">
            <div class="popup_page-content">
                <div class="feedback-body">
                    <div class="feedback-container">
                        <div class="feedback-header">
                            <h2 class="feedback-h2">
                                Gift Card Registration
                            </h2>
                        </div>
                        <form class="feedback-form" action="#home" id="form">
                            <div class="feedback-form-control">
                                <lable class="feedback-lable">
                                    <span class="feedback-span" style="display: flex;">User Name</span>
                                </lable><br>
                                <input type="text" class="feedback-input feedback-username" placeholder="Username" id="username">
                            </div>
                            <div class="form-control">
                                <lable class="feedback-lable">
                                    <span class="feedback-span" style="display: flex;">Email</span>
                                </lable><br>
                                <input type="email" class="feedback-input feedback-email"
                                    style="border-color: black; padding: 20px; width: 100%;" placeholder="email address" id="email">
                                <br><br>
                                <button class="button-text feedback-button" id="submit" onclick="checkInput()">
                                    Submit
                                </button>
                                <div class="popup_page-close popupclose">
                                    <a href="#Feedback" class="popup_page-close"><img src="../../resources/images/close_button.png"
                                            alt="" class="popup_page-close-button"></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
    <section class="popup" id="popup3">
       
            <div class="popup_page-content">
                <form method="POST">
                    <div class="popup">
                        <div class="feedback-body">
                            <div class="feedback-container">
                                <div class="feedback-header">
                                    <h2 class="feedback-h2">
                                        Feedback Form
                                    </h2>
                                </div>
                                <form class="feedback-form" action="#home" id="form">
                                    <div class="feedback-form-control">
                                        <lable class="feedback-lable">
                                            <span class="feedback-span">User Name</span>
                                        </lable><br>
                                        <input type="text" class="feedback-input feedback-username" placeholder="Username" id="username">
                                    </div>
                                    <div class="form-control">
                                        <lable class="feedback-lable">
                                            <span class="feedback-span">Email</span>
                                        </lable><br>
                                        <input type="email" class="feedback-input feedback-email"
                                            style="border-color: black; padding: 20px; width: 100%;" placeholder="email address" id="email">
                                        <br><br>
                                        <div class="feedback-form-control">
                                            <lable class="feedback-lable">
                                                <span class="feedback-span">Feedback</span>
                                            </lable><br><br>
                                            <textarea class="feedback-input feedback-textarea" placeholder="Your Feedback Please"
                                                id="feedback"></textarea>
                                        </div>
                                        <button class="button-text feedback-button" id="submit" onclick="checkInput()">
                                            Submit
                                        </button>
                                        <div class="popup_page-close">
                                            <a href="#Feedback" class="popup_page-close"><img src="../../resources/images/close_button.png"
                                                    alt="" class="popup_page-close-button"></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        
    </section>
    <section class="major_features">
        <div class="u-center-text u-margine-bottom-8">
            <h2 class="secondary">
                Check This Out
            </h2>
        </div>
        <div class="row">
            <div class="col-1-3">
                <div class="card">
                    <div class="card_side card_side-front">
                        <div class="card__picture card__picture-1">
                            &nbsp;
                        </div>
                        <div class="textfont card__heading u-margine-bottom-4">
                            Events
                        </div>
                        <div class="card__detail">
                            <ul class="card_list">
                                <li>Couples Night</li>
                                <li>Jazz Night</li>
                                <li>Special Food Days</li>
                                <li>Ethiopian Food</li>
                                <li>Italian Food</li>
                                <li>Mexican Food</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card_side card_side-back">
                        <div class="card__picture card__picture-1">
                            &nbsp;
                        </div>
                        <div class="card__detail">
                            Embrace your day, You are so special<br>
                            and we are here to provide you Special<br>
                        </div>
                        <div class="card__check u-margine-bottom-4">
                            <a href="../event/events.php" class="btn btn-white btn-middle">See Events</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1-3">
                <div class="card">
                    <div class="card_side card_side-front">
                        <div class="card__picture card__picture-2">
                            &nbsp;
                        </div>
                        <div class="textfont2 card__heading u-margine-bottom-4">
                            Special offers
                        </div>
                        <div class="card__detail">
                            <ul class="card_list">
                                <li>Cheif:User</li>
                                <li>Ingrdients:User</li>
                                <li>Food:resturant</li>
                                <li>Menu:offmenu</li>
                                <li>Rating:9/10</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card_side card_side-back">
                        <div class="card__picture card__picture-2">
                            &nbsp;
                        </div>
                        <div class="card__detail">
                            If you want to have a delicious food on your<br>
                            table here we are. like on your table.<br>
                        </div>
                        <div class="card__check u-margine-bottom-4">
                            <a href="#popup" class="btn btn-white btn-middle">Check Out</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1-3">
                <div class="card" id="card">
                    <div class="card_side card_side-front">
                        <div class="card__picture card__picture-3">
                            &nbsp;
                        </div>
                        <div class="textfont3 card__heading u-margine-bottom-4">
                            Today's gift
                        </div>
                        <div class="card__detail">
                            <ol class="card_list">
                                <li>1week free delivary</li>
                                <li>2days couple Night</li>
                                <li>1day Free Service</li>
                            </ol>
                        </div>
                    </div>
                    <div class="card_side card_side-back">
                        <div class="card__picture card__picture-3">
                            &nbsp;
                        </div>
                        <div class="card__detail">
                            Our dearest gifts are our <br>
                            customers and we<br>
                            would like to give you<br>
                            from what you gave us.<br>
                        </div>
                        <div class="card__check u-margine-bottom-4">
                            <a href="#popup2" class="btn btn-white btn-middle">Participate</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <section class="section_stories">
      <div class="u-center-text u-margine-bottom-8">
          <h2 class="secondary">
              Experiences all over
          </h2>
      </div>
      <?php
        include '../../db/connectVar.php';
        $i = 0;
        $userId = $_SESSION['userID'];
        $query = "SELECT * FROM feedback INNER JOIN registration WHERE feedback.user_id=registration.user_id ORDER BY  feedback.feedback_no DESC ";
        $result = mysqli_query($connectVariable, $query);
        while ($i < 6) {

            if ($i % 2 != 0) {
                $row = mysqli_fetch_assoc($result);
                if (mysqli_num_rows($result) > 0) {
                    $feedbacktitle = $row['subject'];
                    $mainfeedback = $row['feedback'];
                    $username = $row['user_name'];
                    echo $title = "<div class=\"row\">
                                            <div class=\"story\">
                                                <figure class=\"story__shape\">
                                                    <img src=\"../../resources/images/eating.jpg\" alt=\"eating_person\" class=\"story__image\">
                                                <figcaption class=\"story__caption\">
                                                $username
                                                </figcaption>
                                                </figure>
                                                <div class=\"story__text\">
                                                <h3 class=\"heading-theritiary u-margin-bottom-2\">
                                                $feedbacktitle
                                                </h3>
                                                <p>
                                                $mainfeedback
                                                </p>
                                                </div>
                                            </div>
                                        </div>";
                } else {
                    break;
                }
            } else {
                $row = mysqli_fetch_assoc($result);
                if (mysqli_num_rows($result) > 0) {
                    $feedbacktitle = $row['subject'];
                    $mainfeedback = $row['feedback'];
                    $username = $row['user_name'];
                    echo $title = "<div class=\"row\">
                                            <div class=\"story2\">
                                                <figure class=\"story2__shape2\">
                                                    <img src=\"../../resources/images/eating2.jpg\" alt=\"eating_person\" class=\"story__image\">
                                                <figcaption class=\"story2__caption2\">
                                                $username
                                                </figcaption>
                                                </figure>
                                                <div class=\"story2__text2\">
                                                <h3 class=\"heading-theritiary u-margin-bottom-2\">
                                                $feedbacktitle
                                                </h3>
                                                <p>
                                                $mainfeedback
                                                </p>
                                                </div>
                                            </div>
                                        </div>";
                } else {
                    break;
                }
            }
            $i++;
        }
        ?>
  </section>
    <section>
        <div class="popup" id="popup4">
            <div class="feedback-body-developers">
                <div class="feedback-container-developers">
                    <div class="feedback-header-developers">
                        <h2 class="feedback-h2-developers">
                            Developers Information
                        </h2>
                    </div>
                    <form class="feedback-form-developers" id="form">
                        <div class="feedback-form-control-developers">
                            <div class="check-developers">
                                <figcaption>Paulose Teshome</figcaption>
                                <div class="check_hover-developers">
                                    <img src="../../resources/images/paulcss.jpg" alt="eating_person"
                                        class="developers_align-developers story__image story__shape developers_image-developers">
                                    <div id="hover_effect-developers">
                                        <span>
                                            Section: C
                                        </span>
                                        <span>
                                            ID: ETS0556/12
                                        </span>
                                    </div>
                                </div>
                            </div>
                                 <div class="check-developers">
                                    <figcaption>Rediet Birhane</figcaption>
                                    <div class="check_hover-developers">
                                        <img src="../../resources/images/redcss.jpg" alt="eating_person"
                                            class="developers_align-developers story__image story__shape developers_image-developers">
                                        <div id="hover_effect1-developers">
                                            <span>
                                                Section: C
                                            </span>
                                            <span>
                                                ID: ETS0563/12
                                            </span>
                                        </div>
                                    </div>
                                 </div>            
                        </div>
                        <div class="feedback-form-control-developers">
                            <div class="check-developers">
                                <figcaption>Merron Abera</figcaption>
                                <div class="check_hover-developers">
                                    <img src="../../resources/images/MeronAbera.png" alt="eating_person"
                                        class="developers_align-developers story__image story__shape developers_image-developers">
                                    <div id="hover_effect2-developers">
                                        <span>
                                            Section: C
                                        </span>
                                        <span>
                                            ID: ETS0451/12
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="check-developers">
                                <figcaption>Merron Edea</figcaption>
                                <div class="check_hover-developers">
                                    <img src="../../resources/images/MerryEdea.png" alt="eating_person"
                                        class="developers_align-developers story__image story__shape developers_image-developers">
                                    <div id="hover_effect3-developers">
                                        <span>
                                            Section: C
                                        </span>
                                        <span>
                                            ID: ETS0450/12
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="feedback-form-control-developers">
                            <div class="check-developers">
                                <figcaption>Tseday Mekonen</figcaption>
                                <div class="check_hover-developers">
                                    <img src="../../resources/images/Tesdicss.jpg" alt="eating_person"
                                        class="developers_align-developers story__image story__shape developers_image-developers">
                                    <div id="hover_effect4-developers">
                                        <span>
                                            Section: C
                                        </span>
                                        <span>
                                            ID: ETS1050/12
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="check-developers">
                                <figcaption>Okitta Ongaye</figcaption>
                                <div class="check_hover-developers">
                                    <img src="../../resources/images/okcss.jpg" alt="eating_person"
                                        class="developers_align-developers story__image story__shape developers_image-developers">
                                        <div id="hover_effect5-developers"> 
                                            <span>
                                                Section: C
                                            </span> 
                                            <span>
                                                ID: ETS0555/12
                                            </span>
                                        </div>
                                </div>
                            </div>
                        </div>
                            <div class="popup_page-close">
                                <a href="#Feedback" class="popup_page-close"><img src="../../resources/images/close_button.png" alt=""
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
   <div class="footer">
       <div class="container">
           <div class="rown">
               <div class="footer-col footer-text">
                   <h4>Company</h4>
                   <ul>
                       <li>
                           <a href="../review/about us2.php">about Us</a>
                       </li>
                    <li>
                        <a href="#">Our Services</a>
                    </li>
                    <li>
                        <a href="#">Privacy Policy</a>
                    </li>
                   </ul>
               </div>
            <div class="footer-col footer-text">
                <h4>Get Help</h4>
                <ul>
                    <li>
                        <a href="#">FAQ</a>
                    </li>
                    <li>
                        <a href="../order/order2.php">Order</a>
                    </li>
                    <li>
                        <a href="#">Payment Option</a>
                    </li>
                </ul>
            </div>
            <div class="footer-col footer-text">
                <h4>Contact Us</h4>
                <ul>
                    <li>
                        <a href="#"><img src="../../resources/images/phone_num_black.png" class="footer-col-icon"><spam>Phone Number</spam></a>
                    </li>
                    <li>
                        <a href="#"><img src="../../resources/images/email.png" class="footer-col-icon"><spam>Email</spam></a>
                    </li>
                    <li>
                        <a href="#"><img src="../../resources/images/tele.png" class="footer-col-icon"><spam>Telegram</spam></a>
                    </li>
                </ul>
            </div>
            <div class="footer-col footer-text">
                <h4>Follow Us</h4>
               <div class="social_medias">
                    <a href="https://www.facebook.com/103469795537169/posts/103501355534013"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.twitter.com"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                    <div class="developer">
                        <a href="#popup4" class="contact-developers"><abbr title="Developers Information">DI</abbr></a>
                    </div>
               </div>
            </div>
           </div>
       </div>
   </div>
</footer>
