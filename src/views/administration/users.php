<?php include_once "src/services/administration/protect.php"; ?>
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

        <?php include_once('src/layouts/administration/spinner.php'); ?>

        <?php include_once('src/layouts/administration/sideBar.php'); ?>


        <div class="content">
            <?php include_once('src/layouts/administration/topBar.php'); ?>

            <div class="col-12 p-0">
                <div class=" rounded h-100 p-4">


                    <h4 class="mb-4 mt-4">Users Table</h4>
                    <button type="button" class="btn btn-outline-success m-2" data-bs-toggle="modal" data-bs-target="#userModal">Add user</button>
                    <p class="<?php echo isset($_SESSION['actionResult']) ? 'alert alert-success' : '' ?> "><?php echo isset($_SESSION['actionResult']) ? $_SESSION['actionResult'] : '';
                                                                                                            unset($_SESSION['actionResult']); ?></p>
                    <div class="table-responsive">

                        <table class="table table-striped" id="userTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action(s)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($users as $user) {
                                    echo '<tr>';
                                    echo '<th scope="row">' . $user->getId() . '</th>';
                                    echo '<td>' . $user->getUsername() . '</td>';
                                    echo '<td>' . $user->getEmail() . '</td>';
                                    echo '<td>';
                                    echo '<button type="submit" value="' . $user->getId() . '" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#userModal" data-userid="' . $user->getId() . '">Edit</button> &nbsp;&nbsp;';
                                    echo '<button type="submit" value="' . $user->getId() . '" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal' . $user->getId() . '" data-userid="' . $user->getId() . '">Delete</button> &nbsp;&nbsp;';
                                    echo '</td>';
                                    echo '</tr>';

                                    echo <<<HTML
                                    <div class="modal fade" id="deleteModal{$user->getId()}" tabindex="-1" aria-labelledby="deleteModalLabel{$user->getId()}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form action="/delete-user" method="POST">
                                                <input hidden type="text" name="user_id" value={$user->getId()}>
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{$user->getId()}">Confirmation de suppression</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Êtes-vous sûr de vouloir supprimer cet utilisateur ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-danger">Supprimer</button>
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
    <?php include_once('addUpdateUser.php'); ?>





</body>
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

<script src="/resources/administration/js/main.js"></script>
<script>
    $(document).ready(function() {
        $('#userTable').DataTable({
            "dom": 'rtip',
        })


        $('#userModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var userId = button.data('userid');
            var modal = $(this);
            if (userId) {
                $.ajax({
                    url: '/admin/get-user-details/' + userId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        console.log('User details:', data);
                        modal.find('#id').val(data.id);
                        modal.find('#uname').val(data.username);
                        modal.find('#email').val(data.email);
                        modal.find('#title').text('User editing');
                        $("#pass").hide();
                        $('#submit').val('update');
                    },
                    error: function(error) {
                        console.log('Error fetching user details:', error);
                    }
                });
            }
            $('#userModal').on('hidden.bs.modal', function() {
                modal.find('#id').val('');
                modal.find('#uname').val('');
                modal.find('#email').val('');
                modal.find('#password').val('');
                modal.find('#title').text('User registering');
                modal.find('submit').val('create');
                $("#pass").show();
            });
        });

    })
</script>

</html>