<?php 

    namespace controllers;

    class HomeController extends Controller{

        public function __construct()
        {
            $this->view = new \Views\MainView('home');
        }

        public function exec(){
            $this->view->render(array('title' => 'Home'));
        }

    }

?>