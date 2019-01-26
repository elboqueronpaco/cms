<?php

namespace App\Core;

class Layouts
{
    public function __construct($fileView, $data = null)
    {
        if (file_exists("./views/$fileView.view.php")) {
            if (file_exists("./views/Layouts/header.php"))require_once("./views/Layouts/header.php");
            require_once("./views/$fileView.view.php");
            if (file_exists("./views/Layouts/footer.php"))require_once("./views/Layouts/footer.php");
        }else {
            die("$fileView no existe en views");
        }
    }
}