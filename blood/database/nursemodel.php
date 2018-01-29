<?php
/**
 * Created by PhpStorm.
 * User: abouzaid
 * Date: 1/25/2018
 * Time: 2:51 AM
 */
include '../database/vars.php';
class nursemodel
{




////////////////////////////////////////////////////////get all user////////////////////////////////////////////////
    public function get_all_user(){
        include '../database/vars.php';
        try {
            //sql statment
            $stmt = $con->prepare("SELECT * from donar where status=0");
            $stmt->execute();
            $rows = $stmt->fetchall();
            $count = $stmt->rowCount();
            // user in table
            if ($count > 0) {
                $result=$rows;
                return $result;


            }
            //no user in table
            else{
                return null;
            }
        }
        //exception in sql statment
        catch(PDOException $e)
        {
            return null;
            echo  $e->getMessage();
        }


    }










//search in donar table by nid
    public function search($nid){
        include '../database/vars.php';
      try {

          //SQL
          $stmt = $con->prepare("SELECT * from donar where nid=?  LIMIT 1");
          $stmt->execute(array($nid));
          $row = $stmt->fetch();
          $count = $stmt->rowCount();
          if ($count > 0) {

              $result=$row;
              return $result;
          }
          else
          {
              return null;
          }
      }

       catch(PDOException $e)
       {
           return null;
           echo  $e->getMessage();

       }}




//create new user  in donar table

    public function insert($nid,$firstname,$lastname,$city,$birthday,$phonenumber,$sex,$nationality,$job){
        include '../database/vars.php';
        try {
            //sql statment
            $stmt=$con->prepare("INSERT INTO donar (nid,firstname, lastname,city,birthday,phonenumber,sex,nationality,job)
                               VALUES (?,?,?,?,?,?,?,?,?)");
            $stmt->execute(array($nid ,$firstname,$lastname ,$city ,$birthday ,$phonenumber ,$sex ,$nationality ,$job));
            //insert successfully
            $result="New record created successfully";
            return $result;
        }
        catch(PDOException $e)
        {
            $result= "New record created failed";
            return $result;
        }


    }
//update new user
    public function update ($nid,$firstname,$lastname,$city,$birthday,$phonenumber,$sex,$nationality,$job,$oldnid){
        include '../database/vars.php';
        try {
            //sql statment
            $stmt=$con->prepare("update donar set nid=?,firstname=?, lastname=?,city=?,birthday=?,phonenumber=?,sex=?,nationality=?,job=?
                                 where nid=?");
            $stmt->execute(array($nid ,$firstname,$lastname ,$city ,$birthday ,$phonenumber ,$sex ,$nationality ,$job,$oldnid));
            //record updated
            $result= "New record update successfully";
            return $result;
        }
        catch(PDOException $e)
        {
            //record not updated
            $result="sorry record not update try again";
            return $result;

        }


    }

//delete user by nid
    public function delete ($nid){
        include '../database/vars.php';
        try {
            //SQL
            $stmt=$con->prepare("delete from donar where nid=?");
            $stmt->execute(array($nid ));
            $result= "New record delete successfully";
            return $result;
        }
        catch(PDOException $e)
        {
            $result= "New record delete Failed";
            return $result;

        }


    }

}