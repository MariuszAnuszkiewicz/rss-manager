<?php


include_once("../autoload/autoloading.php");


if(isset($_POST['id']) && isset($_POST['text'])) {

    $id = $_POST['id'];
    $text = $_POST['text'];

}

$db = DB::getInstance();

    $sql_update = "UPDATE rss_store SET url_category = ? WHERE id = ?";
    $db->query($sql_update, "Param_ON", array($text, $id));
    return $db->getExecute();


?>