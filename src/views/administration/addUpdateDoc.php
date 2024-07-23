

<div class="modal" id="docModal" tabindex="-1" role="dialog">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="head">Document adding</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="/admin/store-docs" method="POST" enctype="multipart/form-data">
                <input hidden name="doc_id" id="id">
                <div class="modal-body row">
                    <div class="mb-3">
                        <label for="title" class="form-label">Document Title</label>
                        <input type="text" class="form-control" name="title" id="title">
                    </div>
                    <div class="mb-3">
                        <label for="doc" class="form-label">Document</label>
                        <input type="file" class="form-control" name="doc" id="doc">
                        <br><label style="display: none;" name="oldLabel" id="oldLabel">Old file</label>
                        <input style="display: none;" class="form-control" name="oldname" id="oldname" readonly>
                        
                    </div>

                    <div class="mb-3">
                        <label for="lang" class="form-label">To course</label>
                        <select class="form-control" name="course" id="course">
                            <option value=""></option>
                            <?php foreach ($courses as $course) : ?>
                                <option value="<?php echo $course->getId(); ?>"><?php echo $course->getCourseName(); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="lang" class="form-label">Language</label>
                        <select class="form-control" name="language" id="lang">
                            <?php foreach ($languages as $lang) : ?>
                                <option value="<?php echo $lang->getId(); ?>"><?php echo $lang->getLanguageName(); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="submit" value="create" id="submit" class="btn btn-success">Validate</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>