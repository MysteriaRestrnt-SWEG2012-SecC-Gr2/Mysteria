<?php 
include '../../shared/CheckLogin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cancel reservation</title>
    <link rel="stylesheet" href="../../css/event reserv.css">
    <link rel="stylesheet" href="../../css/headerNfooter.css">
    <link rel="stylesheet" href="../../css/popup.css">
    <script src="../../js/side nav.js"></script>
    <script src="../../js/validator.js"></script>
</head>
<body>
<?php include '../../shared/event_header.php';?>
<main>
    <div class="full-page">
        <div class="sub-page">
            <div class="row">
                <div class="column-1">
                    <div class="form-box">
                        <div class="form">
                            <div class="formheader">
                                <center>
                                    <h3 class="main-heading">Cancellation Form</h3>
                                </center><br>
                            </div>
                            <form id="form2" class="login-form" action="cancel.php" onsubmit="return eventValidateForm()" method="POST">
                                <div class="form-holder">
                                    <big><label for="CustName">Customer: <?php $var=$_SESSION['user']; echo"$var"?></label></big><br>
                                    <div class="form-control">
                                        <label for="date">Date:</label>
                                        <input type="date" name="date" id="date" class='input-field' min="<?php $d=$date=date_create(date('Y-m-d')); date_sub($d,date_interval_create_from_date_string("0 days")); echo date_format($d,"Y-m-d"); ?>">
                                        <i class="fas fa-check-circle"></i>
                                        <i class="fas fa-exclamation-circle"></i>
                                    </div>
                                    <div class="form-control">
                                        <label for="time">Time:</label>
                                        <input type="time" name="time" class='input-field' id="time">
                                        <i class="fas fa-check-circle"></i>
                                        <i class="fas fa-exclamation-circle"></i>
                                    </div>
                                    <div class="form-control">
                                               <label for="occasion">Occasions:</label><br>
                                               <select class='input-field' name="occasion" id="quantity">
                                                    <option   id="occasion1" value="Bridal Shower">Bridal Shower <br>
                                                    <option   id="occasion2" value="Wedding">Wedding <br>
                                                    <option   id="occasion3" value="Baby Shower">Baby Shower <br>
                                                    <option   id="occasion4" checked="checked" value="Birthday Party">Birthday Party <br>
                                                    <option   id="occasion5" value="Meeting">Meeting <br>
                                                    <option   id="occasion6" value="Charity Event ">Charity Event <br>
                                                    <option   id="occasion8" value="Holiday Parties">Holiday Parties<br>
                                                    <option   id="occasion7" value="Anniversary">Anniversary<br>
                                               </select>
                                               <i class="fas fa-check-circle"></i>
                                               <i class="fas fa-exclamation-circle"></i>
                                    </div>
                                    <div class="form-control">
                                    <div class="form-control">
                                            <label for="people">How many people?</label>
                                             <input type="number" name="people" id="people" class='input-field' placeholder= "Number of people" min=20 max=500><br>
                                            <i class="fas fa-check-circle"></i>
                                            <i class="fas fa-exclamation-circle"></i>
                                        </div>
                                        <div>
                                            <label for="phone1">Phone Number:</label>
                                            <br><small>Error message</small><br>
                                            <select name="phone code" id="phone1">
                                                <option value="+251" class='input-field'>+251</option>
                                                <option value="+12" class='input-field'>+120</option>
                                            </select>
                                            <input type="tel" id="phone2" name="phone" class='input-field' placeholder="967882862">
                                            <i class="fas fa-check-circle"></i>
                                            <i class="fas fa-exclamation-circle"></i>
                                        </div>
                                    </div>
                                    <input type='submit' class='submit-button' name="Treserve" value="Cancel reservation">
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <script>
        const form = document.getElementById('form2');
        const firstname = document.getElementById('Fname');
        const Lastname = document.getElementById('Lname');
        const email = document.getElementById('email');
        const phonenumber = document.getElementById('phone');

        form.addEventListener('submit', e => {
            e.preventDefault();
            checkInputs();

        });


        function checkInputs() {
            // trim to remove the whitespaces
            const firstnameValue = firstname.value.trim();
            const lastnameValue = Lastname.value.trim();
            const emailValue = email.value.trim();
            //const phoneValue = phonenumber.value.trim();

            var chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
            if (firstnameValue === '' && firstnameValue != chars) {
                setErrorFor(firstname, 'First name cannot be blank');
            } else {
                setSuccessFor(firstname);
            }
            if (lastnameValue === '') {
                setErrorFor(Lastname, 'Last name cannot be blank');
            } else {
                setSuccessFor(Lastname);
            }

            if (emailValue === '') {
                setErrorFor(email, 'Email cannot be blank');
            } else if (!isEmail(emailValue)) {
                setErrorFor(email, 'Not a valid email');
            } else {
                setSuccessFor(email);
            }
            /*
                                var phoneno = /^\d{9}$/;
                                if (phoneValue === '') {
                                    setErrorFor(phonenumber, 'Phone number cannot be blank');
                                } else if ((!phoneValue.match(phoneno))) {
                                    setErrorFor(phonenumber, 'match the requested format');
                                    return false;
                                } else {
                                    setSuccessFor(phonenumber);
                                }*/
        }

        function setErrorFor(input, message) {
            const formControl = input.parentElement;
            const small = formControl.querySelector('small');
            formControl.className = 'form-control error';
            small.innerText = message;
        }

        function setSuccessFor(input) {
            const formControl = input.parentElement;
            formControl.className = 'form-control success';
        }

        function isEmail(email) {
            return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
        }
    </script>-->
 <section>
        <div class="popup" id="popup4">
            <div class="feedback-body">
                <div class="feedback-container">
                    <div class="feedback-header">
                        <h2 class="feedback-h2">
                            Feedback Form
                        </h2>
                    </div>
                    <form class="feedback-form" id="form" >
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
                <button  onclick="window.location.href='../reservation/reservationnew.php#popup1';">Table Reservation Form</button>
                <button  onclick="window.location.href='reserve.php#popup1';">Event Reservation Form</button>
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
