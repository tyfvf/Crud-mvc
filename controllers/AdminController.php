<?php 

    namespace controllers;

    class AdminController extends Controller{

        public function exec()
        {
            if(isset($_POST['action'])){
                $login = $_POST['login'];
                $password = $_POST['password'];

                if(\models\AdminModel::auth($login,$password)){
                    echo '<script>location.href="'.INCLUDE_PATH.'admin/login"</script>';
                    die();
                }else{
                    echo '<script>alert("Wrong login or password, please try again")</script>';
                }
            }

            \Router::route('admin/login', function(){
                $this->view = new \Views\MainView('admin-login','headerAdmin');
                $this->view->render(array('title'=>'Welcome admin!'));
            });


            \Router::route('admin', function(){
                $this->view = new \Views\MainView('admin');
                $this->view->render(array('title' => 'Administrator'));
            });
        }

    }


?>