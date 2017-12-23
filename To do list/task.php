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


$task = $_POST["task"];
$deadline = $_POST["deadline"];
$date=date("y/m/d");


$sql= "insert into task (Task,Date,Deadline) values('$task','$date','$deadline')";

if($conn->query($sql))
{
echo $task."<br>";
echo $deadline."<br>";
echo $date."<br>";
}
else
{
echo 'error: '.$sql."<br>".$conn->error;
    
}




header( "refresh:0;url=index.php" );


?>
