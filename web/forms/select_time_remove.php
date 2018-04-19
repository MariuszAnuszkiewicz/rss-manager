<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>

<body>
<div id="trigger_btn_zone"><span class="down_arrow"></span></div>
<div class="section_select_time_remove">
    <form action="" method="post">
        <select name="time_remove" id="select_time_remove">
          <?php
            use MariuszAnuszkiewicz\classes\Manager\RSSManager;
            $rssManager = new RSSManager();
            foreach($rssManager->getSelectRemoveTime() as $row) {
               ?>
                <option value="<?= $row['time_active_posts']; ?>"><?= $row['time_active_posts'] ?></option>
               <?php
            }
          ?>
        </select>
        <input type="submit" name="confirm_time" value="potwierdź" id="Select_time_remove_btn">
    </form>
    <div id="show_time_remove"><a><?php echo $rssManager->showSetimeRemove(); ?></a></div>
    <div class="describe_label_time"><a>wybrany czas istnienia postów</a></div>
</div>
<?php
if (isset($_POST['confirm_time'])) {
   $rssManager->updateRemoveTime($_POST['time_remove']);
}
?>
</body>
</html>
