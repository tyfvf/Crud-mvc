<?php 

    session_start();

    if(!isset($_SESSION['login'])){
        echo '<script>location.href="'.INCLUDE_PATH.'"</script>';
        die();
    }

    if(isset($_FILES['file'])){
        $files = $_FILES['file'];

        if($files['error']){
            die('Error, please try again');
        }

        if($files['size'] > 2097152){
            die('Please upload only images with 2mb or lower');
        }

        $directory = 'images/';
        $fileName = $files['name'];
        $fileNewName = uniqid();
        $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if($extension != 'jpg' && $extension != 'png' ){
            die('Plese be kind and upload only images (jpg and png), security purposes :D');
        }

        $path = $directory . $fileNewName . "." . $extension;

        $ok = move_uploaded_file($files['tmp_name'], $path);

        if($ok){
            $upload = \MySql::connect()->prepare("INSERT INTO images (name, path) VALUES ('$fileName', '$path')");
            $upload->execute();

            echo '<script>alert("Created new image!")</script>';
        }else{
            echo '<script>alert("Error, please try again")</script>';
        }
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

