<?php
session_start();
include "db.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check admin
    $admin = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
    if (mysqli_num_rows($admin) == 1) {
        $_SESSION['admin'] = $username;
        header("Location: admin/dashboard.php");
        exit();
    }

    // Check voter
    $voter = mysqli_query($conn, "SELECT * FROM voters WHERE voter_id='$username' AND password='$password'");
    if (mysqli_num_rows($voter) == 1) {
        $_SESSION['voter'] = $username;
        header("Location: voter/dashboard.php");
        exit();
    }

    $error = "Invalid Login Details";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Online Voting System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="login-page">

    <div class="login-box">

        <h2>Online Voting System</h2>
        <p class="login-subtitle">Admin / Voter Login</p>

        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>

        <form method="post" autocomplete="off">
            <input type="text" name="username" placeholder="User ID" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
        </form>

    </div>

</div>

</body>
</html>
