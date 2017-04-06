<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <?php
 
$connect=mysqli_connect('localhost','root','')or die('Error');
mysqli_select_db($connect,'volouz_client');
                    
$username= $_GET['log'];
$cle = $_GET['cle'];
 
$reg=mysqli_query($connect,"SELECT comfirmkey,actifAccount FROM client WHERE username='$username'");
$rows=mysqli_num_rows($reg);
if($rows===1){
    
    $clebdd = $rows['confirmkey'];	
    $actif = $rows['actifAccount'];
}

 
 

if($actif == '1')
  {
     echo "Votre compte est déjà actif !";
  }
else
  {
     if($cle == $clebdd) 	
       {
          	
          echo "Votre compte a bien été activé !";
 
          $reg=mysqli_query($connect,"UPDATE client SET actifAccount = 1 WHERE username='$username'");
          
         
       }
     else 
       {
          echo "Erreur ! Votre compte ne peut être activé...";
       }
  }
  
  ?>
    </body>
</html>
