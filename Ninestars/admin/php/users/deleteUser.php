<?php 
    include_once '../../../db.php';
    $conn = getConnection();
    session_start();

    if($_SESSION['role'] == 'admin'){
        if(isset($_POST['id']) && isset($_POST['deleteBtn'])){
            $id = $_POST['id'];

            $sql = "DELETE FROM user WHERE id = '$id'";
            $result = mysqli_query($conn, $sql);
            
            if($result){
                echo "<script>window.location.href='../../admin.php?page=users';</script>";
            }else{
                echo "alert('Error')<script>window.location.href='../../admin.php'</script>";
            }
        }else{
            echo "Error";
        }


    }else{
        echo "Unauthorized";
    }


?>