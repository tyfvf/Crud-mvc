<?php 

    if(!isset($_SESSION['loginUser'])){
        echo '<script>location.href="'.INCLUDE_PATH.'"</script>';
        die();
    }

?>

<h1><?php echo $arr['title']; ?></h1>