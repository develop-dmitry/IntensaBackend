<?

$file = "redirect.php";
switch ($_SERVER["REQUEST_URI"]) {
	case "/":
		$file = "home.php";
		break;
	case "/ajax.php":
		$file = "ajax.php";
		break;
}

require $file;