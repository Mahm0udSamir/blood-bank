<?php
/**
 * Created by PhpStorm.
 * User: abouzaid
 * Date: 1/24/2018
 * Time: 10:01 PM
 */

     $dsn='mysql:host=localhost;dbname=bloodbank';//server name
     $user = "root";//user
     $pass = "";//password
     $option=array(
              PDO:: MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',

      );//option to write arabic

    // connection to database
    try{
         $con=new PDO($dsn,$user,$pass,$option);
         $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        // echo'you are connect';

     }
     catch (PDOException $e){
         //echo 'faild to connect'.$e->getMessage();
         die();
     }
