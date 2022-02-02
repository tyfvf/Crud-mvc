<?php 
    session_start();

    if(!isset($_SESSION['login'])){
        echo '<script>location.href="'.INCLUDE_PATH.'"</script>';
        die();
    }

?>

<h1 class="position-absolute top-50 start-50 translate-middle">Welcome admin!</h1>