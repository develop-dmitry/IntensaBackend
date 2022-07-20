<?
require_once "includes/ShortLink.php";

$response = ["status" => false];

if (filter_var($_REQUEST["link"], FILTER_VALIDATE_URL) === false) {
	$response["message"] = "Введена некорректная ссылка";
} else {
	if (strlen($shortLink = ShortLink::add($_REQUEST["link"])) > 0) {
		$response["status"] = true;
		$response["message"] = "<a href='/" . $shortLink . "' target='_blank'>" . $_SERVER["SERVER_NAME"] . "/" . $shortLink . "</a>";
	} else {
		$response["message"] = "Произошла ошибка";
	}
}

exit(json_encode($response));