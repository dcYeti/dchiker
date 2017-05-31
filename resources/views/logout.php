<?php
setcookie('yoga', FALSE, time()-600);
session_start();
unset($_SESSION);
$_SESSION = array();
session_destroy();
$loggedIn = false;
$pageTitle = "dcHIKER - You Are Now Logged Out";
include("template_head.html");
?>
<div id="main_container"><div class = "hiker_form">
<h4>You are now logged out!</h4>
</div></div></body></html>