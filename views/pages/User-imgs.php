<?php 

    if(!isset($_SESSION['loginUser'])){
        echo '<script>location.href="'.INCLUDE_PATH.'"</script>';
        die();
    }

    $name = $_SESSION['name'];
    $sql = \MySql::connect()->prepare("SELECT * FROM `images` WHERE `owner` = ?");
    $sql->execute(array($name));
    $fetch = $sql->fetchAll();

?>
<div class="container">
    <div class="row">
        <h1 class="title"><?php echo $arr['title']; ?></h1>
    </div>
    <div class="row">   
        <?php foreach($fetch as $key => $value) : ?>
            <div class="card" style="width: 18rem;">
                <img src="<?php echo INCLUDE_PATH.$value['path']; ?>" class="card-img-top" alt="<?php echo $value['name']; ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $value['name'];?></p>
                </div>
            </div>
        <?php endforeach; ?>    
    </div>
</div>