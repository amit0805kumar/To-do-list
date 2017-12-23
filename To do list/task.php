<?php

$servername="localhost";
$username="root";
$password="";
$dbname="todolist";

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error)
    {
    die("Connect failes: ".$conn->connect_error);
    }



if(!empty($_POST["task"]) && !empty($_POST["deadline"]))
    
 {    
$task = $_POST["task"];
$deadline = $_POST["deadline"];
$date=date("y/m/d");


$sql= "insert into task (Task,Date,Deadline) values('$task','$date','$deadline')";

$conn->query($sql);

 }
 

header( "refresh:0;url=index.php" );


?>
