<?php
session_start();

include_once('db.php');

$con = getConnection();

if (isset($_POST['submit'])) {
    if ($_POST['password'] == $_POST['confirm-password']) {

        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $password = $_POST['password'];
        $role = 'user';
        $status = 'active';

        // Check if email already exists
        $emailExist = "SELECT COUNT(*) as emailCount FROM user WHERE email = '$email'";
        $emailResult = $con->query($emailExist);
        $emailRow = $emailResult->fetch_assoc();

        if ($emailRow['emailCount'] > 0) {
            echo "<script language='javascript'>
                    alert('Email already exists!');
                    window.location.href ='register.html';
                  </script>";
            exit;
        }

        $sql = "INSERT INTO `user` (`Firstname`, `Lastname`, `gender`, `Email`, `Password`,`Role`,`status`) 
                        VALUES ('$fname', '$lname', '$gender', '$email', '$password','$role','$status')";

    //     if ($con->query($sql) === true) {
    //         echo "<script language='javascript'>
    //         alert('You have been successfully registered! Please log in to your account.');
    //         window.location.href='login.html';
    //         </script>";
    //     } else {
    //         echo 'Error: ' . $sql . '<br>' . $con->error;
    //     }
    // } else {
        echo "<script>
        alert('Password doesn't match!');
        window.location.href ='register.html';            
    </script>";
    }
} else {
    echo "<script>alert('Error Occured');
        window.location.href = 'register.html';
    </script>";
}
