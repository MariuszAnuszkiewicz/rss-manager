<?php

include_once("../autoload/autoloading.php");
use MariuszAnuszkiewicz\classes\Database\DB;

if(isset($_POST['id']) && isset($_POST['text'])) {
    $id = $_POST['id'];
    $text = $_POST['text'];
}

$db = DB::getInstance();
$sql_update = "UPDATE rss_store SET url_category = ? WHERE id = ?";
$db->query($sql_update, array($text, $id));
return $db->getExecute();
