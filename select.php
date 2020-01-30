<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>データベース課題2</title>
</head>
<body>
  
  <h1>本日のご紹介ペット！</h1>
    <p>
      <form action="" method="get">キーワード:
        <input type="text"  name="search" placeholder="キーワードを入力" value="<?php echo $search_value ?>">
        <input type="submit" value="送信">
      </form>
    </p>
</body>
</html>

<?php

define('DSN', 'mysql:host=mysql;dbname=pet_shop;charset=utf8;');
define('USER', 'staff');
define('PASSWORD', '9999');

try {
  $dbh = new PDO(DSN, USER, PASSWORD);
} catch (PDOException $e) {
  echo $e->getMessage(),
  exit;
}

$sql = "select * from animals";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$animals = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * from animals WHERE description LIKE '%$search%'";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$animals = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_get['search'])) {
$search = htmlspecialchars($_get['search']);
$search = '';
$search_value = $search;
}else {
$search = '';
$search_value = '';
}



foreach ($animals as $animal)
{
  echo $animal['type'] .  ' の ' . $animal['classifcation'] . ' ちゃん ' .' <br> ' . $animal['description'] . ' <br> ' . $animal['birthday'] . ' 生まれ ' . ' <br> ' . ' 出身地 ' . $animal['birthplace'] . ' <hr> ';
}
?>