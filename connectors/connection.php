<?php 

    $dsn = 'mysql:host=localhost:3306;dbname=training_app';

    $username = 'root';

    $password = '';

    $options = [];

    try {
        $connection = new PDO($dsn, $username, $password, $options);

    } catch(PDOException $e) {

    }




?>