<?php
session_start();                                                          //start session
//===================================(start)case is log in=================================================
if(isset($_SESSION['username'])){

    /////////////////////////////////////////(start)case have permission///////////////////////////////
    if($_SESSION['grouptype']=='receptionist'){
        include '../database/nursemodel.php';                               //nurse modle database
        new nursemodel();                                                   // object from nurse modle
        if(isset($_SESSION['reception_operation'])&&$_SESSION['reception_operation']!=null)



        //check the result of update & delete & create
        { $operation_result= $_SESSION['reception_operation'];
            echo '<script> alert( "'.$operation_result .'");</script>';
            $_SESSION['reception_operation']=null;
        }


        $alluser=nursemodel::get_all_user();                                  // use function to get all user from table donor
    }
    /////////////////////////////////////////(End)case have permission///////////////////////////////


    ///////////////////////////////// (start)case have no permissiom /////////////////////////////////
    else{


        echo"you can not access this page";
        exit();
    }
    ///////////////////////////////// (end)case have no permissiom /////////////////////////////////
}
//======================================(End)case is log in===============================================


///////////////////////////////////(start)case is not  log in/////////////////////////////
else{
    header('location:../controller/login.php');
    exit();
}
/////////////////////////////////////////(End)case is not log in//////////////////////////////
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Blood Bank</title>
  <link rel="stylesheet" href="../resource/css/bootstrap.min.css">
  <link rel="stylesheet" href="../resource/css/reciptionist.css">
</head>
<body>
  <header>
      <div class="img-blur"></div>
      <img class="bg-blur" src="../resource/images/1.jpeg">


    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a href="../controller/reception.php" class="navbar-brand" ><img src="../resource/images/logo.png" alt=""></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav links">
            <li class="active"><a href="../controller/reception.php"> Home</a> </li>      <!-- create button-->
            <li><a href="../controller/receptioncontroller.php?"> create</a> </li>      <!-- create button-->
          </ul>
          <!-- search donor -->
          <form action="" method="post" class="navbar-form navbar-left form-search">
            <div class="form-group">
              <input type="text" name="search" class="form-control" placeholder="Search">
            </div>
            <button type="submit" value="search" class="btn btn-default search-btn">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </form>
          <!--end search donor  -->

          <ul class="nav navbar-nav navbar-right">
            <li><a class="btn btn-default" id="logout" href="../controller/logoutcontroller.php">logout</a> </li>       <!-- logout button-->
          </ul>
        </div>
      </div>
    </nav>
  </header>





  <?php

//================================(sratr) search=================================



  ?>
  <!--form/////////////////////////////////////-->

  <!-- <form action="" method="post">

      search
      <input type="text" name="search" /><br>
      <input type="submit" value="search">
 -->



      <!-- //////////////////////////////// end form/////////////////////////////////////-->

      <?php
      //======================= (start)table of user is empty=========================
      if($alluser==null)
         {

             echo '<h2 class="empty-table">No User Founded.</h2>';
             exit();
         }

      //======================(end) table of user is empty========================


      if(isset($_POST['search'])){

          $search=$_POST['search'];
          $result=nursemodel::search($search);
          if ($result==null)
          {
              echo "no found user ";
              echo "<li><a href='../controller/reception.php'> Back To Home</a>";
          }
          else{
      //  echo "hello";

              
              echo '<table class="table table-striped" >
              
                                       <tr>
                                          <th>NID</th>
                                          <th>first name</th>
                                          <th>last name</th>
                                          <th>city</th>
                                          <th>sex</th>
                                          <th>nationality</th>
                                          <th>job</th>
                                          <th>phone number</th>
                                          <th>birthday</th>
                                          <th>Options</th>
                                          
                                      </tr>';
              

              echo"   <tr>
                                            <td>".$result['nid']."</td>
                                            <td>".$result['firstname']."</td>
                                            <td>".$result['lastname']."</td>
                                            <td>".$result['city']."</td>
                                            <td>".$result['sex']."</td>
                                            <td>".$result['nationality']."</td>
                                            <td>".$result['job']."</td>
                                            <td>".$result['phonenumber']."</td>
                                            <td>".$result['birthday']."</td>
                                            <td >
                                            <a  class='btn btn-warning'  title='Edit' href='../controller/receptioncontroller.php?do=edit& usernid=" . $result['nid'] . "'> <span class='glyphicon glyphicon-edit'></span>
                                            </a>
                                            <button type=\"button\" class=\"btn btn-danger\" title='delete' data-toggle=\"modal\" data-target=\"#myModal\">
                                            <span class='glyphicon glyphicon-remove'></span>
                                            </button>
                                            </td>
                                            </tr>";
              
              
              echo    "</table>";
               
          echo '
          <!-- Modal -->
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Confirm deletion</h4>
                </div>
                <div class="modal-body">
                  Are you sure you want to delete?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <a  class="btn btn-primary" title="delete" href="../controller/receptioncontroller.php?do=delete& usernid=' . $result['nid'] . '"> delete</a>            
                </div>
              </div>
            </div>
          </div>
        ';
              // =======================(start) display the data of user===========================





          }



      }

      else {


          //==============================(end) search===================================

          //=======================(start) display the data of user===========================
          echo '<table class="table table-striped">
          <caption>Users</caption>
          <tr>
              <th>NID</th>
              <th>first name</th>
              <th>last name</th>
              <th>city</th>
              <th>sex</th>
              <th>nationality</th>
              <th>job</th>
              <th>phone number</th>
              <th>birthday</th>
              <th>Options</th>
          </tr>';

          foreach ($alluser as $user) {
              echo "   <tr>
                            <td>" . $user['nid'] . "</td>
                            <td>" . $user['firstname'] . "</td>
                            <td>" . $user['lastname'] . "</td>
                            <td>" . $user['city'] . "</td>
                            <td>" . $user['sex'] . "</td>
                            <td>" . $user['nationality'] . "</td>
                            <td>" . $user['job'] . "</td>
                            <td>" . $user['phonenumber'] . "</td>
                            <td>" . $user['birthday'] . "</td>
                            <td >
                              <a  class='btn btn-warning'  title='Edit' href='../controller/receptioncontroller.php?do=edit& usernid=" . $user['nid'] . "'> <span class='glyphicon glyphicon-edit'></span>
                              </a>
                            <button type=\"button\" class=\"btn btn-danger\" title='delete' data-toggle=\"modal\" data-target=\"#myModal\">
                            <span class='glyphicon glyphicon-remove'></span>
                             </button>
                            </td>
                            </tr>";
          
          echo '
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Confirm deletion</h4>
                  </div>
                  <div class="modal-body">
                    Are you sure you want to delete?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a  class="btn btn-primary" title="delete" href="../controller/receptioncontroller.php?do=delete& usernid=' . $user['nid'] . '"> delete</a>            
                  </div>
                </div>
              </div>
            </div>
          ';
          }
          
          echo "</table>";
          //=======================(start) display the data of user===========================
      }
?>


<script src="../resource/js/jquery.min.js"></script>
<script src="../resource/js/bootstrap.min.js"></script>
  </body>

</html>
