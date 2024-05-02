<?php
//conventional
  //creating connection to the database
    $servername = "localhost";
    $username = "root";
    $password = ""; //83212425@Cs
    $dbname = "yoshi_tournament_db";

    //Create connection
    $con = new mysqli($servername,$username,$password,$dbname);
    //check connection
    if($con -> connect_error){
      die("connection failed : ".$con->connect_error);
  }
  //end of conventional

  ?>