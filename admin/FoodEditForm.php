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
    <title>Edit Food</title>
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
        <div class="container" style="background-image: url(../../resources/images/foodAdd2.jpg); background-repeat: no-repeat; background-position: right top;height: 1000px; opacity: 0.8;">
            <form action="UpdateFoodConnector.php" method="POST" class="foodAdd" enctype="multipart/form-data">
                <h2 class="title">Edit Food</h2>
                <h3 style="color: rgb(40, 90, 88)">Please fill the form below</h3>

                <?php
                // Retrieve the food item details from the database based on the provided FoodID
                // Replace $foodID with the actual ID of the menu item you want to edit
                $foodID = $_GET['foodID']; // Assuming the FoodID is passed via URL parameter

                // Perform the database query to retrieve the food item details
                // Replace the query with your own database query to retrieve the food item details
                $query = "SELECT * FROM menu WHERE FoodID = $foodID";
                // Execute the query and fetch the result
                // Replace $result with the actual variable that holds the query result
                $result = mysqli_query($connection, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    $foodItem = mysqli_fetch_assoc($result);
                    ?>

                    <div class="row">
                        <label class="labels" for="FoodName">Food Name</label>
                        <div class="inputs">
                            <i class="fas fa-user"></i>
                            <div class="in">
                                <input type="text" placeholder="FoodName" name="FoodName" value="<?php echo $foodItem['FoodName']; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="labels" for="FoodCategory">Food Category</label>
                        <div class="inputs">
                            <i class="fas fa-envelope"></i>
                            <select name="FoodCategory">
                                <option value="Appetizer" <?php if ($foodItem['FoodCategory'] == 'Appetizer') echo 'selected'; ?>>Appetizer</option>
                                <option value="Vegetarian" <?php if ($foodItem['FoodCategory'] == 'Vegetarian') echo 'selected'; ?>>Vegetarian</option>
                                <option value="Meataterian" <?php if ($foodItem['FoodCategory'] == 'Meataterian') echo 'selected'; ?>>Meataterian</option>
                                <option value="Dessert" <?php if ($foodItem['FoodCategory'] == 'Dessert') echo 'selected'; ?>>Dessert</option>
                                <option value="Drink" <?php if ($foodItem['FoodCategory'] == 'Drink') echo 'selected'; ?>>Drink</option>
                                <option value="Special" <?php if ($foodItem['FoodCategory'] == 'Special') echo 'selected'; ?>>Special</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <label class="labels" for="Ingredients">Main Ingredients</label>
                        <div class="inputs">
                            <i class="fas fa-lock"></i>
                            <div class="in">
                                <input type="text" class="in" placeholder="Please separate ingredients by comma" name="Ingredients" value="<?php echo $foodItem['Ingredients']; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="labels" for="Price">Price</label>
                        <div class="inputs">
                            <i class="fas fa-user"></i>
                            <div class="in">
                                <input type="number" class="in" placeholder="Price (in Birr)" name="Price" min="1" value="<?php echo $foodItem['Price']; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="labels" for="Image">Food Image</label>
                        <div class="inputs">
                            <i class="fas fa-lock"></i>
                            <input type="file" name="Image">
                            <img src="../../resources/images/<?php echo $foodItem['Image']; ?>" alt="Food Image" class="food-image">
                        </div>
                    </div>

                    <input type="hidden" name="FoodID" value="<?php echo $foodID; ?>">

                    <div class="row">
                        <input type="submit" name="submit" value="Edit" class="btn">
                    </div>
                <?php
                } else {
                    echo "Food item not found.";
                }
                ?>

            </form>
        </div>
    </section>

    <footer class="footer">
        <div id="btm" class="feedback col-3">
            <address>
                    call: +251110000101<br> +251967882862
                </address>
            <p style="font-size:16px; text-align:center; ">Copyright &copy; Mysteria 2021/22, all rights reserved </p>
        </div>
    </footer>
</body>

</html>