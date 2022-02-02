<?php 

    session_start();

    if(!isset($_SESSION['loginUser'])){
        echo '<script>location.href="'.INCLUDE_PATH.'"</script>';
        die();
    }

?>

<h1 class="position-absolute top-50 start-50 translate-middle">Welcome <?php echo $_SESSION['name']?>!</h1>