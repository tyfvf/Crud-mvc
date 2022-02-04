<?php 

    namespace controllers;

    if(session_start() == null){
        session_start();
    }

    class UserController extends Controller{

        public function exec(){

            if(isset($_FILES['file'])){
                $files = $_FILES['file'];
                $name = $_SESSION['name'];

                \models\UserModel::pic($files, $name);
            }

            \Router::route('user', function(){
                $this->view = new \Views\MainView('user','headerUser');
                $this->view->render(array('title'=>'Welcome!'));
            });

            \Router::route('user/myprofile', function(){
                $this->view = new \Views\MainView('user-profile','headerUser');
                $this->view->render(array('title'=>'My profile'));
            });

            \Router::route('user/imgs', function(){
                $this->view = new \Views\MainView('user-imgs', 'headerUser');
                $this->view->render(array('title'=>'My IMGs'));
            });

            \Router::route('user/market', function(){
                $this->view = new \Views\MainView('user-market', 'headerUser');
                $this->view->render(array('title'=>'Market'));
            });

        }

    }

?>