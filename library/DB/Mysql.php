<?php

class DB_Mysql{
    public $link;
    public function __construct(){
        $this->link= new mysqli("127.0.0.1","root","root","lumen");
    }
    public function select($sql){
        $mysqli_result  = $this->link->query($sql);
        $result =[];
        while ($row=$mysqli_result->fetch_object()!=null){
            $result[] = $row;
        }
        return $result;
    }
}

