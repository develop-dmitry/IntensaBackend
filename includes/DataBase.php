<?
require_once "config.php";

class DataBase {
	private static $db;

	public static function getDB() {
		if (!self::$db) {
			self::$db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
		}

		return self::$db;
	}

	public static function query ($query, $params = []) {
		$stmt = self::getDB()->prepare($query);
		$stmt->execute($params);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public static function add ($query, $params = []) {
		$stmt = self::getDB()->prepare($query);
		return ($stmt->execute($params)) ? self::getDB()->lastInsertId() : false;
	}
}
