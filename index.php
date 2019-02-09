
<?php include('php/connect.php');
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Condidature Evenement</title>
 

 
  <!--pour la bare de menu-->


<!--===============================================================================================-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	
<!--===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="css/util.css">
<!--===============================================================================================-->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

</head>
<body>


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" method="POST"  action="index.php" name="condidature" id="condidature" enctype="multipart/form-data">
			    
			    
			     <div class="tous-logo">
				<div class="logo">
                 <img src="images/logo7.png"  height="100"  width="62">
				</div>

				<div class="logo">
                 <img src="images/logo6.png"  height="100" width="62">
				</div>

				<div class="logo">
                 <img src="images/logo5.png"  height="100" width="62">
				</div>

				<div class="logo">
                 <img src="images/logo4.png"  height="100" width="62">
				</div>

				<div class="logo">
                 <img src="images/logo3.png" height="100" width="62">
				</div>

				<div class="logo">
                 <img src="images/logo2.png" height="100" width="62">
				</div>
				<div class="logo">
                 <img src="images/logo1.png"  height="100" width="62">
				</div>
                </div>



				<span class="contact100-form-title">
					<u>Remarque : </u> cet évènement est juste une simulation et vous ne serez pas réellement embouché.
				</span>
               
			
				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Type first name">
				 <label class="label-input100"> Nom / Prénom </label>
					<input id="name" class="input100" type="text" name="name" placeholder="Nom">
					<span class="focus-input100"></span>
					<span id="erreur-nom"></span>
				</div>


			


				<div class="wrap-input100 rs2-wrap-input100 validate-input" data-validate="Type last name">
					<input class="input100" type="text" name="prenom"  id="prenom" placeholder="Prénom">
					<span class="focus-input100"></span>
				</div>

				
				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
				 <label class="label-input100" for="email"> E-mail </label>
					<input id="email" class="input100" type="text" name="email" placeholder="Eg. example@email.com">
					<span class="focus-input100"></span>
				</div>

		
				<div class="wrap-input100">
				 <label class="label-input100" for="phone"> Numero de Téléphone</label>
					<input id="phone" class="input100" type="text" name="phone" placeholder="Eg. 0662588888">
					<span class="focus-input100"></span>
				</div>

		

				<div class="wrap-input100" >
				 <label class="label-input100" for="phone"> Spécialité</label>
                   <select id="specialite" class="select100" name="specialite" id="specialite">
                   <option value="">---Sélectionner votre spécialité---</option>
				      <?php
                      $sql="SELECT * FROM specialite";
                      $result = mysqli_query($con, $sql);
                      if ($result) {
                      while($row = mysqli_fetch_array($result)) {
                      $specialite  =   $row["nom_specialite"];
                        $id  =   $row["id"];

                     echo'<option value="'.$id.'">'.$specialite.'</option>';
                         }
                      }
                   ?>
					 		  
                   </select>
                    <span class="focus-input100"></span>
				</div>

			


				<div class="wrap-input100" >
				 <label class="label-input100" for="phone"> Année d'étude </label>
					 <select id="annee" class="select100" name="annee" id="annee">
					  <option value="">---Sélectionner votre année d'études---</option>
                   <?php
                      $sql="SELECT * FROM annee";
                      $result = mysqli_query($con, $sql);
                      if ($result) {
                      while($row = mysqli_fetch_array($result)) {
                      $intitule  =   $row["intitule"];
                      $id  =   $row["id"];

                     echo'<option value="'.$id.'">'.$intitule.'</option>';
                       
                         }
                      }
                   ?>
                   
					 		  
                   </select>
                    <span class="focus-input100"></span>
				</div>



				<div class="wrap-input100">
				 <label class="label-input100" for="phone"> Entreprise</label>
					 <select id="entreprise" class="select100" name="entreprise" id="entreprise">
                   
					 		  
                   </select>
                    <span class="focus-input100"></span>
				</div>


					
			<div class="wrap-input100">
				 <label class="label-input100" for="phone"> Selectionner votre CV </label>
					<input id="Filename" class="file100" type="file" name="Filename" placeholder="Charger un fichier">
					<span class="focus-input100"></span>
				</div>

              
               <div class="container-contact100-form-btn">
			   <input type="submit" value="Envoyer"  id="envoyer" name="envoyer" class="contact100-form-btn"/>
               <input type="reset" value="Reset"  class="contact100-form-btn"/>
				</div>



            




			</form>

			<div class="contact100-more flex-col-c-m" style="background-image: url('images/bg-02.jpg');">
			 <div class="flex-w size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-map-marker"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Address Mail
						</span>

						<span class="txt2">
						events.simulations@gmail.com
						</span>
					</div>
				</div>
		</div>
	</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script  src="js/form.js"></script>


	<div id="dropDownSelect1"></div>


