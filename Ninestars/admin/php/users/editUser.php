<?php 
    session_start();
    include_once '../../../db.php';
    $conn = getConnection();
    if($_SESSION['role'] == 'admin'){
        if(isset($_POST['saveUser'])){
            $id = $_POST['id'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];
            $status = $_POST['status'];

            $sql = "UPDATE user SET firstname='$firstname', lastname='$lastname', gender='$gender', email='$email', password='$password', role='$role', status='$status' WHERE id='$id'";

            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Updated $firstname Sucessfully'); window.location.href='../../admin.php?page=users'</script>";
            } else {
                echo "Error updating user record: " . mysqli_error($conn);
            }       

        }
    }else{
        echo "Unathorized";
    }


?>