<?php 

    session_start();

    if(!isset($_SESSION['login'])){
        echo '<script>location.href="'.INCLUDE_PATH.'"</script>';
        die();
    }

    $sql = \MySql::connect()->prepare("SELECT * FROM `images`");
    $sql->execute();
    $fetch = $sql->fetchAll();

?>

<div class="container">
    <h1 class="title">Change a name!</h1>
    <table class="table">
        <thead>
            <th>Image</th>
            <th>Old name</th>
            <th>New name</th>
        </thead>
        <tbody>
            <?php foreach($fetch as $key => $value) : ?>
            <tr>
                <td><img width="200" class="img-fluid img-thumbnail" src="<?php echo INCLUDE_PATH.$value['path']; ?>"></td>
                <td><?php echo $value['name']; ?></td>
                <td><form method="post"><input type="text" class="form-control" name="<?php echo $value['id'];?>" required><button type="submit" class="btn btn-primary" name="submit">Change Name</button></form></td>
            </tr>
            <?php
            if(isset($_POST['submit'], $_POST[$value['id']])){

                $newName = $_POST[$value['id']];
                $id = $value['id'];
        
                $update = \MySql::connect()->prepare("UPDATE `images` SET name='$newName' WHERE id='$id'");
                
                if($update->execute()){
                    echo '<script>alert("Name changed with sucess!!")</script>';
                    echo '<script>location.href="'.INCLUDE_PATH.'/admin/update"</script>';
                    die();
                }else{
                    echo '<script>alert("Failed to change name, please try again!")</script>';
                }

                
            }    
            endforeach; 
            ?>
        </tbody>
    </table>
</div>