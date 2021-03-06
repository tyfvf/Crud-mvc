<?php 

    namespace controllers;

    if(session_start() == null){
        session_start();
    }

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

            if(isset($_FILES['file'])){
                $files = $_FILES['file'];

                \models\AdminModel::create($files);

            }

            \Router::route('admin/login', function(){
                $this->view = new \Views\MainView('admin-login','headerAdmin');
                $this->view->render(array('title'=>'Welcome admin!'));
            });

            \Router::route('admin/create', function(){
                $this->view = new \Views\MainView('admin-create','headerAdmin');
                $this->view->render(array('title'=>'Create imgs'));
            });

            \Router::route('admin/read', function(){
                $this->view = new \Views\MainView('admin-read','headerAdmin');
                $this->view->render(array('title'=>'All images'));
            });

            \Router::route('admin/update', function(){
                $this->view = new \Views\MainView('admin-update', 'headerAdmin');
                $this->view->render(array('title' => 'Update names'));
            });

            \Router::route('admin/delete', function(){
                $this->view = new \Views\MainView('admin-delete', 'headerAdmin');
                $this->view->render(array('title' => 'Delete'));
            });


            \Router::route('admin', function(){
                $this->view = new \Views\MainView('admin');
                $this->view->render(array('title' => 'Administrator'));
            });
        }

    }


?>