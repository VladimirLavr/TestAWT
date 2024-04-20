<?php
$pdo = new PDO($dsn, $user, $password);
$res = $pdo->query('SHOW TABLES LIKE "user"');
if ($res->rowCount()) {
    return;
} else {
    try {
        $sql = "CREATE TABLE `user` (
        `id` INT NOT NULL AUTO_INCREMENT ,
        `name` VARCHAR(255) NOT NULL ,
        `login` VARCHAR(255) NOT NULL ,
        `email` VARCHAR(255) NOT NULL ,
        `is_Block` BOOLEAN NOT NULL ,
        `last_visit` TIMESTAMP NOT NULL ,
          PRIMARY KEY (`id`)) ENGINE = InnoDB;";

        $pdo->exec($sql);
        echo "Таблиця успішно створена";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

