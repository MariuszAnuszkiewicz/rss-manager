<?php

if (strstr($_SERVER['HTTP_USER_AGENT'],"Firefox")) {

    echo '<link rel="stylesheet" href="web/css/style-firefox.css" type="text/css" />';

}
else if (strstr($_SERVER['HTTP_USER_AGENT'],"Chrome")){

    echo '<link rel="stylesheet" href="web/css/style-chrome.css" type="text/css" />';

}

?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">

    <script src="web/js/jquery-1.11.0.min.js"></script>
    <script src="web/js/nav-canals.js"></script>
    <script src="web/js/ajax_content.js"></script>
    <script src="web/js/edit.js"></script>
    <script src="web/js/delete.js"></script>
    <script src="web/js/add_to_favorite.js"></script>
    <script src="web/js/nav-time_remove.js"></script>

    <title></title>

</head>
<body>

<div id="click_btn"><span id="icon"></span></div>

<?php

include_once("autoload/autoloading.php");
include_once("web/forms/selectTimeremove.php");

$rss = new RSSManager();
$rss->getContent();

$data = new DataStoreXML();
$data->getContent();


?>
<div id="response"></div>

<?php

?>
<div id="nav-bar">
<?php
include_once("web/forms/showCanals.php");
include_once("web/forms/addCanals.php");
include_once("web/forms/selectCanal.php");
?>
</div>

</body>
</html>
