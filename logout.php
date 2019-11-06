<?php
session_start();
session_unset();
session_destroy();
echo "<script type='text/javascript'>alert('Successfully Logged Off');window.location='index.php';</script>";

?>