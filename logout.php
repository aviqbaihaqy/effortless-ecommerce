<?php
require('./includes/config.inc.php');
require(MYSQL);
require('./includes/form_functions.inc.php');

redirect_invalid_user();
$_SESSION = array( );
session_destroy();
setcookie(session_name(), '', time()-300);
$page_title = 'Logout';

include('./includes/header.php');
echo '<h3>Logged Out</h3><p>Thank you for visiting. You are now logged out. Please come back soon!</p>';
include('./includes/footer.php');
