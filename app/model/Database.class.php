<?php

/**
 * Database server connectivity and database selection
 *
 * @author Sethathi
 */
class Database {

    /**
     * The database server IP
     *
     * @var String
     * @access private
     */
    private $_host = '127.0.0.1';

    /**
     * The username for connect to the database server
     * 
     * @var String
     * @access private
     */
    private $_username = 'root';

    /**
     * The password for connecting to the database server
     * 
     * @var String
     * @access private
     */
    private $_password = '';

    /**
     * The database name
     * 
     * @var String
     * @access private
     */
    private $_db_name = 'webapp';

    /**
     *
     * @var mysqli object
     * @access private
     */
    protected static $_mysqli = null;

    /**
     * Constructor
     * Our constructor will initiate the mysqli object 
     * Afterwards a connection to the database server will be established
     * @access public
     */
    function __construct() {
        /* Create a new mysqli object */
        self::$_mysqli = new mysqli();
        $this->connection();
    }

    /**
     * This function establishes a connection to the database server
     * And selects a database we are going to use
     * @access public
     */
    function connection() {
        try {
            self::$_mysqli->connect($this->_host, $this->_username, $this->_password);
            if (mysqli_connect_error())
                throw new Exception('An error occured ' . mysqli_connect_errno());
            else {

                $this->selectDB();
            }
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    /**
     * Here this function selects a database we are going to use 
     * @access public 
     */
    function selectDB() {
        try {
            self::$_mysqli->select_db($this->_db_name) or die('Could not find database');
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    /**
     * Here we close the connection to the database server with the  destructor
     */
    function __destruct() {
        try {
            //self::$mysqli->close();
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

}

?>
