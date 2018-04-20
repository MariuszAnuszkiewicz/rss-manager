<?php
if (!defined('AUTOLOAD')) {
    define('AUTOLOAD', '../autoload/');
}
include_once(AUTOLOAD . "autoloading.php");

if(isset($_POST['id']) && isset($_POST['content_favorite'])) {
    $id = $_POST['id'];
    $favorite = $_POST['content_favorite'];
}

$db = DB::getInstance();
$sql = "UPDATE rss_store SET favorite = ? WHERE id = ?";
$db->query($sql, array($favorite, $id));
return $db->getExecute();
