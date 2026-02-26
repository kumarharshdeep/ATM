<?php
session_start();
include "includes/connect.php";

if(!isset($_SESSION['account'])){
    header("Location: login.php");
    exit();
}

$account = $_SESSION['account'];

if(isset($_POST['withdraw'])){
    $amount = $_POST['amount'];

    // Current balance fetch karo
    $sql = "SELECT balance FROM users WHERE account_no='$account'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $current_balance = $row['balance'];

    if($amount > 0){
        if($amount <= $current_balance){
            
            $update = "UPDATE users 
                       SET balance = balance - $amount 
                       WHERE account_no='$account'";
            $conn->query($update);
            // Insert transaction record
            $conn->query("INSERT INTO transactions (account_no, type, amount) 
              VALUES ('$account', 'Withdraw', '$amount')"); 

            $success = "₹ $amount Withdrawn Successfully!";
        } else {
            $error = "Insufficient Balance!";
        }
    } else {
        $error = "Enter valid amount!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Withdraw Money</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="card">
    <h2>Withdraw Money</h2>

    <?php if(isset($success)) echo "<p class='success-msg'>$success</p>"; ?>
    <?php if(isset($error)) echo "<p class='error-msg'>$error</p>"; ?>

    <form method="POST">

        <div class="input-box">
            <input type="number" name="amount" placeholder="Enter Amount" required>
        </div>

        <button type="submit" name="withdraw" class="danger-btn">
            Withdraw Amount
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