<?php

/**
 * @todo Allow change password
 *
 */
require 'Controller.class.php';
require 'Session.php';
require '../Model/Login.php';


/* @var $_POST array
 * Override the native $_POST array with the one we put in the session in the Relay.php controller
 * since it lost its data in the Relay.php controller
 */
$_POST = $sess->getVariable('POST');

/* @var $username string */
$username = trim($_POST['username']);

/* @var $password string */
$password = trim($_POST['password']);



if (!Controller::validUsername($username))
    $sess->errors['login_username'] = 'Username has to be between 4 & 16 alphanumeric characters!';

if (!Controller::validPassword($password))
    $sess->errors['login_password'] = 'Password has to be between 6 & 16 alphanumeric characters!';

/* Put the errors in a session to have them displayed on the login page */
$sess->setVariable('errors', $sess->errors);

/*
 * Go back to the login page to display errors encountered on the input fields
 */
if (!empty($sess->errors)) {
    $sess->redirect('../../index.php');
} else {

    /* The validateUser method returns an array containing a users' details */
    $userDetails = $login->validateUser($username, $password);
//    echo print_r($userDetails);
    if (!empty($userDetails)) {

        /* After login, put users details in a session 
         * So we can access them later
         */
        $sess->setVariable('userDetails', $userDetails);

        /* Go to the homepage after login */
        $sess->redirect('../../home.php');
    } else {
        $sess->errors['wrong_combination'] = 'Wrong username / password!';
        $sess->setVariable('errors', $sess->errors);

        /* Go to the homepage to diplay the error message */
        $sess->redirect(' ../../');
    }
}
?>