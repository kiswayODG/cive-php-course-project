<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Website administration</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <?php include_once("src/layouts/administration/style_dependancies.php"); ?>
</head>

<body>
    <form action="/login-check" method="post">
        <div class="container-xxl position-relative bg-white d-flex p-0">



            <!-- Sign In Start -->
            <div class="container-fluid">
                <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                    <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                        <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <a href="../../index.html" class="">
                                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>ADMIN</h3>
                                </a>
                                <h3>Sign In</h3>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="user name" name="username" require>
                                <label for="floatingInput">User</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" require>
                                <label for="floatingPassword">Password</label>
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Log In</button>
                            <p class="text-center mb-0">Don't have an Account? Contact admin </p>
                            <p style="color : red; margin-top: 50px;">
                                <?php
                                $error_text = '';
                                if (!empty($_GET['error'])) {
                                    $error_text = $_GET['error'];
                                }
                                echo $error_text;
                                ?>
                            </p>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </form>



    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="http://www.luban-sspu-unb.com:88/resources/administration/lib/chart/chart.min.js"></script>
    <script src="http://www.luban-sspu-unb.com:88//resources/administration/lib/easing/easing.min.js"></script>
    <script src="http://www.luban-sspu-unb.com:88/resources/administration/lib/waypoints/waypoints.min.js"></script>
    <script src="http://www.luban-sspu-unb.com:88/resources/administration/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="http://www.luban-sspu-unb.com:88/resources/administration/lib/tempusdominus/js/moment.min.js"></script>
    <script src="http://www.luban-sspu-unb.com:88/resources/administration/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="http://www.luban-sspu-unb.com:88/resources/administration/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <script src="http://www.luban-sspu-unb.com:88/resources/administration/js/main.js"></script>

</body>

</html>