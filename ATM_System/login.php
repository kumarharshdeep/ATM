<?php
session_start();
include "includes/connect.php";

if(isset($_POST['login'])){
    $acc = $_POST['account'];
    $pin = $_POST['pin'];

    $sql = "SELECT * FROM users WHERE account_no='$acc' AND pin='$pin'";
    $result = $conn->query($sql);

    if($result->num_rows == 1){
        $_SESSION['account'] = $acc;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid Credentials!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Secure ATM Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="card">

    <h2>Secure ATM Login</h2>

    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>

    <form method="POST">

        <div class="input-box">
            <input type="text" name="account" placeholder="Account Number" required>
        </div>

        <div class="input-box">
            <input type="password" name="pin" placeholder="PIN" required>
        </div>

        <button type="submit" name="login">Login to Account</button>

    </form>

    <div style="margin-top:25px;">
        New User? <a href="register.php">Create Account</a>
    </div>

</div>

</body>
</html>