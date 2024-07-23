<?php include_once "src/services/administration/protect.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Website administration</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
    <style>
        .preview-image {
            width: 30px;
           
            height: 30px;
            transition: transform 0.3s;
        }
    </style>

    <?php include_once( 'src/layouts/administration/style_dependancies.php'); ?>
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">

        <?php
        function hasPreview($docUrl)
        {
            $imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $fileExtension = pathinfo($docUrl, PATHINFO_EXTENSION);

            return in_array(strtolower($fileExtension), $imageExtensions);
        }
        include_once('src/layouts/administration/spinner.php'); ?>

        <?php include_once('src/layouts/administration/sideBar.php'); ?>


        <div class="content">
            <?php include_once('src/layouts/administration/topBar.php'); ?>

            <div class="col-12 p-0">
                <div class=" rounded h-100 p-4">


                    <h4 class="mb-4 mt-4">News table</h4>
                    <button type="button" class="btn btn-outline-success m-2" data-bs-toggle="modal" data-bs-target="#newsModal">Add news</button>
                    <p class="<?php echo isset($_SESSION['actionResult']) ? 'alert alert-success' : '' ?> "><?php echo isset($_SESSION['actionResult']) ? $_SESSION['actionResult'] : '';
                                                                                                            unset($_SESSION['actionResult']); ?></p>
                    <div class="table-responsive">

                        <table class="table table-striped" id="userTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Categorie</th>
                                    <th scope="col">Illustration</th>
                                    <th scope="col">Pub date</th>
                                    <th scope="col">Action(s)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($news as $new) {
                                    echo '<tr>';
                                    echo '<th scope="row">' . $new->getId() . '</th>';
                                    echo '<td>' . $new->getTitle() . '</td>';
                                    echo '<td>' . $new->getAuthor()->getUsername() . '</td>';
                                    echo '<td>' . $new->getNewClass()->getClassName() . '</td>';
                                    echo '<td>' ;
                                    if (hasPreview($new->getIllustration())) {
                                        echo '<img class="preview-image" src="/resources/storage/' . $new->getIllustration() . '" alt="Preview">';
                                    } else {
                                        echo '<i class="fas fa-file-alt fa-2x"></i>';
                                    }
                                    echo '</td>' ;
                                    echo '<td>' . $new->getPubDate() . '</td>';
                                    echo '<td>';
                                    echo '<button type="submit" value="' . $new->getId() . '" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#newsModal" data-newsid="' . $new->getId() . '">Edit</button> &nbsp;&nbsp;';
                                    echo '<button type="submit" value="' . $new->getId() . '" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal' . $new->getId() . '" data-newsid="' . $new->getId() . '">Delete</button> &nbsp;&nbsp;';
                                    echo '</td>';
                                    echo '</tr>';

                                    echo <<<HTML
                                    <div class="modal fade" id="deleteModal{$new->getId()}" tabindex="-1" aria-labelledby="deleteModalLabel{$new->getId()}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form action="/delete-news" method="POST">
                                                <input hidden type="text" name="new_id" value={$new->getId()}>
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{$new->getId()}">Confirmation de suppression</h5>
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

            <?php include_once('addUpdateNews.php'); ?>

        </div>
        
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>


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

<script>
    $(document).ready(function() {
        $('#userTable').DataTable({
            "dom": 'rtip',
        })

        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                window.editor = editor;
                Editor = editor;
            })
            .catch(error => {
                console.error(error);
            });



        $('#newsModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var newsId = button.data('newsid');
            var modal = $(this);
            if (newsId) {
                $.ajax({
                    url: '/admin/get-news-details/' + newsId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        modal.find('#id').val(data.id);
                        modal.find('#title').val(data.title);
                        modal.find('#author').val(data.author);
                        modal.find('#pubdate').val(data.pubdate);
                        modal.find('#newclass').val(data.newclass);
                        $("#old_illustrationlab").show();
                        modal.find('#old_illustrationlab').val("Old illustration ");
                        $("#old_illustration").show();
                        modal.find('#old_illustration').val(data.illustration);
                        Editor.setData(data.content);
                        modal.find('#head').text('News editing');
                        $('#submit').val('update');
                    },
                    error: function(error) {
                        console.log('Error fetching user details:', error);
                    }
                });
            }
            $('#userModal').on('hidden.bs.modal', function() {
                modal.find('#news_id').val('');
                modal.find('#pubdate').val('');
                modal.find('#content').val('');
                modal.find('#title').text('New registering');
                modal.find('submit').val('create');
            });
        });

    })
</script>

</html>