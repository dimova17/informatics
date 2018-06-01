<?php
require_once 'connection.php'; 
 
$link = mysqli_connect($host, $user, $password, $database)
    or die ("Ошибка подключения к базе данных " . mysqli_error());

$sql1 = "SELECT DISTINCT tp_name
        FROM example_newsp";
$result1 = mysqli_query($link, $sql1);

$sql2 = "SELECT DISTINCT id_post
        FROM example_newsp";
$result2 = mysqli_query($link, $sql2);

$sql3 = "SELECT DISTINCT np_name
        FROM example_newsp";
$result3 = mysqli_query($link, $sql3);

echo "<form method='POST' action='add.php'>
    <p>Выбрать типографию: <select name='tp_name'>
    <option></option>";
while($row = mysqli_fetch_array($result1))
    {
    echo "<option>" . $row['tp_name'] . "</option>";
    } 
echo "</select></p>
    <p>Выбрать номер почтового отделения: <select name='id_post'>
    <option></option>";
while($row = mysqli_fetch_array($result2))
    {
    echo "<option>" . $row['id_post'] . "</option>";
    }
echo "</select></p>
    <p>Изменить название газеты: <select name='np_name'>
    <option></option>";
while($row = mysqli_fetch_array($result3))
    {
    echo "<option>" . $row['np_name'] . "</option>";
    }
echo "</select></p>
		<p>Укажите дату выпуска в формате дд.мм.гггг: <input type='text' name='date_create' size='20'></p>
        <p>Указать цену: <input type='text' name='price' size='20'></p>
	    <p><input type='submit' name='enter' value='Добавить'></p>
	    </form>";

if (isset($_POST['enter'])) { 
	$tp = trim($_POST['tp_name']);
	$np = trim($_POST['np_name']);
	$post = trim($_POST['id_post']);
	$date = trim($_POST['date_create']);
	$price = trim($_POST['price']);

    $sql_add = "INSERT INTO example_newsp (tp_name, id_post, np_name, date_create, price) VALUES ( 
            '$tp','$post','$np','$date', '$price')";
    $result = mysqli_query($link, $sql_add);
    echo $sql_add;
	if ($result) {
        mysqli_close($link);
	    echo "Вы добавили данные<br>";
	    echo '<a href="list.php">Нажми меня, чтобы вернуться в таблице!</a>';
	} else {
        echo "Ошибка с запросом или с вами<br>" . mysqli_error($link);
	} 

}

?>