<?php

namespace Controllers;

class Controller 
{
    /**
     * 
     * @param $file à afficher.
     */
    public function view($file, $data = []) {
        $path = "View/".$file.".php.";

        if (file_exists($path)) {

            if (!empty($data)) {
                extract($data);
            }

            include($path);
        } else {
            include("View/Error.php");
        }
    }

}

