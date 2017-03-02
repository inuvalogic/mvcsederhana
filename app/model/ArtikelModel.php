<?php

namespace Mvc\model;

use Mvc\core\Database;

class ArtikelModel
{
    public static function all()
    {
        $sql = "SELECT * FROM `artikel` ORDER BY `id` DESC";
        $q = Database::$pdo->prepare($sql);
        $q->execute();
        $row = $q->fetchAll();
        return $row;
    }

    public static function one($id)
    {
        $id = filter_var($id, FILTER_VALIDATE_INT);
        $sql = "SELECT * FROM `artikel` WHERE `id` = ?";
        $q = Database::$pdo->prepare($sql);
        $q->execute(array($id));
        $row = $q->fetch();
        return $row;
    }
}