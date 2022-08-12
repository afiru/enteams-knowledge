<?php
    $home_url = home_url('/wp-login.php/');
    if (is_user_logged_in()):
    else:
        header("Location: $home_url");
        exit();
    endif;
?>