<?php
if(logged_in()){
    if(isset($_GET['menu']) && $_GET['menu']== 9) {
        session_unset();
        session_destroy();
        echo '<p class="success">Uspješna Odjava.</p>';
        header( "refresh:3;url=index.php" );
    }
}
?>