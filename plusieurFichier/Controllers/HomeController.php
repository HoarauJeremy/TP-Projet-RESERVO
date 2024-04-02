<?php

    namespace Controllers;
    // require_once 'Controller.php';
    // use Controllers\Controller;

    class HomeController extends Controller
    {
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
