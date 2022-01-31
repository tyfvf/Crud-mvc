<?php 
    session_start();

    if(!isset($_SESSION['login'])){
        echo '<script>location.href="'.INCLUDE_PATH.'"</script>';
        die();
    }

?>

<h1>Welcome admin!</h1>