<?php
/*
 * Here we destroy the session when a user logs out and redirects them to the homepage
 */
require 'app/Controller/Session.php';



/* Here we destroy the session so we can log the user out */
$sess->destroySession();


?>
