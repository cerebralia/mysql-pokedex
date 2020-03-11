<?php

namespace cerebralia\pokedex;

class LoginController
{ /* This should handle the default login logic, or invoke user-defined callbacks for custom authentication. */

    protected function __constructor()
    {
        // constructor of singleton is not public
    }

    protected static $_instance = null;
    public static function i(): LoginController
    {
        /* needed ? -> (!self::$_instance instanceof LoginController) */
        if (empty(self::$_instance)) {
            $customClassFile = __DIR__ . '/custom/login.php';
            $customClassName = 'custom\\LoginController';
            if (file_exists($customClassFile)) {
                include_once __DIR__ . '/custom/login.php';
            }
            if (class_exists($customLoginController)) {
                self::$_instance = new $r();
            } else {
                self::$_instance = new LoginController();
            }
        }
        return self::$_instance;
    }

    public function isLoggedIn(): bool
    {
        return false; //todo: implement!
    }


    // todo: add other members

}
