<?php


session_start();
include_once('db.php');
$conn = getConnection();

include_once './admin/php/announcements/showAnnouncements.php';

// echo $_SESSION["id"];

$sql = "SELECT * FROM user WHERE id = " . $_SESSION["id"] . "";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SESSION["role"] == null) {
    header("Location: login.html");
} else {
    if ($_SESSION["role"] == "user") {
    } else {
        header("Location: admin/admin.php");
    }
}




$sql = "SELECT * FROM user WHERE id = '" . $_SESSION['id'] . "'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// Activity
$sql = "SELECT * FROM activities WHERE userId = '" . $_SESSION['id'] . "'";
$resultActivity = $conn->query($sql);

// Fetch all activity rows into an array
$activities = [];
while ($rowData = $resultActivity->fetch_assoc()) {
    $activities[] = $rowData;
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>User's Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="npm i bootstrap-icons">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="userpage.css">



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <!-- modernizr css -->
    <script src="assets/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <!-- <div class="logo">
                    <a href="#"><img src="assets/img/logo.png" alt="logo"></a>
                </div> -->
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true">
                                    <i class="fa fa-dashboard" style="font-size:24px"></i>
                                    <span>User's Dashboard</span>
                                </a>
                                <ul class="collapse">
                                    <li class="active"><a href="#manage-activities">Manage Life Activities</a></li>
                                    <li><a href="#add-activity">Add Activity</a></li>
                                    <li><a href="#edit-activity">Edit Activity</a></li>
                                    <li><a href="#set-activity">Set Activity</a></li>
                                    <li><a href="#announcements">Announcements</a></li>
                                </ul>
                            </li>
                        </ul>
                        </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="search-box pull-left">
                            <form action="#">
                                <input type="text" name="search" placeholder="Search ..." required><i class="fa fa-search"></i>
                            </form>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li class="dropdown">
                                <i class="fa fa-bell" style="font-size:26px" data-toggle="dropdown">
                                    <span>2</span>
                                </i>
                                <div class="dropdown-menu bell-notify-box notify-box">
                                    <span class="notify-title">You have 3 new notifications <a href="#">view all</a></span>
                                    <div class="nofity-list">
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                            <div class="notify-text">
                                                <p>You have Changed Your Password</p>
                                                <span>Just Now</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>
                                            <div class="notify-text">
                                                <p>New Commetns On Post</p>
                                                <span>30 Seconds ago</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-key btn-primary"></i></div>
                                            <div class="notify-text">
                                                <p>Some special like you</p>
                                                <span>Just Now</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown">
                                <i class="fa fa-envelope-o dropdown-toggle" data-toggle="dropdown"><span>3</span></i>
                                <div class="dropdown-menu notify-box nt-enveloper-box">
                                    <span class="notify-title">You have 3 new notifications <a href="#">view all</a></span>
                                    <div class="nofity-list">
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb">
                                                <img src="assets/img/author/author-img1.jpg" alt="image">
                                            </div>
                                            <div class="notify-text">
                                                <p>Aglae Mayer</p>
                                                <span class="msg">Hey I am waiting for you...</span>
                                                <span>3:15 PM</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="settings-btn">
                                <i class="fa fa-gear" style="font-size:30px"></i>
                            </li>   
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Home</a></li>
                                <li><span>Dashboard</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="user.jpg" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"> <?php echo $row['firstname'] ?> <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Message</a>
                                <a class="dropdown-item" href="logout.php">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">


                <div id="add-activity" class="container">
                    <div>
                        <h2>Add Activity</h2><br>
                        <form action="submit.php" method="post">
                            <div class="form-group">
                                <label for="name">Activity Name:</label>
                                <input type="text" id="name" name="name" required>
                            </div>

                            <div class="form-group">
                                <label for="date">Date:</label>
                                <input type="date" id="date" name="date" required>
                            </div>

                            <div class="form-group">
                                <label for="time">Time:</label>
                                <input type="time" id="time" name="time" required>
                            </div>

                            <div class="form-group">
                                <label for="location">Location:</label>
                                <input type="text" id="location" name="location" required>
                            </div>

                            <div class="form-group">
                                <label for="ootd">OOTD:</label>
                                <textarea id="ootd" name="ootd" required></textarea>
                            </div>

                            <div class="button">
                                <input type="submit" value="Add Activity">
                            </div>
                        </form>
                    </div>
                </div>

                <div class="container">
                    <div class="cont" style='display:flex;align-items:center;flex-direction:column;'>
                        <h2 id="edit-activity">Edit Activity</h2>
                        <div class="table-cont">
                            <table>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Location</th>
                                        <th>OOTD</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- displays activities  -->
                                    <?php if (!empty($activities)) {
                                        $countActivity = 1;
                                        foreach ($activities as $activity) { ?>
                                            <tr>
                                                <td><?php echo $countActivity++ ?></td>
                                                <td><?php echo $activity['activityName'] ?></td>
                                                <td><?php echo $activity['date'] ?></td>
                                                <td><?php echo $activity['time'] ?></td>
                                                <td><?php echo $activity['location'] ?></td>
                                                <td><?php echo $activity['ootd'] ?></td>
                                                <td><button onclick="toggleModal(), editActivity(<?= $activity['id'] ?>,
                                    '<?= $activity['activityName'] ?>',
                                    '<?= $activity['date'] ?>',
                                    '<?= $activity['time'] ?>',
                                    '<?= $activity['location'] ?>',
                                    '<?= $activity['ootd'] ?>')">Edit</button></td>
                                            </tr>
                                        <?php }
                                    } else { ?>
                                        <div class="alert alert-warning alert-dismissable fade show" role="alert" style="display:flex;align-items: center; justify-content:space-between;">
                                            <strong>No Activity Added Yet!</strong>
                                        </div>

                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
                <div class="modal fade show" id="modal" tabindex="-1" style="display: none;">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form method="POST" action="" class="edit-activity">
                                <div class="modal-header">
                                    <h5 class="modal-title">Update Activity</h5>
                                    <button type="button" style="padding: 10px;" class="btn btn-dark" onclick="toggleModal()">X</button>
                                </div>
                                <div class="modal-body">

                                    <input type="hidden" name="user_id" id="id" required><br>
                                    <label for="activity_name">Activity Name:</label><br>
                                    <input type="text" id="actName" name="actName" required><br>
                                    <label for="lname">Date</label><br>
                                    <input type="text" id="date" name="date" required><br>
                                    <label for="email">Time:</label><br>
                                    <input type="text" id="time" name="time" required><br>
                                    <label for="role">Location:</label><br>
                                    <input type="text" id="location" name="location" required><br><br>
                                    <label for="password">OOTD:</label><br>
                                    <input type="text" id="ootd" name="ootd" required><br>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="toggleModal()">Close</button>
                                    <button type="submit" class="btn btn-success">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="set-activity" class="container">
                    <div class="cont" style='display:flex;align-items:center;flex-direction:column;'>
                        <h2>Set Activity</h2>
                        <div class="table-cont mt-4">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Location</th>
                                        <th>OOTD</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>                      
                                    <?php if (!empty($activities)) {
                                        $countActivity = 1;
                                        foreach ($activities as $activity) { 
                                            if($activity['remark']== null){?>
                                            <tr>
                                                <td><?php echo $countActivity++ ?></td>
                                                <td><?php echo $activity['activityName'] ?></td>
                                                <td><?php echo $activity['date'] ?></td>
                                                <td><?php echo $activity['time'] ?></td>
                                                <td><?php echo $activity['location'] ?></td>
                                                <td><?php echo $activity['ootd'] ?></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button>Set</button>
                                                        <div class="dropdown-content">
                                                            <a href="updateACtRemark.php?id=<?=$activity['id']?>&status=cancelled">Cancel</a>
                                                            <a href="updateACtRemark.php?id=<?=$activity['id']?>&status=done">Done</a>
                                                        </div>
                                                </td>
                                            </tr>
                                    <?php }
                                    }} ?>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- </head> -->
                </div>
   
                    <!-- </body> -->


</html>

</div>

<div id="announcements">
    <h1 style="margin-left: 5vh;">Announcements</h1>
    <?php getAnnouncement(); ?>
</div>

<div class="footer">
<footer>
        <div class="footer-area">
            <p>© Copyright 2018. All right reserved. Template by <a href="https://colorlib.com/wp/">Colorlib</a>.</p>
        </div>
    </footer>
</div>

</div>

<div class="offset-area">
    <div class="offset-close"><i class="ti-close"></i></div>
    <ul class="nav offset-menu-tab">
        <li><a class="active" data-toggle="tab" href="#activity">Activity</a></li>
        <li><a data-toggle="tab" href="#settings">Settings</a></li>     
    </ul>
    <div class="offset-content tab-content">
        <div id="activity" class="tab-pane fade in show active">
            <div class="recent-activity">
                <div class="timeline-task">
                    <div class="icon bg1">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <div class="tm-title">
                        <h4>Rashed sent you an email</h4>
                        <span class="time"><i class="ti-time"></i>09:35</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                    </p>
                </div>
                <div class="timeline-task">
                    <div class="icon bg2">
                        <i class="fa fa-check"></i>
                    </div>
                    <div class="tm-title">
                        <h4>Added</h4>
                        <span class="time"><i class="ti-time"></i>7 Minutes Ago</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur.
                    </p>
                </div>
                <div class="timeline-task">
                    <div class="icon bg2">
                        <i class="fa fa-exclamation-triangle"></i>
                    </div>
                    <div class="tm-title">
                        <h4>You missed you Password!</h4>
                        <span class="time"><i class="ti-time"></i>09:20 Am</span>
                    </div>
                </div>
                <div class="timeline-task">
                    <div class="icon bg3">
                        <i class="fa fa-bomb"></i>
                    </div>
                    <div class="tm-title">
                        <h4>Member waiting for you Attention</h4>
                        <span class="time"><i class="ti-time"></i>09:35</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                    </p>
                </div>
            </div>
        </div>
        <div id="settings" class="tab-pane fade">
            <div class="offset-settings">
                <h4>General Settings</h4>
                <div class="settings-list">
                    <div class="s-settings">
                        <div class="s-sw-title">
                            <h5>Notifications</h5>
                            <div class="s-swtich">
                                <input type="checkbox" id="switch1" />
                                <label for="switch1">Toggle</label>
                            </div>
                        </div>
                        <p>Keep it 'On' When you want to get all the notification.</p>
                    </div>
                    <div class="s-settings">
                        <div class="s-sw-title">
                            <h5>Show recent activity</h5>
                            <div class="s-swtich">
                                <input type="checkbox" id="switch2" />
                                <label for="switch2">Toggle</label>
                            </div>
                        </div>
                        <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jquery latest version -->
<script src="assets/vendor/jquery-2.2.4.min.js"></script>
<!-- bootstrap 4 js -->
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/metisMenu.min.js"></script>
<script src="assets/js/jquery.slimscroll.min.js"></script>
<script src="assets/js/jquery.slicknav.min.js"></script>


<!-- others plugins -->
<script src="assets/js/plugins.js"></script>
<script src="assets/js/scripts.js"></script>
<script>
    const editForm = document.querySelector('.edit-activity');
    const nameField = editForm.querySelector('#actName');
    const dateField = editForm.querySelector('#date');
    const timeField = editForm.querySelector('#time');
    const locationField = editForm.querySelector('#location');
    const ootdField = editForm.querySelector('#ootd');

    function editActivity(id, name, date, time, location, ootd) {
        nameField.value = name;
        dateField.value = date;
        timeField.value = time;
        locationField.value = location;
        ootdField.value = ootd;

        const action = `updateActivity.php?actID=${id}`;
        // alert(action);
        editForm.setAttribute('action', action);
    }

    function toggleModal() {
        var modal = document.getElementById("modal");
        if (modal.style.display === "none") {
            modal.style.display = "block";
        } else {
            modal.style.display = "none";
        }
    }
</script>
</body>

</html><?php
