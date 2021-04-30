<?php
    // a Session can be thought as a temporary variable. When you log in you usually want to store that information.
    session_start(); // I have to run this function in order to use sessions. Since I have this function in session_helper, I just
                        // have to run this file to start sessions.

    // Flash message helper
    // Example - flash('register_success', 'You are now registered');
    // Display in view - <?php echo flash('register_success'); ? >
    function flash($name = '', $message = '', $class = 'alert alert-success')
    {
        if (!empty($name)) {
            if (!empty($message) && empty($_SESSION[$name])) {
                if (!empty($_SESSION[$name])) {
                    unset($_SESSION[$name]); // Making sure that if is not empty it is.
                }
                if (!empty($_SESSION[$name . '_class'])) {
                    unset($_SESSION[$name . '_class']); // Making sure that if is not empty it is.
                }
                $_SESSION[$name] = $message;
                $_SESSION[$name . '_class'] = $class;
            } elseif (empty($message) && !empty($_SESSION[$name])) {
                $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
                echo '<div class="' . $class . '" id="msg-flash">' . $_SESSION[$name] . '</div>';
                unset($_SESSION[$name]);
                unset($_SESSION[$name . '_class']);
            }
        }
    }

    function isLoggedIn(){
        if(isset($_SESSION['user_id'])){
            return true;
        } else {
            return false;
        }
    }


