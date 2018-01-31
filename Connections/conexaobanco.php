<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conexaobanco = "localhost";
$database_conexaobanco = "db_fazfesta";
$username_conexaobanco = "lopes";
$password_conexaobanco = "123";
$conexaobanco = mysql_pconnect($hostname_conexaobanco, $username_conexaobanco, $password_conexaobanco) or trigger_error(mysql_error(),E_USER_ERROR); 
?>