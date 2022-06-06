<?php 
include '../shared/CheckAdminLogin.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="charset" content="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Meron E.">
    <meta name="description" content="webpage for mysteria restaurant's delivery">
    <meta name="keywords" content="delivery,mysteria">
    <title>Mysteria Appetizer Menu</title>
    <link rel="stylesheet" type="text/css" href="../css/MenuStyle.css">
    <link rel="stylesheet" type="text/css" href="../css/popup.css">
    <link rel="stylesheet" type="text/css" href="../css/adminAddStyle.css">
    <!-- <link rel="stylesheet" type="text/css" href="../css/stylesignup.css"> -->
    <script src="../../js/side nav.js"></script>
    <script src="../../js/validator.js"></script>
</head>

<body>
    <section>
        <div class="container" style="background-image: url(../../resources/images/foodAdd2.jpg); background-repeat: no-repeat; 
            background-position: right top;height: 1000px; opacity: 0.8;">
            <form action="addAdmin.php" method="POST" class="foodAdd" enctype="multipart/form-data">
                <h2 class="title">Add Food</h2>
                <h3>Please fill the form below</h3>
                <div class="row">
                    <div class="inputs">
                        <i class="fas fa-user"></i>
                        <input type="Username" placeholder="Username" name="Username" required>
                    </div> 
                </div>
                <div class="row">
                    <div class="inputs">
                        <i class="fas fa-envelope"></i>
                        <input type="Email" placeholder="Email" name="Email" required>
                    </div>
                </div>
                <div class="row">
                    <div class="inputs">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="Password" required>
                    </div>
                </div>
                <div class="row">
                    <div class="inputs">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Confirm Password" name="Password2" required >
                    <span id="message"></span>
                    </div>
                </div>
                <div class="row">
                    <input type="submit" name="addAdmin" value="add admin" class="btn">
                </div>
            </form>
            <div class="verticalText">Mysteria New Food/Drink on the Menu</div>
    </section>

</body>
<footer>

</footer>

</html>