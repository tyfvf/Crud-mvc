<?php 

    define('INCLUDE_PATH', 'http://localhost/crud_mvc/');
    define('INCLUDE_PATH_FULL', 'http://localhost/crud_mvc/Views/pages/');
    class Application{

        public function exec(){
            $url = isset($_GET['url']) ? explode('/', $_GET['url'])[0] : 'Home';
            $url = ucfirst($url);
            $url .= "Controller";

            if(file_exists('controllers/'.$url.'.php')){
                $className = 'Controllers\\'.$url;
                $controller = new $className;
                $controller->exec();
            }else{
                die('Page not found!');
            }
        }


    }


?>