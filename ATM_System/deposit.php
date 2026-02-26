<?php
session_start();
include "includes/connect.php";

if(!isset($_SESSION['account'])){
    header("Location: login.php");
    exit();
}

$account = $_SESSION['account'];

if(isset($_POST['deposit'])){
    $amount = $_POST['amount'];

    if($amount > 0){
        $sql = "UPDATE users 
                SET balance = balance + $amount 
                WHERE account_no='$account'";
        $conn->query($sql);
        
        // Insert transaction record
        $conn->query("INSERT INTO transactions (account_no, type, amount) 
              VALUES ('$account', 'Deposit', '$amount')");

        $success = "₹ $amount Deposited Successfully!";
    } else {
        $error = "Enter valid amount!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Deposit Money</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="card">
    <h2>Deposit Money</h2>

    <?php if(isset($success)) echo "<p class='success-msg'>$success</p>"; ?>
    <?php if(isset($error)) echo "<p class='error-msg'>$error</p>"; ?>

    <form method="POST">

        <div class="input-box">
            <input type="number" name="amount" placeholder="Enter Amount" required>
        </div>

        <button type="submit" name="deposit" class="primary-btn">
            Deposit Amount
        </button>

    </form>

    <div class="back-area">
        <a href="dashboard.php" class="back-btn">
            ← Back to Dashboard
        </a>
    </div>

</div>

</body>
</html>