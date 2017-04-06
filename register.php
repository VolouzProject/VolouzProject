<!DOCTYPE html>


<html>
    <head>
        <title>Register</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="register.css">
    </head>
    <body>
        <?php
     
        if(isset($_POST['submit']))
        {
          
            $username=htmlentities(trim($_POST['username']));
            $password=htmlentities(trim($_POST['password']));
            $repeatpassword=htmlentities(trim($_POST['repeatpassword']));
            $name=htmlentities(trim($_POST['name']));
            $email=htmlentities(trim($_POST['email']));
            $emailbis=htmlentities(trim($_POST['emailbis']));
            $firstname=htmlentities(trim($_POST['firstname']));
            
            if($password&&$repeatpassword&&$username&&$email&&$emailbis&&$name&&$firstname){
                if($password===$repeatpassword){
                    $password=sha1($password);
                    
                    $connect=mysqli_connect('localhost','root','')or die('Error');
                    mysqli_select_db($connect,'volouz_client');
                    
                    $reg=mysqli_query($connect,"SELECT * FROM client WHERE username='$username'");
                    $rows=mysqli_num_rows($reg);
                    if($rows===0)
                    {
                        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            
                            if($email===$emailbis){
                          
                   
                    $cle=md5(microtime(TRUE)*100000);
                     $query=mysqli_query($connect,"INSERT INTO client VALUES('','$name','$firstname','$username','$email','$password','$cle','')");
                    $destinataire="mathieu.daudin@orange.fr";
                    $sujet="Activation de votre compte Volouz";
                    $entete="From: mathieu.daudin@orange.fr";
                    $message='Bienvenue chez Volouz
                        
                    Pour activer votre compte, veuillez cliquer sur le lien ci-dessous ou le copier/coller
                    dans votre navigateur internet.
                    http://localhost/validation.php?log='.urlencode($username).'&cle='.urlencode($cle).'
                    ------------------
                    Ceci est un mail automatique, merci de ne pas y répondre.';
                    ini_set("SMTP","smtp.orange.fr");
                    ini_set("smtp_port","25");
                    ini_set("username","mathieu.daudin@orange.fr");
                    ini_set("password","mathieu91590");
                    mail($destinataire,$sujet,$message,$entete);
                    
                    
                    die("Inscription terminée, <a href='login.php'>connectez-vous</a>");
                    
                    
                            }else {                                echo 'les adresses mail ne correspondent pas';}    
                    
                    
                            }else {
                             echo 'Cet email a un format non adapté.';
                            }
                    
                          }else{                        echo 'le pseudo est déjà utilisé';}
                }
        else{    echo 'Veuillez saisir des mots de passe identiques';}
        
        }else{ echo  'Veuillez saisir tous les champs';}
            }
        
        
        
        
        
        
        ?>
        <div id="desc1">
        <h1>Qu'est-ce que Volouz</h1>
        <p id="desc">Volouz est une marque de vêtements qui repose sur la broderie d'Art fait main. Tous les logos et motifs sont dessinés et brodés à la main.</p>
        </div>
        <div id="desc2">
        <h1>Comments sont fabriqués les vêtements Volouz</h1>
        <p id="desc">Les vêtements étant brodés à la main, les délais de livraison seront entre 2 et 3 semaines</p>
        </div>
        <div id="formulaire">
        <h1>Inscrivez-vous:</h1>
        <form method="post" action="register.php">
            
            
            
            <p>Votre nom:</p>
            <input type="text" name="name">
            <p>Votre prénom:</p>
            <input type="text" name="firstname">
            <p>Votre pseudo</p>
            <input type="text" name="username">
            <p>Votre adresse mail:</p>
            <input type="email" name="email">
            <p>Confirmez votre adresse mail:</p>
            <input type="email" name="emailbis">
            
            <p>Votre mot de passe:</p>
            <input type="password" name="password">
            <p>Tapez de nouveau votre mot de passe:</p>
            <input type="password" name="repeatpassword"><br><br>
            <input type="submit" value="S'inscrire" name="submit" style="background: #811453; border: 2px solid #666; border-radius: 8px;">
            
        </form>
        </div>

    </body>
</html>
