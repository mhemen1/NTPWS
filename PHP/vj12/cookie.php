<?php 
if($_GET['action']== 1) {
setcookie('news_title_1', "US growth faster than expected", 86400, "/");
echo $_COOKIE['news_title_1'];
header("Location:index.php?menu=2&action=1");
}
if($_GET['action']== 2){
setcookie("news_title_2", "Wall Street: Tech firm surge pushes US markets higher", 86400, "/");
header("Location:index.php?menu=2&action=2");
}
if($_GET['action']==3){
setcookie("news_title_3", "Hotel booking sites probed by consumer watchdog", 86400, "/");
header("Location:index.php?menu=2&action=3");
}
?>