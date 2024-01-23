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
    <link rel="stylesheet" href="../../css/style-1.css">
    <link rel="stylesheet" href="../../css/headerNfooter.css">
    <link rel="stylesheet" href="../../css/popup.css">
    <title>Table Reservation </title>
    <script src="../../js/side nav.js"></script>
    <script src="../../js/validator.js"></script>
</head>
<body>
<?php include '../../shared/header2.php';
?>
<section>
    <div class="row" id="sectionTopOrder">
        <div class="topTxt">
            <h1><span class="restaurant">Mysteria restaurant</span> reservation</h1>
            <p>...never keep you waiting</p>
        </div>
    </div>
    <div class="row">
        <div class="form col-6">

            <h2>Table Reservation Form</h2>
            <form class="delivForm" action="reservedb.php" onsubmit="return reservationValidateForm()" method="POST">

            <big><label for="CustName">Customer:             
                <?php $var=$_SESSION['user']; echo"$var"?></label></big><br>
                <?php if(isset($_SESSION['sent'])){
                    $var=$_SESSION['sent'];
                    echo $var;
                    $_SESSION['sent']="";
                }?>
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" value="<?php $var=$_SESSION['email']; echo"$var"?>" readonly ><br>
                <label for="date">Reserved for date:</label>
                <input type="date" name="date" id="date"  min="<?php $d=$date=date_create(date('Y-m-d')); date_sub($d,date_interval_create_from_date_string("0 days")); echo date_format($d,"Y-m-d"); ?>"><br>
                <label for="time">Reserved for Time:</label>
                <input type="time" name="time" id="time"> <br>
                <label for="position">Position:</label>
                <select name="position" id="position">
                    <option value="Outdoor">Outdoor</option>
                    <option value="Indoor">Indoor</option>
                    <option value="Roof top">Roof top</option>
                </select><br>
                <label for="table_type">Table Type:</label>
                <select name="table type" id="table_type">
                    <option value="Mysteria Table">Mysteria Table</option>
                    <option value="Dinner Table">Dinner Table</option>
                    <option value="Candle Table">Candle Table</option>
                    <option value="Family Table">Family Table</option>
                </select><br>
                <label for="parking">Car parking:</label><br>
                <input type="radio" id="parking" value="Yes" name="car_parking">Yes<br>
                <input type="radio" id="parking2" value="No" name="car_parking" checked>No<br>
                <label for="people">How many people?</label>
                <input type="number" name="people" id="people" placeholder= "Number of people" min=1 max=10><br>
                <label for="phone">phone:</label><br>
                <select name="phone code" id="phone">
                    <option value="+251">+251</option>
                    <option value="+12">+120</option>
                </select>
                <input type="tel" id="phone1" name="phone" placeholder="967882862"><br>
                <label for="card">Payment Type:</label>
                <select name="card_type" id="card">
                    <option value="visa card">visa card</option>
                    <option value="master card">master card</option>
                    <option value="credit card">credit card</option>
                    <option value="paypall">PayPall</option>
                </select><br>
                <label for="acc_number">account:</label>
                <input type="text" name="account number" id="acc_number"  placeholder="Enter account number" ><br>
                <input type="submit" value="Make Reservation" name="Treserve"><hr><br>
             
                You can also call:
                <ul>
                    <li> +251110000101</li>
                    <li> +251967882862, to make reservation</li>
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
            <p>You have reserved a table successfully,you will receive your table number via e-mail shortly.<br>THANK YOU FOR CHOOSING US.<br>
                Email Us at <a href="www.mysteriammtopr@gmail.com">mysteriammtopr@gmail.com</a> For more information.<br>
            </p>
            <button onclick="window.location.href='reservationnew.php#popup1';">Reserve again</button>
        </div>
    </div>
</section>
<?php
if(isset($_POST['termsbtn'])){
    $_SESSION['terms']=true;
}

if($_SESSION['terms']==false){
    $terms=<<< eol
    <section class="popup" id="popup1">
            <div class="popup_page1">
                <div class="popup_page-close">
                    <a href="../home/home.php" class="popup_page-close">&times;</a>
                </div>

                <div class="popup_page-content popup_res">
                    <h1>Table Reservation Terms and Conditions</h1><br><br>
                    <strong>PLEASE READ CAREFULLY!</strong><br><br>

                    <b><u>CONFIRMATION</u></b><br>
                    Any	booking	may	be 	to	leave	credit	or	debit	card	details	to	secure	the	booking. The	card
                    will	be	verified	for	the	amount	of	£20	per	person,	but	nothing	will be	charged	unless	the	late
                    cancellation	policy	is	breached.<br>
                    <b><u>CANCELLATION</u></b><br>
                    <ul>
                        <li>Bookings of up to 6 persons	may	be cancelled up	to 4pm on the day. For bottomless brunch on Saturday, until 6pm
                            the day before the booking.</li>
                        <li>Bookings of 7-10 persons and more may be cancelled up to 7 days	before	the	event.</li>
                        <li>Bookings of 11 + persons may be cancelled up to 2 weeks before	the	event.</li>
                        If	the	cancellation	policy	is	breached,	we	will	charge	the	card provided	to	secure	the	booking £20	per
                        every	person	on	the	booking.
                    </ul>
                    <p>
                        Any	changes	in	numbers	of	guests of up to	25%	of	the	original group size (in the	guest’s	favour) may
                        be	made	up	until	4pm	on	the	day	of	the	evening	booking	and	for	lunch,	up	to	11am	on	the	morning
                        of the booking. Failure to notify us of a reduction in numbers	by these cut off times will result in a £20 charge for
                        each no-show. If your	numbers	change	by	more than 25% we need notification in line with our cancellation policy
                        above, otherwise we	will need to charge	£20	for	each non-arrival</p>
                    <b><u>CHILDREN</u></b>
                    <p>We love children...but we also love a quiet dining room. If you do decide to bring your children, we ask that you
                        make sure they respect the other Guests. We are happy to prepare a simple child's meal.</p>
                    <b><u>ARRIVAL AND DEPARTURE</u></b>
                    <p>Please make sure	that your group	arrives	on	time. We may have bookings after yours, and require it back,
                        please ask on	arrival	if	you	would like an extension	and	we will do our best.</p>
                    <b><u>DRESS CODE</u></b>
                    <p>A comfortable place Many Guests ask us about a dress code: I can only ask to respect others Guests, especially for dinner, with a
                        correct one (no slippers, men's shorts...), and thank you for your delicate attention!</p>

                    <form  action="reservationnew.php" method="post">
                        <input type="checkbox" id="terms" value="conditions" required/><label for="terms">I have read and accepted terms and conditions. &nbsp;</label>
                        <input id="termsbtn" type="submit" name="termsbtn" value="Continue">
                    </form>
                    <br>

                </div>
            </div>
    </section>
eol;
echo $terms;
}

?>
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
