<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controller
 *
 * @author Sethathi
 */
class Controller {

    function __construct() {
        
    }

    /**
     *
     * @param mixed $username
     * @return boolean 
     */
    static function validUsername($username) {
        $isValid = false;
        if (preg_match("/^[a-zA-Z0-9]{4,16}$/i", $username))
            $isValid = true;

        return $isValid;
    }
    
    
    /**
     *
     * @param mixed $password
     * @return boolean 
     */
    static function validPassword($password) {
        $isValid = false;
        if (preg_match("/^[a-z0-9]{6,20}$/i", $password))
            $isValid = true;
        return $isValid;
    }

    
}

?>
