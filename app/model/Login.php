<?php

require_once 'Database.class.php';

class Login extends Database {

    /**
     * We will use this mysqli object to perform database queries
     * @var type MySqli $mysqli
     */
    protected static $_mysqli = null;

    function __construct() {
        parent::__construct();

        // We use the mysqli object already created in the parent class
        self::$_mysqli = Database::$_mysqli;

        // protected $mysqli = parent::$mysqli;
    }

    /**
     * Check if a user exists in the database
     * @param string $uname
     * @param string $pswd
     * @return boolean 
     */
    function validateUser($username, $passsword) {

        $user = null;
        /* Prevent possible SQL Injection with real_escape_string() */
        $username = self::$_mysqli->real_escape_string($username);

        /* Prevent possible SQL Injection with real_escape_string() then encrypt the password with the md5 algorithm */
        $passsword = md5(self::$_mysqli->real_escape_string($passsword));

        /* We use prepared statements */
        $stmt = self::$_mysqli->prepare("SELECT username, fullname FROM users WHERE username=? AND password=?");
        if ($stmt) {

            /* Bind parameters
             */
            $stmt->bind_param("ss", $username, $passsword);
            /* Execute it */
            $stmt->execute();
            /* Bind results */
            $stmt->bind_result($username, $fullname);
            if ($stmt->fetch()) {
                $user['username'] = $username;
                $user['fullname'] = $fullname;
            }

            return $user;
        }
    }

}

/*
 * This object will be available to every script which makes use of this class.
 *  We are instantiating it here is so that we do not do so in every script that uses this 
 */

/* Instantiate the Login class so we can access methods that validate users */
$login = new Login();
?>
