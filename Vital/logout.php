<?php
   //clear all sessions
   session_start();
   //clear sessions one by one & if they were set
   session_destroy();
   session_unset();
   header("location:index.php");
?>