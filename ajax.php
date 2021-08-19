<?php

    $servername='localhost';
    $username='root';
    $password='';
    $dbname = "wsite";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
		

$f_name = mysqli_real_escape_string($conn, $_POST['f_name']);
$l_name = mysqli_real_escape_string($conn, $_POST['l_name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$subject = mysqli_real_escape_string($conn, $_POST['subject']);
$message = mysqli_real_escape_string($conn, $_POST['message']);
if(mysqli_query($conn, "INSERT INTO form_table(f_name, l_name, email, subject, message) VALUES('" . $f_name . "', '" . $l_name . "', '" . $email . "', '" . $subject . "', '" . $message . "')")) {
echo '1';
} else {
echo "Error: " . $sql . "" . mysqli_error($conn);
}
mysqli_close($conn);
?>