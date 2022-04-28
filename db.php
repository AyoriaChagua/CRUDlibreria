<?php

    session_start();
    
    define('hostname', 'localhost');
    define('data_base_user', 'root');
    define('data_base_password', '');
    define('data_base_name', 'biblioteca');

    $conn = mysqli_connect(
        hostname,
        data_base_user,
        data_base_password,
        data_base_name
    );

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
?>