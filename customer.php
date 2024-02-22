<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
    </style>
</head>

<body>
    <h3 style="text-align: center; margin-top: 100px">Customer Registration</h3>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <form action="add_customer.php" method="post" class="bg-white p-4 rounded shadow-sm">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <select name="title" id="title" class="form-control">
                            <option value="Mr">Mr</option>
                            <option value="Mrs">Mrs</option>
                            <option value="Miss">Miss</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="first_name">First Name:</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name:</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="contact_number">Contact Number:</label>
                        <input type="text" name="contact_number" id="contact_number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="district">District:</label>
                        <select name="district" id="district" class="form-control">
                            <option>Select District</option>
                            <?php
                            include('connection.php');
                            $query = "SELECT * FROM `district`";
                            $result = mysqli_query($connection, $query);
                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['id'] . "'>" . $row['district'] . "</option>";
                                }
                            } else {
                                echo "<option>Error fetching districts</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <input type="submit" value="Submit" class="btn btn-primary btn-block">
                </form>
            </div>
        </div>
    </div>

    <!-- Link Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>