<?php
session_start();
include "../db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
}

// Start voting
if (isset($_POST['start'])) {
    mysqli_query($conn, "UPDATE settings SET voting_status=1 WHERE id=1");
}

// Stop voting
if (isset($_POST['stop'])) {
    mysqli_query($conn, "UPDATE settings SET voting_status=0 WHERE id=1");
}

// Get current status
$result = mysqli_query($conn, "SELECT voting_status FROM settings WHERE id=1");
$row = mysqli_fetch_assoc($result);
$status = $row['voting_status'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Voting Control</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">

<h2>Voting Control</h2>

<p style="text-align:center; font-size:18px;">
Current Voting Status:
<strong>
<?php echo ($status == 1) ? "ON" : "OFF"; ?>
</strong>
</p>

<form method="post" style="text-align:center;">
    <button type="submit" name="start">Start Voting</button>
    <button type="submit" name="stop" style="background:#dc3545;">Stop Voting</button>
</form>

<br>
<a href="dashboard.php">← Back to Dashboard</a>

</div>

</body>
</html>
