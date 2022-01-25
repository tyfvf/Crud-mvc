<?php 

    namespace Views;


    class MainView{

        private $fileName;
        private $header;
        private $footer;

        public function __construct($fileName,$header = 'header',$footer = 'footer')
        {
            $this->fileName = $fileName;
            $this->header = $header;
            $this->footer = $footer;
        }

        public function render($arr = []){
            include('pages/templates/'.$this->header.'.php');
            include('pages/'.$this->fileName.'.php');
            include('pages/templates/'.$this->footer.'.php');
        }
    }

?>