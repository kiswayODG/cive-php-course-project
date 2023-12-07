<div class=" modal" id="userModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">User registering</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">

                <input type="hidden" name="user_id" value="<?php echo isset($editUserId) ? $editUserId : ''; ?>">

                    <div class="mb-3">
                        <label for="uname" class="form-label ">Username</label>
                        <input type="text" class="form-control" id="uname" value="<?php echo isset($fname) ? $uname : ''; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label ">Email</label>
                        <input type="email" class="form-control" id="email" value="<?php echo isset($email) ? $email : ''; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label ">Password</label>
                        <input type="password" class="form-control sm-4" id="password" aria-describedby="emailHelp" > 
                        <div id="password" class="form-text">We'll never share your password with anyone else.
                        </div>
                    </div>

                   
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Validate</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>