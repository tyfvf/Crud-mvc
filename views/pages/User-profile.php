<?php 

    if(!isset($_SESSION['loginUser'])){
        echo '<script>location.href="'.INCLUDE_PATH.'"</script>';
        die();
    }

    $name = $_SESSION['name'];

    $sql = \MySql::connect()->prepare("SELECT * FROM user WHERE `login` = ?");
    $sql->execute(array($name));
    $fetch = $sql->fetchAll();

?>

<div class="container">
    <div class="row">
        <h1 class="title"><?php echo $arr['title']; ?></h1>
    </div>
    <div class="row">
        <div class="col">
            <img width="380" src="<?php echo INCLUDE_PATH.$fetch[0]['pic']?>" alt="Profile pic">
        </div>
        <div class="col">
            <h2>Your Login:</h2>
            <h4><?php echo $_SESSION['name']?></h4>
        </div>
        <div class="col">
            <h2>Number of img you have:</h2>
            <h4><?php echo $fetch[0]['numberIMGS'] ?></h4>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form method="post" enctype="multipart/form-data" class="pic">
                <div class="mb-3">
                    <input id="file" type="file" class="form-control" aria-describedby="fileHelp" name="file" required>
                    <div id="fileHelp" class="form-text">Only png and jpg, max 2mb</div>
                </div>
                <button type="submit" class="btn btn-primary" name="upload">Change Profile Pic</button>
            </form>
        </div>
    </div>

</div>
