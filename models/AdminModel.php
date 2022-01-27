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

    }

?>