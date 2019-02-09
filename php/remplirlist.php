

<?php
include('php/connect.php');
if(isset(isset($_GET['data'])) {
	$selectvalue = mysqli_real_escape_string($connection, $_GET['data']);
 
$result = mysqli_query($connection, "SELECT * FROM entreprise");
 
echo '<option value="">Please select...</option>';
while($row = mysqli_fetch_array($result))
  {
    echo '<option value="'.$row['nom_entreprise'].'">' . $row['drink_name'] . "</option>";
    //echo $row['drink_type'] ."<br/>";
  }
 
mysqli_free_result($result);
mysqli_close($connection);
}

?>
