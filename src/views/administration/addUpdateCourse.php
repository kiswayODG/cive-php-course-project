<div class="modal" id="coursesModal" tabindex="-1" role="dialog">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="head">Course registration</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="/admin/store-courses" method="POST">
                <input hidden name="course_id" id="id">
                <div class="modal-body row">
                    <div class="mb-3">
                        <label for="title" class="form-label">Course name</label>
                        <input type="text" class="form-control" name="coursename" id="courseName">
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Course introduction</label>
                        <input type="text" class="form-control" name="courseIntroduction" id="courseIntroduction">
                    </div>

                    <div class="mb-3">
                        <label for="provider" class="form-label">Provider</label>
                        <select class="form-control" name="provider" id="provider">
                            <option value="SSPU">SSPU</option>
                            <option value="Huawei">Huawei</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="lang" class="form-label">Document</label>
                        <select class="form-control" name="document" id="document">
                            <option value=""></option>
                        <?php foreach ($documents as $doc) : ?>
                                <option value="<?php echo $doc->getId(); ?>"><?php echo $doc->getTitle(); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Outline</label>
                        <textarea type="text" class="form-control" name="outline" id="outline"></textarea>
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