<?php 

    if(!isset($_SESSION['login'])){
        echo '<script>location.href="'.INCLUDE_PATH.'"</script>';
        die();
    }

    $sql = \MySql::connect()->prepare("SELECT * FROM `images`");
    $sql->execute();
    $fetch = $sql->fetchAll();

?>

<div class="container">
    <h1 class="title">Delete an IMG :(</h1>
    <table class="table">
        <thead>
            <th>Image</th>
            <th>Delete?</th>
        </thead>
        <tbody>
            <?php foreach($fetch as $key => $value) : ?>
            <tr>
                <td><img width="200" class="img-fluid img-thumbnail" src="<?php echo INCLUDE_PATH.$value['path']; ?>"></td>
                <td><form method="post"><button type="submit" class="btn btn-danger" name="<?php echo $value['id']?>">Delete from database</button></form></td>
            </tr>
            <?php
            if(isset($_POST[$value['id']])){

                $id = $value['id'];
                $path = $value['path'];

                \models\AdminModel::delete($id, $path);

            }    
            endforeach; 
            ?>
        </tbody>
    </table>
</div>