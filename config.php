

<?php
$servername="localhost";
$username="root";
$pass="";
$dbname="classroom";

$conn =mysqli_connect($servername,$username,$pass,$dbname);

if ($conn)
{
//echo 'connect';

}
else {
echo 'error';

}

?>
