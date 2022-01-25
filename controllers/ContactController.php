<?php 

    namespace controllers;

    class ContactController extends Controller{

        public function __construct()
        {
            $this->view = new \Views\ContactView('contact');
        }

        public function exec(){

            $this->view->render();

        }

    }


?>