<?php

/**
 * Session
 *
 * @author Seththi
 */
class Session {
    
    /**
     * Errors
     * Every error will be put in this array
     * @var array
     * @example $errors['wrong_username'] = 'Wrong username'
     * @access public
     */
    public $errors = array();

    /**Notifications
     * 
     * Every notification will be in here then put in a session
     * @var tarray 
     */
    public $notification = array();

    /**
     * Start a new session as soon as a new Session instance is created
     */
    function __construct() {
        /* We start a session as soon as an instance of this class is created */
        session_start();
    }

    /**
     * Returnd the value of a session if set, False if not
     * @param String $var 
     * @return boolean session variable value if set, false otherwise
     */
    function getVariable($var) {
        if (isset($_SESSION["$var"]))
            return $_SESSION["$var"];
        else
            return FALSE;
    }

    /**
     * Sets a session variable
     * @param string $var_name
     * @param string $var_value 
     * @return void
     */
    function setVariable($var_name, $var_value) {
        if (!is_string($var_name))
            throw new Exception("Variable name has to be a string");
        else
            $_SESSION["$var_name"] = $var_value;
    }

    /**
     * CheckVariable
     * 
     * Checks if a session variable has been set
     * @param string $var
     * @return boolean true if set false if not
     */
    function checkVariable($var) {
        $isSet = false;
        if (isset($_SESSION["$var"]))
            $isSet = true;
        return $isSet;
    }

    /**
     * CheckLogin
     * To protect pages viewable only to logged in users
     * We check if a user has logged in
     * @return void
     */
    function checkLogin() {
        if (!$this->checkVariable('userDetails')) {
            $sess->errors['request_login'] = 'You have to login first';
            $this->setVariable('errors', $sess->errors);
            $this->redirect('index.php');
        }
    }

    /**
     * Redirect 
     * @param string $url url to redirect to
     * @return void
     */
    function redirect($url) {
        header("Location: $url");
    }

    /**
     * Sets a variable to an empty string as a way of reseting it
     * @param type string
     * @return void
     */
    function resetVariable($var) {
        $_SESSION["$var"] = '';
    }

    /**
     * DestroySession
     * To log a user out
     * destroys and unsets a session
     * @return void
     */
    function destroySession() {
        session_unset();
        session_destroy();
        $this->redirect('index.php');
    }

}

/**
 * We will user this session class instance wherever we need to maniputate sessions
 */
$sess = new Session();
?>
