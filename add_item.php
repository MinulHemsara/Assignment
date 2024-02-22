<?php
include('connection.php');

// Retrieve form data
$item_code = $_POST['item_code'];
$item_name = $_POST['item_name'];
$item_category = $_POST['item_category'];
$item_sub_category = $_POST['item_sub_category'];
$quantity = $_POST['quantity'];
$unit_price = $_POST['unit_price'];

$query = "INSERT INTO item (item_code, item_name, item_category, item_subcategory, quantity, unit_price)
          VALUES ('$item_code', '$item_name', '$item_category', '$item_sub_category', '$quantity', '$unit_price')";
$result = mysqli_query($connection, $query);

if ($result) {
    echo "Item registered successfully.";
} else {
    echo "Error: " . mysqli_error($connection);
}

mysqli_close($connection);
?>