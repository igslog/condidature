


var msg="";
  var valider=true;


function writedive_select(id,varbol)
{
  if(varbol=='true'){
$(id).css("border","2px  groove #FF0000");
    var styleContent = 'select'+id+'{ color: red; } select option {color: #000; }';
    var styleBlock = '<style id="placeholder-style">' + styleContent + '</style>';
    $('head').append(styleBlock);
}
else{
  
$(id).css("border","2px  groove #b2b2b2");
    var styleContent = 'select'+id+'{ color: black; } select option {color: #000; }';
    var styleBlock = '<style id="placeholder-style">' + styleContent + '</style>';
    $('head').append(styleBlock);

}
}



function writedive_file(id,varbol)
{
  if(varbol=='true'){
  $(id).css("border","2px  groove #FF0000");
    var styleContent = id+'{ color: red; }';
    var styleBlock = '<style id="placeholder-style">' + styleContent + '</style>';
    $('head').append(styleBlock);
}
else{
  
$(id).css("border","2px  groove #b2b2b2");
    var styleContent = id+'{ color: black; } ';
    var styleBlock = '<style id="placeholder-style">' + styleContent + '</style>';
    $('head').append(styleBlock);

}
}



function writedive(id,text)
{

$(id).attr("placeholder", text);
$(id).css("border-bottom","1px solid #FF0000");
    

  var styleContent = 'input:-moz-placeholder {color: #FF0000;} input::-webkit-input-placeholder {color: #FF0000;}';
     $(id).text(styleContent);

    var styleContent = id+':-moz-placeholder {color: #FF0000;}'+id+'::-webkit-input-placeholder {color: #FF0000;}'+id+
    '-ms-input-placeholder {color: #FF0000;}'+id+'nom:-moz-placeholder {color: #FF0000;}';
    var styleBlock = '<style id="placeholder-style">' + styleContent + '</style>';
    $('head').append(styleBlock);
   
}


function verifform(){
  if($("#Filename").val()==""){
    valider=false;
    writedive_file('#Filename','true');

  }
  else{
valider=true;
    writedive_file('#Filename','false');

  }


 if($("#annee").val()==""){
    valider=false;
    writedive_select('#annee','true');

  }
  else{
valider=true;
    writedive_select('#annee','false');

  }


 if($("#entreprise").val()==""){
valider=false;
    writedive_select('#entreprise','true');

  }
  else{
valider=true;
    writedive_select('#entreprise','false');

  }

  if($("#specialite").val()==""){
valider=false;
    writedive_select('#specialite','true');

  }
  else{
valider=true;
    writedive_select('#specialite','false');


  }

  if($("#name").val()==""){
valider=false;

    writedive('#name','Veuillez remplir votre nom.')
  }
  else{
    valider=true;
    $('#name').css("border-bottom","1px solid #b2b2b2");

  }


if($("#nbre_condidat").val()==""){
valider=false;
    writedive('#nbre_condidat','Veuillez remplir le nombre de condidat.');
  }
   else if(isNaN($("#nbre_condidat").val()) == true)
  {
    valider=false;
     msg+='- Le nombre de condidat doit etre un nombre \n';
    $('#email').css("border-bottom","1px solid #FF0000");

  }
  else{
    valider=true;
    $('#nbre_condidat').css("border-bottom","1px solid #b2b2b2");

  }




    if($("#prenom").val()==""){
valider=false;
    writedive('#prenom','Veuillez remplir votre prénom.')
  }
  else{
    valider=true;
    $('#prenom').css("border-bottom","1px solid #b2b2b2");

  }



    if($("#email").val()==""){
valider=false;
    writedive('#email','Veuillez remplir votre email.')
  }
  else{
    valider=true;
    $('#email').css("border-bottom","1px solid #b2b2b2");

  }
var expressionReguliere =/^(([^<>()[]\.,;:s@]+(.[^<>()[]\.,;:s@]+)*)|(.+))@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}])|(([a-zA-Z-0-9]+.)+[a-zA-Z]{2,}))$/;



if (expressionReguliere.test($("#email").val())){
  valider=true;
$('#email').css("border-bottom","1px solid #b2b2b2");
}
else {
valider=false;
$('#email').css("border-bottom","1px solid #FF0000");
msg+='- Email erronner \n';

}




  
}

