<?php 

    class Router{
        public static function route($path, $arg){
            $url = @$_GET['url'];
            if($url == $path){
                $arg();
                die();
            }

            $path = explode('/', $path);
            $url = explode('/', @$_GET['url']);
            $ok = true;
            $even = [];

            if(count($path) == count($url)){
                foreach ($path as $key => $value) {
                    if($value == '?'){
                        $even[$key] = $url[$key];
                    }else if($url[$key] != $value){
                        $ok = false;
                        break;
                    }
                }

                if($ok){
                    $arg($even);
                    die();
                }
            }
        }
    }

?>