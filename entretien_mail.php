<?php
include('php/connect.php');



 	echo '<script> alert("waaawww")</script>';



$result = mysqli_query($con, "SELECT * FROM entreprise, entretien_date where entreprise.id=entretien_date.id_entreprise and nbre_pers>conteur   and id_entreprise=2 LIMIT 1");
 

if(mysqli_num_rows($result)!=0){
$row=mysqli_fetch_array($result);
$i=$row['conteur']+1;
$result = mysqli_query($con," UPDATE entretien_date SET conteur=".$i." where id=".$row['id']."")  or die('Erreur SQL !'.$result.'<br>'.mysqli_error($con));





$header="MIME-VRSION: 1.0\r\n";
$header.='FROM:"simulation-condidatute.com"<'.$row['email'].'>'."\n";
$header.='Content-type:text/html; charset="utf-8"'."\n";
$header.='Content-Transfer-Encoding:8bit';

$message=
 "
<html>
<head>
<title>Condidature</title>
</head>
<body>


Madame/Mademoiselle/Monsieur, 
Votre candidature au poste de ".$specialite." au sein de l'entreprise  ".$row['nom_entreprise']." a éte bien envoyer. L'entreprise  souhaite vous rencontrer  le ".$row['date_e']." à parte de ".$row['heure']." dans nos locaux (".$row['Adress'].").
</table>
</body>
</html>
"; 

mail($email_condidat,"CV Condidatures ",$message,$header);


    }
?>
