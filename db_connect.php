<?php

define('DB_USERNAME', 'ujg2h_me_bot');
define('DB_PASSWORD', 'yukari_1124');
define('PDO_DSN', 'mysql:host=mysql93.conoha.ne.jp;dbname=ujg2h_me_bot;charset=utf8');

try {
	$dbh = new PDO(PDO_DSN,DB_USERNAME,DB_PASSWORD, [
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_EMULATE_PREPARES => false,
	]);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	exit('DB接続に失敗しました' . PHP_EOL . $e->getMessage());;
}
?>
