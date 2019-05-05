<?
require($_SERVER['DOCUMENT_ROOT'].'/config.php');
$dsn = "mysql:host=".$cfg['hostname'].";dbname=".$cfg['db'].";charset=utf8";
$opt = array(
    PDO::ATTR_ERRMODE  => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);
try { $db = new PDO($dsn, $cfg['dbuser'], $cfg['dbpass'], $opt); }
catch (PDOException $e) {
	file_put_contents($_SERVER['DOCUMENT_ROOT'].'/logs/PDOErrors.txt', $e->getMessage().PHP_EOL, FILE_APPEND);
	die('MySQL ERROR');
}
?>
