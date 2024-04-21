<?php

    namespace Controllers;

    session_start();

    class HomeController extends Controller
    {

        public function index() {
            $this->view('Home');
        }

        public function mention() {
            $this->view("mentionLegale");
        }

        public function error() {
            $this->view("Error");
        }
    }
