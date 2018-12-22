<?php
require('./includes/config.inc.php');
include('./includes/header.php');
require(MYSQL);
require('./includes/form_functions.inc.php');

//untuk testing user
$_SESSION['user_id'] = 1;
$_SESSION['user_type'] = 'admin';

// session_destroy();

// LOGGING IN halaman 91
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('./includes/login.inc.php');
}

?>

<h3>Welcome</h3>
<p>Welcome to Knowledge is Power, a site dedicated to keeping you up to date on the Web security and programming information you need to know. Blah, blah, blah. Yadda, yadda, yadda.</p>

<?php
include('./includes/footer.php');
?>