<?php 

    namespace controllers;

    class AboutController extends Controller{

        public function __construct()
        {
            $this->view = new \Views\MainView('about');
        }

        public function exec(){

            $this->view->render(array('title' => 'About Us'));

        }

    }


?>