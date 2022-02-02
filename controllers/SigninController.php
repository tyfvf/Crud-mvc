<?php 

    namespace controllers;

    class SigninController extends Controller{

        public function exec(){

            if(isset($_POST['newUser'])){
                $newLogin = $_POST['newLogin'];
                $newPassword = $_POST['newPassword'];
                $newPasswordC = $_POST['newPasswordC'];

                \models\SigninModel::register($newLogin, $newPassword, $newPasswordC);

            }

            if(isset($_POST['user'])){
                $loginUser = $_POST['loginUser'];
                $passwordUser = $_POST['passwordUser'];

                if(\models\SigninModel::auth($loginUser,$passwordUser)){
                    echo '<script>location.href="'.INCLUDE_PATH.'user"</script>';
                    die();
                }else{
                    echo '<script>alert("Wrong login or password, please try again")</script>';
                }
            };

            \Router::route('signin', function(){
                $this->view = new \Views\MainView('signin');
                $this->view->render(array('title'=>'Sign In!'));
            });

            \Router::route('signin/up', function(){
                $this->view = new \Views\MainView('signin-up');
                $this->view->render(array('title'=>'Sign Up!'));
            });
        }

    }


?>