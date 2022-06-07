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
    <link rel="stylesheet" type="text/css" href="../css/FoodAddStyle.css">
    <script src="../../js/side nav.js"></script>
    <script src="../../js/validator.js"></script>
</head>

<body>
    <section>
        <div class="container" style="background-image: url(../../resources/images/foodAdd2.jpg); background-repeat: no-repeat; 
            background-position: right top;height: 1000px; opacity: 0.8;">
            <form action="NewfoodConnector.php" method="POST" class="foodAdd" enctype="multipart/form-data">
                <h2 class="title">Add Food</h2>
                <h3>Please fill the form below</h3>
                <div class="row">
                    <label for="FoodName"> Food Name</label>
                    <div class="inputs">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="FoodName" name="FoodName">
                    </div>
                </div>
                <div class="row">
                    <label for="FoodCategory"> Food Category</label>
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
                    <label for="Ingredients"> Main Ingredients</label>
                    <div class="inputs">
                        <i class="fas fa-lock"></i>
                        <input type="text" placeholder="please separate ingerdients by comma" name="Ingredients">
                    </div>
                </div>
                <div class="row">
                    <label for="Price"> Price </label>
                    <div class="inputs">
                        <i class="fas fa-user"></i>
                        <input type="number" placeholder="Price(in Birr)" name="Price" min="1">
                    </div>
                </div>
                <div class="row">
                    <label for="Foodimage"> Select Food Image</label>
                    <div class="inputs">
                        <i class="fas fa-user"></i>
                        <input type="file" placeholder="ItemImage" name="ItemImage" accept="image/*">
                    </div>
                </div>
                <input type="submit" name="submit" value="submit" class="btn">

            </form>
            <div class="verticalText">Mysteria New Food/Drink on the Menu</div>
    </section>

</body>
<footer>

</footer>

</html>