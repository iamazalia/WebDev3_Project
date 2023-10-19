<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalLabel">Edit Users</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <!-- user form  -->

                <form action="./php/users/editUser.php" method="POST" id="editUserForm">
                    <input type="hidden" name="id" id="id">
                    <div class="form-floating mb-3">
                        <input type="text" name="firstname" class="form-control" id="firstname" placeholder="name@example.com" autofocus required>
                        <label for="floatingInput">Firstname</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="lastname" class="form-control" id="lastname" placeholder="name@example.com" autofocus required>
                        <label for="floatingInput">Lastname</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="gender" class="form-control" id="gender" placeholder="name@example.com" autofocus required>
                        <label for="floatingInput">Gender</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" autofocus required>
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="password" placeholder="name@example.com" autofocus required>
                        <label for="floatingInput">Password</label>
                    </div>

                    <select class="form-select mb-3" name="role" id="role" aria-label="Default select example">
                        <option selected disabled>Choose Role</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>

                    </select>
                    <select class="form-select" name="status" id="status" aria-label="Default select example">
                        <option selected disabled>Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>

                    </select>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit" name="saveUser">Save Changes</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>



<!-- announcement modal  -->
<div class="modal fade" id="announcementModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="announcementModalLabel">Create Announcement</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="php/announcements/addAnnouncement.php" method="POST" id="announcementForm">
                    <input type="hidden" name="id" id="announcementId">

                    <div class="form-floating mb-3">
                        <input type="text" name="title" class="form-control" id="title" placeholder="Add some title here" autofocus required>
                        <label for="title">Title</label> <!-- Changed 'for' attribute value -->
                    </div>

                    <div class="form-floating">
                        <textarea class="form-control" id="textAreaExample1" rows="5" name="content" required></textarea>
                        <label class="form-label" for="textAreaExample1">Content</label> <!-- Changed 'for' attribute value -->
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit" name="createAnnouncement" id="submitAnnouncementBtn">Create Announcement</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>