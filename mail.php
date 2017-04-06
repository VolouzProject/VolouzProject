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
        ini_set("SMTP","smtp.orange.fr");
        ini_set("smtp_port","25");
        mail("mathieu.daudin@orange.fr","test","test","From: mathieu.daudin@orange.fr");
        
        ?>
    </body>
</html>
