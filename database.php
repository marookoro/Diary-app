<?php
/*$_POST['ww']="";
$_POST['ev']="";
$_POST['em']="";
$_POST['at']="";
$_POST['rr']="";
*/


$servername = "localhost";
$username = "";
$password = "";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

/*
$sql = "CREATE TABLE DiaryEntries (
When_where TEXT,
Event TEXT,
Emotion TEXT,
Automaticthougts TEXT,
RationalResponse TEXT
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Diary Entries created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
*/
/*
$WW = "";

$EV = "";

$EM = "";

$AT = "";

$RR = "";
*/

if(isset($_POST['submit'])){
$WW = $_POST["When_where"];

$EV = $_POST["Event"];

$EM = $_POST["Emotion"];

$AT = $_POST["Automaticthougts"];

$RR = $_POST["RationalResponse"];

$sql = "INSERT INTO DiaryEntries (When_where, Event, Emotion, Automaticthougts, RationalResponse) VALUES ('$WW', '$EV', '$EM','$AT','$RR')";

if(mysqli_query($conn, $sql)){
     
     echo "\nDiary entry entered successfully.";
 }
   else{
        
       echo "\nerror : entry not successful\n" . mysqli_error($conn);
      }
 }


?>

<script>
 function Empty()
{
  var a = document.forms["diary"]["When_where"].value;
  var b = document.forms["diary"]["Event"].value;
  var c = document.forms["diary"]["Emotion"].value;
  var d = document.forms["diary"]["Automaticthougts"].value;
  var e = document.forms["diary"]["RationalResponse"].value;



    if((a =="")&&(b =="")&&(c =="")&&(d =="")&&(e=="")){

		alert("no entry\nEnter into the diary");
     }
  }
</script>

<!DOCTYPE html>
<html>
<head>
<title>Diary</title>
</head>

<body>
<table border="1" style="width:100%">
<caption> Blank Diary:</caption>
 <tr>
   <th>When/where</th>
   <th>Event</th>
   <th>Emotions</th>
   <th>Automaticthoughts</th>
   <th>RationalResponse</th>
 </tr> 
 
<form method="post" name = "diary">

 <tr>
   <td><textarea id="When_where" type="text" name="When_where" rows="30" ></textarea></td>
   <td><textarea id="Event" type="text" name="Event" rows="30" ></textarea></td>
   <td><textarea id="Emotion" type="text" name="Emotion" rows="30" ></textarea></td>
   <td><textarea id="Automaticthougts" type="text" name="Automaticthougts" rows="30" ></textarea></td>
   <td><textarea id="RationalResponse" type="text" name="RationalResponse" rows="30" ></textarea></td>
 </tr>
<button id="submit" name="submit" type="submit" onclick="return Empty()">Save Entry</button>
<button id="load" name="showentry">Show Diary</button>

</form>

</table>

</body>
</html>

<?php

if (isset($_POST['showentry'])) {
    $sql = "SELECT * FROM DiaryEntries";
  $result = $conn->query($sql);

echo '<table width=100%><tr> All Diary Entries</tr>

 <tr>
    <th>When/where</th>
    <th>Event</th>		
    <th>Emotion</th>
    <th>Automaticthougts</th>		
    <th>RationalResponse</th>
  
 </tr>';

if ($result->num_rows > 0) {
     

     while($row = $result->fetch_assoc()) {
     echo 	"<tr>";
     echo	"<td>".$row["When_where"]."</td>";
     echo	"<td>".$row["Event"]."</td>";
     echo	"<td>".$row["Emotion"]."</td>";
     echo	"<td>".$row["Automaticthougts"]."</td>";
     echo 	"<td>".$row["RationalResponse"]."</td>";
     echo	"</tr>";
}

     echo "</table>";
}
    else 
       {
         echo " 0 results";
}
}

  $conn->close();
?>
 
<style>

body{

    background: #660066
    
}

table, th, td{

border: 1px solid black;
padding: 5px;
}

th{
background:#993399;
}

textarea{

background:#993399;
width: 100%;
}


caption{
color: white;
font-family: arial;
font-size: 160%;
float: left;
}

#submit{
float:left;
}

#load{

float:right;
}
