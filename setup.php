<?php
require_once 'connection.php'; // подключаем скрипт
 
$link = mysqli_connect($host, $user, $password, $database)
    or die ("Ошибка подключения к базе данных " . mysqli_error());

echo "Подключено<br>";

$sql = "CREATE TABLE newspaper (
  np_name varchar(100) NOT NULL,
  id_newsp int(10) NOT NULL,
  fio_red varchar(100) NOT NULL,
  PRIMARY KEY (np_name))";

if (mysqli_query($link, $sql)) {
  echo "Запрос выполнен";
} else {
  echo "Ошибка. Таблица не создалася" . mysqli_error($link);
}  

$sql = "INSERT INTO newspaper VALUES
  ('Ведомости', '11', 'Сидоров А.И.'),
  ('Вестник', '22','Иванов А.А.'),
  ('Вокруг_света', '33','Петров П.П'),
  ('Комсомольская_правда', '44','Посиделкин Н.И.'),
  ('Научные_новости', '55','Цой Г.Ж.')";
  
if (mysqli_query($link, $sql)) {
  echo "Вы добавили данные<br>";
} else {
  echo "Ошибка с данными <br>" . mysqli_error($link);
} 


 $sql = "CREATE TABLE tipographia (
  tp_name varchar(100) NOT NULL,
  adress varchar(100) NOT NULL,
  PRIMARY KEY (tp_name))";

if (mysqli_query($link, $sql)) {
  echo "Запрос выполнен";
} else {
  echo "Ошибка. Таблица не создаласи" . mysqli_error($link);
}  

$sql = "INSERT INTO tipographia VALUES
  ('Красочная', 'Виноградского, 43'),
  ('Ленинская','Котельникова, 21'),
  ('Лефортово','Московский, 35'),
  ('Либерти','Некрасовская, 90'),
  ('Первомай','Первомайская, 86')";
  
if (mysqli_query($link, $sql)) {
  echo "Вы добавили данные<br>";
} else {
  echo "Что-то не так с данными<br>" . mysqli_error($link);
}

$sql = "CREATE TABLE post (
  id_post int(10) NOT NULL,
  adress varchar(100) NOT NULL,
  PRIMARY KEY (id_post))";

if (mysqli_query($link, $sql)) {
  echo "Запрос выполнен";
} else {
  echo "Ошибка. Таблица не создалася" . mysqli_error($link);
}  

$sql = "INSERT INTO post VALUES
  ('333000', 'Гороховая, 10'),
  ('040400','Куйбышева, 104'),
  ('690069','Броневая, 77'),
  ('112233','Ломоносова, 11'),
  ('889900','Гастелло, 65')";
  
if (mysqli_query($link, $sql)) {
  echo "Вы добавили данные<br>";
} else {
  echo "Что-то не так с данными<br>" . mysqli_error($link);
}

$sql = "CREATE TABLE delivery (
  deliv_name varchar(100) NOT NULL,
  how_many_workers int(10) NOT NULL,
  experience int(10) NOT NULL,
  speed_np_hour int(10) NOT NULL,
  PRIMARY KEY (deliv_name))";

if (mysqli_query($link, $sql)) {
  echo "Запрос выполнен";
} else {
  echo "Ошибка. Таблица не создалася" . mysqli_error($link);
}  

$sql = "INSERT INTO delivery VALUES
  ('Велосипедисты',  '118', '15', '70'),
  ('Всрок', '55', '7','100'),
  ('Газетничков','60', '5','180'),
  ('Дирижабль', '800', '120','330'),
  ('Печкин', '1', '63','25')";
  
if (mysqli_query($link, $sql)) {
  echo "Вы добавили данные<br>";
} else {
  echo "Что-то не так. Данные не добавлены<br>" . mysqli_error($link);
}

$sql = "CREATE TABLE tiraj (
  id_tir int(10) NOT NULL AUTO_INCREMENT,
  tp_name varchar(100) NOT NULL,
  np_name varchar(100) NOT NULL,
  razmer int(10) NOT NULL,
  PRIMARY KEY (id_tir),
  FOREIGN KEY (tp_name) REFERENCES tipographia (tp_name),
  FOREIGN KEY (np_name) REFERENCES newspaper (np_name))";

