<?php
include_once 'db.php';


// Check if the 'id' query parameter is set in the URL
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Fetch the user data based on the provided ID
    $sql = "SELECT * FROM users WHERE id = $user_id";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        // Fetch the user's data
        $row = $result->fetch_assoc();
    } else {
        // Redirect to the Show Users page if the user doesn't exist
        header("Location: show.php");
        exit();
    }
} else {
    // Redirect to the Show Users page if 'id' is not provided in the URL
    header("Location: show.php");
    exit();
}

// Handle the form submission for updating the user
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $newFirstName = $_POST['fname'];
        $newLastName = $_POST['lname'];
        $newEmail = $_POST['email'];
        $password = $_POST['password'];
        $newRole = $_POST['role'];
        $newGender = $_POST['gender'];

        // Update the user data in the database
        $updateSql = "UPDATE users SET 
                    firstname = '$newFirstName',
                    lastname = '$newLastName',
                    age = '$newAge',
                    address = '$newAddress'
                    WHERE id = $user_id";

        if ($conn->query($updateSql) === TRUE) {
            // Redirect back to the Show Users page after successful update
            header("Location: show.php");
            exit();
        } else {
            // Handle update error
            echo "Error updating record: " . $conn->error;
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    <div>
    <form method="POST" action="">
        <input type="hidden" name="user_id" id="id" value="<?php echo $row['id'] ?>" required><br>
        <label for="fname">First Name:</label><br>
        <input type="text" id="fname" name="fname" value="<?php echo $row['firstname'] ?>" required><br>
        <label for="lname">Last Name:</label><br>
        <input type="text" id="lname" name="lname" value="<?php echo $row['lastname'] ?>" required><br>
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" value="<?php echo $row['email'] ?>" required><br>
        <label for="password">Password:</label><br>
        <input type="text" id="password" name="password" value="<?php echo $row['password'] ?>" required><br>
        <label for="role">Role:</label><br>
        <input type="text" id="role" name="role" value="<?php echo $row['role'] ?>" required><br><br>
        <label for="gender">Gender:</label><br>
        <input type="text" id="gender" name="gender
        " value="<?php echo $row['gender'] ?>" required><br><br>
        <!-- <label for="actions">Actions:</label><br>
        <input type="text" id="actions" name="actions" value="<?php echo $row['actions'] ?>" required><br><br> -->
        <!-- Change the name attribute to "submit" -->
        <input type="submit" name="submit" value="Update">
    </form>
    </div>
</body>
</html>
