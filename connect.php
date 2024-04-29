<?php
   session_start();
   $servername = 'localhost';
   $username = 'root';
   $password = '';
   $dbname = 'login';
   $con = mysqli_connect($servername,$username,$password,$dbname) or die('could not connect to database');
?>