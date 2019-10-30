<?php
  /* config --- add your table name -- username -- server */
  $server = 'localhost';
  $user = 'root'; 
  $db_name = 'table name';
  $db = mysqli_connect($server, $user, '', $db_name);

  
  /* config charset */
  mysqli_query($db, "SET NAMES utf8");

  /* init session */
  if (!isset($_SESSION)){
    session_start();
  }
  
?>