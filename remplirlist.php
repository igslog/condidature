

<?php
include('php/connect.php');

	$selectvalue = mysqli_real_escape_string($con, $_POST['data']);

$result = mysqli_query($con, "SELECT distinct entreprise.id, nom_entreprise FROM entreprise, etreprise_condidature where entreprise.id=etreprise_condidature.id_entreprise and nbre_condidature>conteur and id_specialite='".$selectvalue."'");
 

if(mysqli_num_rows($result)==0){
  echo '<option value="">---Aucune condidature dans cette specialite---</option>';

    }
    else {
    	echo '<option value="">---Selectionner une entreprise---</option>';

while($row = mysqli_fetch_array($result))
  {
    echo '<option value="'.$row['id'].'">' . $row['nom_entreprise'] . "</option>";
    //echo $row['drink_type'] ."<br/>";
  }



 
mysqli_free_result($result);
}
?>
