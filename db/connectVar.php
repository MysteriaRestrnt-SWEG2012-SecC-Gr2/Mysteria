<?php
$connectVariable = mysqli_connect('localhost', 'root', '', 'mysteriadb');
 if ($connectVariable->connect_error) {
    die("Connection failed: " . $connectVariable->connect_error);
    }
?>