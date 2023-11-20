<?php

include 'conn.php';

session_start();
session_unset();
session_destroy();

header('location:./sample/Landing.html');

?>