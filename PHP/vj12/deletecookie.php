<?php
    setcookie('news_title_1', "", time()-86400, "/");
    setcookie('news_title_2', "", time()-86400, "/");
    setcookie('news_title_3', "", time()-86400, "/");
    header("Location:index.php");
    ?>