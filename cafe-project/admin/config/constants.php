<?php
   session_start();
   define('SITEURL', 'http://localhost:8080/cafe-project/');
    define('LOCALHOST','localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','cafe-project');
    
    $conn = mysqli_connect(LOCALHOST,DB_USERNAME, DB_PASSWORD);
    $db_select =mysqli_select_db($conn, DB_NAME);

?>
  