<?php
session_start();
if (!file_exists("./private"))
  mkdir("./private");
$article = array(array());
$article[] = array('url' => "http://media.lahalle.com/catalog/product/cache/0/small_image/235x312/9df78eab33525d08d6e5fb8d27136e95/L/B/veste-de-costume_la-halle-76b068bba1ee8be96a3fe5e8edbb4f72-a.jpg", 'nom' => "Veste de costume classique", 'prix' => "119 €", 'categ1' => "Homme", 'categ2' => "Tendance");
$article[] = array('url' => "http://media.lahalle.com/catalog/product/cache/0/small_image/235x312/9df78eab33525d08d6e5fb8d27136e95/B/g/pantalon-de-costume-coupe-regular_la-halle-6736821bf13b44e79ccae7ae70e0e19c-a.jpg", 'nom' => "Pantalon de costume", 'prix' => "49 €", 'categ1' => "Homme", 'categ2' => "Tendance");
$article[] = array('url' => "http://media.lahalle.com/catalog/product/cache/0/small_image/235x312/9df78eab33525d08d6e5fb8d27136e95/0/z/veste-110_la-halle-b6281e955505d86e630b75dbf8be5680-b.jpg", 'nom' => "Veste de costume grise", 'prix' => "109 €", 'categ1' => "Homme", 'categ2' => "Tendance");
$article[] = array('url' => "http://media.lahalle.com/catalog/product/cache/0/small_image/235x312/9df78eab33525d08d6e5fb8d27136e95/5/l/bermuda-basique-8_la-halle-026a5453a4a2cfa64ffdaa1b084c333a-b.jpg", 'nom' => "Bermuda", 'prix' => "39 €", 'categ1' => "Homme", 'categ2' => "Détente");
$article[] = array('url' => "http://media.lahalle.com/catalog/product/cache/0/small_image/235x312/9df78eab33525d08d6e5fb8d27136e95/J/b/chemise-broderie-anglaise-unie_la-halle-cf6c4657050ec2acb76ee87d734ff76d-b.jpg", 'nom' => "Chemisier", 'prix' => "59 €", 'categ1' => "Tendance", 'categ2' => "Femme");
$str = serialize($article);
file_put_contents("./private/article", $str);
$_SESSION['categorie'] = "Tendance";
header('Location: index.php');
?>
