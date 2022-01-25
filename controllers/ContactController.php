<?php 

    namespace controllers;

    class ContactController extends Controller{

        public function __construct()
        {
            $this->view = new \Views\MainView('contact');
        }

        public function exec(){

            $this->view->render(array('title' => 'Contact Us'));

        }

    }


?>