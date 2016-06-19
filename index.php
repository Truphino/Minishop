<?php
session_start();
if (!file_exists("./private/article"))
  header('Location: install.php');
if (!$_SESSION['categorie'])
  $_SESSION['categorie'] = 'Tendance';
if ($_GET['id'])
  $_SESSION['categorie'] = $_GET['id'];
$str = file_get_contents("./private/article");
$article = unserialize($str);
$categ = array();
function verif_categ($ver_cat, $categ_ver)
{
  foreach($categ_ver as $elem)
  {
    if (in_array($ver_cat, $categ_ver, true))
        return 0;
  }
  return 1;
}
foreach ($article as $key => $value)
{
  if (verif_categ($article[$key]['categ1'], $categ))
    $categ[] = $article[$key]['categ1'];
  if (verif_categ($article[$key]['categ2'], $categ))
    $categ[] = $article[$key]['categ2'];
}
$categ = array_filter($categ, strlen);
sort($categ);
$_SESSION['allcategorie'] = $categ;
?>
<html>
  <head>
    <title>42style.com</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="index.css"/>
  </head>
  <body>
<?php include("auth.php");
auth($_POST['login'], $_POST['passwd']); ?>
<header>
    <div class="title">
      <h1 style='font-family: cursive;'>42style.com<?php if ($_SESSION['login']){ ?>
      <span style='margin-left: 50px; font-family: comic sans ms; font-size: 20px; font-weight:normal;'>🖥 <?php echo($_SESSION['login']); ?>
      </span><?php } ?></h1>
    </div>
      <?php if ($_SESSION['login']){ ?>
        <div id="log">
          <form class='head' action='index.php' style="text-align: center" method="post">
            <input type='button' onclick="self.location.href='./log_out.php'" value="Se déconnecter">
            <input type='button' onclick="self.location.href='./modif.php'" value="Changer mon mot de passe">
            <input type='button' onclick="self.location.href='./delete_acc.php'" value="Supprimer son compte">
          </form>
        </div>
      <?php }else{ ?>
      <div id="delog">
        <form class='head' action='index.php' style="text-align: center" method="post">
          Identifiant: <input style='margin-right: 10px' type="text" name='login' value="" />
          Mot de passe: <input style='margin-right: 10px' type="password" name='passwd' value="" />
          <input type="Submit" name='submit' value='OK'/>
          <span id='sep'>|</span>
          <input type='button' onclick="self.location.href='./create.php'" value="S'enregistrer">
        </form>
      </div>
  <?php } ?>
	<!--tr-->
	<div id="basket">
		<a href="#"><img id="basket" src="http://www.outils-ref.com/wp-content/themes/MagMan/timthumb.php?src=http://www.outils-ref.com/wp-content/uploads/2013/07/panier.png&w=210&h=210&zc=1&q=80">
		<iframe id="basket_frame" src="./panier.php"></iframe></a>
	</div>
	<!--tr-->
</header>
  <div id='englobe'>
    <div id='choose'>
      <?php
      foreach ($_SESSION['allcategorie'] as $elem)
      {
        echo ("<a class='categorie' href='index.php?id=$elem'>$elem</a><br />");
      }
      ?>
    </div>
    <div id='item'>
    <?php foreach ($article as $key => $value)
	  {
      if ($article[$key]['categ1'] === $_SESSION['categorie'] || $article[$key]['categ2'] === $_SESSION['categorie'])
      {
		$click = './add_panier.php?add='.$key.'&count=1';
        echo("<img src=".$article[$key]['url'].">");
        echo ($article[$key]['nom']);
        echo (" ".$article[$key]['prix']);
		##trecomps
		echo '<a href="'.$click.'" class="button">Ajouter</a>';
		##trecomps
      }
    }
    ?>
	<a href="./add_panier.php?add=0" class="button">Vider panier</a>
    </div>
  </div>
  </body>
</html>
