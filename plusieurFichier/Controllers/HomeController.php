<?php

    namespace Controllers;
    // require_once 'Controller.php';
    // use Controllers\Controller;

    class HomeController
    {
        public function view($url) {
            return "View/".$url.".php";
        }

        public function index() {
            $path = $this->view('Home');

            if (file_exists($path)) {
                include($path);
            } else {
                include $this->view('Error');
            }
        }

        public function mention() {
            $path = $this->view("mentionLegale");
            
            if (file_exists($path)) {
                include($path);
            } else {
                include $this->view('Error');
            }
        }
    }
