<?php
require_once 'connection.php'; 
 
$link = mysqli_connect($host, $user, $password, $database)
    or die ("Ошибка подключения к базе данных " . mysqli_error());

$sql = "SELECT id_example, tp_name, id_post, np_name, price
        FROM example_newsp";

if (mysqli_query($link, $sql)) {
  echo "Таблица данных<br>";
} else {
  echo "В запросе ошибка<br>" . mysqli_error($link);
}
echo "<table border='1'>
<tr> 
<th>id</th>
<th>tp_name</th>
<th>post</th>
<th>newspaper</th>
<th>price</th>
<th>edit/delete</th>
</tr>";

$result = mysqli_query($link, $sql);
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['id_example'] . "</td>";
echo "<td>" . $row['tp_name'] . "</td>";
echo "<td>" . $row['id_post'] . "</td>";
echo "<td>" . $row['np_name'] . "</td>";
echo "<td>" . $row['price'] . "</td>";
echo '<td><a href="delete.php?del_by_id='.$row['id_example'].'">Удалить</a> <a href="edit.php?red_by_id='.$row['id_example'].'">Изменить</a></td>';
echo "</tr>";
}
echo "<td><a href='add.php'>Добавить новую запись</a></td>";

mysqli_close($link);
?>