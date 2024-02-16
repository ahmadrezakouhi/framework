<?php

use app\core\Application;

class m00001_users{
    public function up(){

        $db = Application::$app->db;
        $sql = 'CREATE TABLE users(
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255),
            lastName VARCHAR(255), 
            type VARCHAR(255),
            username VARCHAR(255) UNIQUE,
            password VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )ENGINE=INNODB';
        $db->pdo->exec($sql);
    }

    public function down(){

        $db = Application::$app->db;
        $sql = 'DROP TABLE users';
        $db->pdo->exec($sql);

    }
}