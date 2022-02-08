<?php 

    namespace models;

    class UserModel{

        public static function pic($files, $name){

            if($files['error']){
                die('Error, please try again');
            }
    
            if($files['size'] > 2097152){
                die('Please upload only images with 2mb or lower');
            }
            $directory = 'images/';
            $fileName = $files['name'];
            $fileNewName = uniqid();
            $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    
            if($extension != 'jpg' && $extension != 'png' ){
                die('Plese be kind and upload only images (jpg and png), security purposes :D');
            }
    
            $path = $directory . $fileNewName . "." . $extension;
    
            $ok = move_uploaded_file($files['tmp_name'], $path);
    
            if($ok){
                $delete = \MySql::connect()->prepare("SELECT * FROM `user` WHERE `login` = ?");
                $delete->execute(array($name));
                $fetch = $delete->fetchAll();
                if($fetch[0]['pic'] !== 'images/default-user-image.png'){
                    unlink($fetch[0]['pic']);
                }

                $update = \MySql::connect()->prepare("UPDATE `user` SET `pic` = ? WHERE `login` = ?");
                $update->execute(array($path,$name));
    
                echo '<script>alert("Changed profile pic!")</script>';
            }else{
                echo '<script>alert("Error, please try again")</script>';
            }
        }

        public static function addCollection($id, $login){

            $number = \MySql::connect()->prepare("UPDATE `user` SET `numberIMGS` = `numberIMGS` + 1 WHERE `login` = ?");

            $sql = \MySql::connect()->prepare("UPDATE `images` SET `owner` = ? WHERE `id` = ?");

            if($sql->execute(array($login, $id)) && $number->execute(array($login))){
                echo '<script>alert("IMG added to your collection!")</script>';
                echo '<script>location.href="'.INCLUDE_PATH.'/user/market"</script>';
                die();
            }else{
                echo '<script>alert("Error, please try again!")</script>';
            }

        }

    }


?>