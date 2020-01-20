<?php
/*database configuration*/
define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '123');
define('DATABASE', 'sunriseclick');

/*database connection function*/
function DB()
{
    try {
        $db = new PDO('mysql:host='.HOST.';dbname='.DATABASE.'', USER, PASSWORD);
        return $db;
    } catch (PDOException $e) {
        return "Error!: " . $e->getMessage();
        die();
    }
}
