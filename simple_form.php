
<?php
$connect= mysqli_connect('localhost', 'root', '');
if(!$connect)
{
    die('Could not connect:'.mysqli_connect_error());
    echo "<br>";
}
else{
    echo 'Connected succesfully to the database';
	echo "<br>";
}
$select=mysqli_select_db($connect,"formdetails");
if(!$select)
{
   $create='create database formdetails';
 if(mysqli_query($connect,$create))
   {
      echo 'Database created!!!';
      $select=mysqli_select_db($connect,"formdetails");
   } 
 else{
      echo 'Database not created!! error: ',mysqli_error($connect);
   }
}

$table='create table if not exists formdet(username varchar(20),password varchar(20),phone varchar(20),age varchar(10),gender varchar(20),email varchar(50))';
$ta=mysqli_query($connect,$table);
if(!$ta){
    echo 'not created!! error:',mysqli_error($connect);
}
else{
    echo 'Table created!!';
	echo "<br>";
}
$username=$_POST["n"];
$password=$_POST["pwd"];
$phone=$_POST["ph"];
$age=$_POST["age"];
$gender=$_POST["sex"];
$email=$_POST["email"];
$sql="INSERT INTO formdet VALUES ('$username','$password','$phone','$age','$gender','$email')";
if(mysqli_query($connect,$sql)){
    echo "<h3>data stored in a database successfully.";
}
else{
    echo mysqli_error($connect);
}

mysqli_close($connect)



?>