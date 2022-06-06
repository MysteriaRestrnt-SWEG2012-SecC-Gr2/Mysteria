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
    <link rel="stylesheet" href="../../css/popup.css">
    <title>Contact us </title>
    <script src="../../js/side nav.js"></script>
    <script src="../../js/validator.js"></script>
    <style>

.info{
margin-left:17%;
overflow:hidden;
border-radius:20px;
padding:10px;
background-color:rgba(0,0,0,0.7);
font-family:courier new;
font-size:1em;
color:#ffb03b;
line-height:2;
}
.info h2{
text-align:center;
font-size:2em;
font-family: cambria heading;
color:#ffb03b;
background-color:rgba(1,1,1,0.9);
border-radius:20px;
}
#sectionTop,#sectionTopOrder,#sectionTopContact{
padding:0;
margin-left:0;
opacity:.95;
background-size:100% 100%;
background-repeat:no-repeat;
height:800px;
margin-bottom:2%;
margin-top:5%;
clip-path:polygon(0 0,100% 0,100% 85%, 50% 100%,0 85%);
}
section div.form input[type=submit], input[type=button]{
border:groove 3px;
margin:2% 25%;
width:50%;
align:center;
background-color:rgb(1,1,1);
border-radius:20px;
color:#ffb03b;
}
popup_res{
      text-transform: none;
}
popup_res u, h1{
  text-transform: uppercase;
  font-family: sans-serif;
	color:white;
}
.note{
padding-top:5%;
padding-left:25%;
padding-bottom:0%;
padding-right:25%;
height:800px;
background-color:rgba(5,5,5,0.38);
}
#sectionTopContact{
background-image:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url("../../resources/images/contact.jpg");
}
</style>
</head>
<body>
<?php include '../../shared/header2.php';?>
<section>
    <div class="row" id="sectionTopContact">
        <div class="topTxt">
            <h1><span class="restaurant">Mysteria restaurant</span> contact information</h1>
            <p>...keep in touch</p>
        </div>
    </div>
    <div class="row">
        <div class="info col-8">
<!--            <h4 align="center" style="background-color: red" style="color: brown" ></h4>-->
                <div  id=" mapss">
                    <p> contact information </p>
                    <p><strong> Mail us:</strong><a href="mailto: mysteriammtopr@gmail.com" > mysteriammtopr@gmail.com</a></p>
                     <br> phone number: 0962828265<br>
                    <address> <b>address  :</b>  addis ababa bole mornning star mall <br> addis ababa bole at snap plasa <br>  </address>

                    <div>
                        <h2> Opening hours </h2>
                        <table style="border-collapse:collapse;" border="1" width="100%">
                            <tr>
                                <th></th>
                                <th> Sunday </th>
                                <th> Monday </th>
                                <th> Tuesday </th>
                                <th> Wednesday </th>
                                <th> Thursday </th>
                                <th> Friday </th>
                                <th> Saturday  </th>
                                <th> Delivery </th>
                            </tr>
                            <tr>
                                <td width="10%">Open</td>
                                <td width="10%">12:00 am</td>
                                <td width="10%">12:00 am</td>
                                <td width="10%">12:00 am</td>
                                <td width="10%">12:00 am</td>
                                <td width="10%">12:00 am</td>
                                <td width="10%">12:00 am</td>
                                <td width="10%">12:00 am</td>
                                <td width="10%">12:00 am</td>
                            </tr>
                            <tr>
                                <td width="10%">Close</td>
                                <td width="10%">6:00 pm</td>
                                <td width="10%">6:00 pm</td>
                                <td width="10%">6:00 pm</td>
                                <td width="10%">6:00 pm</td>
                                <td width="10%">6:00 pm</td>
                                <td width="10%">6:00 pm</td>
                                <td width="10%">6:00 pm</td>
                                <td width="10%">2:00 pm</td>
                            </tr>
                        </table><br>

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
                        <form class="feedback-form" id="form" method="POST" action="feed.php">
                            <div class="feedback-form-control">
                                <lable class="feedback-lable">
                                    <span class="feedback-span">User Name</span>
                                </lable>
                                <input type="text" class="feedback-input feedback-username" placeholder="UserName"
                                    id="username" name="UserName">
                            </div>
                            <div class="form-control">
                                <lable class="feedback-lable">
                                    <span class="feedback-span">Email</span>
                                </lable><br>
                                <input type="email" class="feedback-input feedback-email"
                                    style="border-color: black; padding: 20px; width: 100%;" placeholder="email address"
                                    id="email" name="Email">
                                <br><br>
                                <div class="feedback-form-control">
                                    <lable class="feedback-lable">
                                        <span class="feedback-span">Feedback</span>
                                    </lable><br>
                                    <textarea class="feedback-input feedback-textarea" placeholder="Your Feedback Please"
                                        id="feedback" name="textareas"></textarea>
                                </div>
                                <input type="submit" name="submites" class="feedback-button" id="submit" onclick="checkInput()">
                                    Submit
                               
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
