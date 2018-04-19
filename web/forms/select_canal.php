<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
  <div class="section_select">
   <form action="" method="post">
    <select name="pages" id="select">
     <?php
        use MariuszAnuszkiewicz\classes\Data\DataStoreXML;
        $dataStoreXML = new DataStoreXML;

        foreach($dataStoreXML->getSelectCategory() as $row) {
            $select = (isset($_POST['pages']) && $_POST['pages'] == $row['url_category']) ? 'selected="selected"' : '';
           ?>
            <option value=<?= $row['url_category']; ?><?= $select ?>><?= $row['url_category']; ?></option>
           <?php
        }
     ?>
    </select>
    <input type="submit" name="confirm" value="potwierdź" id="choiceSelect">
   </form>
  </div>
</body>
</html>

