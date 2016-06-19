<?php
include('register.php');
$ret = register($_POST['login'], $_POST['passwd'], $_POST['submit'], $_POST['nom'], $_POST['prenom'], $_POST['cp'], $_POST['addr']);
if ($ret === 1)
header('Location: index.php')
?>
<html>
  <head>
    <title>42style.com</title>
    <link rel="stylesheet" href="create.css"/>
    <meta charset="UTF-8">
  </head>
  <body>
    <div id='regis'>
      <h1 id='tit_crea'>Créer votre compte personnel</h1>
      <form action='create.php' style="text-align: center" method="post">
        Identifiant: <input type="text" name='login' value="" /><?php if ($ret < 0) echo "Login déjà utilisé<br />";
        else{ ?><br /><?php } ?>
        Mot de passe: <input type="password" name='passwd' value="" /><br />
        *Nom: <input type="text" name='nom' value="" /><br />
        *Prénom: <input type="text" name='prenom' value="" /><br />
        *Code postal: <input type="text" name='cp' value="" /><br />
        *Adresse de livraison: <input type="text" name='addr' value="" /><br />
        <input type="Submit" name='submit' value='Envoyer'/>
      </form>
      <a href="index.php">Go back</a>
    </div>
  </body>
</html>
