<?PHP

session_start();
if (isset($_SESSION["basket"]))
{
	var_dump($_SESSION["basket"]);
}
else
{
	echo 'Le panier est vide :(';
}

?>
