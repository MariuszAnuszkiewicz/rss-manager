<?php
use MariuszAnuszkiewicz\classes\Manager\RSSManager;

if (!defined('AUTOLOAD')) {
    define('AUTOLOAD', '../autoload/');
}
require_once(AUTOLOAD . "autoloading.php");

$rssManager = new RSSManager();
$is_read = "yes";
?>
<h3 class="title_category"><?= $rssManager->getSelector(); ?></h3>
<?php
foreach($rssManager->getRows() as $row) {
    $checkIsRead = ($row['is_read'] == $is_read) ? " <b>przeczytane</b>" : "";
    ?>
      <ul id="rows_posts">
          <li class="content_posts"><a href="?link=<?= $row['link']; ?>"><?= $row['title']; ?></a><?= str_repeat("&nbsp", 3) . $row['create_date'] . str_repeat("&nbsp", 5) . $checkIsRead; ?></li>
      </ul>
    <?php
}