$(document).ready(function($) {
 
  var list_target_id = 'entreprise'; //first select list ID
  var list_select_id = 'specialite'; //second select list ID
  var initial_target_html = '<option value="">---Selectionner une entreprise---</option>'; //Initial prompt for target select
 
  $('#'+list_target_id).html(initial_target_html); //Give the target select the prompt option


  $('#entreprise').change(function(e) {
    //Grab the chosen value on first select list change
    var selectvalue = $(this).val();

    if (selectvalue == "") {
        //Display initial prompt in target select if blank value selected
       $('#conteur').html(initial_target_html);
    } else {
      //Make AJAX request, using the selected value as the GET
      $.ajax({
        type: "POST",
        url: "conteur.php",
        data: "data="+selectvalue,
             success: function(output) {
               
                $('#phone').html(output);
            },
          error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status + " "+ thrownError);
          }});
        }
    });



 $('#'+list_select_id).change(function(e) {
    //Grab the chosen value on first select list change
    var selectvalue = $(this).val();
 
 
    if (selectvalue == "") {
        //Display initial prompt in target select if blank value selected
       $('#'+list_target_id).html(initial_target_html);
    } else {
      //Make AJAX request, using the selected value as the GET
      $.ajax({
        type: "POST",
        url: "remplirlist.php",
        data: "data="+selectvalue,
             success: function(output) {
               
                $('#'+list_target_id).html(output);
            },
          error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status + " "+ thrownError);
          }});
        }
    });



  $('#prenom').focusout(function(e) {
if($("#prenom").val()==""){
valider=false;
    writedive('#prenom','Veuillez remplir votre prénom.')
  }
  else{
    valider=true;
    $('#prenom').css("border-bottom","1px solid #b2b2b2");

  }


});

$('#specialite').focusout(function(e) {
 if($("#specialite").val()==""){
valider=false;
    writedive_select('#specialite','true');

  }
  else{
valider=true;
    writedive_select('#specialite','false');
}});

 $('#email').focusout(function(e) {
    if($("#email").val()==""){
valider=false;
    writedive('#email','Veuillez remplir votre email.')
  }
  else{
    valider=true;
    $('#email').css("border-bottom","1px solid #b2b2b2");

  }
});




  $('#name').focusout(function(e) {
 if($("#name").val()==""){
valider=false;

    writedive('#name','Veuillez remplir votre nom.')
  }
  else{
    valider=true;
    $('#name').css("border-bottom","1px solid #b2b2b2");

  }
});

  $('#annee').focusout(function(e) {
if($("#annee").val()==""){
    valider=false;
    writedive_select('#annee','true');

  }
  else{
valider=true;
    writedive_select('#annee','false');

  }
  });


  $('#entreprise').focusout(function(e) {
 if($("#entreprise").val()==""){
valider=false;
    writedive_select('#entreprise','true');

  }
  else{
valider=true;
    writedive_select('#entreprise','false');

  }

  });

  $('#Filename').focusout(function(e) {
if($("#Filename").val()==""){
    valider=false;
    writedive_file('#Filename','true');

  }
  else{
valider=true;
    writedive_file('#Filename','false');

  }
//verifform();

  });




$('#nbre_condidat').focusout(function(e) {
if($("#nbre_condidat").val()==""){
    valider=false;
    writedive_file('#nbre_condidat','true');

  }
  else if(isNaN($("#nbre_condidat").val()) == true)
{
    valider=false;
    writedive_file('#nbre_condidat','true');
  }

  else{
valider=true;
    writedive_file('#nbre_condidat','false');

  }
//verifform();

  });


  document.getElementById("condidature").onsubmit=function() {
 
    verifform();
     if(valider==true){

  var nom = $("#name").val();
var prenom = $("#prenom").val();
var email = $("#email").val();
var entreprise = $("#entreprise").val();


var specialite = $("#specialite").val();

      //Make AJAX request, using the selected value as the GET
      $.ajax({
        type: "POST",
        url: "entretien_mail.php",
        data: "entreprise="+entreprise+" & specialite= "+specialite+ " & email ="+email,
             success: function(output) {
               
            },
          error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status + " "+ thrownError);
          }});
        

     $.ajax({
        type: "POST",
        url: "exist.php",
        data: "nom="+nom+ "& prenom= " + prenom+" & email=" + email,
             success: function(output) {
               
                $('#'+list_target_id).html(output);
            },
          error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status + " "+ thrownError);
          }});

 return(true);
}

else
  {
  if(msg!="")
    alert(msg);

  return(false);
}
  




  };


  
});


