<?php
require_once 'connection.php'; 
 
$link = mysqli_connect($host, $user, $password, $database)
    or die ("Ошибка подключения к базе данных " . mysqli_error());

$np_name = trim(strtr($_GET['np_name'],'*','%'));
$tp_name = trim(strtr($_GET['tp_name'],'*','%'));

echo "<form method='GET' action='search.php'>
    <p>Введите название газеты или его часть: <input type='text' name='np_name' value='$np_name'></p>
    <p>Введите название типографии или его часть: <input type='text' name='tp_name' value='$tp_name'></p>
    <p><input type='submit' name='enter' value='Search'></p>
    </form>";

if (isset($_GET['enter']))
    {
	$sql = "SELECT example_newsp.np_name, example_newsp.price, tipographia.tp_name, post.id_post, post.adress
        FROM example_newsp, tipographia, post
        WHERE example_newsp.tp_name = tipographia.tp_name AND example_newsp.id_post = post.id_post
        AND example_newsp.np_name LIKE '%$np_name%' AND tipographia.tp_name LIKE '%$tp_name%";

    $result = mysqli_query($link, $sql);
	echo "<table border='1'>
	<tr> 
	<th>np_name</th>
	<th>price</th>
	<th>tp_name</th>
	<th>id_post</th>
	<th>adress</th>
	</tr>";

	while($row = mysqli_fetch_array($result))
	{
	echo "<tr>";
	echo "<td>" . $row['np_name'] . "</td>";
	echo "<td>" . $row['price'] . "</td>";
	echo "<td>" . $row['tp_name'] . "</td>";
	echo "<td>" . $row['id_post'] . "</td>";
	echo "<td>" . $row['adress'] . "</td>";
	echo "</tr>";
	}

	echo "</table>"; 

	}

mysqli_close($link);
?>