<?php
include 'form1_connect.php';
$id = $_REQUEST['id'];

$sql_deleteQuery = "DELETE FROM Users WHERE id = '$id' ";
$result = mysqli_query($con,$sql_deleteQuery);

if ($result) {
    echo "Record deleted successfully";
    header("Location: admin_w.php#about");
} else {
    echo "Error deleting record: " . mysqli_error($con);
}
exit();

?>




