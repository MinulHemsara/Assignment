<?php
include('connection.php');

$title = $_POST['title'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$contact_number = $_POST['contact_number'];
$district = $_POST['district'];

$query = "INSERT INTO customer (title, first_name, last_name, contact_no, district) 
          VALUES ('$title', '$first_name', '$last_name', '$contact_number', '$district')";
$result = mysqli_query($connection, $query);

if ($result) {
    echo "Customer registered successfully.";
} else {
    echo "Error: " . mysqli_error($connection);
}

mysqli_close($connection);
?>
