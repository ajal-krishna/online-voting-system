<?php
session_start();
include "../db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
}

$result = mysqli_query($conn, "SELECT name, votes FROM candidates");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Election Results</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">

<h2>Election Results</h2>

<table>
    <tr>
        <th>Candidate Name</th>
        <th>Total Votes</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['votes']; ?></td>
        </tr>
    <?php } ?>
</table>

<br>
<a href="dashboard.php">← Back to Dashboard</a>

</div>

</body>
</html>
