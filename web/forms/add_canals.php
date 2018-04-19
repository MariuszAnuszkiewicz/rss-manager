<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
</head>

<body>
<div class="section_add">
    <form action="" method="post" id="addCanalForm">
      <input  type="text" name="addrss" id="addCanal">
      <input type="submit" name="submit_btnAdd" id="executeAdd" value="Dodaj kanał RSS" />
    </form>
</div>
<?php
use MariuszAnuszkiewicz\classes\ValidateInput\ValidateInput;
$validate = new ValidateInput();
if (isset($_POST['submit_btnAdd'])) {
    if (preg_match_all('/[rss.xml]$/', $_POST['addrss'])) {
        $validate->process($_POST['submit_btnAdd'], $_POST['addrss']);
    }
}
?>
</body>
</html>




