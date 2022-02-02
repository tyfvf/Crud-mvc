<?php 

    session_start();

    if(!isset($_SESSION['login'])){
        echo '<script>location.href="'.INCLUDE_PATH.'"</script>';
        die();
    }

?>

<div class="title">
    <h2>Make a new Image!</h2>
</div>

<div class="position-absolute top-50 start-50 translate-middle">
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="file" class="form-label">Upload the file</label>
            <input id="file" type="file" class="form-control" aria-describedby="fileHelp" name="file" required>
            <div id="fileHelp" class="form-text">Only png and jpg, max 2mb</div>
        </div>
        <button type="submit" class="btn btn-primary" name="upload">Submit</button>
    </form>
</div>

