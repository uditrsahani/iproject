<?php
$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];

//Database connections
$conn = new mysqli('localhost', 'root','',  'ipproject');
if($conn->connect_error){
  die('Connection failed: '.$conn->connect_error);
}else{
  $stmt = $conn->prepare("Insert into ipproject(email, password, name) VALUES (?,?,?)");
  $stmt->bind_param("sss", $username, $password, $name);
  $stmt->execute();
  echo "Registation Successfully Completed.";
  $stmt->close();
  $conn->close();
}
?>


