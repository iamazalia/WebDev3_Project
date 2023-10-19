<?php

function getAnnouncement()
{
    global $conn;

    $query = "SELECT * FROM announcements";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "
       
<div class='col-lg-12 announcement-card'>
<div class='card info-card sales-card total-card'>

    <div class='announcement-actions d-flex justify-content-between py-1 px-2'>
        <p class='text-secondary'>Created At: ".formatDate($row['created_at'])."</p>
        <a class='icon' href='' data-bs-toggle='dropdown'><i class='bi bi-three-dots'></i></a>
        <ul class='dropdown-menu dropdown-menu-end dropdown-menu-arrow'>

            <li class='editAnnouncement'><a class='dropdown-item' data-bs-toggle='modal' data-bs-target='#announcementModal' onclick='editAnnouncement(".json_encode($row).")'>Edit</a></li>
            <form action='./php/announcements/deleteAnnouncement.php' class='' method='POST'>
                <input type='hidden' id='deleteId' name='deleteId' value='".$row['id']."'>
                <button type='submit' class='dropdown-item text-danger' name='deleteAnnouncement' value='ambot'>Delete</button>
            </form>
        </ul>
    </div>

    <div class='card-body'>
        <h5 class='font-weight-bold'>".$row['title']."</h5>

        <div class='d-flex align-items-center'>
            <div class='ps-3'>
                ".$row['content']."
            </div>
        </div>
    </div>

</div>
</div>";
    }
}

function formatDate($dateString) {
    $timestamp = strtotime($dateString); // Convert the date and time string to a Unix timestamp
    $formattedDateTime = date("M d, Y g:i A", $timestamp); // Format the Unix timestamp as "Jan 18, 2020 8:00 AM"
    return $formattedDateTime;
}

function getTotalAnnouncement(){
    global $conn;
    $total = 0;
    $query = "SELECT * FROM announcements";
    $result = mysqli_query($conn, $query);
    if($result){
        $total = mysqli_num_rows($result);
    }
    return $total;
}

?>
