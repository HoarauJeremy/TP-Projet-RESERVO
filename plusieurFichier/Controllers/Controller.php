<?php
    
    namespace Controllers;

    class Controller
    {
        /**
         * @return mixed $url
         */
        public function view($url) {
            return 'View/'.$url.'.php';
        }
        
        public function get($url, $id) {
            return 'View/'.$url.'.php';
        }
        
        public function insert($url) {
            // return 'View/'.$url.'.php';
        }
        
        public function update($url) {
            return 'View/'.$url.'.php';
        }
        
        public function delete($url) {
            // return 'View/'.$url.'.php';
        }
    }
    