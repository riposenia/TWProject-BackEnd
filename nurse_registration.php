
<?php
// Importing DBConfig.php file.
include 'dbconfig.php';
 
// Creating connection.
$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 

 

//introduceti numele dorit
$nume = "";

//introduceti prenumele dorit
$prenume = "";

//introduceti emailul 
$email = "";

//introduceti parola
$parola = "";
 
//Checking Email is already exist or not using SQL query.
$CheckSQL = "SELECT * FROM asistente WHERE email='$email'";
 
// Executing SQL Query.
$check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));
 
 
if(isset($check)){
 
 $EmailExistMSG = 'Email Already Exist, Please Try Again !!!';
 
 // Converting the message into JSON format.
$EmailExistJson = json_encode($EmailExistMSG);
 
// Echo the message.
 echo $EmailExistJson ; 
 
 }
 else{
 
 // Creating SQL query and insert the record into MySQL database table.
$Sql_Query = "insert into asistente(email, parola, nume, prenume) values ('$email','$parola','$nume','$prenume')";
 
 
 if(mysqli_query($con,$Sql_Query)){
 
 // If the record inserted successfully then show the message.
$MSG = 'Nurse Registered Successfully' ;
 
// Converting the message into JSON format.
$json = json_encode($MSG);
 
// Echo the message.
 echo $json ;
 
 }
 else{
 
 echo 'Try Again';
 
 }
 }
 mysqli_close($con);
?>