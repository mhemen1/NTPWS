<?php
if(logged_in()){
    if(isset($_GET['menu']) && $_GET['menu']== 9) {
        session_unset();
        session_destroy();
    }
}
?>