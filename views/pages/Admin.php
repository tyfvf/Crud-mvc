<?php 

    if(isset($_SESSION['login'])){
        echo '<script>location.href="'.INCLUDE_PATH.'admin/login"</script>';
        die();
    }

?>

<div class="title">
    <h2><?php echo $arr['title']; ?></h2>
</div>

<div class="container">
    <div class="position-absolute top-50 start-50 translate-middle">
        <form method="post">
            <div class="mb-3">
                <label for="loginAdmin" class="form-label">Your Login</label>
                <input type="text" class="form-control" id="loginAdmin" name="login" required>
            </div>
            <div class="mb-3">
                <label for="passwordAdmin" class="form-label">Password</label>
                <input type="password" class="form-control" id="passwordAdmin" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary" name="action">Enter</button>
        </form>
    </div>
</div>