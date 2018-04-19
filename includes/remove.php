<?php

include_once("../autoload/autoloading.php");
use MariuszAnuszkiewicz\classes\Database\DB;
use MariuszAnuszkiewicz\classes\Data\DataStoreXml;

$id = $_POST['id'];
$db = DB::getInstance();

$sql = "SELECT * FROM rss_store ORDER BY url_category";
$db->query($sql);
$result = $db->results();
$quantity = $db->countRow();
$xrr = new DataStoreXML();
$xrr->deleteCanals($quantity, $id);
