<?php 
include '../../shared/CheckLogin.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="charset" content="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <meta name="author" content="rediet">
    <meta name="description" content="webpage for mysteria restaurant's delivery">
    <meta name="keywords" content="delivery,mysteria">
    <link rel="stylesheet" href="../../css/style-1.css">
    <link rel="stylesheet" href="../../css/headerNfooter.css">
    <link rel="stylesheet" href="../../css/popup.css">
    <title>Table Reservation cancellation form</title>
    <script src="../../js/side nav.js"></script>
    <script src="../../js/validator.js"></script>

</head>
<body>
<?php include '../../shared/header2.php';?>
<section>
    <div class="row" id="sectionTopOrder">
        <div class="topTxt">
            <h1><span class="restaurant">Mysteria restaurant</span> reservation</h1>
            <p>...never keep you waiting</p>
        </div>
    </div>
    <div class="row">
        <div class="form col-6">

            <form class="delivForm" action="cancelreserve.php" method="POST" onsubmit="return cancelValidateForm()">
                <hr><h1>
                Reservation cancellation Form</h1> <hr>
                <big><label for="CustName">Customer:             
                <?php $var=$_SESSION['user']; echo"$var"?></label></big><br>
                <label for="date">Reserved for date:</label>
                <input type="date" name="date" id="date"  min="<?php $d=$date=date_create(date('Y-m-d')); date_sub($d,date_interval_create_from_date_string("0 days")); echo date_format($d,"Y-m-d"); ?>"><br>
                <label for="time">Reserved for time:</label>
                <input type="time" name="time" id="time"><br>
        
                <label for="table_number">Table Number:</label>
                <input type="number" name="table_number" id="table_number" min=1 ><br>
                <label for="people">How many people?</label>
                <input type="number" name="people" id="people" placeholder= "Number of people" min=1 max=10><br>
                <input type="submit" value="cancel Reservation" name=Treserve><hr><br>
                You can also call:
                <ul>
                    <li> +251110000101</li>
                    <li> +251967882862, for more information</li>
                </ul>
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
                                    id="email2">
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
            <p>
                You have cancelled your reservation successfully, Call us for more information or email Us at
                 <a href="www.mysteriammtopr@gmail.com">mysteriammtopr@gmail.com</a><br>THANK YOU FOR CHOOSING US.<br>
            </p>
            <button  onclick="window.location.href='reservationnew.php#popup1';">Reserve Table </button>
            <button  onclick="window.location.href='../event/reserve.php#popup1';">Reserve Event</button>
        </div>
    </div>
</section>

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
            <p  style="font-size:16px; text-align:left; ">Copyright &copy; Mysteria 2021/22, all rights reserved </p>
        </div>
    </div>
</footer>
</body>
</html>
