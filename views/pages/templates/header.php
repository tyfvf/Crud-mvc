<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo self::title.'/'.$arr['title']; ?></title>

    <link href="<?php echo INCLUDE_PATH_FULL ?>css/style.css" rel="stylesheet" href="text/css">
</head>
<body>
    <header>
        <div class="center">
            <div class="logo">
                <h2>CRUD</h2>
            </div>
            <nav class="menu">
                <?php 
                    foreach ($this->menuItems as $key => $value) {
                        echo '<a href="'.INCLUDE_PATH.strtolower(str_replace('us', '', $value)).'">'.$value.'</a>';
                    }
                
                ?>
            </nav>
        </div>
    </header>