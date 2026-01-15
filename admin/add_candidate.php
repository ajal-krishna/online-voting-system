<?php
session_start();
include "../db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
}

if (isset($_POST['add_candidate'])) {
    $name = $_POST['name'];

    // Image upload
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    if ($image_name != "") {
        move_uploaded_file($image_tmp, "../uploads/" . $image_name);
    }

    $query = "INSERT INTO candidates (name, image) VALUES ('$name', '$image_name')";
    mysqli_query($conn, $query);

    $msg = "Candidate Added Successfully";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Candidate</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">

<h2>Add Candidate</h2>

<?php 
if (isset($msg)) {
    echo "<p class='success'>$msg</p>";
}
?>

<form method="post" enctype="multipart/form-data">

    <label>Candidate Name</label>
    <input type="text" name="name" required>

    <label>Candidate Image</label>
    <input type="file" name="image" required>

    <button type="submit" name="add_candidate">Add Candidate</button>
</form>

<br>
<a href="dashboard.php">← Back to Dashboard</a>

</div>

</body>
</html>
