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
    <h1 class="title">All images in the database!</h1>
    <table class="table">
        <thead>
            <th>Preview</th>
            <th>File name</th>
            <th>Upload Date</th>
        </thead>
        <tbody>
            <?php foreach($fetch as $key => $value) : ?>
            <tr>
                <td><img width="200" class="img-fluid img-thumbnail" src="<?php echo INCLUDE_PATH.$value['path']; ?>"></td>
                <td><a target="_blank" href="<?php echo INCLUDE_PATH.$value['path']; ?>"><?php echo $value['name']; ?></a></td>
                <td><?php echo date('d/m/Y H:i', strtotime($value['upload_datetime'])) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
