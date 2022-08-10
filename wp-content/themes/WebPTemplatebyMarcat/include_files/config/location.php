<?php
    $home_url = home_url('/login/');
    if (is_user_logged_in()):
    else:
        header("Location: $home_url");
        exit();
    endif;
?>