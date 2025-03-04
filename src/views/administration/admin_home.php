<?php include_once "src/services/administration/protect.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Website administration</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <?php include_once($_SERVER['DOCUMENT_ROOT'] .'/src/layouts/administration/style_dependancies.php');?>
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">

        <?php include_once($_SERVER['DOCUMENT_ROOT'] .'/src/layouts/administration/spinner.php');?>

        <?php include_once($_SERVER['DOCUMENT_ROOT'] .'/src/layouts/administration/sideBar.php');?>


        <!-- Content Start -->
        <div class="content" >
            <?php include_once($_SERVER['DOCUMENT_ROOT'] .'/src/layouts/administration/topBar.php');?>
           
        </div>


        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/resources/administration/lib/chart/chart.min.js"></script>
    <script src="/resources/administration/lib/easing/easing.min.js"></script>
    <script src="/resources/administration/lib/waypoints/waypoints.min.js"></script>
    <script src="/resources/administration/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="/resources/administration/lib/tempusdominus/js/moment.min.js"></script>
    <script src="/resources/administration/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="/resources/administration/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="/resources/administration/js/main.js"></script>
</body>

</html>