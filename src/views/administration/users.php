<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Website administration</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <?php include_once($_SERVER['DOCUMENT_ROOT'] . '/src/layouts/administration/style_dependancies.php'); ?>
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">

        <?php include_once($_SERVER['DOCUMENT_ROOT'] . '/src/layouts/administration/spinner.php'); ?>

        <?php include_once($_SERVER['DOCUMENT_ROOT'] . '/src/layouts/administration/sideBar.php'); ?>


        <!-- Content Start -->
        <div class="content">
            <?php include_once($_SERVER['DOCUMENT_ROOT'] . '/src/layouts/administration/topBar.php'); ?>

            <div class="col-12 p-0">
                <div class=" rounded h-100 p-4">
                    <h6 class="mb-4 mt-4">Users Table</h6>
                    <button type="button" class="btn btn-outline-success m-2" data-bs-toggle="modal" data-bs-target="#userModal">Add user</button>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action(s)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>John</td>
                                    <td>jhon@email.com</td>
                                    <td>Member</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Mark</td>
                                    <td>mark@email.com</td>
                                    <td>Member</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Jacob</td>
                                    <td>jacob@email.com</td>
                                    <td>Member</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <?php //include_once('../../layouts/administration/footer.php');
            ?>
        </div>
    </div>
    <?php include_once('addUpdateUser.php'); ?>





</body>
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

</html>