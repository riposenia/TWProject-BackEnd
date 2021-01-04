
<?php
// Importing DBConfig.php file.
include 'dbconfig.php';
 
// Creating connection.
$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 

 

//ID -INT
$IDPacient = 0;

//introduceti numele dorit
$Nume_Pacient = "";

//introduceti ora = INT
$Ora = 0;

//introduceti numele medicului
$Nume_Medic = "";
 
//Checking Email is already exist or not using SQL query.
$CheckSQL = "SELECT * FROM programari WHERE Ora='$Ora' AND Nume_Medic='$Nume_Medic'";
 
// Executing SQL Query.
$check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));
 
 
if(isset($check)){
 
 $EmailExistMSG = ' The Doctor is bussy at that hour, Please Try Again !!!';
 
 // Converting the message into JSON format.
$EmailExistJson = json_encode($EmailExistMSG);
 
// Echo the message.
 echo $EmailExistJson ; 
 
 }
 else{
 
 // Creating SQL query and insert the record into MySQL database table.
$Sql_Query = "insert into programari (IDPacient, Nume_Pacient, Ora, Nume_medic) values ('$IDPacient','$Nume_Pacient','$Ora','$Nume_Medic')";
 
 
 if(mysqli_query($con,$Sql_Query)){
 
 // If the record inserted successfully then show the message.
$MSG = 'Appointment Registered Successfully' ;
 
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