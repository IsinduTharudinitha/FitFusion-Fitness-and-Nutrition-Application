<?php

Trait Controller {
    public function view($name, $data = []) {
        // check if any data is passed
        if(!empty($data)) {
            extract($data);
        }

        $filename = "../app/views/" . $name . ".view.php";
        if(file_exists($filename)) {
            require $filename;
        } else {
            $filename = "../app/views/404.view.php";
            require $filename;
        }
    }
}