<?php
require_once 'connection.php'; 
 
$link = mysqli_connect($host, $user, $password, $database)
    or die ("Ошибка подключения к базе данных " . mysqli_error()); 

if (isset($_GET['del_by_id'])) {
    $sql = 'DELETE FROM example_newsp WHERE id_example =' .$_GET['del_by_id'];
}
if (mysqli_query($link, $sql)) {
  echo "Удаление прошло успешно!<br>";
  echo '<a href="list.php">Нажми меня, чтобы вернуться в таблице!</a>';
} else {
  echo "Что-то не так =(<br>" . mysqli_error($link);
}

mysqli_close($link);
?>