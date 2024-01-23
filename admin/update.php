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

// Handle form submission for updating menu items
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $menuItemId = $_POST['menu_item_id'];
    $foodName = $_POST['food_name'];
    $price = $_POST['price'];
    $foodCategory = $_POST['food_category'];

    // Update the menu item in the database
    $query = "UPDATE foodmenu SET food_name = '$foodName', price = '$price', food_category = '$foodCategory' WHERE food_id = '$menuItemId'";
    $success = $connection->query($query);

    if ($success) {
        echo 'Menu item updated successfully.';
    } else {
        echo 'Error updating menu item: ' . $connection->error;
    }
}

?>
    <a href="AdminPage.php">Admin Home</a>
