<?php
require_once 'ORM.php';

class User extends ORM
{
    public function __construct()
    {
        parent::__construct();
        $this->setTable('user');
    }

    public function findByEmail($email){
        $stmt = self::$db->prepare("SELECT * FROM `user` WHERE `email` = :email");
    }
}