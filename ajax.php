<?
require_once "includes/ShortLink.php";

$response = [];

if (strlen($shortLink = ShortLink::add($_REQUEST["link"])) > 0) {
	$response["status"] = true;
	$response["message"] = "<a href='/" . $shortLink . "' target='_blank'>" . $_SERVER["SERVER_NAME"] . "/" . $shortLink . "</a>";
} else {
	$response["status"] = false;
	$response["message"] = "Произошла ошибка";
}

exit(json_encode($response));