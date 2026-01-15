<?php
session_start();
include "../db.php";

if (!isset($_SESSION['voter'])) {
    header("Location: ../login.php");
}

$voter_id = $_SESSION['voter'];

// Check voting status
$statusQuery = mysqli_query($conn, "SELECT voting_status FROM settings WHERE id=1");
$statusRow = mysqli_fetch_assoc($statusQuery);

if ($statusRow['voting_status'] == 0) {
    die("Voting is currently OFF. Please come back later.");
}

// Check if voter already voted
$checkVote = mysqli_query($conn, "SELECT has_voted FROM voters WHERE voter_id='$voter_id'");
$voteRow = mysqli_fetch_assoc($checkVote);

if ($voteRow['has_voted'] == 1) {
    die("You have already voted. Thank you!");
}

// Submit vote
if (isset($_POST['vote'])) {
    $candidate_id = $_POST['candidate'];

    mysqli_query($conn, "INSERT INTO votes (voter_id, candidate_id) VALUES ('$voter_id', '$candidate_id')");
    mysqli_query($conn, "UPDATE candidates SET votes = votes + 1 WHERE id='$candidate_id'");
    mysqli_query($conn, "UPDATE voters SET has_voted=1 WHERE voter_id='$voter_id'");

    session_destroy();
    echo "<h3 style='text-align:center;'>Vote submitted successfully. You are logged out.</h3>";
    exit();
}

// Fetch candidates
$candidates = mysqli_query($conn, "SELECT * FROM candidates");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cast Vote</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">

<h2>Cast Your Vote</h2>

<form method="post">

    <?php while ($row = mysqli_fetch_assoc($candidates)) { ?>
        <div class="candidate-card">
            <input type="radio" name="candidate" value="<?php echo $row['id']; ?>" required>

            <?php if ($row['image'] != "") { ?>
                <img src="../uploads/<?php echo $row['image']; ?>">
            <?php } ?>

            <span class="candidate-name">
                <?php echo $row['name']; ?>
            </span>
        </div>
    <?php } ?>

    <div style="text-align:center;">
        <button type="submit" name="vote">Submit Vote</button>
    </div>

</form>

</div>

</body>
</html>
