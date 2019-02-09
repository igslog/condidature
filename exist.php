

<?php
include('php/connect.php');

	$nom = mysqli_real_escape_string($con, $_POST['nom']);
	$prenom = mysqli_real_escape_string($con, $_POST['prenom']);
	$email = mysqli_real_escape_string($con, $_POST['mail']);



$result = mysqli_query($con, "SELECT * FROM condidat where (nom='".$nom."' and prenom='".$prenom."' and email='".$prenom."') or email='".$prenom."' ");
 

 if(mysqli_num_rows()!=0){
   echo 'Vous avez deja envoyer votre formulaire';
    }
    

mysqli_free_result($result);

?>
