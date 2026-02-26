<?php
include "includes/connect.php";

if(isset($_POST['register'])){
    $account = $_POST['account'];
    $pin = $_POST['pin'];
    $balance = $_POST['balance'];

    // Check if account already exists
    $check = $conn->query("SELECT * FROM users WHERE account_no='$account'");

    if($check->num_rows > 0){
        $error = "Account already exists!";
    } else {
        $sql = "INSERT INTO users (account_no, pin, balance) 
                VALUES ('$account', '$pin', '$balance')";
        $conn->query($sql);
        $success = "Account Created Successfully! You can login now.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Account</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="card">
    <h2>Create New Account</h2>

    <?php if(isset($success)) echo "<p class='success-msg'>$success</p>"; ?>
    <?php if(isset($error)) echo "<p class='error-msg'>$error</p>"; ?>

    <form method="POST">

        <div class="input-box">
            <input type="text" name="account" placeholder="Enter Account Number" required>
        </div>

        <div class="input-box">
            <input type="password" name="pin" placeholder="Create PIN" required>
        </div>

        <div class="input-box">
            <input type="number" name="balance" placeholder="Initial Balance" required>
        </div>

        <button type="submit" name="register" class="primary-btn">
            Create Account
        </button>

    </form>

    <div class="back-area">
        <a href="login.php" class="back-btn">
            ← Back to Login
        </a>
    </div>

</div>

</body>
</html>