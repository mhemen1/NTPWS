<?php session_start();

function logged_in() {
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==1) {
        return true;
    }
    else 
    return false;
}
function is_admin() {

    if(logged_in() && $_SESSION['role']=='admin')
        return true;
    else
        return false;
}
function is_user() {
    if(logged_in() && $_SESSION['role']=='user')
    return true;
else
    return false;

}
function is_editor() {
    if(logged_in() && $_SESSION['role']=='editor')
    return true;
else
    return false;

}
?>