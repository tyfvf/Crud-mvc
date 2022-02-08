<?php 

    namespace models;

    class AdminModel{

        public static function auth($login, $password){
            $auth = \MySql::connect()->prepare("SELECT * FROM `admin` WHERE `login` = ? AND `password` = ?");
            $auth->execute(array($login, $password));

            $auth->fetchAll();

            if($auth->rowCount() == 1){
                session_start();
                $_SESSION['login'] = true;

                return true;
            }else{
                return false;
            }
        }

        public static function create($files){

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
                $upload = \MySql::connect()->prepare("INSERT INTO images (name, path) VALUES ('$fileName', '$path')");
                $upload->execute();
    
                echo '<script>alert("Created new image!")</script>';
            }else{
                echo '<script>alert("Error, please try again")</script>';
            }
        }

        public static function update($newName, $id){
                $update = \MySql::connect()->prepare("UPDATE `images` SET name='$newName' WHERE id='$id'");
                
                if($update->execute()){
                    echo '<script>alert("Name changed with sucess!!")</script>';
                    echo '<script>location.href="'.INCLUDE_PATH.'/admin/update"</script>';
                    die();
                }else{
                    echo '<script>alert("Failed to change name, please try again!")</script>';
                }
        }

        public static function delete($id,$path){
            $delete = \MySql::connect()->prepare("DELETE FROM `images` WHERE id='$id'");
                
            if($delete->execute()){
                unlink($path);
                echo '<script>alert("DELETED FROM DATABASE!")</script>';
                echo '<script>location.href="'.INCLUDE_PATH.'/admin/delete"</script>';
                die();
            }else{
                echo '<script>alert("Failed to delete, please try again!")</script>';
            }
        }

    }

?>