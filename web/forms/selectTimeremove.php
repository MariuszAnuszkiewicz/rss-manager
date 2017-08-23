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
            $rss = new RSSManager();
            echo $rss->getSelectRemoveTime();
          ?>
        </select>
        <input type="submit" name="confirm_time" value="potwierdź" id="Select_time_remove_btn">
    </form>

    <div id="show_time_remove"><a><?php echo $rss->showSetimeRemove(); ?></a></div>
    <div class="describe_label_time"><a>wybrany czas istnienia postów</a></div>
</div>

<?php

if(isset($_POST['confirm_time'])){

 $rss->updateRemoveTime($_POST['time_remove']);

}

?>
</body>

</html>
