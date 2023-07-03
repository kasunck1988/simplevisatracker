<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "simple_visa_tracker";

//create connection
$conn = mysqli_connect($servername, $username, $password, $database);
//check connection
if (!$conn) {
    die("Connection failed:" . mysqli_connect_error());
}

$username = mysqli_real_escape_string($conn, $_POST['username']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$age = mysqli_real_escape_string($conn, $_POST['age']);
$occupation = mysqli_real_escape_string($conn, $_POST['occupation']);
$dependants = mysqli_real_escape_string($conn, $_POST['dependants']);
$visatype = mysqli_real_escape_string($conn, $_POST['visatype']);
$pre_invite = mysqli_real_escape_string($conn, $_POST['pre_invite']);
$nomination_applied = mysqli_real_escape_string($conn, $_POST['nomination_applied']);
$payment_rda = mysqli_real_escape_string($conn, $_POST['payment_rda']);
$invitation = mysqli_real_escape_string($conn, $_POST['invitation']);
$visa_lodged = mysqli_real_escape_string($conn, $_POST['visa_lodged']);
$co_contact = mysqli_real_escape_string($conn, $_POST['co_contact']);
$grant_date = mysqli_real_escape_string($conn, $_POST['grant_date']);

$sql = " INSERT INTO visa_list(username, gender, age, occupation, dependants, visatype, pre_invite, nomination_applied, payment_rda, invitation, visa_lodged, co_contact, grant_date) VALUES ('$username','$gender','$age','$occupation','$dependants','$visatype','$pre_invite','$nomination_applied','$payment_rda','$invitation','$visa_lodged','$co_contact','$grant_date')";

if (mysqli_query($conn, $sql) === TRUE) {
    echo "<script>alert('Details Added');window.location.href='index.php';</script>";
} else {
    echo "Error:" . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>