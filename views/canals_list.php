<?php
use MariuszAnuszkiewicz\classes\Database\DB;
use MariuszAnuszkiewicz\classes\Data\DataStoreXML;

if (!defined('AUTOLOAD')) {
    define('AUTOLOAD', '../autoload/');
}
include_once(AUTOLOAD . "autoloading.php");
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <?php
    $db =  DB::getInstance();
    $dataStoreXML = new DataStoreXML();
    $count = 1;
    $sql = "SELECT * FROM rss_store ORDER BY url_category";
    $db->query($sql);
    $row = $result = $db->results();

    if ($db->countRow() > 0) {
        $title = 'Spis kanałów RSS.';
        echo '<h3 class="title">' . $title . '</h3>';
    ?>
    <div class='container'>
        <table border='0.7'>
            <tr style='background: whitesmoke;'>
                <th class="label_category"><a>Url Kategorie</a></th>
                <th class="label_addresses">Adresy url</th>
                <th class="label_add">Dodaj do Ulubionych</th>
                <th class="label_date"><a>Data dodania</a></th>
                <th class="label_delete">Kasowanie</th>
                <th class="label_isfavorite">Ulubione</th>
            </tr>
    <?php
    } else {
        return null;
    }
    ?>
    <?php
    foreach($dataStoreXML->getCanalsRows() as $row) {
            $is_favorite = ($row['favorite'] == "no") ? 'noactive' : 'active';
    ?>
        <tr>
            <td class="url" data-id="'<?= $row['id']; ?>'" contenteditable><?= $row['url_category']; ?></td>
            <td class="address"><?= $row['url_address']; ?></td>
            <td class="content_favorite"><span class="no_add_favorite" data-id_fav="'<?= $row['id']; ?>'" data-value_fav="'<?= $row['favorite']; ?>'"></span></td>
            <td class="date"><?= $row['date_to_add']; ?></td>
            <td align='center'><span class='delete' id='del_<?= $row['id']; ?>'><a>Delete</a></span></td>
            <td class="favorite_is"><span class="<?= $is_favorite; ?>"></span></td>
        </tr>
    <?php
       $count++;
     }
    ?>
    </table>
</div>
</body>
</html>
