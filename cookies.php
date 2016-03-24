<?php

session_start();
$session_id = session_ID();

if(isset($_COOKIE[$session_id])) {
    
} else {
    setcookie($session_id, $session_id, time() + (86400 * 40));
}

?>