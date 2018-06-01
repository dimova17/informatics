<?php
require_once 'connection.php'; 
 
$link = mysqli_connect($host, $user, $password, $database)
    or die ("Ошибка подключения к базе данных " . mysqli_error());
/*$id = $_GET['del_by_id'];
if (isset($id)) {

	echo "Точно удалить?</br>";
	echo "<form method='GET' action='delete.php'>
		<p><input type='submit' name='yes' value='Да'></p>
		<p><input type='submit' name='no' value='Нет'></p>
		    </form>";
}*/
if (isset($_GET['del_by_id'])) {
	//header("location: list.php");
	$sql = 'DELETE FROM example_newsp WHERE id_example =' . $_GET['del_by_id'];
	$result = mysqli_query($link, $sql);
	echo '<a href="list.php">Нажми на меня, чтобы вернуться к таблице!</a>';
	//echo $sql;
}

?>