<?php
session_start();
include "../db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
}

if (isset($_POST['add_voter'])) {
    $voter_id = $_POST['voter_id'];
    $name = $_POST['name'];
    $password = $_POST['password'];

    $query = "INSERT INTO voters (voter_id, name, password) 
              VALUES ('$voter_id', '$name', '$password')";
    mysqli_query($conn, $query);
    $msg = "Voter Added Successfully";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Voter</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">

<h2>Add Voter</h2>

<?php 
if (isset($msg)) {
    echo "<p class='success'>$msg</p>";
}
?>

<form method="post">
    <label>Voter ID</label>
    <input type="text" name="voter_id" required>

    <label>Voter Name</label>
    <input type="text" name="name" required>

    <label>Password</label>
    <input type="password" name="password" required>

    <button type="submit" name="add_voter">Add Voter</button>
</form>

<br>
<a href="dashboard.php">← Back to Dashboard</a>

</div>

</body>
</html>
