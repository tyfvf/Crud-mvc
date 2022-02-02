<?php 

    namespace models;

    class SigninModel{

        public static function register($newLogin, $newPassword, $newPasswordC){

            $check = \Mysql::connect()->prepare("SELECT * FROM `user` WHERE login = ?");
            $check->execute(array($newLogin));

            $check->fetchAll();

            if($check->rowCount() >= 1){

                echo '<script>alert("This login already exists, please select another one!")</script>';

            }elseif($newPassword != $newPasswordC){

                echo '<script>alert("Please make sure to confirm the same password in the inputs")</script>';

            }else{

                $register = \MySql::connect()->prepare("INSERT INTO `user` VALUES (null,?,?)");
                $register->execute(array($newLogin, $newPassword));

                echo '<script>alert("Account created with sucess!")</script>';
                echo '<script>location.href="'.INCLUDE_PATH.'/signin"</script>';
                die();

            }
        }

        public static function auth($loginUser, $passwordUser){
            $auth = \MySql::connect()->prepare("SELECT * FROM `user` WHERE `login` = ? AND `password` = ?");
            $auth->execute(array($loginUser, $passwordUser));

            $auth->fetchAll();

            if($auth->rowCount() == 1){
                session_start();
                $_SESSION['loginUser'] = true;
                $_SESSION['name'] = $loginUser;

                return true;
            }else{
                return false;
            }
        }

    }

?>