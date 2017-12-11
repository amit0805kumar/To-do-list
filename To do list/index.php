<html>
<head>
<link rel="stylesheet" href="ss.css">    
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
    
    <input id="tsk" type="text" placeholder="#Enter The Task" name="task">
    <br><br><br>
    <h1 id="dead1">Deadline</h1>
    <input id="dead" type="text" placeholder="YEAR/MM/DD" name="deadline">
     <br><br><br>
    <input id="cmd"  type="submit" title="Submit">
</form>
    <br>
    <form method="get" action="index.php">
    <input type="submit" id="cmd2" name="clear" value="Clear All" />

    </form>
    <br>
<!--Tables-->
    <hr>
    <div id="part"></div>
    <br><br>
    
    <br>
<h1 style="font-size: 30px; margin-left: 15%; color: #8A2BE2;">Task Table</h1> <br>
    
</body>
</html> 
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
        <th>Date</th>
        <th>Task</th>
        <th>Deadline</th> 
        </tr>
    ';
if($result->num_rows>0)
    {
        while($row=$result->fetch_assoc())
        {
            echo '<tr>
                    <td>'
                        .$row["Date"].
                   '</td>
                    <td>'
                        .$row["Task"].
                    '</td>
                    <td>'
                        .$row["Deadline"].
                   '<input type="button" id="cmd3" value="Done" /></td>
                  </tr>';
        }
    }
echo '</table>';

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