<!--===============================================================================================-->




	<?php
	
 if(isset($_POST['name'])) {$nom=$_POST['name'];}
 else $nom="";
  if(isset($_POST['prenom'])) {$prenom=$_POST['prenom'];}
 else $prenom="";
  if(isset($_POST['email'])) {$email=$_POST['email'];}
 else $email="";
  if(isset($_POST['phone'])) {$phone=$_POST['phone'];}
 else $phone="";

 if(isset($_POST['specialite'])) {$specialite=$_POST['specialite'];}
 else $specialite="";


 if(isset($_POST['conteur'])) {$conteur=$_POST['conteur'];}
 else $conteur=0;

 if(isset($_POST['annee'])) {$annee=$_POST['annee'];}
 else $annee="";


 if(isset($_POST['entreprise'])) {$entreprise=$_POST['entreprise'];}
 else $entreprise="";

 

  if(isset($_POST['Filename'])) {$Filename=$_POST['Filename'];}
 else $Filename=""; 
 
  if(isset($_POST['entreprise_mail'])) {$entreprise_mail=$_POST['entreprise_mail'];}
 else $entreprise_mail=""; 


if(isset($_POST['envoyer'])){

$target = "cv_condidature/";


$target = "cv_condidature/";
$Filename=basename($_FILES['Filename']['name']);

$test= str_replace(".", $nom."_".$prenom."." ,$Filename);
$target = $target.basename($test);

//This gets all the other information from the form


move_uploaded_file($_FILES['Filename']['tmp_name'], $target);




$result1 = mysqli_query($con, "SELECT * FROM condidat where ( nom='".$nom."' and prenom='".$prenom."') or email='".$email."' ");
 

 if(mysqli_num_rows($result1)>=1){
 	echo '<script> alert("Vous avez deja envoyer votre formulaire")</script>';
    }
else{

$result = mysqli_query($con," INSERT  into  condidat (nom,prenom,email,telephone,id_specialite,id_annee,id_entreprise,cv_condidature) 
values ('".$nom."','".$prenom."','".$email."','".$phone."',".$specialite.",".$annee.",".$entreprise.",'".$test."')")  or die('Erreur SQL !'.$result.'<br>'.mysqli_error($con));


 if($result==1){
 

echo '<script> alert("Votre Formulaire a éte bien ajouter")</script>';

 	$i=$conteur+1;
 
$result = mysqli_query($con," UPDATE etreprise_condidature SET conteur=".$i." where id_entreprise=".$entreprise." and id_specialite=".$specialite."")  or die('Erreur SQL !'.$result.'<br>'.mysqli_error($con));


$spec = mysqli_query($con, "SELECT * FROM specialite where  id=".$specialite."");
$row_s=mysqli_fetch_array($spec);


$header="MIME-VRSION: 1.0\r\n";
$header.='FROM:"simulation-condidatute.com"<'.$email.'>'."\n";
$header.='Content-type:text/html; charset="utf-8"'."\n";
$header.='Content-Transfer-Encoding:8bit';

$message=
 "
<html>
<head>
<title>Condidature</title>
</head>
<body>

<p>Nom : ".$nom."</p>
<p>Prénom  : ".$prenom."</p>

<p>Specialité  : ".$row_s['nom_specialite']." </p>
<p>Vous pouvez télecharger le pdf </p>
<a href='http://simulation-condidature.000webhostapp.com//cv_condidature/".$test."'>Cv de condidatures</a>
</table>
</body>
</html>
"; 

mail($entreprise_mail,"CV Condidatures ",$message,$header);

}


}



}
	?>

</body>
</html>
