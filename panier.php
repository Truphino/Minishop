<?PHP session_start(); ?>

<html>
	<head>
		<title>Panier 42-style</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="panier.css">
	</head>
	<body>

<?PHP

if (isset($_SESSION["basket"]))
{
	foreach ($_SESSION["basket"] as $bask)
	{
	echo '<table>';
		echo '<tr>';
		echo '<td rowspan="2" colspan="2"><img class="product_img" src="'.$bask["product"]["url"].'" alt="'.$bask["product"]["nom"].'"></img></td>';
		echo '<td rowspann="2"><h5>'.$bask["product"]["nom"].':</h5></td>';
		echo '<td><h5>Sous-total:<h5></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td rowspan="2">Qte:'.$bask["count"].'	Prix:'.$bask["product"]["prix"].'</td>';
		echo '<td>'.$bask["count"] * $bask["product"]["prix"].'</td>';
		echo '</tr>';
	echo '</table>';
	}
}
else
{
	echo 'Le panier est vide :(';
}

?>
	</body>
</html>
