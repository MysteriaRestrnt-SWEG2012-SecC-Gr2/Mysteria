
<html>
<head>
    <meta name="charset" content="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <meta name="author" content="">
    <meta name="description" content="webpage for mysteria restaurant's Admin Page">
    <meta name="keywords" content="admin,mysteria">
    <title>Admin page</title>
    <script src="../Js/side nav.js"></script>
    <script src="../Js/validator.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/AdminStyle.css">
    <link rel="stylesheet" type="text/css" href="../css/reportstyle.css"> 

</head>

<?php
session_start();



// Connect to the database
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'mysteriadb';

$connection = new mysqli($host, $username, $password, $database);

// Check if the connection is successful
if ($connection->connect_error) {
    die('Connection failed: ' . $connection->connect_error);
}

// Retrieve the current food menu
$query = 'SELECT * FROM foodmenu';
$result = $connection->query($query);

// Handle form submission for updating menu items
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $menuItemId = $_POST['menu_item_id'];
    $foodName = $_POST['foodname'];
    $price = $_POST['price'];
    $food_category = $_POST['food_category'];

    // ... Retrieve other form fields as needed

    // Update the menu item in the database
    $query = "UPDATE foodmenu SET food_name = '$foodName', price = '$price', food_category = '$food_category' WHERE id = '$menuItemId'";
    $success = $connection->query($query);

    if ($success) {
        echo 'Menu item updated successfully.';
    } else {
        echo 'Error updating menu item: ' . $connection->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
</head>
<body>
    <h1>Admin Page</h1>

    <h2>Food Menu</h2>
    
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div>';
            echo '<form action="update.php" method="POST">';
            echo '<input type="hidden" name="menu_item_id" value="' . $row['food_id'] . '">';
            echo '<input type="text" name="food_name" value="' . $row['food_name'] . '">';
            echo '<input type="text" name="price" value="' . $row['price'] . '">';
            echo '<input type="text" name="food_category" value="' . $row['food_category'] . '">';

            // ... Add more fields as needed
            echo '<button type="submit">Update</button>';
            echo '</form>';
            echo '</div>';
        }
    } else {
        echo 'No menu items found.';
    }
    ?>

</body>
</html>