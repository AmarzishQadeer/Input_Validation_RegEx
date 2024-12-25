<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */


////////////////// Basic Data Base Connection/////////////////////////////////////////////////////
$mysqli = new mysqli("localhost", "root", "", "phplabone");
// $selected = mysqli_select_db($mysqli, "phplab");
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

///////////////////////////////// Fetch and Show Data from DB/////////////////////////////////////////////
$fetchData = "SELECT * from tableone";
$result = $mysqli->query($fetchData);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<td>" . $row['Id'] . "</td> \r\n<br/>";
        echo "<td>" . $row['Name'] . "</td> \r\n <br/>";
        echo "<td>" . $row['Email'] . "</td> \r\n <br/>";
        echo "<td>" . $row['PhoneNo'] . "</td> \r\n <br/>";
    }
}


if(isset($_POST['signup']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phoneno = $_POST['phoneno'];

//Attempt insert query execution
// $sql = "INSERT INTO tableone (Name, Email, Password, PhoneNo)
// VALUES ('John', 'john@example.com', '123456', '032123421')";

$sql = "INSERT INTO tableone (Name, Email, PhoneNo)
VALUES ('$name', '$email', '$phoneno')";


if($mysqli->query($sql) === true){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
$mysqli->close();
}
?>

<form method = "post">

<input type = "text" name = "name" placeholder = "Name">

<input type = "text" name = "email" placeholder = "whatever@whatever.com">

<input type = "text" name = "phoneno" placeholder = "0300-1234567">

<input type = "submit" name = "signup" value = "Sign Up">

</form>
