<?php
require_once "includes/ShortLink.php";

$url = $_SERVER["REQUEST_URI"];
$shortLink = substr($url, 1, strlen($url));

if (ShortLink::isExistShort($shortLink)) {
	$fullLink = ShortLink::select("`short_link` = :link", ["link" => $shortLink])[0]["full_link"];
	if (strpos($fullLink, "http") === false)
		$fullLink = "https://" . $fullLink;

	header("Location: " . $fullLink);
} else {
	echo "<p>Короткой ссылки не найдено</p>";
}