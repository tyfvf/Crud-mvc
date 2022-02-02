<div class="title">
    <h2><?php echo $arr['title']; ?></h2>
</div>

<div class="container">
    <div class="position-absolute top-50 start-50 translate-middle">
        <form method="post">
            <div class="mb-3">
                <label for="newLogin" class="form-label">New Login</label>
                <input type="text" class="form-control" id="newLogin" name="newLogin" required>
            </div>
            <div class="mb-3">
                <label for="newPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="newPassword" name="newPassword" required>
            </div>
            <div class="mb-3">
                <label for="newPasswordC" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="newPasswordC" name="newPasswordC" require>
            </div>
            <button type="submit" class="btn btn-primary" name="newUser">Enter</button>
        </form>
    </div>
</div>