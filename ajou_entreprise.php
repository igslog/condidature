
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
			<form class="contact100-form validate-form" method="POST"  action="ajou_entreprise.php" name="condidature" id="condidature" enctype="multipart/form-data">

                <div class="tous-logo">
				<div class="logo">
                 <img src="images/logo1.png"  height="100"  width="62">
				</div>

				<div class="logo">
                 <img src="images/logo2.png"  height="100" width="62">
				</div>

				<div class="logo">
                 <img src="images/logo3.png"  height="100" width="62">
				</div>

				<div class="logo">
                 <img src="images/logo4.png"  height="100" width="62">
				</div>

				<div class="logo">
                 <img src="images/logo5.png" height="100" width="62">
				</div>

				<div class="logo">
                 <img src="images/logo6.png" height="100" width="62">
				</div>
				<div class="logo">
                 <img src="images/logo7.png"  height="100" width="62">
				</div>
                </div>


				<span class="contact100-form-title">
					<u>Remarque : </u> cet évènement est juste une simulation et vous ne serez pas réellement embouché.
				</span>
               
			
				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Type first name">
				 <label class="label-input100"> Nom  </label>
					<input id="name" class="input100" type="text" name="name" placeholder="Nom">
					<span class="focus-input100"></span>
					<span id="erreur-nom"></span>
				</div>
				
				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
				 <label class="label-input100" for="email"> E-mail </label>
					<input id="email" class="input100" type="text" name="email" placeholder="Eg. example@email.com">
					<span class="focus-input100"></span>
				</div>

		
				<div class="wrap-input100">
				 <label class="label-input100" for="address"> Adresse </label>
					<input id="address" class="input100" type="text" name="address">
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

                     echo'<option value='.$id.'>'.$specialite.'</option>';
                         }
                      }
                   ?>
					 		  
                   </select>
                    <span class="focus-input100"></span>
				</div>

              <div class="wrap-input100">
				 <label class="label-input100" for="nbre"> Nombre de condidature </label>
					<input id="nbre_condidat" class="input100" type="text" name="nbre_condidat" placeholder="0">
					<span class="focus-input100"></span>
				</div>




               <div class="container-contact100-form-btn">
			   <input type="submit" value="Envoyer"  id="envoyer" name="envoyer" class="contact100-form-btn"/>
               <input type="reset" value="Reset"  class="contact100-form-btn"/>
				</div>

            </form>

			<div class="contact100-more flex-col-c-m" style="background-image: url('images/bg-02.jpg');">
				
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

  if(isset($_POST['email'])) {$email=$_POST['email'];}
 else $email="";
  if(isset($_POST['phone'])) {$phone=$_POST['phone'];}
 else $phone="";


 if(isset($_POST['specialite'])) {$specialite=$_POST['specialite'];}
 else $specialite="";


  if(isset($_POST['adress'])) {$adress=$_POST['adress'];}
 else $adress="";


 if(isset($_POST['nbre_condidat'])) {$nbre_condidat=$_POST['nbre_condidat'];}
 else $nbre_condidat="";



if(isset($_POST['envoyer'])){
$id1=0;

$result1 = mysqli_query($con, "SELECT * FROM entreprise where  nom_entreprise='".$nom."' or email='".$email."' ");
if(mysqli_num_rows($result1)==0){
$result = mysqli_query($con," INSERT  into  entreprise (nom_entreprise,email,telephone,Adress) 
values ('".$nom."','".$email."','".$phone."','".$adress."')")  or die('Erreur SQL !'.$result.'<br>'.mysqli_error($con));
$id1= mysqli_insert_id($con);
}
else{
$row = mysqli_fetch_array($result1);
$id1= $row['id'];
}

$test = mysqli_query($con, "SELECT * FROM  etreprise_condidature where  id_entreprise=".$id1." and id_specialite=".$specialite."");
 

if(mysqli_num_rows($test)!=0){
 	echo '<script> alert("Vous avez deja enregistrer l\'entreprise avec la spésialite choisis ")</script>';
    }
else{
$results = mysqli_query($con," INSERT  into  etreprise_condidature (id_entreprise,id_specialite,nbre_condidature) 
values ('".$id1."','".$specialite."','".$nbre_condidat."')")  or die('Erreur SQL !'.$results.'<br>'.mysqli_error($con));

echo '<script> alert("Votre Formulaire a éte bien ajouter")</script>';

}


}
	?>

</body>
</html>
