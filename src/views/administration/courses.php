<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Website administration</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <?php
    include_once('src/layouts/administration/style_dependancies.php'); ?>
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">

        <?php //include_once('src/layouts/administration/spinner.php'); ?>

        <?php include_once('src/layouts/administration/sideBar.php'); ?>


        <!-- Content Start -->
        <div class="content">
            <?php include_once('src/layouts/administration/topBar.php'); ?>
      
      

                
            <div class="col-12 p-0">
                <div class=" rounded h-100 p-4">


                    <h4 class="mb-4 mt-4">Course table</h4>
                    <button type="button" class="btn btn-outline-success m-2" data-bs-toggle="modal" data-bs-target="#coursesModal">Add course</button>
                    <p class="<?php echo isset($_SESSION['actionResult']) ? 'alert alert-success' : '' ?> "><?php echo isset($_SESSION['actionResult']) ? $_SESSION['actionResult'] : '';
                                                                                                            unset($_SESSION['actionResult']); ?></p>
                    <div class="table-responsive">

                        <table class="table table-striped" id="courseTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Course name</th>
                                    <th scope="col">Course introduction</th>
                                    <th scope="col">Outline</th>
                                    <th scope="col">Action</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                               
                                foreach ($courses as $course) {
                                    echo '<tr>';
                                    echo '<th scope="row">' . $course->getId() . '</th>';
                                    echo '<td>' . $course->getCourseIntroduction() . '</td>';
                                    echo '<td>' . $course->getCourseName() . '</td>';
                                    echo '<td>' . $course->getOutline() . '</td>';
    
                                    echo '<td>';
                                    echo '<button type="submit" value="' . $course->getId() . '" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#coursesModal" data-courseid="' . $course->getId() . '">Edit</button> &nbsp;&nbsp;';
                                    echo '<button type="submit" value="' . $course->getId() . '" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal' . $course->getId() . '" data-courseid="' . $course->getId() . '">Delete</button> &nbsp;&nbsp;';
                                    echo '</td>';
                                    echo '</tr>';

                                    echo <<<HTML
                                    <div class="modal fade" id="deleteModal{$course->getId()}" tabindex="-1" aria-labelledby="deleteModalLabel{$course->getId()}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form action="/delete-courses" method="POST">
                                                <input hidden type="text" name="id" value={$course->getId()}>
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{$course->getId()}"> Confirm deleting</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Confirm deleting !
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                HTML;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>    
        </div>
    </div>

    <?php  include_once('addUpdateCourse.php') ;?>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

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


<script>
    $(document).ready(function() {
        $('#courseTable').DataTable({
            "dom": 'rtip',
        })

        $('#coursesModal').on('show.bs.modal', function(event) {
           
            var button = $(event.relatedTarget);
            var courseId = button.data('courseid');
          
            var modal = $(this);
            if (courseId) {
                $.ajax({
                    url: '/admin/get-courses-details/' + courseId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        modal.find('#courseName').val(data.courseName);
                        modal.find('#courseIntroduction').val(data.courseIntroduction);
                        modal.find('#outline').val(data.outline);
                        modal.find('#language').val(data.language);
                        modal.find('#id').val(courseId);
                        $('#submit').val('update');
                    },
                    error: function(error) {
                        console.log('Error fetching user details:', error);
                    }
                });
            }
            $('#coursesModal').on('hidden.bs.modal', function() {
               
                modal.find('#courseName').val('');
                modal.find('#courseIntroduction').val('');
                modal.find('#outline').text('');
                modal.find('#')
                modal.find('submit').val('create');
            });
        });

    })
</script>

</html>