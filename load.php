<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>タロットカード占い</title>
  <link rel="stylesheet" href="css/load.css" />
</head>
<body>
  <div class="circ">
    <div class="load">
    占い結果 . . . 
    </div>
    <div class="hands"></div>
    <div class="body"></div>
    <div class="head">
      <div class="eye"></div>
    </div>
  </div>
    <div class="main_button">
      <form action="main.php" method="post">
        <input type="submit" value="<?php printf ($_POST['name']); ?>さんの占い結果を見る">
      </form>
    </div>
</body>
</html>


