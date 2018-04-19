<?php
use MariuszAnuszkiewicz\classes\Data\DataStoreXml;
use MariuszAnuszkiewicz\classes\Manager\RSSManager;

if (!defined('AUTOLOAD')) {
    define('AUTOLOAD', './autoload/');
}
require_once(AUTOLOAD . "autoloading.php");
require_once(FORMS . "select_time_remove.php");

$rssManager = new RSSManager();
$rssManager->getContent();
$dataStoreXML = new DataStoreXML();
$dataStoreXML->getContent();

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <script src="web/js/jquery-3.3.1.min.js"></script>
    <script src="web/js/nav_canals.js"></script>
    <script src="web/js/ajax_content.js"></script>
    <script src="web/js/edit.js"></script>
    <script src="web/js/delete.js"></script>
    <script src="web/js/add_to_favorite.js"></script>
    <script src="web/js/nav_time_remove.js"></script>
    <link rel="stylesheet" href="web/css/style-chrome.css" type="text/css" />
    <link rel="stylesheet" href="web/css/style-firefox.css" type="text/css" />
    <title>Rss Manager</title>
</head>
<body>
 <div id="response"></div>
 <div id="click_btn"><span id="icon"></span></div>
 <div id="nav-bar">
    <?php
     include_once(FORMS . "show_canals.php");
     include_once(FORMS . "add_canals.php");
     include_once(FORMS . "select_canal.php");
    ?>
 </div>
</body>
</html>
