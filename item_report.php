<?php
include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Reports</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .container {
        margin-top: 20px;
    }

    table {
        margin-bottom: 20px;
    }

    th,
    td {
        text-align: center;
    }
    </style>
</head>

<body>

    <div class="container">
        <h3 class="text-center">Item Report</h3>
        <?php
    $query = "SELECT DISTINCT item_name, item_category, item_subcategory, SUM(quantity) AS total_quantity 
              FROM item
              GROUP BY item_name, item_category, item_subcategory";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<div class='table-responsive'>
                <table class='table table-bordered table-striped'>
                    <thead class='thead-dark'>
                        <tr>
                            <th>Item Name</th>
                            <th>Item Category</th>
                            <th>Item Sub Category</th>
                            <th>Item Quantity</th>
                        </tr>
                    </thead>
                    <tbody>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['item_name']}</td>
                    <td>{$row['item_category']}</td>
                    <td>{$row['item_subcategory']}</td>
                    <td>{$row['total_quantity']}</td>
                </tr>";
        }
        echo "</tbody>
            </table>
        </div>";
    } else {
        echo "<p class='text-center'>No items found.</p>";
    }

    mysqli_close($connection);
    ?>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>