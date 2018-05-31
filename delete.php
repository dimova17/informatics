<?php
require_once 'connection.php'; 
 
$link = mysqli_connect($host, $user, $password, $database)
    or die ("Ошибка подключения к базе данных " . mysqli_error()); 

echo "Точно удалить?</br>";
echo "<form method='GET' action='delete.php'>
	<p><input type='submit' name='yes' value='Да'></p>
	<p><input type='submit' name='no' value='Нет'></p>
	    </form>";
if (isset($_GET['yes'])) {
	$sql = 'DELETE FROM example_newsp WHERE id_example =' .$_GET['del_by_id'];
    if (mysqli_query($link, $sql)) {
    	echo "Удаление прошло успешно!<br>";
		mysqli_close($link);
	    echo '<a href="list.php">Нажми меня, чтобы вернуться к таблице!</a>';
	} 
	else {
		echo "Что-то не так =(<br>" . mysqli_error($link);
	}
}
elseif (isset($_GET['no'])) {
	echo 'No problem!';
	echo '<a href="list.php">Нажми на меня, чтобы вернуться к таблице!</a>';
}

?>