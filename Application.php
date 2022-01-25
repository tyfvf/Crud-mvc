<?php 

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
                die('Controller not found!');
            }
        }


    }


?>