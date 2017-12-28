<html>
<head>
<link rel="stylesheet" href="style.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
    function ms1()
        {
           document.getElementById("n1").style.visibility="visible";
            
        }
    
    </script>
</head>
<body>
<div id="header">
    <img id="logo" src="pencilicon.png">
    <h1 id="heading">To Do List</h1>
</div>
<br><br>
<!--Form-->
<form id="f" method="post" action="task.php">
    
    <div id="ct">
        <img src="pencilicon2.png" width="65" height="55" style="position: absolute;">
    </div>
    <h1 style="color:red; font-size:15px; margin-left:200px;" id="n1">*please enter the task</h1>
    <input id="tsk" type="text" placeholder="#Enter The Task" name="task">
    <br><br><br>
    <h1 id="dead1">Deadline</h1>
     <h1 style="color:red; font-size:15px; margin-left:200px;" id="n2">*please enter the deadlin</h1>
    <input id="dead" type="text" placeholder="YEAR/MM/DD" name="deadline">
     <br><br><br>
    <input id="cmd"  type="submit" title="Submit" onclick="ms1()">
</form>
    <br>
    <!--CLEAR-BUTTON-->
    <form method="get" action="index.php">
    <input type="submit" id="cmd2" name="clear" value="Clear All" />
    </form>
    <br>
    
    <div id="comp">
        <form method="post" action="index.php">
             <h1 style="color:red; font-size:15px;" id="n3">*please enter the task id</h1>
    <input type="text" name="done" id="done" placeholder="TASK ID">
        <br>
        <br>
        <br>
    <input type="submit" value="COMPLETED" name="taskid" id="cmd3" onclick="done()">
        </form>
    </div>
  
    <br>
    <br>
    <br>
<!--Tables-->
    <hr>
    <div id="part"></div>
    <br><br>
    
    <br>
    
<h1 style="font-size: 30px; color: #8A2BE2; text-align:center;">Task Table</h1> <br>
  <div>  

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
$sql = "SELECT * FROM task";
$result = $conn->query($sql);
echo '<table id="tasks">';
echo '   <tr>
        <th style="width:110px;">Date</th>
        <th style="width:30px;">Task ID</th>
        <th style="width:300px;">Task</th>
        <th style="width:110px;">Deadline</th> 
        </tr>
    ';
if($result->num_rows>0)
    {
        while($row=$result->fetch_assoc())
        {
            $send=$row["id"];
            echo '<tr>
                    <td>'
                        .$row["Date"].
                   '</td>
                    <td>'
                        .$row["id"].
                    '</td>
                    <td>'
                        .$row["Task"].
                    '</td>
                    <td>'
                        .$row["Deadline"].
                   '               
                  </tr>';
  
            }
        }
   
echo '</table>';

if (!empty($_POST["done"])) 
{
        $taskid = $_POST["done"];
        $sql2= "DELETE from task where id=$taskid";
        $conn->query($sql2);
        header( "refresh:0;url=index.php" );
}



if($_GET){
    if(isset($_GET['clear']))
    {
        clearall($conn);
    }
    
}
 
    function clearall($conn)
    {

       $sql="DELETE from task";
        $conn->query($sql);
        header( "refresh:0;url=index.php" );
    }
 
 
?>
    </div>
    <br>
    <br>
    <br>
    <br>
    <div style="width:100%; height: 80px; background:linear-gradient(white,#663399); ">
        <img src="footer.png" style="width:100%;">
    </div>
</body>
</html> 
