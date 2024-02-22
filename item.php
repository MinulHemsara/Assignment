<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
    </style>
</head>

<body>
    <h3 style="text-align: center; margin-top: 100px">Item Registration</h3>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <form action="add_item.php" method="post" class="bg-light p-4 rounded shadow-sm">
                    <div class="form-group">
                        <label for="item_code">Item Code:</label>
                        <input type="text" name="item_code" id="item_code" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="item_name">Item Name:</label>
                        <input type="text" name="item_name" id="item_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="item_category">Item Category:</label>
                        <select name="item_category" id="item_category" class="form-control">
                            <option>Select Category</option>
                            <?php
                            include('connection.php');
                            $query = "SELECT * FROM `item_category`";
                            $result = mysqli_query($connection, $query);
                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['id'] . "'>" . $row['category'] . "</option>";
                                }
                            } else {
                                echo "<option>Error fetching categories</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="item_sub_category">Item Sub Category:</label>
                        <select name="item_sub_category" id="item_sub_category" class="form-control">
                            <option>Select Sub Category</option>
                            <?php
                            include('connection.php');
                            $query = "SELECT * FROM `item_subcategory`";
                            $result = mysqli_query($connection, $query);
                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['id'] . "'>" . $row['sub_category'] . "</option>";
                                }
                            } else {
                                echo "<option>Error fetching sub categories</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="text" name="quantity" id="quantity" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="unit_price">Unit Price:</label>
                        <input type="text" name="unit_price" id="unit_price" class="form-control" required>
                    </div>
                    <input type="submit" value="Submit" class="btn btn-success btn-block">
                </form>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>