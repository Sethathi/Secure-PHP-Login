<?php

require 'Session.php';


/**
 * Here forms will be redirected to appropriate controllers
 */
$sess = new Session();
$sess->setVariable('POST', $_POST);

/* url to redrect to */
$url = $_POST['relay'].'Controller.php';

$sess->redirect($url);
?>
