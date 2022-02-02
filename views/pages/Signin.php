<div class="title">
    <h2><?php echo $arr['title']; ?></h2>
</div>

<div class="container">
    <div class="position-absolute top-50 start-50 translate-middle">
        <form method="post">
            <div class="mb-3">
                <label for="loginUser" class="form-label">Your Login</label>
                <input type="text" class="form-control" id="loginUser" name="loginUser" required>
            </div>
            <div class="mb-3">
                <label for="passwordUser" class="form-label">Password</label>
                <input type="password" class="form-control" id="passwordUser" name="passwordUser" required>
            </div>
            <div class="mb-3">
                <a href="<?php echo INCLUDE_PATH.'signin/up'?>">Sign Up?</a>
            </div>
            <button type="submit" class="btn btn-primary" name="user">Enter</button>
        </form>
    </div>
</div>