if (mysqli_query($link, $sql)) {
  echo "Запрос выполнен";
} else {
  echo "Ошибка. Таблица не создалася" . mysqli_error($link);
}  

$sql = "INSERT INTO tiraj VALUES
  ('1', 'Красочная', 'Вестник', '500'),
  ('2', 'Красочная', 'Научные_новости', '120'),
  ('3', 'Красочная', 'Комсомольская_правда', '300'),
  ('4', 'Либерти', 'Ведомости', '333'),
  ('5', 'Либерти', 'Вестник', '430')";
  
if (mysqli_query($link, $sql)) {
  echo "Вы добавили данные, ого<br>";
} else {
  echo "Что-то не так в данных<br>" . mysqli_error($link);
}

$sql = "CREATE TABLE deliv_dogovor (
  id_dogovor int(30) NOT NULL AUTO_INCREMENT,
  amount_np int(10) NOT NULL,
  id_post int(10) NOT NULL,
  deliv_name varchar(100) NOT NULL,
  uslovia varchar(100) NOT NULL,
  payment_per_one_example varchar(100) NOT NULL,
  PRIMARY KEY (id_dogovor),
  FOREIGN KEY (id_post) REFERENCES post (id_post),
  FOREIGN KEY (deliv_name) REFERENCES delivery (deliv_name))";

if (mysqli_query($link, $sql)) {
  echo "Таблица создана";
} else {
  echo "Ошибка. Таблица не создалась" . mysqli_error($link);
}  

$sql = "INSERT INTO deliv_dogovor VALUES
  ('1', '300', '333000', 'Всрок', 'Стандарт', '15'),
  ('2', '500', '112233', 'Велосипедисты', 'Ускоренная доставка', '18')";
  
if (mysqli_query($link, $sql)) {
  echo "Вы добавили данные<br>";
} else {
  echo "Что-то не так с данными!!<br>" . mysqli_error($link);
}

$sql = "CREATE TABLE example_newsp (
  id_example int(10) NOT NULL AUTO_INCREMENT,
  tp_name varchar(100) NOT NULL,
  id_post int(10) NOT NULL,
  np_name varchar(100) NOT NULL,
  date_create date NOT NULL,
  price int(10) NOT NULL,
  PRIMARY KEY (id_example))";

if (mysqli_query($link, $sql)) {
  echo "Запрос выполнен";
} else {
  echo "Ошибка. Таблицо не создалося" . mysqli_error($link);
}  

$sql = "INSERT INTO example_newsp VALUES
  ('1', 'Первомай', '333000', 'Вестник', '11.12.2017', '30'),
  ('2', 'Лефортово', '690069', 'Научные_новости', '20.11.2017', '45'),
  ('3', 'Ленинская', '112233', 'Комсомольская_правда', '03.09.2017', '28')";
  
if (mysqli_query($link, $sql)) {
  echo "Вы добавили данные<br>";
} else {
  echo "Косяк с данными. Не добавились<br>" . mysqli_error($link);
}

$sql = "CREATE TABLE archive_got (
  id_parcel int(10) NOT NULL AUTO_INCREMENT,
  id_post int(10) NOT NULL,
  amount_got int(10) NOT NULL,
  date_got date NOT NULL,
  PRIMARY KEY (id_parcel))";

if (mysqli_query($link, $sql)) {
  echo "Все ок, таблицо есть";
} else {
  echo "Ошибка. Таблица не создаласи" . mysqli_error($link);
}  

$sql = "INSERT INTO archive_got VALUES
  ('01', '690069', '700', '31.12.2017'),
  ('02', '112233', '650', '10.11.2017')";
  
if (mysqli_query($link, $sql)) {
  echo "Вы добавили данные<br>";
} else {
  echo "Что-то не так с данными<br>" . mysqli_error($link);
}

mysqli_close($link);
?>