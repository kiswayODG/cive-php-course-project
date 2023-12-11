
<div class=" modal" id="userModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="title">Class registration</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="/admin/store-news-class" method="POST">

                <input hidden  name="class_id" id="id" >

                    <div class="mb-3">
                        <label for="cname" class="form-label ">Class name</label>
                        <input type="text" class="form-control" name="cname" id="cname">
                    </div>

                    <div class="mb-3">
                        <label for="desc" class="form-label ">Description</label>
                        <input type="text" class="form-control" name="desc" id="desc" >
                    </div>


                   
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="submit" value="create" id="submit" class="btn btn-success">Validate</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>