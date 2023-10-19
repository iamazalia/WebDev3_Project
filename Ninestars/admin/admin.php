<?php
include_once "../db.php";
include_once "php/getSessions.php";
include_once "php/formatter.php";
include_once "php/users/showUsers.php";
include_once "./php/activities.php";

$conn = getConnection();
$session = getSessions();

include_once "php/announcements/showAnnouncements.php";


if (!($_SESSION['role'] == "admin")) {
  header('Location:../login.html');
}

$firstname = capitalizeFirstLetter($session['firstname']);
$lastname = $session['lastname'];

$totalUsers = getTotalUsers();
$totalMales = getTotalMaleUsers();
$totalFemales = getTotalFemaleUsers();

$totalAnnouncements = getTotalAnnouncement();


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
    .hidden {
      display: none;
    }

    .actions {
      display: flex;
      gap: 0.75rem;
    }

    .editAnnouncement{
      cursor: pointer !important;
    }

  </style>

  <!-- scripts  -->
  <script src="./scripts/pageSwitcher.js" defer></script>
  <script src="./scripts/admin.js" defer></script>
</head>

<body>

  <!-- header  -->
  <?php include './header.php'; ?>

  <?php include './sidebar.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1 id="pageTitle">Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active" id="breadCrumbPage">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard hidden">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Total users  -->
            <div class="col-xxl-6 col-md-6 col-lg-6">
              <div class="card info-card sales-card total-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Total Users</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $totalUsers ?></h6>


                    </div>
                  </div>
                </div>

              </div>
            </div>

            <!-- Total Announcements made  -->
            <div class="col-xxl-6 col-md-6 col-lg-6">
              <div class="card info-card sales-card total-card">



                <div class="card-body">
                  <h5 class="card-title">Announcements made</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-megaphone"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $totalAnnouncements ?></h6>


                    </div>
                  </div>
                </div>

              </div>
            </div>


            <!-- pie chart male to female Ratio users-->
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Male to Female Ratio</h5>

                  <!-- Pie Chart -->
                  <div id="pieChart"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#pieChart"), {
                        series: [<?php echo $totalMales.','.$totalFemales?>],
                        chart: {
                          height: 350,
                          type: 'pie',
                          toolbar: {
                            // show: true
                          }
                        },
                        labels: ['Male', 'Female']
                      }).render();
                    });
                  </script>
                  <!-- End Pie Chart -->

                </div>
              </div>
            </div>

            <!-- Recent Sales -->


          </div>
        </div><!-- End Left side columns -->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Activities by Month</h5>

              <!-- Bar Chart -->
              <div id="barChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#barChart")).setOption({
                    xAxis: {
                      type: 'category',
                      data: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                    },
                    yAxis: {
                      type: 'value'
                    },
                    series: [{
                      data: <?php echo getActivitiesinMonth() ?>,
                      type: 'bar'
                    }]
                  });
                });
              </script>
              <!-- End Bar Chart -->

            </div>
          </div>
        </div>
        <!-- Right side columns -->


      </div>
    </section>

    <section class="section users hidden">

      <?php getUsersAsTable() ?>
    </section>



    <section class="section announcement hidden">
      <button class="btn btn-primary mb-3" id="createAnnouncementBtn" data-bs-toggle='modal' data-bs-target='#announcementModal'>Create Announcement</button>
                <!-- displays announcement wrapper -->
        <div class="display-announcement container"> 
            <?php getAnnouncement(); ?>

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


  <!-- modal  -->
  <?php include 'php/modal.php' ?>

</body>

</html>