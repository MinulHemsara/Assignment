<?php
include('connection.php');

if (isset($_GET['start_date']) && isset($_GET['end_date'])) {

    $start_date = mysqli_real_escape_string($connection, $_GET['start_date']);
    $end_date = mysqli_real_escape_string($connection, $_GET['end_date']);


    if ($connection) {
        $query = "SELECT i.invoice_no, i.date, CONCAT(c.title, ' ', c.first_name, ' ', c.middle_name, ' ', c.last_name) AS customer_name,
                    c.district AS customer_district, i.item_count, i.amount
                    FROM invoice i
                    INNER JOIN customer c ON i.customer = c.id
                    WHERE i.date BETWEEN '$start_date' AND '$end_date'
                    ORDER BY i.date ASC";

        $result = mysqli_query($connection, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            echo "<div class='container mt-4'>
            <h1 class='text-center my-4'>Invoice Report</h1>
                    <div class='table-responsive'>
                        <table class='table table-bordered table-striped'>
                            <thead class='thead-dark'>
                                <tr>
                                    <th scope='col'>Invoice Number</th>
                                    <th scope='col'>Date</th>
                                    <th scope='col'>Customer</th>
                                    <th scope='col'>Customer District</th>
                                    <th scope='col'>Item Count</th>
                                    <th scope='col'>Invoice Amount</th>
                                </tr>
                            </thead>
                            <tbody>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['invoice_no']}</td>
                        <td>{$row['date']}</td>
                        <td>{$row['customer_name']}</td>
                        <td>{$row['customer_district']}</td>
                        <td>{$row['item_count']}</td>
                        <td>{$row['amount']}</td>
                    </tr>";
            }
            echo "</tbody>
                </table>
            </div>
        </div>";
        } else {
            echo "<div class='container mt-4'>
                    <p class='text-center'>No invoices found within the selected date range.</p>
                </div>";
        }
    } else {
        echo "<div class='container mt-4'>
                <p class='text-center'>Database connection error.</p>
            </div>";
    }
} else {
    echo "<div class='container mt-4'>
            <p class='text-center'>Please provide start date and end date.</p>
        </div>";
}

// Close connection
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Report</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>