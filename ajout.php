	<?php
	include('php/connect.php');
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
    echo"je vais ajouter";

$result = mysqli_query($con," INSERT  into  condidat (nom,prenom,email,telephone,id_specialite,id_annee,id_entreprise,cv_condidature) 
values ('".$nom."','".$prenom."','".$email."','".$phone."',".$specialite.",".$annee.",".$entreprise.",'".$test."')")  or die('Erreur SQL !'.$result.'<br>'.mysqli_error($con));


 if($result==1){
echo "yes";
  	$i=$conteur+1;
$result = mysqli_query($con," UPDATE etreprise_condidature SET conteur=".$i." where id=".$entreprise."")  or die('Erreur SQL !'.$result.'<br>'.mysqli_error($con));

echo '<script> alert("Votre Formulaire a éte bien ajouter")</script>';



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

<p>Specialité  : ".$specialite." </p>
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