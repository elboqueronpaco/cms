<?php

function urlBase()
{
    return $_SERVER["REQUEST_SCHEME"]. "://" . $_SERVER['SERVER_NAME'] . "/" . APP_NAME . "/";
}