<?php 

    namespace controllers;

    class UserController extends Controller{

        public function exec(){

            \Router::route('user', function(){
                $this->view = new \Views\MainView('user');
                $this->view->render(array('title'=>'Welcome!'));
            });

        }

    }

?>