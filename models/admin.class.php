<?php
require_once "db.class.php";
$connect = new Db;
$conn = $connect->connection();

class admin
{
    private $tours;

    public function addtour($tour)
    {
        $this->tours[] = $tour;
    }
    public function gettour()
    {
        return $this->tours;
    }
}
