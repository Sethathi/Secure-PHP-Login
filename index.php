<?php
require 'app/Controller/Session.php';

$errors = $sess->getVariable('errors');
$notification = $sess->getVariable('notification');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/webapp_style.css">
        <script src="js/validation.js" type="text/javascript">
    
        </script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
        <script src="js/jquery.validate.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/validation.js"></script>
        <title>Webapp  :: Welcome</title>

    </head>
    <body>
        <div id="header">
            <div id="widgetBar">
                <div class="actions">
                    <a href="register.php">[ Register ]</a>
                </div>
            </div>
            <a href="#">
                <img src="css/logo-main.png" id="logo" alt="Quiz App logo" />
            </a>
            <img src="css/logo.png" id="logobg" alt="the Quiz App" />
        </div>

        <div id="LeftDiv">
            <div id="login-bg">
                <span class="error">

                </span>
                <form action="app/controller/Relay.php" name="form" method="POST" id="form" >
                    <table border="0">
                        <thead>
                            <tr>
                                <th >Login</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span class="error">                                        <?= empty($errors['wrong_combination']) ? '' : $errors['wrong_combination'] . '<br /><br />' ?>
                                    </span>
                                    Username:<input type="text" name="username" class="fields" id="uname" value="" /><br />
                                    <span class="error">
                                        <?= empty($errors['login_username']) ? '' : $errors['login_username'] ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>Password:<input type="password" class="fields" name="password" value="" /> <br />
                                    <input type="hidden" name="relay" value="login" />
                                    <span class="error">
                                        <?= empty($errors['login_password']) ? '' : $errors['login_password'] ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>

                                <td><input type="submit" class="login_btn" value="Login" /> <input type="reset" class="calcel_btn" value="Cancel" /></td>
                            </tr>
                        </tbody>
                    </table>
                </form>

            </div>
        </div>

        <div id="RightDiv">

        </div>
        <div id="Footer">
            &copy; 2012 Webapp 
        </div>
    </body>
</html>
<?php
/* Remove errors messages in the $errors array */
$sess->resetVariable('errors');
?>