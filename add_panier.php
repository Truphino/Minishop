<?PHP

session_start();
$uns = unserialize(file_get_contents("./private/article"));
$product = $_GET["add"];
if ($product != 0)
{
	if ((!isset($_SESSION["basket"])) || (!isset($_SESSION["basket"][$product])))
	{
		$_SESSION["basket"][$product]["product"] = $uns[$product];
		$_SESSION["basket"][$product]["count"] = $_GET["count"];
	}
	else
		$_SESSION["basket"][$product]["count"] += $_GET["count"];
}
else
	unset($_SESSION["basket"]);
header("Location: index.php")

?>
