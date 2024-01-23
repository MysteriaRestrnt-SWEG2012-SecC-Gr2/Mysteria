<?php 
include '../../shared/CheckLogin.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>events</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../../css/events.css">
    <link rel="stylesheet" href="../../css/headerNfooter.css">
    <link rel="stylesheet" href="../../css/popup.css">
    <script src="../../js/side nav.js"></script>
    <script src="../../js/validator.js"></script>
</head>

<body>
<?php include '../../shared/event_header.php';?>
<main>
    <section>
            <div class="middlebox">
                <div class="content">
                    <span> <h1>10</h1> </span>
                    <h4>Days Remaining </h4>
                    <p>
                        <h5><span>Make a reservation for any occassions</span></h5>
                        <h2>40% Holiday Discount</h2>
                        <h4>Jan 18- Feb 02 </h4>
                    </p>
                </div>
            </div><br><br>
            <div class="box">
                <div class="wrap">
                    <h2 class="offer">Offer ends in</h2>
                    <div class="timer">
                        <div class="days">
                            <span id="days_left"> 0</span>days</div>
                        <div class="hours">
                            <span id="hours_left"> 0 </span>hours</div>
                        <div class="mins">
                            <span id="mins_left"> 0 </span>mins</div>
                        <div class="secs">
                            <span id="secs_left"> 0 </span>secs</div>
                    </div>
                </div>
                <div class="second">
                    <a href="../event/reserve.php#popup1"><button class="reserve"><b>Reserve Now</b></button></a> <br>
                </div>
            </div>
            </div><br><br>
            <div class=" home-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="../../resources/images/christmas.jpeg" alt=""></div>
                    <div class="swiper-slide"><img src="../../resources/images/birthday.jpeg" alt=""></div>
                    <div class="swiper-slide"><img src="../../resources/images/bridal shower.jpeg" alt=""></div>
                    <div class="swiper-slide"><img src="../../resources/images/business.jpeg" alt=""></div>
                    <div class="swiper-slide"><img src="../../resources/images/baby shower.jpeg" alt=""></div>
                    <div class="swiper-slide"><img src="../../resources/images/party3.jpeg" alt=""></div>
                </div>
            </div>

            <section class="service" id="service">

                <h1 class="heading"> our <span>services</span> </h1>

                <div class="box-container">

                    <div class="box2">
                        <i class="fas fa-map-marker-alt"></i>
                        <h3>Venue selection</h3>
                        <p>You can choose the venue of your event.</p>
                    </div>

                    <div class="box2">
                        <i class="fas fa-envelope"></i>
                        <h3>Invitation card</h3>
                        <p>Invitation card is must for private events</p>
                    </div>

                    <div class="box2">
                        <i class="fas fa-music"></i>
                        <h3>Entertainment</h3>
                        <p>We provide Mini concerts,Holiday parties and other public events.</p>
                    </div>

                    <div class="box2">
                        <i class="fas fa-utensils"></i>
                        <h3>Food and drinks</h3>
                        <p>We prepare special dishes of your choice for the event .</p>
                    </div>

                    <div class="box2">
                        <i class="fas fa-photo-video"></i>
                        <h3>Memories</h3>
                        <p>Selfie zones for reserving memories of your special events.</p>
                    </div>

                    <div class="box2">
                        <i class="fas fa-birthday-cake"></i>
                        <h3>Formal Events</h3>
                        <p>Reservation of Business meetings and charity events.</p>
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

    </section>
            <div class="event-container">
                <h3 class="year">2022</h3>

                <div class="event">
                    <div class="event-left">
                        <div class="event-date">
                            <div class="date">18</div>
                            <div class="month">Jan</div>
                        </div>
                    </div>

                    <div class="event-right">
                        <h3 class="event-title">BIRTHDAY PARTY</h3>

                        <div class="event-description">
                            <b> Private Event </b><br> Requirement:No age restriction,Invited Guests only
                        </div>

                        <div class="event-timing">
                            <img src="images/time.png" alt="" /> 10:00 am
                        </div>
                    </div>
                </div>
                <div class="event">
                    <div class="event-left">
                        <div class="event-date">
                            <div class="date">19</div>
                            <div class="month">Jan</div>
                        </div>
                    </div>

                    <div class="event-right">
                        <h3 class="event-title">HOLIDAY PARTY</h3>

                        <div class="event-description">
                            <b> Anyone is welcome </b> <br> Requirement:(18+),ID
                        </div>

                        <div class="event-timing">
                            <img src="images/time.png" alt="" /> 03:00 pm
                        </div>
                    </div>
                </div>

                <div class="event">
                    <div class="event-left">
                        <div class="event-date">
                            <div class="date">22</div>
                            <div class="month">Jan</div>
                        </div>
                    </div>

                    <div class="event-right">
                        <h3 class="event-title">BUSINESS MEETING</h3>

                        <div class="event-description">
                            <b> Private Event </b><br> Requirement:(18+),ID,Invited Guests only
                        </div>

                        <div class="event-timing">
                            <img src="images/time.png" alt="" /> 09:45 am
                        </div>
                    </div>
                </div>

                <div class="event">
                    <div class="event-left">
                        <div class="event-date">
                            <div class="date">9</div>
                            <div class="month">Feb</div>
                        </div>
                    </div>

                    <div class="event-right">
                        <h3 class="event-title">CHARITY EVENT</h3>

                        <div class="event-description">
                            <b> Anyone is welcome </b> Requirement:No Requirement
                        </div>

                        <div class="event-timing">
                            <img src="images/time.png" alt="" /> 08:30 am
                        </div>
                    </div>
                </div>

                <div class="event">
                    <div class="event-left">
                        <div class="event-date">
                            <div class="date">4</div>
                            <div class="month">Feb</div>
                        </div>
                    </div>

                    <div class="event-right">
                        <h3 class="event-title">Bridal Shower</h3>

                        <div class="event-description">
                            <b> Private Event </b><br> Requirement:Invited Guests only
                        </div>

                        <div class="event-timing">
                            <img src="images/time.png" alt="" /> 13:30 pm
                        </div>
                    </div>
                </div>

                <div class="event">
                    <div class="event-left">
                        <div class="event-date">
                            <div class="date">8</div>
                            <div class="month">Mar</div>
                        </div>
                    </div>

                    <div class="event-right">
                        <h3 class="event-title">Meeting</h3>

                        <div class="event-description">
                            <b> Private Event </b><br> Requirement:Invited Guests only
                        </div>

                        <div class="event-timing">
                            <img src="images/time.png" alt="" /> 09:30 am
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <section class="price" id="price">
        <h2> Our Prices</h2>
        <div class="col-1-of-2">
            <div class="card">
        <div class="card_side card_side-front">
            <div class="card__detail">
                <h3 class="title">for birthdays</h3>
                <h3 class="amount">$200.99</h3>
                <ul>
                    <li><i class="fas fa-check"></i>full services</li>
                    <li> <i class="fas fa-check"></i> decorations </li>
                    <li> <i class="fas fa-check"></i> music and photos </li>
                    <li> <i class="fas fa-check"></i> food and drinks </li>
                    <li> <i class="fas fa-check"></i> invitation card </li>
                </ul>
                <a href="reserve.php" class="btn">reserve now</a>
            </div>
        </div>
        <div class="card_side card_side-back">

            <div class="card__detail">
                <h3 class="title">for weddings</h3>
                <h3 class="amount">$480.99</h3>
                <ul>
                    <li><i class="fas fa-check"></i>full services</li>
                    <li> <i class="fas fa-check"></i> decorations </li>
                    <li> <i class="fas fa-check"></i> music and photos </li>
                    <li> <i class="fas fa-check"></i> food and drinks </li>
                    <li> <i class="fas fa-check"></i> invitation card </li>
                </ul>
                <a href="reserve.php" class="btn">reserve now</a>
            </div>
        </div>
    </div>
        </div>
        <div class="col-1-of-2">
            <div class="card">
                <div class="card_side card_side-front">
                    <div class="card__detail">
                        <h3 class="title">for concerts</h3>
                        <h3 class="amount">$650.99</h3>
                        <ul>
                            <li><i class="fas fa-check"></i>full services</li>
                            <li> <i class="fas fa-check"></i> decorations </li>
                            <li> <i class="fas fa-check"></i> music and photos </li>
                            <li> <i class="fas fa-check"></i> food and drinks </li>
                            <li> <i class="fas fa-check"></i> invitation card </li>
                        </ul>
                        <a href="reserve.php" class="btn">reserve now</a>
                    </div>
                </div>
                <div class="card_side card_side-back">
                    <div class="card__detail">
                        <h3 class="title">for others</h3>
                        <h3 class="amount">$450-$870</h3>
                        <ul>
                            <li><i class="fas fa-check"></i>full services</li>
                            <li> <i class="fas fa-check"></i> decorations </li>
                            <li> <i class="fas fa-check"></i> music and photos </li>
                            <li> <i class="fas fa-check"></i> food and drinks </li>
                            <li> <i class="fas fa-check"></i> invitation card </li>
                        </ul>
                        <a href="reserve.php" class="btn">reserve now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
<footer>
    <div id="btm" class="feedback col-3">
        <a href="#popu4">Feedback</a>
        <address>
            call:<br>
            +251110000101<br>
            +251967882862
        </address>
    </div>
    <div class="footer hrow">
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
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="../../js/event.js"></script>
</body>

</html>
