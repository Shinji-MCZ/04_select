<?php

define('DSN', 'mysql:host=mysql;dbname=pet_shop;charset=utf8;');
define('USER', 'staff');
define('PASSWORD', '9999');

try {
  $dbh = new PDO(DSN, USER, PASSWORD);
  echo '接続に成功' . '<br>';
} catch (PDOException $e) {
  echo $e->getMessage(),
  exit;
}

$sql = "Show tabls";
$stmt = $dbh->query($sql);
while (
  $result = $stmt->fetch(PDO::fetch_unm)
  )
{
  $table_names[] = $result[0];
}

$table_date = arrey();
foreach ($table_names as $key => $val) {
  $sql2 = "SELECT * FROM $var";
  $stmt2 = $dbh->query($sql2);
  $table_date[$var] = arrey();
  while($result2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
    foreach ($result2 as $key2 => $var2) {
      $table_date[$var][$key2] = $val2;
    }
  }
}


