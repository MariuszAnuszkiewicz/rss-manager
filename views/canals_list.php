<?php
include_once("../autoload/autoloading.php");
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
</head>

<body>



    <?php

    $db =  DB::getInstance();

        $count = 1;
        $sql = "SELECT * FROM rss_store ORDER BY url_category";
        $db->query($sql, "Param_OFF");
        $row = $result = $db->results();

    if($db->countRow() > 0){

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

            } // end if
            else{

                return null;
            }
    ?>
    <?php

        for ($i = 0; $i < count($row); $i++) {

            $is_favorite = ($row[$i]['favorite'] == "no") ? 'noactive' : 'active';

    ?>
        <tr>
            <td class="url" data-id="'<?php echo $row[$i]['id']; ?>'" contenteditable><?php echo $row[$i]['url_category']; ?></td>
            <td class="address"><?php echo $row[$i]['url_address']; ?></td>
            <td class="content_favorite"><span class="no_add_favorite" data-id_fav="'<?php echo $row[$i]['id']; ?>'" data-value_fav="'<?php echo $row[$i]['favorite']; ?>'"></span></td>
            <td class="date"><?php echo $row[$i]['date_to_add']; ?></td>
            <td align='center'><span class='delete' id='del_<?php echo $row[$i]['id']; ?>'><a>Delete</a></span></td>
            <td class="favorite_is"><span class="<?php echo $is_favorite; ?>"></span></td>
        </tr>

    <?php
       $count++;
     } // end for
    ?>

    </table>
</div>

</body>
</html>
