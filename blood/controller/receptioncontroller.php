<?php
/**
 *
 * Created by PhpStorm.
 * User: abouzaid
 * Date: 1/25/2018
 * Time: 11:00 PM
 */
/*
 * ======
*================ (Start)Case user log in ===================================================
 * =======
*/
session_start();                                                      //start session to use(($_SESSION['username']) and ($_SESSION['grouptype'])
if(isset($_SESSION['username'])){                                     //check the username if is exit

    ///////////////////////////////// (start) have permission to access the page  ///////////////////////////////////////////////
    if($_SESSION['grouptype']=='receptionist'){                             //check the permission for username to access this page(receptionst ony access)
        include '../database/nursemodel.php';                        // include model database of recepyionst
        new nursemodel();
        ?>

        <!DOCTYPE html>
        <html>
        <head>
            <title>receptionist</title>
        </head>
    <body>
        <ul>
            <li><a href="../controller/logoutcontroller.php">logout</a></li>        <!-- logout button-->
            <li><a href="../controller/reception.php"> Home</a> </li>                   <!--  reception home button-->

        </ul>

        <?php



        // create object of class(receptionst)
        $do=isset($_GET['do']) ? $_GET['do']:'create';                 //show the request ($_GET) and put it in variable $do

        ////////////////////////////////////(start) Request is Edit user data//////////////////////////////////////////////////////////////////////////////////

        if ($do=='edit')
           {

               //////////////////////////////////(start) NID is number///////////////////////////////////////
              if(isset($_GET['usernid'])&&is_numeric($_GET['usernid']))
              {
                  $nid=intval($_GET['usernid']);                       // filter NID

                  $user= nursemodel::search($nid);                     // use search function to get value of user
                  //////////////////////////(start) user found in table/////////////////////////////////
              if($user !=null) {
                  ?>
               <!-- //////////////////////////////// start form/////////////////////////////////////-->
                  <h4>edit user </h4>
                  <form action="?do=update" method="post">
                  <input type="hidden" value="<?php echo $user['nid'] ?>" name="old_nid">
                  firstname
                  <input type="text" name="firstname" value="<?php echo $user['firstname'] ?>"/><br>
                  lastname
                  <input type="text" name="lastname" value="<?php echo $user['lastname'] ?>"/><br>
                  nid
                  <input type="number" name="nid" value="<?php echo $user['nid'] ?>"><br>
                  city
                  <input type="text" name="city" value="<?php echo $user['city'] ?>"><br>
                  birthday
                  <input type="date" name="birthday" value="<?php echo $user['birthday'] ?>"><br>
                  phone number
                  <input type="number" name="phonenumber" value="<?php echo $user['phonenumber'] ?>"><br>
                  sex
                  <select name="sex">
                      <option value="<?php echo $user['sex'] ?>"><?php echo $user['sex'] ?> </option>
                      <option value="male">male</option>
                      <option value="male">female</option>
                  </select>.<br>
                  nationality
                  <select name="nationality">
                      <option value="<?php echo $user['nationality'] ?>"><?php echo $user['nationality'] ?> </option>
                      <option value="egyption">egyption</option>
                      <option value="chines">chines</option>
                      <option value="Iranian">Iranian</option>

                  </select><br>
                  job
                  <input type="text" name="job" value="<?php echo $user['job'] ?>"/><br>

                  <input type="submit" value="update">

                  <!-- //////////////////////////////// end form/////////////////////////////////////-->
                  <?php
              }
              //////////////////////////(End user found in table/////////////////////////////////

              //////////////////////////(start) user found not in table/////////////////////////////////
              else{echo "no user in table";}
              }
              //////////////////////////(End) user found not in table/////////////////////////////////
              //////////////////////////////////(End) is number///////////////////////////////////////

              //////////////////////////////////(start) NID is not number///////////////////////////////////////
              else{
                  echo" NID not number";
              }
               //////////////////////////////////(End)  NID is not number///////////////////////////////////////

           }
       ////////////////////////////////////(End) Request is Edit user data/////////////////////////////////////////////////////////


        ////////////////////////////////////(start) Request is update user data/////////////////////////////////////////////////////////
            elseif($do=='update')
            {
                //////////////////////form post//////////////////////////////
                if($_SERVER['REQUEST_METHOD']=='POST')
                {
                    // Get variable from the form
                    $nid=$_POST['nid'];
                    $firstname=$_POST['firstname'];
                    $lastname=$_POST['lastname'];
                    $city=$_POST['city'];
                    $sex=$_POST['sex'];
                    $phonenumber=$_POST['phonenumber'];
                    $nationality=$_POST['nationality'];
                    $job=$_POST['job'];
                    $birthday=$_POST['birthday'];
                    $old_nid=$_POST['old_nid'];
                    //use function update
                  $result=nursemodel::update($nid,$firstname,$lastname,$city,$birthday,$phonenumber,$sex,$nationality,$job,$old_nid);
                  $_SESSION['reception_operation']=$result;           //session to sore result of opertaion
                  header('location:../controller/reception.php');
                 // exit();

                }

                ///////////////form ont post//////////
                else{
                    echo "you can not browse this page directly";


                }

            }


        ////////////////////////////////////(End) Request is update user data/////////////////////////////////////////////////////////


        ////////////////////////////////////(start) Request is create user data/////////////////////////////////////////////////////////
        elseif($do=='create'){

                  ?> <!-- //////////////////////////////// start form/////////////////////////////////////-->
                      <h4>edit user </h4>
                      <form action="?do=insert" method="post">

                          firstname
                          <input type="text" name="firstname" /><br>
                          lastname
                          <input type="text" name="lastname" /><br>
                          nid
                          <input type="number" name="nid" /><br>
                          city
                          <input type="text" name="city" /><br>
                          birthday
                          <input type="date" name="birthday" ><br>
                          phone number
                          <input type="number" name="phonenumber"><br>
                          sex
                          <select name="sex">
                              <option value="male">male</option>
                              <option value="male">female</option>
                          </select>.<br>
                          nationality
                          <select name="nationality">
                              <option value="egyption">egyption</option>
                              <option value="chines">chines</option>
                              <option value="Iranian">Iranian</option>

                          </select><br>
                          job
                          <input type="text" name="job" /><br>

                          <input type="submit" value="insert">

                          <!-- //////////////////////////////// end form/////////////////////////////////////-->
                          <?php
                          }
////////////////////////////////////(End) Request is create user data////////////////////////////////////////////////////////


////////////////////////////////////(start) Request is insert user data////////////////////////////////////////////////////////
                          elseif ($do=='insert'){

                              if($_SERVER['REQUEST_METHOD']=='POST') {
                                  // Get variable from the form
                                  $nid = $_POST['nid'];
                                  $firstname = $_POST['firstname'];
                                  $lastname = $_POST['lastname'];
                                  $city = $_POST['city'];
                                  $sex = $_POST['sex'];
                                  $phonenumber = $_POST['phonenumber'];
                                  $nationality = $_POST['nationality'];
                                  $job = $_POST['job'];
                                  $birthday = $_POST['birthday'];

                                  $result=nursemodel::insert($nid,$firstname,$lastname,$city,$birthday,$phonenumber,$sex,$nationality,$job);
                                  $_SESSION['reception_operation']=$result;           //session to sore result of opertaion
                                  header('location:../controller/reception.php');
                              }

                                  ///////////////form ont post//////////
                              else{
                                  echo "you can not browse this page directly";

                              }


                          }

///////////////////////////////////(End Request is insert user data////////////////////////////////////////////////////////


        ///////////////////////////////////(start) Request is delete user data/////////////////////////////////////////////
        elseif ($do=='delete'){


            if(isset($_GET['usernid'])&&is_numeric($_GET['usernid'])) {
                $nid = intval($_GET['usernid']);                       // filter NID

                $result=$user = nursemodel::delete($nid);
                $_SESSION['reception_operation']=$result;           //session to sore result of opertaion
                header('location:../controller/reception.php');
            }
            //nid not numeric value
            else{
                echo" NID not number";
            }


            }
        /// ///////////////////////////////////(End) Request is delete user data////////////////////////////////////////////////////













            ///////////////////////////////////no request/////////////////////
        else{ echo "opertaion not found";}



    }

    ///////////////////////////////// (end) have permission to access the page  ///////////////////////////////////////////////
    else{
        echo"you can not access this page";
        exit();
    }

}

/*
 * ======
*=======================================(End)Case user log in ===================================================
 * =======
*/


/*
 *================ (Start)Case user not log in===================================================
 */
else{
    header('location:../controller/login.php');   // redirect him to login
    exit();
}
/*
================ (End)Case user not log in=======================================================
*/
?>
