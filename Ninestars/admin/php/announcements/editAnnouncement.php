<?php 

include_once '../../../db.php';
$conn = getConnection();
session_start();

if(isset($_POST['editAnnouncement']) && $_SESSION['role'] == "admin"){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "UPDATE announcements SET title = '$title', content = '$content' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Announcement updated successfully'); window.location.href='../../admin.php?page=announcement';</script>";
    } else {
        echo "Error: ". $sql. "<br>". $conn->error;
    }
    

}else{
    echo "Unauthorized";
}

?>