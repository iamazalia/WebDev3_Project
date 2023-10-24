<?php
include_once 'db.php';

if (isset($_POST['activityId']) && isset($_POST['action'])) {
    $activityId = $_POST['activityId'];
    $action = $_POST['action'];

    // Update the database based on the action
    if ($action === "cancel") {
        $sql = "UPDATE remark SET cancelled = 1 WHERE activityId = ?";
        $message = "Activity has been cancelled.";
    } elseif ($action === "done") {
        $sql = "UPDATE remark SET done = 1 WHERE activityId = ?";
        $message = "Activity has been marked as done.";
    }

    // Prepare and execute the SQL statement
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$activityId]);

    // Check if the update was successful
    if ($stmt->rowCount() > 0) {
        // Return a response indicating success
        echo $message;
    } else {
        // Return a response indicating failure
        echo "Failed to update the activity.";
    }
    exit;
}
?>


