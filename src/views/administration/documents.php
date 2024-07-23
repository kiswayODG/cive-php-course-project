<?php include_once "src/services/administration/protect.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Luban website administration</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <style>
        .preview-image {
            width: 30px;
            height: 30px;
            transition: transform 0.3s;
        }

        .preview-image:hover {
            transform: scale(10);
        }
    </style>

    <?php
    function hasPreview($docUrl)
    {
        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $fileExtension = pathinfo($docUrl, PATHINFO_EXTENSION);
        return in_array(strtolower($fileExtension), $imageExtensions);
    }

    include_once('src/layouts/administration/style_dependancies.php'); ?>
</head>
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">

        <?php include_once('src/layouts/administration/spinner.php'); 
        ?>

        <?php include_once('src/layouts/administration/sideBar.php'); ?>


        <div class="content">
            <?php include_once('src/layouts/administration/topBar.php'); ?>


            <div class="col-12 p-0">
                <div class=" rounded h-100 p-4">


                    <h4 class="mb-4 mt-4">Documents table</h4>
                    <button type="button" class="btn btn-outline-success m-2" data-bs-toggle="modal" data-bs-target="#docModal">Add news</button>
                    <p class="<?php echo isset($_SESSION['actionResult']) ? 'alert alert-success' : '' ?> "><?php echo isset($_SESSION['actionResult']) ? $_SESSION['actionResult'] : '';
                                                                                                            unset($_SESSION['actionResult']); ?></p>
                    <div class="table-responsive">

                        <table class="table table-striped" id="docsTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Document</th>
                                    <th scope="col">View</th>
                                    <th scope="col">Course</th>
                                    <th scope="col">Action(s)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($documents as $doc) {
                                    echo '<tr>';
                                    echo '<th scope="row">' . $doc->getId() . '</th>';
                                    echo '<td>' . $doc->getTitle() . '</td>';
                                    echo '<td><a href="/resources/storage/' . $doc->getDocs() . '" target="_blank">' . $doc->getDocs() . '</a></td>';
                                    echo '<td>';

                                    if (hasPreview($doc->getDocs())) {
                                        echo '<img class="preview-image" src="/resources/storage/' . $doc->getDocs() . '" alt="Preview">';
                                    } else {
                                        echo '<i class="fas fa-file-alt fa-2x"></i>';
                                    }

                                    echo '</td>';
                                    // echo '<td>' .'</td>';
                                    echo '<td>' . ($doc->getCourse() ? $doc->getCourse()->getCourseName() : 'No course') . '</td>';

                                    echo '<td>';
                                    echo '<button type="submit" value="' . $doc->getId() . '" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#docModal" data-docid="' . $doc->getId() . '">Edit</button> &nbsp;&nbsp;';
                                    echo '<button type="submit" value="' . $doc->getId() . '" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal' . $doc->getId() . '" data-newsid="' . $doc->getId() . '">Delete</button> &nbsp;&nbsp;';
                                    echo '</td>';
                                    echo '</tr>';

                                    echo <<<HTML
                                    <div class="modal fade" id="deleteModal{$doc->getId()}" tabindex="-1" aria-labelledby="deleteModalLabel{$doc->getId()}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form action="/delete-docs" method="POST">
                                                <input hidden type="text" name="doc_id" value={$doc->getId()}>
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{$doc->getId()}">Confirmation de suppression</h5>
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

    <?php include_once('addUpdateDoc.php'); ?>
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
        $('#docsTable').DataTable({
            "dom": 'rtip',
        })

        $('#docModal').on('show.bs.modal', function(event) {

            var button = $(event.relatedTarget);
            var docId = button.data('docid');

            var modal = $(this);
            if (docId) {
                $.ajax({
                    url: '/admin/get-docs-details/' + docId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);

                        modal.find('#head').text("Document editing");
                        modal.find('#id').val(docId);
                        modal.find('#title').val(data.title);
                        $('#oldname').show();
                        $('#oldLabel').show();
                        modal.find('#oldname').val(data.doc);
                        modal.find('#course').val(data.course);
                        modal.find('#lang').val(data.language);
                        $('#submit').val('update');
                    },
                    error: function(error) {
                        console.log('Error fetching user details:', error);
                    }
                });
            }
            $('#docModal').on('hidden.bs.modal', function() {
                modal.find('#head').text("Document adding");
                modal.find('#id').val("");
                modal.find('#title').val("");
                $('#oldname').hide();
                $('#oldLabel').hide();
                modal.find('#course').val("");
                modal.find('submit').val('create');
            });
        });

    })
</script>

</html>