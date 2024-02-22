<?php
include('connection.php');

$start_date = $_GET['start_date'];
$end_date = $_GET['end_date'];

$query = "SELECT i.invoice_no, i.date, c.first_name, itm.item_code, itm.item_name, ic.category, itm.unit_price 
FROM invoice_master ima 
INNER JOIN invoice i ON ima.invoice_no = i.invoice_no 
JOIN customer c ON i.customer=c.id
INNER JOIN item itm ON ima.item_id = itm.id
JOIN item_category ic ON itm.item_category = ic.id 
WHERE i.date BETWEEN '$start_date' AND '$end_date' 
ORDER BY i.date ASC";

$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Report</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    /* Custom CSS for table */
    .container {
        padding: 20px;
    }
    </style>
</head>

<body>

    <div class="container">
        <h1 class="text-center my-4">Invoice Item Report</h1>
        <?php if ($result && mysqli_num_rows($result) > 0): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Invoice Number</th>
                        <th>Invoiced Date</th>
                        <th>Customer Name</th>
                        <th>Item Name</th>
                        <th>Item Code</th>
                        <th>Item Category</th>
                        <th>Item Unit Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['invoice_no']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['item_name']; ?></td>
                        <td><?php echo $row['item_code']; ?></td>
                        <td><?php echo $row['category']; ?></td>
                        <td><?php echo $row['unit_price']; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
        <p>No invoice items found within the selected date range.</p>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php mysqli_close($connection); ?>