<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo self::title.'/'.$arr['title']; ?></title>

    <!--CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
    <link href="<?php echo INCLUDE_PATH_FULL ?>css/style.css" rel="stylesheet" href="text/css">

</head>
<body>
    <?php 
        if(isset($_GET['url'])){
            $url = explode('/', $_GET['url']);
        }else{
            $url[0] = 'home';
        }
     ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">CRUD</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="<?php if($url[0] == 'admin' && $url[1] == 'create'){echo 'nav-link active';}else{echo 'nav-link';}?>" href="<?php if($url[0] == 'admin/create' && $url[1] == 'create'){echo '#';}else{ echo INCLUDE_PATH.'admin/create';}?>">Create</a>
            <a class="nav-link" href="">Read</a>
            <a class="nav-link" href="">Update</a>
            <a class="nav-link" href="">Delete</a>
        </div>
        </div>
            <a class="logoff" href="<?php echo INCLUDE_PATH;?>">Log off</a>
        
    </div>
    </nav>