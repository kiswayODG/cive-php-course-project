<div class="modal" id="newsModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="head">News registration</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="/admin/store-news" method="POST" enctype="multipart/form-data">
                <input hidden name="news_id" id="id">
                <div class="modal-body row">
                    <input hidden type="text" value='2' name="language">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="title" class="form-label">News Title</label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>
                        <div class="mb-3">
                            <label for="author" class="form-label">Author</label>
                            <select class="form-control" name="author" id="author">
                                <?php foreach ($users as $user) : ?>
                                    <option value="<?= $user->getId(); ?>"><?= $user->getUsername(); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="pubdate" class="form-label">Publication Date</label>
                            <input type="datetime-local" class="form-control" name="pubdate" id="pubdate">
                        </div>
                        <div class="mb-3">
                            <label for="newclass" class="form-label">News Class</label>
                            <select class="form-control" name="newclass" id="newclass">
                                <?php foreach ($classes as $class) : ?>
                                    <option value="<?php echo $class->getId(); ?>"><?php echo $class->getClassName(); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <label for="illustration" class="form-label">Illustration</label>
                            <input type="file" class="form-control" name="illustration" id="illustration">
                            <br>
                            <label style="display: none;" for="old_illustration" class="form-label" id="old_illustrationlab">Old Illustration</label>
                            <input type="text" style="display: none;" class="form-control" name="old_illustration" id="old_illustration">
                        </div>

                        <div class="mb-3" id="container">
                            <label for="content" class="form-label">Content</label>
                            <textarea style="height: 300px;" class="form-control" name="content" id="editor"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" name="submit" value="create" id="submit" class="btn btn-success">Validate</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>