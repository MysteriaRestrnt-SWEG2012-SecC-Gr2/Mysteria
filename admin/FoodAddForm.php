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
    <link rel="stylesheet" type="text/css" href="../css/FoodAddStyle.css">
    <script src="../../js/side nav.js"></script>
    <script src="../../js/validator.js"></script>
</head>

<body>
<header class="header">
        <div class="headerNav" style="margin-left: 5%;">
            <a href="AdminPage.php" >Home</a>
            <a href="../public/home/home.php">Mysteria site</a>
            <a href="../public/import.php">Import</a>
            <a href="adminAddForm.php">Add admin</a>
            <a href="chart.php">Report</a>
            <a href="FoodAddForm.php">Add Menu</a>
            <a href="../shared/logout.php">Log Out </a>
            <form id="srchform" role="search">
                <input type="search" id="query" name="q" placeholder="Search" aria-label="search through site content">
                <button id="srchbtn" type="submit"><img id="srchimg" src="../resources/images/searchwhite.png"></button>
            </form>
        </div>
        <div>
            <label>
            </label>
        </div>
    </header> 
    <section>
        <div class="container" style="background-image: url(../../resources/images/foodAdd2.jpg); background-repeat: no-repeat; 
            background-position: right top;height: 1000px; opacity: 0.8;">
            <form action="NewfoodConnector.php" method="POST" class="foodAdd" enctype="multipart/form-data">
                <h2 class="title">Add Food</h2>
                <h3 style="color: rgb(40, 90, 88)">Please fill the form below</h3>
                <div class="row">
                    <label class="labels" for="FoodName"> Food Name</label>
                    <div class="inputs">
                        <i class="fas fa-user"></i>
                        <div class="in">
                            <input type="text"  placeholder="FoodName" name="FoodName">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="labels"  for="FoodCategory"> Food Category</label>
                    <div class="inputs">
                        <i class="fas fa-envelope"></i>
                        <select name="FoodCategory">
                                <option value="Appetizer" selected>Appetizer</option>
                                <option value="Vegetarian">Vegetarian</option>
                                <option value="Meataterian">Meataterian</option>
                                <option value="Dessert">Dessert</option>
                                <option value="Drink">Drinks</option>
                                <option value="Special">Special</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label  class="labels" for="Ingredients"> Main Ingredients</label>
                    <div class="inputs">
                        <i class="fas fa-lock"></i>
                        <div class="in">
                        <input type="text"  class="in" placeholder="please separate ingerdients by comma" name="Ingredients">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="labels"  for="Price"> Price </label>
                    <div class="inputs">
                        <i class="fas fa-user"></i>
                        <div class="in">
                        <input type="number" class="in" placeholder="Price(in Birr)" name="Price" min="1">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label  class="labels"for="Foodimage"> Select Food Image</label>
                    <div style="margin-top: 1%; margin-left: 60%; color: rgb(52, 90, 88);">
                        <i class="fas fa-user"></i>
                        <input type="file" class="in" placeholder="ItemImage" name="ItemImage" accept="image/*">
                    </div>
                </div>
                <input type="submit" name="submit" value="submit" class="btn">

            </form>
            <div class="verticalText">Mysteria New Food/Drink on the Menu</div>
    </section>

</body>
<footer class="footer">
    <div id="btm" class="feedback col-3">
        <address>
                call: +251110000101<br> +251967882862
            </address>
        <p style="font-size:16px; text-align:center; ">Copyright &copy; Mysteria 2021/22, all rights reserved </p>
    </div>
</footer>

</html>