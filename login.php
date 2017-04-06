<!DOCTYPE html>

<html>
    <head>
        <title>Connexion</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
               <?php
     
        if(isset($_POST['connect']))
        {
          
            $username=htmlentities(trim($_POST['username']));
            $password=htmlentities(trim($_POST['password']));
           if ($username&&$password){
               
               $connect=mysqli_connect('localhost','root','')or die('Error');
               mysqli_select_db($connect,'volouz_client');
               $query=mysqli_query($connect,"SELECT * FROM client WHERE username='$username'&&password='$password'");
               $rows=mysqli_num_rows($query);
               if($rows===0){
                   
                   header('Location:index.html');
               }
               else{    echo 'Le pseudo ou le mot est incorrecte';}
           }
           else {echo 'Veuillez saisir tous les champs';}
           }
           

        
        
        
        ?>
                
        <form method="post" action="login.php">
            
            <p>Votre pseudo:</p>
            <input type="text" name="username">
            <p>Votre mot de passe:</p>
            <input type="password" name="password">
            <input type="submit" value="Se connecter" name="connect">
            
        </form>
    </body>
</html>
