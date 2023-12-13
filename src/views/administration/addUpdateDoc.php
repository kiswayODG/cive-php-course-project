<div class="modal" id="docModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="head">Document adding</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="/admin/store-docs" method="POST" enctype="multipart/form-data">
                <input hidden name="doc_id" id="id">
                <div class="modal-body row">
                    <input hidden type="text" value='2' name="language">

                    <div class="mb-3">
                        <label for="title" class="form-label">Document Title</label>
                        <input type="text" class="form-control" name="title" id="title">
                    </div>
                    <div class="mb-3">
                        <label for="doc" class="form-label">Document</label>
                        <input type="file" class="form-control" name="doc" id="doc">
                        <br><input style="display: none;" class="form-control" name="oldFile" id="oldFile" readonly>
                        <input type="hidden" name="currentDocPath" id="currentDocPath">
                    </div>

                    <div class="mb-3">
                        <label for="lang" class="form-label">Language</label>
                        <select class="form-control" name="lang" id="lang">
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