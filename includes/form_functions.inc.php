<?php

/**
 * halaman 75
 *
 * @param [type] $name
 * @param [type] $type
 * @param [type] $errors
 * @return void
 */
function create_form_input($name, $type, $errors)
{
    $value = false;
    if (isset($_POST[$name])) {
        $value = $_POST[$name];
    }
    if ($value && get_magic_quotes_gpc()) {
        $value = stripslashes($value);
    }
    
    if (($type == 'text') || ($type == 'password')) {
        echo '<input type="' . $type . '" name="' . $name . '" id="' . $name . '"';
        if ($value) {
            echo ' value="' . htmlspecialchars($value) . '"';
        }
        if (array_key_exists($name, $errors)) {
            echo 'class="error" /> <span class="error">' . $errors[$name] .'</span>';
        } else {
            echo ' />';
        }
    } elseif ($type == 'textarea') {
        if (array_key_exists($name, $errors)) {
            echo ' <span class="error">' . $errors[$name] . '</span>';
        }
        echo '<textarea name="' . $name . '" id="' . $name . '" rows="5" cols="75"';
        if (array_key_exists($name, $errors)) {
            echo ' class="error">';
        } else {
            echo '>';
        }
        if ($value) {
            echo $value;
        }
        echo '</textarea>';
    } // End of primary IF-ELSE.
} // End of the create_form_input( ) function.


/**
 * Protecting Passwords halaman 77
 *
 * @param [type] $password
 * @return void
 */
function get_password_hash($password)
{
    global $dbc;
    return mysqli_real_escape_string($dbc, hash_hmac('sha256', $password, 'c#haRl891', true));
}

/**
 * Redirecting the Browser halaman 79
 *
 * @param string $check
 * @param string $destination
 * @param string $protocol
 * @return void
 */
function redirect_invalid_user($check = 'user_id', $destination = 'index.php', $protocol = 'http://')
{
    if (!headers_sent()) {
        // Redirect code.
        if (!isset($_SESSION[$check])) {
            $url = $protocol . BASE_URL . $destination;
            header("Location: $url");
            exit();
        }
    } else {
        include_once('./includes/header.php');
        trigger_error('You do not have permission to access this page. Please login and try again.');
        include_once('./includes/footer.php');
    }
}
