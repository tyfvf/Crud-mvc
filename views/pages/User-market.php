<?php 

    if(!isset($_SESSION['loginUser'])){
        echo '<script>location.href="'.INCLUDE_PATH.'"</script>';
        die();
    }

    $sql = \MySql::connect()->prepare("SELECT * FROM `images` WHERE `owner` = 'none'");
    $sql->execute();
    $fetch = $sql->fetchAll();

?>

<div class="container">
    <div class="row">
        <h1 class="title"><?php echo $arr['title']; ?></h1>
    </div>
    <table class="table">
        <thead>
            <th>IMG</th>
            <th>Name</th>
            <th>Upload Date</th>
            <th>Add to your colection?</th>
        </thead>
        <tbody>
            <?php foreach($fetch as $key => $value) : ?>
            <tr>
                <td><img width="200" class="img-fluid img-thumbnail" src="<?php echo INCLUDE_PATH.$value['path']; ?>"></td>
                <td><?php echo $value['name'];?></td>
                <td><?php echo date('d/m/Y H:i', strtotime($value['upload_datetime'])) ?></td>
                <td><form method="post"><button type="submit" class="btn btn-primary" name="<?php echo $value['id']?>">Add to my collection</button></form></td>
            </tr>
            <?php

            if(isset($_POST[$value['id']])){

                $id = $value['id'];
                $login = $_SESSION['name'];

                \models\UserModel::addCollection($id,$login);

            }    
        
            endforeach; 
            
            ?>
        </tbody>
    </table>

</div>