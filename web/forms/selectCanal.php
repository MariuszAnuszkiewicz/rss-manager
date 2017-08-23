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
        $data = new DataStoreXML;
        echo $data->getSelectCategory();
     ?>
    </select>
    <input type="submit" name="confirm" value="potwierdź" id="choiceSelect">
   </form>
  </div>

</body>

</html>

