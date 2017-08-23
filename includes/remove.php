<?php
include_once("../autoload/autoloading.php");


  $id = $_POST['id'];
  $db = DB::getInstance();

  $sql = "SELECT * FROM rss_store ORDER BY url_category";
  $db->query($sql, "Param_OFF");
  $result = $db->results();
  $quantity = $db->countRow();
  $xrr = new DataStoreXML();
  $xrr->deleteCanals($quantity, $id);

?>