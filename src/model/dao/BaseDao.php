<?php
//
// DAO : data access object 
// le DAO est un design pattern (patron de conception)
// 
namespace cinema\model\dao;

use PDO;

class BaseDao
{
    protected $db;

    public function __construct()
    {
        $this->db = new PDO("mysql://host=localhost;dbname=film;charset=utf8", 'root' , '');
    }
}