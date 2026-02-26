<?php
session_start();
if(!isset($_SESSION['account'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>ATM Dashboard</title>

    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<div class="card">
<h2>ATM Dashboard</h2>

<div class="menu">

    <a href="balance.php" class="menu-item">
        <i class="fas fa-wallet"></i>
        <span>Check Balance</span>
    </a>

    <a href="deposit.php" class="menu-item">
        <i class="fas fa-money-bill-wave"></i>
        <span>Deposit Money</span>
    </a>

    <a href="withdraw.php" class="menu-item">
        <i class="fas fa-hand-holding-dollar"></i>
        <span>Withdraw Money</span>
    </a>

    <a href="mini.php" class="menu-item">
        <i class="fas fa-file-invoice"></i>
        <span>Mini Statement</span>
    </a>

    <a href="logout.php" class="menu-item logout">
        <i class="fas fa-right-from-bracket"></i>
        <span>Logout</span>
    </a>

</div>

</div>

</body>
</html>