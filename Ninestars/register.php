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

        if ($con->query($sql) === true) {
            $sql = "SELECT * FROM user WHERE email = '" . $email . "' and Password = '" . $password . "'";
            $result = $con->query($sql);
            $row = $result->fetch_assoc();

            echo "<script language='javascript'>
            alert('Registered Successfully!');
            </script>";

            $_SESSION['id'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            
            header('Location: userPage.php');
            
        } else {
            echo 'Error: ' . $sql . '<br>' . $con->error;
        }


    } else {
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm-password'];

        echo "<script>
                alert('Password is Incorrect!');
                window.location.href ='register.html';            
            </script>";
    }

    
}
