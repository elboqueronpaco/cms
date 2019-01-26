<?php

namespace App\Core;

class Controller
{
    public function __construct()
    {
        if($_GET && isset($_GET["action"]))
        {
            $action = $_GET['action'];
            if (method_exists($this, $action)) {
                $this->$action();
            }else {
                die("$action no existe");
            }
        }else {
            $action = "index";
            if (method_exists($this, $action)) {
                $this->$action();
            }else {
                die("$action no existe");
            }
        }
    }
}