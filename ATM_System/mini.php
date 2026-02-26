<?php
session_start();
include "includes/connect.php";

if(!isset($_SESSION['account'])){
    header("Location: login.php");
    exit();
}

$account = $_SESSION['account'];

$sql = "SELECT * FROM transactions 
        WHERE account_no='$account' 
        ORDER BY date DESC 
        LIMIT 5";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mini Statement</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="card">
    <h2>Mini Statement</h2>

    <table style="width:100%; margin-top:15px; color:white;">
        <tr>
            <th>Type</th>
            <th>Amount</th>
            <th>Date</th>
        </tr>

        <?php while($row = $result->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $row['type']; ?></td>
            <td>₹ <?php echo $row['amount']; ?></td>
            <td><?php echo $row['date']; ?></td>
        </tr>
        <?php } ?>
    </table>

    <br>
    <a href="dashboard.php">
        <button>Back</button>
    </a>
</div>

</body>
</html>