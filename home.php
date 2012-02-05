<?php
require 'app/Controller/Session.php';

//Here we make sure that a user has logged in before they can view this page
$sess->checkLogin();

//Get user details from a session
$userDetails = $sess->getVariable('userDetails');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/webapp_style.css">
        <title>Webapp :: Home</title>

    </head>
    <body>
<?php
//include the header
include 'header/header.php';
?>

        <div id="LeftDiv">
            <div id="nav-menu">
                <a href="#">Home</a><br />
                <a href="#">Profile</a><br />
                <a href="#">Settings</a><br />

            </div>
        </div>

        <div id="RightDiv">
            Successfully logged in, Welcome
        </div>
        <div id="Footer">
            &copy; 2012 Webapp
        </div>
    </body>
</html>
