<?
require_once "DataBase.php";

class ShortLink {
	public static function isExistFull ($link) {
		$query = "SELECT COUNT(*) as count FROM links WHERE `full_link` = :link";
		return DataBase::query($query, ["link" => $link])[0]["count"] > 0;
	}

	public static function isExistShort ($link) {
		$query = "SELECT COUNT(*) as count FROM links WHERE `short_link` = :link";
		return DataBase::query($query, ["link" => $link])[0]["count"] > 0;
	}

	public static function add ($fullLink) {
		if (self::isExistFull($fullLink)) {
			return self::select("`full_link` = :link", ["link" => $fullLink])[0]["short_link"];
		} else {
			$query = "INSERT INTO links (`full_link`, `short_link`) VALUES (:full_link, :short_link)";
			$shortLink = self::generateShortLink();
			return (DataBase::add($query, ["full_link" => $fullLink, "short_link" => $shortLink])) ? $shortLink : false;
		}
	}

	public static function select ($where, $params) {
		$query = "SELECT * FROM links";
		if (strlen($where) > 0)
			$query .= " WHERE " . $where;

		return DataBase::query($query, $params);
	}

	private static function generateShortLink () {
		while (true) {
			$shortLink = substr(md5(time()), 0, 3);
			if (!self::isExistShort($shortLink)) {
				return $shortLink;
			}
		}
	}
}
