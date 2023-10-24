<?php
class ValidateSession
{
    public static function invoke()
    {
        session_start();
        if (!isset($_SESSION['login'])) {
            header('location: ' . constant('URL'));
        }
    }
}
