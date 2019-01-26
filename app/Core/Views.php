<?php

namespace App\Core;

class Views
{
    public function __construct($fileView, $data = null)
    {
        if (file_exists("./views/$fileView.view.php")) {
            require_once("./views/$fileView.view.php");
        }else {
            die("$fileView no existe en views");
        }
    }
}