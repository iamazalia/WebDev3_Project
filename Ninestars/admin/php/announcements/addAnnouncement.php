<?php

    include_once '../../../db.php';
    $conn = getConnection();
    session_start();

    if(isset($_POST['createAnnouncement']) && $_SESSION['role'] == "admin"){
        $title = $_POST['title'];
        $content = $_POST['content'];

        $sql = "INSERT INTO announcements (title, content) VALUES ('$title', '$content')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Announcement added successfully'); window.location.href='../../admin.php?page=announcement';</script>";
        } else {
            echo "Error: ". $sql. "<br>". $conn->error;
        }
        

    }else{
        echo "Unauthorized";
    }

?>