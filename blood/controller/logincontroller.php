<?php
session_start();
/**
 * Created by PhpStorm.
 * User: abouzaid
 * Date: 1/25/2018
 * Time: 12:24 AM
 */

include '../database/vars.php';//connection to database

//get data from form
if ($_SERVER['REQUEST_METHOD']=='POST')
  {
     $username=$_POST['username'];
     $password=$_POST['password'];
     $hashedPassword=sha1($password);// hashed password for security
//check the username and password from database
     $stmt=$con->prepare("SELECT
                                       username,password,grouptype
                                        from employees WHERE username=? AND password=?
                                        LIMIT 1");
     $stmt->execute(array($username,$hashedPassword));
     $row=$stmt->fetch();
     $count=$stmt->rowCount();

     if($count > 0)
     {
        $_SESSION['username']=$username;//session of username
        $_SESSION['grouptype']=$row['grouptype'];//session of job

        if ($_SESSION['grouptype']=='receptionist')
        {
            header('location:../controller/reception.php');//redirect to your page
             exxit();
        }
        else {

                header('location:../controller/logoutcontroller.php');

             }

     }
    else
    {
        $error='Invalid username or password';
        $_SESSION['error']=$error;
      header('location:../controller/login.php');

    }





}
else
{
    header('location:../controller/login.php');

}
