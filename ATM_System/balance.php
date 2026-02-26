<?php
session_start();
include "includes/connect.php";

if(!isset($_SESSION['account'])){
    header("Location: login.php");
    exit();
}

$account = $_SESSION['account'];

$sql = "SELECT balance FROM users WHERE account_no='$account'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Check Balance</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="card">
    <h2>Account Balance</h2>

    <h3 style="margin:20px 0; font-size:28px;">
        ₹ <?php echo $row['balance']; ?>
    </h3>

    <a href="dashboard.php">
        <button>Back to Dashboard</button>
    </a>
</div>

</body>
</html>