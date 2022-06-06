<?php
include '../../shared/CheckLogin.php';
?>
<!DOCTYPE html>
<html>

<head>

    <meta name="charset" content="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Tsedey">
    <meta name="description" content="webpage for mysteria restaurant's delivery">
    <meta name="keywords" content="delivery,mysteria">
    <title>about us</title>
    <link rel="stylesheet" href="../../css/style-1.css">
    <link rel="stylesheet" href="../../css/popup.css">
    <script src="../../js/side nav.js"></script>
    <script src="../../js/validator.js"></script>
</head>

<body>
    <?php include '../../shared/header2.php'; ?>
    <section>
        <div class="row" id="sectionTopOrder">
            <div class="topTxt">
                <h1><span class="restaurant">who we are</span></h1>
                <p>...mysterious</p>
            </div>
        </div>
        <div class="note">
            <p>
                The Mysteria Restaurant has been doing business in addis
                ababa since 2010E.C. This restaurant is created by six most creative software engineers</a>.
                so as a software engineer our mission is keeps us focus,
                accountable and give a flexible system for the customer.
                main restaurant found in addis ababa bole behind morning
                star mall and it's branch found in bole
                snap plasa since 2013E.C.
            </p>

            <h2 align="center" id="logo"> Terms of Service and Privacy Policy </h2><br>
            <p> <b> Terms of Service</b> — you are welcome to use our services (which includes all of our products) at your own risk. However, there are a few rules to be followed: be polite, respect others, be responsible for your own actions, <a href="../review/contact.php">Contact Us</a> if there is any issue or concern. If you are under age of 13 or barred from accessing our Services, you may not access some of our Services. Most of what you will find through using or accessing our Services is readily available on the Internet for public use, but if you believe that content on the Services infringes your copyright, please contact us immediately.<br>
                <b>Privacy Policy </b>— you may be required to submit some of your personal information to gain access to our Services; all or part of information submitted by your direct or indirect access or use of service will be used to serve content on our Services along with personalized ads. We do not sell or disclose your personal information to any third party we are as well as doing everything possible to protect your personal data from unauthorized intruders. Should you have any concerns, please <a href="../review/contact.php">Contact Us</a> us immediately.

            </p>
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

                    <form class="feedback-form" id="form" method="POST" action="../../controller/AddFeedback.php">
                        <div class="feedback-form-control">
                            <lable class="feedback-lable">
                                <span class="feedback-span">Subject</span>
                            </lable>
                            <input type="text" class="feedback-input feedback-username" placeholder="Subject" id="username" name="subject">
                        </div>
                        <!--<div class="form-control">
                            <lable class="feedback-lable">
                                <span class="feedback-span">Email</span>
                            </lable><br>
                            <input type="email" class="feedback-input feedback-email" style="border-color: black; padding: 20px; width: 100%;" placeholder="email address" id="email" name="Email">
                            <br><br> -->
                        <div class="feedback-form-control">
                            <lable class="feedback-lable">
                                <span class="feedback-span">Feedback</span>
                            </lable><br>
                            <textarea class="feedback-input feedback-textarea" placeholder="Your Feedback Please" id="feedback" name="textareas"></textarea>
                        </div>
                            <?php if(isset($_SESSION['sentFeed'])){
                            $var=$_SESSION['sentFeed'];
                            echo $var;
                            $_SESSION['sentFeed']="";
                            }?>    
                        <input type="submit" name="submites" class="feedback-button" id="submit"   value="Submit Comment" onclick="checkInput()">
                       

                        <div class="popup_page-close">
                            <a href="#Feedback" class="popup_page-close"><img src="../../resources/images/close_button.png" alt="" class="popup_page-close-button"></a>
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
                <p style="font-size:16px; text-align:left; ">Copyright &copy; Mysteria 2021/22, all rights reserved </p>
            </div>
        </div>
    </footer>
</body>

</html>