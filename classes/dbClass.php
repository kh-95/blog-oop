<?php

class Database{

var $server="localhost";
var $dbName="oop";
var $dbUser="root";
var $dbPassword="";
var $con= null;

function __construct(){

    $this->con=mysqli_connect($this->server,$this->dbUser,$this->dbPassword,$this->dbName);

    if(!$this->con){

        echo mysqli_connect_error();
    }

}

function query($sql){

    $result=mysqli_query($this->con,$sql);

    return $result;


}

function __destruct()
{
    mysqli_close($this->con);
}

}

?>