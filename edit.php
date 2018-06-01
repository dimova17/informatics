<?php
require_once 'connection.php'; 
 
$link = mysqli_connect($host, $user, $password, $database)
    or die ("Ошибка подключения к базе данных " . mysqli_error());


if (isset($_GET['red_by_id'])) { 
    $id = $_GET['red_by_id'];

    $sql0 = "SELECT *
            FROM example_newsp
            WHERE id_example=" . $_GET['red_by_id'] ;
    $result0 = mysqli_query($link, $sql0);
    $start = mysqli_fetch_array($result0);
    $price = $start['price'];

    $sql1 = "SELECT DISTINCT tp_name
            FROM example_newsp";
    $result1 = mysqli_query($link, $sql1);

    $sql2 = "SELECT DISTINCT id_post
            FROM example_newsp";
    $result2 = mysqli_query($link, $sql2);

    $sql3 = "SELECT DISTINCT np_name
            FROM example_newsp";
    $result3 = mysqli_query($link, $sql3);

    echo "<form method='POST' action='edit.php'>
        <p>Идентификатор изменяемого экземпляра: <select name='id'> 
        <option>" . $id . "</option>
        </select></p>";

    echo  "<p>Выбрать типографию: <select name='tp_name'>
        <option>" . $start['tp_name'] . "</option>";

    while($row = mysqli_fetch_array($result1))
        {
        echo "<option>" . $row['tp_name'] . "</option>";
        } 
    echo "</select></p>
        <p>Выбрать номер почтового отделения: <select name='id_post'>
        <option>" . $start['id_post'] . "</option>";
    while($row = mysqli_fetch_array($result2))
        {
        echo "<option>" . $row['id_post'] . "</option>";
        }
    echo "</select></p>
        <p>Изменить название газеты: <select name='np_name'> 
        <option>" . $start['np_name'] . "</option>";
    while($row = mysqli_fetch_array($result3))
        {
        echo "<option>" . $row['np_name'] . "</option>";
        }
    echo "</select></p>
            <p>Изменить цену: <input type='text' name='price' value= $price size='20'> </p>
    	    <p><input type='submit' name='enter' value='Сохранить'></p>
    	    </form>";

}

if (isset($_POST['enter'])) { 
$sql = 'UPDATE example_newsp SET '
    .'tp_name = "'.$_POST['tp_name'].'",'
    .'id_post = "'.$_POST['id_post'].'",'
    .'np_name = "'.$_POST['np_name'].'",'
    .'price = '.$_POST['price'].' '
    .'WHERE id_example = '.$_POST['id'];

$result = mysqli_query($link, $sql);
    if ($result) {
    echo "Изменение записи прошло успешно!<br>";
    mysqli_close($link);
    echo '<a href="list.php">Нажми меня, чтобы вернуться в таблице!</a>';  
    }
    else{
      echo "Кое-где ошибка<br>" . mysqli_error($link);
    }
}

?>