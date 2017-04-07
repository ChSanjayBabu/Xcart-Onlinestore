<?php
    function logout()
    {
        // unset any session variables
        $_SESSION = [];

        // expire cookie
        if (!empty($_COOKIE[session_name()]))
        {
            setcookie(session_name(), "", time() - 42000);
        }
        // destroy session
        session_destroy();
    }
    
    function redirect($location)
    {
        if (headers_sent($file, $line))
        {
            trigger_error("HTTP headers already sent at {$file}:{$line}", E_USER_ERROR);
        }
        header("Location: {$location}");
        exit;
    }
    
    function render($view, $values = [])
    {
        if ($view == "header.php")
        {

                // extract variables into local scope
                extract($values);    
                require("../views/{$view}");
        }
        // if view exists, render it
        else if (file_exists("../public_html/{$view}"))
        {
            // extract variables into local scope
            extract($values);

            require("../public_html/{$view}");
        }

        // else err
        else
        {
            trigger_error("Invalid view: {$view}", E_USER_ERROR);
        }
    }
?>